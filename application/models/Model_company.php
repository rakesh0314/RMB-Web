<?php 

class Model_company extends CI_Model
{
	public function __construct()
	{
		parent::__construct();
	}

	/* get the brand data */
	public function getCompanyData($id = null)
	{
		if($id) {
			$sql = "SELECT * FROM company WHERE id = ?";
			$query = $this->db->query($sql, array($id));
			return $query->row_array();
		}
	}

	public function update($data, $id)
	{
		if($data && $id) {
			$this->db->where('id', $id);
			$update = $this->db->update('company', $data);
			return ($update == true) ? true : false;
		}
	}
	
	public function update_status($status)
	{
	    $this->db->update('about_us',$status);
	}
	
	public function create_about($value)
	{
	    $this->db->insert('about_us',$value);
	    $id = $this->db->insert_id();
	    return $id;
	}
	
	public function update_about($value,$id)
	{
	    $this->db->where('id',$id);
	    $this->db->update('about_us',$value);
	}
	
	public function deleteAbout($id)
	{
	    $this->db->where('id',$id);
	    $delete = $this->db->delete('about_us');
	    return ($delete == true) ? true : false;
	}
	
	public function getabout()
	{
	    $this->db->select('*');
	    $this->db->from('about_us');
	    $this->db->order_by('id','desc');
	    $query = $this->db->get();
	    return $query->result();
	}
	
	public function getactiveabout()
	{
	    $this->db->select('*');
	    $this->db->from('about_us');
	    $this->db->where('status','1');
	    $this->db->order_by('id','desc');
	    $query = $this->db->get();
	    return $query->row();
	}
	
	public function getbanner()
	{
	    $this->db->select('*');
	    $this->db->from('tbl_banner');
	    $this->db->order_by('id','desc');
	    $query = $this->db->get();
	    return $query->result();
	}
	
	public function creat_banner($data)
	{
	    $this->db->insert('tbl_banner',$data);
	    $id = $this->db->insert_id();
	    return $id;
	}
	
	public function update_banner($data,$id)
	{
	    $this->db->where('id',$id);
	    $this->db->update('tbl_banner',$data);
	}
	
	public function countBanner()
	{
	    $this->db->select('*');
	    $this->db->from('tbl_banner');
	    $this->db->where('status','1');
	    $query = $this->db->get();
	    return $query->num_rows();
	}
	
	public function bannerdel($id)
	{
	    $this->db->where('id',$id);
	    $delete = $this->db->delete('tbl_banner');
	    return ($delete == true) ? true : false;
	}
	
	public function getBannerdata($id)
	{
	    $this->db->select('*');
	    $this->db->from('tbl_banner');
	    $this->db->where('id',$id);
	    $sql = $this->db->get();
	    return $sql->row();
	}
	
	public function activebanner()
	{
	    $this->db->select('*');
	    $this->db->from('tbl_banner');
	    $this->db->order_by('position');
	    $result = $this->db->get();
	    return $result->result();
	}
	
	public function getterms()
	{
	    $this->db->select('*');
	    $this->db->from('termsncondition');
	    $this->db->order_by('date','desc');
	    $result = $this->db->get();
	    return $result->result();
	}
	
	public function insert_terms($data)
	{
	    $this->db->insert('termsncondition',$data);
	    $insert = $this->db->insert_id();
	    return $insert;
	}
	
	public function deleterms($id)
	{
	    $this->db->where('id',$id);
	    $delete = $this->db->delete('termsncondition');
	    return ($delete == true) ? true : false;
	}
	
	public function updateterms_status($status)
	{
	    $this->db->update('termsncondition',$status);
	}
	
	public function update_terms($value,$id)
	{
	    $this->db->where('id',$id);
	    $update = $this->db->update('termsncondition',$value);
	    return ($update == true) ? true : false;
	}
	
	public function getactiveterms()
	{
	    $this->db->select('*');
	    $this->db->from('termsncondition');
	    $this->db->where('status','1');
	    $result = $this->db->get();
	    return $result->row();
	}

	public function addaboutdata($value)
	{
		$this->db->insert('aboutdata',$value);
	}

	public function getaboutdata($id)
	{
		$this->db->select('*');
		$this->db->from('aboutdata');
		$this->db->where('about_id',$id);
		$query = $this->db->get();
		return $query->result();
	}

	public function deleteAboutdata($id)
	{
		$this->db->where('about_id',$id);
		$this->db->delete('aboutdata');
	}

	public function addtermsdata($value)
	{
		$this->db->insert('termsdata_tbl',$value);
	}

	public function getTermsdata($id)
	{
		$this->db->select('*');
		$this->db->from('termsdata_tbl');
		$this->db->where('terms_id',$id);
		$query = $this->db->get();
		return $query->result();
	}
	
	public function deletermsdata($id)
	{
	    $this->db->where('terms_id',$id);
		$this->db->delete('termsdata_tbl');
	}


}