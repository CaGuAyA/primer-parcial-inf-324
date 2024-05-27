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
using System.Net.Http;


namespace ejemplo_3
{
    public partial class Form1 : Form
    {
        private static readonly HttpClient client = new HttpClient();

        public Form1()
        {
            InitializeComponent();
        }

        private void label2_Click(object sender, EventArgs e)
        {

        }

        private void label1_Click(object sender, EventArgs e)
        {

        }

        private async void button1_Click(object sender, EventArgs e)
        {
            try
            {
                // Obtener los datos de los controles de texto
                int id_usuario_ci = Convert.ToInt32(textBox1.Text);
                string nombre = textBox2.Text;
                string apellido_pat = textBox3.Text;
                string apellido_mat = textBox4.Text;
                DateTime fechaNacimiento = DateTime.Parse(textBox5.Text);
                string contraseña = textBox6.Text;
                string cod = textBox7.Text;

                string url = $"https://localhost:44322/WebService1.asmx/AgregarUsuario?id_usuario_ci={id_usuario_ci}&nombre={nombre}&apellido_pat={apellido_pat}&apellido_mat={apellido_mat}&fechaNacimiento={fechaNacimiento.ToString("yyyy-MM-dd")}&contraseña={contraseña}&cod={cod}";

                HttpResponseMessage response = await client.GetAsync(url);

                if (response.IsSuccessStatusCode)
                    {
                        MessageBox.Show("Usuario agregado correctamente.", "Información", MessageBoxButtons.OK, MessageBoxIcon.Information);

                        miGrilla();
                    }
                    else
                    {
                        MessageBox.Show("Error al agregar usuario.", "Error", MessageBoxButtons.OK, MessageBoxIcon.Error);
                    }
            }
            catch (Exception ex)
            {
                // Mostrar un mensaje de error
                MessageBox.Show("Error: " + ex.Message, "Error", MessageBoxButtons.OK, MessageBoxIcon.Error);
            }
        }

        private void miGrilla()
        {
            SqlConnection con = new SqlConnection();
            string connectionString = @"Server=DESKTOP-O7HE3N2; Database=examen_1_324; Integrated Security=true;";
            con.ConnectionString = connectionString;
            SqlDataAdapter ada = new SqlDataAdapter();
            ada.SelectCommand = new SqlCommand();
            ada.SelectCommand.Connection = con;
            ada.SelectCommand.CommandText = "select * from Usuario";
            DataSet ds = new DataSet();
            ada.Fill(ds);
            dataGridView1.DataSource = ds.Tables[0];
        }

        private void Form1_Load(object sender, EventArgs e)
        {
            miGrilla();
        }

        private void textBox1_TextChanged(object sender, EventArgs e)
        {

        }

        private void label4_Click(object sender, EventArgs e)
        {

        }

        private void label7_Click(object sender, EventArgs e)
        {

        }

        private void label5_Click(object sender, EventArgs e)
        {

        }
        /*
        private void button2_Click(object sender, EventArgs e)
        {
            try
            {
                // Obtener los datos de los controles de texto
                int id = Convert.ToInt32(textBox1.Text);
                string nombre = textBox2.Text;
                string apellido_pat = textBox3.Text;
                string apellido_mat = textBox4.Text;
                DateTime fechaNacimiento = DateTime.Parse(textBox5.Text);
                string contraseña = textBox6.Text;
                string cod = textBox7.Text;

                // Crear un objeto HttpClient
                using (var httpClient = new HttpClient())
                {
                    // Configurar la dirección base del servicio web
                    httpClient.BaseAddress = new Uri("http://tu-servicio-web.com/");

                    // Crear el contenido de la solicitud HTTP (datos del usuario a agregar)
                    var content = new StringContent(
                        $"id_usuario_ci={id}&nombre={nombre}&apellido_pat={apellido_pat}&apellido_mat={apellido_mat}&fechaNacimiento={fechaNacimiento}&contraseña={contraseña}&cod={cod}",
                        Encoding.UTF8,
                        "application/x-www-form-urlencoded");

                    // Realizar la solicitud POST al método AgregarUsuario del servicio web
                    var response = await httpClient.PostAsync("ActualizarUsuario", content);

                    // Verificar si la solicitud fue exitosa
                    if (response.IsSuccessStatusCode)
                    {
                        // Mostrar un mensaje de éxito
                        MessageBox.Show("Usuario agregado correctamente.", "Información", MessageBoxButtons.OK, MessageBoxIcon.Information);

                        // Actualizar la grilla u otra interfaz según sea necesario
                        miGrilla();
                    }
                    else
                    {
                        // Mostrar un mensaje de error
                        MessageBox.Show("Error al agregar usuario.", "Error", MessageBoxButtons.OK, MessageBoxIcon.Error);
                    }
                }
            }
            catch (Exception ex)
            {
                // Mostrar un mensaje de error
                MessageBox.Show("Error: " + ex.Message, "Error", MessageBoxButtons.OK, MessageBoxIcon.Error);
            }
        }

        private void button3_Click(object sender, EventArgs e)
        {
            try
            {
                // Obtener los datos de los controles de texto
                int id = Convert.ToInt32(textBox1.Text);
                string nombre = textBox2.Text;
                string apellido_pat = textBox3.Text;
                string apellido_mat = textBox4.Text;
                DateTime fechaNacimiento = DateTime.Parse(textBox5.Text);
                string contraseña = textBox6.Text;
                string cod = textBox7.Text;

                // Crear un objeto HttpClient
                using (var httpClient = new HttpClient())
                {
                    // Configurar la dirección base del servicio web
                    httpClient.BaseAddress = new Uri("http://tu-servicio-web.com/");

                    var content = new StringContent(
                        $"id_usuario_ci={id}&nombre={nombre}&apellido_pat={apellido_pat}&apellido_mat={apellido_mat}&fechaNacimiento={fechaNacimiento}&contraseña={contraseña}&cod={cod}",
                        Encoding.UTF8,
                        "application/x-www-form-urlencoded");

                    // Realizar la solicitud POST al método AgregarUsuario del servicio web
                    var response = await httpClient.PostAsync("EliminarUsuario", content);

                    if (response.IsSuccessStatusCode)
                    {
                        MessageBox.Show("Usuario agregado correctamente.", "Información", MessageBoxButtons.OK, MessageBoxIcon.Information);

                        miGrilla();
                    }
                    else
                    {
                        // Mostrar un mensaje de error
                        MessageBox.Show("Error al agregar usuario.", "Error", MessageBoxButtons.OK, MessageBoxIcon.Error);
                    }
                }
            }
            catch (Exception ex)
            {
                // Mostrar un mensaje de error
                MessageBox.Show("Error: " + ex.Message, "Error", MessageBoxButtons.OK, MessageBoxIcon.Error);
            }
        }
        */
    }
}
