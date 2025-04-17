<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class TestModel extends CI_Model {


	public function __construct()
	{
		parent::__construct();

	}
	public function getProduk()
	{
		$query = $this->db->get('produk');
		return $query->result();
	}
	public function getDataProgramHasProduk()
	{
		$this->db->select('program.*,
			GROUP_CONCAT(produk.area SEPARATOR ", ") AS area_terkait,
			GROUP_CONCAT(produk.nama_produk SEPARATOR ", ") AS produk_terkait,
			SUM(produk.harga) AS harga_program');
		$this->db->from('program_has_produk');
		$this->db->join('produk', 'produk.id = program_has_produk.produk_id', 'inner');
		$this->db->join('program', 'program.id = program_has_produk.program_id', 'inner');
		$this->db->group_by('program.id, program.nama_program'); // Ensure you include primary key and other non-aggregated columns
		$data = $this->db->get();
		return $data->result();
	}

	public function getDataProgramHasProdukById($id)
	{
		$this->db->select('program.*,GROUP_CONCAT(produk.area SEPARATOR ", ") AS area_terkait,GROUP_CONCAT(produk.nama_produk SEPARATOR ", ") AS produk_terkait, SUM(produk.harga) AS harga_program')->from('program_has_produk');
		$this->db->join('produk', 'produk.id = program_has_produk.produk_id', 'inner');
		$this->db->join('program', 'program.id = program_has_produk.program_id', 'inner');
		$this->db->where('program.id', $id);
		$this->db->group_by('program.nama_program');
		$data  = $this->db->get();
		return $data->result();
	}

	public function createProgram()
	{
		$dataProgram = array(
			'nama_program' => $_POST['nama_program'],
			'deskripsi' => $_POST['deskripsi'],
			'durasi' => $_POST['durasi'],
			'created_by' => $this->session->userdata('id'),
			'updated_by' => $this->session->userdata('id')
		);
		$resProgram = $this->db->insert('program',$dataProgram);

		if ($resProgram == true) {
			$idProgram = $this->db->insert_id();
			$arr = [];
			foreach ($_POST['produks'] as $idProduk) {
				$arr[] = [
					'program_id' => $idProgram,
					'produk_id' => $idProduk
				];
			}
			if (!empty($arr)) {
				$this->db->insert_batch('program_has_produk', $arr);
			}
		}else{
			return false;
		}
		return $this->db->trans_status();
	}
	public function getBahasa()
	{
		return $this->db->get('bahasa')->result();
	}
	public function getPriceProdukById($id)
	{
		$this->db->select('harga');
		$this->db->where('id', $id);
		$query = $this->db->get('produk');

		return $query->result();
	}

	public function getBahasaPrice($id)
	{
		$this->db->select('harga_bahasa');
		$this->db->where('id', $id);
		$query = $this->db->get('bahasa');

		return $query->result();
	}
	public function createReservasi()
	{
		// cek apakah idprogram null
		if ($_POST['id'] == null) {
			$produks = [];
			foreach ($this->session->userdata('customReservasi')['id_produk'] as $k) {
				$produks[] = [
					'id_produk' => $k,
				];
			}
			$total = 0;
			foreach ($produks as $p) {
				$total += $this->getPriceProdukById($p['id_produk'])[0]->harga;
			}
			$data = array(
				'guest_name' => $_POST['name'],
				'contact' => $_POST['contact'],
				'pax' => $_POST['pax'],
				'tour_code' => $_POST['tour_code'],
				'bahasa_id' => $_POST['bahasa'],
				'remarks' => $_POST['remarks'],
				'dob' => $_POST['dob'],
				'date' => $_POST['date'],
				'flight_arrival_code' => $_POST['fac'],
				'eta' => $_POST['eta'],
				'flight_departure_code' => $_POST['fdc'],
				'created_by' => $this->session->userdata('id'),
				'updated_by' => $this->session->userdata('id')
			);
		}
// kalo idprogram != null
		else{
			$total = $this->getDataProgramHasProdukById($_POST['id']);
			$total = $total[0]->harga_program;

			$data = array(
				'program_id' => $_POST['id'],
				'guest_name' => $_POST['name'],
				'contact' => $_POST['contact'],
				'pax' => $_POST['pax'],
				'bahasa_id' => $_POST['bahasa'],
				'tour_code' => $_POST['tour_code'],
				'remarks' => $_POST['remarks'],
				'dob' => $_POST['dob'],
				'date' => $_POST['date'],
				'flight_arrival_code' => $_POST['fac'],
				'eta' => $_POST['eta'],
				'flight_departure_code' => $_POST['fdc'],
				'created_by' => $this->session->userdata('id'),
				'updated_by' => $this->session->userdata('id')
			);
		}

		$response = $this->db->insert('reservasi',$data);

		if ($response == true) {
			$id_reservasi =$this->db->insert_id();

			$dataCustomReservasi =[];
			if ($_POST['id'] == null) {
				foreach ($produks as $p) {
					$dataCustomReservasi[] = [
						'produk_id' => $p['id_produk'],
						'reservasi_id' => $id_reservasi
					];
				}
				$this->db->insert_batch('custom_reservasi', $dataCustomReservasi);
			}

			$hargaBahasa = $this->getBahasaPrice($_POST['bahasa'])[0]->harga_bahasa;
			$dataTagihan = array(
				'reservasi_id' => $id_reservasi,
				'total' => (($total*$_POST['pax']) + $hargaBahasa),
				'deskripsi' => $_POST['remarks'],
				'status' => 'pending'
			);

			$res = $this->db->insert('tagihan',$dataTagihan);

			if ($res == true ) {
				$this->session->unset_userdata("customReservasi");
				$this->session->set_flashdata('notif', $this->sweetalert->toastr_success('Success', 'Add Data Success!'));
			}else{
				$this->session->set_flashdata('notif', $this->sweetalert->toastr_error('Oops!', 'Add Data Failed! Unable to add data to the database.'));
				return false;
			}
		}else{
			$this->session->set_flashdata('notif', $this->sweetalert->toastr_error('Oops!', 'Add Data Failed! Unable to add data to the database.'));
			return false;
		}

		return $this->db->trans_status();

	}

	public function searchProduk($searchTerm)
	{
		$this->db->like('nama_produk', $searchTerm);
		$query = $this->db->get('produk');
		return $query->result();
	}
	public function searchProgram($searchTerm)
	{	
		$this->db->select('program.*,
			GROUP_CONCAT(produk.area SEPARATOR ", ") AS area_terkait,
			GROUP_CONCAT(produk.nama_produk SEPARATOR ", ") AS produk_terkait,
			SUM(produk.harga) AS harga_program');
		$this->db->from('program_has_produk');
		$this->db->join('produk', 'produk.id = program_has_produk.produk_id', 'inner');
		$this->db->join('program', 'program.id = program_has_produk.program_id', 'inner');
		$this->db->like('program.nama_program', $searchTerm);
		$this->db->group_by('program.id, program.nama_program'); 
		$query = $this->db->get();
		return $query->result();
	}

	public function searchProdukForCustomReservasi($searchTerm)
	{
		$this->db->like('nama_produk', $searchTerm);
		$query = $this->db->get('produk');
		return $query->result();
	}
	public function updateReservasi($id){
		$data = array(
			"guest_name"=> $_POST['guestName'],
			"dob"=> $_POST['dob'],
			"contact"=> $_POST['contact'],
			"pax"=> $_POST['pax'],
			"program_id"=> $_POST['program'],
			"activity"=> $_POST['activity'],
			"hotel"=> $_POST['hotel'],
			"guide_id"=> $_POST['guide'],
			"sopir_id"=> $_POST['sopir'],
			"transport_id"=> $_POST['kendaraan'],
			"pickup"=> $_POST['pickup'],
			"bahasa_id"=> $_POST['bahasa'],
			"remarks"=> $_POST['remarks'],
			"flight_arrival_code"=> $_POST['flightArrivalCode'],
			"eta"=> $_POST['eta'],
			"flight_departure_code"=> $_POST['flightDepactureCode'],
			"etd"=> $_POST['etd'],
			"updated_by"=> $this->session->userdata('id')
		);
		$this->db->where('id', $id);
		$res = $this->db->update('reservasi', $data);
		if ($res) {
			$res = true;
		}else{
			$res = false;
		}
		return $res;
	}
	public function getGuideWithBahasa()
	{
		$this->db->select('guide.id,guide.guide_name,bahasa.nama_bahasa')->from('guide');
		$this->db->join('guide_has_bahasa', 'guide_has_bahasa.guide_id = guide.id', 'inner');
		$this->db->join('bahasa', 'guide_has_bahasa.bahasa_id = bahasa.id', 'inner');
		$result = $this->db->get()->result_array();
		return $result;
	}
}

/* End of file TestModel.php */
/* Location: ./application/models/TestModel.php */
