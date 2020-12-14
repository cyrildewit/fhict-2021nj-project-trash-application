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
        public string seperationTray { get; private set; }
        public string depositAmount { get; private set; }

        //Methods
        public void ParseToJsonAndReadData(string input)
        {
            JsonDocument doc = JsonDocument.Parse(input);
            JsonElement root = doc.RootElement;

            information = Convert.ToString(root.GetProperty("data").GetProperty("information"));
            seperationTray = Convert.ToString(root.GetProperty("data").GetProperty("seperation_tray"));
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
