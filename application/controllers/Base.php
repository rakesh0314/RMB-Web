<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Base extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
	}
	
	public function index()
	{
        $data['title'] = "Home";
		
		$data['content'] = $this->load->view('base/pages/home/index', $data, true);
		$this->load->view('base/main_layout', $data);
	}
	
	public function about_us()
	{
        $data['title'] = "About Us";
		
		$data['content'] = $this->load->view('base/pages/about_us/index', $data, true);
		$this->load->view('base/main_layout', $data);
	}
	public function menu()
	{
        $data['title'] = "Menu";
		
		$data['content'] = $this->load->view('base/pages/menu/index', $data, true);
		$this->load->view('base/main_layout', $data);
	}
	public function gallery()
	{
        $data['title'] = "Gallery";
		
		$data['content'] = $this->load->view('base/pages/gallery/index', $data, true);
		$this->load->view('base/main_layout', $data);
	}
	public function contact_us()
	{
        $data['title'] = "Contact Us";
		
		$data['content'] = $this->load->view('base/pages/contact_us/index', $data, true);
		$this->load->view('base/main_layout', $data);
	}
}
