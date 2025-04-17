<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class ChangePassModel extends CI_Model {

	public $variable;

	public function __construct()
	{
		parent::__construct();

	}
	public function getAcc($id)
	{
		$this->db->select('*'); 
		$this->db->where('id',$id);
		$data = $this->db->get('user')->row();  

		$username = $this->input->post('username');
		$email = $this->input->post('email');
		if ($username == $data->username && $email == $data->email) {
			echo 'true';
		}else{
			echo 'false';
		}
	}


	public function updateAcc($id)
	{
		$pass = password_hash($this->input->post('pass'), PASSWORD_BCRYPT); 
		$data = array(
			'password' => $pass,
		);

		$this->db->where('id',$id);
		$response = $this->db->update('user', $data);
		// var_dump($response);
		
		if($response){
			$this->session->set_flashdata('notif','<div class="alert alert-success" role="alert">
				Password berhasil diupdate!
				</div>');
		} else {
			$this->session->set_flashdata('notif','<div class="alert alert-danger" role="alert">
				Password gagal diupdate!
				</div>');
		}
		redirect('ChangePassword/');
	}

	public function UbahPassword()
	{
		$pass = password_hash($this->input->post('password'), PASSWORD_BCRYPT); 
		$data = array(
			'password' => $pass,
		);
		$user = $this->db->select('id,email')->from('user')
		->where(['email' => $this->session->userdata('email'), 'id' =>$this->session->userdata('id')])->get(); 

		if ($user->num_rows() >= 1) { 
			$this->db->where('id',$this->session->userdata('id'));
			$response = $this->db->update('user', $data);
		}else{
			redirect('Auth/Login/','refresh');
		} 

		if($response){
			$this->session->set_flashdata('loginNotif','<div class="alert alert-success" role="alert">
				Password berhasil diupdate!
				</div>');
		} else {
			$this->session->set_flashdata('loginNotif','<div class="alert alert-danger" role="alert">
				Password gagal diupdate!
				</div>');
		}

		$this->session->sess_destroy();
		redirect('Auth/Login/','refresh');	
	}

}

/* End of file ChangePassModel.php */
/* Location: ./application/models/ChangePassModel.php */