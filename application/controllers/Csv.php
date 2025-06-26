<?php
if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Csv extends CI_Controller {
    function __construct() {        
       parent::__construct();		
        date_default_timezone_set("Asia/Kolkata");
        $this->load->model('Main_M');
        $this->load->model('Admin_M');
        $this->load->model('Common_M');
        $this->load->model('Client_M');
        $this->load->library('form_validation');
        $this->load->helper('file');
    }
    
    public function index(){
        $data = array();
        // Get messages from the session
        if($this->session->userdata('success_msg')){
            $data['success_msg'] = $this->session->userdata('success_msg');
            $this->session->unset_userdata('success_msg');
        }
        if($this->session->userdata('error_msg')){
            $data['error_msg'] = $this->session->userdata('error_msg');
            $this->session->unset_userdata('error_msg');
        }
        
       $data['panelTitle']='Import Items';
	   
       $data['subview']='inventory/import';
	           
       $this->load->view('admin/common/_layout_admin',$data);
    }
    
    public function import(){
        $data = array();
        $memData = array();
		if($this->session->userdata('client')['parent_id']==0){
			$client_id = ($this->session->userdata('client')['id']) ?? $_POST['client_id'];
			}elseif($this->session->userdata('client')['parent_id']!=0){
			$client_id = ($this->session->userdata('client')['parent_id']) ?? $_POST['client_id'];
			}
        if($_POST['importSubmit']){
            // Form field validation rules
            $this->form_validation->set_rules('file', 'CSV file', 'callback_file_check');
            
                $insertCount = $updateCount = $rowCount = $notAddCount = 0;
                
                // If file uploaded
                if(is_uploaded_file($_FILES['file']['tmp_name'])){
                    // Load CSV reader library
                    $this->load->library('CSVReader');
					
					if(isset($_FILES['file'])) 
					{
						$target_dir = "assets/documents/";
						$target_file = $target_dir . basename($_FILES["file"]["name"]);
						//$imageFileType = pathinfo($target_file,PATHINFO_EXTENSION);
						move_uploaded_file($_FILES["file"]["tmp_name"], $target_file);               
					}else{
						$target_file="";
					}
                    
                    $csvData = $this->csvreader->parse_csv($target_file);
                    if(!empty($csvData)){
                        foreach($csvData as $row){
						
						 $rowCount++;
						  $brand=explode('BRAND0',$row['brand']);
						  $exp2=explode('VENDR',$row['vendor']);
						  $grpitm=explode('GROUP00',$row['group_item']);
						  $query3=$this->db->query("SELECT * FROM `tbl_vendors` WHERE name='".$exp2[1]."'");    		
						  $vendor=$query3->result();

							if($this->session->userdata('client')['parent_id']!=0){
								$subuser_id = $this->session->userdata('client')['id'];
							}elseif($this->session->userdata('client')['parent_id']==0){
								$subuser_id = $this->session->userdata('client')['parent_id'];
							}
						  
						  	$idata=array();
                            $idata['client_id']=$client_id;
							$idata['subuser_id']=$subuser_id;	
							$idata['type']=$row['Type'];
							$idata['title']=$row['Item'];
							$idata['sku']=$row['code'];				
							$idata['unit']=$row['Unit'];
							$idata['ptype']=1;
							$idata['parents']=0;				
							$idata['brand']=$brand[1];
							$idata['vendor_id']=$vendor[0]->id;
							$idata['vendor']=$vendor[0]->name;	
							$idata['dim']=$row['dim'];
							$idata['weight']=$row['Weight'];
							$idata['manufacturer']=$_POST['manufacturer'];
							$idata['UPC']=$row['UPC'];				
							/*$idata['EAN']=$_POST['EAN'];
							$idata['MPN']=$_POST['MPN'];
							$idata['ISBN']=$_POST['ISBN'];	*/
							$idata['HSN']=$row['HSN'];
							$idata['SAC']=$row['SAC'];
							$idata['tax']='';
							$idata['grp_id']=$grpitm[1];
							$idata['IGST']=$row['IGST'];
							$idata['SGST']=$row['SGST'];
							$idata['CGST']=$row['CGST'];
							$idata['sprice']=$row['saleprice'];				
							$idata['saccount']=$row['sale_account'];
							$idata['sdesc']=$row['sale_description'];
							$idata['pprice']=$row['purchase_price'];				
							$idata['paccount']=$row['purchase_account'];
							$idata['pdesc']=$row['purchase_description'];					
							$idata['inv_acc']=$row['Inventory_account'];				
							$idata['op_stock']=$row['open_stock'];				
							$idata['rate_per_unit']=$row['rate_per_unit'];
							$idata['reorder']=$row['reorder'];
							$idata['created']=date('Y-m-d H:i:s'); 
						  
							
                           /*$idata=array();
                            $idata['client_id']=$client_id;
                            $idata['type']=$row['Type'];
							$idata['title']=$row['Item'];
							$idata['sku']=$row['code'];				
							$idata['unit']=$row['Unit'];			
							$idata['sprice']=$row['saleprice'];				
							$idata['saccount']=$row['sale_account'];
							$idata['sdesc']=$row['sale_description'];
							$idata['pprice']=$row['purchase_price'];				
							$idata['paccount']=$row['purchase_account'];
							$idata['pdesc']=$row['purchase_description'];					
							$idata['ptype']=1;
							$idata['parents']=0;				
							$idata['brand']=$brand[1];
							$idata['vendor_id']=$vendor[0]->id;
							$idata['vendor']=$vendor[0]->name;	
							$idata['dim']=$row['dim'];
							$idata['weight']=$row['Weight'];
							$idata['manufacturer']=$row['manufacturer'];
							$idata['UPC']=$row['UPC'];				
							$idata['EAN']=$row['EAN'];
							$idata['MPN']=$row['MPN'];
							$idata['ISBN']=$row['ISBN'];
							$idata['HSN']=$row['HSN'];
							$idata['inv_acc']=$row['Inventory_account'];				
							$idata['op_stock']=$row['open_stock'];				
							$idata['rate_per_unit']=$row['rate_per_unit'];
							$idata['reorder']=$row['reorder'];
							$idata['created']=date('Y-m-d H:i:s');  */

                            $success=$this->db->insert('tbl_inventory',$idata);
                                
                               if($success){
                                    $insertCount++;
                              }
                        }
                        
                        // Status message with imported data count
                        $notAddCount = ($rowCount - ($insertCount + $updateCount));
                        $successMsg = 'Members imported successfully. Total Rows ('.$rowCount.') | Inserted ('.$insertCount.') | Updated ('.$updateCount.') | Not Inserted ('.$notAddCount.')';
                        $this->session->set_userdata('success_msg', $successMsg);
                    }
                }else{
                    $this->session->set_userdata('error_msg', 'Error on file upload, please try again.');
                }            
			
			/*}else{
                $this->session->set_userdata('error_msg', 'Invalid file, please select only CSV file.');
            }*/
        }
        redirect('inventory/inventory');
    }
	
	public function cusimport(){
        $data = array();
        $memData = array();

		if($this->session->userdata('client')['parent_id']==0){
			$client_id = ($this->session->userdata('client')['id']) ?? $_POST['client_id'];
			}elseif($this->session->userdata('client')['parent_id']!=0){
			$client_id = ($this->session->userdata('client')['parent_id']) ?? $_POST['client_id'];
			}
        
        // If import request is submitted
        if($_POST['importSubmit']){
            // Form field validation rules
            $this->form_validation->set_rules('file', 'CSV file', 'callback_file_check');
                $insertCount = $updateCount = $rowCount = $notAddCount = 0;
                
                // If file uploaded
                if(is_uploaded_file($_FILES['file']['tmp_name'])){
                    // Load CSV reader library
                    $this->load->library('CSVReader');
					
					if(isset($_FILES['file'])) 
					{
						$target_dir = "assets/documents/";
						$target_file = $target_dir . basename($_FILES["file"]["name"]);
						//$imageFileType = pathinfo($target_file,PATHINFO_EXTENSION);
						move_uploaded_file($_FILES["file"]["tmp_name"], $target_file);               
					}else{
						$target_file="";
					}
                    
                    // Parse data from CSV file
                    $csvData = $this->csvreader->parse_csv($target_file);
					
					
                    // Insert/update CSV data into database
                    if(!empty($csvData)){
                        foreach($csvData as $row){						
						 $rowCount++;
						 	$query=$this->db->query("SELECT * FROM `tbl_currencies` WHERE code='".$row['currency']."'");    		
							$currency=$query->result();	
						
						 	$query2=$this->db->query("SELECT * FROM `tbl_countries` WHERE name='".$row['bill_country']."'");    		
							$bill_country=$query2->result();
							
							$query3=$this->db->query("SELECT * FROM `tbl_states` WHERE name='".$row['bill_state']."'");    		
							$bill_state=$query3->result();
							
							
							$query4=$this->db->query("SELECT * FROM `tbl_states` WHERE name='".$row['bill_city']."'");    		
							$bill_city=$query4->result();
							
							
							$query2=$this->db->query("SELECT * FROM `tbl_countries` WHERE name='".$row['ship_country']."'");    		
							$ship_country=$query2->result();
							
							$query3=$this->db->query("SELECT * FROM `tbl_states` WHERE name='".$row['ship_state']."'");    		
							$ship_state=$query3->result();
							
							$query4=$this->db->query("SELECT * FROM `tbl_states` WHERE name='".$row['ship_city']."'");    		
							$ship_city=$query4->result();
							
							$query=$this->db->query("SELECT * FROM `tbl_terms` WHERE name='".$row['Payment_Terms']."'");    		
							$Payment_Terms=$query->result();	
							
								if($this->session->userdata('client')['parent_id']!=0){
									$subuser_id = $this->session->userdata('client')['id'];
								}elseif($this->session->userdata('client')['parent_id']==0){
									$subuser_id = $this->session->userdata('client')['parent_id'];
								}
                            $idata=array();
                            $idata['client_id']=$client_id;    
							$idata['subuser_id']=$subuser_id;                       
							$idata['name']=$row['name'];
							$idata['type']=$row['Type'];
							$idata['email']=$row['email'];
							$idata['gst']=$row['GST'];
							$idata['state_code']=$row['state_code'];
							$idata['mobile']=$row['mobile'];
							$idata['website']=$row['website'];
							$idata['company']=$row['company'];							
							$idata['address']=$row['bill_address'];
							$idata['country_id']=$bill_country[0]->id;
							$idata['state_id']=$bill_state[0]->id;
							$idata['city_id']=$bill_city[0]->id;
							$idata['postcode']=$row['bill_postcode'];
							$idata['fax']=$row['bill_fax'];							
							$idata['shipaddress']=$row['ship_address'];
							$idata['shipcountry_id']=$ship_country[0]->id;
							$idata['shipstate_id']=$ship_state[0]->id;
							$idata['shipcity_id']=$ship_city[0]->id;
							$idata['shippostcode']=$row['ship_postcode'];
							$idata['shipfax']=$row['ship_fax'];								
							$idata['position']=$row['Designation'];
							$idata['facebook']=$row['facebook'];
							$idata['twitter']=$row['twitter'];
							$idata['skype_id']=$row['skype_id'];
							$idata['remark']=$row['Remarks'];								
							$idata['currency']=$currency[0]->id;
							$idata['opening_balance']=$row['Opening_Balance'];				
							$idata['terms']=$Payment_Terms[0]->id;
							$idata['created']=date('Y-m-d H:i:s');                          
                             $success=$this->db->insert('tbl_customers',$idata);
                                
                               if($success){
                                    $insertCount++;
                              }
                        }
                        
                        // Status message with imported data count
                        $notAddCount = ($rowCount - ($insertCount + $updateCount));
                        $successMsg = 'Members imported successfully. Total Rows ('.$rowCount.') | Inserted ('.$insertCount.') | Updated ('.$updateCount.') | Not Inserted ('.$notAddCount.')';
                        $this->session->set_userdata('success_msg', $successMsg);
                    }
                }else{
                    $this->session->set_userdata('error_msg', 'Error on file upload, please try again.');
                }            
			
			/*}else{
                $this->session->set_userdata('error_msg', 'Invalid file, please select only CSV file.');
            }*/
        }
        redirect('customer/customers');
    }
	
	public function csv_cusimport(){
		$data['panelTitle']='Customers CSV';
        $data['subview']='customer/csv';
        $this->load->view('admin/common/_layout_admin',$data);
	}
	
	
	public function estimate_import(){
        $data = array();
        $memData = array();

		if($this->session->userdata('client')['parent_id']==0){
			$client_id = ($this->session->userdata('client')['id']) ?? $_POST['client_id'];
			}elseif($this->session->userdata('client')['parent_id']!=0){
			$client_id = ($this->session->userdata('client')['parent_id']) ?? $_POST['client_id'];
			}
        
        // If import request is submitted
        if($_POST['importSubmit']){
		
		 
            // Form field validation rules
            $this->form_validation->set_rules('file', 'CSV file', 'callback_file_check');
            
            // Validate submitted form data
            //if($this->form_validation->run() == true){
			
			
                $insertCount = $updateCount = $rowCount = $notAddCount = 0;
                
                // If file uploaded
                if(is_uploaded_file($_FILES['file']['tmp_name'])){
                    // Load CSV reader library
                    $this->load->library('CSVReader');
					
					if(isset($_FILES['file'])) 
					{
						$target_dir = "assets/documents/";
						$target_file = $target_dir . basename($_FILES["file"]["name"]);
						//$imageFileType = pathinfo($target_file,PATHINFO_EXTENSION);
						move_uploaded_file($_FILES["file"]["tmp_name"], $target_file);               
					}else{
						$target_file="";
					}
                    
                    // Parse data from CSV file
                    $csvData = $this->csvreader->parse_csv($target_file);
					
					
					
                    // Insert/update CSV data into database
                    if(!empty($csvData)){
                        foreach($csvData as $row){						
						 $rowCount++;				 	
						 		
						$exp=explode("CUS0",$row['customer_id']);
						$salp=explode("SALEP0",$row['Sales_Person_code']);
						$proj=explode("PROJ0",$row['Project_code']);
							
						$query4=$this->db->query("SELECT * FROM `tbl_customers` WHERE id='".$exp[1]."'");    		
						$customer=$query4->result();
						
						$query3=$this->db->query("SELECT * FROM `tbl_inventory` WHERE sku='".$row['Product_code']."'");    		
						$prod=$query3->result();
						
						$sub=$prod[0]->saleprice*$row['Quantity'];						
						$tax_amount=($sub*$row['tax'])/100;
						$disc=($sub*$row['Discount'])/100;
						$tot=($sub+$tax_amount)-$disc;
						
						//echo "<pre>"; print_r($tot); exit;
						
						
							if($this->session->userdata('client')['parent_id']!=0){
								$subuser_id = $this->session->userdata('client')['id'];
							}elseif($this->session->userdata('client')['parent_id']==0){
								$subuser_id = $this->session->userdata('client')['parent_id'];
							}
                           $estimateData=array(
									'client_id'=>$client_id,
									'subuser_id'=>$subuser_id,
									'customer'=>$customer[0]->name,
									'customer_id'=>$exp[1],
									'project_name'=>$proj[1],
									'number'=>$row['Estimate_Number'],
									'sales_person'=>$salp[1],
									'terms_conditions'=>$row['TC'],
									'customer_note'=>$row['c_note'],
									'reference'=>$row['Reference'],
									'date'=>$row['Date'],
									'expiry_date'=>$row['Expiry_Date'],
									'total'=>$tot,
									'tax_per'=>$row['tax'],
									'tax'=>$tax_amount,
									'created'=>date('Y-m-d H:i:s')
							); 
							
							//echo "<pre>"; print_r($estimateData); exit;                         
                             $success=$this->db->insert('tbl_estimates',$estimateData);
							 $estimate_id=$this->db->insert_id();
							 $productData=array(
								'estimate_id' => $estimate_id, 
								'title' => $prod[0]->id, 
								'qty' => $row['Quantity'], 
								'unit' => $row['Unit'], 
								'price' => $prod[0]->saleprice,
								'discount' => $row['Discount'],
							);
                    		$success2=$this->db->insert('tbl_estimate_inventory',$productData);
                                
                               if($success){
                                    $insertCount++;
                              }
                        }
                        
                        // Status message with imported data count
                        $notAddCount = ($rowCount - ($insertCount + $updateCount));
                        $successMsg = 'Members imported successfully. Total Rows ('.$rowCount.') | Inserted ('.$insertCount.') | Updated ('.$updateCount.') | Not Inserted ('.$notAddCount.')';
                        $this->session->set_userdata('success_msg', $successMsg);
                    }
                }else{
                    $this->session->set_userdata('error_msg', 'Error on file upload, please try again.');
                }            
			
			/*}else{
                $this->session->set_userdata('error_msg', 'Invalid file, please select only CSV file.');
            }*/
        }
        redirect('client/estimates');
    }
	
	public function csv_estimate_import(){
		$data['panelTitle']='Estimate CSV';
        $data['subview']='clients/csv_estimate';
        $this->load->view('admin/common/_layout_admin',$data);
	}
	
	
	public function sales_order_import(){
        $data = array();
        $memData = array();

		if($this->session->userdata('client')['parent_id']==0){
			$client_id = ($this->session->userdata('client')['id']) ?? $_POST['client_id'];
			}elseif($this->session->userdata('client')['parent_id']!=0){
			$client_id = ($this->session->userdata('client')['parent_id']) ?? $_POST['client_id'];
			}
        
        // If import request is submitted
        if($_POST['importSubmit']){
		
		 
            // Form field validation rules
            $this->form_validation->set_rules('file', 'CSV file', 'callback_file_check');
            
            // Validate submitted form data
            //if($this->form_validation->run() == true){
			
			
                $insertCount = $updateCount = $rowCount = $notAddCount = 0;
                
                // If file uploaded
                if(is_uploaded_file($_FILES['file']['tmp_name'])){
                    // Load CSV reader library
                    $this->load->library('CSVReader');
					
					if(isset($_FILES['file'])) 
					{
						$target_dir = "assets/documents/";
						$target_file = $target_dir . basename($_FILES["file"]["name"]);
						//$imageFileType = pathinfo($target_file,PATHINFO_EXTENSION);
						move_uploaded_file($_FILES["file"]["tmp_name"], $target_file);               
					}else{
						$target_file="";
					}
                    
                    // Parse data from CSV file
                    $csvData = $this->csvreader->parse_csv($target_file);
					
					
					
                    // Insert/update CSV data into database
                    if(!empty($csvData)){
                        foreach($csvData as $row){						
						 $rowCount++;				 	
						 		
						$exp=explode("CUS0",$row['customer_id']);
						$salp=explode("SALEP0",$row['Sales_Person_code']);						
							
						$query4=$this->db->query("SELECT * FROM `tbl_customers` WHERE id='".$exp[1]."'");    		
						$customer=$query4->result();
						
						$query3=$this->db->query("SELECT * FROM `tbl_inventory` WHERE sku='".$row['Product_code']."'");    		
						$prod=$query3->result();
						
						$sub=$prod[0]->saleprice*$row['Quantity'];						
						$tax_amount=($sub*$row['tax'])/100;
						$disc=($sub*$row['Discount'])/100;
						$tot=($sub+$tax_amount)-$disc;
						
						//echo "<pre>"; print_r($tot); exit;
						
							if($this->session->userdata('client')['parent_id']!=0){
								$subuser_id = $this->session->userdata('client')['id'];
							}elseif($this->session->userdata('client')['parent_id']==0){
								$subuser_id = $this->session->userdata('client')['parent_id'];
							}
							
							
							 $sales_orderData=array(
								'client_id'=>$client_id,
								'subuser_id'=>$subuser_id,
								'customer'=>$customer[0]->name,
								'customer_id'=>$exp[1],
								'delivery_method'=>$row['delivery_method'],								
								'customer_note'=>$row['c_note'],
								'terms_conditions'=>$row['TC'],
								'sales_person'=>$salp[1],
								'reference'=>$row['Reference'],
								'sales_ord_id'=>$row['Sales_Order _Number'],
								'date'=>$row['Date'],
								'shipment_date'=>$row['Shipment _Date'],								
								'total'=>$tot,
								'tax_per'=>$row['tax'],
								'tax'=>$tax_amount,
								'created'=>date('Y-m-d H:i:s')
							);
							
							//echo "<pre>"; print_r($sales_orderData); exit;                         
                             $success=$this->db->insert('tbl_sales_orders',$sales_orderData);
							 $sales_order_id=$this->db->insert_id();
							 $productData=array(
								'sales_order_id' => $sales_order_id, 
								'title' => $prod[0]->id, 
								'qty' => $row['Quantity'], 
								'unit' => $row['Unit'], 
								'price' => $prod[0]->saleprice,
								'discount' => $row['Discount'],
							);
                    		$success2=$this->db->insert('tbl_sales_order_inventory',$productData);
                                
                               if($success){
                                    $insertCount++;
                              }
                        }
                        
                        // Status message with imported data count
                        $notAddCount = ($rowCount - ($insertCount + $updateCount));
                        $successMsg = 'Members imported successfully. Total Rows ('.$rowCount.') | Inserted ('.$insertCount.') | Updated ('.$updateCount.') | Not Inserted ('.$notAddCount.')';
                        $this->session->set_userdata('success_msg', $successMsg);
                    }
                }else{
                    $this->session->set_userdata('error_msg', 'Error on file upload, please try again.');
                }            
			
			/*}else{
                $this->session->set_userdata('error_msg', 'Invalid file, please select only CSV file.');
            }*/
        }
        redirect('client/sales_orders');
    }
	
	public function sales_order_csv(){
		$data['panelTitle']='Sales Order CSV';
        $data['subview']='clients/csv-sales-order';
        $this->load->view('admin/common/_layout_admin',$data);
	}

	public function delivery_challan_import(){
        $data = array();
        $memData = array();

		if($this->session->userdata('client')['parent_id']==0){
			$client_id = ($this->session->userdata('client')['id']) ?? $_POST['client_id'];
			}elseif($this->session->userdata('client')['parent_id']!=0){
			$client_id = ($this->session->userdata('client')['parent_id']) ?? $_POST['client_id'];
			}
        
        // If import request is submitted
        if($_POST['importSubmit']){
		
		 
            // Form field validation rules
            $this->form_validation->set_rules('file', 'CSV file', 'callback_file_check');
            
            // Validate submitted form data
            //if($this->form_validation->run() == true){
			
			
                $insertCount = $updateCount = $rowCount = $notAddCount = 0;
                
                // If file uploaded
                if(is_uploaded_file($_FILES['file']['tmp_name'])){
                    // Load CSV reader library
                    $this->load->library('CSVReader');
					
					if(isset($_FILES['file'])) 
					{
						$target_dir = "assets/documents/";
						$target_file = $target_dir . basename($_FILES["file"]["name"]);
						//$imageFileType = pathinfo($target_file,PATHINFO_EXTENSION);
						move_uploaded_file($_FILES["file"]["tmp_name"], $target_file);               
					}else{
						$target_file="";
					}
                    
                    // Parse data from CSV file
                    $csvData = $this->csvreader->parse_csv($target_file);
					
					
					
                    // Insert/update CSV data into database
                    if(!empty($csvData)){
                        foreach($csvData as $row){						
						 $rowCount++;				 	
						 		
						$exp=explode("CUS0",$row['customer_id']);											
							
						$query4=$this->db->query("SELECT * FROM `tbl_customers` WHERE id='".$exp[1]."'");    		
						$customer=$query4->result();
						
						$query3=$this->db->query("SELECT * FROM `tbl_inventory` WHERE sku='".$row['Product_code']."'");    		
						$prod=$query3->result();
						
						$sub=$prod[0]->saleprice*$row['Quantity'];						
						$tax_amount=($sub*$row['tax'])/100;
						$disc=($sub*$row['Discount'])/100;
						$tot=($sub+$tax_amount)-$disc;
						
						//echo "<pre>"; print_r($tot); exit;
							
							if($this->session->userdata('client')['parent_id']!=0){
								$subuser_id = $this->session->userdata('client')['id'];
							}elseif($this->session->userdata('client')['parent_id']==0){
								$subuser_id = $this->session->userdata('client')['parent_id'];
							}
							 $sales_orderData=array(
								'client_id'=>$client_id,
								'subuser_id'=>$subuser_id,
								'customer'=>$customer[0]->name,
								'customer_id'=>$exp[1],
								'challan_type'=>$row['Challan_Type'],								
								'customer_note'=>$row['c_note'],
								'terms_conditions'=>$row['TC'],
								'number'=>$row['Challan _Number'],
								'reference'=>$row['Reference'],								
								'date'=>$row['Challan _date'],																
								'total'=>$tot,
								'tax_per'=>$row['tax'],
								'tax'=>$tax_amount,
								'created'=>date('Y-m-d H:i:s')
							);
							
							
							
							//echo "<pre>"; print_r($sales_orderData); exit;                         
                             $success=$this->db->insert('tbl_delivery_challans',$sales_orderData);
							 $delivery_challan_id=$this->db->insert_id();
							 $productData=array(
								'delivery_challan_id' => $delivery_challan_id, 
								'title' => $prod[0]->id, 
								'qty' => $row['Quantity'], 
								'unit' => $row['Unit'], 
								'price' => $prod[0]->saleprice,
								'discount' => $row['Discount'],
							);
                    		$success2=$this->db->insert('tbl_delivery_challan_inventory',$productData);
                                
                               if($success){
                                    $insertCount++;
                              }
                        }
                        
                        // Status message with imported data count
                        $notAddCount = ($rowCount - ($insertCount + $updateCount));
                        $successMsg = 'Members imported successfully. Total Rows ('.$rowCount.') | Inserted ('.$insertCount.') | Updated ('.$updateCount.') | Not Inserted ('.$notAddCount.')';
                        $this->session->set_userdata('success_msg', $successMsg);
                    }
                }else{
                    $this->session->set_userdata('error_msg', 'Error on file upload, please try again.');
                }            
			
			/*}else{
                $this->session->set_userdata('error_msg', 'Invalid file, please select only CSV file.');
            }*/
        }
        redirect('client/delivery_challans');
    }
	
	public function delivery_challan_csv(){
		$data['panelTitle']='Delivery Challan CSV';
        $data['subview']='clients/csv-delivery-challan';
        $this->load->view('admin/common/_layout_admin',$data);
	}	
	
	public function invoices_import(){
        $data = array();
        $memData = array();

		if($this->session->userdata('client')['parent_id']==0){
			$client_id = ($this->session->userdata('client')['id']) ?? $_POST['client_id'];
			}elseif($this->session->userdata('client')['parent_id']!=0){
			$client_id = ($this->session->userdata('client')['parent_id']) ?? $_POST['client_id'];
			}
        
        // If import request is submitted
        if($_POST['importSubmit']){
		
		 
            // Form field validation rules
            $this->form_validation->set_rules('file', 'CSV file', 'callback_file_check');
            
            // Validate submitted form data
            //if($this->form_validation->run() == true){
			
			
                $insertCount = $updateCount = $rowCount = $notAddCount = 0;
                
                // If file uploaded
                if(is_uploaded_file($_FILES['file']['tmp_name'])){
                    // Load CSV reader library
                    $this->load->library('CSVReader');
					
					if(isset($_FILES['file'])) 
					{
						$target_dir = "assets/documents/";
						$target_file = $target_dir . basename($_FILES["file"]["name"]);
						//$imageFileType = pathinfo($target_file,PATHINFO_EXTENSION);
						move_uploaded_file($_FILES["file"]["tmp_name"], $target_file);               
					}else{
						$target_file="";
					}
                    
                    // Parse data from CSV file
                    $csvData = $this->csvreader->parse_csv($target_file);
					
					
					
                    // Insert/update CSV data into database
                    if(!empty($csvData)){
                        foreach($csvData as $row){						
						 $rowCount++;				 	
						 		
						$exp=explode("CUS0",$row['customer_id']);
						$salp=explode("SALEP0",$row['Sales_Person']);						
							
						$query4=$this->db->query("SELECT * FROM `tbl_customers` WHERE id='".$exp[1]."'");    		
						$customer=$query4->result();
						
						$query3=$this->db->query("SELECT * FROM `tbl_inventory` WHERE sku='".$row['Product_code']."'");    		
						$prod=$query3->result();
						
						$sub=$prod[0]->saleprice*$row['Quantity'];						
						$tax_amount=($sub*$row['tax'])/100;
						$disc=($sub*$row['Discount'])/100;
						$tot=($sub+$tax_amount)-$disc;						
							//echo "<pre>"; print_r($tot); exit;							
						
								if($this->session->userdata('client')['parent_id']!=0){
									$subuser_id = $this->session->userdata('client')['id'];
								}elseif($this->session->userdata('client')['parent_id']==0){
									$subuser_id = $this->session->userdata('client')['parent_id'];
								}	$invoiceData=array(
								'client_id'=>$client_id,
								'subuser_id'=>$subuser_id,
								'customer'=>$customer[0]->name,
								'customer_id'=>$exp[1],
								'terms'=>$row['terms'],
								'order_id'=>$row['Order Number'],
								'number'=>$row['Invoice _Number'],
								'terms_conditions'=>$row['TC'],
								'customer_note'=>$row['c_note'],
								'sales_person'=>$salp[1],
								'date'=>$row['Date'],
								'due_date'=>$row['Due_Date'],
								'billing_address'=>$row['Billing_Address'],					
								'due'=>$tot,
								'total'=>$tot,
								'tax_per'=>$row['tax'],
								'tax'=>$tax_amount,								
								'status'=>'Due',
								'created'=>date('Y-m-d H:i:s')
						     );							
				                       
                             $success=$this->db->insert('tbl_invoices',$invoiceData);
							 $invoice_id=$this->db->insert_id();

							 $productData=array(
								'invoice_id' => $invoice_id, 
                        		'client_id' => $client_id,
								'title' => $prod[0]->id, 
								'qty' => $row['Quantity'], 
								'unit' => $row['Unit'], 
								'price' => $prod[0]->saleprice,
								'discount' => $row['Discount'],
							);
							 
                    		$success2=$this->db->insert('tbl_invoice_inventory',$productData);
                                
                               if($success){
                                    $insertCount++;
                              }
                        }
                        
                        // Status message with imported data count
                        $notAddCount = ($rowCount - ($insertCount + $updateCount));
                        $successMsg = 'Members imported successfully. Total Rows ('.$rowCount.') | Inserted ('.$insertCount.') | Updated ('.$updateCount.') | Not Inserted ('.$notAddCount.')';
                        $this->session->set_userdata('success_msg', $successMsg);
                    }
                }else{
                    $this->session->set_userdata('error_msg', 'Error on file upload, please try again.');
                }            
			
			/*}else{
                $this->session->set_userdata('error_msg', 'Invalid file, please select only CSV file.');
            }*/
        }
        redirect('client/invoices');
    }
	
	public function invoices_csv(){
		$data['panelTitle']='Invoices CSV';
        $data['subview']='clients/csv-invoices';
        $this->load->view('admin/common/_layout_admin',$data);
	}	
	
	public function payment_recieved_import(){
        $data = array();
        $memData = array();


		if($this->session->userdata('client')['parent_id']==0){
			$client_id = ($this->session->userdata('client')['id']) ?? $_POST['client_id'];
			}elseif($this->session->userdata('client')['parent_id']!=0){
			$client_id = ($this->session->userdata('client')['parent_id']) ?? $_POST['client_id'];
			}
        
        // If import request is submitted
        if($_POST['importSubmit']){
		
		 
            // Form field validation rules
            $this->form_validation->set_rules('file', 'CSV file', 'callback_file_check');
            
            // Validate submitted form data
            //if($this->form_validation->run() == true){
			
			
                $insertCount = $updateCount = $rowCount = $notAddCount = 0;
                
                // If file uploaded
                if(is_uploaded_file($_FILES['file']['tmp_name'])){
                    // Load CSV reader library
                    $this->load->library('CSVReader');
					
					if(isset($_FILES['file'])) 
					{
						$target_dir = "assets/documents/";
						$target_file = $target_dir . basename($_FILES["file"]["name"]);
						//$imageFileType = pathinfo($target_file,PATHINFO_EXTENSION);
						move_uploaded_file($_FILES["file"]["tmp_name"], $target_file);               
					}else{
						$target_file="";
					}
                    
                    // Parse data from CSV file
                    $csvData = $this->csvreader->parse_csv($target_file);
					
					
					
                    // Insert/update CSV data into database
                    if(!empty($csvData)){
                        foreach($csvData as $row){						
						 $rowCount++;				 	
						 		
						$exp=explode("CUS0",$row['customer_id']);								
							
						$query4=$this->db->query("SELECT * FROM `tbl_customers` WHERE id='".$exp[1]."'");    		
						$customer=$query4->result();
						
						$query=$this->db->query("select * from tbl_invoices where id='".$row['Invoice_Number']."'");
						$curinv=$query->result();		
						if($row['invoice_Payment']>=$curinv[0]->due){
							$updata=array(
									'due'=>0,
									'received'=>$curinv[0]->total,
									'status'=>'Deposited'
									);
						}else{
							$due=$curinv[0]->due-$row['invoice_Payment'];
							$recv=$curinv[0]->due+$row['invoice_Payment'];
							$updata=array(
									'due'=>$due,
									'received'=>$recv,
									'status'=>'Due'
								);
						}	
						//echo "<pre>"; print_r($_POST); exit;
						
						 $this->db->where('id',$curinv[0]->id);
						 $this->db->update('tbl_invoices',$updata);
							
							if($this->session->userdata('client')['parent_id']!=0){
								$subuser_id = $this->session->userdata('client')['id'];
							}elseif($this->session->userdata('client')['parent_id']==0){
								$subuser_id = $this->session->userdata('client')['parent_id'];
							}
						 
						  $invoiceData=array(
									'client_id'=>$client_id,
									'subuser_id'=>$subuser_id,
									'cust_id'=>$exp[1],         
									'amount'=>$row['Amount'],
									'bank_charge'=>$row['Bank_Charges'],
									'pay_mode'=>$row['Payment_Mode'],
									'deposit_to'=>$row['Deposit_to'],
									'reference'=>$row['Reference'],
									'pay_date'=>$row['Date'],
									'payment'=>$row['payemnt'],                    
									'tax'=>$row['Tax_deducted'],
									'tax_account'=>$row['TDS_Tax_Account'],
									'invoice'=>$row['Invoice_Number'],
									'invoice_amnt'=>$row['invoice_Payment'],
									'created'=>date('Y-m-d H:i:s')
							);	
							
                             $success=$this->db->insert('tbl_invoice_payments',$invoiceData);							 
                                
                               if($success){
                                    $insertCount++;
                              }
                        }
                        
                        // Status message with imported data count
                        $notAddCount = ($rowCount - ($insertCount + $updateCount));
                        $successMsg = 'Members imported successfully. Total Rows ('.$rowCount.') | Inserted ('.$insertCount.') | Updated ('.$updateCount.') | Not Inserted ('.$notAddCount.')';
                        $this->session->set_userdata('success_msg', $successMsg);
                    }
                }else{
                    $this->session->set_userdata('error_msg', 'Error on file upload, please try again.');
                }            
			
			/*}else{
                $this->session->set_userdata('error_msg', 'Invalid file, please select only CSV file.');
            }*/
        }
        redirect('client/payment_recieved');
    }
	
	public function payment_recieved_csv(){
		$data['panelTitle']='Payment Recieved CSV';
        $data['subview']='clients/csv-payment-recieved';
        $this->load->view('admin/common/_layout_admin',$data);
	}	
	
	public function recurring_invoice_import(){
        $data = array();
        $memData = array();
		if($this->session->userdata('client')['parent_id']==0){
			$client_id = ($this->session->userdata('client')['id']) ?? $_POST['client_id'];
			}elseif($this->session->userdata('client')['parent_id']!=0){
			$client_id = ($this->session->userdata('client')['parent_id']) ?? $_POST['client_id'];
			}
        
        // If import request is submitted
        if($_POST['importSubmit']){
		
		 
            // Form field validation rules
            $this->form_validation->set_rules('file', 'CSV file', 'callback_file_check');
            
            // Validate submitted form data
            //if($this->form_validation->run() == true){
			
			
                $insertCount = $updateCount = $rowCount = $notAddCount = 0;
                
                // If file uploaded
                if(is_uploaded_file($_FILES['file']['tmp_name'])){
                    // Load CSV reader library
                    $this->load->library('CSVReader');
					
					if(isset($_FILES['file'])) 
					{
						$target_dir = "assets/documents/";
						$target_file = $target_dir . basename($_FILES["file"]["name"]);
						//$imageFileType = pathinfo($target_file,PATHINFO_EXTENSION);
						move_uploaded_file($_FILES["file"]["tmp_name"], $target_file);               
					}else{
						$target_file="";
					}
                    
                    // Parse data from CSV file
                    $csvData = $this->csvreader->parse_csv($target_file);
					
					
					
                    // Insert/update CSV data into database
                    if(!empty($csvData)){
                        foreach($csvData as $row){						
						 $rowCount++;				 	
						 		
						$exp=explode("CUS0",$row['customer_id']);
						$salp=explode("SALEP0",$row['Sales_Person']);						
							
						$query4=$this->db->query("SELECT * FROM `tbl_customers` WHERE id='".$exp[1]."'");    		
						$customer=$query4->result();
						
						$query3=$this->db->query("SELECT * FROM `tbl_inventory` WHERE sku='".$row['Product_code']."'");    		
						$prod=$query3->result();
						
						$sub=$prod[0]->saleprice*$row['Quantity'];						
						$tax_amount=($sub*$row['tax'])/100;
						$disc=($sub*$row['Discount'])/100;
						$tot=($sub+$tax_amount)-$disc;
						
						//echo "<pre>"; print_r($tot); exit;
							if($this->session->userdata('client')['parent_id']!=0){
								$subuser_id = $this->session->userdata('client')['id'];
							}elseif($this->session->userdata('client')['parent_id']==0){
								$subuser_id = $this->session->userdata('client')['parent_id'];
							}
							
							$invoiceData=array(
								'client_id'=>$client_id,
								'subuser_id'=>$subuser_id,
								'customer'=>$customer[0]->name,
								'customer_id'=>$exp[1],
								'terms'=>$row['terms'],
								'order_id'=>$row['Order Number'],
								'number'=>$row['Invoice _Number'],
								'terms_conditions'=>$row['TC'],
								'customer_note'=>$row['c_note'],
								'sales_person'=>$salp[1],
								'repet_every'=>$_POST['Repeat_Every'],
								'date'=>$row['Date'],
								'due_date'=>$row['Due_Date'],
								'billing_address'=>$row['Billing_Address'],								
								'due'=>$tot,
								'total'=>$tot,
								'tax_per'=>$row['tax'],
								'tax'=>$tax_amount,								
								'status'=>'Due',
								'created'=>date('Y-m-d H:i:s')
						);
							
							//echo "<pre>"; print_r($invoiceData); exit;                         
                             $success=$this->db->insert('tbl_recurring_invoices',$invoiceData);
							 $invoice_id=$this->db->insert_id();
							 $productData=array(
								'invoice_id' => $invoice_id, 
                        		'client_id' => $client_id,
								'title' => $prod[0]->id, 
								'qty' => $row['Quantity'], 
								'unit' => $row['Unit'], 
								'price' => $prod[0]->saleprice,
								'discount' => $row['Discount'],
							);
                    		$success2=$this->db->insert('tbl_recurring_invoice_inventory',$productData);
                                
                               if($success){
                                    $insertCount++;
                              }
                        }
                        
                        // Status message with imported data count
                        $notAddCount = ($rowCount - ($insertCount + $updateCount));
                        $successMsg = 'Members imported successfully. Total Rows ('.$rowCount.') | Inserted ('.$insertCount.') | Updated ('.$updateCount.') | Not Inserted ('.$notAddCount.')';
                        $this->session->set_userdata('success_msg', $successMsg);
                    }
                }else{
                    $this->session->set_userdata('error_msg', 'Error on file upload, please try again.');
                }            
			
			/*}else{
                $this->session->set_userdata('error_msg', 'Invalid file, please select only CSV file.');
            }*/
        }
        redirect('client/recurring_invoice');
    }
	
	public function recurring_invoice_csv(){
		$data['panelTitle']='Recurring Invoice CSV';
        $data['subview']='clients/csv-recurring-invoice';
        $this->load->view('admin/common/_layout_admin',$data);
	}		
	
	public function credit_notes_import(){
        $data = array();
        $memData = array();

		if($this->session->userdata('client')['parent_id']==0){
            $client_id = ($this->session->userdata('client')['id']) ?? $_POST['client_id'];
            }elseif($this->session->userdata('client')['parent_id']!=0){
            $client_id = ($this->session->userdata('client')['parent_id']) ?? $_POST['client_id'];
            }

		if($this->session->userdata('client')['parent_id']!=0){
			$subuser_id = $this->session->userdata('client')['id'];
		}elseif($this->session->userdata('client')['parent_id']==0){
			$subuser_id = $this->session->userdata('client')['parent_id'];
		}
        
        // If import request is submitted
        if($_POST['importSubmit']){
		
		 
            // Form field validation rules
            $this->form_validation->set_rules('file', 'CSV file', 'callback_file_check');
            
            // Validate submitted form data
            //if($this->form_validation->run() == true){
			
			
                $insertCount = $updateCount = $rowCount = $notAddCount = 0;
                
                // If file uploaded
                if(is_uploaded_file($_FILES['file']['tmp_name'])){
                    // Load CSV reader library
                    $this->load->library('CSVReader');
					
					if(isset($_FILES['file'])) 
					{
						$target_dir = "assets/documents/";
						$target_file = $target_dir . basename($_FILES["file"]["name"]);
						//$imageFileType = pathinfo($target_file,PATHINFO_EXTENSION);
						move_uploaded_file($_FILES["file"]["tmp_name"], $target_file);               
					}else{
						$target_file="";
					}
                    
                    // Parse data from CSV file
                    $csvData = $this->csvreader->parse_csv($target_file);
					
					
					
                    // Insert/update CSV data into database
                    if(!empty($csvData)){
                        foreach($csvData as $row){						
						 $rowCount++;				 	
						 		
						$exp=explode("CUS0",$row['customer_id']);
						$salp=explode("SALEP0",$row['Sales_Person']);						
							
						$query4=$this->db->query("SELECT * FROM `tbl_customers` WHERE id='".$exp[1]."'");    		
						$customer=$query4->result();
						
						$query3=$this->db->query("SELECT * FROM `tbl_inventory` WHERE sku='".$row['Product_code']."'");    		
						$prod=$query3->result();
						
						$sub=$prod[0]->saleprice*$row['Quantity'];						
						$tax_amount=($sub*$row['tax'])/100;
						$disc=($sub*$row['Discount'])/100;
						$tot=($sub+$tax_amount)-$disc;
						
						//echo "<pre>"; print_r($tot); exit;
						
							 $credit_noteData=array(
									'client_id'=>$client_id,
									'subuser_id'=>$subuser_id,
									'customer'=>$customer[0]->name,
									'customer_id'=>$exp[1],
									'sales_person'=>$salp[1],									
									'customer_note'=>$row['c_note'],
									'reference'=>$row['Reference'],
									'number'=>$row['Credi_ Note'],
									'date'=>$row['Date'],
									'total'=>$tot,
									'tax_per'=>$row['tax'],
									'tax'=>$tax_amount,	
									'created'=>date('Y-m-d H:i:s')
							);
							//echo "<pre>"; print_r($invoiceData); exit;                         
                             $success=$this->db->insert('tbl_credit_notes',$credit_noteData);
							 $credit_note_id=$this->db->insert_id();
							 
							 
							  $productData=array(
								'credit_note_id' => $credit_note_id, 
								'title' => $prod[0]->id, 
								'account' => $row['Account'],
								'qty' => $row['Quantity'], 
								'unit' => $row['Unit'], 
								'price' => $prod[0]->saleprice,
								'discount' => $row['Discount'],
							);
							
							$success2=$this->db->insert('tbl_credit_note_inventory',$productData);
                               if($success){
                                    $insertCount++;
                              }
                        }
                        
                        // Status message with imported data count
                        $notAddCount = ($rowCount - ($insertCount + $updateCount));
                        $successMsg = 'Members imported successfully. Total Rows ('.$rowCount.') | Inserted ('.$insertCount.') | Updated ('.$updateCount.') | Not Inserted ('.$notAddCount.')';
                        $this->session->set_userdata('success_msg', $successMsg);
                    }
                }else{
                    $this->session->set_userdata('error_msg', 'Error on file upload, please try again.');
                }            
			
			/*}else{
                $this->session->set_userdata('error_msg', 'Invalid file, please select only CSV file.');
            }*/
        }
        redirect('client/credit_notes');
    }
	
	public function credit_notes_csv(){
		$data['panelTitle']='Credit Notes CSV';
        $data['subview']='clients/csv-credit-notes';
        $this->load->view('admin/common/_layout_admin',$data);
	}	
	
	public function vendor_import(){
        $data = array();
        $memData = array();
		if($this->session->userdata('client')['parent_id']==0){
			$client_id = ($this->session->userdata('client')['id']) ?? $_POST['client_id'];
			}elseif($this->session->userdata('client')['parent_id']!=0){
			$client_id = ($this->session->userdata('client')['parent_id']) ?? $_POST['client_id'];
			}
        
        // If import request is submitted
        if($_POST['importSubmit']){
		
		 
            // Form field validation rules
            $this->form_validation->set_rules('file', 'CSV file', 'callback_file_check');
            
            // Validate submitted form data
            //if($this->form_validation->run() == true){
			
			
                $insertCount = $updateCount = $rowCount = $notAddCount = 0;
                
                // If file uploaded
                if(is_uploaded_file($_FILES['file']['tmp_name'])){
                    // Load CSV reader library
                    $this->load->library('CSVReader');
					
					if(isset($_FILES['file'])) 
					{
						$target_dir = "assets/documents/";
						$target_file = $target_dir . basename($_FILES["file"]["name"]);
						//$imageFileType = pathinfo($target_file,PATHINFO_EXTENSION);
						move_uploaded_file($_FILES["file"]["tmp_name"], $target_file);               
					}else{
						$target_file="";
					}
                    
                    // Parse data from CSV file
                    $csvData = $this->csvreader->parse_csv($target_file);
					
					
                    // Insert/update CSV data into database
                    if(!empty($csvData)){
                        foreach($csvData as $row){						
						 $rowCount++;
						 	$query=$this->db->query("SELECT * FROM `tbl_currencies` WHERE code='".$row['currency']."'");    		
							$currency=$query->result();	
						
						 	$query2=$this->db->query("SELECT * FROM `tbl_countries` WHERE name='".$row['bill_country']."'");    		
							$bill_country=$query2->result();
							
							$query3=$this->db->query("SELECT * FROM `tbl_states` WHERE name='".$row['bill_state']."'");    		
							$bill_state=$query3->result();
							
							
							$query4=$this->db->query("SELECT * FROM `tbl_states` WHERE name='".$row['bill_city']."'");    		
							$bill_city=$query4->result();
							
							
							$query2=$this->db->query("SELECT * FROM `tbl_countries` WHERE name='".$row['ship_country']."'");    		
							$ship_country=$query2->result();
							
							$query3=$this->db->query("SELECT * FROM `tbl_states` WHERE name='".$row['ship_state']."'");    		
							$ship_state=$query3->result();
							
							$query4=$this->db->query("SELECT * FROM `tbl_states` WHERE name='".$row['ship_city']."'");    		
							$ship_city=$query4->result();
							
							$query=$this->db->query("SELECT * FROM `tbl_terms` WHERE name='".$row['Payment_Terms']."'");    		
							$Payment_Terms=$query->result();	
							
								if($this->session->userdata('client')['parent_id']!=0){
									$subuser_id = $this->session->userdata('client')['id'];
								}elseif($this->session->userdata('client')['parent_id']==0){
									$subuser_id = $this->session->userdata('client')['parent_id'];
								}
                            $idata=array();
                            $idata['client_id']=$client_id;                           
							$idata['subuser_id']=$subuser_id;
							$idata['name']=$row['name'];
							$idata['email']=$row['email'];
							$idata['display_name']=$row['display_name'];
							$idata['company_name']=$row['company'];
							$idata['mobile']=$row['mobile'];
							$idata['website']=$row['website'];
							$idata['address']=$row['bill_address'];
							$idata['country_id']=$bill_country[0]->id;
							$idata['state_id']=$bill_state[0]->id;
							$idata['city_id']=$bill_city[0]->id;
							$idata['postcode']=$row['bill_postcode'];
							$idata['fax']=$row['bill_fax'];
							$idata['shipaddress']=$row['ship_address'];
							$idata['shipcountry_id']=$ship_country[0]->id;
							$idata['shipstate_id']=$ship_state[0]->id;
							$idata['shipcity_id']=$ship_city[0]->id;
							$idata['shippostcode']=$row['ship_postcode'];
							$idata['shipfax']=$row['ship_fax'];	
							$idata['remark']=$row['Remarks'];										
							$idata['currency']=$currency[0]->id;
							$idata['opening_balance']=$row['Opening_Balance'];							
							$idata['terms']=$Payment_Terms[0]->id;
							$idata['exchange_rate']=$row['exchange_rate'];
							$idata['created']=date('Y-m-d H:i:s');							
							                          
                             $success=$this->db->insert('tbl_vendors',$idata);
                                
                               if($success){
                                    $insertCount++;
                              }
                        }
                        
                        // Status message with imported data count
                        $notAddCount = ($rowCount - ($insertCount + $updateCount));
                        $successMsg = 'Members imported successfully. Total Rows ('.$rowCount.') | Inserted ('.$insertCount.') | Updated ('.$updateCount.') | Not Inserted ('.$notAddCount.')';
                        $this->session->set_userdata('success_msg', $successMsg);
                    }
                }else{
                    $this->session->set_userdata('error_msg', 'Error on file upload, please try again.');
                }            
			
			/*}else{
                $this->session->set_userdata('error_msg', 'Invalid file, please select only CSV file.');
            }*/
        }
        redirect('client/vendors');
    }
	
	public function vendor_csv(){
		$data['panelTitle']='Vendors CSV';
        $data['subview']='clients/csv-vendor';
        $this->load->view('admin/common/_layout_admin',$data);
	}	
    
	public function expense_import(){
        $data = array();
        $memData = array();

		if($this->session->userdata('client')['parent_id']==0){
			$client_id = ($this->session->userdata('client')['id']) ?? $_POST['client_id'];
			}elseif($this->session->userdata('client')['parent_id']!=0){
			$client_id = ($this->session->userdata('client')['parent_id']) ?? $_POST['client_id'];
			}
        
        // If import request is submitted
        if($_POST['importSubmit']){
		
		 
            // Form field validation rules
            $this->form_validation->set_rules('file', 'CSV file', 'callback_file_check');
            
            // Validate submitted form data
            //if($this->form_validation->run() == true){
			
			
                $insertCount = $updateCount = $rowCount = $notAddCount = 0;
                
                // If file uploaded
                if(is_uploaded_file($_FILES['file']['tmp_name'])){
                    // Load CSV reader library
                    $this->load->library('CSVReader');
					
					if(isset($_FILES['file'])) 
					{
						$target_dir = "assets/documents/";
						$target_file = $target_dir . basename($_FILES["file"]["name"]);
						//$imageFileType = pathinfo($target_file,PATHINFO_EXTENSION);
						move_uploaded_file($_FILES["file"]["tmp_name"], $target_file);               
					}else{
						$target_file="";
					}
                    
                    // Parse data from CSV file
                    $csvData = $this->csvreader->parse_csv($target_file);
					
					
                    // Insert/update CSV data into database
                    if(!empty($csvData)){
                        foreach($csvData as $row){						
						 $rowCount++;
						 
						 	$exp1=explode('CUS0',$row['customer_code']);
         					$exp2=explode('VENDR',$row['Vendor_code']);
							
						 	$query=$this->db->query("SELECT * FROM `tbl_accounts` WHERE code='".$row['expence_account_code']."'");    		
							$expence_account=$query->result();	
						
						 	$query2=$this->db->query("SELECT * FROM `tbl_customers` WHERE id='".$exp1[1]."'");    			
							$custmoer=$query2->result();
							
							$query3=$this->db->query("SELECT * FROM `tbl_vendors` WHERE name='".$exp2[1]."'");    		
							$vendor=$query3->result();
							
								if($this->session->userdata('client')['parent_id']!=0){
									$subuser_id = $this->session->userdata('client')['id'];
								}elseif($this->session->userdata('client')['parent_id']==0){
									$subuser_id = $this->session->userdata('client')['parent_id'];
								}
							
                              $idata=array();                           
							  $idata['client_id']=$client_id;
							  $idata['subuser_id']=$subuser_id;
							  $idata['account_id']=$expence_account[0]->id;
							  $idata['paid_through']=$row['paid_through'];
							  $idata['invoice']=$row['invoice'];
							  $idata['vendor_name']=$vendor[0]->name;
							  $idata['vendor_id']=$vendor[0]->id;
							  $idata['customer_name']=$custmoer[0]->name;
							  $idata['customer_id']=$custmoer[0]->id;
							  $idata['note']=$row['Note'];
							  $idata['created']=date('Y-m-d H:i:s');						
							                          
                             $success=$this->db->insert('tbl_expenses',$idata);
                                
                               if($success){
                                    $insertCount++;
                              }
                        }
                        
                        // Status message with imported data count
                        $notAddCount = ($rowCount - ($insertCount + $updateCount));
                        $successMsg = 'Members imported successfully. Total Rows ('.$rowCount.') | Inserted ('.$insertCount.') | Updated ('.$updateCount.') | Not Inserted ('.$notAddCount.')';
                        $this->session->set_userdata('success_msg', $successMsg);
                    }
                }else{
                    $this->session->set_userdata('error_msg', 'Error on file upload, please try again.');
                }            
			
			/*}else{
                $this->session->set_userdata('error_msg', 'Invalid file, please select only CSV file.');
            }*/
        }
        redirect('client/expenses');
    }
	
	public function expense_csv(){
		$data['panelTitle']='Expense CSV';
        $data['subview']='clients/csv-expense';
        $this->load->view('admin/common/_layout_admin',$data);
	}
	
	
	public function recurring_expense_import(){
        $data = array();
        $memData = array();

		if($this->session->userdata('client')['parent_id']==0){
			$client_id = ($this->session->userdata('client')['id']) ?? $_POST['client_id'];
			}elseif($this->session->userdata('client')['parent_id']!=0){
			$client_id = ($this->session->userdata('client')['parent_id']) ?? $_POST['client_id'];
			}
        
        // If import request is submitted
        if($_POST['importSubmit']){
		
		 
            // Form field validation rules
            $this->form_validation->set_rules('file', 'CSV file', 'callback_file_check');
            
            // Validate submitted form data
            //if($this->form_validation->run() == true){
			
			
                $insertCount = $updateCount = $rowCount = $notAddCount = 0;
                
                // If file uploaded
                if(is_uploaded_file($_FILES['file']['tmp_name'])){
                    // Load CSV reader library
                    $this->load->library('CSVReader');
					
					if(isset($_FILES['file'])) 
					{
						$target_dir = "assets/documents/";
						$target_file = $target_dir . basename($_FILES["file"]["name"]);
						//$imageFileType = pathinfo($target_file,PATHINFO_EXTENSION);
						move_uploaded_file($_FILES["file"]["tmp_name"], $target_file);               
					}else{
						$target_file="";
					}
                    
                    // Parse data from CSV file
                    $csvData = $this->csvreader->parse_csv($target_file);
					
					
                    // Insert/update CSV data into database
                    if(!empty($csvData)){
                        foreach($csvData as $row){						
						 $rowCount++;
						 
						 	$exp1=explode('CUS0',$row['customer_code']);
         					$exp2=explode('VENDR',$row['Vendor_code']);
							
						 	$query=$this->db->query("SELECT * FROM `tbl_accounts` WHERE code='".$row['expence_account_code']."'");    		
							$expence_account=$query->result();	
						
						 	$query2=$this->db->query("SELECT * FROM `tbl_customers` WHERE id='".$exp1[1]."'");    			
							$custmoer=$query2->result();
							
							$query3=$this->db->query("SELECT * FROM `tbl_vendors` WHERE name='".$exp2[1]."'");    		
							$vendor=$query3->result();
								if($this->session->userdata('client')['parent_id']!=0){
									$subuser_id = $this->session->userdata('client')['id'];
								}elseif($this->session->userdata('client')['parent_id']==0){
									$subuser_id = $this->session->userdata('client')['parent_id'];
								}
							
                              $idata=array();                           
							  $idata['client_id']=$client_id;
							  $idata['subuser_id']=$subuser_id;
							  $idata['profile_name']=$row['invoice'];							  							  $idata['paid_through']=$row['paid_through'];
							  $idata['start_date']=$row['Start_Date'];
          					  $idata['end_date']=$row['End_Date'];
							  $idata['expense_account']=$expence_account[0]->id;
          					  $idata['amount']=$row['Amount'];
							  $idata['vendor_name']=$vendor[0]->name;
							  $idata['vendor_id']=$vendor[0]->id;
							  $idata['customer_name']=$custmoer[0]->name;
							  $idata['customer_id']=$custmoer[0]->id;
							  $idata['note']=$row['Note'];
							  $idata['created']=date('Y-m-d H:i:s');						
							                          
                             $success=$this->db->insert('tbl_recurring_expenses',$idata);
                                
                               if($success){
                                    $insertCount++;
                              }
                        }
                        
                        // Status message with imported data count
                        $notAddCount = ($rowCount - ($insertCount + $updateCount));
                        $successMsg = 'Members imported successfully. Total Rows ('.$rowCount.') | Inserted ('.$insertCount.') | Updated ('.$updateCount.') | Not Inserted ('.$notAddCount.')';
                        $this->session->set_userdata('success_msg', $successMsg);
                    }
                }else{
                    $this->session->set_userdata('error_msg', 'Error on file upload, please try again.');
                }            
			
			/*}else{
                $this->session->set_userdata('error_msg', 'Invalid file, please select only CSV file.');
            }*/
        }
        redirect('client/recurring_expenses');
    }
	
	public function recurring_expense_csv(){
		$data['panelTitle']='Recurring Expense CSV';
        $data['subview']='clients/csv-recurring-expense';
        $this->load->view('admin/common/_layout_admin',$data);
	}	
	
	
	public function group_items(){
        $data = array();
        
        // Get messages from the session
        if($this->session->userdata('success_msg')){
            $data['success_msg'] = $this->session->userdata('success_msg');
            $this->session->unset_userdata('success_msg');
        }
        if($this->session->userdata('error_msg')){
            $data['error_msg'] = $this->session->userdata('error_msg');
            $this->session->unset_userdata('error_msg');
        }
        
       $data['panelTitle']='Import Items';
       $data['subview']='inventory/group-item-csv';        
       $this->load->view('admin/common/_layout_admin',$data);
    }
    
    public function group_items_import(){
        $data = array();
        $memData = array();

		if($this->session->userdata('client')['parent_id']==0){
			$client_id = ($this->session->userdata('client')['id']) ?? $_POST['client_id'];
			}elseif($this->session->userdata('client')['parent_id']!=0){
			$client_id = ($this->session->userdata('client')['parent_id']) ?? $_POST['client_id'];
			}
        
        // If import request is submitted
        if($_POST['importSubmit']){
		
		 
            // Form field validation rules
            $this->form_validation->set_rules('file', 'CSV file', 'callback_file_check');
            
            // Validate submitted form data
            //if($this->form_validation->run() == true){
			
			
                $insertCount = $updateCount = $rowCount = $notAddCount = 0;
                
                // If file uploaded
                if(is_uploaded_file($_FILES['file']['tmp_name'])){
                    // Load CSV reader library
                    $this->load->library('CSVReader');
					
					if(isset($_FILES['file'])) 
					{
						$target_dir = "assets/documents/";
						$target_file = $target_dir . basename($_FILES["file"]["name"]);
						//$imageFileType = pathinfo($target_file,PATHINFO_EXTENSION);
						move_uploaded_file($_FILES["file"]["tmp_name"], $target_file);               
					}else{
						$target_file="";
					}
                    
                    // Parse data from CSV file
                    $csvData = $this->csvreader->parse_csv($target_file);
					
					//echo "<pre>"; print_r($csvData ); exit;
                    // Insert/update CSV data into database
                    if(!empty($csvData)){
                        foreach($csvData as $row){
						
						 $rowCount++;
						  $brand=explode('BRAND0',$row['brand']);
						  $exp2=explode('VENDR',$row['vendor']);
						  $query3=$this->db->query("SELECT * FROM `tbl_vendors` WHERE name='".$exp2[1]."'");    		
						   $vendor=$query3->result();
						  
							if($this->session->userdata('client')['parent_id']!=0){
								$subuser_id = $this->session->userdata('client')['id'];
							}elseif($this->session->userdata('client')['parent_id']==0){
								$subuser_id = $this->session->userdata('client')['parent_id'];
							}
							
                            $idata=array();
                            $idata['client_id']=$client_id;
							$idata['subuser_id']=$subuser_id;
                            $idata['type']=$row['Type'];
							$idata['title']=$row['Item'];
							$idata['sku']=$row['code'];				
							$idata['unit']=$row['Unit'];			
							$idata['sprice']=$row['saleprice'];				
							$idata['saccount']=$row['sale_account'];
							$idata['sdesc']=$row['sale_description'];
							$idata['pprice']=$row['purchase_price'];				
							$idata['paccount']=$row['purchase_account'];
							$idata['pdesc']=$row['purchase_description'];							
							$idata['ptype']=1;
							$idata['parents']=0;				
							$idata['brand']=$brand[1];
							$idata['vendor_id']=$vendor[0]->id;
							$idata['vendor']=$vendor[0]->name;	
							$idata['dim']=$row['dim'];
							$idata['weight']=$row['Weight'];
							$idata['manufacturer']=$row['manufacturer'];
							$idata['UPC']=$row['UPC'];				
							$idata['EAN']=$row['EAN'];
							$idata['MPN']=$row['MPN'];
							$idata['ISBN']=$row['ISBN'];
							$idata['inv_acc']=$row['Inventory_account'];				
							$idata['op_stock']=$row['open_stock'];				
							$idata['rate_per_unit']=$row['rate_per_unit'];
							$idata['reorder']=$row['reorder'];
							$idata['created']=date('Y-m-d H:i:s');                          
                             $success=$this->db->insert('tbl_inventory',$idata);
                                
                               if($success){
                                    $insertCount++;
                              }
                        }
                        
                        // Status message with imported data count
                        $notAddCount = ($rowCount - ($insertCount + $updateCount));
                        $successMsg = 'Members imported successfully. Total Rows ('.$rowCount.') | Inserted ('.$insertCount.') | Updated ('.$updateCount.') | Not Inserted ('.$notAddCount.')';
                        $this->session->set_userdata('success_msg', $successMsg);
                    }
                }else{
                    $this->session->set_userdata('error_msg', 'Error on file upload, please try again.');
                }            
			
			/*}else{
                $this->session->set_userdata('error_msg', 'Invalid file, please select only CSV file.');
            }*/
        }
        redirect('inventory/inventory');
    }
	
	
	public function brand_import(){
        $data = array();
        $memData = array();

		if($this->session->userdata('client')['parent_id']==0){
			$client_id = ($this->session->userdata('client')['id']) ?? $_POST['client_id'];
			}elseif($this->session->userdata('client')['parent_id']!=0){
			$client_id = ($this->session->userdata('client')['parent_id']) ?? $_POST['client_id'];
			}
        
        // If import request is submitted
        if($_POST['importSubmit']){
		
		 
            // Form field validation rules
            $this->form_validation->set_rules('file', 'CSV file', 'callback_file_check');
            
            // Validate submitted form data
            //if($this->form_validation->run() == true){
			
			
                $insertCount = $updateCount = $rowCount = $notAddCount = 0;
                
                // If file uploaded
                if(is_uploaded_file($_FILES['file']['tmp_name'])){
                    // Load CSV reader library
                    $this->load->library('CSVReader');
					
					if(isset($_FILES['file'])) 
					{
						$target_dir = "assets/documents/";
						$target_file = $target_dir . basename($_FILES["file"]["name"]);
						//$imageFileType = pathinfo($target_file,PATHINFO_EXTENSION);
						move_uploaded_file($_FILES["file"]["tmp_name"], $target_file);               
					}else{
						$target_file="";
					}
                    
                    // Parse data from CSV file
                    $csvData = $this->csvreader->parse_csv($target_file);
					
						if($this->session->userdata('client')['parent_id']!=0){
							$subuser_id = $this->session->userdata('client')['id'];
						}elseif($this->session->userdata('client')['parent_id']==0){
							$subuser_id = $this->session->userdata('client')['parent_id'];
						}
					
                    // Insert/update CSV data into database
                    if(!empty($csvData)){
                        foreach($csvData as $row){						
						 $rowCount++;
						 
						 	$idata['client_id']=$client_id;	
							 $idata['subuser_id']=$subuser_id;		
							$idata['name']=$_POST['name'];
							$idata['img']="";				
							$idata['created']=date('Y-m-d H:i:s');					
							                          
                             $success=$this->db->insert('tbl_brands',$idata);
                                
                               if($success){
                                    $insertCount++;
                              }
                        }
                        
                        // Status message with imported data count
                        $notAddCount = ($rowCount - ($insertCount + $updateCount));
                        $successMsg = 'Members imported successfully. Total Rows ('.$rowCount.') | Inserted ('.$insertCount.') | Updated ('.$updateCount.') | Not Inserted ('.$notAddCount.')';
                        $this->session->set_userdata('success_msg', $successMsg);
                    }
                }else{
                    $this->session->set_userdata('error_msg', 'Error on file upload, please try again.');
                }            
			
			/*}else{
                $this->session->set_userdata('error_msg', 'Invalid file, please select only CSV file.');
            }*/
        }
        redirect('inventory/brand');
    }
	
	public function brand(){
		$data['panelTitle']='Brand CSV';
        $data['subview']='inventory/csv-brand';
        $this->load->view('admin/common/_layout_admin',$data);
	}
	
    /*
     * Callback function to check file value and type during validation
     */
    public function file_check($str){
        $allowed_mime_types = array('text/x-comma-separated-values', 'text/comma-separated-values', 'application/octet-stream', 'application/vnd.ms-excel', 'application/x-csv', 'text/x-csv', 'text/csv', 'application/csv', 'application/excel', 'application/vnd.msexcel', 'text/plain');
        if(isset($_FILES['file']['name']) && $_FILES['file']['name'] != ""){
            $mime = get_mime_by_extension($_FILES['file']['name']);
            $fileAr = explode('.', $_FILES['file']['name']);
            $ext = end($fileAr);
            if(($ext == 'csv') && in_array($mime, $allowed_mime_types)){
                return true;
            }else{
                $this->form_validation->set_message('file_check', 'Please select only CSV file to upload.');
                return false;
            }
        }else{
            $this->form_validation->set_message('file_check', 'Please select a CSV file to upload.');
            return false;
        }
    }
}

