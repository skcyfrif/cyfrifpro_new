<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Inventory_M extends CI_Model 
{
	public function index()
	{
		//$this->load->view('welcome_message');
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

}