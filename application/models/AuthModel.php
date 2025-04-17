<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class AuthModel extends CI_Model {

	public $variable;

	public function __construct()
	{
		parent::__construct();
		
	}
	public function getEmail()
	{
		$this->load->model('userModel');
		$user = $this->db->select('id,email')->from('user')->where('email',$this->input->post('email'))->get(); 

		if ($user->num_rows() >= 1) {
			$kode = random_string('numeric',6);
			$this->sendMail($this->input->post('email'),$kode);

			$user = $user->result();
			$arr = array('id' => $user[0]->id, 'email' => $user[0]->email, 'kode' => $kode ); 
			$this->session->set_userdata($arr);
		}else{
			$this->session->set_flashdata('loginNotif', $this->sweetalert->toastr_error('Email tidak ditemukan!', "Error"));
			redirect('Auth/ForgotPassword/','refresh');
		}
		redirect('Auth/ForgotPassword/Kode','refresh');
	}
	public function Cek_kode()
	{ 
		$kode = implode('', $this->input->post()); 
		if ($kode == $this->session->userdata('kode')) {
			redirect('Auth/ForgotPassword/Password','refresh'); 
		}else{ 
			$this->session->set_flashdata('notif', $this->sweetalert->alert('error','Oopss !!','Data Gagal Disimpan',"Jika gagal terus harap hubungi admin!",2400)); 
			redirect('Auth/ForgotPassword/Kode','refresh');
		}
	}

	function sendMail($email,$kode ){
		$config['useragent'] = "codeigniter";
		$config['mailpath'] = "usr/bin/sendmail";
		$config['protocol'] = "smtp";
		$config['smtp_host'] = "smtp.gmail.com";
		$config['smtp_port'] = "465";
		$config['smtp_user'] = "sepri.levri@gmail.com";
		$config['smtp_pass'] = "isjz idhe jqjs cpqe";
		$config['smtp_crypto'] = "ssl";
		$config['charset'] = "utf-8";
		$config['mailtype'] = "html";
		$config['newline'] = "\r\n";
		$config['smtp_timeout'] = 30;
		$config['wordwrap'] = TRUE;

		$this->email->initialize($config);
		$this->email->from('no-replay@sepri.levri@gmail.com', 'Senang Tours & Travel');
		$this->email->to($email);
		$this->email->subject("Kode OTP");
		$this->email->attach('verifikasi');
		$this->email->message
		(
			'<!DOCTYPE html>
			<html lang="en" xmlns:v="urn:schemas-microsoft-com:vml" xmlns:o="urn:schemas-microsoft-com:office:office">

			<head>
			<meta charset="utf-8">
			<meta name="x-apple-disable-message-reformatting">
			<meta http-equiv="x-ua-compatible" content="ie=edge">
			<meta name="viewport" content="width=device-width, initial-scale=1">
			<meta name="format-detection" content="telephone=no, date=no, address=no, email=no">
			<!--[if mso]>
			<xml><o:officedocumentsettings><o:pixelsperinch>96</o:pixelsperinch></o:officedocumentsettings></xml>
			<![endif]-->
			<title>
			<!-- Pesan Notif -->
			<!-- Contoh : Notifikasi Deposit -->
			</title>
			<link
			href="https://fonts.googleapis.com/css?family=Montserrat:ital,wght@0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,200;1,300;1,400;1,500;1,600;1,700"
			rel="stylesheet" media="screen">
			<style>
			.hover-underline:hover {
				text-decoration: underline !important;
			}

			p {
				font-size: 12px;
			}

			table {
				caption-side: bottom;
				border-collapse: collapse;
			}

			th {
				text-align: inherit;
				text-align: -webkit-match-parent;
			}

			thead,
			tbody,
			tfoot,
			tr,
			td,
			th {
				border-color: inherit;
				border-style: solid;
				border-width: 0;
				font-size: 12px;
				font-weight: 500;
			}

			.table {
				--bs-table-bg: transparent;
				--bs-table-accent-bg: transparent;
				--bs-table-striped-color: #6e6b7b;
				--bs-table-striped-bg: #fafafc;
				--bs-table-active-color: #6e6b7b;
				--bs-table-active-bg: rgba(34, 41, 47, 0.1);
				--bs-table-hover-color: #6e6b7b;
				--bs-table-hover-bg: #f6f6f9;
				width: 100%;
				margin-bottom: 1rem;
				color: #6e6b7b;
				vertical-align: middle;
				border-color: #ebe9f1;
			}
			.table > :not(caption) > * > * {
				padding: 0.72rem 2rem;
				background-color: var(--bs-table-bg);
				border-bottom-width: 1px;
				box-shadow: inset 0 0 0 9999px var(--bs-table-accent-bg);
			}
			.table > tbody {
				vertical-align: inherit;
			}
			.table > thead {
				vertical-align: bottom;
			}
			.table > :not(:first-child) {
				border-top: 2px solid #ebe9f1;
			}

			.caption-top {
				caption-side: top;
			}

			.table-sm > :not(caption) > * > * {
				padding: 0.3rem 0.5rem;
			}

			@media (max-width: 600px) {
				.sm-w-full {
					width: 100% !important;
				}

				.sm-px-24 {
					padding-left: 24px !important;
					padding-right: 24px !important;
				}

				.sm-py-32 {
					padding-top: 12px !important;
					padding-bottom: 12px !important;
				}

				.sm-leading-32 {
					line-height: 12px !important;
				}
			}
			</style>
			</head>

			<body
			style="margin: 0; width: 100%; padding: 0; word-break: break-word; -webkit-font-smoothing: antialiased; background-color: #eceff1;">
			<div style=" sans-serif; mso-line-height-rule: exactly; display: none;">
			<!-- Pesan Notif -->
			<!-- Contoh : Notifikasi Deposit -->
			</div>
			<div role="article" aria-roledescription="email" aria-label="Notifikasi Deposit" lang="en"
			style=" sans-serif; mso-line-height-rule: exactly;">
			<table style="width: 100%; font-family: Montserrat, -apple-system, sans-serif;" cellpadding="0"
			cellspacing="0" role="presentation">
			<tr>
			<td align="center"
			style="mso-line-height-rule: exactly; background-color: #eceff1; font-family: Montserrat, -apple-system, , sans-serif;">
			<table class="sm-w-full" style="width: 600px;" cellpadding="0" cellspacing="0" role="presentation">
			<tr>
			<td class="sm-py-32 sm-px-24"
			style="mso-line-height-rule: exactly; padding: 24px; text-align: center; font-family: Montserrat, -apple-system, , sans-serif;">
			<a href="<?php echo base_url();?>"
			style="mso-line-height-rule: exactly;">
			<img src="https://elearning.pnb.ac.id/img/logo-pnb.3aae610b.png"
			style="max-width: 54px; vertical-align: middle; line-height:100%; border: 0;">   
			</a>
			</td>
			</tr>
			<tr>
			<td align="center"
			style=" sans-serif; mso-line-height-rule: exactly;">
			<table style="width: 100%;" cellpadding="0" cellspacing="0" role="presentation">
			<tr>
			<td class="sm-px-24"
			style="mso-line-height-rule: exactly; border-radius: 4px; background-color: #ffffff; padding: 24px; text-align: left; font-family: Montserrat, -apple-system, , sans-serif; font-size: 16px; line-height: 24px; color: #626262;">
			<p
			style=" sans-serif; mso-line-height-rule: exactly; margin-bottom: 0; font-size: 16px; font-weight: 600;">
			Hai,</p>
			<p
			style=" sans-serif; mso-line-height-rule: exactly; margin-top: 0; font-size: 18px; font-weight: 700; color: #0099ff;">
			'.$email.'</p>
			<p
			style=" sans-serif; font-size: 12px; mso-line-height-rule: exactly; margin: 0; margin-bottom: 8px;">
			PENTING: Jangan memberikan kode rahasia ini ke siapapun, termasuk teman anda.
			</p>
			<hr style="border-top:dashed 1px">
			Berikut kode : <h3>'.$kode.'</h3> 
			<hr style="border-top:dashed 1px">
			<p
			style=" sans-serif; font-size: 12px; mso-line-height-rule: exactly; margin: 0; margin-bottom: 8px;">
			Terima kasih atas kepercayaan Anda kepada kami.
			</p>
			<p
			style=" sans-serif; font-size: 12px; mso-line-height-rule: exactly; margin: 0; margin-bottom: 8px;">
			Salam hangat, <br style="text-transform: uppercase;"><b>Admin</b></p>
			<hr style="border-top:dashed 1px">
			<p
			style=" sans-serif; font-size: 12px; mso-line-height-rule: exactly; margin: 0; margin-bottom: 8px;">
			Website : <?php echo base_url();?>
			<br> 
			Email : { Email CS }
			</p>
			</td>
			</tr>
			</table>
			</td>
			</tr>
			</table>
			</td>
			</tr>
			</table>
			</div>
			</body> 
			</html>
			' );
$this->email->send();
}
}

/* End of file AuthModel.php */
/* Location: ./application/models/AuthModel.php */