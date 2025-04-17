<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class ChangePassword extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('ChangePassModel');
	}

	public function index()
	{ 
		$data['title'] = "Senang Tours & Travel";
		$data['url'] = "Change Password";
		$this->load->view('partials/head',$data);
		$this->load->view('partials/side',$data);
		$this->load->view('partials/nav');
		$this->load->view('changePass', $data);
		$this->load->view('partials/copyright');
		$this->load->view('partials/footer');
	}
	public function getAcc()
	{
		$id = $this->session->userdata('id');
		$this->ChangePassModel->getAcc($id);
	}

	public function update()
	{ 

		$id = $this->session->userdata('id');
		$this->form_validation->set_rules('pass', 'Password', 'required|trim|min_length[8]'); 

		if ($this->form_validation->run() != false) {  
			$this->ChangePassModel->updateAcc($id);
		}else{
			$this->session->set_flashdata('error_validation',validation_errors());
			redirect('ChangePassword/', 'refresh');
		} 
	}



}

/* End of file ChangePassword.php */
/* Location: ./application/controllers/ChangePassword.php */