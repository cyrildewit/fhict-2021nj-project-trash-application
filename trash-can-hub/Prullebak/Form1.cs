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


        public Form1()
        {
            InitializeComponent();
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

            //{"De externe server heeft een fout geretourneerd: (404) Niet gevonden."}
            if (e.KeyCode == Keys.Enter && connected == true)
            {

                barcode = textBox1.Text;
                //string url = "http://10.0.0.8/api/v1/products/findByBarcode/" + textBox1.Text;
                string url = "http://8ae60850091d.ngrok.io/api/v1/products/findByBarcode/" + textBox1.Text;
                HttpWebRequest request = (HttpWebRequest)WebRequest.Create(@url);
                request.Headers.Add("X-TrashCan-UUID", "Basic ashAHasd87asdHasdas");
                HttpWebResponse response;
                try
                {
                    response = (HttpWebResponse)request.GetResponse();
                    string content = new StreamReader(response.GetResponseStream()).ReadToEnd();

                    JsonDocument doc = JsonDocument.Parse(content);
                    JsonElement root = doc.RootElement;

                    string andwoord = Convert.ToString(root.GetProperty("data").GetProperty("information"));
                    port.Write("#1" + andwoord + "\n");
                    Console.WriteLine(andwoord);

                    andwoord = Convert.ToString(root.GetProperty("data").GetProperty("seperation_tray"));
                    port.Write("#" + andwoord + "\n");
                    Console.WriteLine(andwoord);
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

        private void button1_Click(object sender, EventArgs e)
        {
            label1.Text = port.ReadLine();

        }


        private void DataReceivedHandler(
                        object sender,
                        SerialDataReceivedEventArgs e)
        {
            SerialPort sp = (SerialPort)sender;
            string indata = sp.ReadExisting();
            Console.WriteLine(indata);
            //string url = "http://10.0.0.8/api/v1/users/findByNFC/" +  indata + "/discarded-waste-records?barcode=" + barcode;
            string url = "http://8ae60850091d.ngrok.io/api/v1/users/findByNFC/" + indata + "/discarded-waste-records?barcode=" + barcode;
            HttpWebRequest request = (HttpWebRequest)WebRequest.Create(@url);
            request.Headers.Add("X-TrashCan-UUID", "6697746d-2d47-4ebc-9da8-b7c714800319");
            request.Method = "POST";
            request.ContentType = "application/x-www-form-urlencoded";
            HttpWebResponse response;
            try
            {
                response = (HttpWebResponse)request.GetResponse();
            }
            catch
            {
                Console.WriteLine("error in geld toewijzen");
            }
        }
    }
}
