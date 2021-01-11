using System;
using System.Net;
using System.IO;
using System.Collections.Generic;
using System.Linq;
using System.Text;
using System.Threading.Tasks;

namespace Prullebak
{
    class HttpReqequesthandler
    {
        //field
        private string apiUrl = "http://10.0.0.8/api/v1";
        private string UUID;

        /// <summary>
        /// make HttpReqequesthandler without an UUID because it is only needed when maken credit add Request
        /// </summary>
        public HttpReqequesthandler()
        {
            UUID = null; 
        }

        /// <summary>
        /// make HttpReqequesthandler with an UUID to be able to make http add Request
        /// </summary>
        /// <param name="UUID"></param>
        public HttpReqequesthandler(string UUID)
        {
            this.UUID = UUID;
        }
        public string makeHttpRequest(string barcode)
        {
            string url = apiUrl + "/products/findByBarcode/" + barcode;
            HttpWebRequest request = (HttpWebRequest)WebRequest.Create(@url);
            HttpWebResponse response;
            try
            {
                response = (HttpWebResponse)request.GetResponse();
                string content = new StreamReader(response.GetResponseStream()).ReadToEnd();
                return content;
            }
            catch
            {
                return null;
            }
        }

        public bool addCreditoAcount(string uid, string barcode)
        {
            if (UUID == null)
            {
                return false; // if there is no UUID exit as it will not work without.
            }
            string url = apiUrl + "/users/findByNFC/" + uid + "/discarded-waste-records?barcode=" + barcode;
            HttpWebRequest request = (HttpWebRequest)WebRequest.Create(@url);
            request.Headers.Add("X-TrashCan-UUID", UUID);
            request.Method = "POST";
            request.ContentType = "application/x-www-form-urlencoded";
            HttpWebResponse response;
            try
            {
                response = (HttpWebResponse)request.GetResponse();
                return true;
            }
            catch
            {
                Console.WriteLine("error in geld toewijzen");
                return false;
            }
        }
    }
}
