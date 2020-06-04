<?php 

class Model_stores extends CI_Model
{
	public function __construct()
	{
		parent::__construct();
	}

	public function get_products()
	{
		$this->db->select('*');
		$this->db->from('products');
		$this->db->order_by('name');
		$query = $this->db->get();
		return $query->result();
	}

	public function getallunits()
	{
		$this->db->select('*');
		$this->db->from('product_unit');
		$this->db->order_by('unit');
		$this->db->where('active',1);
		$query = $this->db->get();
		return $query->result();
	}

	public function getUnitData($id='')
	{
		$this->db->select('*');
		$this->db->from('product_unit');
		$this->db->where('id',$id);
		$query = $this->db->get();
		return $query->row();
	}

	/* get the active store data */
	public function getActiveStore()
	{
		$sql = "SELECT * FROM stores WHERE active = ?";
		$query = $this->db->query($sql, array(1));
		return $query->result_array();
	}

	/* get the brand data */
	public function getStoresData($id = null)
	{
		if($id) {
			$sql = "SELECT * FROM stores where id = ?";
			$query = $this->db->query($sql, array($id));
			return $query->row_array();
		}

		$sql = "SELECT * FROM stores";
		$query = $this->db->query($sql);
		return $query->result_array();
	}

	public function create($data)
	{
		if($data) {
			$insert = $this->db->insert('stores', $data);
			return ($insert == true) ? true : false;
		}
	}

	public function update($data, $id)
	{
		if($data && $id) {
			$this->db->where('id', $id);
			$update = $this->db->update('stores', $data);
			return ($update == true) ? true : false;
		}
	}

	public function remove($id)
	{
		if($id) {
			$this->db->where('id', $id);
			$delete = $this->db->delete('stores');
			return ($delete == true) ? true : false;
		}
	}

	public function countTotalStores()
	{
		$sql = "SELECT * FROM stores WHERE active = ?";
		$query = $this->db->query($sql, array(1));
		return $query->num_rows();
	}

	public function getProductsunit($id)
	{
		$this->db->select('*');
		$this->db->from('product_unitforsell');
		$this->db->where('id_products',$id);
		$query = $this->db->get();
		return $query->result();

	}

	public function getUnitbyid($unitid='')
	{
		$this->db->select('*');
		$this->db->from('product_unit');
		$this->db->where('id',$unitid);
		$query = $this->db->get();
		return $query->row();
	}

}