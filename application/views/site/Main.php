<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Main extends CI_Controller 
{
	function __construct()
   	{
     	parent::__construct();

     	date_default_timezone_set("Asia/Kolkata");

     	$this->load->model('Main_M');
     	$this->load->model('Admin_M');
     	$this->load->model('Common_M');

    }
	public function index()
	{
	
		$data['subview']='site/home';
		$this->load->view('site/common/_layout_home',$data);
	}
    
	public function career()
	{
		if($_POST)
		{

			// print_r($_POST);
			// print_r($_FILES);
			$email=$this->input->post('email');
			$this->db->where('email',$email);
			$query=$this->db->get('tbl_career_applications');

			if($query->num_rows() > 0)
			{
				//echo json_encode('<span style="color:black;">Exists</span>');
				echo json_encode('<div class="alert alert-info">
									  Email Already Exists
									</div>');
				exit();
			}
			else
			{
				//echo json_encode('<span style="color:black;">Not Exists</span>');
				if(isset($_FILES['fileToUpload'])) 
				{
					$target_dir = "assets/documents/";
					$target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);
					$imageFileType = pathinfo($target_file,PATHINFO_EXTENSION);
					move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file);
					$documentPath=$target_file;
				}
				$idata=array(

						'name'=>$this->input->post('name'),
						'email'=>$this->input->post('email'),
						'mobile'=>$this->input->post('mobile'),
						'job_id'=>$this->input->post('hiddenJobId'),
						'documentPath'=>$documentPath,
						'created'=>date('Y-m-d H:i:s')

				);
				//print_r($idata);exit();
				$success=$this->db->insert('tbl_career_applications',$idata);
				if($success)
				{
					echo json_encode('<div class="alert alert-success">
									  Data Saved
									</div>');
					exit();
				}
				else
				{
					echo json_encode('<div class="alert alert-danger">
									  Data Not Saved
									</div>');
					exit();
				}
			}
		}
		$data['careers']=$this->Main_M->get('tbl_careers','created','DESC');
		$data['subview']='site/career';
		$this->load->view('site/common/_layout_home',$data);
	}
	public function about_us()
	{
		$data['subview']='site/about_us';
		$this->load->view('site/common/_layout_home',$data);
	}
	public function contact_us() {
		// Register the check_captcha callback function
		$this->form_validation->set_message('check_captcha', 'Please enter the correct captcha.');
		$this->form_validation->set_rules('name', 'Name', 'required');
		$this->form_validation->set_rules('email', 'Email', 'required');
		$this->form_validation->set_rules('userCaptcha', 'Captcha', 'required|callback_check_captcha');
	
		if ($this->form_validation->run() == true) {
			// Form validation passed, insert data into the database
			$idata['name'] = $this->input->post('name');
			$idata['email'] = $this->input->post('email');
			$idata['mobile'] = $this->input->post('mobile'); // Assuming mobile field is optional
			$idata['message'] = $this->input->post('message');
			$idata['created'] = date('Y-m-d H:i:s');
	
			$success = $this->db->insert('tbl_contact_us', $idata);
			if ($success) {
				// Set success flashdata and redirect
				$this->session->set_flashdata('success', 'Thank you for your interest');
				redirect(base_url() . 'contact-us');
			}
		}
	
		// Generate a random numeric captcha number
		$random_number = substr(number_format(time() * rand(), 0, '', ''), 0, 6);
	
		// Setting up captcha configuration
		$captcha_config = array(
			'word' => $random_number,
			'img_path' => './captcha_images/',
			'img_url' => base_url() . 'captcha_images/',
			'img_width' => 140,
			'img_height' => 32,
			'expiration' => 7200
		);
	
		// Create captcha
		$data['captcha'] = create_captcha($captcha_config);
	
		// Store captcha word in session
		$this->session->set_userdata('captchaWord', $data['captcha']['word']);
	
		// Load captcha view
		$data['subview'] = 'site/contact_us';
		$this->load->view('site/common/_layout_home', $data);
	}
	
	public function check_captcha($str) {
		// Retrieve captcha word from session
		$word = $this->session->userdata('captchaWord');
	
		// Check if entered captcha matches stored captcha word
		if (strcmp(strtoupper($str), strtoupper($word)) == 0) {
			return true;
		} else {
			// Set error message for captcha validation
			$this->form_validation->set_message('check_captcha', 'Please enter the correct captcha.');
			return false;
		}
	}
	
	public function service_details($url)
	{
		
		$service=$this->Main_M->getSIngleRow('tbl_sub_menus','url',$url);		

		//echo "<pre>"; print_r($url); exit;

		$data['content']=$service->content;

		$data['subview']='site/service_details';
		$this->load->view('site/common/_layout_home',$data);
	}
	public function main_service_details($url)
	{
		$service=$this->Main_M->getSIngleRow('tbl_menus','url',$url);
		$data['content']=$service->content;
		$data['subview']='site/service_details';
		$this->load->view('site/common/_layout_home',$data);
	}
	public function inner_service()
	{
		$data['subview']='site/inner_service';
		$this->load->view('site/common/_layout_home',$data);
	}
	public function main1()
	{
		$data['subview']='site/main1';
		$this->load->view('site/common/_layout_home',$data);
	}
	public function main2()
	{
		$data['subview']='site/main2';
		$this->load->view('site/common/_layout_home',$data);
	}
	public function main3()
	{
		$data['subview']='site/main3';
		$this->load->view('site/common/_layout_home',$data);
	}
	public function main4()
	{
		$data['subview']='site/main4';
		$this->load->view('site/common/_layout_home',$data);
	}
	public function main5()
	{
		$data['subview']='site/main5';
		$this->load->view('site/common/_layout_home',$data);
	}
	public function main6()
	{
		$data['subview']='site/main6';
		$this->load->view('site/common/_layout_home',$data);
	}
	public function inner()
	{
		$data['subview']='site/inner';
		$this->load->view('site/common/_layout_home',$data);
	}
	public function vision_and_value()
	{
		$data['subview']='site/vision_and_value';
		$this->load->view('site/common/_layout_home',$data);
	}
	public function chart()
	{
		$allData=$this->Main_M->_get('tbl_bugs','id','ASC',NULL,NULL,'product');
		$data=array();

		foreach($allData as $key)
		{
			$dates=array();
			$alldates=$this->Main_M->_get('tbl_bugs','id','ASC','product',$key->product);
			$i=1;
			foreach($alldates as $dt)
			{
				$rawDate=explode('-',$dt->date);
				//$fullD='';
				$fullD=$rawDate[1].'-'.$rawDate[2].'-'.$rawDate[0];

				$dates[]=array(

						'x'=>'02-0'.$i.'-2017',
						'y'=>$dt->bugs
					);
				$i++;
			}
			$data[]=array(

					'type'=>'line',
					'axisYType'=>'secondary',
					'name'=>$key->product,
					'showInLegend'=>true,
					'markerSize'=>0,
					'yValueFormatString'=>'$#,###k',
					'dataPoints'=>$dates
			);
		}
		// echo '<pre>';
		// print_r(json_encode($data));exit();
		$data['data']=json_encode($data,JSON_NUMERIC_CHECK);

		$this->load->view('chart',$data);
		// $data['subview']='site/chart';
		// $this->load->view('site/common/_layout_home',$data);

	}
	public function introduction($exam_id)
	{
		if(!$exam_id)
		{
			redirect(base_url().'career');
		}
		if($this->session->userdata('applicant')['name'])
		{
			$appliedExam=$this->Common_M->getSingleRow('tbl_applied_exams','id',$this->session->userdata('applicant')['apply_id']);
			if($appliedExam->exam_id != base64_decode(urldecode($exam_id)))
			{
				$applicantInfo=array(

					'exam_id'=>base64_decode(urldecode($exam_id)),
					'name'=>$this->session->userdata('applicant')['name'],
					'email'=>$this->session->userdata('applicant')['email'],
					'mobile'=>$this->session->userdata('applicant')['mobile'],
					'created'=>date('Y-m-d H:i:s')
				);
				$this->db->insert('tbl_applied_exams',$applicantInfo);
				$applicantInfo['apply_id']=$this->db->insert_id();
				$this->session->set_userdata('applicant',$applicantInfo);
			}
			$this->test(urlencode(base64_encode($this->session->userdata('applicant')['exam_id'])));
		}
		$data['exam']=$exam=$this->Common_M->getSingleRow('tbl_exams','id',base64_decode(urldecode($exam_id)));
		if(!$exam)
		{
			redirect(base_url().'all-tests');
			$this->session->sess_destroy();
		}
		$data['subview']='site/introduction';
		$this->load->view('site/common/_layout_home',$data);
	}
	public function saveInformation()
	{
		if($_POST)
		{
			
			$whereArr2=array(
						'user_email'=>$_POST['email'],
						'exam_id'=>$_POST['hiddenExamId'],
						'code'=>$_POST['code'],
					);
			$chk_valid_user=$this->Common_M->getByArr('tbl_exam_applicants','id','DESC',$whereArr2,'row');
                        if(empty($chk_valid_user)){
                            echo json_encode('not_valid_user');
				exit();
                        }else{
                             
                            $this->db->where('id',$chk_valid_user->id);
                            $this->db->update('tbl_exam_applicants',['code'=>date('Y-m-d H:i:s')]);
                        }
                            
                        
                        $whereArr=array(
						'email'=>$_POST['email'],
						'exam_id'=>$_POST['hiddenExamId']
					);
			$isApplied=$this->Common_M->getByArr('tbl_applied_exams','created','DESC',$whereArr,'row');
			if($isApplied)
			{
				echo json_encode('applied');
				exit();
			}
			else
			{
				$applicantInfo=array(

					'exam_id'=>$_POST['hiddenExamId'],
					'name'=>$_POST['name'],
					'email'=>$_POST['email'],
					'mobile'=>$_POST['mobile'],
					'created'=>date('Y-m-d H:i:s')
				);
				$success=$this->db->insert('tbl_applied_exams',$applicantInfo);
				if($success)
				{
					$applicantInfo['apply_id']=$this->db->insert_id();
					$this->session->set_userdata('applicant',$applicantInfo);
					echo json_encode('dataSaved');
					exit();
				}
				else
				{
					echo json_encode('dataNotSaved');
					exit();
				}
			}
		}
	}
	public function test($exam_id)
	{
		// /echo $this->session->userdata('applicant')['apply_id'];
		$data['start_time']=$udata['start_time']=date('Y-m-d H:i:s');
		$this->db->where('id',$this->session->userdata('applicant')['apply_id']);
		$this->db->update('tbl_applied_exams',$udata);
		redirect(base_url().'rendering/'.$exam_id);
	}
	public function rendering($exam_id)
	{
		$application=$this->Common_M->getSingleRow('tbl_applied_exams','id',$this->session->userdata('applicant')['apply_id']);
		if($application->isCompleted == 1)
		{
			redirect(base_url().'completed');
		}
		$data['exam']=$exam=$this->Common_M->getSingleRow('tbl_exams','id',base64_decode(urldecode($exam_id)));
		if(!$this->session->userdata('questionIds'))
		{
			//echo 'ok';
			//echo count($this->session->userdata('questionIds'));
			$rawIds=explode(',',$exam->questions);
			$this->session->set_userdata('questionIds',$rawIds);
		}
		if($_POST)
		{
			//$index_id=$_POST['h_index_id'];
			//echo $index_id;exit();
			$idata=array(

					'question_id'=>$_POST['h_question_id'],
					'option_id'=>$_POST['ans'],
					'apply_id'=>$this->session->userdata('applicant')['apply_id']
			);

			$checkAnsArr=array('question_id'=>$_POST['h_question_id'],'apply_id'=>$this->session->userdata('applicant')['apply_id']);
			$ansExist=$this->Common_M->getByArr('tbl_exam_sheet','id','DESC',$checkAnsArr);
			if($ansExist)
			{
				$ans['option_id']=$_POST['ans'];
				$this->db->where($checkAnsArr);
				$this->db->update('tbl_exam_sheet',$ans);
				//echo $this->db->last_query();exit();
			}
			else
			{
				$this->db->insert('tbl_exam_sheet',$idata);
			}
			
			$ids=array();
			$ids=$this->session->userdata('questionIds');
			unset($ids[0]);
			$newIds=array_values($ids);
			$this->session->set_userdata('questionIds',$newIds);
			if(empty($this->session->userdata('questionIds')))
			{
				
				redirect(base_url()."completed");
			}
		}
		$data['questionIds']=$this->session->userdata('questionIds');
		
		$application=$this->Common_M->getSingleRow('tbl_applied_exams','id',$this->session->userdata('applicant')['apply_id']);
		$data['start_time']=$application->start_time;
		$data['subview']='site/exam';
		$this->load->view('site/common/_layout_home',$data);
	}
	public function all_tests()
	{
		$application=$this->Common_M->getSingleRow('tbl_applied_exams','id',$this->session->userdata('applicant')['apply_id']);
		//echo $application->isCompleted;exit();
		if(($this->session->userdata('applicant')['name']) && ($application->isCompleted != 1))
		{
			redirect(base_url().'rendering/'.urlencode(base64_encode($this->session->userdata('applicant')['exam_id'])));
		}
		$data['exams']=$this->Common_M->get('tbl_exams','created','DESC');
		$data['subview']='site/all_tests';
		$this->load->view('site/common/_layout_home',$data);
	}
	public function exam_completed()
	{
		unset($_SESSION['questionIds']);
		if(!$this->session->userdata('applicant')['name'])
		{
			redirect(base_url());
		}
		$udata['isCompleted']=1;
		$this->db->where('id',$this->session->userdata('applicant')['apply_id']);
		$this->db->update('tbl_applied_exams',$udata);
		$data['subview']='site/exam_completed';
		$this->load->view('site/common/_layout_home',$data);
	}
	public function kill()
	{
		$this->session->sess_destroy();
	}
	public function view_session()
	{
		echo '<pre>';
		print_r($this->session->all_userdata());
	}

	public function manupulate()
	{
		$rawIds=array('a','b','c','d','e','f','g','h','i','j');
		$this->session->set_userdata('questionIds',$rawIds);
		$id=array();
		$ids=$this->session->userdata('questionIds');
		unset($ids[0]);
		$newIds=array_values($ids);
		echo '<pre>';
		print_r($newIds);
		exit();
	}
    
    
    public function information_hub(){             
		$data['subview']='site/information_hub2';
		$this->load->view('site/common/_layout_home',$data);
	}
    
    public function Faq(){             
		$data['subview']='site/Faq';
		$this->load->view('site/common/_layout_home',$data);
	}
    
    public function Blog(){             
		$data['subview']='site/Blog';
		$this->load->view('site/common/_layout_home',$data);
	}
    public function bookkeeping(){             
		$data['subview']='site/bookkeeping';
		$this->load->view('site/common/_layout_home',$data);
	}
    
    public function financial_reporting(){             
		$data['subview']='site/financial_reporting';
		$this->load->view('site/common/_layout_home',$data);
	}

	   /*public function gst_Individuals(){             
		$data['subview']='site/gst_Individuals';
		$this->load->view('site/common/_layout_home',$data);
	}*/

	   public function tds_advisory_services(){             
		$data['subview']='site/tds_advisory_services';
		$this->load->view('site/common/_layout_home',$data);
	}
	 public function Capital_Gain(){             
		$data['subview']='site/Capital_Gain';
		$this->load->view('site/common/_layout_home',$data);
	}
	
	 public function Private_Wealth_Management(){             
		$data['subview']='site/Private_Wealth_Management';
		$this->load->view('site/common/_layout_home',$data);
	}
	
	
	 public function Mutual_Fund(){             
		$data['subview']='site/Mutual_Fund';
		$this->load->view('site/common/_layout_home',$data);
	}
	
	
	 public function Share_Trading(){             
		$data['subview']='site/Share_Trading';
		$this->load->view('site/common/_layout_home',$data);
	}
	
	
	 public function General_Insurance(){             
		$data['subview']='site/General_Insurance';
		$this->load->view('site/common/_layout_home',$data);
	}
		
	 public function Health_Insurance(){             
		$data['subview']='site/Health_Insurance';
		$this->load->view('site/common/_layout_home',$data);
	}	
	

	 public function fixed_deposit(){             
		$data['subview']='site/fixed_deposit';
		$this->load->view('site/common/_layout_home',$data);
	}
	
	
		 public function Life_Insurance(){             
		$data['subview']='site/Life_Insurance';
		$this->load->view('site/common/_layout_home',$data);
	}
	
		public function Credit_Counseling(){             
		$data['subview']='site/Credit_Counseling';
		$this->load->view('site/common/_layout_home',$data);
	}
	
		public function Debt_Settlement(){             
		$data['subview']='site/Debt_Settlement';
		$this->load->view('site/common/_layout_home',$data);
	}	
	
		public function Rectify_Error(){             
		$data['subview']='site/Rectify_Error';
		$this->load->view('site/common/_layout_home',$data);
	}
	
		public function Repair_Score(){             
		$data['subview']='site/Repair_Score';
		$this->load->view('site/common/_layout_home',$data);
	}
	
	
	
	 public function gst_advisory_services(){             
		$data['subview']='site/gst_advisory_services';
		$this->load->view('site/common/_layout_home',$data);
	}
	 public function gst_Individuals(){             
		$data['subview']='site/gst_Individuals';
		$this->load->view('site/common/_layout_home',$data);
	}
	 public function Individual_Tax_Serices(){             
		$data['subview']='site/Individual_Tax_Serices';
		$this->load->view('site/common/_layout_home',$data);
	}
	 public function Inventory_Management(){             
		$data['subview']='site/Inventory_Management';
		$this->load->view('site/common/_layout_home',$data);
	}
     
}
?>