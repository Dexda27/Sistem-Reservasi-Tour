<?php
defined('BASEPATH') or exit('No direct script access allowed');
require_once 'BaseCRUDController.php';
class Guide extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
        $this->load->library('auth_Library');
        $this->auth_library->must_login();
		$this->load->model('bahasaModel');
		$this->load->model('guideModel');
		$this->load->model('guideHasBahasaModel');
	}

	public function index()
    {
        $data['title'] = "Senang Tours & Travel";
        $data['url'] = self::class;
        $data['form'] = 'partials/guide_form';
        $data['table'] = 'partials/guide_table';
        $data['bahasas'] = $this->bahasaModel->get_all();

        $this->load->view('partials/head', $data);
        $this->load->view('partials/side', $data);
        $this->load->view('partials/nav');
        $this->load->view('crud', $data);
        $this->load->view('partials/copyright');
        $this->load->view('partials/footer');
    }

	public function create()
	{
		$this->validation();

		if ($this->form_validation->run() === FALSE) {
			$this->session->set_flashdata('notif', $this->sweetalert->toastr_error('Oops!', 'Please fill in the form correctly'));
			$this->index();
		} else {
			$bahasa_ids = $this->input->post('bahasa');
			$guide_data = [
				'guide_name' => $this->input->post('nama_guide'),
				'no_telp' => $this->input->post('no_telp'),
			];

			$success = $this->guideHasBahasaModel->create_guide_with_bahasa($guide_data, $bahasa_ids);

			if ($success) {
				$this->session->set_flashdata('notif', $this->sweetalert->toastr_success('Success', 'Add Data Success!'));
			} else {
				$this->session->set_flashdata('notif',  $this->sweetalert->toastr_error('Oops!','Add Data Failed! Unable to add data to the database.'));
			}

			redirect(self::class);
		}
	}

		public function get_all()
    {
        $data = $this->guideModel->get_all();
        $this->output
                ->set_content_type('application/json')
                ->set_output(json_encode($data));
    }

    public function get_with_details(int $guide_id = null)
    {
        $data = $this->guideHasBahasaModel->get_guide_with_details($guide_id);
        $this->output
                ->set_content_type('application/json')
                ->set_output(json_encode($data));
    }

	public function edit(int $guide_id)
    {
        $this->validation();

        if ($this->form_validation->run() === FALSE) {
			$error = $this->form_validation->error_array();
            $message = '';
            for ($i = 0; $i < count($error); $i++) {
                $message .= $error[array_keys($error)[$i]] . '<br>';
            }
            $this->session->set_flashdata('notif', $this->sweetalert->toastr_error('Oops!', $message));

            redirect(self::class);
        } else {
            $bahasa_ids = $this->input->post('bahasa');
            $guide_data = [
                'guide_name' => $this->input->post('nama_guide'),
                'no_telp' => $this->input->post('no_telp')
            ];

            $success = $this->guideHasBahasaModel->update_guide_with_bahasas($guide_id, $guide_data, $bahasa_ids);

            if ($success) {
                $this->session->set_flashdata('notif', $this->sweetalert->toastr_success('Success', 'Update Data Success!'));
            } else {
                $this->session->set_flashdata('notif',  $this->sweetalert->toastr_error('Oops!','Update Data Failed! Unable to update data to the database.'));
            }

            redirect(self::class);
        }
    }

    public function delete(int $guide_id)
    {
        $success = $this->guideHasBahasaModel->delete_guide_with_bahasas($guide_id);

        if ($success) {
            $this->session->set_flashdata('notif', $this->sweetalert->toastr_success('Success', 'Delete Data Success!'));
        } else {
            $this->session->set_flashdata('notif',  $this->sweetalert->toastr_error('Oops!','Delete Data Failed! Unable to delete data to the database.'));
        }

        redirect(self::class);
    }

	public function validation()
	{
		$this->form_validation->set_error_delimiters('<small class="text-danger">', '</small>');

		$this->form_validation->set_rules('nama_guide', 'Nama Guide', 'required|max_length[100]');
		$this->form_validation->set_rules('no_telp', 'No Telp', 'required|max_length[15]');
		$this->form_validation->set_rules('bahasa[]', 'Bahasa', 'required');
	}

}
