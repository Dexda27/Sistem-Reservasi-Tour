<?php
defined('BASEPATH') or exit('No direct script access allowed');
require_once 'BaseCRUDController.php';
class Kendaraan extends BaseCRUDController
{
    protected function validation(){
		$this->form_validation->set_rules('nomor_kendaraan', 'Nomor Kendaraan', 'required|max_length[10]');
		$this->form_validation->set_rules('jenis_kendaraan', 'Jenis Kendaraan', 'required|max_length[100]');
		$this->form_validation->set_rules('kapasitas', 'Kapasitas', 'required|integer');
    }
}
