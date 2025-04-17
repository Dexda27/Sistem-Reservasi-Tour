<?php
defined('BASEPATH') or exit('No direct script access allowed');

require_once 'BaseCRUDController.php';
class Vendor extends BaseCRUDController
{
    protected function validation(){
		$this->form_validation->set_rules('nama_vendor', 'Nama Vendor', 'required|max_length[255]');
		$this->form_validation->set_rules('contact', 'Contact', 'required|max_length[100]');
		$this->form_validation->set_rules('bank', 'Bank', 'required|max_length[100]');
		$this->form_validation->set_rules('no_rekening', 'Nomor Rekening', 'required|max_length[50]');
		$this->form_validation->set_rules('account_name', 'Account Name', 'required|max_length[100]');
		$this->form_validation->set_rules('validity_period', 'Validity Period', 'required');

    }
}
