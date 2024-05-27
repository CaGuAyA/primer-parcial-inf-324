using System;
using System.Collections.Generic;
using System.Linq;
using System.Web;
using System.Web.Services;
using System.ComponentModel;
using System.Data;
using System.Drawing;
using System.Text;
using System.Threading.Tasks;
using System.Data.SqlClient;

namespace servicio_web
{
    /// <summary>
    /// Descripción breve de WebService1
    /// </summary>
    [WebService(Namespace = "http://tempuri.org/")]
    [WebServiceBinding(ConformsTo = WsiProfiles.BasicProfile1_1)]
    [System.ComponentModel.ToolboxItem(false)]
    // Para permitir que se llame a este servicio web desde un script, usando ASP.NET AJAX, quite la marca de comentario de la línea siguiente. 
    // [System.Web.Script.Services.ScriptService]
    public class WebService1 : System.Web.Services.WebService
    {
        [WebMethod]
        public string AgregarUsuario(int id_usuario_ci, string nombre, string apellido_pat, string apellido_mat,  DateTime fechaNacimiento, string contraseña, string cod)
        {
            try
            {
                SqlConnection con = new SqlConnection();
                SqlCommand cmd = new SqlCommand();
                // Cuando se inicia sql server con windows autentification se lo vuelve la cadena de conexion de esta manera
                string connectionString = @"Server=DESKTOP-O7HE3N2; Database=examen_1_324; Integrated Security=true;";
                con.ConnectionString = connectionString;
                con.Open();
                cmd.Connection = con;

                cmd.CommandText = $"insert into Usuario values ({id_usuario_ci}, '{nombre}', '{apellido_pat}', '{apellido_mat}', '{fechaNacimiento}', '{contraseña}')";
                cmd.ExecuteNonQuery();

                if (cod[0] == 'd')
                {
                    cmd.CommandText = $"insert into director_bancario values ('{cod}', {id_usuario_ci})";
                    cmd.ExecuteNonQuery();
                }
                else
                {
                    cmd.CommandText = $"insert into cliente values ('{cod}', {id_usuario_ci})";
                    cmd.ExecuteNonQuery();
                }

                con.Close();
                return "Usuario agregado correctamente.";
            }
            catch (Exception ex)
            {
                return "Error: " + ex.Message;
            }
        }

        [WebMethod]
        public string ActualizarUsuario(int id_usuario_ci, string nombre, string apellido_pat, string apellido_mat, DateTime fechaNacimiento, string contraseña, string cod)
        {
            try
            {
                SqlConnection con = new SqlConnection();
                SqlCommand cmd = new SqlCommand();

                string connectionString = @"Server=DESKTOP-O7HE3N2; Database=examen_1_324; Integrated Security=true;";
                con.ConnectionString = connectionString;
                con.Open();
                cmd.Connection = con;

                cmd.CommandText = $"UPDATE Usuario SET nombre = '{nombre}', apellido_pat = '{apellido_pat}', apellido_mat = '{apellido_mat}', fecha_nacimiento = '{fechaNacimiento}', contraseña = '{contraseña}' WHERE id_usuario_ci = {id_usuario_ci}";
                cmd.ExecuteNonQuery();

                if (cod[0] == 'd')
                {
                    cmd.CommandText = $"UPDATE director_bancario SET id_director_bancario='{cod}' WHERE id_usuario_ci={id_usuario_ci}";
                    cmd.ExecuteNonQuery();
                }
                else
                {
                    cmd.CommandText = $"UPDATE cliente SET id_cliente='{cod}' WHERE id_usuario_ci={id_usuario_ci}";
                    cmd.ExecuteNonQuery();
                }

                con.Close();
                return "Usuario actualizado correctamente.";
            }
            catch (Exception ex)
            {
                return "Error: " + ex.Message;
            }
        }

        [WebMethod]
        public string EliminarUsuario(int id_usuario_ci, string cod)
        {
            try
            {
                SqlConnection con = new SqlConnection();
                SqlCommand cmd = new SqlCommand();

                string connectionString = @"Server=DESKTOP-O7HE3N2; Database=examen_1_324; Integrated Security=true;";
                con.ConnectionString = connectionString;
                con.Open();
                cmd.Connection = con;

                if (cod[0] == 'd')
                {
                    cmd.CommandText = $"DELETE FROM director_bancario WHERE id_usuario_ci = {id_usuario_ci}";
                    cmd.ExecuteNonQuery();
                }
                else
                {
                    cmd.CommandText = $"DELETE FROM cliente WHERE id_usuario_ci = {id_usuario_ci}";
                    cmd.ExecuteNonQuery();
                }

                cmd.CommandText = $"DELETE FROM Usuario WHERE id_usuario_ci = {id_usuario_ci}";
                cmd.ExecuteNonQuery();

                con.Close();
                return "Usuario eliminado correctamente.";
            }
            catch (Exception ex)
            {
                return "Error: " + ex.Message;
            }
        }
    }
}
