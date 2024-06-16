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
        private string connectionString = @"Server=DESKTOP-O7HE3N2; Database=examen_1_324; Integrated Security=true;";

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

                SqlConnection conexionSQL = new SqlConnection(CadenaConexion);
                SqlCommand cmd = new SqlCommand();
                cmd.CommandType = CommandType.Text;
                cmd.Connection = conexionSQL;

                try
                {
                    conexionSQL.Open();

                    cmd.CommandText = "INSERT INTO Color_Base (R, G, B) VALUES (@R, @G, @B)";
                    cmd.Parameters.Clear();

                    cmd.Parameters.AddWithValue("@R", int.Parse(textBox1.Text));
                    cmd.Parameters.AddWithValue("@G", int.Parse(textBox2.Text));
                    cmd.Parameters.AddWithValue("@B", int.Parse(textBox3.Text));

                    cmd.ExecuteNonQuery();

                    cmd.CommandText = "INSERT INTO Color_Llegada (R, G, B) VALUES (@R, @G, @B)";
                    cmd.Parameters.Clear();
                    cmd.Parameters.AddWithValue("@R", int.Parse(textBox4.Text));
                    cmd.Parameters.AddWithValue("@G", int.Parse(textBox5.Text));
                    cmd.Parameters.AddWithValue("@B", int.Parse(textBox6.Text));

                    cmd.ExecuteNonQuery();

                    MessageBox.Show("Colores insertados correctamente.");
                    obtenerColoresBaseDB();
                    obtenerColoresLlegadaDB();
                }
                catch (Exception ex)
                {
                    MessageBox.Show("Error al conectarse a la base de datos: " + ex.Message);
                }
                finally
                {
                    conexionSQL.Close();
                }

                /*
                // Construir la solicitud HTTP con los datos del usuario
                string url = "https://localhost/WebService1.asmx/ActualizarUsuario";
                string postData = $"id_usuario_ci={id_usuario_ci}&nombre={nombre}&apellido_pat={apellido_pat}&apellido_mat={apellido_mat}&fechaNacimiento={fechaNacimiento:yyyy-MM-dd}&contraseña={contraseña}&cod={cod}";

                using (var client = new HttpClient())
                {
                    var content = new StringContent(postData, Encoding.UTF8, "application/x-www-form-urlencoded");
                    var response = await client.PostAsync(url, content);

                    if (response.IsSuccessStatusCode)
                    {
                        MessageBox.Show("Usuario actualizado correctamente.", "Información", MessageBoxButtons.OK, MessageBoxIcon.Information);
                        // Realizar cualquier acción adicional necesaria después de la actualización del usuario
                    }
                    else
                    {
                        MessageBox.Show("Error al actualizar usuario.", "Error", MessageBoxButtons.OK, MessageBoxIcon.Error);
                    }
                }
                */
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
    
        private async void button2_Click(object sender, EventArgs e)
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

                // Construir la solicitud HTTP con los datos del usuario
                string url = "https://localhost/WebService1.asmx/ActualizarUsuario";
                string postData = $"id_usuario_ci={id_usuario_ci}&nombre={nombre}&apellido_pat={apellido_pat}&apellido_mat={apellido_mat}&fechaNacimiento={fechaNacimiento:yyyy-MM-dd}&contraseña={contraseña}&cod={cod}";

                using (var client = new HttpClient())
                {
                    var content = new StringContent(postData, Encoding.UTF8, "application/x-www-form-urlencoded");
                    var response = await client.PostAsync(url, content);

                    if (response.IsSuccessStatusCode)
                    {
                        MessageBox.Show("Usuario actualizado correctamente.", "Información", MessageBoxButtons.OK, MessageBoxIcon.Information);
                        // Realizar cualquier acción adicional necesaria después de la actualización del usuario
                    }
                    else
                    {
                        MessageBox.Show("Error al actualizar usuario.", "Error", MessageBoxButtons.OK, MessageBoxIcon.Error);
                    }
                }
            }
            catch (Exception ex)
            {
                // Mostrar un mensaje de error
                MessageBox.Show("Error: " + ex.Message, "Error", MessageBoxButtons.OK, MessageBoxIcon.Error);
            }
        }

        private async void button3_Click(object sender, EventArgs e)
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

                // Construir la solicitud HTTP con los datos del usuario
                string url = "https://localhost/WebService1.asmx/ActualizarUsuario";
                string postData = $"id_usuario_ci={id_usuario_ci}&nombre={nombre}&apellido_pat={apellido_pat}&apellido_mat={apellido_mat}&fechaNacimiento={fechaNacimiento:yyyy-MM-dd}&contraseña={contraseña}&cod={cod}";

                using (var client = new HttpClient())
                {
                    var content = new StringContent(postData, Encoding.UTF8, "application/x-www-form-urlencoded");
                    var response = await client.PostAsync(url, content);

                    if (response.IsSuccessStatusCode)
                    {
                        MessageBox.Show("Usuario actualizado correctamente.", "Información", MessageBoxButtons.OK, MessageBoxIcon.Information);
                        // Realizar cualquier acción adicional necesaria después de la actualización del usuario
                    }
                    else
                    {
                        MessageBox.Show("Error al actualizar usuario.", "Error", MessageBoxButtons.OK, MessageBoxIcon.Error);
                    }
                }
            }
            catch (Exception ex)
            {
                // Mostrar un mensaje de error
                MessageBox.Show("Error: " + ex.Message, "Error", MessageBoxButtons.OK, MessageBoxIcon.Error);
            }
        }
  
    }
}
