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
        string barcode = "";
        Trash Trash1;


        public Form1()
        {
            InitializeComponent();
            getAvailableComPorts();
            Trash1 = new Trash();
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

                    Trash1.ParseToJsonAndReadData(content);
                    port.Write("#1" + Trash1.Information + "\n");
                    port.Write("#" + Trash1.Barcode + "\n");
                }
                catch
                {
                    port.Write("#1" + "Error niet in   database\n");
                    port.Write("#" + "rest" + "\n");
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
            // somtimes the input is blank and this breaks the Substring so in that case make the string "nothing"
            string indata = sp.ReadExisting(); // read the serial port
            while (indata.Substring(indata.Length - 1) != "#")
            {
                Console.WriteLine("nfc check");
                if (indata != "nothing"){
                    uid = uid + indata; // add input the uid
                }
                indata = sp.ReadExisting();
                if (indata == "")
                {
                    indata = "nothing";
                }
            }
            uid = uid + indata;
            uid = uid.Remove(uid.Length - 1);
            Console.WriteLine(uid);
            string url = "http://10.0.0.8/api/v1/users/findByNFC/" + uid + "/discarded-waste-records?barcode=" + Trash1.Barcode;
            //string url = "http://93a67ab169dd.ngrok.io/api/v1/users/findByNFC/" + indata + "/discarded-waste-records?barcode=" + barcode;
            HttpWebRequest request = (HttpWebRequest)WebRequest.Create(@url);
            request.Headers.Add("X-TrashCan-UUID", "0cc21cec-04f0-4882-b94e-6bf39a8d1b80");
            request.Method = "POST";
            request.ContentType = "application/x-www-form-urlencoded";
            HttpWebResponse response;
            try
            {
                response = (HttpWebResponse)request.GetResponse();
            }
            catch
            {
                port.Write("#1error in geld toewijzen\n");
                Console.WriteLine("error in geld toewijzen");
            } 
        }
    }
}
