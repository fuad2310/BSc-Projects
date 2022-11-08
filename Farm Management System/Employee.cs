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
    public partial class Employee : Form
    {
        private bool Cellclick = false;
        String Table = "";
        public Employee()
        {
            InitializeComponent();
        }
        private void LoadData()
        {
            try
            {
                if (Table == "Cow")
                {
                    SqlConnection conn = new SqlConnection(@"Data Source=DESKTOP-M04M9L1;Initial Catalog=Project;Integrated Security=True");
                    conn.Open();
                    string query = "select Breed, Quantity, Price, [Manager ID] from Cow";
                    SqlCommand cmd = new SqlCommand(query, conn);
                    SqlDataAdapter adp = new SqlDataAdapter(cmd);
                    DataSet ds = new DataSet();
                    adp.Fill(ds);
                    DataTable dt = ds.Tables[0];
                    dgv.DataSource = dt;
                    dgv.Refresh();
                }
                else if (Table == "Goat")
                {
                    SqlConnection conn = new SqlConnection(@"Data Source=DESKTOP-M04M9L1;Initial Catalog=Project;Integrated Security=True");
                    conn.Open();
                    string query = "select Breed, Quantity, Price, [Manager ID] from Goat";
                    SqlCommand cmd = new SqlCommand(query, conn);
                    SqlDataAdapter adp = new SqlDataAdapter(cmd);
                    DataSet ds = new DataSet();
                    adp.Fill(ds);
                    DataTable dt = ds.Tables[0];
                    dgv.DataSource = dt;
                    dgv.Refresh();
                }
                else if (Table == "Milk")
                {
                    SqlConnection conn = new SqlConnection(@"Data Source=DESKTOP-M04M9L1;Initial Catalog=Project;Integrated Security=True");
                    conn.Open();
                    string query = "select [Milk Type], Quantity, Price, [Manager ID] from Milk";
                    SqlCommand cmd = new SqlCommand(query, conn);
                    SqlDataAdapter adp = new SqlDataAdapter(cmd);
                    DataSet ds = new DataSet();
                    adp.Fill(ds);
                    DataTable dt = ds.Tables[0];
                    dgv.DataSource = dt;
                    dgv.Refresh();
                }
                else
                    MessageBox.Show("Select an item to view details");
            }
            catch (Exception ex)
            {
                MessageBox.Show(ex.Message);
            }
        }
        private void Refresh()
        {
            LoadData();
            dgv.ClearSelection();
            txtbrd.Text = "";
            txtquantity.Text = "";
            txtprice.Text = "";
            txtmngid.Text = "";
            
        }

        private void pictureBox1_Click(object sender, EventArgs e)
        {
            try
            {
                SqlConnection conn = new SqlConnection(@"Data Source=DESKTOP-M04M9L1;Initial Catalog=Project;Integrated Security=True");
                conn.Open();
                string query = "select Breed, Quantity, Price, [Manager ID] from Cow";
                SqlCommand cmd = new SqlCommand(query, conn);
                SqlDataAdapter adp = new SqlDataAdapter(cmd);
                DataSet ds = new DataSet();
                adp.Fill(ds);
                DataTable dt = ds.Tables[0];
                dgv.DataSource = dt;
                dgv.Refresh();
                Table = "Cow";
                dgv.ClearSelection();
            }
            catch (Exception ex)
            {
                MessageBox.Show(ex.Message);
            }

        }

        private void pictureBox2_Click(object sender, EventArgs e)
        {
            try
            {
                SqlConnection conn = new SqlConnection(@"Data Source=DESKTOP-M04M9L1;Initial Catalog=Project;Integrated Security=True");
                conn.Open();
                string query = "select Breed, Quantity, Price, [Manager ID] from Goat";
                SqlCommand cmd = new SqlCommand(query, conn);
                SqlDataAdapter adp = new SqlDataAdapter(cmd);
                DataSet ds = new DataSet();
                adp.Fill(ds);
                DataTable dt = ds.Tables[0];
                dgv.DataSource = dt;
                dgv.Refresh();
                Table = "Goat";
                dgv.ClearSelection();
            }
            catch (Exception ex)
            {
                MessageBox.Show(ex.Message);
            }
        }

        private void pictureBox3_Click(object sender, EventArgs e)
        {
            try
            {
                SqlConnection conn = new SqlConnection(@"Data Source=DESKTOP-M04M9L1;Initial Catalog=Project;Integrated Security=True");
                conn.Open();
                string query = "select [Milk Type], Quantity, Price, [Manager ID] from Milk";
                SqlCommand cmd = new SqlCommand(query, conn);
                SqlDataAdapter adp = new SqlDataAdapter(cmd);
                DataSet ds = new DataSet();
                adp.Fill(ds);
                DataTable dt = ds.Tables[0];
                dgv.DataSource = dt;
                dgv.Refresh();
                Table = "Milk";
                dgv.ClearSelection();
            }
            catch (Exception ex)
            {
                MessageBox.Show(ex.Message);
            }
        }

        private void txtbrd_TextChanged(object sender, EventArgs e)
        {

        }

        private void dgv_CellClick(object sender, DataGridViewCellEventArgs e)
        {
            if (e.RowIndex >= 0)
            {
                string Breed, Quantity, Price, Man_ID;
                Breed = dgv.Rows[e.RowIndex].Cells[0].Value.ToString();
                Quantity = dgv.Rows[e.RowIndex].Cells[1].Value.ToString();
                Price = dgv.Rows[e.RowIndex].Cells[2].Value.ToString();
                Man_ID = dgv.Rows[e.RowIndex].Cells[3].Value.ToString();
                txtbrd.Text = Breed;
                txtquantity.Text = Quantity;
                txtprice.Text = Price;
                txtmngid.Text = Man_ID;
                Cellclick = true;
            }
        }

        private void btnref_Click(object sender, EventArgs e)
        {
            Refresh();
            dgv.ClearSelection();
        }

        private void btnup_Click(object sender, EventArgs e)
        {
            if (Cellclick)
            {
                if (Table == "Cow")
                {
                    try
                    {
                        SqlConnection conn = new SqlConnection(@"Data Source=DESKTOP-M04M9L1;Initial Catalog=Project;Integrated Security=True");
                        conn.Open();

                        string query = "Update Cow set Quantity='" + txtquantity.Text + "' where Breed='" + txtbrd.Text + "'";
                        SqlCommand cmd = new SqlCommand(query, conn);
                        int result = cmd.ExecuteNonQuery();
                        if (result > 0)
                            MessageBox.Show("User updated successfully");
                        else
                        {
                            MessageBox.Show("Error occured");
                        }
                    }
                    catch (Exception ex)
                    {
                        MessageBox.Show(ex.Message);
                    }
                    Refresh();
                }
                else if (Table == "Goat")
                {
                    try
                    {
                        SqlConnection conn = new SqlConnection(@"Data Source=DESKTOP-M04M9L1;Initial Catalog=Project;Integrated Security=True");
                        conn.Open();

                        string query = "Update Goat set Quantity='" + txtquantity.Text + "' where Breed='" + txtbrd.Text + "'";
                        SqlCommand cmd = new SqlCommand(query, conn);
                        int result = cmd.ExecuteNonQuery();
                        if (result > 0)
                            MessageBox.Show("User updated successfully");
                        else
                        {
                            MessageBox.Show("Error occured");
                        }
                    }
                    catch (Exception ex)
                    {
                        MessageBox.Show(ex.Message);
                    }
                    Refresh();
                }
                if (Table == "Milk")
                {
                    try
                    {
                        SqlConnection conn = new SqlConnection(@"Data Source=DESKTOP-M04M9L1;Initial Catalog=Project;Integrated Security=True");
                        conn.Open();

                        string query = "Update Milk set Quantity='" + txtquantity.Text + "' where [Milk Type]='" + txtbrd.Text + "'";
                        SqlCommand cmd = new SqlCommand(query, conn);
                        int result = cmd.ExecuteNonQuery();
                        if (result > 0)
                            MessageBox.Show("User updated successfully");
                        else
                        {
                            MessageBox.Show("Error occured");
                        }
                    }
                    catch (Exception ex)
                    {
                        MessageBox.Show(ex.Message);
                    }
                    Refresh();
                }
            }
        }

        private void pictureBox4_Click(object sender, EventArgs e)
        {
            this.Hide();
            Sign_in sin = new Sign_in();
            sin.Show();
        }

        private void Employee_Load(object sender, EventArgs e)
        {

        }
    }
}
