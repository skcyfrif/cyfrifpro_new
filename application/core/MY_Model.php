<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class MY_Model extends CI_Model 
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

}
?>