package DAL;

import java.sql.Connection;
import java.sql.ResultSet;
import java.sql.Statement;
import java.util.ArrayList;

import DTO.Borrow_detailDTO;
import DTO.UserDTO;
import UTIL.DBConnect;

public class Borrow_detailDAL {
	private static ResultSet rs =null;
	private static Statement stm=null;
	private static Connection con=null;
	//get All
	public static ArrayList<Borrow_detailDTO> getBorrowDetailbyId(int id){
		ArrayList<Borrow_detailDTO> br=new ArrayList<Borrow_detailDTO>();
		try {
			con= DBConnect.getConnect();
			if (con!=null) {
				stm=con.createStatement();
				String sql = "select * from borrow_detail where borrow_id="+id;
				rs=stm.executeQuery(sql);
				while (rs.next()) {
					br.add(new Borrow_detailDTO(rs.getInt("borrow_id"),rs.getInt("book_id")));
				}
				return br;
			}
		} catch (Exception e) {
			// TODO: handle exception
		}
		return null;
	}
	
}
