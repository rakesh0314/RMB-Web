<?php 

class Model_serviceareas extends CI_Model
{
	public function __construct()
	{
		parent::__construct();
	}

	public function getServiceAreaData() 
	{
        $this->db->select('*');
	    $this->db->from('service_areas');
	    $data = $this->db->get();
	    return $data->result_array();
    }
	public function getServiceAreaDataById($id) 
	{
        if($id) {
			$sql = "SELECT * FROM service_areas WHERE id = ?";
			$query = $this->db->query($sql, array($id));
			return $query->row_array();
		}
    }
    
    public function create($data = '')
	{

		if($data) {
			$create = $this->db->insert('service_areas', $data);			
			return ($create == true) ? true : false;
		}
    }
    
    public function edit($data = array(), $id = null)
	{
		$this->db->where('id', $id);
		$update = $this->db->update('service_areas', $data);
		return ($update == true) ? true : false;	
    }
    
    public function delete($id)
	{
		$this->db->where('id', $id);
		$delete = $this->db->delete('service_areas');
		return ($delete == true) ? true : false;
	}
	
}