package DAL;

import java.sql.Connection;
import java.sql.PreparedStatement;
import java.sql.ResultSet;
import java.sql.Statement;
import java.util.ArrayList;

import DTO.BookDTO;
import DTO.Borrow_detailDTO;
import DTO.UserDTO;
import UTIL.DBConnect;

public class BookDAL {
	private static ResultSet rs =null;
	private static Statement stm=null;
	private static Connection con=null;
	//get All
	public static BookDTO getBookById(int id){
		BookDTO book = new BookDTO();
		try {
			con= DBConnect.getConnect();
			if (con!=null) {
				stm=con.createStatement();
				String sql = "select * from books where id="+id+" limit 1";
				rs=stm.executeQuery(sql);
				while (rs.next()) {
					book= new BookDTO(rs.getInt("id"),rs.getInt("status"),rs.getString("title"),rs.getString("author"));
				}
				return book;
			}
		} catch (Exception e) {
			// TODO: handle exception
		}
		return null;
	}
	
	public static ArrayList<BookDTO> getAll(){
		ArrayList<BookDTO> books=new ArrayList<BookDTO>();
		try {
			con= DBConnect.getConnect();
			if (con!=null) {
				stm=con.createStatement();
				String sql = "select * from books";
				rs=stm.executeQuery(sql);
				while (rs.next()) {
					books.add(new BookDTO(rs.getInt("id"),rs.getInt("status"),rs.getString("title"),rs.getString("author")));
				}
				return books;
			}
		} catch (Exception e) {
			// TODO: handle exception
		}
		return null;
	}
	
	public static int updateBook(BookDTO book) {
		try {
			con= DBConnect.getConnect();
			if (con!=null) {
				stm=con.createStatement();
				String sql = "update books set status=? where id="+book.getId();
				PreparedStatement ps= con.prepareStatement(sql);
				ps.setString(1, String.valueOf(book.getStatus()));
				return ps.executeUpdate();
			}
		} catch (Exception e) {
			System.out.println(e);
		}
		return 0;
	}
}
