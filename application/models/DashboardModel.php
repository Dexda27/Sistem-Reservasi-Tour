<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class DashboardModel extends CI_Model {

	public $variable;

	public function __construct()
	{
		parent::__construct();

	}
// statistik agen perbulan
	public function agentStats()
	{
		$reservasi_count = $this->db->query("SELECT COUNT(id) AS reservasi_count FROM `reservasi` WHERE `created_by` = ".$this->session->userdata('id'))->result();
		$reservasi_count = $reservasi_count[0]->reservasi_count;


		$paket_count = $this->db->query("SELECT COUNT(program_id) AS paket_count  FROM `reservasi` WHERE `program_id` IS NOT NULL AND `created_by` = ".$this->session->userdata('id'))->result();
		$paket_count = $paket_count[0]->paket_count;

		$custom_count = $this->db->query("SELECT COUNT(*) AS custom_count  FROM `reservasi` WHERE `program_id` IS NULL AND `created_by` = ".$this->session->userdata('id'))->result();
		$custom_count = $custom_count[0]->custom_count;

		$paid_count = $this->db->query("SELECT SUM(tagihan.total) AS paid_count  FROM `tagihan` INNER JOIN reservasi ON reservasi.id = tagihan.reservasi_id WHERE tagihan.status = 'paid' AND reservasi.`created_by` = ".$this->session->userdata('id'))->result();
		$paid_count = $paid_count[0]->paid_count;

		$nonpaid_count = $this->db->query("SELECT COUNT(*) AS nonpaid_count  FROM `tagihan` INNER JOIN reservasi ON reservasi.id = tagihan.reservasi_id WHERE tagihan.status != 'paid' AND reservasi.`created_by` = ".$this->session->userdata('id'))->result();
		$nonpaid_count = $nonpaid_count[0]->nonpaid_count;

		$arrStats = array(
			'reservasi_count' => $reservasi_count,
			'paket_count' => $paket_count,
			'custom_count' => $custom_count,
			'paid_count' => $paid_count,
			'nonpaid_count' => $nonpaid_count,
		);
		return $arrStats;
	}



//performa chart agent /week
public function agentWeekChart()
{
	$week = $this->db->query("SELECT DATE(`created_at`) AS `date`,
		COUNT(*) AS `reservations_count` FROM `reservasi` WHERE `created_at` >= DATE_SUB(CURDATE(), INTERVAL 7 DAY) AND `created_by` = ".$this->session->userdata('id')." GROUP BY DATE(`created_at`) ORDER BY `date` ASC")->result();
	return $week;
}
//performa agent /week countOrder
public function agentWeekCount()
{
	$week = $this->db->query("SELECT count(*) AS `date` FROM `reservasi` WHERE `created_at` >= DATE_SUB(CURDATE(), INTERVAL 7 DAY) AND `created_by` = ".$this->session->userdata('id')." ORDER BY `date` ASC")->result();
	return $week;
}

//performa agent /week countPersentase
	public function persentasePerWeek()
	{
		// Ambil jumlah reservasi untuk 7 hari terakhir
		$reservations_last_7_days = $this->db->query("
			SELECT COUNT(*) AS reservations_count
			FROM reservasi
			WHERE  `created_by` = ".$this->session->userdata('id')." AND created_at BETWEEN DATE_SUB(CURDATE(), INTERVAL 7 DAY) AND CURDATE();
			")->row()->reservations_count;

		// Ambil jumlah reservasi untuk minggu lalu (7 hari sebelum 7 hari terakhir)
		$reservations_prev_7_days = $this->db->query("
			SELECT COUNT(*) AS reservations_count
			FROM reservasi
			WHERE `created_by` = ".$this->session->userdata('id')." AND  created_at BETWEEN DATE_SUB(CURDATE(), INTERVAL 14 DAY) AND DATE_SUB(CURDATE(), INTERVAL 7 DAY);
			")->row()->reservations_count;

		// Menghitung persentase kenaikan
		if ($reservations_prev_7_days > 0) {
			$increase = $reservations_last_7_days - $reservations_prev_7_days;
			$percent_increase = ($increase / $reservations_prev_7_days) * 100;
		} else {
			$percent_increase = ($reservations_last_7_days > 0) ? 100 : 0;
		}
		return $percent_increase;
	}



//performa chart agent /month
	public function agentMonthChart()
	{
		$month = $this->db->query("SELECT DATE(`created_at`) AS `date`,
			COUNT(*) AS `reservations_count` FROM `reservasi` WHERE `created_at` >= DATE_SUB(CURDATE(), INTERVAL 30 DAY) AND `created_by` = ".$this->session->userdata('id')." GROUP BY DATE(`created_at`) ORDER BY `date` ASC")->result();
		return $month;
	}

//performa agent /month countOrder
	public function agentMonthCount()
	{
		$month = $this->db->query("SELECT count(*) AS `date` FROM `reservasi` WHERE `created_at` >= DATE_SUB(CURDATE(), INTERVAL 30 DAY) AND `created_by` = ".$this->session->userdata('id')." ORDER BY `date` ASC")->result();
		return $month;
	}

//performa agent /Month countPersentase
	public function persentasePerMonth()
	{
		// Ambil jumlah reservasi untuk 30 hari terakhir
		$reservations_last_30_days = $this->db->query("
			SELECT COUNT(*) AS reservations_count
			FROM reservasi
			WHERE  `created_by` = ".$this->session->userdata('id')." AND created_at BETWEEN DATE_SUB(CURDATE(), INTERVAL 30 DAY) AND CURDATE();
			")->row()->reservations_count;

		// Ambil jumlah reservasi untuk minggu lalu (30 hari sebelum 30 hari terakhir)
		$reservations_prev_30_days = $this->db->query("
			SELECT COUNT(*) AS reservations_count
			FROM reservasi
			WHERE `created_by` = ".$this->session->userdata('id')." AND  created_at BETWEEN DATE_SUB(CURDATE(), INTERVAL 60 DAY) AND DATE_SUB(CURDATE(), INTERVAL 30 DAY);
			")->row()->reservations_count;

		// Menghitung persentase kenaikan
		if ($reservations_prev_30_days > 0) {
			$increase = $reservations_last_30_days - $reservations_prev_30_days;
			$percent_increase = ($increase / $reservations_prev_30_days) * 100;
		} else {
			$percent_increase = ($reservations_last_30_days > 0) ? 100 : 0;
		}
		return $percent_increase;
	}


//performa chart agent /Year
	public function agentYearChart()
	{
		$year = $this->db->query("SELECT DATE(`created_at`) AS `date`,
			COUNT(*) AS `reservations_count` FROM `reservasi` WHERE `created_at` >= DATE_SUB(CURDATE(), INTERVAL 365 DAY) AND `created_by` = ".$this->session->userdata('id')." GROUP BY DATE(`created_at`) ORDER BY `date` ASC")->result();
		return $year;
	}

//performa agent /Year countOrder
	public function agentYearCount()
	{
		$year = $this->db->query("SELECT count(*) AS `date` FROM `reservasi` WHERE `created_at` >= DATE_SUB(CURDATE(), INTERVAL 365 DAY) AND `created_by` = ".$this->session->userdata('id')." ORDER BY `date` ASC")->result();
		return $year;
	}

//performa agent /Year countPersentase
	public function persentasePerYear()
	{
		// Ambil jumlah reservasi untuk 365 hari terakhir
		$reservations_last_365_days = $this->db->query("
			SELECT COUNT(*) AS reservations_count
			FROM reservasi
			WHERE  `created_by` = ".$this->session->userdata('id')." AND created_at BETWEEN DATE_SUB(CURDATE(), INTERVAL 365 DAY) AND CURDATE();
			")->row()->reservations_count;

		// Ambil jumlah reservasi untuk minggu lalu (365 hari sebelum 365 hari terakhir)
		$reservations_prev_365_days = $this->db->query("
			SELECT COUNT(*) AS reservations_count
			FROM reservasi
			WHERE `created_by` = ".$this->session->userdata('id')." AND  created_at BETWEEN DATE_SUB(CURDATE(), INTERVAL 730 DAY) AND DATE_SUB(CURDATE(), INTERVAL 365 DAY);
			")->row()->reservations_count;

		// Menghitung persentase kenaikan
		if ($reservations_prev_365_days > 0) {
			$increase = $reservations_last_365_days - $reservations_prev_365_days;
			$percent_increase = ($increase / $reservations_prev_365_days) * 100;
		} else {
			$percent_increase = ($reservations_last_365_days > 0) ? 100 : 0;
		}
		return $percent_increase;
	}


// stats production
	public function programStats()
	{
		$countProgram = $this->db->query("SELECT COUNT(*) as jumlahProgram FROM program")->result();
		$countProgram = $countProgram[0]->jumlahProgram;

		$countProduk = $this->db->query("SELECT COUNT(*) as jumlahProduk FROM produk")->result();
		$countProduk = $countProduk[0]->jumlahProduk;

		$arr = array('jumlahProduk' => $countProduk, 'jumlahProgram' => $countProgram);
		return $arr;
	}

//fungsi program atau paket paling banyak di booking
public function countProgramMostBooking()
{
    $countProgram = $this->db->query("
        SELECT program.nama_program, COUNT(reservasi.program_id) AS count_program
        FROM reservasi
        INNER JOIN program ON program.id = reservasi.program_id
        WHERE reservasi.program_id IS NOT NULL
        GROUP BY reservasi.program_id
        ORDER BY count_program DESC
        LIMIT 4
    ")->result();

    return $countProgram;
}
//fungsi program atau paket paling banyak di booking
	public function countProdukMostBooking()
	{
		$countProduk = $this->db->query("SELECT nama_produk, COUNT(produk_id) as count_produk FROM `custom_reservasi` INNER JOIN produk ON produk.id = custom_reservasi.produk_id GROUP BY produk_id ORDER BY count_produk DESC LIMIT 4")->result();
		return $countProduk;
	}


//stats accounting
	public function accountingStats()
	{
		$reservasi_count = $this->db->query("SELECT COUNT(id) AS reservasi_count FROM `reservasi` WHERE MONTH(`created_at`) = MONTH(CURDATE()) AND YEAR(`created_at`) = YEAR(CURDATE())")->result();
		$reservasi_count = $reservasi_count[0]->reservasi_count;

		$nonpaid_count = $this->db->query("SELECT SUM(tagihan.total) AS nonpaid_count  FROM `tagihan` WHERE tagihan.status != 'paid' AND MONTH(`created_at`) = MONTH(CURDATE()) AND YEAR(`created_at`) = YEAR(CURDATE())")->result();
		$nonpaid_count = $nonpaid_count[0]->nonpaid_count;

		$paid_count = $this->db->query("SELECT SUM(tagihan.total) AS paid_count  FROM `tagihan` WHERE tagihan.status = 'paid' AND MONTH(`created_at`) = MONTH(CURDATE()) AND YEAR(`created_at`) = YEAR(CURDATE())")->result();
		$paid_count = $paid_count[0]->paid_count;

		$paidyear_count = $this->db->query("SELECT SUM(tagihan.total) AS paidyear_count  FROM `tagihan`WHERE tagihan.status = 'paid' AND YEAR(`created_at`) = YEAR(CURDATE())")->result();
		$paidyear_count = $paidyear_count[0]->paidyear_count;

		$arrStats = array(
			'reservasi_count' => $reservasi_count,
			'nonpaid_count' => $nonpaid_count,
			'paid_count' => $paid_count,
			'paidyear_count' => $paidyear_count,
			'income_kotor' => $nonpaid_count + $paid_count,
		);
		return $arrStats;
	}


// chart for accouting
	public function accountingMonthChart1()
	{
    // Query untuk mengambil data bulan ini
		$month = $this->db->query("SELECT DATE(`created_at`) AS `date`,
			SUM(total) AS `total` FROM `tagihan` WHERE MONTH(`created_at`) = MONTH(CURDATE()) AND YEAR(`created_at`) = YEAR(CURDATE()) GROUP BY DATE(`created_at`) ORDER BY `date` ASC")->result();
		return $month;
	}

	public function accountingMonthChart2()
	{
    // Query untuk mengambil data bulan sebelumnya
		$month = $this->db->query("SELECT DATE(`created_at`) AS `date`,
			SUM(total) AS `total` FROM `tagihan`
			WHERE MONTH(`created_at`) = MONTH(DATE_SUB(CURDATE(), INTERVAL 1 MONTH))
			AND YEAR(`created_at`) = YEAR(DATE_SUB(CURDATE(), INTERVAL 1 MONTH))
			GROUP BY DATE(`created_at`)
			ORDER BY `date` ASC")->result();
		return $month;
	}

//performa /Month countPersentase
public function persentasePerMonthAccounting()
{
    // Ambil jumlah pembayaran untuk bulan ini
    $reservations_last_30_days = $this->db->query("
        SELECT SUM(total) AS total FROM tagihan
        WHERE MONTH(`created_at`) = MONTH(CURDATE()) AND YEAR(`created_at`) = YEAR(CURDATE())
    ")->row()->total;

    // Ambil jumlah pembayaran untuk bulan lalu
    $reservations_prev_30_days = $this->db->query("
        SELECT SUM(total) AS total FROM tagihan
        WHERE MONTH(`created_at`) = MONTH(DATE_SUB(CURDATE(), INTERVAL 1 MONTH))
        AND YEAR(`created_at`) = YEAR(DATE_SUB(CURDATE(), INTERVAL 1 MONTH))
    ")->row()->total;

    // Menghitung persentase kenaikan
    if ($reservations_prev_30_days > 0) {
        $increase = $reservations_last_30_days - $reservations_prev_30_days;
        $percent_increase = ($increase / $reservations_prev_30_days) * 100;
    } else {
        $percent_increase = ($reservations_last_30_days > 0) ? 100 : 0;
    }
    return $percent_increase;
}

}




/* End of file DashboardModel.php */
/* Location: ./application/models/DashboardModel.php */
