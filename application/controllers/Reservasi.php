<?php if (!defined('BASEPATH')) exit('No direct script access allowed');
include_once "BaseCRUDController.php";
class Reservasi extends BaseCRUDController
{
    protected function validation()
    {
        // $this->form_validation->set_rules('dob', 'Date of Birth', 'required');
        // $this->form_validation->set_rules('date', 'Date', 'required');
        // $this->form_validation->set_rules('program_id', 'Program', 'required');
        // $this->form_validation->set_rules('pax', 'Pax', 'required');
        // $this->form_validation->set_rules('agent', 'Agent', 'required');
        // $this->form_validation->set_rules('tour_code', 'Tour Code', 'required');
        // $this->form_validation->set_rules('contact', 'Contact', 'required');
        // $this->form_validation->set_rules('activity', 'Activity', 'required');
        // $this->form_validation->set_rules('hotel', 'Hotel', 'required');
        // $this->form_validation->set_rules('flight_arrival_code', 'Flight Arrival Code', 'required');
        // $this->form_validation->set_rules('eta', 'ETA', 'required');
        // $this->form_validation->set_rules('flight_departure_code', 'Flight Departure Code', 'required');
        // $this->form_validation->set_rules('etd', 'ETD', 'required');
        // $this->form_validation->set_rules('pickup', 'Pickup', 'required');
        // $this->form_validation->set_rules('guide_id', 'Guide', 'required');
        // $this->form_validation->set_rules('transport_id', 'Transport', 'required');
        // $this->form_validation->set_rules('sopir_id', 'Sopir', 'required');
        // $this->form_validation->set_rules('remarks', 'Remarks', 'required');
        // $this->form_validation->set_rules('bahasa_id', 'Bahasa', 'required');

		$this->form_validation->set_rules('dob', 'Date of Birth', 'required');
		$this->form_validation->set_rules('date', 'Reservation Date', 'required');
		$this->form_validation->set_rules('program_id', 'Program', 'required|integer');
		$this->form_validation->set_rules('pax', 'Pax', 'required|integer');
		$this->form_validation->set_rules('agent', 'Agent', 'required|max_length[255]');
		$this->form_validation->set_rules('tour_code', 'Tour Code', 'required|max_length[50]');
		$this->form_validation->set_rules('contact', 'Contact', 'required|max_length[100]');
		$this->form_validation->set_rules('activity', 'Activity', 'required|max_length[255]');
		$this->form_validation->set_rules('hotel', 'Hotel', 'required|max_length[100]');
		$this->form_validation->set_rules('flight_arrival_code', 'Flight Arrival Code', 'required|max_length[10]');
		$this->form_validation->set_rules('eta', 'ETA', 'required');
		$this->form_validation->set_rules('flight_departure_code', 'Flight Departure Code', 'required|max_length[10]');
		$this->form_validation->set_rules('etd', 'ETD', 'required');
		$this->form_validation->set_rules('pickup', 'Pickup Time', 'required');
		$this->form_validation->set_rules('guide_id', 'Guide', 'required|integer');
		$this->form_validation->set_rules('transport_id', 'Transport', 'required|integer');
		$this->form_validation->set_rules('sopir_id', 'Sopir', 'required|integer');
		$this->form_validation->set_rules('remarks', 'Remarks', 'required|max_length[65535]');
		$this->form_validation->set_rules('bahasa_id', 'Bahasa', 'required|integer');
    }

    public function form()
    {
        $data['title'] = "Senang Tours & Travel";
        $data['url'] = "Reservasi";

        $this->load->view('partials/head', $data);
        $this->load->view('partials/side', $data);
        $this->load->view('partials/nav');
        $this->load->view('form', $data);
        $this->load->view('partials/copyright');
        $this->load->view('partials/footer');
    }
    public function insertData()
    {
        $res = $this->reservasiModel->insertData();
        if ($res == true) {
           $this->session->set_flashdata('notif', $this->sweetalert->toastr_success('Success', 'Add Data Success!'));
       }else{
           $this->session->set_flashdata('notif', $this->sweetalert->toastr_error('Oops!', 'Add Data Failed! Unable to add data to the database.'));
       }
       redirect('Reservasi/form');
   }
}
