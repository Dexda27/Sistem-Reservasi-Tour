<?php
defined('BASEPATH') or exit('No direct script access allowed');
require_once 'BaseCRUDController.php';
class Produk extends BaseCRUDController
{
    protected function validation(){
		$this->form_validation->set_rules('nama_produk', 'Nama Produk', 'required|max_length[255]');
		$this->form_validation->set_rules('harga', 'Harga', 'required|numeric');
		$this->form_validation->set_rules('area', 'Area', 'required|max_length[100]');
		$this->form_validation->set_rules('deskripsi', 'Deskripsi', 'required|max_length[65535]');
		$this->form_validation->set_rules('tipe_produk', 'Tipe Produk', 'required|in_list[transport,hotel,restaurant,tourist_attraction,etc]');
		$this->form_validation->set_rules('vendor_id', 'Vendor', 'required|integer');

    }
}
