<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Stores extends Admin_Controller 
{
	public function __construct()
	{
		parent::__construct();

		$this->not_logged_in();

		$this->data['page_title'] = 'Stock';

		$this->load->model('model_stores');
		$this->load->model('Model_products');
		$this->load->model('model_orders');
		$this->data['order_notification_count'] = count($this->model_orders->get_all_orders_notification());
		$this->data['order_topten_notifications'] = $this->model_orders->get_topten_orders_notification();
	}

	/* 
    * It only redirects to the manage stores page
    */
	public function index()
	{
		if(!in_array('viewStore', $this->permission)) {
			redirect('dashboard', 'refresh');
		}
		$this->data['product'] = $this->model_stores->get_products();
		$this->data['units'] = $this->model_stores->getallunits();
		$this->render_template('stores/index', $this->data);	
	}

	/*
	* It retrieve the specific store information via a store id
	* and returns the data in json format.
	*/
	public function fetchStoresDataById($id) 
	{
		if($id) {
			$data = $this->model_stores->getStoresData($id);
			echo json_encode($data);
		}
	}

	/*
	* It retrieves all the store data from the database 
	* This function is called from the datatable ajax function
	* The data is return based on the json format.
	*/
	public function fetchStoresData()
	{
		$result = array('data' => array());

		$data = $this->model_stores->getStoresData();
		$i=1;
		foreach ($data as $key => $value) {
			$proname = $this->Model_products->getProductData($value['name']);
			$unit = $this->model_stores->getUnitData($value['unit']);
			$result['data'][$key] = array(
				$i,
				$proname['name'],
				$unit->unit,
				$value['qty'],
				$value['price'],
				$value['date']
			);
		$i++; } // /foreach

		echo json_encode($result);
	}

	/*
    * If the validation is not valid, then it provides the validation error on the json format
    * If the validation for each input is valid then it inserts the data into the database and 
    returns the appropriate message in the json format.
    */
	public function create()
	{
		if(!in_array('createStore', $this->permission)) {
			redirect('dashboard', 'refresh');
		}

		$this->form_validation->set_rules('store_name', 'Product name', 'trim|required');
		$this->form_validation->set_rules('unit', 'Unit', 'trim|required');
		$this->form_validation->set_rules('quantity', 'Quantity', 'trim|required|numeric');
		$this->form_validation->set_rules('proPrice', 'Price', 'trim|required|numeric');

		$this->form_validation->set_error_delimiters('<p class="text-danger">','</p>');

        if ($this->form_validation->run() == TRUE) {
        	date_default_timezone_set("Asia/Kolkata");
        	$date = date('Y-m-d h:i:s');
        	$data = array(
        		'name' => $this->input->post('store_name'),
        		'unit' => $this->input->post('unit'),
        		'qty' => $this->input->post('quantity'),
        		'price' => $this->input->post('proPrice'),	
        		'date'=>$date
        	);

        	$create = $this->model_stores->create($data);
        	$prod = $this->input->post('store_name');
        	$proqty = array('qty'=>$this->input->post('quantity'));
        	$this->Model_products->update($proqty,$prod);
        	if($create == true) {
        		$response = array('success' =>true ,'messages'=>'Succesfully created' );
        	}
        	else {
        		$response = array('success' =>false ,'messages'=>'Error in the database while creating the brand information' );		
        	}
        }
        else {
        	$response = array();
        	$response['success'] = false;
        	foreach ($_POST as $key => $value) {
        		$response['messages'][$key] = form_error($key);
        	}
        }

        echo json_encode($response);
	}	

	/*
    * If the validation is not valid, then it provides the validation error on the json format
    * If the validation for each input is valid then it updates the data into the database and 
    returns a n appropriate message in the json format.
    */
	public function update($id)
	{
		if(!in_array('updateStore', $this->permission)) {
			redirect('dashboard', 'refresh');
		}

		$response = array();

		if($id) {
			$this->form_validation->set_rules('edit_store_name', 'Store name', 'trim|required');
			$this->form_validation->set_rules('edit_active', 'Active', 'trim|required');

			$this->form_validation->set_error_delimiters('<p class="text-danger">','</p>');

	        if ($this->form_validation->run() == TRUE) {
	        	$data = array(
	        		'name' => $this->input->post('edit_store_name'),
	        		'active' => $this->input->post('edit_active'),	
	        	);

	        	$update = $this->model_stores->update($data, $id);
	        	if($update == true) {
	        		$response['success'] = true;
	        		$response['messages'] = 'Succesfully updated';
	        	}
	        	else {
	        		$response['success'] = false;
	        		$response['messages'] = 'Error in the database while updated the brand information';			
	        	}
	        }
	        else {
	        	$response['success'] = false;
	        	foreach ($_POST as $key => $value) {
	        		$response['messages'][$key] = form_error($key);
	        	}
	        }
		}
		else {
			$response['success'] = false;
    		$response['messages'] = 'Error please refresh the page again!!';
		}

		echo json_encode($response);
	}

	/*
	* If checks if the store id is provided on the function, if not then an appropriate message 
	is return on the json format
    * If the validation is valid then it removes the data into the database and returns an appropriate 
    message in the json format.
    */
	public function remove()
	{
		if(!in_array('deleteStore', $this->permission)) {
			redirect('dashboard', 'refresh');
		}
		
		$store_id = $this->input->post('store_id');

		$response = array();
		if($store_id) {
			$delete = $this->model_stores->remove($store_id);
			if($delete == true) {
				$response['success'] = true;
				$response['messages'] = "Successfully removed";	
			}
			else {
				$response['success'] = false;
				$response['messages'] = "Error in the database while removing the brand information";
			}
		}
		else {
			$response['success'] = false;
			$response['messages'] = "Refersh the page again!!";
		}

		echo json_encode($response);
	}

	public function getProductunits()
	{
		$proId = $this->input->get('pid');
		$units = $this->model_stores->getProductsunit($proId);
		foreach ($units as $key => $value) {
			$result = $this->model_stores->getUnitbyid($value->unit_id);
			$data[] = "<option value='".$result->id."'>".$result->unit."</option>";
		}
		echo json_encode($data);
	}

}