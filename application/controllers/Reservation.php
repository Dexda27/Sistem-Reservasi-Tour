<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Reservation extends CI_Controller
{

	public function __construct()
	{
		parent::__construct();
		$this->load->model('TestModel');
		$this->load->library('auth_Library');
		$this->auth_library->must_login();
	}

	public function get_reservation()
	{
		echo json_encode($this->db->query("SELECT tour_code as title,dob as start, reservasi.* FROM reservasi")->result_array());
	}
	public function Program()
	{
		$data['produks'] = $this->TestModel->getProduk();
		$data['title'] = "Senang Tours & Travel";
		$data['url'] = "Program_Rerevasi";

		$this->load->view('partials/head', $data);
		$this->load->view('partials/side', $data);
		$this->load->view('partials/nav');
		$this->load->view('Test/Program', $data);
		$this->load->view('partials/copyright');
		$this->load->view('partials/footer');
	}

	public function Custom($id = null)
	{
		$this->session->unset_userdata("customReservasi");
		$data['produks'] = $this->TestModel->getProduk();
		$data['title'] = "Senang Tours & Travel";
		$data['url'] = "Custom_Rerevasi";

		$this->load->view('partials/head', $data);
		$this->load->view('partials/side', $data);
		$this->load->view('partials/nav');
		$this->load->view('Test/Custom', $data);
		$this->load->view('partials/copyright');
		$this->load->view('partials/footer');
	}

	public function Paket($id = null)
	{
		$data['programs'] = $this->TestModel->getDataProgramHasProduk();
		$data['bahasa'] = $this->TestModel->getBahasa();
		$data['title'] = "Senang Tours & Travel";
		$data['url'] = "Paket_Rerevasi";
		$data['id'] = $id;

		$this->load->view('partials/head', $data);
		$this->load->view('partials/side', $data);
		$this->load->view('partials/nav');
		$this->load->view('Test/Paket', $data);
		$this->load->view('partials/copyright');
		$this->load->view('partials/footer');
	}
	// Paket Reservasi
	public function saveProgram()
	{
		redirect('Reservation/FormReservasi/' . $_POST['customRadioTemp']);
	}

	public function createReservasi()
	{
		$res = $this->TestModel->createReservasi();
		if ($res == true) {
			$this->session->set_flashdata('notif', $this->sweetalert->toastr_success('Success', 'Add Data Success!'));
		} else {
			$this->session->set_flashdata('notif', $this->sweetalert->toastr_error('Oops!', 'Add Data Failed! Unable to add data to the database.'));
		}
		redirect('Reservation/Paket/');
	}
	public function searchProgram()
	{
		$searchTerm = $this->input->post('search'); 
		$result = $this->TestModel->searchProgram($searchTerm);
		echo json_encode($result);
	}

	// Paket Reservasi


	// Program
	public function createProgram()
	{
		$res = $this->TestModel->createProgram();
		if ($res == true) {
			$this->session->set_flashdata('notif', $this->sweetalert->toastr_success('Success', 'Add Data Success!'));
		} else {
			$this->session->set_flashdata('notif', $this->sweetalert->toastr_error('Oops!', 'Add Data Failed! Unable to add data to the database.'));
		}
		redirect('Reservation/Program');
	}
	public function searchProduk()
	{
		$searchTerm = $this->input->post('search');
		$result = $this->TestModel->searchProduk($searchTerm);
		echo json_encode($result);
	}


	// Program

	// Custom Reservasi
	public function saveCustomReservasi()
	{
		$this->session->set_userdata("customReservasi", $_POST);
		redirect('Reservation/FormReservasi/', 'refresh');
	}
	public function searchProdukForCustomReservasi()
	{
		$searchTerm = $this->input->post('search');
		$result = $this->TestModel->searchProduk($searchTerm);
		echo json_encode($result);
	}

	// Custom Reservasi
	public function FormReservasi($id = null)
	{
		$data['title'] = "Senang Tours & Travel";
		$data['url'] = "Paket Rerevasi";
		$data['id'] = $id;
		$data['bahasa'] = $this->TestModel->getBahasa();

		$this->load->view('partials/head', $data);
		$this->load->view('partials/side', $data);
		$this->load->view('partials/nav');
		$this->load->view('Test/form', $data);
		$this->load->view('partials/copyright');
		$this->load->view('partials/footer');
	}
	public function updateReservasi($id)
	{
		$response = $this->TestModel->updateReservasi($id);
		if ($response == true) {
			$this->session->set_flashdata('loginNotif', $this->sweetalert->toastr_success('Success', 'Update Success!')); 
		} else {
			$this->session->set_flashdata('loginNotif', $this->sweetalert->toastr_error('Oops!', 'Update Failed! Unable to add data to the database.')); 
		}
		redirect('Dashboard/');
	}
}

/* End of file Test.php */
/* Location: ./application/controllers/Test.php */
