<?php defined('BASEPATH') OR exit('No script allowed');

class Model_units extends CI_Model
{
	public function __construct()
	{
		parent::__construct();
	}

	public function get_product_unit($id)
	{
		$sql = "SELECT product_unitforsell.id_products,product_unitforsell.id,product_unitforsell.unit_id,product_unitforsell.mrpprice,product_unitforsell.sellprice,product_unitforsell.quantity,product_unit.unit FROM `product_unitforsell` INNER JOIN `product_unit` ON product_unitforsell.unit_id = product_unit.id WHERE `id_products`=$id order by `unit`,`quantity`";
		$query = $this->db->query($sql);
		return $query->result();
	}
	
	public function get_products_unit()
	{
		$this->db->select('*');
		$this->db->from('product_unit');
		$this->db->where('status',1);
		$query = $this->db->get();
		return $query->result();
	}
	
	public function get_all_products_unit()
	{
		$this->db->select('*');
		$this->db->from('product_unit');
		$query = $this->db->get();
		return $query->result();
	}
	

	public function create($value)
	{
		$this->db->insert('product_unit',$value);
		return 'Success';
	}
	
	public function get_product_units_define($id)
	{
	    $this->db->select('*');
	    $this->db->from('product_unitforsell');
	    $this->db->where('id_products',$id);
	    $this->db->where('status', 1);
	    $query = $this->db->get();
	    return $query->result();
	}

	public function remove($id,$value)
	{
		$this->db->where('id',$id);
		$update = $this->db->update('product_unit',$value);
		return ($update==true)?true:false;
	}

	public function deletesaleunit($id)
	{
		$value = array('status'=>0);
		$this->db->where('id',$id);
		$update = $this->db->update('product_unitforsell',$value);
		return ($update==true)?true:false;
	}

	public function getunitdata($id='')
	{
		$this->db->select('*');
		$this->db->from('product_unit');
		$this->db->where('id',$id);
		$query = $this->db->get();
		return $query->row();
	}
	
	public function get_product_units_byprod($id)
    {
        $this->db->select('*');
        $this->db->from('product_unitforsell');
        $this->db->where('id_products',$id);
        $query = $this->db->get();
        return $query->result_array();
    }
    
    public function get_product_base_units($id)
    {
        $this->db->select('*');
        $this->db->from('product_unit');
        $this->db->where('id',$id);
        $query = $this->db->get();
        return $query->row();
    }

}