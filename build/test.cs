using API_QLNH.Models;
using Microsoft.AspNetCore.Http;
using Microsoft.AspNetCore.Mvc;
using Microsoft.Data.SqlClient;
using System.Data;

namespace API_QLNH.Controllers
{
    [Route("api/[controller]")]
    [ApiController]
    public class MonAnController : ControllerBase
    {
        private readonly IConfiguration _configuration;
        public MonAnController(IConfiguration configuration)
        {
            _configuration = configuration;
        }
                    [HttpGet]
                    public JsonResult Get()
                    {
                        string query = "Select  * from MonAn";
                        DataTable table  = new DataTable();
                        String sqlDataSource = _configuration.GetConnectionString("QLNh");
                        SqlDataReader myReader;
                        using (SqlConnection myCon = new SqlConnection(sqlDataSource))
                        {
                            myCon.Open();
                            using (SqlCommand myCommand = new SqlCommand(query, myCon))
                            {
                                myReader = myCommand.ExecuteReader();
                                table.Load(myReader);
                                myReader.Close();
                                myCon.Close();
                            }
                    }
                     return new JsonResult(table);
                    }
                    [HttpPost]
                    public JsonResult Post(MonAn MonAn)
                       {
                            string query = @"Insert into MonAn values ('"+MonAn.tenMonAn+ "')";
                            DataTable table = new DataTable();
                            String sqlDataSource = _configuration.GetConnectionString("QLNh");
                            SqlDataReader myReader;
                            using (SqlConnection myCon = new SqlConnection(sqlDataSource))
                            {
                                myCon.Open();
                                using (SqlCommand myCommand = new SqlCommand(query, myCon))
                                {
                                    myReader = myCommand.ExecuteReader();
                                    table.Load(myReader);
                                    myReader.Close();
                                    myCon.Close();
                                }
                            }
                            return new JsonResult("Thêm mới thành công!");
                        }
        [HttpPut]
        public JsonResult Put(MonAn MonAn)
        {
            string query = @"Update MonAn set ('" + MonAn.tenMonAn + "') where maMonAn = "+MonAn.maMonAn;
            DataTable table = new DataTable();
            String sqlDataSource = _configuration.GetConnectionString("QLNh");
            SqlDataReader myReader;
            using (SqlConnection myCon = new SqlConnection(sqlDataSource))
            {
                myCon.Open();
                using (SqlCommand myCommand = new SqlCommand(query, myCon))
                {
                    myReader = myCommand.ExecuteReader();
                    table.Load(myReader);
                    myReader.Close();
                    myCon.Close();
                }
            }
            return new JsonResult("Cập nhật  thành công!");
        }
        [HttpDelete]
        public JsonResult Delete(MonAn MonAn)
        {
            string query = @"=Delete from MonAn where maMonAn = "+MonAn.maMonAn;
            DataTable table = new DataTable();
            String sqlDataSource = _configuration.GetConnectionString("QLNh");
            SqlDataReader myReader;
            using (SqlConnection myCon = new SqlConnection(sqlDataSource))
            {
                myCon.Open();
                using (SqlCommand myCommand = new SqlCommand(query, myCon))
                {
                    myReader = myCommand.ExecuteReader();
                    table.Load(myReader);
                    myReader.Close();
                    myCon.Close();
                }
            }
            return new JsonResult("Xóa  thành công!");
        }

    }

    }

