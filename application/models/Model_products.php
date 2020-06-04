<?php 

class Model_products extends CI_Model
{
	public function __construct()
	{
		parent::__construct();
	}

	/* get the brand data */
	public function getProductData($id = null)
	{
		if($id) {
			$sql = "SELECT * FROM products where id = ?";
			$query = $this->db->query($sql, array($id));
			return $query->row_array();
		}

		$sql = "SELECT * FROM products ORDER BY id DESC";
		$query = $this->db->query($sql);
		return $query->result_array();
	}

	public function getActiveProductData()
	{
	   //$sql ="SELECT products.id,products.name,products.sku,products.image,product_unitforsell.id_products,product_unitforsell.unit_id,product_unitforsell.mrpprice,
	   //product_unitforsell.sellprice,product_unit.unit FROM `products` INNER JOIN `product_unitforsell` ON product_unitforsell.id_products = products.id  
	   //INNER JOIN `product_unit`ON  product_unitforsell.unit_id = product_unit.id order by products.id ";
		$sql = "SELECT * FROM products WHERE availability = ?";
		$query = $this->db->query($sql, array(1));
		return $query->result_array();
	}

	public function create($data)
	{
		if($data) {
			$insert = $this->db->insert('products', $data);
			// $Latid = $this->db->insert_id();
			return $this->db->insert_id();
			// return ($insert == true) ? true : false;
		}
	}

	public function create_product_transaction_history($data)
	{
		if($data) {
			$insert = $this->db->insert('product_transaction_history', $data);
			return $this->db->insert_id();
		}
	}

	public function create_product_sale_unit_price($data)
	{
		if($data) {
			$insert = $this->db->insert('product_unitforsell', $data);
			return $this->db->insert_id();
		}
	}

	public function check_product_sale_unit_price($data)
	{
		$this->db->select('*');
		$this->db->from('product_unitforsell');
		$this->db->where('id_products',$data['id_products']);
		$this->db->where('unit_id',$data['unit_id']);
		$this->db->where('quantity',$data['quantity']);
		$query = $this->db->get();
		return $query->result_array();
	}


	public function update_product_sale_unit_price($data, $id)
	{
		if($data && $id) {
			$this->db->where('id', $id);
			$update = $this->db->update('product_unitforsell', $data);
			return ($update == true) ? true : false;
		}
	}

	public function uintsforsell($unitData){
		if($unitData){
			$insert = $this->db->insert('product_unitforsell', $unitData);
			return ($insert == true) ? true : false;
		}
	}

	public function update($data, $id)
	{
		if($data && $id) {
			$this->db->where('id', $id);
			$update = $this->db->update('products', $data);
			return ($update == true) ? true : false;
		}
	}

	public function remove($id)
	{
		if($id) {
			$this->db->where('id', $id);
			$delete = $this->db->delete('products');
			return ($delete == true) ? true : false;
		}
	}

	public function countTotalProducts()
	{
		$sql = "SELECT * FROM products";
		$query = $this->db->query($sql);
		return $query->num_rows();
	}

	public function get_Product_Bycategory($cate)
	{
		$this->db->select('*');
		$this->db->from('products');
		$this->db->where('category_id',$cate);
		$query = $this->db->get();
		return $query->result_array();
	}
	
	public function cartDetails($prodid,$unitid)
	{
	   $sql ="SELECT products.name,products.sku,products.image,products.qty,product_unitforsell.id_products,product_unitforsell.id,product_unitforsell.unit_id,product_unitforsell.mrpprice,
	   product_unitforsell.sellprice,product_unitforsell.quantity,product_unit.unit FROM `products` INNER JOIN `product_unitforsell` ON product_unitforsell.id_products = products.id 
	   INNER JOIN `product_unit`ON  product_unitforsell.unit_id = product_unit.id where products.id=$prodid and product_unitforsell.id= $unitid";
// 		$sql = "SELECT * FROM products WHERE availability = ? ORDER BY id DESC";
		$query = $this->db->query($sql);
		return $query->row_array();
	}
	
	public function get_product_search($prodname)
	{
	    $this->db->select('*');
	    $this->db->from('products');
	    $this->db->like('sarch_key', $prodname, 'both');
        $this->db->or_like('name', $prodname, 'both');
		$query = $this->db->get();
		return $query->result_array();
	}
	
	public function getProductDetails($id)
	{
	    $this->db->select('*');
	    $this->db->from('products');
	    $this->db->where('id',$id);
	    $query = $this->db->get();
	    return $query->row();
	}
    
    public function deleteunit($id)
    {
        if($id) {
			$this->db->where('id', $id);
			$delete = $this->db->delete('product_unitforsell');
			return ($delete == true) ? true : false;
		}
	}
	
	public function getunitbyid($id)
    {
        $this->db->select('*');
	    $this->db->from('product_unit');
	    $this->db->where('id',$id);
	    $query = $this->db->get();
	    return $query->row();
	}
	
	public function get_products_transaction_history(){
		$this->db->select('*');
	    $this->db->from('product_transaction_history');
	    $query = $this->db->get();
	    return $query->result_array();
	}


}