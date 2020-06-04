<?php 

class Dashboard extends Admin_Controller 
{
	public function __construct()
	{
		parent::__construct();

		$this->not_logged_in();

		$this->data['page_title'] = 'Dashboard';
		
		$this->load->model('model_products');
		$this->load->model('model_orders');
		$this->load->model('model_users');
		$this->load->model('model_stores');
		$this->data['order_notification_count'] = count($this->model_orders->get_all_orders_notification());
		$this->data['order_topten_notifications'] = $this->model_orders->get_topten_orders_notification();
	}

	/* 
	* It only redirects to the manage category page
	* It passes the total product, total paid orders, total users, and total stores information
	into the frontend.
	*/
	public function index()
	{
		$this->data['total_products'] = $this->model_products->countTotalProducts();
		$this->data['total_paid_orders'] = $this->model_orders->countTotalPaidOrders();
		$this->data['total_users'] = $this->model_users->countTotalUsers();
		$this->data['total_stores'] = 100;

		$user_id = $this->session->userdata('id');
		$is_admin = ($user_id == 1) ? true :false;

		$this->data['is_admin'] = $is_admin;
		$this->render_template('dashboard', $this->data);
	}
}