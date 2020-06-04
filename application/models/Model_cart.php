<?php 
defined("BASEPATH") OR exit('No Script Are allowed');


/**
 * 
 */
class Model_cart extends CI_Model
{
	
	public function create($value)
	{
		$this->db->insert('cart_table',$value);
	}

	public function count_cart($id)
	{
		$this->db->select('*');
		$this->db->from('cart_table');
		$this->db->where('user_id',$id);
		$query = $this->db->get();
		return $query->num_rows();
	}

	public function remove_cart($id)
	{
		$this->db->where('id',$id);
		$this->db->delete('cart_table');
		return true;
	}

	public function get_cart_data($user_id)
	{
		$this->db->select('*');
		$this->db->from('cart_table');
		$this->db->where('user_id',$user_id);
		$query = $this->db->get();
		return $query->result();
	}
	
	public function check_cart($data)
	{
	    $this->db->select('*');
		$this->db->from('cart_table');
		$this->db->where($data);
		$query = $this->db->get();
		return $query->num_rows();
	}
}