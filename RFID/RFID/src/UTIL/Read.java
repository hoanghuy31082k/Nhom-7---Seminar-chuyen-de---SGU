//package UTIL;
//
//import java.awt.EventQueue;
//import java.util.ArrayList;
//
//import com.caen.RFIDLibrary.CAENRFIDLogicalSource;
//import com.caen.RFIDLibrary.CAENRFIDLogicalSourceConstants;
//import com.caen.RFIDLibrary.CAENRFIDPort;
//import com.caen.RFIDLibrary.CAENRFIDReader;
//import com.caen.RFIDLibrary.CAENRFIDReaderInfo;
//import com.caen.RFIDLibrary.CAENRFIDTag;
//
//import GUI.MainGUI;
//
//public class Read {
//    public static void main(String[] args) throws Exception {
////    	EventQueue.invokeLater(new Runnable() {
////			public void run() {
////				try {
////					MainGUI frame = new MainGUI();
////					frame.setVisible(true);
////				} catch (Exception e) {
////					e.printStackTrace();
////				}
////			}
////		});
//        // TODO Auto-generated method stub
//        CAENRFIDReader MyReader = new CAENRFIDReader();
//        try {
//            MyReader.Connect(CAENRFIDPort.CAENRFID_TCP, "192.168.1.2");
//            CAENRFIDLogicalSource MySource = MyReader.GetSource("Source_0");
//
//            //get Reader Infor
//            CAENRFIDReaderInfo Info = MyReader.GetReaderInfo();
//
//            String Model = Info.GetModel();
//            String SerialNumber = Info.GetSerialNumber();
//            String FWRelease = MyReader.GetFirmwareRelease();
//            // tinh theo cong de xac dinh khoang cach
//            int power = MyReader.GetPower();
//
//            // in ra thong tin
//            System.out.println("Model: "+Model);
//            System.out.println("SerialNumber: "+SerialNumber);
//            System.out.println("FWRelease: "+FWRelease);
//            System.out.println("power: "+power);
//
//            System.out.println("");
//            //thoi gian nhan
//            MySource.SetSession_EPC_C1G2(CAENRFIDLogicalSourceConstants.EPC_C1G2_SESSION_S1);
//
//            // chua thong tin cua cac tag
//            // chua tat ca tong tin quet tren device
//            CAENRFIDTag[] MyTags = MySource.InventoryTag();
//            
////            ArrayList<String> EPC = new ArrayList<>();
////            EPC.add("E200001730010136290000DD");
////            EPC.add("300EFE2F94D01C42540BE4F9");
//            
//            if (MyTags.length > 0)
//            {
//                // show list cac thong tin san pham
//                //id san pham la duy nhat: exmple 48718273123
//                //
//                for (int i = 0; i < MyTags.length; i++)
//                {
//                    System.out.println("EPC: "+ hex(MyTags[i].GetId())  +
//                            " | Antenna : " +MyTags[i].GetAntenna() +
//                            " | TID:"+ (MyTags[i].GetTID()) +
//                            " | RSSI : "+Integer.valueOf(MyTags[i].GetRSSI()));
////                    EPC.add(hex(MyTags[i].GetId()));
//                }
//                
//            }
//            
////            for (String id:  EPC) {
////            	MainGUI.checkRFID(id, MainGUI.check, MainGUI.currentBorrrow);
////            	
////            }
////            
////            for(boolean a: MainGUI.check) {
////            	System.out.println(a);
////            }
//
//
//            MyReader.Disconnect();
//        }catch(Exception ex) {
//            System.out.println(ex);
//            if(MyReader != null) {
//                MyReader.Disconnect();
//            }
//        }
//        
////        ArrayList<String> EPC = new ArrayList<>();
////        EPC.add("E200001730010136290000DD");
////        EPC.add("300EFE2F94D01C42540BE4F9");
////        
////        
////        
////        for (String id:  EPC) {
////        	MainGUI.checkRFID(id, MainGUI.check, MainGUI.currentBorrrow);
////        	
////        }
//        
////        for(boolean a: MainGUI.check) {
////        	System.out.println(a);
////        }
//
//    }
//
//    /**
//     * @return tra ve moi chuoi duoc in hoa
//     */
//    public static String hex(byte[] bytes) {
//        StringBuilder result = new StringBuilder();
//        for (byte aByte : bytes) {
//            result.append(String.format("%02x", aByte));
//            // upper case
//            // result.append(String.format("%02X", aByte));
//        }
//        return result.toString().toUpperCase();
//    }
//
//
//}
