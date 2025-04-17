<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class TagihanModel extends CI_Model {


	public function __construct()
	{
		parent::__construct();
		
	}
	public function getTagihan()
	{
		$this->db->select('*')->from('tagihan');
		$this->db->join('reservasi', 'reservasi.id = tagihan.reservasi_id', 'inner');
		$this->db->order_by('reservasi.dob', 'asc');
		$data  = $this->db->get();
		return $data->result();
	}
	public function getTagihanAgent()
	{
		$this->db->select('*')->from('tagihan');
		$this->db->join('reservasi', 'reservasi.id = tagihan.reservasi_id', 'inner')->where( 'reservasi.created_by',$this->session->userdata('id'));
		$data  = $this->db->get();
		return $data->result();
	}

	public function updateStatus($id)
	{ 

		$this->db->where('id', $id);
		return $this->db->update('tagihan', ['status' => $_POST["status"]]);
	}

	public function getAllForInvoice($id)
	{
		$program_id = $this->db->select('program_id')->from('reservasi')->where('id',$id)->get()->result();
		$program_id = $program_id[0]->program_id;
		if ($program_id != null) {
			$data = $this->db->query("SELECT reservasi.id,reservasi.guest_name,reservasi.dob,reservasi.program_id,reservasi.tour_code,reservasi.contact,reservasi.bahasa_id,program.nama_program,bahasa.nama_bahasa,tagihan.status,tagihan.total, produk.nama_produk
				FROM `tagihan`
				INNER JOIN reservasi ON tagihan.reservasi_id = reservasi.id 
				INNER JOIN program ON program.id = reservasi.program_id 
				INNER JOIN program_has_produk ON program_has_produk.program_id = program.id
				INNER JOIN produk ON produk.id = program_has_produk.produk_id
				INNER JOIN bahasa on bahasa.id = reservasi.bahasa_id
				WHERE reservasi.id = ".$id)->result();
		}else{
			$data = $this->db->query("SELECT reservasi.id,reservasi.guest_name,reservasi.dob,reservasi.tour_code,reservasi.contact,reservasi.bahasa_id,bahasa.nama_bahasa,tagihan.status,tagihan.total, produk.nama_produk
				FROM `tagihan`
				INNER JOIN reservasi ON tagihan.reservasi_id = reservasi.id 
				INNER JOIN custom_reservasi ON custom_reservasi.reservasi_id = reservasi.id
				INNER JOIN produk ON produk.id = custom_reservasi.produk_id
				INNER JOIN bahasa on bahasa.id = reservasi.bahasa_id
				WHERE reservasi.id = ".$id)->result();
		}
		return $data;
		
	}
	public function getTagihanById($id)
	{
		$query = $this->db->get_where('tagihan', ['id' => '1']);
		return $query->result();
	}

	public function getReservasiById($id)
	{
		$query = $this->db->get_where('reservasi', ['id' => '1']);
		return $query->result();
	}

	public function getProgramById($id)
	{
		$query = $this->db->get_where('program', ['id' => '1']);
		return $query->result();
	}

}

/* End of file Invoice.php */
/* Location: ./application/models/Invoice.php */