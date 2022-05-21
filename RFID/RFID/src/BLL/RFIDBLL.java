package BLL;

import DAL.RFIDDAL;
import DTO.RFIDTagDTO;

public class RFIDBLL {
	public static RFIDTagDTO getRFIDbyBookID(int id) {
		return RFIDDAL.getRFIDbyBookID(id);
	}
}
