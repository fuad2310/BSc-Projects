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
    public partial class List : Form
    {
        bool cellclick = false;
        public List()
        {
            InitializeComponent();
        }
        void Load_data()
        {
            try
            {
                SqlConnection conn = new SqlConnection(@"Data Source=DESKTOP-M04M9L1;Initial Catalog=Project;Integrated Security=True");
                conn.Open();

                string query = "Select ID, Name, Role, Username, Address from Info where Role='Employee'";
                SqlCommand cmd = new SqlCommand(query, conn);
                SqlDataAdapter adp = new SqlDataAdapter(cmd);
                DataSet ds = new DataSet();
                adp.Fill(ds);
                DataTable dt = ds.Tables[0];
                dgv.DataSource = dt;
            }
            catch (Exception ex)
            {
                MessageBox.Show(ex.Message);
            }

            dgv.ClearSelection();
        }
        void Refresh()
        {
            Load_data();
            txtAdd.Text = "";
            txtID.Text = "";
            txtName.Text = "";
            txtRole.Text = "";
            Txtuname.Text = "";
            dgv.ClearSelection();
        }
        private void List_Load(object sender, EventArgs e)
        {
            try
            {
                SqlConnection conn = new SqlConnection(@"Data Source=DESKTOP-M04M9L1;Initial Catalog=Project;Integrated Security=True");
                conn.Open();

                string query = "Select ID, Name, Role, Username, Address from Info where Role='Employee'";
                SqlCommand cmd = new SqlCommand(query, conn);
                SqlDataAdapter adp = new SqlDataAdapter(cmd);
                DataSet ds = new DataSet();
                adp.Fill(ds);
                DataTable dt = ds.Tables[0];
                dgv.DataSource = dt;
            }
            catch (Exception ex)
            {
                MessageBox.Show(ex.Message);
            }

            dgv.ClearSelection();                        
        }

        private void fillByToolStripButton_Click(object sender, EventArgs e)
        {
            try
            {
                //this.infoTableAdapter.FillBy(this.projectDataSet4.Info);
                dgv.ClearSelection();
            }
            catch (System.Exception ex)
            {
                System.Windows.Forms.MessageBox.Show(ex.Message);
            }

        }

        private void fillBy1ToolStripButton_Click(object sender, EventArgs e)
        {
            try
            {
                //this.infoTableAdapter.FillBy1(this.projectDataSet4.Info);
                dgv.ClearSelection();
            }
            catch (System.Exception ex)
            {
                System.Windows.Forms.MessageBox.Show(ex.Message);
            }

        }

        private void dgv_CellClick(object sender, DataGridViewCellEventArgs e)
        {
            
        }

        private void label1_Click(object sender, EventArgs e)
        {

        }

        private void btnadd_Click(object sender, EventArgs e)
        {
            if (txtAdd.Text == "" || txtName.Text == "" || txtRole.Text == "" || Txtuname.Text == "")
                MessageBox.Show("Provide all details");
            else
            {
                try
                {
                    SqlConnection conn = new SqlConnection(@"Data Source=DESKTOP-M04M9L1;Initial Catalog=Project;Integrated Security=True");
                    conn.Open();

                    string query = "Insert into Info(Name,Username,Password,Role,Address) values('" + txtName.Text + "','" + Txtuname.Text + "','DEFAULT','" +txtRole.Text+"','"+txtAdd.Text+"')";
                    SqlCommand cmd = new SqlCommand(query, conn);
                    int result = cmd.ExecuteNonQuery();
                    if (result > 0)
                        MessageBox.Show("User inserted successfully");
                    else
                    {
                        MessageBox.Show("Error occured");
                    }
                }
                catch (Exception ex)
                {
                    MessageBox.Show(ex.Message);
                }

                Load_data();
                Refresh();
            }
        }

        private void txtID_Click(object sender, EventArgs e)
        {
            txtID.Text = "";
        }

        private void txtName_Click(object sender, EventArgs e)
        {
            txtName.Text = "";
        }

        private void txtRole_Click(object sender, EventArgs e)
        {
            txtRole.Text = "";
        }

        private void Txtuname_Click(object sender, EventArgs e)
        {
            Txtuname.Text = "";
        }

        private void txtAdd_Click(object sender, EventArgs e)
        {
            txtAdd.Text = "";
        }

        private void btndel_Click(object sender, EventArgs e)
        {
            if(cellclick)
            {
                try
                {
                    SqlConnection conn = new SqlConnection(@"Data Source=DESKTOP-M04M9L1;Initial Catalog=Project;Integrated Security=True");
                    conn.Open();

                    string query = "Delete from Info where ID='" + txtID.Text + "'";
                    SqlCommand cmd = new SqlCommand(query, conn);
                    int result = cmd.ExecuteNonQuery();
                    if (result > 0)
                        MessageBox.Show("User deleted successfully");
                    else
                    {
                        MessageBox.Show("Error occured");
                    }
                }
                catch (Exception ex)
                {
                    MessageBox.Show(ex.Message);
                }
                Load_data();
                Refresh();
            }
        }

        private void pictureBox1_Click(object sender, EventArgs e)
        {
            this.Hide();
            Sign_in sin = new Sign_in();
            sin.Show();
        }

        private void button1_Click(object sender, EventArgs e)
        {
            this.Hide();
            Admin ad = new Admin();
            ad.Show();
        }

        private void dgv_CellClick_1(object sender, DataGridViewCellEventArgs e)
        {
            if (e.RowIndex >= 0)
            {
                string ID, Name, Username, Role, Address;
                ID = dgv.Rows[e.RowIndex].Cells[0].Value.ToString();
                Name = dgv.Rows[e.RowIndex].Cells[1].Value.ToString();
                Username = dgv.Rows[e.RowIndex].Cells[3].Value.ToString();
                Role = dgv.Rows[e.RowIndex].Cells[2].Value.ToString();
                Address = dgv.Rows[e.RowIndex].Cells[4].Value.ToString();
                txtID.Text = ID;
                txtName.Text = Name;
                Txtuname.Text = Username;
                txtRole.Text = Role;
                txtAdd.Text = Address;
                cellclick = true;
            }
        }

        private void btnref_Click(object sender, EventArgs e)
        {
            Refresh();
        }
    }
}
