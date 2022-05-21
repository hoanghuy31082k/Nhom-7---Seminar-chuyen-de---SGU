package DTO;

public class Borrow_detailDTO {
	int borrow_id,book_id;

	public Borrow_detailDTO() {
		super();
	}

	public Borrow_detailDTO(int borrow_id, int book_id) {
		super();
		this.borrow_id = borrow_id;
		this.book_id = book_id;
	}

	public int getBorrow_id() {
		return borrow_id;
	}

	public void setBorrow_id(int borrow_id) {
		this.borrow_id = borrow_id;
	}

	public int getBook_id() {
		return book_id;
	}

	public void setBook_id(int book_id) {
		this.book_id = book_id;
	}
	
	
}
