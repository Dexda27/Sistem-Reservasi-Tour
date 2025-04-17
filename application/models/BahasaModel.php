<?php
defined('BASEPATH') OR exit('id_bahasa direct script access allowed');
require_once 'BaseCRUDModel.php';
class BahasaModel extends BaseCRUDModel {
    protected $has_timestamps = true;
    protected $has_edit_by = true;
    protected $foreign_keys = array(
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
    protected $show_in_table = ['nama_bahasa', 'harga_bahasa'];
}
