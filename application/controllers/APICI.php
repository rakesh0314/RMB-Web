<?php defined('BASEPATH') OR exit('No Script Are allow');
header('Access-Control-Allow-Origin: *');
header("Access-Control-Allow-Methods: OPTIONS, POST, GET, PUT, DELETE");
header("Access-Control-Allow-Headers: Content-Type, Auth_key, Service ,Accept, Api_key,ID,empid");
/**
 * 
 */
class APICI extends CI_Controller
{
	
	function __construct()
	{
		parent:: __construct();
		$this->load->model('Model_auth');
		$this->load->model('Model_units');
		$this->load->library('session');
		
	}

	public function login()
	{
			
			$Auth_key = $this->input->get_request_header('Auth_key',true);
			$service  = $this->input->get_request_header('Service',true);
			$_POST = json_decode(file_get_contents('php://input'), true);
			if ($Auth_key== Auth_key && $service== Service) {
				$username = $this->input->post('username');
				$password1 = $this->input->post('password');
				$this->load->model('Model_users');

				$result = $this->Model_users->loginClient($username,$password1);
				if ($result!==false) {
					$token =  implode('-', str_split(substr(strtolower(md5(microtime().rand(1000, 9999))), 0, 30), 6));
					$data = array('status'=>'true','user_id' =>$result['id'] ,'API_key'=>$token );
					$this->session->set_userdata($data);
					
				}else
				{
					$data = array('status'=>'false' );
				}
				echo json_encode($data);
			}
	}

	public function get_product()
	{
			$Auth_key = $this->input->get_request_header('Auth_key',true);
			$service  = $this->input->get_request_header('Service',true);
			if ($Auth_key == Auth_key && $service == Service) {
					$this->load->model('Model_products');
					$this->load->model('model_units');
					$result = $this->Model_products->getActiveProductData();
					$products = $result;
					$index = 0;
					foreach($products as $product){
                        $prod_id = $product['id'];
                        $units = $this->Model_units->get_product_units_byprod($prod_id);
                       
                        $unitindex = 0;
                        foreach($units as $unit){
                            $unit_details = $this->Model_units->get_product_base_units($unit['unit_id']);
                            $units[$unitindex]['unit'] = $unit_details->unit;
                            ++$unitindex;
                        }
                        $products[$index]['units'] = $units;
                        ++$index;
                    }
                    
                    $result = $products; 
				// 	foreach($result as $rows){
				// 	   $prodId = $rows['id'];
				// 	   $res1 = $this->model_units->get_product_unit($prodId);
				// 	   $array[] =  array('id' => $rows['id'],'name'=>$rows['name'], 'image'=>$rows['image'], 'sku'=>$rows['sku'],'cate'=>$rows['category_id'],'qty'=>$rows['qty'],'units'=>$res1);
					   
				// 	}
					
			        echo json_encode($result);
			}

	}

	public function get_product_detail($proId)
	{
		$Auth_key = $this->input->get_request_header('Auth_key',true);
		$service  = $this->input->get_request_header('Service',true);
		if ($Auth_key == Auth_key && $service == Service) {
				$this->load->model('Model_products'); 
				$this->load->model('model_units'); 
				$result = $this->Model_products->getProductData($proId);
				$res1 = $this->model_units->get_product_unit($proId);
			    $array['myproduct'] =  array('id' => $result['id'],'name'=>$result['name'], 'image'=>$result['image'], 'sku'=>$result['sku'],'description'=>$result['description'],'units'=>$res1);

			    $products = $this->Model_products->get_Product_Bycategory($result['category_id']);
				foreach($products as $rows){
				   $prodId = $rows['id'];
				   $res1 = $this->model_units->get_product_unit($prodId);
				   $array1[] =  array('id' => $rows['id'],'name'=>$rows['name'], 'image'=>$rows['image'], 'sku'=>$rows['sku'],'cate'=>$rows['category_id'],'units'=>$res1);
				   
				}
				if($array1)
				{
				    $array['products'] = $array1;
				}
			echo json_encode($array);
		}
	}

	public function logout()
	{
		$Auth_key = $this->input->get_request_header('Auth_key',true);
		$service  = $this->input->get_request_header('Service',true);
		$user_id  = $this->session->userdata('user_id');
		$key  	  = $this->session->userdata('API_key');
		$Api_key  = $this->input->get_request_header('Api_key',true);
		$ID  	  = $this->input->get_request_header('ID',true);
		if ($Auth_key == Auth_key && $service == Service) {
				if ($user_id == $ID && $Api_key==$key) {
					$this->session->sess_destroy();
				}
				else{
					echo json_encode('API key is not match');
				}
			}
			else{
				echo json_encode('Unauthorized');
			}
	}

	public function View_Category()
	{
			$Auth_key = $this->input->get_request_header('Auth_key',true);
			$service  = $this->input->get_request_header('Service',true);
			if ($Auth_key == Auth_key && $service == Service) {
					$this->load->model('model_category');
					$result = $this->model_category->getActiveCategroy();
					echo json_encode($result);
				}
	}

	public function Get_Unit($id)
	{
			$Auth_key = $this->input->get_request_header('Auth_key',true);
			$service  = $this->input->get_request_header('Service',true);
// 			$user_id  = $this->session->userdata('user_id');
// 			$key  	  = $this->session->userdata('API_key');
			$Api_key  = $this->input->get_request_header('Api_key',true);
			$ID  	  = $this->input->get_request_header('ID',true);
			if ($Auth_key == Auth_key && $service == Service) {
					$this->load->model('model_units');
					$result = $this->model_units->get_products_unit($id);
					echo json_encode($result);
				}
	}

	public function profile($id)
	{

			$Auth_key = $this->input->get_request_header('Auth_key',true);
			$service  = $this->input->get_request_header('Service',true);
			$Api_key  = $this->input->get_request_header('Api_key',true);
			$key  	  = $this->session->userdata('API_key');
			if ($Auth_key == Auth_key && $service == Service) {

					$this->load->model('model_users');
					$user_data = $this->model_users->getClientData($id);
					echo json_encode($user_data);
				}
		
	}

	public function create_account()
	{
			$Auth_key = $this->input->get_request_header('Auth_key',true);
			$service  = $this->input->get_request_header('Service',true);
			$_POST = json_decode(file_get_contents('php://input'), true);
			if ($Auth_key == Auth_key && $service== Service) {
				$this->load->model('model_users');
				$str_result = 'ABCDEFGHIJKLMNOPQRSTUVWXYZ1234567890abcdefghijklmnopqrstuvwxyz'; 
    			$ref_id = "SBG-".substr(str_shuffle($str_result), 0, 6); 
				$contact    = $this->input->post('contact');
				$lat        = $this->input->post('lat');
				$lng        = $this->input->post('lng');
				date_default_timezone_set("Asia/Kolkata");
				$date = date('Y-m-d h:i:s');
				$data 		= array('clt_conno'=>$contact,'reg_lat'=>$lat,'reg_log'=>$lng,'cru_wall_bal'=>'00.00','ref_id'=>$ref_id,'status'=>'0','reg_date'=>$date);
    			$result     =  $this->model_users->createClient_account($data);
    			if ($result!=false) {
    				$array      = array('status' =>true ,'msg'=>'Success','id'=>$result );
    			}else
    			{
    				$array      = array('status' =>false ,'msg'=>'failed');
    			}
				echo json_encode($array);
			}
		
	}
	
	public function updateUserdata()
	{
	    $Auth_key = $this->input->get_request_header('Auth_key',true);
			$service  = $this->input->get_request_header('Service',true);
			$_POST = json_decode(file_get_contents('php://input'), true);
			if ($Auth_key == Auth_key && $service== Service) {
			    $this->load->model('model_users');
    			    $pass = $this->password_hash($this->input->post('password'));
				    $ref_id = 'SBG'.'-'.rand(100000,999999);
				    $ref    = $ref_id.''.$this->input->post('id');
    			    $data = array('clt_name'=>$this->input->post('first_name'),'password'=>$pass,'status'=>'1','ref_id'=>$ref_id);
    			    $result =  $this->model_users->EditClientStatus($this->input->post('id'),$data);
    			    $token =  implode('-', str_split(substr(strtolower(md5(microtime().rand(1000, 9999))), 0, 30), 6));
    			    $array = array('status'=>'true','user_id'=>$this->input->post('id') ,'API_key'=>$token);
    			
    			echo json_encode($array);
	    }
    			
	}

	public function password_hash($pass = '')
	{
		if($pass) {
			$password = password_hash($pass, PASSWORD_DEFAULT);
			return $password;
		}
	}

	public function get_Product_Bycategory($cat)
	{
			$Auth_key = $this->input->get_request_header('Auth_key',true);
			$service  = $this->input->get_request_header('Service',true);
			$_POST = json_decode(file_get_contents('php://input'), true);
			if ($Auth_key == Auth_key && $service == Service) {
					$this->load->model('Model_products');
					$this->load->model('model_units');
					$products = $this->Model_products->get_Product_Bycategory($cat);
					foreach($products as $rows){
					   $prodId = $rows['id'];
					   $res1 = $this->model_units->get_product_unit($prodId);
					   $array[] = array('id' => $rows['id'],'name'=>$rows['name'], 'image'=>$rows['image'], 'sku'=>$rows['sku'],'cate'=>$rows['category_id'],'qty'=>$rows['qty'],'units'=>$res1);
					   
					}
					if($array)
					{
					    $product = $array;
					    
					echo json_encode($product);
					}
				}
	}

	public function get_order_history()
	{
			$Auth_key = $this->input->get_request_header('Auth_key',true);
			$service  = $this->input->get_request_header('Service',true);
			$user_id  = $this->session->userdata('user_id');
			$key  	  = $this->session->userdata('API_key');
			$Api_key  = $this->input->get_request_header('Api_key',true);
			$ID  	  = $this->input->get_request_header('ID',true);
			if ($Auth_key == Auth_key && $service == Service) {
					$this->load->model('Model_orders');
				    $this->load->model('Model_products');
					$products = $this->Model_orders->get_history($ID);
					echo json_encode($products);
				}
	}

	public function Add_cart()
	{
		$_POST = json_decode(file_get_contents('php://input'), true);
		$Auth_key = $this->input->get_request_header('Auth_key',true);
		$service  = $this->input->get_request_header('Service',true);
		// $user_id  = $this->session->userdata('user_id');
		$key  	  = $this->session->userdata('API_key');
		$Api_key  = $this->input->get_request_header('Api_key',true);
		$ID  	  = $this->input->get_request_header('ID',true);
		if ($Auth_key == Auth_key && $service == Service ) 
		{
			$this->load->model('Model_cart');
			$proId 	= $this->input->post('Product_id');
			$unit 	= $this->input->post('unit');
			$date  	= date('Y-m-d');
			$check_cart = array('user_id' =>$ID,'unit_id'=>$unit , 'product_id'=>$proId);
			$res = $this->Model_cart->check_cart($check_cart);
			if($res>0)
			{
			    $array = array('status'=>'false');
			} else{
			    $cart = array('user_id' =>$ID,'unit_id'=>$unit , 'product_id'=>$proId, 'date'=>$date);
    			$this->Model_cart->create($cart);
    			$result = $this->Model_cart->count_cart($ID);
    			$array = array('status'=>'true','cart' => $result, 'massage'=>'Product Added in your cart');
			}
			echo json_encode($array);
		}
	}

	public function delete_cart($cartId)
	{
			$Auth_key = $this->input->get_request_header('Auth_key',true);
			$service  = $this->input->get_request_header('Service',true);
			$user_id  = $this->session->userdata('user_id');
			$key  	  = $this->session->userdata('API_key');
			$Api_key  = $this->input->get_request_header('Api_key',true);
			$ID  	  = $this->input->get_request_header('ID',true);
			if ($Auth_key == Auth_key && $service == Service) {
					$this->load->model('Model_cart');
					$result = $this->Model_cart->remove_cart($cartId);
					if ($result) {
				        $this->view_cart();
					}else{
						echo json_encode('Error On remove');
					}
					
				}
	}

	public function view_cart()
	{
			
			$Auth_key = $this->input->get_request_header('Auth_key',true);
			$service  = $this->input->get_request_header('Service',true);
			$user_id  = $this->session->userdata('user_id');
			$key  	  = $this->session->userdata('API_key');
			$Api_key  = $this->input->get_request_header('Api_key',true);
			$ID  	  = $this->input->get_request_header('ID',true);
			if ($Auth_key == Auth_key && $service == Service) {
					$this->load->model('Model_cart');
					$this->load->model('Model_products');
					$res1 = $this->Model_cart->get_cart_data($ID);
					foreach ($res1 as $row) {
						$proId = $row->product_id;
						$unitId = $row->unit_id;
						$res2  = $this->Model_products->cartDetails($proId,$unitId);
						$array[]= array('name'=>$res2['name'], 'sku'=>$res2['sku'], 'image'=>$res2['image'],'stock'=>$res2['qty'], 'id_products'=>$res2['id_products'],'sell_id'=>$res2['id'],'unit_id'=>$res2['unit_id'],
						'mrpprice'=>$res2['mrpprice'], 'sellprice'=>$res2['sellprice'],'prod_qty'=>$res2['quantity'] ,'unit'=>$res2['unit'], 'cart_id'=>$row->id);
					}
					if (isset($array)) {
						echo json_encode($array);
					}
				}
	}
	
	public function serachProduct($prodName)
	{
	    $Auth_key = $this->input->get_request_header('Auth_key',true);
			$service  = $this->input->get_request_header('Service',true);
			if ($Auth_key == Auth_key && $service == Service) 
			{
				$this->load->model('Model_products');
				$this->load->model('model_units');
				$result = $this->Model_products->get_product_search($prodName);
				foreach($result as $rows){
				   $prodId = $rows['id'];
				   $res1 = $this->model_units->get_product_unit($prodId);
				   $array[] =  array('id' => $rows['id'],'name'=>$rows['name'], 'image'=>$rows['image'], 'sku'=>$rows['sku'],'cate'=>$rows['category_id'],'qty'=>$rows['qty'],'units'=>$res1);
				}
				if($array)
				{
				    echo json_encode($array);
				}
			}
	}
	
	public function ContactUs()
	{
		$_POST = json_decode(file_get_contents('php://input'), true);
	    $Auth_key = $this->input->get_request_header('Auth_key',true);
		$service  = $this->input->get_request_header('Service',true);
		$this->load->model('Model_users');
		if ($Auth_key == Auth_key && $service == Service) {
		    $array = array('name'=>$this->input->post('name'),'email'=>$this->input->post('email'),'massage'=>$this->input->post('massage'));
		    $this->Model_users->Contact($array);
		}
	}
	
	public function emplogin()
	{
			
			$Auth_key = $this->input->get_request_header('Auth_key',true);
			$service  = $this->input->get_request_header('Service',true);
			$_POST = json_decode(file_get_contents('php://input'), true);
			if ($Auth_key== Auth_key && $service== Service) {
				$username = $this->input->post('username');
				$password1 = $this->input->post('password');
				$this->load->model('Model_users');

				$result = $this->Model_users->loginEmp($username,$password1);
				if ($result!==false) {
					$token =  implode('-', str_split(substr(strtolower(md5(microtime().rand(1000, 9999))), 0, 30), 6));
					$data = array('EmpLogin'=>'true','emp_id' =>$result['id'] ,'empAPI_key'=>$token );
					$this->session->set_userdata($data);
					
				}else
				{
					$data = array('status'=>'false' );
				}
				echo json_encode($data);
			}
	}
	
	public function EditEmpProfile()
	{
	    $Auth_key = $this->input->get_request_header('Auth_key',true);
		$service  = $this->input->get_request_header('Service',true);
		$Api_key  = $this->input->get_request_header('api_key',true);
		$empid    = $this->input->get_request_header('empid',true);
		$_POST = json_decode(file_get_contents('php://input'), true);
		if ($Auth_key== Auth_key && $service== Service) 
		{
		    $this->load->model('Model_users');
		    $data = array('name'=>$this->input->post('fullname'),'email'=>$this->input->post('email'),'contactno'=>$this->input->post('contact'),
		    'vehicleno'=>$this->input->post('vehicleno'),'vehicle_type'=>$this->input->post('vehictype'));
		    
		    $result = $this->Model_users->updateEmp($data,$empid);
		    $data = array('status'=>$result);
		    echo json_encode($data);
		}
	}
	
	public function EmpProfile()
	{
	    $Auth_key = $this->input->get_request_header('Auth_key',true);
		$service  = $this->input->get_request_header('Service',true);
		$Api_key  = $this->input->get_request_header('api_key',true);
		$empid    = $this->input->get_request_header('empid',true);
		if ($Auth_key== Auth_key && $service== Service) 
		{
		    $this->load->model('Model_users');
		    $result = $this->Model_users->empdata($empid);
		    echo json_encode($result);
		}
		
	}
	
	
	public function order()
	{
	    $Auth_key = $this->input->get_request_header('Auth_key',true);
		$service  = $this->input->get_request_header('Service',true);
		$Api_key  = $this->input->get_request_header('Api_key',true);
		$id    = $this->input->get_request_header('ID',true);
		$_POST = json_decode(file_get_contents('php://input'), true);
		if ($Auth_key== Auth_key && $service== Service) 
		{
		    $this->load->model('Model_orders');
		    $this->load->model('model_users');
		    $this->load->model('model_company');
		    $this->load->model('Model_products');
		    $pay_method = $this->input->post('method');
		    $companydata = $this->model_company->getCompanyData('1');
		    $user = $this->model_users->getClientData($id);
		    $product = $this->input->post('product');
		    $total_price = 0;
		    for($i=0;$i<count($product);$i++)
		    {
		        $price = $product[$i]['quantity']*$product[$i]['sellprice'];
		        $total_price = $price+$total_price;
		    }
		    date_default_timezone_set("Asia/Kolkata");
		    $date = date('Y-m-d h:i:s');
		    $ser_chrage = $companydata['service_charge_value'];
		    $del_chrage = $total_price*$ser_chrage/100;
		    $total_amount = $total_price +$del_chrage;
		    $orderId = 'Sabji-'.rand(1000000000,10000000000);
		    if($pay_method=='1'){
		           $order_data = array('bill_no'=>$orderId,'user_id'=>$id,'customer_address'=>$this->input->post('address'),'paid_status'=>'2','payment_method'=>'Online Transaction','gross_amount'=>$total_price,'net_amount'=>$total_amount,'service_charge_rate'=>'13',
		            'service_charge'=>$del_chrage,'quantity'=>$i,'date_time'=>$date,'status'=>4,'order_slot'=>$this->input->post('slot'));
		    }else if($pay_method==3)
		    {
		        $order_data = array('bill_no'=>$orderId,'user_id'=>$id,'customer_address'=>$this->input->post('address'),'paid_status'=>'1','payment_method'=>'Pay From Wallet','gross_amount'=>$total_price,'net_amount'=>$total_amount,'service_charge_rate'=>'13',
		            'service_charge'=>$del_chrage,'quantity'=>$i,'date_time'=>$date,'status'=>0,'order_slot'=>$this->input->post('slot'));
		            $amount = $user->cru_wall_bal-$total_amount;
		    }else{
		        $order_data = array('bill_no'=>$orderId,'user_id'=>$id,'customer_address'=>$this->input->post('address'),'paid_status'=>'2','payment_method'=>'Cash On Delivary','gross_amount'=>$total_price,'net_amount'=>$total_amount,'service_charge_rate'=>'13',
		            'service_charge'=>$del_chrage,'quantity'=>$i,'date_time'=>$date,'status'=>0,'order_slot'=>$this->input->post('slot'));
		    }
		    $result = $this->Model_orders->create_order($order_data);
		    for($j=0;$j<count($product);$j++)
		    {  
		        $price = 0;
		        $price = $product[$j]['quantity']*$product[$j]['sellprice'];
		        $data = array('order_id'=>$result,'product_id'=>$product[$j]['id_products'],'qty'=>$product[$j]['quantity'],'rate'=>$product[$j]['sellprice'],'amount'=>$price,
		        'unit_id'=>$product[$j]['unit_id'],'sell_id'=>$product[$j]['sell_id']);
		        $this->Model_orders->order_item($data);
		        $prod_detail = $this->Model_products->getProductData($product[$j]['id_products']);
		        
		        if((int) $product[$j]['unit_id'] === 1 || (int) $product[$j]['unit_id']===3)
		        {
		            $quantity = ($product[$j]['quantity']*$product[$j]['prod_qty'])*1000;
		            $prod_detail['qty'] = $prod_detail['qty']-$quantity;
		        }else if((int) $product[$j]['unit_id']===6){
		            $quantity = ($product[$j]['quantity']*$product[$j]['prod_qty'])*12;
		            $prod_detail['qty'] = $prod_detail['qty']-$quantity;
		        }else{
		            $quantity = $product[$j]['quantity']*$product[$j]['prod_qty'];
		            $prod_detail['qty'] = $prod_detail['qty']-$quantity;
		        }
		        $this->Model_products->update(array('qty'=>$prod_detail['qty']),$product[$j]['id_products']);
		    }
		    if($result=="")
		    {
    		    $array = array('status'=>false,'gateway'=>false);
		    }else{
		        if($pay_method=='1'){
		            $array = array('status'=>true,'gateway'=>true,'order_id'=>$result);
		        }else if($pay_method==3)
		        {
		            $this->Model_orders->delete_usercart($id);
		            $res1 = $this->model_users->update_Client(array('cru_wall_bal'=>$amount),$id);
		            if($res1)
		            {
		                $array = array('status'=>true,'gateway'=>false,'order_id'=>$result);
		            }
		        }else{
		            $this->Model_orders->delete_usercart($id);
		            $array = array('status'=>true,'gateway'=>false,'order_id'=>$result);
		        }
		    }
		    echo json_encode($array);
		}
	}
	
	public function confirm_order()
	{
	    $Auth_key = $this->input->get_request_header('Auth_key',true);
		$service  = $this->input->get_request_header('Service',true);
		$Api_key  = $this->input->get_request_header('Api_key',true);
		$id    = $this->input->get_request_header('ID',true);
		$_POST = json_decode(file_get_contents('php://input'), true);
		if ($Auth_key== Auth_key && $service== Service) 
		{
		    $this->load->model('Model_users');
		    $this->load->model('Model_orders');
		    $result = $this->Model_orders->order_details($id);
		    $address= $this->Model_users->address($result->customer_address);
		    $res    = $this->Model_users->getClientData($id);
		    $result->uname = $res->clt_name;
		    $result->conno = $res->clt_conno;
		    $result->address= $address;
		    echo json_encode($result);
		}
	}
	
	public function order_details($order_id)
	{
	    $Auth_key = $this->input->get_request_header('Auth_key',true);
		$service  = $this->input->get_request_header('Service',true);
		$Api_key  = $this->input->get_request_header('Api_key',true);
		$id    = $this->input->get_request_header('ID',true);
		$_POST = json_decode(file_get_contents('php://input'), true);
		if ($Auth_key== Auth_key && $service== Service) 
		{
			date_default_timezone_set("Asia/Kolkata");
		    $this->load->model('Model_users');
		    $this->load->model('Model_orders');
		    $this->load->model('Model_products');
		    $result = $this->Model_orders->get_order_details($order_id);
		    $res    = $this->Model_users->getClientData($result->user_id);
		    $address= $this->Model_users->address($result->customer_address);
		    $date = strtotime(date('Y-m-d h:i:s'));
		    	$orderdate = strtotime($result->date_time);
		    	$diff = abs($date-$orderdate);
		    	$years = floor($diff / (365*60*60*24)); 
		    	$months = floor(($diff - $years * 365*60*60*24) / (30*60*60*24)); 
		    	$days = floor(($diff - $years * 365*60*60*24 - $months*30*60*60*24)/ (60*60*24));
		    	$hours = floor(($diff - $years * 365*60*60*24 - $months*30*60*60*24 - $days*60*60*24) / (60*60));
		    	$minutes = floor(($diff - $years * 365*60*60*24 - $months*30*60*60*24 - $days*60*60*24 - $hours*60*60)/ 60); 
		    	$seconds = floor(($diff - $years * 365*60*60*24 - $months*30*60*60*24 - $days*60*60*24 - $hours*60*60 - $minutes*60));
		    	$time = $hours.':'.$minutes.':'.$seconds;
		    	// echo $time;	
		    	if ($hours<2 && $days<1 ) {
		    		$date1 = strtotime("02:00:00");
		    		$date2 = strtotime($time);
		    		$diff1 = abs($date1-$date2);
		    		$years1 = floor($diff1 / (365*60*60*24)); 
			    	$months1 = floor(($diff - $years1 * 365*60*60*24) / (30*60*60*24)); 
			    	$days1 = floor(($diff1 - $years1 * 365*60*60*24 - $months1*30*60*60*24)/ (60*60*24));  
			    	$hours1 = floor(($diff1 - $years1 * 365*60*60*24 - $months1*30*60*60*24 - $days1*60*60*24) / (60*60));
			    	$minutes1 = floor(($diff1 - $years1 * 365*60*60*24 - $months1*30*60*60*24 - $days1*60*60*24 - $hours1*60*60)/ 60); 
			    	$seconds1 = floor(($diff1 - $years1 * 365*60*60*24 - $months1*30*60*60*24 - $days1*60*60*24 - $hours1*60*60 - $minutes1*60)); 
			    	$time1 = $hours1.':'.$minutes1.':'.$seconds1;
			    	$minutes2 = $hours1 *60+$minutes1;
			    	$seconds2 = $minutes2*60+$seconds1;
			    	$result->second = $seconds2;
		    	}else{

			    	$result->second = 0;
		    	}
		    $result->uname = $res->clt_name;
		    $result->conno = $res->clt_conno;
		    $result->address= $address;
		    $prodId = $this->Model_orders->getOrdersItemData($order_id);
		    for($i=0;$i<count($prodId);$i++)
		    {
		        $orderItem = $this->Model_products->cartDetails($prodId[$i]['product_id'],$prodId[$i]['sell_id']);
		        $orderItem['qty'] = $prodId[$i]['qty'];
		        $orderData[]=$orderItem;
		    }
		    
		    $result->products = $orderData;
		    echo json_encode($result);
		}
	}
	
	public function send_OTP()
	{
	    $Auth_key = $this->input->get_request_header('Auth_key',true);
		$service  = $this->input->get_request_header('Service',true);
		$_POST = json_decode(file_get_contents('php://input'), true);
		if ($Auth_key== Auth_key && $service== Service) 
		{
		    $this->load->model('model_users');
		        $phone = array('clt_conno'=>$this->input->post('phone'));
    			$user = $this->model_users->check_users($phone);
    			if($user>0)
    			{
    			    $array = array('status' =>'false' ,'msg'=>'duplicate' );
    			}else
    			{
            	   $contact = $this->input->post('phone');
            	   $otp = rand(1000,9999);
			       $msg ="This is your OTP - ".$otp." for verify mobile number";
            	   $array = $this->getOTP($contact,$msg);
            	   $array['otp'] = $otp;
    			}
                  echo json_encode($array);
		}
	}
	
	public function About_us()
	{
	    $Auth_key = $this->input->get_request_header('Auth_key',true);
		$service  = $this->input->get_request_header('Service',true);
		$_POST = json_decode(file_get_contents('php://input'), true);
		if ($Auth_key== Auth_key && $service== Service) 
		{
		    $this->load->model('Model_company');
		    $result = $this->Model_company->getactiveabout();
            $aboutdata = $this->Model_company->getaboutdata($result->id);
    	    $result->aboutdata = $aboutdata;
		    echo json_encode($result);
		}
	}
	
	public function resendOtp()
	{
	    $Auth_key = $this->input->get_request_header('Auth_key',true);
		$service  = $this->input->get_request_header('Service',true);
		$_POST = json_decode(file_get_contents('php://input'), true);
		if ($Auth_key== Auth_key && $service== Service) 
		{
		    $otp = $this->input->post('otp');
		    $msg ="This is your OTP - ".$otp." for SABJI ";
            $result = $this->getOTP($this->input->post('phone'),$msg);
            $result['otp'] = $otp;
            echo json_encode($result);
		}
	}
	
	public function getaddress()
	{
	    $Auth_key = $this->input->get_request_header('Auth_key',true);
		$service  = $this->input->get_request_header('Service',true);
		$Api_key  = $this->input->get_request_header('Api_key',true);
		$id       = $this->input->get_request_header('ID',true);
		$_POST    = json_decode(file_get_contents('php://input'), true);
		if ($Auth_key== Auth_key && $service== Service) 
		{
		    $this->load->model('Model_users');
		    $result = $this->Model_users->clientaddresses($id);
		    echo json_encode($result);
		}
	}
	
	public function AddClientAddress()
	{
	    $Auth_key = $this->input->get_request_header('Auth_key',true);
		$service  = $this->input->get_request_header('Service',true);
		$_POST = json_decode(file_get_contents('php://input'), true);
		if ($Auth_key== Auth_key && $service== Service) 
		{
		    $this->load->model('Model_users');
		    $email = array('clt_email'=>$this->input->post('email'));
		    $user = $this->Model_users->check_users($email);
			if($user>0)
			{
			    $data = array('status' =>false ,'msg'=>0 );
			}else
			{
    		    if($this->input->post('email'))
    		    {
    		        $data = array('clt_email'=>$this->input->post('email'));
    		        $this->Model_users->EditClientStatus($this->input->post('id'),$data);
    		    }
    		    $array = array('client_id'=>$this->input->post('userid'),'house_no'=>$this->input->post('house_no'),'street_no'=>$this->input->post('street_no'),'landmark'=>$this->input->post('landmark'),'city'=>
    		    $this->input->post('city'),'zip_code'=>$this->input->post('zip_code'),'category'=>$this->input->post('category'));
    		    $result  = $this->Model_users->addclientaddress($array);
    		    if($result != false)
    		    {
    		        $data = array('status'=>true,'id'=>$result);
    		    }else{
    		        $data = array('status'=>false,'msg'=>1);
    		    }
    		    echo json_encode($data);
			}
        }
	}
	
	public function AddClientNewAddress()
	{
		$this->load->model('Model_users');
	    $Auth_key = $this->input->get_request_header('Auth_key',true);
		$service  = $this->input->get_request_header('Service',true);
		$_POST = json_decode(file_get_contents('php://input'), true);
		if ($Auth_key== Auth_key && $service== Service) 
		{
		    $pin = $this->input->post('zip_code');
		    $pin_status = $this->Model_users->check_pin($pin);
		    if($pin_status>0)
		    {
		        $array = array('client_id'=>$this->input->post('userid'),'house_no'=>$this->input->post('house_no'),'street_no'=>$this->input->post('street_no'),'landmark'=>$this->input->post('landmark'),'city'=>
    		    $this->input->post('city'),'zip_code'=>$this->input->post('zip_code'),'category'=>$this->input->post('category'));
    		    $result  = $this->Model_users->addclientaddress($array);
    		    if($result != false)
    		    {
    		        $data = array('error'=>200,'id'=>$result);
    		    }else{
    		        $data = array('error'=>500);
    		    }
		    }else{
    		    $data = array('error'=>403);
		    }
		    
		    echo json_encode($data);
		}
	}
	
	public function banner()
	{
	    $Auth_key = $this->input->get_request_header('Auth_key',true);
		$service  = $this->input->get_request_header('Service',true);
		$_POST = json_decode(file_get_contents('php://input'), true);
		if ($Auth_key== Auth_key && $service== Service) 
		{
		    $this->load->model('model_company');
		    $result = $this->model_company->activebanner();
		    echo json_encode($result);
		}
	}
	
	public function clientaddress()
	{
	    $Auth_key = $this->input->get_request_header('Auth_key',true);
		$service  = $this->input->get_request_header('Service',true);
		$Api_key  = $this->input->get_request_header('Api_key',true);
		$id       = $this->input->get_request_header('ID',true);
		$_POST    = json_decode(file_get_contents('php://input'), true);
		if ($Auth_key== Auth_key && $service== Service) 
		{
		    $this->load->model('Model_users');
		    $result = $this->Model_users->clientaddress($id);
		    
		    echo json_encode($result);
		}
	}
	
	public function getOTP($num,$msg)
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
	
	public function resetpassotp()
	{
	    $Auth_key = $this->input->get_request_header('Auth_key',true);
		$service  = $this->input->get_request_header('Service',true);
		$_POST = json_decode(file_get_contents('php://input'), true);
		if ($Auth_key== Auth_key && $service== Service) 
		{
		    $this->load->model('model_users');
		    $phone = array('clt_conno'=>$this->input->post('phone'));
			$user = $this->model_users->check_users($phone);
			if($user>0)
			{
			    $otp = rand(1000,9999);
			    $msg ="This is your OTP - ".$otp." for reset password";
		        $result = $this->getOTP($this->input->post('phone'),$msg);
		        $result['phone'] = $this->input->post('phone');
		        $result['otp'] = $otp;
			}else
			{
			    $result = array('status' =>'false' ,'msg'=>'Failed' );
			}
		    echo json_encode($result);
		}
	}
	
	public function changepassword()
	{
	    $Auth_key = $this->input->get_request_header('Auth_key',true);
		$service  = $this->input->get_request_header('Service',true);
		$_POST = json_decode(file_get_contents('php://input'), true);
		if ($Auth_key== Auth_key && $service== Service) 
		{
		    $this->load->model('model_users');
		    $password = $this->password_hash($this->input->post('password'));
		    $array = array('password'=>$password);
		    $data  = array('clt_conno'=>$this->input->post('phone'),'status'=>'1');
		    $this->model_users->changecltpass($array,$data);
		}
	}
	
	public function terms()
	{
	    $Auth_key = $this->input->get_request_header('Auth_key',true);
		$service  = $this->input->get_request_header('Service',true);
		if ($Auth_key== Auth_key && $service== Service) 
		{
    	    $this->load->model('Model_company');
    	    $result = $this->Model_company->getactiveterms();
            $termsdata = $this->Model_company->getTermsdata($result->id);
    	    $result->termsdata = $termsdata;
    	    echo json_encode($result);
		}
	}
	
	public function getempOrders()
	{
	    $Auth_key = $this->input->get_request_header('Auth_key',true);
		$service  = $this->input->get_request_header('Service',true);
		$Api_key  = $this->input->get_request_header('api_key',true);
		$empid    = $this->input->get_request_header('empid',true);
		if ($Auth_key== Auth_key && $service== Service) 
		{
		    $this->load->model('Model_orders');
		    $result = $this->Model_orders->emporders($empid);
		    echo json_encode($result);
		}
	}
	
	public function getempordershis()
	{
	    $Auth_key = $this->input->get_request_header('Auth_key',true);
		$service  = $this->input->get_request_header('Service',true);
		$Api_key  = $this->input->get_request_header('api_key',true);
		$empid    = $this->input->get_request_header('empid',true);
		if ($Auth_key== Auth_key && $service== Service) 
		{
		    $this->load->model('Model_orders');
		    $result = $this->Model_orders->emp_orders_history($empid);
		    echo json_encode($result);
		}
	}
	
	public function ordercompletestatus()
	{
	    $Auth_key = $this->input->get_request_header('Auth_key',true);
		$service  = $this->input->get_request_header('Service',true);
		$Api_key  = $this->input->get_request_header('api_key',true);
		$empid    = $this->input->get_request_header('empid',true);
		$_POST = json_decode(file_get_contents('php://input'), true);
		if ($Auth_key== Auth_key && $service== Service) 
		{
		    $this->load->model('Model_users');
		    $this->load->model('Model_orders');
			date_default_timezone_set("Asia/Kolkata");
			$date = date('Y-m-d h:i:s');
		    $emparray = array('work_assign'=>'0');
		    $array = array('status'=>2,'paid_status'=>1,'complete_date'=>$date);
		    $this->Model_orders->updateorder($array,$this->input->post('id'));
		    $this->Model_users->updateEmp($emparray,$empid);
		    $client = $this->Model_users->getClientData($this->input->post('user_id'));
		    $clt_phone = $client->clt_conno;
		    $msg = "Your order is sucessfully delivered in your order address.";
		    $result= $this->getOTP($clt_phone,$msg);
		    echo json_encode($result);
		}
	} 
	
	public function paymentSuccess()
	{
	    $Auth_key = $this->input->get_request_header('Auth_key',true);
		$service  = $this->input->get_request_header('Service',true);
		$Api_key  = $this->input->get_request_header('Api_key',true);
		$_POST = json_decode(file_get_contents('php://input'), true);
		if ($Auth_key== Auth_key && $service== Service) 
		{
			date_default_timezone_set("Asia/Kolkata");
			$date = date("Y-m-d h:i:s");
		    $this->load->model('Model_orders');
		    $this->load->model('Model_products');
		    $this->load->model('Model_units');
		    $unitb = $this->Model_units->get_all_products_unit();
		    $data = array('paid_status'=>'1','payment_id'=>$this->input->post('payment_id'),'status'=>0);
		    $txn = array('txn_type'=>'DEBIT','txn_id'=>$this->input->post('payment_id'),'txn_amount'=>$this->input->post('amount'),'user_id'=>$this->input->post('userId'),'date'=>$date);
		    $products = $this->input->post('products');
		    foreach($products as $product){
		        $prod_detail = $this->Model_products->getProductData($product['id_products']);
		        if((int) $product['unit_id'] === 1 || (int) $product['unit_id']===3)
		        {
		            $quantity = ($product['quantity']*$product['prod_qty'])*1000;
		            $prod_detail['qty'] = $prod_detail['qty']-$quantity;
		        }else if((int) $product['unit_id']===6){
		            $quantity = ($product['quantity']*$product['prod_qty'])*12;
		            $prod_detail['qty'] = $prod_detail['qty']-$quantity;
		        }else{
		            $quantity = $product['quantity']*$product['prod_qty'];
		            $prod_detail['qty'] = $prod_detail['qty']-$quantity;
		        }
		        $this->Model_products->update(array('qty'=>$prod_detail['qty']),$product['id_products']);
		    }
		   $this->Model_orders->transaction_data($txn);
		    $this->Model_orders->updateorder($data,$this->input->post('orderId'));
		    $this->Model_orders->delete_usercart($this->input->post('userId'));
		}
	}
	
	public function UploadImage()
    {
	    $imagename = $_FILES['file']['name'];
	    $image = explode(',',$imagename);
	    $id = $image[0];
	    $name = $image[1];
	    $config['upload_path']          = 'assets/images/userimage';
        $config['allowed_types']        = 'jpeg|JPEG|JPG|jpg|png';
        $config['overwrite']            = TRUE;
        $config['file_name']            = $name;
        $config['max_size']             = 1000;

        $this->load->library('upload', $config);
        $this->upload->initialize($config);

        if ( ! $this->upload->do_upload('file'))
        {
                $data = array('status'=>false,'error' => $this->upload->display_errors());
        }
        else
        {
		    $this->load->model('Model_users');
            $imagpath = $config['upload_path'].'/'.$name;
            $result = $this->Model_users->update_Client(array('clt_pic'=>$imagpath),$id);
            if($result)
            {
                $data = array('status'=>true,'upload_data' => $this->upload->data());
            }
        }
        echo json_encode($data);
    }
    
    public function update_userprofile()
    {
        $Auth_key = $this->input->get_request_header('Auth_key',true);
		$service  = $this->input->get_request_header('Service',true);
		$_POST = json_decode(file_get_contents('php://input'), true);
		if ($Auth_key== Auth_key && $service== Service) 
		{
		    $this->load->model('Model_users');
		    $data = array('clt_name'=>$this->input->post('clt_name'),'clt_conno'=>$this->input->post('clt_conno'),'clt_email'=>$this->input->post('clt_email'));
		    $result = $this->Model_users->update_Client($data,$this->input->post('id'));
		    if($result==true)
		    {
		        $array = array('status'=>true,'massage'=>"success updated");
		    }else{
		        $array = array('status'=>false,'massage'=>"network error ");
		    }
		    echo json_encode($array);
		}
    }
    
    public function dil_charge()
    {
        $Auth_key = $this->input->get_request_header('Auth_key',true);
		$service  = $this->input->get_request_header('Service',true);
		if ($Auth_key== Auth_key && $service== Service) 
		{
		    $this->load->model('model_company');
		    $result = $this->model_company->getCompanyData(1);
		    echo json_encode($result);
		}
    }
    
    public function addmoney_wallet()
    {
        $Auth_key = $this->input->get_request_header('Auth_key',true);
		$service  = $this->input->get_request_header('Service',true);
		$id    = $this->input->get_request_header('ID',true);
		$_POST = json_decode(file_get_contents('php://input'), true);
		if ($Auth_key== Auth_key && $service== Service) 
		{
			date_default_timezone_set("Asia/Kolkata");
			$date = date('Y-m-d h:i:s');
		    $this->load->model('Model_orders');
		    $this->load->model('Model_users');
		    $txn = array('txn_type'=>'CREDIT','txn_id'=>$this->input->post('txn_id'),'txn_amount'=>$this->input->post('amount'),'user_id'=>$id,'date'=>$date);
		    $this->Model_orders->transaction_data($txn);
		    $userdata = $this->Model_users->getClientData($id);
		    $amount = $userdata->cru_wall_bal+$this->input->post('amount');
		    $result = $this->Model_users->update_client(array('cru_wall_bal'=>$amount),$id);
		    if($result)
		    {
		        $array = array('status'=>true,'massage'=>"success");
		    }else{
		        $array = array('status'=>false,'massage'=>"failed");
		    }
		    echo json_encode($array);
		}
    }

    public function cancel_order()
	{
	    $Auth_key = $this->input->get_request_header('Auth_key',true);
		$service  = $this->input->get_request_header('Service',true);
		$_POST = json_decode(file_get_contents('php://input'), true);
		if ($Auth_key== Auth_key && $service== Service) 
		{
			$orderid = $this->input->post('orderId');
		    $this->load->model('Model_orders');
		    $result = $this->Model_orders->update_order(array('status'=>3),$orderid);
		    if($result==true)
		    {
		        $array = array('status'=>true,'message'=>'Update successfully');
		    }else{
		        $array = array('status'=>false,'message'=>'error on update');
		    }
		    echo json_encode($array);
		}
	}

	public function all_transaction()
	{
		$Auth_key = $this->input->get_request_header('Auth_key',true);
		$service  = $this->input->get_request_header('Service',true);
		$id    = $this->input->get_request_header('ID',true);
		$_POST = json_decode(file_get_contents('php://input'), true);
		if ($Auth_key== Auth_key && $service== Service) 
		{
			$this->load->model('Model_orders');
			$result = $this->Model_orders->get_transaction($id);
			echo json_encode($result);
		}
	}

	public function deleteAdd($id)
	{
		$Auth_key = $this->input->get_request_header('Auth_key',true);
		$service  = $this->input->get_request_header('Service',true);
		$_POST = json_decode(file_get_contents('php://input'), true);
		if ($Auth_key== Auth_key && $service== Service) 
		{
			$this->load->model('Model_orders');
			$result = $this->Model_orders->delete_add($id);
			if($result==true)
			{
			    $array = array('status'=>true,'message'=>'Success');
			}else{
			    $array = array('status'=>false,'message'=>'failed');
			}
			echo json_encode($array);
		}
	}
}