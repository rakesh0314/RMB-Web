<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Company extends Admin_Controller 
{
	public function __construct()
	{
		parent::__construct();

		$this->not_logged_in();

		$this->data['page_title'] = 'Company';

        $this->load->model('model_company');
        $this->load->model('model_orders');
        $this->data['order_notification_count'] = count($this->model_orders->get_all_orders_notification());
		$this->data['order_topten_notifications'] = $this->model_orders->get_topten_orders_notification();
	}

    /* 
    * It redirects to the company page and displays all the company information
    * It also updates the company information into the database if the 
    * validation for each input field is successfully valid
    */
	public function index()
	{  
        if(!in_array('updateCompany', $this->permission)) {
            redirect('dashboard', 'refresh');
        }
        
		$this->form_validation->set_rules('company_name', 'Company name', 'trim|required');
		$this->form_validation->set_rules('service_charge_value', 'Charge Amount', 'trim|integer');
		$this->form_validation->set_rules('vat_charge_value', 'Vat Charge', 'trim|integer');
		$this->form_validation->set_rules('address', 'Address', 'trim|required');
		$this->form_validation->set_rules('message', 'Message', 'trim|required');
	
	
        if ($this->form_validation->run() == TRUE) {
            // true case

        	$data = array(
        		'company_name' => $this->input->post('company_name'),
        		'service_charge_value' => $this->input->post('service_charge_value'),
        		'vat_charge_value' => $this->input->post('vat_charge_value'),
        		'address' => $this->input->post('address'),
        		'phone' => $this->input->post('phone'),
        		'country' => $this->input->post('country'),
        		'message' => $this->input->post('message'),
                'currency' => $this->input->post('currency')
        	);



        	$update = $this->model_company->update($data, 1);
        	if($update == true) {
        		$this->session->set_flashdata('success', 'Successfully created');
        		redirect('company/', 'refresh');
        	}
        	else {
        		$this->session->set_flashdata('errors', 'Error occurred!!');
        		redirect('company/index', 'refresh');
        	}
        }
        else {

            // false case
            
            
            $this->data['currency_symbols'] = $this->currency();
        	$this->data['company_data'] = $this->model_company->getCompanyData(1);
			$this->render_template('company/index', $this->data);			
        }	

		
	}
	
	public function about()
	{
        if(!in_array('viewAbout', $this->permission)) {
            redirect('dashboard', 'refresh');
        }
	    $this->render_template('company/about',$this->data);
	}
	
	public function fetchaboutData()
	{
	    $result = array('data' => array());
	    $data = $this->model_company->getabout();
	    $i =1;
        $buttons = '';
		foreach ($data as $key => $value) {
            $aboutdata = $this->model_company->getaboutdata($value->id);
            $subject="";
            for($j=0;$j<count($aboutdata);$j++)
            {
                $subject= $subject."<h3>".$aboutdata[$j]->subject.'</h3>'.$aboutdata[$j]->content;
            }
			$availability = ($value->status == 1) ? '<button type="button" onclick="changeStatus('.$value->status.','.$value->id.')" class="btn btn-success">Active</button>' : '<button type="button" onclick="changeStatus('.$value->status.','.$value->id.')" class="btn btn-warning">Inctive</button>';
            if ($value->image=='') {
                $image ="No Image selected";
            }else{
    			$image = "<img class='img-circle' height='50' width='50' src='".base_url($value->image)."'>";
            }
// 			$buttons .= '<a href="'.base_url('company/updateabou/'.$value->id).'" class="btn btn-default"><i class="fa fa-pencil"></i></a>';
            if (in_array('deleteAbout', $this->permission)) {
                $buttons = ' <button type="button" class="btn btn-default" onclick="removeFunc('.$value->id.')" data-toggle="modal" data-target="#removeModal"><i class="fa fa-trash"></i></button>';
            }
			
			$result['data'][$key] = array(
				$i,
				$image,
				$value->header,
                $subject,
				$availability,
				$value->date,
				$buttons
			);
		$i++; }
		
		
		echo json_encode($result);
	}
	
	public function createabout()
	{
        if(in_array('createAbout', $this->permission)) {
            
            $data = array(
                'header' => $this->input->post('header'),
            );
            $result = $this->model_company->create_about($data);
            $upload_image = $this->upload_image('about',$result);
            $image = array('image'=>$upload_image);
            $this->model_company->update_about($image,$result);
            $content = $this->input->post('content');
            $subject = $this->input->post('subject');
            for($i=0;$i<count($content);$i++)
            {
                $array = array('about_id' => $result,'subject'=>$subject[$i],'content'=>$content[$i] );
                $this->model_company->addaboutdata($array);
            }
            if($result == '') 
            {
                $array = array('success'=>false,'messages'=>"en error to create about");
            }
            else {
                $array = array('success'=>true,'messages'=>"company about successfully added");
            }
        }else{
            $array = array('success'=>false,'messages'=>"en error to create about");
        }
    	echo json_encode($array);
	}
	
	public function upload_image($types,$id)
    {
    	// assets/images/product_image
    	if($types=='about')
        {
            $config['upload_path'] = 'assets/images/about_image';
            $config['file_name'] =  $id;
            $config['allowed_types'] = 'gif|jpg|png';
            $config['max_size'] = '1000';
        }else{
            $config['upload_path'] = 'assets/images/banners';
            $config['file_name'] =  $id;
            $config['allowed_types'] = 'gif|jpg|png';
            $config['max_size'] = '1000';
        }

        // $config['max_width']  = '1024';s
        // $config['max_height']  = '768';

        $this->load->library('upload', $config);
        if ( ! $this->upload->do_upload('About_image'))
        {
            $error = "";
            return $error;
        }
        else
        {
                $data = array('upload_data' => $this->upload->data());
                $type = explode('.', $_FILES['About_image']['name']);
                $type = $type[count($type) - 1];
                
                $path = $config['upload_path'].'/'.$id.'.'.$type;
                return ($data == true) ? $path : false;
                
        }
    }
    
    public function deleteAbout()
    {
        if(!in_array('deleteAbout', $this->permission)) {
            redirect('dashboard', 'refresh');
        }

        $id = $this->input->get('aboutid');
        $result = $this->model_company->deleteAbout($id);
        $this->model_company->deleteAboutdata($id);
        if($result)
        {
	        $array = array('success'=>true,'messages'=>"company about successfully deleted");
    	}
    	else {
    		$array = array('success'=>false,'messages'=>"en error genrate to deleted data");
    	}
    	echo json_encode($array);
    }
    
    public function updateAbout()
    {
        if(!in_array('updateAbout', $this->permission)) {
            redirect('dashboard', 'refresh');
        }
        if($this->input->get('status')=='0')
        {
            $status = '1';
            $this->model_company->update_status(array('status'=>'0'));
        }else{
            $status = '0';
        }
        $array = array('status'=>$status);
        
        $this->model_company->update_about($array,$this->input->get('aboutid'));
       
	        $array = array('success'=>true,'messages'=>"company about successfully updated");
    	echo json_encode($array);
    }
    
    public function banner()
    {
        if(!in_array('viewBanner', $this->permission)) {
            redirect('dashboard', 'refresh');
        }
        $this->data['valpos'] = $this->model_company->countBanner();
        $this->render_template('company/bannerdata',$this->data);
    }
    
    public function fetchbannerData()
    {
        $result = array('data' => array());
	    $data = $this->model_company->getbanner();
	    $i =1;
        $buttons="";
		foreach ($data as $key => $value) {
			$availability = ($value->status == 1) ? '<span class="label label-success">Active</span>' : '<span class="label label-warning">Inactive</span>';
			$image = "<img class='img-circle' height='50' width='50' src='".base_url($value->image)."'>";
            if (in_array('updateBanner', $this->permission)) {
                $buttons = '<button type="button" class="btn btn-default" onclick="editFunc('.$value->id.')" data-toggle="modal" data-target="#editModal"><i class="fa fa-pencil-square-o"></i></button>';
            }
            if (in_array('deleteBanner', $this->permission)) {
                $buttons .= ' <button type="button" class="btn btn-default" onclick="removeFunc('.$value->id.')" data-toggle="modal" data-target="#removeModal"><i class="fa fa-trash"></i></button>';
            }
			
			$result['data'][$key] = array(
				$i,
				$image,
				$value->title,
				$value->position,
				$availability,
				$value->date,
				$buttons
			);
		$i++; }
		
		
		echo json_encode($result);
    }
    
    public function createbanner()
    {
        if(!in_array('createBanner', $this->permission)) {
            redirect('dashboard', 'refresh');
        }
        $data = array(
    		'title' => $this->input->post('title'),
    		'position' => $this->input->post('position'),
    	);
    	$result = $this->model_company->creat_banner($data);
    	$upload_image = $this->upload_image('banner',$result);
    	$image = array('image'=>$upload_image);
    	$this->model_company->update_banner($image,$result);
    	if($result == '') {
    	    $this->session->set_flashdata('errors', 'Error occurred!!');
        		redirect('company/banner', 'refresh');
        	}
        	else {
        		$this->session->set_flashdata('success', 'Successfully created');
        		redirect('company/banner', 'refresh');
        	}
    }
    
    public function deletebanner()
    {
        if(!in_array('deleteBanner', $this->permission)) {
            redirect('dashboard', 'refresh');
        }
        $id = $this->input->get('store_id');
        $result = $this->model_company->bannerdel($id);
        if($result==true)
        {
            $array = array('success'=>true,'massage'=>'successfully deleted');
        }else
        {
            $array = array('success'=>false,'massage'=>'Error on deletion');
        }
        echo json_encode($array);
    }
    
    public function fetchbannerDataById($id)
    {
        $result = $this->model_company->getBannerdata($id);
        echo json_encode($result);
    }
    
    public function terms()
    {
        if(!in_array('viewTerms', $this->permission)) {
            redirect('dashboard', 'refresh');
        }
        $this->render_template('company/terms',$this->data);
    }
    
    public function fetchtermsData()
    {
        $result = array('data' => array());
	    $data = $this->model_company->getterms();
	    $i =1;
        $buttons = "";
		foreach ($data as $key => $value) {
            $aboutdata = $this->model_company->getTermsdata($value->id);
            $subject="";
            for($j=0;$j<count($aboutdata);$j++)
            {
                $subject= $subject."<h3>".$aboutdata[$j]->subject.'</h3>'.$aboutdata[$j]->content;
            }
			$availability = ($value->status == 1) ? '<button type="button" onclick="changeStatus('.$value->status.','.$value->id.')" class="btn btn-success">Active</button>' : '<button type="button" onclick="changeStatus('.$value->status.','.$value->id.')" class="btn btn-warning">Inctive</button>';
// 			$image = "<img class='img-circle' height='50' width='50' src='".base_url($value->image)."'>";
// 			$buttons = '<button type="button" class="btn btn-default" onclick="editFunc('.$value->id.')" data-toggle="modal" data-target="#editModal"><i class="fa fa-pencil-square-o"></i></button>';
            if (in_array('deleteTerms', $this->permission)) {
                $buttons = ' <button type="button" class="btn btn-default" onclick="removeFunc('.$value->id.')" data-toggle="modal" data-target="#removeModal"><i class="fa fa-trash"></i></button>';
            }
			
			$result['data'][$key] = array(
				$i,
				// $image,
				$value->title,
				// $value->position,
				$subject,
				$availability,
				$value->date,
				$buttons
			);
		$i++; }
		
		
		echo json_encode($result);
    }
    
    public function createterms()
    {
        if(!in_array('createTerms', $this->permission)) {
            redirect('dashboard', 'refresh');
        }
        $data = array('title'=>$this->input->post('title'));
        $result = $this->model_company->insert_terms($data);
        $content = $this->input->post('termcontent');
        $subject = $this->input->post('termsubject');
        for($i=0;$i<count($content);$i++)
        {
            $array = array('terms_id' => $result,'subject'=>$subject[$i],'content'=>$content[$i] );
            $this->model_company->addtermsdata($array);
        }
        if($result!='')
        {
            $array = array('success'=>true,'massage'=>'successfully created');
        }else
        {
            $array = array('success'=>false,'massage'=>'Error on creation');
        }
        echo json_encode($array);
    }
    
    public function deleteterms()
    {
        if(!in_array('deleteTerms', $this->permission)) {
            redirect('dashboard', 'refresh');
        }
        $result = $this->model_company->deleterms($this->input->get('termsid'));
        $this->model_company->deletermsdata($this->input->get('termsid'));
        if($result==true)
        {
            $array = array('success'=>true,'massage'=>'successfully deleted');
        }else
        {
            $array = array('success'=>false,'massage'=>'Error on deletion');
        }
        echo json_encode($array);
    }
    
    public function changetermsstatus()
    {
        if(!in_array('updateTerms', $this->permission)) {
            redirect('dashboard', 'refresh');
        }
        if($this->input->get('status')=='0')
        {
            $status = '1';
            $this->model_company->updateterms_status(array('status'=>'0'));
        }else{
            $status = '0';
        }
        $array = array('status'=>$status);
        
        $result = $this->model_company->update_terms($array,$this->input->get('termsid'));
       if($result==true)
        {
            $array = array('success'=>true,'massage'=>'successfully deleted');
        }else
        {
            $array = array('success'=>false,'massage'=>'Error on deletion');
        }
        echo json_encode($array);
    }

}