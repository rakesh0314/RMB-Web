<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Orders extends Admin_Controller 
{
	public function __construct()
	{
		parent::__construct();

		$this->not_logged_in();

		$this->data['page_title'] = 'Orders';

		$this->load->model('model_orders');
		$this->load->model('model_products');
		$this->load->model('model_company');
		$this->load->model('model_users');
		$this->data['order_notification_count'] = count($this->model_orders->get_all_orders_notification());
		$this->data['order_topten_notifications'] = $this->model_orders->get_topten_orders_notification();
	}

	/* 
	* It only redirects to the manage order page
	*/
	public function index()
	{
		if(!in_array('viewOrder', $this->permission)) {
            redirect('dashboard', 'refresh');
        }

		$this->data['page_title'] = 'Manage Orders';
		$this->render_template('orders/index', $this->data);		
	}


	public function send_sms($num,$msg)
	{
	    $user = "20093649";
	    $password = "kxpd6k";
        $apisender = "SAB-JI";
        $msg = urlencode($msg);
        $url = 'http://bulksmsindia.mobi/sendurlcomma.aspx?user='.$user.'&pwd='.$password.'&senderid='.$apisender.'&mobileno='.$num.'&msgtext='.$msg.'&smstype=13';
        $ch = curl_init($url);
            curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
            $result = curl_exec($ch);
            curl_close($ch);
        $array = array('status'=>'true','responce'=>$result);
        return $array;
	}

	/*
	* Fetches the orders data from the orders table 
	* this function is called from the datatable ajax function
	*/
	public function fetchOrdersData($status)
	{
		$result = array('data' => array());

		$data = $this->model_orders->getOrders($status);
        $i = 0;
		foreach ($data as $key => $value) {

			$count_total_item = $this->model_orders->countOrderItem($value['id']);
// 			$date = date('Y-m-d',$value['date_time']);
// 			$time = date('h:i a', $value['date_time']);
			$cust = $this->model_users->getClientData($value['user_id']);
			$address = $this->model_users->address($value['customer_address']);

// 			$date_time = $date . ' ' . $time;
            if($cust)
            {
                $name = $cust->clt_name;
                $contact = $cust->clt_conno;
            }
			// button
			$buttons = ''; 
			if($value['delboy']==null || $value['delboy']=='' || $value['delboy']==' '){
				if(in_array('viewOrder', $this->permission)&&$value['status']==0 || $value['status'] == 1) {
					$buttons .= '<a title="Assign Delivery Boy" href="'.base_url('orders/assign_delboy/'.$value['id']).'" class="btn btn-danger"><i class="fa fa-truck"></i></a>';
				}
			}else{
				if(in_array('viewOrder', $this->permission)&&$value['status']==0 || $value['status'] == 1) {
					$buttons .= '<a title="Assign Delivery Boy" href="'.base_url('orders/assign_delboy/'.$value['id']).'" class="btn btn-success"><i class="fa fa-truck"></i></a>';
				}
			}
			// if(in_array('viewOrder', $this->permission)&&$value['status']==0 || $value['status'] == 1) {
			// 	$buttons .= '<a href="'.base_url('orders/assign_delboy/'.$value['id']).'" class="btn btn-default"><i class="fa fa-truck"></i></a>';
			// }

			if(in_array('updateOrder', $this->permission)) {
				$buttons .= ' <a title="Edit Order" href="'.base_url('orders/update/'.$value['id']).'" class="btn btn-default"><i class="fa fa-pencil"></i></a>';
			}

			if(in_array('deleteOrder', $this->permission)&&$value['status']<2) {
				$buttons .= ' <button title="Delete Order" type="button" class="btn btn-default" onclick="removeFunc('.$value['id'].')" data-toggle="modal" data-target="#removeModal"><i class="fa fa-trash"></i></button>';
			}

			if($value['status'] == 1) {
				$paid_status = '<span class="label label-success">Processing</span>';	
			}else if($value['status'] == 2) {
				$paid_status = '<span class="label label-success">Done</span>';	
			}else if($value['status'] == 3) {
				$paid_status = '<span class="label label-warning">Cancel</span>';	
			}else if($value['status'] == 4) {
				$paid_status = '<span class="label label-danger">Order not confirm</span>';	
			}else {
				$paid_status = '<span class="label label-warning">Pending</span> <a title="Approve the Order" onclick="OrderAceptFunc('.$value['id'].')" class="btn btn-success" ><i class="fa fa-reply" aria-hidden="true"></i> </a>';
			}
			$order_id = "Sabji-".$value['id'];
            // print_r($cust);
			$result['data'][$key] = array(
				$order_id,
				$name,
				$contact,
				$value['date_time'],
				$count_total_item,
				$value['net_amount'],
				$paid_status,
				$buttons
			);
		$i++;} // /foreach

		echo json_encode($result);
	}

	/*
	* If the validation is not valid, then it redirects to the create page.
	* If the validation for each input field is valid then it inserts the data into the database 
	* and it stores the operation message into the session flashdata and display on the manage group page
	*/
	public function create()
	{
		if(!in_array('createOrder', $this->permission)) {
            redirect('dashboard', 'refresh');
        }

		$this->data['page_title'] = 'Add Order';

		$this->form_validation->set_rules('product[]', 'Product name', 'trim|required');
		
	
        if ($this->form_validation->run() == TRUE) {        	
        	
        	$order_id = $this->model_orders->create();
        	
        	if($order_id) {
        		$this->session->set_flashdata('success', 'Successfully created');
        		redirect('orders/update/'.$order_id, 'refresh');
        	}
        	else {
        		$this->session->set_flashdata('errors', 'Error occurred!!');
        		redirect('orders/create/', 'refresh');
        	}
        }
        else {
            // false case
        	$company = $this->model_company->getCompanyData(1);
        	$this->data['company_data'] = $company;
        	$this->data['is_vat_enabled'] = ($company['vat_charge_value'] > 0) ? true : false;
        	$this->data['is_service_enabled'] = ($company['service_charge_value'] > 0) ? true : false;

        	$this->data['products'] = $this->model_products->getActiveProductData();      	

            $this->render_template('orders/create', $this->data);
        }	
	}

	/*
	* It gets the product id passed from the ajax method.
	* It checks retrieves the particular product data from the product id 
	* and return the data into the json format.
	*/
	public function getProductValueById()
	{
		$product_id = $this->input->post('product_id');
		if($product_id) {
			$product_data = $this->model_products->getProductData($product_id);
			echo json_encode($product_data);
		}
	}

	/*
	* It gets the all the active product inforamtion from the product table 
	* This function is used in the order page, for the product selection in the table
	* The response is return on the json format.
	*/
	public function getTableProductRow()
	{
		$products = $this->model_products->getActiveProductData();
		echo json_encode($products);
	}

	/*
	* If the validation is not valid, then it redirects to the edit orders page 
	* If the validation is successfully then it updates the data into the database 
	* and it stores the operation message into the session flashdata and display on the manage group page
	*/
	public function update($id)
	{
		if(!in_array('updateOrder', $this->permission)) {
            redirect('dashboard', 'refresh');
        }

		if(!$id) {
			redirect('dashboard', 'refresh');
		}

		$this->data['page_title'] = 'Update Order';

		$this->form_validation->set_rules('product[]', 'Product name', 'trim|required');
		
	
        if ($this->form_validation->run() == TRUE) {        	
        	
        	$update = $this->model_orders->update($id);
        	
        	if($update == true) {
        		$this->session->set_flashdata('success', 'Successfully updated');
        		redirect('orders/update/'.$id, 'refresh');
        	}
        	else {
        		$this->session->set_flashdata('errors', 'Error occurred!!');
        		redirect('orders/update/'.$id, 'refresh');
        	}
        }
        else {
            // false case
        	$company = $this->model_company->getCompanyData(1);
        	$this->data['company_data'] = $company;
        	$this->data['is_vat_enabled'] = ($company['vat_charge_value'] > 0) ? true : false;
        	$this->data['is_service_enabled'] = ($company['service_charge_value'] > 0) ? true : false;

        	$result = array();
        	$orders_data = $this->model_orders->getOrdersData($id);
			$cust = $this->model_users->getClientData($orders_data['user_id']);
			$this->data['adderss_data'] = $this->model_users->address($orders_data['customer_address']);
            $result['user'] = $cust;
    		$result['order'] = $orders_data;
			$orders_item = $this->model_orders->getOrdersItemData($orders_data['id']);
			$index = 0;
			foreach($orders_item as $o_item){
				$unit = $this->model_products->getunitbyid($o_item['unit_id']);
				$orders_item[$index]['unit'] = $unit->unit;
				$index++;
			}

			if($orders_data['delboy']=="")
    		{
    		   $this->data['del_boy'] = $this->model_users->getActiveDelboys();
    		}else{
    		    $this->data['del_boy'] = $this->model_users->empdata($orders_data['delboy']);
    		}
            // $this->data['del_boy'] = $this->model_users->getActiveDelboys();
    		foreach($orders_item as $k => $v) {
    			$result['order_item'][] = $v;
    		}

    		$this->data['order_data'] = $result;

        	$this->data['products'] = $this->model_products->getActiveProductData();      	

            $this->render_template('orders/edit', $this->data);
        }
	}
	
	public function assign_delboy($id)
	{
	    if(!in_array('updateOrder', $this->permission)) {
            redirect('dashboard', 'refresh');
        }

		if(!$id) {
			redirect('dashboard', 'refresh');
		}

		$this->data['page_title'] = 'Update Order';
		
	
        if ($this->input->get('delboy')) {        	
        	
        	$update = $this->model_orders->updateorder(array('delboy'=>$this->input->get('delboy')),$id);
        	
        	if($update == true) {
        		echo "1";
        	}
        	else {
        		echo "0";
        	}
        }
        else {
            // false case
        	$company = $this->model_company->getCompanyData(1);
        	$this->data['company_data'] = $company;
        	$this->data['is_vat_enabled'] = ($company['vat_charge_value'] > 0) ? true : false;
        	$this->data['is_service_enabled'] = ($company['service_charge_value'] > 0) ? true : false;

        	$result = array();
        	$orders_data = $this->model_orders->getOrdersData($id);
			$cust = $this->model_users->getClientData($orders_data['user_id']);
			$this->data['adderss_data'] = $this->model_users->address($orders_data['customer_address']);
            $result['user'] = $cust;
    		$result['order'] = $orders_data;
			$orders_item = $this->model_orders->getOrdersItemData($orders_data['id']);
			$index = 0;
			foreach($orders_item as $o_item){
				$unit = $this->model_products->getunitbyid($o_item['unit_id']);
				$orders_item[$index]['unit'] = $unit->unit;
				$index++;
			}
			
    		if($orders_data['delboy']=="")
    		{
    		   $this->data['del_boy'] = $this->model_users->getActiveDelboys();
    		}else{
    		    $this->data['del_boy'] = $this->model_users->empdata($orders_data['delboy']);
    		}
    		foreach($orders_item as $k => $v) {
    			$result['order_item'][] = $v;
    		}

    		$this->data['order_data'] = $result;

        	$this->data['products'] = $this->model_products->getActiveProductData();      	

            $this->render_template('orders/edit', $this->data);
        }
	}

	/*
	* It removes the data from the database
	* and it returns the response into the json format
	*/
	public function remove()
	{
		if(!in_array('deleteOrder', $this->permission)) {
            redirect('dashboard', 'refresh');
        }

		$order_id = $this->input->post('order_id');
        $response = array();
        if($order_id) {
			$order = $this->model_orders->getOrdersData($order_id);
			$user_id = $order['user_id'];
			$user_data = $this->model_users->getClientData($user_id);
			$contactno = $user_data->clt_conno;

			$delete = $this->model_orders->remove($order_id);
			
            if($delete == true) {
                $response['success'] = true;
				$response['messages'] = "Successfully removed";
				$msg ="This Order is cancelled by Sabji Web/App Due to some issues, sorry for the inconvenience";
				$this->send_sms($contactno,$msg);
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

	public function ORderSatus(){

			$update = $this->model_orders->UpdateOrderSts($this->input->get('order_id'));
        	echo $update;
	}
	public function readed_order(){

		$order_id = $this->input->post('order_id');
		if($order_id) {
			$result = $this->model_orders->change_notification_status($order_id);
			echo $result;
		}
	}
	public function readed_orders(){
			$result = $this->model_orders->change_all_notification_status();
			echo $result;
	}

	/*
	* It gets the product id and fetch the order data. 
	* The order print logic is done here 
	*/
	public function printDiv($id)
	{
		if(!in_array('viewOrder', $this->permission)) {
            redirect('dashboard', 'refresh');
        }
        
		if($id) {
			$order_data = $this->model_orders->getOrdersData($id);
			$orders_items = $this->model_orders->getOrdersItemData($id);
			$company_info = $this->model_company->getCompanyData(1);

			$order_date = date('d/m/Y', $order_data['date_time']);
			$paid_status = ($order_data['paid_status'] == 1) ? "Paid" : "Unpaid";

			$html = '<!-- Main content -->
			<!DOCTYPE html>
			<html>
			<head>
			  <meta charset="utf-8">
			  <meta http-equiv="X-UA-Compatible" content="IE=edge">
			  <title>AdminLTE 2 | Invoice</title>
			  <!-- Tell the browser to be responsive to screen width -->
			  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
			  <!-- Bootstrap 3.3.7 -->
			  <link rel="stylesheet" href="'.base_url('assets/bower_components/bootstrap/dist/css/bootstrap.min.css').'">
			  <!-- Font Awesome -->
			  <link rel="stylesheet" href="'.base_url('assets/bower_components/font-awesome/css/font-awesome.min.css').'">
			  <link rel="stylesheet" href="'.base_url('assets/dist/css/AdminLTE.min.css').'">
			</head>
			<body onload="window.print();">
			
			<div class="wrapper">
			  <section class="invoice">
			    <!-- title row -->
			    <div class="row">
			      <div class="col-xs-12">
			        <h2 class="page-header">
			          '.$company_info['company_name'].'
			          <small class="pull-right">Date: '.$order_date.'</small>
			        </h2>
			      </div>
			      <!-- /.col -->
			    </div>
			    <!-- info row -->
			    <div class="row invoice-info">
			      
			      <div class="col-sm-4 invoice-col">
			        
			        <b>Bill ID:</b> '.$order_data['bill_no'].'<br>
			        <b>Name:</b> '.$order_data['customer_name'].'<br>
			        <b>Address:</b> '.$order_data['customer_address'].' <br />
			        <b>Phone:</b> '.$order_data['customer_phone'].'
			      </div>
			      <!-- /.col -->
			    </div>
			    <!-- /.row -->

			    <!-- Table row -->
			    <div class="row">
			      <div class="col-xs-12 table-responsive">
			        <table class="table table-striped">
			          <thead>
			          <tr>
			            <th>Product name</th>
			            <th>Price</th>
			            <th>Qty</th>
			            <th>Amount</th>
			          </tr>
			          </thead>
			          <tbody>'; 

			          foreach ($orders_items as $k => $v) {

			          	$product_data = $this->model_products->getProductData($v['product_id']); 
			          	
			          	$html .= '<tr>
				            <td>'.$product_data['name'].'</td>
				            <td>'.$v['rate'].'</td>
				            <td>'.$v['qty'].'</td>
				            <td>'.$v['amount'].'</td>
			          	</tr>';
			          }
			          
			          $html .= '</tbody>
			        </table>
			      </div>
			      <!-- /.col -->
			    </div>
			    <!-- /.row -->

			    <div class="row">
			      
			      <div class="col-xs-6 pull pull-right">

			        <div class="table-responsive">
			          <table class="table">
			            <tr>
			              <th style="width:50%">Gross Amount:</th>
			              <td>'.$order_data['gross_amount'].'</td>
			            </tr>';

			            if($order_data['service_charge'] > 0) {
			            	$html .= '<tr>
				              <th>Service Charge ('.$order_data['service_charge_rate'].'%)</th>
				              <td>'.$order_data['service_charge'].'</td>
				            </tr>';
			            }

			            if($order_data['vat_charge'] > 0) {
			            	$html .= '<tr>
				              <th>Vat Charge ('.$order_data['vat_charge_rate'].'%)</th>
				              <td>'.$order_data['vat_charge'].'</td>
				            </tr>';
			            }
			            
			            
			            $html .=' <tr>
			              <th>Discount:</th>
			              <td>'.$order_data['discount'].'</td>
			            </tr>
			            <tr>
			              <th>Net Amount:</th>
			              <td>'.$order_data['net_amount'].'</td>
			            </tr>
			            <tr>
			              <th>Paid Status:</th>
			              <td>'.$paid_status.'</td>
			            </tr>
			          </table>
			        </div>
			      </div>
			      <!-- /.col -->
			    </div>
			    <!-- /.row -->
			  </section>
			  <!-- /.content -->
			</div>
		</body>
	</html>';

			  echo $html;
		}
	}

}