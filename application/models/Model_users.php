<?php 

class Model_users extends CI_Model
{
	public function __construct()
	{
		parent::__construct();
	}

	public function getUserData($userId = null) 
	{
		if($userId) {
			$sql = "SELECT * FROM users WHERE id = ?";
			$query = $this->db->query($sql, array($userId));
			return $query->row_array();
		}

		$sql = "SELECT * FROM users WHERE id != ?";
		$query = $this->db->query($sql, array(1));
		return $query->result_array();
	}

	public function getUserGroup($userId = null) 
	{
		if($userId) {
			$sql = "SELECT * FROM user_group WHERE user_id = ?";
			$query = $this->db->query($sql, array($userId));
			$result = $query->row_array();

			$group_id = $result['group_id'];
			$g_sql = "SELECT * FROM groups WHERE id = ?";
			$g_query = $this->db->query($g_sql, array($group_id));
			$q_result = $g_query->row_array();
			return $q_result;
		}
	}

	public function create($data = '', $group_id = null)
	{

		if($data && $group_id) {
			$create = $this->db->insert('users', $data);

			$user_id = $this->db->insert_id();

			$group_data = array(
				'user_id' => $user_id,
				'group_id' => $group_id
			);

			$group_data = $this->db->insert('user_group', $group_data);
			
			return ($create == true && $group_data) ? true : false;
		}
	}

	public function edit($data = array(), $id = null, $group_id = null)
	{
		$this->db->where('id', $id);
		$update = $this->db->update('users', $data);

		if($group_id) {
			// user group
			$update_user_group = array('group_id' => $group_id);
			$this->db->where('user_id', $id);
			$user_group = $this->db->update('user_group', $update_user_group);
			return ($update == true && $user_group == true) ? true : false;	
		}
			
		return ($update == true) ? true : false;	
	}

	public function delete($id)
	{
		$this->db->where('id', $id);
		$delete = $this->db->delete('users');
		return ($delete == true) ? true : false;
	}

	public function countTotalUsers()
	{
		$sql = "SELECT * FROM users";
		$query = $this->db->query($sql);
		return $query->num_rows();
	}

	
	public function createClient_account($data)
	{
		$sql = $this->db->insert('client_tbl',$data);

		return $this->db->insert_id();
	}
	
	
	
	public function loginClient($email, $password) {
		if($email && $password) {
		    $this->db->select('*');
		    $this->db->from('client_tbl');
		    $this->db->where('status','1');
		    $this->db->where("(clt_email='".$email."' OR clt_conno='".$email."')");
// 			$sql = "SELECT * FROM client_tbl WHERE clt_name = ?";
			$query = $this->db->get();

			if($query->num_rows() == 1) {
				$result = $query->row_array();
                    // echo " PAss : ".$password."   ". $result['password'];
				$hash_password = password_verify($password, $result['password']);
				if($hash_password === true) {
					return $result;	
				}
				else {
					return false;
				}

				
			}
			else {
				return false;
			}
		}
	}
	
	public function loginEmp($email, $password) {
		if($email && $password) {
			$sql = "SELECT * FROM delboy WHERE email = ?";
			$query = $this->db->query($sql, array($email));

			if($query->num_rows() == 1) {
				$result = $query->row_array();
				$hash_password = password_verify($password, $result['password']);
				if($hash_password === true) {
					return $result;	
				}
				else {
					return false;
				}

				
			}
			else {
				return false;
			}
		}
	}
	
	public function check_users($user)
	{
	    $this->db->select('*');
	    $this->db->from('client_tbl');
	    $this->db->where('status','1');
	    $this->db->where($user);
	    $query = $this->db->get();
	    return $query->num_rows();
	}
	
	public function getClientData($id)
	{
        $this->db->select('*');
	    $this->db->from('client_tbl');
	    $this->db->where('id',$id);
	    $query = $this->db->get();
	    return $query->row();  
	}
	
	public function update_Client($data,$id)
	{
	    $this->db->where('id',$id);
	    $update = $this->db->update('client_tbl',$data);
	    return ($update == true)?true:false;
	}
	
	public function Contact($data){
	    $this->db->insert('contact_us',$data);
	}
	
	public function register_users()
	{
	    $this->db->select('*');
	    $this->db->from('client_tbl');
	    $this->db->order_by('id',"DESC");
	    $query = $this->db->get();
	    return $query->result_array(); 
	}
	
	public function deleteUsers($id)
	{
	    $this->db->where('id',$id);
	    $delete = $this->db->delete('client_tbl');
		return ($delete == true) ? true : false;
	}
	
	public function contct_data()
	{
	    $this->db->select('*');
	    $this->db->from('contact_us');
	    $this->db->order_by('id',"DESC");
	    $query = $this->db->get();
	    return $query->result_array(); 
	}
	
	public function deleteContact($id)
	{
	    $this->db->where('id',$id);
	    $delete = $this->db->delete('contact_us');
		return ($delete == true) ? true : false;
	}
	
	public function EditClientStatus($id,$status)
	{
	    $this->db->where('id',$id);
	    $update = $this->db->update('client_tbl',$status);
	    return ($update == true) ? true : false;
	}
        
	public function getAllDelUsers()
	{
	    $this->db->select('*');
	    $this->db->from('delboy');
	    $this->db->order_by('id','DESC');
	    $data = $this->db->get();
	    return $data->result_array();
	}
	
	public function Empcreate($data)
	{
	    $this->db->insert('delboy',$data);
	    $id = $this->db->insert_id();
	    return $id;
	}
	
	public function updateEmp($value,$id)
	{
	    $this->db->where('id',$id);
	    $update = $this->db->update('delboy',$value);
	    return ($update == true) ? true : false;
	}
	
	public function empdata($id)
	{
	    $this->db->select('*');
	    $this->db->from('delboy');
	    $this->db->where('id',$id);
	    $query = $this->db->get();
	    return $query->row_array();
	}
	
	public function getActiveDelboys()
	{
	    $this->db->select('*');
	    $this->db->from('delboy');
	    $this->db->where('work_assign','0');
	    $this->db->where('status','1');
	    $query = $this->db->get();
	    return $query->result();
	}
	
	public function clientaddresses($id)
	{
	    $this->db->select('*');
	    $this->db->from('client_address');
	    $this->db->order_by('id','asc');
	    $this->db->where('client_id',$id);
	    $sql = $this->db->get();
	    return $sql->result();
	}
	
	public function addclientaddress($data)
	{
	    $insert = $this->db->insert('client_address',$data);
	    $id = $this->db->insert_id();
	    return ($insert == true)?$id:false;
	}
	
	public function clientaddress($id)
	{
	    $this->db->select('*');
	    $this->db->from('client_address');
	    $this->db->order_by('id','desc');
	    $this->db->where('client_id',$id);
	    $sql = $this->db->get();
	    return $sql->row();
	}
	
	public function address($id)
	{
	    $this->db->select('*');
	    $this->db->from('client_address');
	    $this->db->where('id',$id);
	    $sql = $this->db->get();
	    return $sql->row();
	}
	
	public function changecltpass($value,$id)
	{
	    $this->db->where($id);
	    $this->db->update('client_tbl',$value);
	}

	public function getUserOrderbyId($id)
	{
		$this->db->select('*');
		$this->db->from('orders');
		$this->db->where('user_id',$id);
		$this->db->order_by('id','DESC');
		$query = $this->db->get();
		return $query->result();
	}

	public function getUserTxnbyId($id)
	{
		$this->db->select('*');
		$this->db->from('transaction_tbl');
		$this->db->where('user_id',$id);
		$this->db->order_by('id','DESC');
		$query = $this->db->get();
		return $query->result();
	}

	public function getDelBoyData($userId = null) 
	{
		if($userId) {
			$sql = "SELECT * FROM delboy WHERE id = ?";
			$query = $this->db->query($sql, array($userId));
			return $query->row_array();
		}

		$sql = "SELECT * FROM users WHERE id != ?";
		$query = $this->db->query($sql, array(1));
		return $query->result_array();
	}

	public function edit_del_boy($data = array(), $id = null)
	{
		$this->db->where('id', $id);
		$update = $this->db->update('delboy', $data);			
		return ($update == true) ? true : false;	
	}

	public function delete_delboy($id)
	{
		$data = array('status' => 0);
		$this->db->where('id', $id);
		$delete = $this->db->update('delboy', $data);
		return ($delete == true) ? true : false;
	}

	
	public function update_del_boy($data,$id)
	{
	    $this->db->where('id',$id);
	    $update = $this->db->update('delboy',$data);
	    return ($update == true)?true:false;
	}
	
	public function check_pin($pin)
	{
	    $this->db->select('*');
	    $this->db->from('service_areas');
	    $this->db->where('pincode',$pin);
	    $this->db->where('status',1);
	    $query = $this->db->get();
	    return $query->num_rows();
	}
	
}