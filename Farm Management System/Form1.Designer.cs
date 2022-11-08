namespace Farm_Management_System
{
    partial class SignUp
    {
        /// <summary>
        /// Required designer variable.
        /// </summary>
        private System.ComponentModel.IContainer components = null;

        /// <summary>
        /// Clean up any resources being used.
        /// </summary>
        /// <param name="disposing">true if managed resources should be disposed; otherwise, false.</param>
        protected override void Dispose(bool disposing)
        {
            if (disposing && (components != null))
            {
                components.Dispose();
            }
            base.Dispose(disposing);
        }

        #region Windows Form Designer generated code

        /// <summary>
        /// Required method for Designer support - do not modify
        /// the contents of this method with the code editor.
        /// </summary>
        private void InitializeComponent()
        {
            this.lblname = new System.Windows.Forms.Label();
            this.lbluname = new System.Windows.Forms.Label();
            this.lblpass = new System.Windows.Forms.Label();
            this.lbladd = new System.Windows.Forms.Label();
            this.lblrole = new System.Windows.Forms.Label();
            this.txtname = new System.Windows.Forms.TextBox();
            this.txtuname = new System.Windows.Forms.TextBox();
            this.txtpass = new System.Windows.Forms.TextBox();
            this.rbemp = new System.Windows.Forms.RadioButton();
            this.rbcus = new System.Windows.Forms.RadioButton();
            this.txtadd = new System.Windows.Forms.RichTextBox();
            this.btnsignup = new System.Windows.Forms.Button();
            this.label1 = new System.Windows.Forms.Label();
            this.linkLabel1 = new System.Windows.Forms.LinkLabel();
            this.SuspendLayout();
            // 
            // lblname
            // 
            this.lblname.AutoSize = true;
            this.lblname.Location = new System.Drawing.Point(33, 61);
            this.lblname.Name = "lblname";
            this.lblname.Size = new System.Drawing.Size(38, 13);
            this.lblname.TabIndex = 0;
            this.lblname.Text = "Name:";
            this.lblname.Click += new System.EventHandler(this.label1_Click);
            // 
            // lbluname
            // 
            this.lbluname.AutoSize = true;
            this.lbluname.Location = new System.Drawing.Point(33, 97);
            this.lbluname.Name = "lbluname";
            this.lbluname.Size = new System.Drawing.Size(58, 13);
            this.lbluname.TabIndex = 1;
            this.lbluname.Text = "Username:";
            // 
            // lblpass
            // 
            this.lblpass.AutoSize = true;
            this.lblpass.Location = new System.Drawing.Point(33, 141);
            this.lblpass.Name = "lblpass";
            this.lblpass.Size = new System.Drawing.Size(56, 13);
            this.lblpass.TabIndex = 2;
            this.lblpass.Text = "Password:";
            // 
            // lbladd
            // 
            this.lbladd.AutoSize = true;
            this.lbladd.Location = new System.Drawing.Point(33, 179);
            this.lbladd.Name = "lbladd";
            this.lbladd.Size = new System.Drawing.Size(48, 13);
            this.lbladd.TabIndex = 3;
            this.lbladd.Text = "Address:";
            this.lbladd.Click += new System.EventHandler(this.label4_Click);
            // 
            // lblrole
            // 
            this.lblrole.AutoSize = true;
            this.lblrole.Location = new System.Drawing.Point(33, 246);
            this.lblrole.Name = "lblrole";
            this.lblrole.Size = new System.Drawing.Size(32, 13);
            this.lblrole.TabIndex = 4;
            this.lblrole.Text = "Role:";
            // 
            // txtname
            // 
            this.txtname.Location = new System.Drawing.Point(108, 58);
            this.txtname.Name = "txtname";
            this.txtname.Size = new System.Drawing.Size(181, 20);
            this.txtname.TabIndex = 5;
            this.txtname.TextChanged += new System.EventHandler(this.txtname_TextChanged);
            // 
            // txtuname
            // 
            this.txtuname.Location = new System.Drawing.Point(108, 94);
            this.txtuname.Name = "txtuname";
            this.txtuname.Size = new System.Drawing.Size(181, 20);
            this.txtuname.TabIndex = 6;
            // 
            // txtpass
            // 
            this.txtpass.Location = new System.Drawing.Point(108, 138);
            this.txtpass.Name = "txtpass";
            this.txtpass.PasswordChar = '*';
            this.txtpass.Size = new System.Drawing.Size(181, 20);
            this.txtpass.TabIndex = 7;
            // 
            // rbemp
            // 
            this.rbemp.AutoSize = true;
            this.rbemp.Location = new System.Drawing.Point(108, 244);
            this.rbemp.Name = "rbemp";
            this.rbemp.Size = new System.Drawing.Size(71, 17);
            this.rbemp.TabIndex = 9;
            this.rbemp.TabStop = true;
            this.rbemp.Text = "Employee";
            this.rbemp.UseVisualStyleBackColor = true;
            // 
            // rbcus
            // 
            this.rbcus.AutoSize = true;
            this.rbcus.Location = new System.Drawing.Point(195, 244);
            this.rbcus.Name = "rbcus";
            this.rbcus.Size = new System.Drawing.Size(69, 17);
            this.rbcus.TabIndex = 10;
            this.rbcus.TabStop = true;
            this.rbcus.Text = "Customer";
            this.rbcus.UseVisualStyleBackColor = true;
            // 
            // txtadd
            // 
            this.txtadd.Location = new System.Drawing.Point(108, 176);
            this.txtadd.Name = "txtadd";
            this.txtadd.Size = new System.Drawing.Size(181, 55);
            this.txtadd.TabIndex = 11;
            this.txtadd.Text = "";
            // 
            // btnsignup
            // 
            this.btnsignup.BackColor = System.Drawing.SystemColors.GradientInactiveCaption;
            this.btnsignup.Location = new System.Drawing.Point(127, 279);
            this.btnsignup.Name = "btnsignup";
            this.btnsignup.Size = new System.Drawing.Size(75, 23);
            this.btnsignup.TabIndex = 12;
            this.btnsignup.Text = "Sign Up";
            this.btnsignup.UseVisualStyleBackColor = false;
            this.btnsignup.Click += new System.EventHandler(this.btnsignup_Click);
            // 
            // label1
            // 
            this.label1.AutoSize = true;
            this.label1.Font = new System.Drawing.Font("Comic Sans MS", 11.25F, System.Drawing.FontStyle.Bold, System.Drawing.GraphicsUnit.Point, ((byte)(0)));
            this.label1.Location = new System.Drawing.Point(40, 25);
            this.label1.Name = "label1";
            this.label1.Size = new System.Drawing.Size(249, 21);
            this.label1.TabIndex = 14;
            this.label1.Text = "Sign up with these informations:";
            // 
            // linkLabel1
            // 
            this.linkLabel1.AutoSize = true;
            this.linkLabel1.Font = new System.Drawing.Font("Microsoft Sans Serif", 9.75F, System.Drawing.FontStyle.Regular, System.Drawing.GraphicsUnit.Point, ((byte)(0)));
            this.linkLabel1.Location = new System.Drawing.Point(62, 319);
            this.linkLabel1.Name = "linkLabel1";
            this.linkLabel1.Size = new System.Drawing.Size(216, 16);
            this.linkLabel1.TabIndex = 15;
            this.linkLabel1.TabStop = true;
            this.linkLabel1.Text = "Already have an ID? Click to sign in";
            this.linkLabel1.LinkClicked += new System.Windows.Forms.LinkLabelLinkClickedEventHandler(this.linkLabel1_LinkClicked);
            // 
            // SignUp
            // 
            this.AutoScaleDimensions = new System.Drawing.SizeF(6F, 13F);
            this.AutoScaleMode = System.Windows.Forms.AutoScaleMode.Font;
            this.BackColor = System.Drawing.SystemColors.Info;
            this.ClientSize = new System.Drawing.Size(331, 353);
            this.Controls.Add(this.linkLabel1);
            this.Controls.Add(this.label1);
            this.Controls.Add(this.btnsignup);
            this.Controls.Add(this.txtadd);
            this.Controls.Add(this.rbcus);
            this.Controls.Add(this.rbemp);
            this.Controls.Add(this.txtpass);
            this.Controls.Add(this.txtuname);
            this.Controls.Add(this.txtname);
            this.Controls.Add(this.lblrole);
            this.Controls.Add(this.lbladd);
            this.Controls.Add(this.lblpass);
            this.Controls.Add(this.lbluname);
            this.Controls.Add(this.lblname);
            this.Name = "SignUp";
            this.Text = "Sign Up";
            this.Load += new System.EventHandler(this.SignUp_Load);
            this.ResumeLayout(false);
            this.PerformLayout();

        }

        #endregion

        private System.Windows.Forms.Label lblname;
        private System.Windows.Forms.Label lbluname;
        private System.Windows.Forms.Label lblpass;
        private System.Windows.Forms.Label lbladd;
        private System.Windows.Forms.Label lblrole;
        private System.Windows.Forms.TextBox txtname;
        private System.Windows.Forms.TextBox txtuname;
        private System.Windows.Forms.TextBox txtpass;
        private System.Windows.Forms.RadioButton rbemp;
        private System.Windows.Forms.RadioButton rbcus;
        private System.Windows.Forms.RichTextBox txtadd;
        private System.Windows.Forms.Button btnsignup;
        private System.Windows.Forms.Label label1;
        private System.Windows.Forms.LinkLabel linkLabel1;
    }
}

