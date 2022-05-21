package BLL;

import java.util.ArrayList;

import DAL.BookDAL;
import DTO.BookDTO;

public class BookBLL {
	public static BookDTO getBookByID(int id) {
		return BookDAL.getBookById(id);
	}
	
	public static ArrayList<BookDTO> getAll() {
		return BookDAL.getAll();
	}
	
	public static int updateBook(BookDTO book) {
		return BookDAL.updateBook(book);
	}
}
