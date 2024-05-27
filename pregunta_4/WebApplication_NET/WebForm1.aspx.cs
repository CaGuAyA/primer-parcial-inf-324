using System;
using System.Collections.Generic;
using System.Linq;
using System.Web;
using System.Web.UI;
using System.Web.UI.WebControls;

namespace WebApplication_NET
{
    public partial class WebForm1 : System.Web.UI.Page
    {
        protected void Page_Load(object sender, EventArgs e)
        {
            if (Request.Form["nombre"] != null && Request.Form["apellido"] != null)
            {
                TextBox1.Text = Request.Form["nombre"];
                TextBox2.Text = Request.Form["apellido"];
            }
        }
    }
}