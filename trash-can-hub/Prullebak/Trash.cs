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
        //properties 
        public string barcode { get; private set; }
        public string information { get; private set; }
        public SeperationTray seperationTray { get; private set; }
        public string depositAmount { get; private set; }

        public Trash(string barcode, HttpReqequesthandler http)
        {
            string input = http.makeHttpRequest(barcode);

            JsonDocument doc = JsonDocument.Parse(input);
            JsonElement root = doc.RootElement; 

            information = Convert.ToString(root.GetProperty("data").GetProperty("information"));
            seperationTray = (SeperationTray)Convert.ToInt32(Convert.ToString(root.GetProperty("data").GetProperty("seperation_tray")));
            barcode = Convert.ToString(root.GetProperty("data").GetProperty("barcode"));
            depositAmount = Convert.ToString(root.GetProperty("data").GetProperty("deposit_amount"));
            if (depositAmount == "")
            {
                depositAmount = "0";
            }
            Console.WriteLine(information);
            Console.WriteLine(seperationTray);
        }
    }
}
