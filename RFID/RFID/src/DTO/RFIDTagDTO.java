package DTO;

public class RFIDTagDTO {
	int id,book_id;
	String rfid;
	public RFIDTagDTO() {
		super();
	}
	public RFIDTagDTO(int id, int book_id, String rfid) {
		super();
		this.id = id;
		this.book_id = book_id;
		this.rfid = rfid;
	}
	public int getId() {
		return id;
	}
	public void setId(int id) {
		this.id = id;
	}
	public int getBook_id() {
		return book_id;
	}
	public void setBook_id(int book_id) {
		this.book_id = book_id;
	}
	public String getRfid() {
		return rfid;
	}
	public void setRfid(String rfid) {
		this.rfid = rfid;
	}
	
	
}
