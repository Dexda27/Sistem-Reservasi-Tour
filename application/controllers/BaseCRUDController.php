<?php
defined('BASEPATH') or exit('No direct script access allowed');

class BaseCRUDController extends CI_Controller
{
    protected $modelName;
    protected $className;
    public function __construct()
    {
        parent::__construct();
        $this->load->library('auth_Library');
        $this->auth_library->must_login();
        $this->className = get_class($this);
        $this->modelName = strtolower($this->className) . 'Model';
        $this->load->model($this->modelName);
		$this->form_validation->set_error_delimiters('<small class="text-danger">', '</small>');
    }
    public function index()
    {
        $data['data'] = $this->{$this->modelName}->get_all();
        $data['fields'] = $this->{$this->modelName}->get_current_table_column();
        $data['title'] = "Senang Tours & Travel";
        $data['url'] = $this->className;
        $data['table'] = 'partials/crud_table';
        $data['form'] = 'partials/crud_form';
        $data['show'] = $this->{$this->modelName}->get_show_in_table();

        $this->load->view('partials/head', $data);
        $this->load->view('partials/side', $data);
        $this->load->view('partials/nav');
        $this->load->view('crud', $data);
        $this->load->view('partials/copyright');
        $this->load->view('partials/footer');
    }

    protected function get_form()
    {
        $data = array();
        foreach ($this->{$this->modelName}->get_current_table_column() as $key) {
            if ($key['Key'] == 'PRI') {
                continue;
            }
            if ($key['Field'] == 'created_at' || $key['Field'] == 'updated_at') {
                continue;
            }
            if ($key['Field'] == 'created_by' || $key['Field'] == 'updated_by') {
                continue;
            }
            $data[$key['Field']] = $this->input->post($key['Field']);
        }
        return $data;
    }


    public function create()
    {
        $this->validation();
        $data = $this->get_form();

        if ($this->form_validation->run() === FALSE) {
            $this->session->set_flashdata('notif', $this->sweetalert->toastr_error('Oops!', 'Please fill in the form correctly'));
            $this->index();
        } else {
            $response = $this->{$this->modelName}->create($data);
            if ($response == true) {
                $this->session->set_flashdata('notif', $this->sweetalert->toastr_success('Success', 'Add Data Success!'));
                $this->index();
            } else {
                $this->session->set_flashdata('notif', $this->sweetalert->toastr_error('Oops!', 'Add Data Failed! Unable to add data to the database.'));
                $this->index();
            }
        }
    }

    public function get_data($id)
    {
        header('Content-Type: application/json');
        echo json_encode($this->{$this->modelName}->get_by_id($id));
    }

    protected function validation()
    {
    }

    public function edit($id)
    {
        $this->validation();

        if ($this->form_validation->run() === FALSE) {
            $error = $this->form_validation->error_array();
            $message = '';
            for ($i = 0; $i < count($error); $i++) {
                $message .= $error[array_keys($error)[$i]] . '<br>';
            }
            $this->session->set_flashdata('notif', $this->sweetalert->toastr_error('Oops!', $message));
            redirect($this->className);
        } else {
            $data = $this->get_form();
            $response = $this->{$this->modelName}->update($id, $data);
            if ($response == true) {
                $this->session->set_flashdata('notif', $this->sweetalert->toastr_success('Success', "Edit Data Success!"));
                redirect($this->className);
            } else {
                $this->session->set_flashdata('notif', $this->sweetalert->toastr_error('Oops!', "Edit Data Failed!"));
                redirect($this->className);
            }
        }
    }

    public function delete($id)
    {
        $response = $this->{$this->modelName}->delete($id);
        if ($response == true) {
            $this->session->set_flashdata('notif', $this->sweetalert->toastr_success('Success', 'Delete Data Success!'));
            redirect($this->className);
        } else {
            $this->session->set_flashdata('notif', $this->sweetalert->toastr_error('Oops!', 'Delete Data Failed!'));
            redirect($this->className);
        }
    }
}
