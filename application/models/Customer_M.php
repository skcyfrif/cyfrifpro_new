<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Customer_M extends CI_Model 
{
    public function index()
    {
        //$this->load->view('welcome_message');
    }
    public function login($email,$password)
    {
        //echo $email;echo $password;exit();
        $this->db->where(array('email'=>$email,'password'=>$password));
        $query=$this->db->get('tbl_admin');
        //echo $this->db->last_query();exit();
        //echo $query->num_rows();exit();
        if($query->num_rows() == 1)
        {
            //echo 'Ok';exit();
            $row=$query->row();
            $userdata['id']=$row->id;
            $userdata['name']=$row->name;
            $userdata['email']=$row->email;
            $userdata['loggedIn']=TRUE;
            $userdata['isAdmin']=TRUE;
            $userdata['parent_id']=$row->parent_id;
            $this->session->set_userdata('admin',$userdata);
            //echo '<pre>';
            //print_r($this->session->all_userdata());//exit();
            return true;
        }
        else
        {
            //echo 'Not ok';exit();
            return false;
        }
    }
    public function isLoggedIn()
    {
        return(bool) $this->session->userdata('admin')['loggedIn'];
    }
    public function get($tbl_name,$order_by,$order,$where=NULL,$condition=NULL,$limit=NULL,$select=NULL)
    {
        if($select)
        {
            $this->db->select($select);
        }
        if($where && $condition)
        {
            $this->db->where($where,$condition);
        }
        $this->db->order_by($order_by,$order);
        if($limit != NULL)
        {
            $this->db->limit($limit);
        }
        $query=$this->db->get($tbl_name);
        return $query->result();
    }
    public function getSingleRow($tbl_name,$where,$condition,$limit=NULL)
    {
        //echo $tbl_name;echo $id;
        $this->db->where($where,$condition);
        if($limit)
        {
            $this->db->limit(1);
        }
        $query=$this->db->get($tbl_name);
        // echo '<pre>';
        // print_r($query->row());exit();
        if($query->num_rows() == 1)
        {
            return $query->row();
        }
        else
        {
            return false;
        }
        
    }
    public function getByLike($tbl_name,$order_by,$order,$likeColumn,$likeKeyword,$group_by=NULL)
    {
        $sql="SELECT * FROM $tbl_name WHERE $likeColumn LIKE '%$likeKeyword%' ";
        if($group_by)
        {
            $sql .="GROUP BY $group_by ";
        }
        $sql .="ORDER BY $order_by $order;";
        //echo $sql;exit();
        $query=$this->db->query($sql);
        return $query->result();
    }
    public function insert_batch($data){
		$this->db->insert_batch('tbl_customers',$data);
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
		$this->db->from('tbl_customers');
		$query=$this->db->get();
		return $query->result();
	}
}
?>