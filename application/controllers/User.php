<?php
defined('BASEPATH') or exit('No direct script access allowed');

class User extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('userModel');
        $this->load->library('auth_Library');
        $this->auth_library->must_login();
    }

    public function index()
    {
        $data['users'] = $this->userModel->get_all_users();
        $data['title'] = "Senang Tours & Travel";
        $data['url'] = "User";
        $this->load->view('partials/head',$data);
        $this->load->view('partials/side',$data);
        $this->load->view('partials/nav');
        $this->load->view('user', $data);
        $this->load->view('partials/copyright');
        $this->load->view('partials/footer');
    }

    public function create() {
        $this->load->helper('form');
        $this->load->library('form_validation');

        $this->form_validation->set_rules('nama', 'Nama', 'required');
        $this->form_validation->set_rules('role', 'role', 'required');
        $this->form_validation->set_rules('username', 'Username', 'required|is_unique[user.username]');
        $this->form_validation->set_rules('email', 'Email', 'required|is_unique[user.email]|valid_email');

        if ($this->form_validation->run() === FALSE) {
            $this->session->set_flashdata('notif', $this->sweetalert->toastr_error('Oops!', "Add Data Failed!"));
            redirect('User');
        } else {
            $data = array(
                'nama' => $this->input->post('nama'),
                'username' => $this->input->post('username'),
                'password' => $this->userModel->buatpwd(),
                'email' => $this->input->post('email'),
                'role_id' => $this->input->post('role')
            );

            $response = $this->userModel->create_user($data);
            if ($response) {
                $this->session->set_flashdata('notif', $this->sweetalert->toastr_success('Success', "Add Data Success!"));
                redirect('User');
            }else{
                $this->session->set_flashdata('notif', $this->sweetalert->toastr_error('Oops!', "Add Data Failed!"));
                redirect('User');
            }
        }
    }

    // public function edit($id) {
    //     $this->load->helper('form');
    //     $this->load->library('form_validation');

        // $this->form_validation->set_rules('name', 'Name', 'required');
        // $this->form_validation->set_rules('username', 'Username', 'required');
        // $this->form_validation->set_rules('email', 'Email', 'required');

        // if ($this->form_validation->run() === FALSE) {
        //     $data['users'] = $this->userModel->get_all_users();
        //     $data['title'] = "Senang Tours & Travel";
        //     $data['url'] = "User";
        //     $this->load->view('partials/head',$data);
        //     $this->load->view('partials/side',$data);
        //     $this->load->view('partials/nav');
        //     $this->load->view('user', $data);
        //     $this->load->view('partials/copyright');
        //     $this->load->view('partials/footer');
        // } else {
        //     $data = array(
        //         'name' => $this->input->post('name'),
        //         'username' => $this->input->post('username'),
        //         'email' => $this->input->post('email')
        //     );

    //         $this->userModel->update_user($id, $data);
    //         redirect('User');
    //     }
    // }

    public function delete($id) {
        $response = $this->userModel->delete_user($id);
        if ($response == true) {
            $this->session->set_flashdata('notif', $this->sweetalert->toastr_success('Success', "Delete Data Success!"));
            redirect('User');
        }else{
            $this->session->set_flashdata('notif', $this->sweetalert->toastr_success('Oops!', "Delete Data Failed!"));
            redirect('User');
        }
    }

    public function get_data($id)
    {
        echo json_encode($this->userModel->get_user_by_id($id));
    }

    public function editUser($id) {
        $this->load->helper('form');
        $this->load->library('form_validation');

        $this->form_validation->set_rules('nama', 'Nama', 'required');
        $this->form_validation->set_rules('username', 'Username', 'required');
        $this->form_validation->set_rules('email', 'Email', 'required');
        $this->form_validation->set_rules('role', 'Role', 'required');

        if ($this->form_validation->run() === FALSE) {
            // $this->load->view('User');
			$this->session->set_flashdata('notif', $this->sweetalert->toastr_error('Oops!', "Add Data Failed!"));
            redirect('User');
        } else {
            $data = array(
                'nama' => $this->input->post('nama'),
                'username' => $this->input->post('username'),
                'email' => $this->input->post('email'),
                'role_id' => $this->input->post('role')
            );

            $response = $this->userModel->update_user($id,$data);
            if ($response == true) {
                $this->session->set_flashdata('notif', $this->sweetalert->toastr_success('Success', "Edit Data Success!"));
                redirect('User');
            }else{
                $this->session->set_flashdata('notif', $this->sweetalert->toastr_error('Oops!', "Edit Data Failed!"));
                redirect('User');
            }
        }
    }
}
