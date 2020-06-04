<?php 

class Serviceareas extends Admin_Controller 
{
	public function __construct()
	{
		parent::__construct();

		$this->not_logged_in();
		
		$this->data['page_title'] = 'Service Areas';
	
		$this->load->model('model_users');
		$this->load->model('model_groups');
		$this->load->model('Model_serviceareas');
		$this->load->model('model_orders');
		$this->data['order_notification_count'] = count($this->model_orders->get_all_orders_notification());
		$this->data['order_topten_notifications'] = $this->model_orders->get_topten_orders_notification();
	}

	
	public function index()
	{
		if(!in_array('viewAdmin', $this->permission)) {
			redirect('dashboard', 'refresh');
		}

		$result = $this->Model_serviceareas->getServiceAreaData();

		$this->data['service_area_data'] = $result;

		$this->render_template('serviceareas/index', $this->data);
	}

	public function create()
	{
		if(!in_array('createAdmin', $this->permission)) {
			redirect('dashboard', 'refresh');
		}

		$this->form_validation->set_rules('area', 'Area', 'required|min_length[5]|max_length[25]');
		$this->form_validation->set_rules('pincode', 'Pincode', 'required|min_length[6]|max_length[12]');

        if ($this->form_validation->run() == TRUE) {
			// true case
			
        	$data = array(
        		'area' => $this->input->post('area'),
        		'pincode' => $this->input->post('pincode'),
        		'status' => 1
        	);

        	$create = $this->Model_serviceareas->create($data);

        	if($create == true) {
        		$this->session->set_flashdata('success', 'Successfully created');
        		redirect('serviceareas/', 'refresh');
        	}
        	else {
        		$this->session->set_flashdata('errors', 'Error occurred!!');
        		redirect('serviceareas/create', 'refresh');
        	}
        }
        else {
			$result = $this->Model_serviceareas->getServiceAreaData();

			$this->data['service_area_data'] = $result;

			$this->render_template('serviceareas/create', $this->data);
        }	

		
	}

	public function edit($id = null)
	{
		if(!in_array('updateAdmin', $this->permission)) {
			redirect('dashboard', 'refresh');
		}

		if($id) {
			$this->form_validation->set_rules('area', 'Area', 'required|min_length[5]|max_length[25]');
			$this->form_validation->set_rules('pincode', 'Pincode', 'required|min_length[6]|max_length[12]');
			$this->form_validation->set_rules('status', 'Status', 'required');


			if ($this->form_validation->run() == TRUE) {
	            // true case
		        	$data = array(
		        		'area' => $this->input->post('area'),
		        		'pincode' => $this->input->post('pincode'),
		        		'status' => (int) $this->input->post('status')
		        	);

		        	$update = $this->Model_serviceareas->edit($data, $id);
		        	if($update == true) {
		        		$this->session->set_flashdata('success', 'Successfully created');
		        		redirect('serviceareas', 'refresh');
		        	}
		        	else {
		        		$this->session->set_flashdata('errors', 'Error occurred!!');
		        		redirect('serviceareas/edit/'.$id, 'refresh');
		        	}
	        }
	        else {
	            // false case
				$this->data['service_area_data'] = $this->Model_serviceareas->getServiceAreaDataById($id);
				$this->render_template('serviceareas/edit', $this->data);	
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
					$delete = $this->Model_serviceareas->delete($id);
					if($delete == true) {
		        		$this->session->set_flashdata('success', 'Successfully removed');
		        		redirect('serviceareas', 'refresh');
		        	}
		        	else {
		        		$this->session->set_flashdata('error', 'Error occurred!!');
		        		redirect('serviceareas/delete/'.$id, 'refresh');
		        	}

			}	
			else {
				$this->data['id'] = $id;
				$this->render_template('serviceareas/delete', $this->data);
			}	
		}
	}

}