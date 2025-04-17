<?php
defined('BASEPATH') or exit('No direct script access allowed');
require_once 'BaseCRUDModel.php';

class ReservasiModel extends BaseCRUDModel
{
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
        ),
        'program_id' => array('table' => 'program', 'form_name' => 'Nama Program', 'enum' => 'nama_program'),
        'guide_id' => array('table' => 'guide', 'form_name' => 'Nama Guide', 'enum' => 'guide_name'),
        'transport_id' => array('table' => 'kendaraan', 'form_name' => 'Nomor Kendaraan', 'enum' => 'nomor_kendaraan'),
        'bahasa_id' => array('table' => 'bahasa', 'form_name' => 'Bahasa', 'enum' => 'nama_bahasa'),
        'sopir_id' => array('table' => 'sopir', 'form_name' => 'Nama Sopir', 'enum' => 'nama_sopir'),
        'created_by' => array('table' => 'user', 'form_name' => 'Created By', 'enum' => 'username'),
        'updated_by' => array('table' => 'user', 'form_name' => 'Updated By', 'enum' => 'username'),
    );
    protected $show_in_table = ['date', 'program_id', "agent"];

    public function getDataProgramHasProduk($id)
    {
        $this->db->select('*')->from('produk');
        $this->db->join('program_has_produk', 'produk.id = program_has_produk.produk_id', 'inner');
        $this->db->where('program_id', $id);
        $data  = $this->db->get();
        return $data->result();
    }

    public function getBahasaPrice($id)
    {
        $this->db->select('harga_bahasa');
        $this->db->where('id', $id);
        $query = $this->db->get('bahasa');

        return $query->result();
    }

    public function getIdReservasi($tc)
    {
        $this->db->select('id');
        $this->db->where('tour_code', $tc);
        $query = $this->db->get('reservasi');

        return $query->result();
    }

    public function create($data)
    {
        return $this->insertData();
    }

    public function update($id, $data)
    {
        // Fetch existing reservation data
        $this->db->where('id', $id);
        $existingData = $this->db->get('reservasi')->row();

        if (!$existingData) {
            return false; // No such reservation exists
        }

        $dataProduk = $this->getDataProgramHasProduk($data['program_id']);
        $hargaProduk = 0;
        foreach ($dataProduk as $d) {
            $hargaProduk += (int)$d->harga;
        }

        $hargaBahasa = $this->getBahasaPrice($data['bahasa_id'])[0]->harga_bahasa;
        $total = (doubleval($data['pax']) * doubleval($hargaProduk)) + doubleval($hargaBahasa);

        if ($this->has_timestamps) {
            $data['updated_at'] = date('Y-m-d H:i:s');
        }
        if ($this->has_edit_by) {
            $data['updated_by'] = $this->session->userdata('id');
        }

        $this->db->where('id', $id);
        $response = $this->db->update('reservasi', $data);

        if ($response) {
            $dataTagihan = array(
                'total' => $total,
                'status' => 'pending',
                'deskripsi' => $data['remarks'],
                'reservasi_id' => $id,
            );

            $this->db->where('reservasi_id', $id);
            $res = $this->db->update('tagihan', $dataTagihan);

            if ($res) {
                $this->session->set_flashdata('notif', $this->sweetalert->toastr_success('Success', 'Update Data Success!'));
            } else {
                $this->session->set_flashdata('notif', $this->sweetalert->toastr_error('Oops!', 'Update Data Failed! Unable to update tagihan data.'));
            }
        } else {
            $this->session->set_flashdata('notif', $this->sweetalert->toastr_error('Oops!', 'Update Data Failed! Unable to update reservasi data.'));
        }

        return $response;
    }

    public function insertData()
    {
        $data = $_POST;
        $deskripsi = $data['remarks'];

        $dataProduk = $this->getDataProgramHasProduk($data['program_id']);

        $hargaProduk = 0;
        foreach ($dataProduk as $d) {
            $hargaProduk+= (int) $d->harga;
        }

        $hargaBahasa = $this->getBahasaPrice($data['bahasa_id'])[0]->harga_bahasa;

        $total = ( doubleval($data['pax']) * doubleval($hargaProduk) ) + doubleval($hargaBahasa);

        if ($this->has_timestamps) {
            $data['created_at'] = date('Y-m-d H:i:s');
            $data['updated_at'] = date('Y-m-d H:i:s');
        }
        if ($this->has_edit_by) {
            $data['created_by'] = $this->session->userdata('id');
            $data['updated_by'] = $this->session->userdata('id');
        }

        $response = $this->db->insert('reservasi',$data);
        if ($response) {

            $id_reservasi =  $this->getIdReservasi($data['tour_code'])[0]->id;
            $dataTagihan = array(
                'total' => $total,
                'status' =>'pending',
                'deskripsi' => $deskripsi,
                'reservasi_id' => $id_reservasi,
            );

            $res =  $this->db->insert('tagihan',$dataTagihan);
            if ($res == true ) {
               $this->session->set_flashdata('notif', $this->sweetalert->toastr_success('Success', 'Add Data Success!'));
           }else{
               $this->session->set_flashdata('notif', $this->sweetalert->toastr_error('Oops!', 'Add Data Failed! Unable to add data to the database.'));
           }
       }else{
          $this->session->set_flashdata('notif', $this->sweetalert->toastr_error('Oops!', 'Add Data Failed! Unable to add data to the database.'));
      }

      return $response;
  }
}


