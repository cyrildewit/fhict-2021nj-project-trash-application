using System;
using System.Collections.Generic;
using System.Linq;
using System.Text;
using System.Threading.Tasks;
using System.Text.Json;

namespace Prullebak
{
    class Trash
    {
        //fields
        private string information;
        private SeperationTray seperationTray;
        private string depositAmount;
        private string barcode;

        //properties 
        public string Barcode
        {
            private set
            {
                barcode = null;
            }
            get
            {
                return barcode;
            }
        }
        public string Information
        {
            private set
            {
                information = "Error niet in   database";
            }
            get
            {
                return information;
            }
        }
        public SeperationTray SeperationTray
        {
            private set
            {
                seperationTray = SeperationTray.rest;
            }
            get
            {
                return seperationTray;
            }
        }
        public string DepositAmount
        {
            private set
            {
                depositAmount = "0";
            }
            get
            {
                return depositAmount;
            }
        }

        //constructor
        public Trash(string barcode, HttpReqequesthandler http)
        {
            this.Barcode = barcode; 
            string input = http.makeHttpRequest(barcode);
            if (input != null)
            {
                JsonDocument doc = JsonDocument.Parse(input);
                JsonElement root = doc.RootElement;

                information = Convert.ToString(root.GetProperty("data").GetProperty("information"));
                seperationTray = (SeperationTray)Convert.ToInt32(Convert.ToString(root.GetProperty("data").GetProperty("seperation_tray")));
                this.barcode = Convert.ToString(root.GetProperty("data").GetProperty("barcode"));
                depositAmount = Convert.ToString(root.GetProperty("data").GetProperty("deposit_amount"));
                if (depositAmount == "")
                {
                    depositAmount = "0";
                }
            }
        }
    }
}
