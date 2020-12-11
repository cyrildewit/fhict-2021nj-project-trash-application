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
        public string Barcode { get; private set; }
        public string Information { get; private set; }

        //Methods
        public void ParseToJsonAndReadData(string input)
        {
            JsonDocument doc = JsonDocument.Parse(input);
            JsonElement root = doc.RootElement;

            Information = Convert.ToString(root.GetProperty("data").GetProperty("information"));
            
            Console.WriteLine(Information);

            Barcode = Convert.ToString(root.GetProperty("data").GetProperty("seperation_tray"));
            Console.WriteLine(Barcode);
        }
    }
}
