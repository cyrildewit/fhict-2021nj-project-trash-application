using System;
using System.Collections.Generic;
using System.Linq;
using System.Text;
using System.Threading.Tasks;

namespace Prullebak
{
    class TrashMain
    {
        List<Trash> scannedTrash; //this has all the trash that has been trown away but not yet claimed
        Trash queuedTrash; //the last trash that has been scaned but not yet trown away
        comPortHandler com; 
        HttpReqequesthandler http;

        public TrashMain()
        {
            scannedTrash = new List<Trash>();
            http = new HttpReqequesthandler("36046afa-d99c-47ec-8754-af8b39f6aa9e");
            com = new comPortHandler(this);
        }

        public void HandleBarcode(string barcode)
        {
            Trash trash = new Trash(barcode, http);
            //move all data to arduino
            com.SentCreditInfo(trash.DepositAmount);
            com.WriteToLcd(trash.Information);
            com.SelectArduinoMatrix(trash.SeperationTray);
            if (trash.Barcode != null)
            {
                queuedTrash = trash; //save the trash untill it is trown away.
            }
            else
            {
                queuedTrash = null;
            }
            
        }

        public void AddToList()
        {
            if (queuedTrash != null)
            {
                scannedTrash.Add(queuedTrash); //the trash has been trown away so add it to the list
            }
        }
        public void AddCredit(string uid)
        {
            foreach (Trash trash in scannedTrash)
            {
                if (http.addCreditoAcount(uid, trash.Barcode) == false) //request failed so submit error
                {
                    com.WriteToLcd("error in geld toewijzen");
                    scannedTrash.Clear();
                    break;
                }
            }
            scannedTrash.Clear();
        }

    }
}
