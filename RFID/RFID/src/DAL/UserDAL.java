package DAL;
import java.sql.*;
import java.util.ArrayList;

import DTO.UserDTO;
import UTIL.DBConnect;


public class UserDAL {
	private static ResultSet rs =null;
	private static Statement stm=null;
	private static Connection con=null;
	//get All
	public static ArrayList<UserDTO> getAll(){
		ArrayList<UserDTO> users=new ArrayList<UserDTO>();
		try {
			con= DBConnect.getConnect();
			if (con!=null) {
				stm=con.createStatement();
				String sql = "select * from users ";
				rs=stm.executeQuery(sql);
				while (rs.next()) {
					users.add(new UserDTO(rs.getInt("id"),rs.getString("name"),rs.getString("username"),rs.getString("password"),rs.getString("phone")));
				}
				return users;
			}
		} catch (Exception e) {
			// TODO: handle exception
		}
		return null;
	}
	
}
