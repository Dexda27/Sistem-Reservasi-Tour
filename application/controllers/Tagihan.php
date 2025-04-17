<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Tagihan extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('TagihanModel');
        $this->load->library('auth_Library');
        $this->auth_library->must_login();
    }

    public function index()
    {
        $data['title'] = "Senang Tours & Travel";
        $data['url'] = "Tagihan";
        if ($this->session->userdata('role_id') == 2) {
            $data['tagihans'] = $this->TagihanModel->getTagihanAgent();
        }else{
            $data['tagihans'] = $this->TagihanModel->getTagihan();
        }

        $this->load->view('partials/head',$data);
        $this->load->view('partials/side',$data);
        $this->load->view('partials/nav');
        $this->load->view('tagihan',$data);
        $this->load->view('partials/copyright');
        $this->load->view('partials/footer');
    }
    public function invoice($id)
    {
        $data['title'] = "Invoice Voucher";
        $data['reservasi'] = $this->TagihanModel->getAllForInvoice($id);

        $this->load->view('partials/head',$data);
        $this->load->view('invoice',$data);
        $this->load->view('partials/footer');
    }
    public function updateStatus($id)
    {
        $response = $this->TagihanModel->updateStatus($id);
        if ($response == true) {
         $this->session->set_flashdata('notif', $this->sweetalert->toastr_success('Success', 'Add Data Success!'));
     }else{
         $this->session->set_flashdata('notif', $this->sweetalert->toastr_error('Oops!', 'Add Data Failed! Unable to add data to the database.'));
     }
     redirect('Tagihan/');

 }
}
