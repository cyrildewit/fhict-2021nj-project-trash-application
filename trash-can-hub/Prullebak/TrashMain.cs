using System;
using System.Collections.Generic;
using System.Linq;
using System.Text;
using System.Threading.Tasks;

namespace Prullebak
{
    class TrashMain
    {
        public List<Trash> scannedTrash { get; private set; }
        comPortHandler com;
        HttpReqequesthandler http;

        public TrashMain()
        {
            scannedTrash = new List<Trash>();
            http = new HttpReqequesthandler("0cc21cec-04f0-4882-b94e-6bf39a8d1b80");
            com = new comPortHandler(this);
        }

        public void handleBarcode(string barcode)
        {
            scannedTrash.Add(new Trash(barcode, http));
        }

        public void addCredit(string uid)
        {
            foreach (Trash trash in scannedTrash)
            {
                if (http.addCreditoAcount(uid, trash.barcode) == false)
                {
                    com.toLCD("error in geld toewijzen");
                    break;
                }
            }
        }

    }
}
