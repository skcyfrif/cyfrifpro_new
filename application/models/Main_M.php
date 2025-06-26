<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Main_M extends CI_Model 
{
	public function index()
	{
		//$this->load->view('welcome_message');
	}
	public function login($email,$password)
	{
		//echo $email;echo $password;exit();
		$this->db->where(array('email'=>$email,'password'=>$password));
		$query=$this->db->get('registration');
		if($query->num_rows() == 1)
		{
			//echo 'Ok';exit();
			$row=$query->row();
			$userdata['id']=$row->id;
			$userdata['name']=$row->name;
			$userdata['email']=$row->email;
			$userdata['loggedIn']=TRUE;
			$userdata['isAdmin']=FALSE;
			$userdata['parent_id']=$row->parent_id;
			$this->session->set_userdata($userdata);
			// echo '<pre>';
			// print_r($this->session->all_userdata());//exit();
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
		return(bool) $this->session->userdata('loggedIn');
	}
	public function get($tbl_name,$order_by,$order,$where=NULL,$condition=NULL,$limit=NULL)
    {
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
    public function getSingleRow($tbl_name,$where,$condition,$select=NULL)
    {
    	if($select)
    	{
    		$this->db->select($select);
    	}
    	$this->db->where($where,$condition);
    	$this->db->limit(1);
    	$query=$this->db->get($tbl_name);
    	return $query->row();
    }
    public function _get($_tbl,$order_by,$order,$where=NULL,$condition=NULL,$group_by=NULL,$select=NULL,$limit=NULL)
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
        if($group_by)
    	{
    		$this->db->group_by($group_by);
    	}
        if($limit)
        {
            $this->db->limit($limit);
        }
        $query=$this->db->get($_tbl);
        //echo $this->db->last_query();exit();
        return $query->result();
    }

}