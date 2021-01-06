using System;
using System.Collections.Generic;
using System.ComponentModel;
using System.Data;
using System.Drawing;
using System.IO;
using System.Linq;
using System.Net;
using System.Text;
using System.IO.Ports;

namespace Prullebak
{
    class comPortHandler
    {
        //fields
        private string[] ports;
        private SerialPort port;
        private TrashMain main;

        //constructor
        public comPortHandler(TrashMain main)
        {
            this.main = main;
            ports = SerialPort.GetPortNames();

            string selectedPort = ports[0];
            port = new SerialPort(selectedPort, 9600, Parity.None, 8, StopBits.One);
            port.DataReceived += new SerialDataReceivedEventHandler(DataReceivedHandler);
            port.Open();
        }

        public void toLCD(string text)
        {
            port.Write(text);
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
            main.addCredit(uid);
        }
    }
}