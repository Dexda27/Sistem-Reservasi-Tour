<?php
defined('BASEPATH') or exit('No direct script access allowed');
class Program extends CI_Controller
{

	public function __construct()
	{
		parent::__construct();
        $this->load->library('auth_Library');
        $this->auth_library->must_login();
        $this->load->model('programModel');
        $this->load->model('programHasProdukModel');
        $this->load->model('produkModel');
    }

    public function index()
    {
        $data['title'] = "Senang Tours & Travel";
        $data['url'] = self::class;
        $data['form'] = 'partials/program_form';
        $data['table'] = 'partials/program_table';
        $data['products'] = $this->produkModel->get_all();

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
            $produk_ids = $this->input->post('produk');
            $program_data = [
                'nama_program' => $this->input->post('nama_program'),
                'deskripsi' => $this->input->post('deskripsi'),
                'durasi' => $this->input->post('durasi')
            ];

            $success = $this->programHasProdukModel->create_program_with_produk($program_data, $produk_ids);

            if ($success) {
                $this->session->set_flashdata('notif', $this->sweetalert->toastr_success('Success', 'Add Data Success!'));
            } else {
                $this->session->set_flashdata('notif',  $this->sweetalert->toastr_error('Oops!','Add Data Failed! Unable to add data to the database.'));
            }

            redirect(self::class);
        }
    }

    public function edit(int $program_id)
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
            $produk_ids = $this->input->post('produk');
            $program_data = [
                'nama_program' => $this->input->post('nama_program'),
                'deskripsi' => $this->input->post('deskripsi'),
                'durasi' => $this->input->post('durasi')
            ];

            $success = $this->programHasProdukModel->update_program_with_products($program_id, $program_data, $produk_ids);

            if ($success) {
                $this->session->set_flashdata('notif', $this->sweetalert->toastr_success('Success', 'Update Data Success!'));
            } else {
                $this->session->set_flashdata('notif',  $this->sweetalert->toastr_error('Oops!','Update Data Failed! Unable to update data to the database.'));
            }

            redirect(self::class);
        }
    }

    public function delete(int $program_id)
    {
        $success = $this->programHasProdukModel->delete_program_with_products($program_id);

        if ($success) {
            $this->session->set_flashdata('notif', $this->sweetalert->toastr_success('Success', 'Delete Data Success!'));
        } else {
            $this->session->set_flashdata('notif',  $this->sweetalert->toastr_error('Oops!','Delete Data Failed! Unable to delete data to the database.'));
        }

        redirect(self::class);
    }

    public function get_all()
    {
        $data = $this->programModel->get_all();
        $this->output
                ->set_content_type('application/json')
                ->set_output(json_encode($data));
    }

    public function get_with_details(int $program_id = null)
    {
        $data = $this->programHasProdukModel->get_program_with_details($program_id);
        $this->output
                ->set_content_type('application/json')
                ->set_output(json_encode($data));
    }

    private function validation()
    {
		$this->form_validation->set_error_delimiters('<small class="text-danger">', '</small>');

        $this->form_validation->set_rules('nama_program', 'Nama Program', 'required|max_length[255]');
        $this->form_validation->set_rules('deskripsi', 'Deskripsi', 'required|max_length[65535]');
        $this->form_validation->set_rules('durasi', 'Durasi', 'required|is_natural_no_zero');
        $this->form_validation->set_rules('produk[]', 'Produk', 'required');
    }
}
