package DTO;

public class BorrowDTO {
	int id,user_id;
	String begindate,enddate,returndate;
	public BorrowDTO() {
		super();
	}
	public BorrowDTO(int id, int user_id, String begindate, String enddate, String returndate) {
		super();
		this.id = id;
		this.user_id = user_id;
		this.begindate = begindate;
		this.enddate = enddate;
		this.returndate = returndate;
	}
	public int getId() {
		return id;
	}
	public void setId(int id) {
		this.id = id;
	}
	public int getUser_id() {
		return user_id;
	}
	public void setUser_id(int user_id) {
		this.user_id = user_id;
	}
	public String getBegindate() {
		return begindate;
	}
	public void setBegindate(String begindate) {
		this.begindate = begindate;
	}
	public String getEnddate() {
		return enddate;
	}
	public void setEnddate(String enddate) {
		this.enddate = enddate;
	}
	public String getReturndate() {
		return returndate;
	}
	public void setReturndate(String returndate) {
		this.returndate = returndate;
	}
	
	
}
