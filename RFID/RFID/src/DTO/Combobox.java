package DTO;

public class Combobox {
	int key;
	String value;
	public Combobox(int i,String value) {
		this.key=i;
		this.value=value;
	}
	public int getKey() {
		return key;
	}
	public void setKey(int key) {
		this.key = key;
	}
	public String getValue() {
		return value;
	}
	public void setValue(String value) {
		this.value = value;
	}
	@Override
	public String toString() {
		return value;
	}
	
}
