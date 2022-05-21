package UTIL;
import java.sql.*;

import javax.swing.JOptionPane;

public class DBConnect {
	private static String host="localhost";
	private static String port="3306";
	private static String db="rfid";
	private static String username="root";
	private static String password="";
	public static Connection getConnect() {
		try {
			Class.forName("com.mysql.jdbc.Driver");
			Connection con = DriverManager.getConnection("jdbc:mysql://"+host+":"+port+"/"+db+"?useUnicode=true&characterEncoding=UTF-8",username,password);
			return con;
		} catch (Exception e) {
			JOptionPane.showMessageDialog(null, "Kết nối thất bại", "Lỗi", 0);
			return null;
		}
	}
	
}
