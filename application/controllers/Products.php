<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Products extends Admin_Controller 
{
	public function __construct()
	{
		parent::__construct();

		$this->not_logged_in();

		$this->data['page_title'] = 'Products';

		$this->load->model('model_products');
		$this->load->model('model_brands');
		$this->load->model('model_category');
		$this->load->model('model_stores');
		$this->load->model('model_attributes');
        $this->load->model('Model_units');
        $this->load->model('model_orders');
        $this->data['order_notification_count'] = count($this->model_orders->get_all_orders_notification());
		$this->data['order_topten_notifications'] = $this->model_orders->get_topten_orders_notification();
	}

    /* 
    * It only redirects to the manage product page
    */
	public function index()
	{
        if(!in_array('viewProduct', $this->permission)) {
            redirect('dashboard', 'refresh');
        }
        $this->data['unit'] = $this->Model_units->get_products_unit();
		$this->render_template('products/index', $this->data);	
	}

    /*
    * It Fetches the products data from the product table 
    * this function is called from the datatable ajax function
    */
	public function fetchProductData()
	{
		$result = array('data' => array());

		$data = $this->model_products->getProductData();

		foreach ($data as $key => $value) {
			// button
            $buttons = '';
            // base_url('products/update/'.$value['id'])
            if(in_array('updateProduct', $this->permission)) {
    			$buttons .= '<a href="'.base_url('products/update/'.$value['id']).'" title="Edit" class="btn btn-default"><i class="fa fa-pencil"></i></a>';
            }
            
            if(in_array('updateProduct', $this->permission)) { 
                $buttons .= ' <button type="button" class="btn btn-default" title="Stock" onclick="stockFunc('.$value['id'].')" data-toggle="modal" data-target="#stockModal"><i class="fa fa-hourglass-half"></i></button>';
            }

            if(in_array('updateProduct', $this->permission)) { 
                // $buttons .= ' <button type="button" class="btn btn-default" title="Sales" onclick="salesFunc('.$value['id'].')" data-toggle="modal" data-target="#salesModal"><i class="fa fa-check-square-o"></i></button>';
                $buttons .= '<a href="'.base_url('products/updatesaleunit/'.$value['id']).'" title="Sales Units" class="btn btn-default"><i class="fa fa-check-square-o"></i></a>';
            }

            if(in_array('deleteProduct', $this->permission)) { 
    			$buttons .= ' <button type="button" class="btn btn-default" title="Delete" onclick="removeFunc('.$value['id'].')" data-toggle="modal" data-target="#removeModal"><i class="fa fa-trash"></i></button>';
            }

			$img = '<img src="'.base_url($value['image']).'" alt="'.$value['name'].'" class="img-circle" width="50" height="50" />';

            $availability = ($value['availability'] == 1) ? '<span class="label label-success">Active</span>' : '<span class="label label-warning">Inactive</span>';

            $qty_status = '';
            if($value['qty'] <= 0) {
                $qty_status = '<span class="label label-danger">Out of stock !</span>';
            }else{
                $qty_status = '<span class="label label-success">Stock  Available</span>';
            }

            if((int) $value['unit_id'] === 1 || (int) $value['unit_id'] === 2){
                if((int) $value['qty'] < 1000){
                    $value['qty'] = $value['qty'].'G';
                }else{
                    $value['qty'] = ((int) $value['qty']/1000).'KG';
                }
            }else if((int) $value['unit_id'] === 3 || (int) $value['unit_id'] === 4){
                if((int) $value['qty'] < 1000){
                    $value['qty'] = $value['qty'].'ML';
                }else{
                    $value['qty'] = ((int) $value['qty']/1000).'L';
                }
            }else{
                $value['qty'] = $value['qty'].'Piece';
            }

			$result['data'][$key] = array(
				$img,
				// $value['sku'],
				$value['name'],
				// $value['sellprice'],
                $value['qty'],
                $qty_status,
				$availability,
				$buttons
			);
		} // /foreach

		echo json_encode($result);
	}	

    /*
    * If the validation is not valid, then it redirects to the create page.
    * If the validation for each input field is valid then it inserts the data into the database 
    * and it stores the operation message into the session flashdata and display on the manage product page
    */
	public function create()
	{
		if(!in_array('createProduct', $this->permission)) {
            redirect('dashboard', 'refresh');
        }

		$this->form_validation->set_rules('product_name', 'Product name', 'trim|required');
		$this->form_validation->set_rules('sku', 'Products name Hindi', 'trim|required');
        $this->form_validation->set_rules('sarchKey', 'Search Key', 'trim|required');
        $this->form_validation->set_rules('quantity', 'Quantity', 'trim|required');
        $this->form_validation->set_rules('unit_id', 'Unit', 'required');
		$this->form_validation->set_rules('availability', 'Availability', 'trim|required');
		
	
        if ($this->form_validation->run() == TRUE) {
            // true case
            $upload_image = $this->upload_image();
            $unit_id = (int) $this->input->post('unit_id');
            $quantity = (int) $this->input->post('quantity');

            if($unit_id == '1'){
                $quantity = $quantity*1000;
            }else if($unit_id == '3'){
                $quantity = $quantity*1000;
            }else if($unit_id == '6'){
                $quantity = $quantity*12;
            }else{
                $quantity = $quantity;
            }
            
        	$data = array(
        		'name' => $this->input->post('product_name'),
        		'sku' => $this->input->post('sku'),
        		'sarch_key' => $this->input->post('sarchKey'),
        		'image' => $upload_image,
                'qty' => $quantity,
                'unit_id' => $unit_id,
        		'description' => $this->input->post('description'),
        		'attribute_value_id' => json_encode($this->input->post('attributes_value_id')),
        		'category_id' => $this->input->post('category'),
        		'availability' => $this->input->post('availability'),
        	);

            $product_id = $this->model_products->create($data);

            $transaction_history = array(
                'product_id' => (int) $product_id,
                'unit_id' => $unit_id,
                'quantity' => $quantity,
                'purchase_price' => (double) $this->input->post('purchase_price'),
        		'transaction_type' => 'PURCHASE'
            );

            $result = $this->model_products->create_product_transaction_history($transaction_history);

        	if($result == true) {
        		$this->session->set_flashdata('success', 'Successfully created');
        		redirect('products/', 'refresh');
        	}
        	else {
        		$this->session->set_flashdata('errors', 'Error occurred!!');
        		redirect('products/create', 'refresh');
        	}
        }
        else {
            // false case

        	// attributes 
        	$attribute_data = $this->model_attributes->getActiveAttributeData();

        	$attributes_final_data = array();
        	foreach ($attribute_data as $k => $v) {
        		$attributes_final_data[$k]['attribute_data'] = $v;

        		$value = $this->model_attributes->getAttributeValueData($v['id']);

        		$attributes_final_data[$k]['attribute_value'] = $value;
        	}

        	$this->data['attributes'] = $attributes_final_data;
			$this->data['brands'] = $this->model_brands->getActiveBrands();        	
			$this->data['category'] = $this->model_category->getActiveCategroy();        	
			$this->data['stores'] = $this->model_stores->getActiveStore();
            $this->data['unit'] = $this->Model_units->get_products_unit();   

            $this->render_template('products/create', $this->data);
        }	
	}

    /*
    * This function is invoked from another function to upload the image into the assets folder
    * and returns the image path
    */
	public function upload_image()
    {
    	// assets/images/product_image
        $config['upload_path'] = 'assets/images/product_image';
        $config['file_name'] =  uniqid();
        $config['allowed_types'] = 'gif|jpg|png';
        $config['max_size'] = '1000';

        // $config['max_width']  = '1024';s
        // $config['max_height']  = '768';

        $this->load->library('upload', $config);
        if ( ! $this->upload->do_upload('product_image'))
        {
            $error = $this->upload->display_errors();
            return $error;
        }
        else
        {
            $data = array('upload_data' => $this->upload->data());
            $type = explode('.', $_FILES['product_image']['name']);
            $type = $type[count($type) - 1];
            
            $path = $config['upload_path'].'/'.$config['file_name'].'.'.$type;
            return ($data == true) ? $path : false;            
        }
    }

    /*
    * If the validation is not valid, then it redirects to the edit product page 
    * If the validation is successfully then it updates the data into the database 
    * and it stores the operation message into the session flashdata and display on the manage product page
    */
	public function update($product_id)
    { 
        if(!in_array('updateProduct', $this->permission)) {
            redirect('dashboard', 'refresh');
        }

        if(!$product_id) {
            redirect('dashboard', 'refresh');
        }
        
        $this->form_validation->set_rules('product_name', 'Product name', 'trim|required');
		$this->form_validation->set_rules('sku', 'Products name Hindi', 'trim|required');
        $this->form_validation->set_rules('sarchKey', 'Search Key', 'trim|required');
        $this->form_validation->set_rules('quantity', 'Quantity', 'trim|required');
        $this->form_validation->set_rules('unit_id', 'Unit', 'required');
		$this->form_validation->set_rules('availability', 'Availability', 'trim|required');

        if ($this->form_validation->run() == TRUE) {
            // true case

            $unit_id = (int) $this->input->post('unit_id');
            $quantity = (int) $this->input->post('quantity');

            if($unit_id == '1'){
                $quantity = $quantity*1000;
            }else if($unit_id == '3'){
                $quantity = $quantity*1000;
            }else if($unit_id == '6'){
                $quantity = $quantity*12;
            }else{
                $quantity = $quantity;
            }
            
        	$data = array(
        		'name' => $this->input->post('product_name'),
        		'sku' => $this->input->post('sku'),
        		'sarch_key' => $this->input->post('sarchKey'),
        		'image' => $upload_image,
                'qty' => $quantity,
                'unit_id' => $unit_id,
        		'description' => $this->input->post('description'),
        		'attribute_value_id' => json_encode($this->input->post('attributes_value_id')),
        		'category_id' => $this->input->post('category'),
        		'availability' => $this->input->post('availability'),
        	);

            
            if($_FILES['product_image']['size'] > 0) {
                $upload_image = $this->upload_image();
                $upload_image = array('image' => $upload_image);
                
                $this->model_products->update($upload_image, $product_id);
            }

            $update = $this->model_products->update($data, $product_id);

            $transaction_history = array(
                'product_id' => (int) $product_id,
                'unit_id' => $unit_id,
                'quantity' => $quantity,
                'purchase_price' => (double) $this->input->post('purchase_price'),
        		'transaction_type' => 'PURCHASE'
            );

            $result = $this->model_products->create_product_transaction_history($transaction_history);

            if($result == true) 
            {
                $this->session->set_flashdata('success', 'Successfully updated');
                redirect('products/', 'refresh');
            }
            else {
                $this->session->set_flashdata('errors', 'Error occurred!!');
                redirect('products/update/'.$product_id, 'refresh');
            }
        }
        else {
            // attributes 
            $attribute_data = $this->model_attributes->getActiveAttributeData();

            $attributes_final_data = array();
            foreach ($attribute_data as $k => $v) {
                $attributes_final_data[$k]['attribute_data'] = $v;

                $value = $this->model_attributes->getAttributeValueData($v['id']);

                $attributes_final_data[$k]['attribute_value'] = $value;
            }
            
            // false case
            $this->data['attributes'] = $attributes_final_data;
            $this->data['brands'] = $this->model_brands->getActiveBrands();         
            $this->data['category'] = $this->model_category->getActiveCategroy();
            $this->data['unit'] = $this->Model_units->get_products_unit(); 
            $this->data['unitsget'] = $this->Model_units->get_product_units_define($product_id);

            $product_data = $this->model_products->getProductData($product_id);

            if((int) $product_data['unit_id'] === 1 || (int) $product_data['unit_id'] === 2){
                if((int) $product_data['qty'] < 1000){
                    $product_data['qty'] = $product_data['qty'].'G';
                }else{
                    $product_data['qty'] = ((int) $product_data['qty']/1000).'KG';
                }
            }else if((int) $product_data['unit_id'] === 3 || (int) $product_data['unit_id'] === 4){
                if((int) $product_data['qty'] < 1000){
                    $product_data['qty'] = $product_data['qty'].'ML';
                }else{
                    $product_data['qty'] = ((int) $product_data['qty']/1000).'L';
                }
            }else{
                $product_data['qty'] = $product_data['qty'].'Piece';
            }

            $this->data['product_data'] = $product_data;
            $this->render_template('products/edit', $this->data); 
        }   
    }

    /*
    * It removes the data from the database
    * and it returns the response into the json format
    */
	public function remove()
	{
        if(!in_array('deleteProduct', $this->permission)) {
            redirect('dashboard', 'refresh');
        }
        
        $product_id = $this->input->post('product_id');

        $response = array();
        if($product_id) {
            $delete = $this->model_products->remove($product_id);
            if($delete == true) {
                $response['success'] = true;
                $response['messages'] = "Successfully removed"; 
            }
            else {
                $response['success'] = false;
                $response['messages'] = "Error in the database while removing the product information";
            }
        }
        else {
            $response['success'] = false;
            $response['messages'] = "Refersh the page again!!";
        }

        echo json_encode($response);
	}

    public function deleteUnit()
    {
        $id = $this->input->get('id');
        if($id)
        {
            $result = $this->model_products->deleteunit($id);
            if($result)
            {
                $array = array('status'=>true,'massage'=>'Successfully removed');
            }else{
                 $array = array('status'=>false,'massage'=> "Error in the database while removing the product information");
            }
            echo json_encode($array);
        }
    }


    public function deletesaleunit()
    {
        $id = $this->input->post('id');
        if($id)
        {
            $result = $this->Model_units->deletesaleunit($id);
            if($result)
            {
                $array = array('status'=>true,'massage'=>'Successfully removed');
            }else{
                 $array = array('status'=>false,'massage'=> "Error in the database while removing the product information");
            }
            echo json_encode($array);
        }
    }


    public function product_detail($id)
    {
        if($id)
        {
            $sale_units_lists = NULL;

            $result['prod'] = $this->model_products->getProductData($id);

            $prod_unit_id = (int) $result['prod']['unit_id'];
            $sale_units = $this->Model_units->get_all_products_unit();
            foreach($sale_units as $sale_unit){
                if($prod_unit_id === 1 || $prod_unit_id === 2){
                    if((int) $sale_unit->id === 1 || (int) $sale_unit->id === 2){
                        $sale_units_lists[] = $sale_unit;
                    }
                }else if($prod_unit_id === 3 || $prod_unit_id === 4){
                    if((int) $sale_unit->id === 3 || (int) $sale_unit->id === 4){
                        $sale_units_lists[] = $sale_unit;
                    }
                }else if($prod_unit_id === 5 || $prod_unit_id === 6){
                    if((int) $sale_unit->id === 5 || (int) $sale_unit->id === 6){
                        $sale_units_lists[] = $sale_unit;
                    }
                }
            }
            $result['saleunits'] = $this->Model_units->get_product_units_define($id);
            $result['units'] = $sale_units_lists;

            return $result;
        }
    }
    
    
    public function product_detail_by_id(){
        $id = $this->input->get('product_id');
        if($id){
            $result['prod']  = $this->model_products->getProductData($id);
            $result['units'] = $this->Model_units->get_products_unit();
            echo json_encode($result);
        }
    }

    public function addstock(){

        $product_id = (int) $this->input->post('id');
        $product = $this->model_products->getProductData($product_id);
        $qty = (int) $product['qty'];

        $unit_id = (int) $this->input->post('units');
        $quantity = (int) $this->input->post('quantity');

        if($unit_id == '1'){
            $quantity = $quantity*1000;
        }else if($unit_id == '3'){
            $quantity = $quantity*1000;
        }else if($unit_id == '6'){
            $quantity = $quantity*12;
        }else{
            $quantity = $quantity;
        }

        $transaction_history = array(
            'product_id' => $product_id,
            'unit_id' => $unit_id,
            'quantity' => $quantity,
            'purchase_price' => (double) $this->input->post('purchase_price'),
            'transaction_type' => 'PURCHASE'
        );

        $result = $this->model_products->create_product_transaction_history($transaction_history);

        $new_qty = $qty + (int) $quantity;
        $product_data = array(
            'qty' => $new_qty,
        );

        $update = $this->model_products->update($product_data, $product_id);

        if($update == true) {
            $this->session->set_flashdata('success', 'Stock Updated Successfully');
            redirect('products', 'refresh');
        }
        else {
            $this->session->set_flashdata('errors', 'Error occurred!!');
            redirect('products', 'refresh');
        }
    }

    public function productsaleunits(){
        $product_id = (int) $this->input->post('p_id');
        $units = $this->input->post('units');
        $quantity = $this->input->post('quantity');
        $sales_price = $this->input->post('sales_price');
        $MRP_price = $this->input->post('MRP_price');
        $id = NULL;
        $update = false;
        $create = false;

        for($i=0;$i< sizeof($units); $i++){
            if(!empty($quantity[$i]) && !empty($quantity[$i])){

                $data_check = array(
                    'id_products' =>(int) $product_id,
                    'unit_id' =>(int) $units[$i],
                    'quantity' =>(int) $quantity[$i],
                );
                $check = $this->model_products->check_product_sale_unit_price($data_check);

                $data_update = array(
                    'sellprice' => $sales_price[$i],
                    'mrpprice' => $MRP_price[$i],
                    'status' => 1
                );

                if(sizeof($check) > 0){
                    $id = $check[0]['id'];
                    $update = $this->model_products->update_product_sale_unit_price($data_update, $id);
                }
                else{
                    $data = array(
                        'id_products' => $product_id,
                        'unit_id' => $units[$i],
                        'quantity' => $quantity[$i],
                        'sellprice' => $sales_price[$i],
                        'mrpprice' => $MRP_price[$i],
                        'status' => 1
                    );
                    $create = $this->model_products->create_product_sale_unit_price($data);
                }
                
            }
        }
        if($create == true || $update == true) {
            $this->session->set_flashdata('success', 'Sale Units Created/Updated Successfully');
            redirect("products/updatesaleunit/$product_id", 'refresh');
        }
        else {
            $this->session->set_flashdata('errors', 'Error occurred!!');
            redirect("products/updatesaleunit/$product_id", 'refresh');
        }
    }


    /*
    * If the validation is not valid, then it redirects to the edit product page 
    * If the validation is successfully then it updates the data into the database 
    * and it stores the operation message into the session flashdata and display on the manage product page
    */
	public function updatesaleunit($product_id)
    { 
        if(!in_array('updateProduct', $this->permission)) {
            redirect('dashboard', 'refresh');
        }

        if(!$product_id) {
            redirect('dashboard', 'refresh');
        }
        
            $products =  $this->product_detail($product_id);        
            $this->data['product_data'] = $products['prod'];
            $this->data['saleunits'] = $products['saleunits'];
            $this->data['units'] = $products['units'];
            $this->render_template('products/editsaleunit', $this->data); 
        
    }


}