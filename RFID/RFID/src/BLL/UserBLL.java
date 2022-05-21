package BLL;

import java.util.ArrayList;

import DAL.UserDAL;
import DTO.UserDTO;

public class UserBLL {
	public static ArrayList<UserDTO> getAll(){
		return UserDAL.getAll();
	}
}
