<?php
defined('BASEPATH') or exit('No direct script access allowed');
require_once 'BaseCRUDController.php';
class Sopir extends BaseCRUDController
{
    protected function validation()
    {
		$this->form_validation->set_rules('nama_sopir', 'Nama Sopir', 'required|max_length[100]');
		$this->form_validation->set_rules('no_telp', 'Nomor Telepon', 'required|max_length[15]');
    }
}
