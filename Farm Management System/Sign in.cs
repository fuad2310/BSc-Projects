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
    public partial class Sign_in : Form
    {
        public Sign_in()
        {
            InitializeComponent();
        }

        private void label1_Click(object sender, EventArgs e)
        {

        }

        private void btnsignin_Click(object sender, EventArgs e)
        {
            if(comboBox1.Text=="<Select>")
            {
                MessageBox.Show("Please select your role");
            }
            else
            {
            SqlConnection con = new SqlConnection(@"Data Source=DESKTOP-M04M9L1;Initial Catalog=Project;Integrated Security=True");
            SqlDataAdapter sda = new SqlDataAdapter("Select Count(*) from Info where Username='" + txtuname.Text + "'and Password='" + txtpass.Text + "'", con);
            DataTable dt = new DataTable();
            sda.Fill(dt);
            if (dt.Rows[0][0].ToString() == "1")
            {
                if (comboBox1.SelectedItem.ToString() == "Employee")
                {
                    this.Hide();
                    Employee emp = new Employee();
                    emp.Show();
                }
                else if(comboBox1.SelectedItem.ToString()=="Admin")
                {
                    this.Hide();
                    List ad = new List();
                    ad.Show();
                }
                else
                {
                    this.Hide();
                    Customer cus = new Customer();
                    cus.Show();
                }
            }
            else
                MessageBox.Show("Please Enter Correct Username or Password");

            txtuname.Text = "";
            txtpass.Text = "";
            }
            
        }

        private void linkLabel1_LinkClicked(object sender, LinkLabelLinkClickedEventArgs e)
        {
            this.Hide();
            SignUp x = new SignUp();
            x.Show();
        }

        private void Sign_in_Load(object sender, EventArgs e)
        {

        }
    }
}
