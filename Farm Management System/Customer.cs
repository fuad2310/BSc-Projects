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
    public partial class Customer : Form
    {
        bool Cellclick1 = false;
        bool Cellclick2 = false;
        bool Cellclick3 = false;
        int Total;

        public Customer()
        {
            InitializeComponent();
        }

        private void pictureBox1_Click(object sender, EventArgs e)
        {

        }

        private void Customer_Load(object sender, EventArgs e)
        {
            // TODO: This line of code loads data into the 'projectDataSet3.Milk' table. You can move, or remove it, as needed.
            this.milkTableAdapter.Fill(this.projectDataSet3.Milk);
            // TODO: This line of code loads data into the 'projectDataSet2.Goat' table. You can move, or remove it, as needed.
            this.goatTableAdapter.Fill(this.projectDataSet2.Goat);
            // TODO: This line of code loads data into the 'projectDataSet1.Cow' table. You can move, or remove it, as needed.
            this.cowTableAdapter1.Fill(this.projectDataSet1.Cow);
            // TODO: This line of code loads data into the 'projectDataSet.Cow' table. You can move, or remove it, as needed.
            this.cowTableAdapter.Fill(this.projectDataSet.Cow);
            dgv.ClearSelection();
            dgv2.ClearSelection();
            dgv3.ClearSelection();
        }

        private void dgv_CellClick(object sender, DataGridViewCellEventArgs e)
        {
            if (e.RowIndex >= 0)
            {
                string Breedc, Pricec;
                Breedc = dgv.Rows[e.RowIndex].Cells[0].Value.ToString();
                Pricec = dgv.Rows[e.RowIndex].Cells[1].Value.ToString();
                txtbrcow.Text = Breedc;
                txtprcow.Text = Pricec;
                Cellclick1 = true;
            }
        }

        private void dgv2_CellClick(object sender, DataGridViewCellEventArgs e)
        {
            string Breedg, Priceg;
            Breedg = dgv2.Rows[e.RowIndex].Cells[0].Value.ToString();
            Priceg = dgv2.Rows[e.RowIndex].Cells[1].Value.ToString();
            txtbrgoat.Text = Breedg;
            txtprgoat.Text = Priceg;
            Cellclick2 = true;
        }

        private void dgv3_CellClick(object sender, DataGridViewCellEventArgs e)
        {
            string Breedm, Pricem;
            Breedm = dgv3.Rows[e.RowIndex].Cells[0].Value.ToString();
            Pricem = dgv3.Rows[e.RowIndex].Cells[1].Value.ToString();
            txtbrmilk.Text = Breedm;
            txtprmilk.Text = Pricem;
            Cellclick3 = true;
        }

        private void txtcowq_TextChanged(object sender, EventArgs e)
        {
            txtcowq.Text = "";
        }

        private void txtgoatq_TextChanged(object sender, EventArgs e)
        {
            txtgoatq.Text = "";
        }

        private void txtmilkq_TextChanged(object sender, EventArgs e)
        {
            txtmilkq.Text = "";
        }

        private void label8_Click(object sender, EventArgs e)
        {

        }

        private void label5_Click(object sender, EventArgs e)
        {

        }

        private void button1_Click(object sender, EventArgs e)
        {
            if (txtbrcow.Text == "" && txtbrgoat.Text == "" && txtbrmilk.Text == "")
                MessageBox.Show("Please Select any product to buy");
            else
            {
                int Totalc = Convert.ToInt32(txtprcow.Text) * Convert.ToInt32(txtcowq.Text);
                int Totalg = Convert.ToInt32(txtprgoat.Text) * Convert.ToInt32(txtgoatq.Text);
                int Totalm = Convert.ToInt32(txtprmilk.Text) * Convert.ToInt32(txtmilkq.Text);
                Total = Totalc + Totalg + Totalm;
                this.Hide();
                Confirmation confrm = new Confirmation(Convert.ToString(Total));
                confrm.Show();
            }
        }

        private void txtcowq_MouseClick(object sender, MouseEventArgs e)
        {
            txtcowq.Text = "";
        }

        private void txtgoatq_Click(object sender, EventArgs e)
        {
            txtgoatq.Text = "";
        }

        private void txtmilkq_Click(object sender, EventArgs e)
        {
            txtmilkq.Text = "";
        }
    }
}
