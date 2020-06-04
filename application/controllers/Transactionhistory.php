<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Transactionhistory extends Admin_Controller 
{
	public function __construct()
	{
		parent::__construct();

		

		$this->data['page_title'] = 'Transaction History';

		$this->load->model('Model_units');
		$this->load->model('model_orders');
		$this->load->model('model_products');
		
		$this->data['order_notification_count'] = count($this->model_orders->get_all_orders_notification());
		$this->data['order_topten_notifications'] = $this->model_orders->get_topten_orders_notification();
	}

	/* 
    * It only redirects to the manage stores page
    */
	public function index()
	{
		if(!in_array('viewProduct', $this->permission)) {
			redirect('dashboard', 'refresh');
		}
		$this->render_template('products/transactionhistory', $this->data);	
	}

	public function fetchTransactionData()
	{
		$result = array('data' => array());

		$transaction_histories = $this->model_products->get_products_transaction_history();
        $index = 0;
        foreach($transaction_histories as $transaction_history){
            $unit_id = (int) $transaction_history['unit_id'];
            $product_id = (int) $transaction_history['product_id'];
			$unit = $this->Model_units->getunitdata($unit_id);
            $unit = strtoupper($unit->unit);
            $product = $this->model_products->getProductData($product_id);
            $product = $product['name'];
            $transaction_histories[$index]['unit'] = $unit;
			$transaction_histories[$index]['product'] = $product;
			$index++;
        }
		
		$data = $transaction_histories;


        $i = 0;
		foreach ($data as $key => $value) {
			// button
			$buttons = '';

			if((int) $value['unit_id'] === 1 || (int) $value['unit_id'] === 2){
                if((int) $value['quantity'] < 1000){
                    $value['quantity'] = $value['quantity'].'G';
                }else{
                    $value['quantity'] = ((int) $value['quantity']/1000).'KG';
                }
            }else if((int) $value['unit_id'] === 3 || (int) $value['unit_id'] === 4){
                if((int) $value['quantity'] < 1000){
                    $value['quantity'] = $value['quantity'].'ML';
                }else{
                    $value['quantity'] = ((int) $value['quantity']/1000).'L';
                }
            }else{
                $value['quantity'] = $value['quantity'].'Piece';
            }

			$result['data'][$key] = array(
				$value['product'],
				$value['unit'],
				$value['quantity'],
				$value['purchase_price'],
				$value['transaction_type'],
				$value['transaction_date']
			);
		$i++;} // /foreach

		echo json_encode($result);
	}


}