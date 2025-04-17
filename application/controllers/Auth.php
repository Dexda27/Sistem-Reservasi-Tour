<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Auth extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('userModel');
        $this->load->model('AuthModel');
        $this->load->model('ChangePassModel');
    }
    public function login()
    {
        if ($this->session->userdata("logged_in")) {
            redirect("Dashboard/");
        }
        $this->form_validation->set_rules('username', 'Username', 'trim|required');
        $this->form_validation->set_rules('password', 'Password', 'trim|required');
        $data['title'] = "Login - Senang Tours & Travel";


        if ($this->form_validation->run() === false) {
            $this->session->set_flashdata('error', validation_errors());
            $this->load->view('partials/head',$data);
            $this->load->view("login", $data);
            $this->load->view('partials/footer');
        } else {
            $username = $this->input->post("username");
            $password = $this->input->post("password");

            $login_success = $this->userModel->login($username, $password);
            $this->session->set_flashdata('yoo', $login_success);

            if (!$login_success) {
                $this->session->set_flashdata('loginNotif', $this->sweetalert->toastr_error('Oops!', 'Invalid username or password'));
                redirect('/login');
            }

            $user_data = array(
                'id' => $login_success['id'],
                'username' => $username,
                'role_id' => $login_success['role_id'],
                'logged_in' => true
            );
            $this->session->set_userdata($user_data);
            $this->session->set_flashdata('loginNotif',$this->sweetalert->toastr_success('Success!', 'Login successfull!'));

            if (isset($_GET['r'])){
                redirect("/"+$_GET['r']);
                return;
            }else{
                redirect("/dashboard");
            }
        }
    }

    public function logout() {
        $this->session->unset_userdata(['username', 'logged_in']);
        $this->session->sess_destroy();
        redirect(base_url('/login'), 'refresh');
    }

    // forgot pass
    public function ForgotPassword($url = null)
    {
        if ($url != null) {
            $data['url'] = $url;
        }else{ 
            $data['url'] = 'Forgot_Password';
            $this->session->sess_destroy();
        }
        
        $data['title'] = "Lupa Password";
        $this->load->view('partials/head',$data); 
        $this->load->view('ForgotPass',$data); 
        $this->load->view('partials/footer');
    }
    public function getEmail()
    { 
        $this->form_validation->set_rules('email', 'Email', 'required|trim|valid_email');
        if ($this->form_validation->run() == false) {  
            $this->ForgotPassword();
        }else{
            $this->AuthModel->getEmail(); 
        }
    }

    public function Cek_kode()
    {  
        $this->AuthModel->Cek_kode();
    }

    public function UbahPassword()
    {  
        $this->form_validation->set_rules('password', 'Password', 'required|trim|min_length[8]');
        $this->form_validation->set_rules('confirm-password', 'Password', 'required|trim|matches[password]');
        if ($this->form_validation->run() == false) {  
            $this->ForgotPassword('Password');
        }else{
            $this->ChangePassModel->UbahPassword();
        }
    }

}
