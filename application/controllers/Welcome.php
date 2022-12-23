<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Welcome extends CI_Controller {

	public function __construct(){
		parent::__construct();
		$this->load->model('ProjectModel','PM');
	}
	
	public function index()
	{
		$this->load->view('registerform');
	}

	public function save(){
		$input = $this->input->post();
		unset($input['repassword']);
		//Password encrypted here...
		$input['password'] = md5($input['password']);
		$chk_email_username = $this->PM->select_with_where('registration','*',array('email'=>$input['email'],'username'=>$input['username']));
		if (count($_FILES['image']['name']) > 5) {
			$this->session->set_flashdata('five','Not upload more than 5 image');
			redirect(base_url('Welcome'));
		}else{
			$image = array();
		if (empty($chk_email_username)) {
			for ($i=0; $i <count($_FILES['image']['name']); $i++) { 
				
				$tmpFilePath = $_FILES['image']['tmp_name'][$i];
				$image_file_type = pathinfo($_FILES["image"]["name"][$i],PATHINFO_EXTENSION);
				$newFilePath = 'upload/'.time().rand('0000','9999').'.'.$image_file_type;
				if(move_uploaded_file($tmpFilePath, $newFilePath)) {
					$image[] = $newFilePath;
				}
			}
	
			$tmpFilePath = $_FILES['pdf']['tmp_name'];
            $image_file_type = pathinfo($_FILES["pdf"]["name"],PATHINFO_EXTENSION);
            $newFilePath = 'upload/'.time().'.'.$image_file_type;
            if(move_uploaded_file($tmpFilePath, $newFilePath)) {
                $input['pdf'] = $newFilePath;
            }
					
			$input['image'] = implode(',',$image);
			$this->PM->insert('registration',$input);
			$id = $this->db->insert_id();
			$this->session->set_flashdata('success','Successfully Register');
			
			redirect(base_url('Welcome/pdf/'.$id));
		}else{
			$this->session->set_flashdata('exist','Username or Email Aleready Exist');
			redirect(base_url('Welcome'));
		}
	}
	
	}

	public function pdf(){
		$this->load->view('pdf');
	}

	public function download($id){
		$data['data']= $this->PM->select_with_where('registration','*',array('id'=>$id));
		$this->load->view('download',$data);
		$html = $this->output->get_output();  
		$this->load->library('pdf');
		$this->pdf->load_view($html);
		
	}

	
}
