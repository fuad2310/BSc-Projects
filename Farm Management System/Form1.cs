using System;
using System.Collections.Generic;
using System.ComponentModel;
using System.Data;
using System.Drawing;
using System.Linq;
using System.Text;
using System.Threading.Tasks;
using System.Windows.Forms;
using System.Data.SqlClient;

namespace Farm_Management_System
{
    public partial class SignUp : Form
    {
        String Name = "", Uname = "", Pass = "", Address = "", Role = "";
        public SignUp()
        {
            InitializeComponent();
        }

        private void label1_Click(object sender, EventArgs e)
        {

        }

        private void label4_Click(object sender, EventArgs e)
        {

        }

        private void txtname_TextChanged(object sender, EventArgs e)
        {

        }

        private void btnsignup_Click(object sender, EventArgs e)
        {
            if (Name == "")
                Name = txtname.Text;
            
            if (Uname == "")
                Uname = txtuname.Text;
            if (Pass == "")
                Pass = txtpass.Text;
            if (Address == "")
                Address = txtadd.Text;
            if (rbemp.Checked)
                Role = "Employee";
            else if(rbcus.Checked)
                Role = "Customer";
            else
                MessageBox.Show("Select your Role");


            if (Name != "" || Uname != "" || Pass != "" || Address != "" || Role != "")
            {
                try
                {
                    SqlConnection conn = new SqlConnection(@"Data Source=DESKTOP-M04M9L1;Initial Catalog=Project;Integrated Security=True");
                    conn.Open();

                    string query = "insert into Info (Name,Role,Username,Password,Address) VALUES('" + Name + "','" + Role + "','" + Uname + "','" + Pass + "','" + Address + "')";

                    SqlCommand cmd = new SqlCommand(query, conn);
                    int result = cmd.ExecuteNonQuery();
                    if (result > 0)
                        MessageBox.Show("User registered successfully");
                    else
                    {
                        MessageBox.Show("Error occured");
                    }
                }
                catch (Exception ex)
                {
                    MessageBox.Show(ex.Message);
                }
            }
            else
                MessageBox.Show("Provide proper information");


        }

        private void btnsignin_Click(object sender, EventArgs e)
        {
            
        }

        private void linkLabel1_LinkClicked(object sender, LinkLabelLinkClickedEventArgs e)
        {
            this.Hide();
            Sign_in a = new Sign_in();
            a.Show();
        }

        private void SignUp_Load(object sender, EventArgs e)
        {

        }
    }
}
