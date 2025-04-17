<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Dashboard extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->library('auth_Library');
        $this->auth_library->must_login();
        $this->load->model('DashboardModel');
    }
    function index()
    {
        $data['title'] = "Senang Tours & Travel";
        $data['url'] = "Dashboard";

        $data["component_footer_url"] = NULL;

        $this->load->view('partials/head',$data);
        $this->load->view('partials/side',$data);
        $this->load->view('partials/nav');
        if ($this->session->userdata("role_id") == 1) {
            $data['accountingStats'] = $this->DashboardModel->accountingStats();
            $data['persentasePerMonthAccounting'] = $this->DashboardModel->persentasePerMonthAccounting();
            $data['bulanPertama'] = json_encode($this->DashboardModel->accountingMonthChart1());
            $data['bulanKedua'] = json_encode($this->DashboardModel->accountingMonthChart2());
            $data['programStats'] = $this->DashboardModel->programStats();
            $data['program'] = json_encode($this->DashboardModel->countProgramMostBooking());
            $data['produk'] = json_encode($this->DashboardModel->countProdukMostBooking());

            $data["component_footer_url"] = base_url('assets/chart/admin.js');

            $this->load->view('dashboard',$data);
        }else if ($this->session->userdata("role_id") == 2) {

            $data['agentStats'] = $this->DashboardModel->agentStats();

            $data['week'] = json_encode($this->DashboardModel->agentWeekChart());
            $data['weekCount'] = $this->DashboardModel->agentWeekCount();
            $data['persentasePerWeek'] = $this->DashboardModel->persentasePerWeek();

            $data['month'] = json_encode($this->DashboardModel->agentMonthChart());
            $data['monthCount'] = $this->DashboardModel->agentMonthCount();
            $data['persentasePerMonth'] = $this->DashboardModel->persentasePerMonth();

            $data['year'] = json_encode($this->DashboardModel->agentYearChart());
            $data['yearCount'] = $this->DashboardModel->agentYearCount();
            $data['persentasePerYear'] = $this->DashboardModel->persentasePerYear();

            $data["component_footer_url"] = base_url('assets/chart/agent.js');
            $this->load->view('dashboard/dashboard_agent',$data);
        }else if ($this->session->userdata("role_id") == 3) {

            $data['programStats'] = $this->DashboardModel->programStats();
            $data['program'] = json_encode($this->DashboardModel->countProgramMostBooking());
            $data['produk'] = json_encode($this->DashboardModel->countProdukMostBooking());


            $data["component_footer_url"] = base_url('assets/chart/production.js');
            $this->load->view('dashboard/dashboard_production',$data);

        }else if ($this->session->userdata("role_id") == 4) {

            $data['accountingStats'] = $this->DashboardModel->accountingStats();
            $data['persentasePerMonthAccounting'] = $this->DashboardModel->persentasePerMonthAccounting();
            $data['bulanPertama'] = json_encode($this->DashboardModel->accountingMonthChart1());
            $data['bulanKedua'] = json_encode($this->DashboardModel->accountingMonthChart2());

            $data["component_footer_url"] = base_url('assets/chart/accounting.js');
            $this->load->view('dashboard/dashboard_accounting',$data);
        }else if ($this->session->userdata("role_id") == 5) {

            $this->load->model('ProgramModel');
            $this->load->model('BahasaModel');
            $this->load->model('TestModel');
            $this->load->model('KendaraanModel');
            $this->load->model('SopirModel');

            $data['sopirs'] = $this->SopirModel->get_all();
            $data['programs'] = $this->ProgramModel->get_all();
            $data['bahasas'] = $this->BahasaModel->get_all();
            $data['guides'] = $this->TestModel->getGuideWithBahasa();
            $data['kendaraans'] = $this->KendaraanModel->get_all();

            $this->load->view('dashboard/dashboard_operation',$data);
        }else{
            redirect('auth/logout');
        }
        $this->load->view('partials/copyright');
        $this->load->view('partials/footer',$data);
    }
}
