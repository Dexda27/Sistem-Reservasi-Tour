<?php
defined('BASEPATH') or exit('No direct script access allowed');
require_once 'BaseCRUDController.php';

class Bahasa extends BaseCRUDController
{
    protected function validation(){
        $this->form_validation->set_rules('nama_bahasa', 'Nama Bahasa', 'required|max_length[50]');
		$this->form_validation->set_rules('harga_bahasa', 'Harga Bahasa', 'required|is_natural');
    }
}
