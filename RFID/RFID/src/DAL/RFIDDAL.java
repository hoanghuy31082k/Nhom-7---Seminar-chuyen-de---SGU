package DAL;

import java.sql.Connection;
import java.sql.ResultSet;
import java.sql.Statement;
import java.util.ArrayList;

import DTO.Borrow_detailDTO;
import DTO.RFIDTagDTO;
import UTIL.DBConnect;

public class RFIDDAL {
	private static ResultSet rs =null;
	private static Statement stm=null;
	private static Connection con=null;
	//get All
	public static RFIDTagDTO getRFIDbyBookID(int id){
		RFIDTagDTO rfid = new RFIDTagDTO();
		try {
			con= DBConnect.getConnect();
			if (con!=null) {
				stm=con.createStatement();
				String sql = "select * from rfid_tags where book_id="+id+" limit 1";
				rs=stm.executeQuery(sql);
				while (rs.next()) {
					rfid = new RFIDTagDTO(rs.getInt("id"),rs.getInt("book_id"),rs.getString("rfid"));
				}
				return rfid;
			}
		} catch (Exception e) {
			// TODO: handle exception
		}
		return null;
	}
}
