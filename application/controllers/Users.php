<?php 

class Users extends Admin_Controller 
{
	public function __construct()
	{
		parent::__construct();

		$this->not_logged_in();
		
		$this->data['page_title'] = 'Users';
		

		$this->load->model('model_users');
		$this->load->model('model_groups');
		$this->load->model('model_orders');
		$this->data['order_notification_count'] = count($this->model_orders->get_all_orders_notification());
		$this->data['order_topten_notifications'] = $this->model_orders->get_topten_orders_notification();
	}

	
	public function index()
	{
		if(!in_array('viewAdmin', $this->permission)) {
			redirect('dashboard', 'refresh');
		}

		$user_data = $this->model_users->getUserData();

		$result = array();
		foreach ($user_data as $k => $v) {

			$result[$k]['user_info'] = $v;

			$group = $this->model_users->getUserGroup($v['id']);
			$result[$k]['user_group'] = $group;
		}

		$this->data['user_data'] = $result;

		$this->render_template('users/index', $this->data);
	}

	public function create()
	{
		if(!in_array('createAdmin', $this->permission)) {
			redirect('dashboard', 'refresh');
		}

		$this->form_validation->set_rules('groups', 'Group', 'required');
		$this->form_validation->set_rules('username', 'Username', 'trim|required|min_length[5]|max_length[12]|is_unique[users.username]');
		$this->form_validation->set_rules('email', 'Email', 'trim|required|is_unique[users.email]');
		$this->form_validation->set_rules('password', 'Password', 'trim|required|min_length[8]');
		$this->form_validation->set_rules('cpassword', 'Confirm password', 'trim|required|matches[password]');
		$this->form_validation->set_rules('fname', 'First name', 'trim|required');

        if ($this->form_validation->run() == TRUE) {
            // true case
            $password = $this->password_hash($this->input->post('password'));
        	$data = array(
        		'username' => $this->input->post('username'),
        		'password' => $password,
        		'email' => $this->input->post('email'),
        		'firstname' => $this->input->post('fname'),
        		'lastname' => $this->input->post('lname'),
        		'phone' => $this->input->post('phone'),
        		'gender' => $this->input->post('gender'),
        	);

        	$create = $this->model_users->create($data, $this->input->post('groups'));

        	
        	if($create == true) {
        		$this->session->set_flashdata('success', 'Successfully created');
        		redirect('users/', 'refresh');
        	}
        	else {
        		$this->session->set_flashdata('errors', 'Error occurred!!');
        		redirect('users/create', 'refresh');
        	}
        }
        else {
            // false case
        	$group_data = $this->model_groups->getGroupData();
        	$this->data['group_data'] = $group_data;

            $this->render_template('users/create', $this->data);
        }	

		
	}

	public function password_hash($pass = '')
	{
		if($pass) {
			$password = password_hash($pass, PASSWORD_DEFAULT);
			return $password;
		}
	}

	public function edit($id = null)
	{
		if(!in_array('updateAdmin', $this->permission)) {
			redirect('dashboard', 'refresh');
		}

		if($id) {
			$this->form_validation->set_rules('groups', 'Group', 'required');
			$this->form_validation->set_rules('username', 'Username', 'trim|required|min_length[5]|max_length[12]');
			$this->form_validation->set_rules('email', 'Email', 'trim|required');
			$this->form_validation->set_rules('fname', 'First name', 'trim|required');


			if ($this->form_validation->run() == TRUE) {
	            // true case
		        if(empty($this->input->post('password')) && empty($this->input->post('cpassword'))) {
		        	$data = array(
		        		'username' => $this->input->post('username'),
		        		'email' => $this->input->post('email'),
		        		'firstname' => $this->input->post('fname'),
		        		'lastname' => $this->input->post('lname'),
		        		'phone' => $this->input->post('phone'),
		        		'gender' => $this->input->post('gender'),
		        	);

		        	$update = $this->model_users->edit($data, $id, $this->input->post('groups'));
		        	if($update == true) {
		        		$this->session->set_flashdata('success', 'Successfully created');
		        		redirect('users/', 'refresh');
		        	}
		        	else {
		        		$this->session->set_flashdata('errors', 'Error occurred!!');
		        		redirect('users/edit/'.$id, 'refresh');
		        	}
		        }
		        else {
		        	$this->form_validation->set_rules('password', 'Password', 'trim|required|min_length[8]');
					$this->form_validation->set_rules('cpassword', 'Confirm password', 'trim|required|matches[password]');

					if($this->form_validation->run() == TRUE) {

						$password = $this->password_hash($this->input->post('password'));

						$data = array(
			        		'username' => $this->input->post('username'),
			        		'password' => $password,
			        		'email' => $this->input->post('email'),
			        		'firstname' => $this->input->post('fname'),
			        		'lastname' => $this->input->post('lname'),
			        		'phone' => $this->input->post('phone'),
			        		'gender' => $this->input->post('gender'),
			        	);

			        	$update = $this->model_users->edit($data, $id, $this->input->post('groups'));
			        	if($update == true) {
			        		$this->session->set_flashdata('success', 'Successfully updated');
			        		redirect('users/', 'refresh');
			        	}
			        	else {
			        		$this->session->set_flashdata('errors', 'Error occurred!!');
			        		redirect('users/edit/'.$id, 'refresh');
			        	}
					}
			        else {
			            // false case
			        	$user_data = $this->model_users->getUserData($id);
			        	$groups = $this->model_users->getUserGroup($id);

			        	$this->data['user_data'] = $user_data;
			        	$this->data['user_group'] = $groups;

			            $group_data = $this->model_groups->getGroupData();
			        	$this->data['group_data'] = $group_data;

						$this->render_template('users/edit', $this->data);	
			        }	

		        }
	        }
	        else {
	            // false case
	        	$user_data = $this->model_users->getUserData($id);
	        	$groups = $this->model_users->getUserGroup($id);

	        	$this->data['user_data'] = $user_data;
	        	$this->data['user_group'] = $groups;

	            $group_data = $this->model_groups->getGroupData();
	        	$this->data['group_data'] = $group_data;

				$this->render_template('users/edit', $this->data);	
	        }	
		}	
	}

	public function editemp($id = null)
	{
		if(!in_array('updateUser', $this->permission)) {
			redirect('dashboard', 'refresh');
		}

		if($id) {
			$this->form_validation->set_rules('name', 'Full Name', 'trim|required|min_length[5]|max_length[20]');
			$this->form_validation->set_rules('email', 'Email', 'trim|required');


			if ($this->form_validation->run() == TRUE) {
	            // true case
		        if(empty($this->input->post('password')) && empty($this->input->post('cpassword'))) {
		        	$data = array(
		        		'name' => $this->input->post('name'),
		        		'email' => $this->input->post('email'),
		        		'contactno' => $this->input->post('contactno'),
		        		'vehicle_type' => $this->input->post('vehicle_type'),
		        		'vehicleno' => $this->input->post('vehicleno'),
		        		'status' => (int) $this->input->post('status'),
					);
					
					if($_FILES['deluser_image']['size'] > 0) {
						$upload_image = $this->upload_image($id);
						$upload_image = array('image' => $upload_image);
						$this->model_users->update_del_boy($upload_image, $id);
					}
		

		        	$update = $this->model_users->edit_del_boy($data, $id);
		        	if($update == true) {
		        		$this->session->set_flashdata('success', 'Successfully created');
		        		redirect('users/delUsers', 'refresh');
		        	}
		        	else {
		        		$this->session->set_flashdata('errors', 'Error occurred!!');
		        		redirect('users/editemp/'.$id, 'refresh');
		        	}
		        }
		        else {
		        	$this->form_validation->set_rules('password', 'Password', 'trim|required|min_length[8]');
					$this->form_validation->set_rules('cpassword', 'Confirm password', 'trim|required|matches[password]');

					if($this->form_validation->run() == TRUE) {

						$password = $this->password_hash($this->input->post('password'));

						$data = array(
							'name' => $this->input->post('name'),
							'email' => $this->input->post('email'),
							'contactno' => $this->input->post('contactno'),
							'vehicle_type' => $this->input->post('vehicle_type'),
							'vehicleno' => $this->input->post('vehicleno'),
							'status' => (int) $this->input->post('status'),
							'password' => $password,
						);

			        	$update = $this->model_users->edit_del_boy($data, $id);
			        	if($update == true) {
			        		$this->session->set_flashdata('success', 'Successfully updated');
			        		redirect('users/delUsers', 'refresh');
			        	}
			        	else {
			        		$this->session->set_flashdata('errors', 'Error occurred!!');
			        		redirect('users/editemp/'.$id, 'refresh');
			        	}
					}
			        else {
						// false case
						$user_data = $this->model_users->getDelBoyData($id);

						$this->data['user_data'] = $user_data;
						
						$this->render_template('users/editemp', $this->data);	
			        }	

		        }
	        }
	        else {
	            // false case
	        	$user_data = $this->model_users->getDelBoyData($id);

				$this->data['user_data'] = $user_data;
				
				$this->render_template('users/editemp', $this->data);	
	        }	
		}	
	}


	public function delete($id)
	{
		if(!in_array('deleteAdmin', $this->permission)) {
			redirect('dashboard', 'refresh');
		}

		if($id) {
			if($this->input->post('confirm')) {
					$delete = $this->model_users->delete($id);
					if($delete == true) {
		        		$this->session->set_flashdata('success', 'Successfully removed');
		        		redirect('users/', 'refresh');
		        	}
		        	else {
		        		$this->session->set_flashdata('error', 'Error occurred!!');
		        		redirect('users/delete/'.$id, 'refresh');
		        	}

			}	
			else {
				$this->data['id'] = $id;
				$this->render_template('users/delete', $this->data);
			}	
		}
	}

	public function deleteemp($id)
	{
		if(!in_array('deleteUser', $this->permission)) {
			redirect('dashboard', 'refresh');
		}

		if($id) {
			if($this->input->post('confirm')) {
					$delete = $this->model_users->delete_delboy($id);
					if($delete == true) {
		        		$this->session->set_flashdata('success', 'Successfully removed');
		        		redirect('users/delUsers', 'refresh');
		        	}
		        	else {
		        		$this->session->set_flashdata('error', 'Error occurred!!');
		        		redirect('users/deleteemp/'.$id, 'refresh');
		        	}

			}	
			else {
				$this->data['id'] = $id;
				$this->render_template('users/deleteemp', $this->data);
			}	
		}
	}


	public function profile()
	{
		if(!in_array('viewProfile', $this->permission)) {
			redirect('dashboard', 'refresh');
		}

		$user_id = $this->session->userdata('id');

		$user_data = $this->model_users->getUserData($user_id);
		$this->data['user_data'] = $user_data;

		$user_group = $this->model_users->getUserGroup($user_id);
		$this->data['user_group'] = $user_group;

        $this->render_template('users/profile', $this->data);
	}

	public function setting()
	{	
		if(!in_array('updateSetting', $this->permission)) {
			redirect('dashboard', 'refresh');
		}

		$id = $this->session->userdata('id');

		if($id) {
			$this->form_validation->set_rules('username', 'Username', 'trim|required|min_length[5]|max_length[12]');
			$this->form_validation->set_rules('email', 'Email', 'trim|required');
			$this->form_validation->set_rules('fname', 'First name', 'trim|required');


			if ($this->form_validation->run() == TRUE) {
	            // true case
		        if(empty($this->input->post('password')) && empty($this->input->post('cpassword'))) {
		        	$data = array(
		        		'username' => $this->input->post('username'),
		        		'email' => $this->input->post('email'),
		        		'firstname' => $this->input->post('fname'),
		        		'lastname' => $this->input->post('lname'),
		        		'phone' => $this->input->post('phone'),
		        		'gender' => $this->input->post('gender'),
		        	);

		        	$update = $this->model_users->edit($data, $id);
		        	if($update == true) {
		        		$this->session->set_flashdata('success', 'Successfully updated');
		        		redirect('users/setting/', 'refresh');
		        	}
		        	else {
		        		$this->session->set_flashdata('errors', 'Error occurred!!');
		        		redirect('users/setting/', 'refresh');
		        	}
		        }
		        else {
		        	$this->form_validation->set_rules('password', 'Password', 'trim|required|min_length[8]');
					$this->form_validation->set_rules('cpassword', 'Confirm password', 'trim|required|matches[password]');

					if($this->form_validation->run() == TRUE) {

						$password = $this->password_hash($this->input->post('password'));

						$data = array(
			        		'username' => $this->input->post('username'),
			        		'password' => $password,
			        		'email' => $this->input->post('email'),
			        		'firstname' => $this->input->post('fname'),
			        		'lastname' => $this->input->post('lname'),
			        		'phone' => $this->input->post('phone'),
			        		'gender' => $this->input->post('gender'),
			        	);

			        	$update = $this->model_users->edit($data, $id, $this->input->post('groups'));
			        	if($update == true) {
			        		$this->session->set_flashdata('success', 'Successfully updated');
			        		redirect('users/setting/', 'refresh');
			        	}
			        	else {
			        		$this->session->set_flashdata('errors', 'Error occurred!!');
			        		redirect('users/setting/', 'refresh');
			        	}
					}
			        else {
			            // false case
			        	$user_data = $this->model_users->getUserData($id);
			        	$groups = $this->model_users->getUserGroup($id);

			        	$this->data['user_data'] = $user_data;
			        	$this->data['user_group'] = $groups;

			            $group_data = $this->model_groups->getGroupData();
			        	$this->data['group_data'] = $group_data;

						$this->render_template('users/setting', $this->data);	
			        }	

		        }
	        }
	        else {
	            // false case
	        	$user_data = $this->model_users->getUserData($id);
	        	$groups = $this->model_users->getUserGroup($id);

	        	$this->data['user_data'] = $user_data;
	        	$this->data['user_group'] = $groups;

	            $group_data = $this->model_groups->getGroupData();
	        	$this->data['group_data'] = $group_data;

				$this->render_template('users/setting', $this->data);	
	        }	
		}
	}
	
	public function regUsers()
	{
	    if(!in_array('viewUser', $this->permission)) {
			redirect('dashboard', 'refresh');
		}
	    $this->data['user_data'] = $this->model_users->register_users();
	    $this->render_template('users/regUsers', $this->data);
	}
	
	public function deleteUsers($id)
	{
	    if(!in_array('deleteUser', $this->permission)) {
			redirect('dashboard', 'refresh');
		}

		if($id) {
			if($this->input->post('confirm')) {
					$delete = $this->model_users->deleteUsers($id);
					if($delete == true) {
		        		$this->session->set_flashdata('success', 'Successfully removed');
		        		redirect('users/regUsers', 'refresh');
		        	}
		        	else {
		        		$this->session->set_flashdata('error', 'Error occurred!!');
		        		redirect('users/deleteUser/'.$id, 'refresh');
		        	}

			}	
			else {
				$this->data['id'] = $id;
				$this->render_template('users/deleteUser', $this->data);
			}	
		}
	}
	
	public function ContactUser()
	{
	    if(!in_array('viewContact', $this->permission)) {
			redirect('dashboard', 'refresh');
		}
	    $this->data['contact'] = $this->model_users->contct_data();
	    $this->render_template('users/ContactDetails', $this->data);
	}
	
	public function deleteContact($id)
	{
	    if(!in_array('deleteContact', $this->permission)) {
			redirect('dashboard', 'refresh');
		}
	    if($id) {
			if($this->input->post('confirm')) {
					$delete = $this->model_users->deleteContact($id);
					if($delete == true) {
		        		$this->session->set_flashdata('success', 'Successfully removed');
		        		redirect('users/ContactUser', 'refresh');
		        	}
		        	else {
		        		$this->session->set_flashdata('error', 'Error occurred!!');
		        		redirect('users/deleteContact/'.$id, 'refresh');
		        	}

			}	
			else {
				$this->data['id'] = $id;
				$this->render_template('users/deleteContact', $this->data);
			}	
		}
	}
	
	public function changeStatus()
	{
	    if($this->input->get('status')=='1'){
	        $status=array('status'=>'0');
	    }else{
	        $status=array('status'=>'1');
	    }
	    $update = $this->model_users->EditClientStatus($this->input->get('cliId'),$status);
	    if($update == true) {
    		$this->session->set_flashdata('success', 'Successfully Updted');
    	}
    	else {
    		$this->session->set_flashdata('error', 'Error occurred!!');
    	}
	}
	
	public function delUsers()
	{
	    if(!in_array('viewEmp', $this->permission)) {
			redirect('dashboard', 'refresh');
		}
	    $this->data['delboy'] = $this->model_users->getAllDelUsers();
	    $this->render_template('users/delboys', $this->data);
	}

    public function createEmp()
    {
        if(!in_array('createEmp', $this->permission)) {
			redirect('dashboard', 'refresh');
		}
		$this->form_validation->set_rules('username', 'Name', 'trim|required|min_length[3]|max_length[25]');
		$this->form_validation->set_rules('email', 'Email', 'trim|required');
		$this->form_validation->set_rules('password', 'Password', 'trim|required|min_length[8]');
		$this->form_validation->set_rules('cpassword', 'Confirm password', 'trim|required|matches[password]');
		$this->form_validation->set_rules('phone', 'Contact no', 'trim|required|min_length[10]|max_length[12]');
		$this->form_validation->set_rules('vehicle_type', 'Vehicle Type', 'trim|required');
		$this->form_validation->set_rules('vehicle', 'Vehicle No', 'trim|required');
    
        if ($this->form_validation->run() == TRUE) {
            // true case
            $password = $this->password_hash($this->input->post('password'));
        	$data = array(
        		'name' => $this->input->post('username'),
        		'password' => $password,
        		'email' => $this->input->post('email'),
        		'contactno' => $this->input->post('phone'),
        		'vehicleno' => $this->input->post('vehicle'),
        		'vehicle_type' => $this->input->post('vehicle_type'),
        		'status ' => '1',
        	);
        	$result = $this->model_users->Empcreate($data);
        	
        	$result1 = $this->upload_image($result);
        	
        	$imagedata = array('image'=>$result1);
        	$create = $this->model_users->updateEmp($imagedata, $result);

        	
        	if($create == true) {
        		$this->session->set_flashdata('success', 'Successfully created');
        		redirect('users/delUsers', 'refresh');
        	}
        	else {
        		$this->session->set_flashdata('errors', 'Error occurred!!');
        		redirect('users/createemp', 'refresh');
        	}
        }
        else {
            // false case

            $this->render_template('users/createemp', $this->data);
        }	

    }
    
    public function upload_image($id)
    {
    	// assets/images/product_image
        $config['upload_path'] = 'assets/images/userimage';
        $config['file_name'] =  $id;
        $config['allowed_types'] = 'gif|jpg|png';
        $config['max_size'] = '1000';

        // $config['max_width']  = '1024';s
        // $config['max_height']  = '768';

        $this->load->library('upload', $config);
        if ( ! $this->upload->do_upload('deluser_image'))
        {
            $error = $this->upload->display_errors();
            return $error;
        }
        else
        {
            $data = array('upload_data' => $this->upload->data());
            $type = explode('.', $_FILES['deluser_image']['name']);
            $type = $type[count($type) - 1];
            
            $path = $config['upload_path'].'/'.$id.'.'.$type;
            return ($data == true) ? $path : false;            
        }
    }

    public function orders($id)
    {
        if(!in_array('viewOrder', $this->permission)) {
			redirect('dashboard', 'refresh');
		}
    	
	    $this->data['id'] = $id;
		$this->data['user'] = $this->model_users->getClientData($id);
	    $this->render_template('users/userOrder', $this->data);
    }

    public function fetchOrdersData($id='')
    {
    	$result = array('data' => array());
	    $orders = $this->model_users->getUserOrderbyId($id);
	    $i = 1;
		foreach ($orders as $key=> $value) {

			$count_total_item = $this->model_orders->countOrderItem($value->id);
			// button
			$buttons = '';

			// if(in_array('viewOrder', $this->permission)&&$value->status==0 || $value->status == 1) {
			// 	$buttons .= '<a href="'.base_url('orders/assign_delboy/'.$value->id).'" class="btn btn-default"><i class="fa fa-truck"></i></a>';
			// }

			if(in_array('updateOrder', $this->permission)) {
				$buttons .= ' <a href="'.base_url('orders/update/'.$value->id).'" class="btn btn-default"><i class="fa fa-eye"></i></a>';
			}

			if(in_array('deleteOrder', $this->permission)) {
				$buttons .= ' <button type="button" class="btn btn-default" onclick="removeFunc('.$value->id.')" data-toggle="modal" data-target="#removeModal"><i class="fa fa-trash"></i></button>';
			}

			if($value->status == 1) {
				$paid_status = '<span class="label label-success">Processing</span>';	
			}else if($value->status == 2) {
				$paid_status = '<span class="label label-success">Done</span>';	
			}else if($value->status == 3) {
				$paid_status = '<span class="label label-danger">Cancel</span>';	
			}else if($value->status == 4) {
				$paid_status = '<span class="label label-danger">Order not confirm</span>';	
			}else {
				$paid_status = '<span class="label label-warning">Pending</span> ';
			}
			$order_id = "Sabji-".$value->id;
            // print_r($cust);
			$result['data'][$key] = array(
				$i,
				$order_id,
				$count_total_item,
				$value->net_amount,
				$value->payment_method,
				$paid_status,
				$buttons
			);
		$i++;} // /foreach
			
		echo json_encode($result);
    }

	public function trasection($id)
    {
        if(!in_array('viewTxn', $this->permission)) {
			redirect('dashboard', 'refresh');
		}
    	
	    $this->data['id'] = $id;
		$this->data['user'] = $this->model_users->getClientData($id);
	    $this->render_template('users/usertxn', $this->data);
    }

    public function fetchUserTxn($id='')
    {
    	$result = array('data' => array());
	    $orders = $this->model_users->getUserTxnbyId($id);
	    $i = 1;
		foreach ($orders as $key=> $value) {

			$count_total_item = $this->model_orders->countOrderItem($value->id);
			// button
			$buttons = '';

			// if(in_array('viewOrder', $this->permission)&&$value->status==0 || $value->status == 1) {
			// 	$buttons .= '<a href="'.base_url('orders/assign_delboy/'.$value->id).'" class="btn btn-default"><i class="fa fa-truck"></i></a>';
			// }

			// if(in_array('updateOrder', $this->permission)) {
			// 	$buttons .= ' <a href="'.base_url('orders/update/'.$value->id).'" class="btn btn-default"><i class="fa fa-eye"></i></a>';
			// }

			if(in_array('deleteOrder', $this->permission)) {
				$buttons .= ' <button type="button" class="btn btn-default" onclick="removeFunc('.$value->id.')" data-toggle="modal" data-target="#removeModal"><i class="fa fa-trash"></i></button>';
			}

			if($value->txn_type == 'DEBIT'||$value->txn_id=='') {
				$txn_status = 'Order Payment, Pay with Wallet';	
			}else if($value->txn_type == 'DEBIT'||$value->txn_id!='') {
				$txn_status = 'Order Payment, Pay with Online Transection';	
			}else if($value->txn_type == 'CREDIT') {
				$txn_status = 'Add money to Wallet';
			}
			if ($value->txn_type == 'CREDIT') {
				$type ="<div class='label label-success'>CREDIT</div>";
			}else{
				$type ="<div class='label label-warning'>DEBIT</div>";
			}
			if ($value->txn_id=='') {
				$txnId = "No any Trasection ID";
			}else{
				$txnId = $value->txn_id; 
			}
			$result['data'][$key] = array(
				$i,
				$value->txn_amount,
				$txnId,
				$type,
				$txn_status,
				$value->date,
				// $buttons
			);
		$i++;} // /foreach
			
		echo json_encode($result);
    }
}