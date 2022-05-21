package GUI;

import java.awt.BorderLayout;
import java.awt.EventQueue;

import javax.swing.JFrame;
import javax.swing.JPanel;
import javax.swing.border.EmptyBorder;
import java.awt.Color;
import javax.swing.JScrollPane;
import javax.swing.JTable;
import javax.swing.JRadioButton;
import javax.swing.JTextField;
import javax.swing.JComboBox;
import javax.swing.JLabel;
import javax.swing.JOptionPane;

import java.awt.Font;
import javax.swing.JButton;
import javax.swing.event.ChangeListener;
import javax.swing.table.DefaultTableModel;

import com.caen.RFIDLibrary.CAENRFIDException;
import com.caen.RFIDLibrary.CAENRFIDLogicalSource;
import com.caen.RFIDLibrary.CAENRFIDLogicalSourceConstants;
import com.caen.RFIDLibrary.CAENRFIDPort;
import com.caen.RFIDLibrary.CAENRFIDReader;
import com.caen.RFIDLibrary.CAENRFIDReaderInfo;
import com.caen.RFIDLibrary.CAENRFIDTag;

import BLL.BookBLL;
import BLL.Borrow_detailBLL;
import BLL.RFIDBLL;
import BLL.UserBLL;
import DAL.Borrow_detailDAL;
import DAL.RFIDDAL;
import DTO.BookDTO;
import DTO.Borrow_detailDTO;
import DTO.Combobox;
import DTO.RFIDTagDTO;
import DTO.UserDTO;

import javax.swing.event.ChangeEvent;
import java.awt.event.MouseAdapter;
import java.awt.event.MouseEvent;
import java.util.ArrayList;
import java.util.Arrays;
import java.util.Iterator;
import java.awt.event.KeyAdapter;
import java.awt.event.KeyEvent;

public class MainGUI extends JFrame {

	private JPanel contentPane;
	private JTable table;
	private JTextField tfBorrowID;
	private JComboBox cbname;
	private DefaultTableModel model;
	public static int currentBorrrow=0;
	private JLabel msgSuccess,msgFail;
	ArrayList<String> EPC;
	String temp="";
	public static boolean[] check;

	/**
	 * Launch the application.
	 */
	public static void main(String[] args) {
		EventQueue.invokeLater(new Runnable() {
			public void run() {
				try {
					MainGUI frame = new MainGUI();
					frame.setVisible(true);
				} catch (Exception e) {
					e.printStackTrace();
				}
			}
		});
	}
	
	public static String hex(byte[] bytes) {
        StringBuilder result = new StringBuilder();
        for (byte aByte : bytes) {
            result.append(String.format("%02x", aByte));
            // upper case
            // result.append(String.format("%02X", aByte));
        }
        return result.toString().toUpperCase();
    }
	
	public void load() {
//		cbname.removeAllItems();
//		if(UserBLL.getAll()!=null) {
//			for (UserDTO user: UserBLL.getAll()) {
//				cbname.addItem(new Combobox(user.getId(), user.getName()));	
//			}
//		}
		model= new DefaultTableModel() {
			@Override
			public boolean isCellEditable(int row, int column) {
		       //all cells false
		       return false;
		    }
		};
		
		model.setColumnIdentifiers(new String[] {"RFID","Tên sách","Tình trạng"});
		table.setModel(model);
	}
	
	public static void checkRFID(String EPC, boolean[] check, int current) {
		int flag=0;
		for (Borrow_detailDTO br: Borrow_detailBLL.getBorrowDetailbyId(current)) {
			if (RFIDBLL.getRFIDbyBookID(br.getBook_id()).getRfid().equals(EPC)) {
				flag=1;
				check[br.getBook_id()]= true;
				break;
			}
		}
		if (flag==0) {
			JOptionPane.showMessageDialog(null, "ID "+EPC+" không có trong danh sách!", "Thông báo", 1);
		}
	}
	
	
	
	public void loadtable(boolean[] check) {
		model= new DefaultTableModel() {
			@Override
			public boolean isCellEditable(int row, int column) {
		       //all cells false
		       return false;
		    }
		};
		
		
		model.setColumnIdentifiers(new String[] {"RFID","Tên sách","Tình trạng"});
		if (tfBorrowID.getText().isEmpty()) {
			msgFail.setText("");
			msgSuccess.setText("");
		} else {
			if (!Borrow_detailBLL.getBorrowDetailbyId(Integer.parseInt(tfBorrowID.getText())).isEmpty()) {
				
				for (Borrow_detailDTO br: Borrow_detailBLL.getBorrowDetailbyId(Integer.parseInt(tfBorrowID.getText()))) {
					model.addRow(new String[] {
							RFIDBLL.getRFIDbyBookID(br.getBook_id()).getRfid(),BookBLL.getBookByID(br.getBook_id()).getTitle(),getStatus(BookBLL.getBookByID(br.getBook_id()),br.getBook_id() , check)
					});
					
				}
				msgSuccess.setText("Tra cứu mã mượn thành công!");
				msgFail.setText("");
			} else {
				msgFail.setText("Tra cứu mã mượn thất bại!");
				msgSuccess.setText("");
			}	
		}
		
		table.setModel(model);
	}
	
	
	
	public static String getStatus(BookDTO book,int id, boolean[] check) {
		if (book.getStatus()==2) {
			check[id]=true;
			return "Đã xác thực";
		}
		if (book.getStatus()==1 && check[id]==true) {
			return "Đã xác thực";
		}
		return "Chưa xác thực";
	}
	
	public static boolean isfullchecked(boolean[] check, int current) {
		for (Borrow_detailDTO br: Borrow_detailBLL.getBorrowDetailbyId(current)) {
			if (check[br.getBook_id()]== false) {
				return false;
			}
		}
		return true;
	}

	/**
	 * Create the frame.
	 */
	public MainGUI() {
		
		setTitle("Quản lý mượn");
		setDefaultCloseOperation(JFrame.EXIT_ON_CLOSE);
		setBounds(100, 100, 889, 523);
		contentPane = new JPanel();
		contentPane.setBorder(new EmptyBorder(5, 5, 5, 5));
		setContentPane(contentPane);
		contentPane.setLayout(null);
		
		JPanel panel = new JPanel();
		panel.setBackground(Color.WHITE);
		panel.setBounds(0, 0, 873, 484);
		contentPane.add(panel);
		panel.setLayout(null);
		
		JScrollPane scrollPane = new JScrollPane();
		scrollPane.setBounds(10, 181, 853, 292);
		panel.add(scrollPane);
		
		table = new JTable();
		table.setFillsViewportHeight(true);
		scrollPane.setViewportView(table);
		JButton btnNewButton_1 = new JButton("Duyệt");
		
		JRadioButton selectedbyBorrowID = new JRadioButton("Mã mượn");
		
		
		selectedbyBorrowID.setSelected(true);
		selectedbyBorrowID.setBackground(Color.WHITE);
		selectedbyBorrowID.setBounds(10, 7, 109, 23);
		panel.add(selectedbyBorrowID);
		
		msgSuccess = new JLabel("");
		msgSuccess.setForeground(new Color(34, 139, 34));
		msgSuccess.setBounds(10, 68, 215, 14);
		panel.add(msgSuccess);
		
		msgFail = new JLabel("");
		msgFail.setForeground(new Color(255, 0, 0));
		msgFail.setBounds(10, 68, 215, 14);
		panel.add(msgFail);
		
		tfBorrowID = new JTextField();
		check = new boolean[BookBLL.getAll().size()+1];
		Arrays.fill(check, false);
		tfBorrowID.addKeyListener(new KeyAdapter() {
			@Override
			public void keyPressed(KeyEvent e) {
				if (e.getKeyCode() == KeyEvent.VK_ENTER) {
					
					Arrays.fill(check, false);
					model= new DefaultTableModel() {
						@Override
						public boolean isCellEditable(int row, int column) {
					       //all cells false
					       return false;
					    }
					};
					
					
					model.setColumnIdentifiers(new String[] {"RFID","Tên sách","Tình trạng"});
					if (tfBorrowID.getText().isEmpty()) {
						msgFail.setText("");
						msgSuccess.setText("");
						currentBorrrow=0;
					} else {
						if (!Borrow_detailBLL.getBorrowDetailbyId(Integer.parseInt(tfBorrowID.getText())).isEmpty()) {
							currentBorrrow=Integer.parseInt(tfBorrowID.getText());
							for (Borrow_detailDTO br: Borrow_detailBLL.getBorrowDetailbyId(Integer.parseInt(tfBorrowID.getText()))) {
								model.addRow(new String[] {
										RFIDBLL.getRFIDbyBookID(br.getBook_id()).getRfid(),BookBLL.getBookByID(br.getBook_id()).getTitle(),getStatus(BookBLL.getBookByID(br.getBook_id()),br.getBook_id() , check)
								});
								
							}
							msgSuccess.setText("Tra cứu mã mượn thành công!");
							msgFail.setText("");
						} else {
							msgFail.setText("Tra cứu mã mượn thất bại!");
							msgSuccess.setText("");
						}	
					}
					
					table.setModel(model);
//					System.out.println(Borrow_detailBLL.getBorrowDetailbyId(Integer.parseInt(tfBorrowID.getText())));
				}
			}
		});
		tfBorrowID.setBounds(10, 37, 150, 20);
		panel.add(tfBorrowID);
		tfBorrowID.setColumns(10);
		
//		JRadioButton rdbtnNewRadioButton = new JRadioButton("Trực tiếp");
//		rdbtnNewRadioButton.setBackground(Color.WHITE);
//		rdbtnNewRadioButton.setBounds(214, 7, 109, 23);
//		panel.add(rdbtnNewRadioButton);
		
//		cbname = new JComboBox();
//		cbname.setEnabled(false);
//		cbname.setBounds(214, 36, 196, 22);
//		panel.add(cbname);
		
		JLabel msgScanner = new JLabel("Mã vừa duyệt:");
		msgScanner.setFont(new Font("Tahoma", Font.BOLD, 12));
		msgScanner.setBounds(10, 120, 96, 23);
		panel.add(msgScanner);
		
		JLabel msgScannerinfo = new JLabel("");
		msgScannerinfo.setForeground(Color.GRAY);
		msgScannerinfo.setFont(new Font("Tahoma", Font.PLAIN, 12));
		msgScannerinfo.setBounds(10, 147, 583, 23);
		panel.add(msgScannerinfo);
		
		JButton btnNewButton = new JButton("Đăng ký mượn");
		btnNewButton.addMouseListener(new MouseAdapter() {
			@Override
			public void mouseClicked(MouseEvent e) {
				if (isfullchecked(check,currentBorrrow)) {
					for (Borrow_detailDTO br: Borrow_detailBLL.getBorrowDetailbyId(currentBorrrow)) {
						BookDTO book = BookBLL.getBookByID(br.getBook_id());
						book.setStatus(2);
						BookBLL.updateBook(book);
					}
					JOptionPane.showMessageDialog(null, "Đăng ký mượn thành công!", "Thông báo", 1);
				} else {
					JOptionPane.showMessageDialog(null, "Sách chưa được xác thực đầy đủ!", "Thông báo", 1);
				}
			}
		});
		btnNewButton.setBounds(713, 136, 150, 34);
		panel.add(btnNewButton);
		
		
		
		
		btnNewButton_1.addMouseListener(new MouseAdapter() {
			@Override
			public void mouseClicked(MouseEvent e) {
				if (currentBorrrow == 0) {
					JOptionPane.showMessageDialog(null, "Xin hãy cung cấp mã mượn!", "Thông báo", 1);
				} else {
					CAENRFIDReader MyReader = new CAENRFIDReader();
					EPC = new ArrayList<>();
					EPC.add("300F4F573AD001C08369A28F");
					EPC.add("300F4F573AD001C08369A22E");
					EPC.add("300F4F573AD001C08369A245");
					EPC.add("300F4F573AD001C08369A249");
					EPC.add("300F4F573AD001C08369A241");
		            temp="";
		            
		            for (String id:  EPC) {
		            	checkRFID(id, check, currentBorrrow);
		            	temp=temp+id+",";
		            }
		            temp=temp.substring(0, temp.lastIndexOf(","));
		            msgScannerinfo.setText(temp);
		            
		            
		            model= new DefaultTableModel() {
						@Override
						public boolean isCellEditable(int row, int column) {
					       //all cells false
					       return false;
					    }
					};
					
					
					model.setColumnIdentifiers(new String[] {"RFID","Tên sách","Tình trạng"});
					if (tfBorrowID.getText().isEmpty()) {
						msgFail.setText("");
						msgSuccess.setText("");
					} else {
						if (!Borrow_detailBLL.getBorrowDetailbyId(Integer.parseInt(tfBorrowID.getText())).isEmpty()) {
							currentBorrrow=Integer.parseInt(tfBorrowID.getText());
							for (Borrow_detailDTO br: Borrow_detailBLL.getBorrowDetailbyId(Integer.parseInt(tfBorrowID.getText()))) {
								model.addRow(new String[] {
										RFIDBLL.getRFIDbyBookID(br.getBook_id()).getRfid(),BookBLL.getBookByID(br.getBook_id()).getTitle(),getStatus(BookBLL.getBookByID(br.getBook_id()),br.getBook_id() , check)
								});
								
							}
							msgSuccess.setText("Tra cứu mã mượn thành công!");
							msgFail.setText("");
						} else {
							msgFail.setText("Tra cứu mã mượn thất bại!");
							msgSuccess.setText("");
						}	
					}
					
					table.setModel(model);
//		            
//		            for(boolean a: MainGUI.check) {
//		            	System.out.println(a);
//		            }
//			        try {
//			            MyReader.Connect(CAENRFIDPort.CAENRFID_TCP, "192.168.1.2");
//			            CAENRFIDLogicalSource MySource = MyReader.GetSource("Source_0");
	//
//			            //get Reader Infor
//			            CAENRFIDReaderInfo Info = MyReader.GetReaderInfo();
	//
//			            String Model = Info.GetModel();
//			            String SerialNumber = Info.GetSerialNumber();
//			            String FWRelease = MyReader.GetFirmwareRelease();
//			            // tinh theo cong de xac dinh khoang cach
//			            int power = MyReader.GetPower();
	//
//			            // in ra thong tin
//			            System.out.println("Model: "+Model);
//			            System.out.println("SerialNumber: "+SerialNumber);
//			            System.out.println("FWRelease: "+FWRelease);
//			            System.out.println("power: "+power);
	//
//			            System.out.println("");
//			            //thoi gian nhan
//			            MySource.SetSession_EPC_C1G2(CAENRFIDLogicalSourceConstants.EPC_C1G2_SESSION_S1);
	//
//			            // chua thong tin cua cac tag
//			            // chua tat ca tong tin quet tren device
//			            CAENRFIDTag[] MyTags = MySource.InventoryTag();
//			            
//			            EPC = new ArrayList<>();
//			            
//			            if (MyTags.length > 0)
//			            {
//			                // show list cac thong tin san pham
//			                //id san pham la duy nhat: exmple 48718273123
//			                //
//			                for (int i = 0; i < MyTags.length; i++)
//			                {
//			                    System.out.println("EPC: "+ hex(MyTags[i].GetId())  +
//			                            " | Antenna : " +MyTags[i].GetAntenna() +
//			                            " | TID:"+ (MyTags[i].GetTID()) +
//			                            " | RSSI : "+Integer.valueOf(MyTags[i].GetRSSI()));
//			                    EPC.add(hex(MyTags[i].GetId()));
//			                }
//			                
//			            }
//			            temp="";
//			            
//			            for (String id:  EPC) {
//			            	checkRFID(id, check, currentBorrrow);
//			            	temp=temp+id+",";
//			            	
//			            }
//			            
//			            
//			            model= new DefaultTableModel() {
//							@Override
//							public boolean isCellEditable(int row, int column) {
//						       //all cells false
//						       return false;
//						    }
//						};
//						
//						
//						model.setColumnIdentifiers(new String[] {"RFID","Tên sách","Tình trạng"});
//						if (tfBorrowID.getText().isEmpty()) {
//							msgFail.setText("");
//							msgSuccess.setText("");
//						} else {
//							if (!Borrow_detailBLL.getBorrowDetailbyId(Integer.parseInt(tfBorrowID.getText())).isEmpty()) {
//								currentBorrrow=Integer.parseInt(tfBorrowID.getText());
//								for (Borrow_detailDTO br: Borrow_detailBLL.getBorrowDetailbyId(Integer.parseInt(tfBorrowID.getText()))) {
//									model.addRow(new String[] {
//											RFIDBLL.getRFIDbyBookID(br.getBook_id()).getRfid(),BookBLL.getBookByID(br.getBook_id()).getTitle(),getStatus(BookBLL.getBookByID(br.getBook_id()),br.getBook_id() , check)
//									});
//									
//								}
//								msgSuccess.setText("Tra cứu mã mượn thành công!");
//								msgFail.setText("");
//							} else {
//								msgFail.setText("Tra cứu mã mượn thất bại!");
//								msgSuccess.setText("");
//							}	
//						}
//						
//						table.setModel(model);
////			            
////			            for(boolean a: MainGUI.check) {
////			            	System.out.println(a);
////			            }
	//
	//
//			            MyReader.Disconnect();
//			        }catch(Exception ex) {
//			            System.out.println(ex);
//			            if(MyReader != null) {
//			                try {
//								MyReader.Disconnect();
//							} catch (CAENRFIDException e1) {
//								// TODO Auto-generated catch block
//								e1.printStackTrace();
//							}
//			            }
//			        }
				}
				
				
				
			}
		});
		btnNewButton_1.setBounds(603, 137, 85, 34);
		panel.add(btnNewButton_1);
		
		
		
		
		
		
		selectedbyBorrowID.addMouseListener(new MouseAdapter() {
			@Override
			public void mouseClicked(MouseEvent e) {
				selectedbyBorrowID.setSelected(true);
				tfBorrowID.setEnabled(true);
				cbname.setEnabled(false);
//				rdbtnNewRadioButton.setSelected(false);
			}
		});
		
//		rdbtnNewRadioButton.addMouseListener(new MouseAdapter() {
//			@Override
//			public void mouseClicked(MouseEvent e) {
////				rdbtnNewRadioButton.setSelected(true);
//				selectedbyBorrowID.setSelected(false);
//				tfBorrowID.setEnabled(false);
//				cbname.setEnabled(true);
//			}
//		});
		load();
	}
}
