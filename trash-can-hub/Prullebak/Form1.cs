using System;
using System.Collections.Generic;
using System.ComponentModel;
using System.Data;
using System.Drawing;
using System.IO;
using System.Linq;
using System.Net;
using System.Text;
using System.Text.Json;
using System.Threading.Tasks;
using System.Windows.Forms;
using Newtonsoft.Json.Linq;
using System.IO.Ports;

namespace Prullebak
{
    public partial class Form1 : Form
    {
        bool connected = false;
        String[] ports;
        SerialPort port;
        Trash trash1;


        public Form1()
        {
            
            trash1 = new Trash();

            InitializeComponent();

            //get the com ports and put them in the dropdown box
            getAvailableComPorts();
            foreach (string port in ports)
            {
                comboBox1.Items.Add(port);
                Console.WriteLine(port);
                if (ports[0] != null)
                {
                    comboBox1.SelectedItem = ports[0];
                }
            }
        }

        private void textBox1_TextChanged(object sender, EventArgs e)
        {
        }

        private void textBox1_KeyDown(object sender, KeyEventArgs e)
        {
            if (e.KeyCode == Keys.Enter && connected == true)
            {

                string url = "http://10.0.0.8/api/v1/products/findByBarcode/" + textBox1.Text;
                //string url = "http://93a67ab169dd.ngrok.io/api/v1/products/findByBarcode/" + textBox1.Text;
                HttpWebRequest request = (HttpWebRequest)WebRequest.Create(@url);
                request.Headers.Add("X-TrashCan-UUID", "0cc21cec-04f0-4882-b94e-6bf39a8d1b80");
                HttpWebResponse response;
                try
                {
                    response = (HttpWebResponse)request.GetResponse();
                    string content = new StreamReader(response.GetResponseStream()).ReadToEnd();

                    trash1.ParseToJsonAndReadData(content);
                    port.Write("#^" + trash1.depositAmount + "\n");
                    port.Write("#~" + trash1.information + "\n");
                    port.Write("#" + trash1.seperationTray + "\n");
                }
                catch
                {
                    port.Write("#^0\n");
                    port.Write("#~Error niet in   database\n");
                    port.Write("#4\n");
                    response = null;
                }


                textBox1.Text = "";
            }
            if (e.KeyCode == Keys.Enter && connected == false)
            {

            }
        }

        private void Connect_Click(object sender, EventArgs e)
        {
            if (connected)
            {
                Disconnect();
                Connect.Text = "Connect";
            }
            else
            {
                GoConnect();
                Connect.Text = "Disconnect";
            }
        }
        void getAvailableComPorts()
        {
            ports = SerialPort.GetPortNames();
        }

        private void GoConnect()
        {
            connected = true;
            string selectedPort = comboBox1.GetItemText(comboBox1.SelectedItem);
            port = new SerialPort(selectedPort, 9600, Parity.None, 8, StopBits.One);
            port.DataReceived += new SerialDataReceivedEventHandler(DataReceivedHandler);
            port.Open();

        }

        private void Disconnect()
        {
            connected = false;
            port.Close();
        }


        private void DataReceivedHandler(
                        object sender,
                        SerialDataReceivedEventArgs e)
        {
            SerialPort sp = (SerialPort)sender;
            string uid = ""; // create a variable that we will add on what we get via the serial port
            // normaly the serial port separates the id in multiple things so we keep reading untill there is an #
            //Somtimes it returns nothing so we check if there is nothing and if that's true we just repeat
            string indata = sp.ReadExisting(); // read the serial port
            while (indata == "" || indata.Substring(indata.Length - 1) != "#")
            {
                uid = uid + indata; // add input the uid
                indata = sp.ReadExisting();
            }
            uid = uid + indata;
            uid = uid.Remove(uid.Length - 1);
            Console.WriteLine(uid);
            
            if (MakeCreditAddHTTPRequest(uid, trash1) == "error") //wijs geld toe
            {
                port.Write("#~error in geld   toewijzen\n");
            }
        }

        private string MakeCreditAddHTTPRequest(string uid, Trash trash)
        {
            string url = "http://10.0.0.8/api/v1/users/findByNFC/" + uid + "/discarded-waste-records?barcode=" + trash.barcode;
            //string url = "http://93a67ab169dd.ngrok.io/api/v1/users/findByNFC/" + indata + "/discarded-waste-records?barcode=" + barcode;
            HttpWebRequest request = (HttpWebRequest)WebRequest.Create(@url);
            request.Headers.Add("X-TrashCan-UUID", "92802dd2-654a-4beb-a3cb-98e15ad885c4");
            request.Method = "POST";
            request.ContentType = "application/x-www-form-urlencoded";
            HttpWebResponse response;
            try
            {
                response = (HttpWebResponse)request.GetResponse();
                return "";
            }
            catch
            {
                Console.WriteLine("error in geld toewijzen");
                return "error";
            }
        }
    }
}
