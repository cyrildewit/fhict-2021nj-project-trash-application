using System;
using System.Collections.Generic;
using System.Linq;
using System.Text;
using System.Threading.Tasks;

namespace Prullebak
{
    class TrashMain
    {
        List<Trash> scannedTrash;
        comPortHandler com;
        HttpReqequesthandler http;

        public TrashMain()
        {
            scannedTrash = new List<Trash>();
            http = new HttpReqequesthandler("94de8bee-2f65-41ad-b15c-46dbbfa6392d");
            com = new comPortHandler(this);
        }

        public void handleBarcode(string barcode)
        {
            Trash trash = new Trash(barcode, http);
            if (trash.information == null)
            {
                //barcode was not in database so it is rest and no credit
                com.sentCreditInfo("0");
                com.writeToLcd("Error niet in   database");
                com.selectArduinoMatrix(SeperationTray.rest);
            }
            else
            {
                //barcode was in database so move info to adruino
                com.sentCreditInfo(trash.depositAmount);
                com.writeToLcd(trash.information);
                com.selectArduinoMatrix(trash.seperationTray);
                scannedTrash.Add(trash); //add it to the list to be able to claim it later
            }
        }

        public void addCredit(string uid)
        {
            foreach (Trash trash in scannedTrash)
            {
                if (http.addCreditoAcount(uid, trash.barcode) == false)
                {
                    com.writeToLcd("error in geld toewijzen");
                    scannedTrash.Clear();
                    break;
                }
            }
            scannedTrash.Clear();
        }

    }
}
