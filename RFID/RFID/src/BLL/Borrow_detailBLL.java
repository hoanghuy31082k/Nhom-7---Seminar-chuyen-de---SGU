package BLL;

import java.util.ArrayList;

import DAL.Borrow_detailDAL;
import DAL.UserDAL;
import DTO.Borrow_detailDTO;
import DTO.UserDTO;

public class Borrow_detailBLL {
	public static ArrayList<Borrow_detailDTO> getBorrowDetailbyId(int id){
		return Borrow_detailDAL.getBorrowDetailbyId(id);
	}
}
