<?php
require_once 'BaseCRUDModel.php';
class ProdukModel extends BaseCRUDModel
{
    protected $has_timestamps = true;
    protected $has_edit_by = true;
    protected $foreign_keys = array(
        'vendor_id' => array(
            'table' => 'vendor',
            'form_name' => 'Nama Vendor',
            'enum' => 'nama_vendor'
        ),
        'created_by' => array(
            'table' => 'user',
            'form_name' => 'Created By',
            'enum' => 'username'
        ),
        'updated_by' => array(
            'table' => 'user',
            'form_name' => 'Updated By',
            'enum' => 'username'
        )
    );
    protected $show_in_table = ['nama_produk', 'harga', 'area', 'tipe_produk', 'vendor_id'];
}
