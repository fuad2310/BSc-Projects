using System;
using System.Collections.Generic;
using System.ComponentModel;
using System.Data;
using System.Drawing;
using System.Linq;
using System.Text;
using System.Threading.Tasks;
using System.Windows.Forms;

namespace Farm_Management_System
{
    public partial class Confirmation : Form
    {
        public Confirmation(String a)
        {
            InitializeComponent();
            TK.Text = a+" TK";
        }

        private void Confirmation_Load(object sender, EventArgs e)
        {

        }

        private void button1_Click(object sender, EventArgs e)
        {
            MessageBox.Show("Thank you!/nDelivery man will contact with you soon.");
        }

        private void button2_Click(object sender, EventArgs e)
        {
            MessageBox.Show("Order canceled");
        }

        private void button3_Click(object sender, EventArgs e)
        {
            this.Hide();
            Customer cus = new Customer();
            cus.Show();
        }

        private void pictureBox1_Click(object sender, EventArgs e)
        {
            this.Hide();
            Sign_in sin = new Sign_in();
            sin.Show();
        }
    }
}
