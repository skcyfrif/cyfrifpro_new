<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Client_M extends CI_Model 
{
    public function index()
    {
        //$this->load->view('welcome_message');
    }
    public function login($email,$password)
    {
        //echo $email;echo $password;exit();
        $this->db->where(array('email'=>$email,'password'=>$password));
        $query=$this->db->get('tbl_clients');
        //echo $this->db->last_query();exit();
        //echo $query->num_rows();exit();
        if($query->num_rows() == 1)
        {
            //echo 'Ok';exit();
            $row=$query->row();
            $userdata['id']=$row->id;
            $userdata['business_name']=$row->business_name;
            $userdata['email']=$row->email;
            $userdata['loggedIn']=TRUE;
            $userdata['isAdmin']=FALSE;
            $userdata['Iam']='Client';
			$userdata['actype']=$row->actype;
            $userdata['parent_id']=$row->parent_id;

            $this->session->set_userdata('client',$userdata);
            //echo '<pre>'; print_r($this->session->all_userdata());//exit();
            return true;
        }
        else
        {
            //echo 'Not ok';exit();
            return false;
        }
    }
    public function apilogin($email,$password)
    {
        //echo $email;echo $password;exit();
        $this->db->where(array('email'=>$email,'password'=>$password));
        $query=$this->db->get('tbl_clients');
        //echo $this->db->last_query();exit();
        //echo $query->num_rows();exit();
        if($query->num_rows() == 1)
        {
            //echo 'Ok';exit();
            $row=$query->row();
            $userdata['id']=$row->id;
            $userdata['business_name']=$row->business_name;
            $userdata['email']=$row->email;
            $userdata['loggedIn']=TRUE;
            $userdata['isAdmin']=FALSE;
            $userdata['Iam']='Client';
			$userdata['actype']=$row->actype;
            $userdata['parent_id']=$row->parent_id;

            //$this->session->set_userdata('client',$userdata);
            //echo '<pre>'; print_r($this->session->all_userdata());//exit();
            return $userdata;
        }
        else
        {
            //echo 'Not ok';exit();
            return false;
        }
    }
    public function isLoggedIn()
    {
        return(bool) $this->session->userdata('client')['loggedIn'];
    }

    public function get($tbl_name, $order_by, $order, $where = NULL, $condition = NULL, $additional_conditions = NULL, $limit = NULL, $select = NULL)
    {
        if ($select) {
            $this->db->select($select);
        }
        if ($where && $condition) {
            $this->db->where($where, $condition);
        }
        if ($additional_conditions) {
            foreach ($additional_conditions as $key => $value) {
                $this->db->where($key, $value);
            }
        }
        $this->db->order_by($order_by, $order);
        if ($limit != NULL) {
            $this->db->limit($limit);
        }
        $query = $this->db->get($tbl_name);
        return $query->result();
    }
    















    public function insert_batch($data){
		$this->db->insert_batch('tbl_invoices',$data);
		if($this->db->affected_rows()>0)
		{
			return 1;
		}
		else{
			return 0;
		}
	}

    public function product_list()
	{
		$this->db->select('*');
		$this->db->from('tbl_invoices');
		$query=$this->db->get();
		return $query->result();
	}


    public function convert_number_to_words($number){
        $number = str_replace(',', '', $number);
    $hyphen      = '-';
    $conjunction = '  ';
    $separator   = ' ';
    $negative    = 'negative ';
    $decimal     = ' point ';
    $dictionary  = array(
        0                   => 'Zero',
        1                   => 'One',
        2                   => 'Two',
        3                   => 'Three',
        4                   => 'Four',
        5                   => 'Five',
        6                   => 'Six',
        7                   => 'Seven',
        8                   => 'Eight',
        9                   => 'Nine',
        10                  => 'Ten',
        11                  => 'Eleven',
        12                  => 'Twelve',
        13                  => 'Thirteen',
        14                  => 'Fourteen',
        15                  => 'Fifteen',
        16                  => 'Sixteen',
        17                  => 'Seventeen',
        18                  => 'Eighteen',
        19                  => 'Nineteen',
        20                  => 'Twenty',
        30                  => 'Thirty',
        40                  => 'Fourty',
        50                  => 'Fifty',
        60                  => 'Sixty',
        70                  => 'Seventy',
        80                  => 'Eighty',
        90                  => 'Ninety',
        100                 => 'Hundred',
        1000                => 'Thousand',
        1000000             => 'Million',
        1000000000          => 'Billion',
        1000000000000       => 'Trillion',
        1000000000000000    => 'Quadrillion',
        1000000000000000000 => 'Quintillion'
    );
   
    if (!is_numeric($number)) {
        return false;
    }
   
    if (($number >= 0 && (int) $number < 0) || (int) $number < 0 - PHP_INT_MAX) {
        // overflow
        trigger_error(
            'convert_number_to_words only accepts numbers between -' . PHP_INT_MAX . ' and ' . PHP_INT_MAX,
            E_USER_WARNING
        );
        return false;
    }

    if ($number < 0) {
        return $negative . $this->convert_number_to_words(abs($number));
    }
   
    $string = $fraction = null;
   
    if (strpos($number, '.') !== false) {
        list($number, $fraction) = explode('.', $number);
    }
   
    switch (true) {
        case $number < 21:
            $string = $dictionary[$number];
            break;
        case $number < 100:
            $tens   = ((int) ($number / 10)) * 10;
            $units  = $number % 10;
            $string = $dictionary[$tens];
            if ($units) {
                $string .= $hyphen . $dictionary[$units];
            }
            break;
        case $number < 1000:
            $hundreds  = $number / 100;
            $remainder = $number % 100;
            $string = $dictionary[$hundreds] . ' ' . $dictionary[100];
            if ($remainder) {
                $string .= $conjunction . $this->convert_number_to_words($remainder);
            }
            break;
        default:
            $baseUnit = pow(1000, floor(log($number, 1000)));
            $numBaseUnits = (int) ($number / $baseUnit);
            $remainder = $number % $baseUnit;
            $string = $this->convert_number_to_words($numBaseUnits) . ' ' . $dictionary[$baseUnit];
            if ($remainder) {
                $string .= $remainder < 100 ? $conjunction : $separator;
                $string .= $this->convert_number_to_words($remainder);
            }
            break;
    }
   
    if (null !== $fraction && is_numeric($fraction)) {
        $string .= $decimal;
        $words = array();
        foreach (str_split((string) $fraction) as $number) {
            $words[] = $dictionary[$number];
        }
        $string .= implode(' ', $words);
    }
   
    return $string;
    }


    public function callarray($sgstary){
            $ren=array();
            $i=1;
            if(!empty($sgstary)){
                $staxar = array_column($sgstary,'tax');
                //$myarra=array_unique( array_diff_assoc( $staxar, array_unique( $staxar ) ) );

                $myarra=array_unique( $staxar );
                foreach($myarra as $key){
                    foreach($sgstary as $k){
                        $i++;
                        if($key==$k['tax']){
                            $ren[$i]['total']+= $k['subto']; 
                            $ren[$i]['sgst']= $k['tax']/2;
                            $ren[$i]['cgst']= $k['tax']/2; 
                        } 
                    } 
                 } 
             } 
             return $ren;

    }

    public function callarray2($sgstary){
        $ren=array();
        $i=1;
            if(!empty($sgstary)){
                $staxar = array_column($sgstary, 'tax');

                $myarra=array_unique( $staxar );
                foreach($myarra as $key){
                     $i++;
                    foreach($sgstary as $k){                        
                        if($key==$k['tax']){
                           $ren[$i]['total']+= $k['subto']; 
                           $ren[$i]['igsc']= $k['tax'];
                           
                        } 
                    } 

                 } 
             } 

                 
             return $ren;

    }


}
?>