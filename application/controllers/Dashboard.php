<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Dashboard extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('User_model');
        $this->load->model('JenisObat_model');
        $this->load->model('Obat_model');
    }

    public function index()
    {
        $data = [
            'jumlah_jenis_obat' => $this->JenisObat_model->count(),
            'jumlah_obat' => $this->Obat_model->count(),
            'jumlah_obat_expired' => $this->Obat_model->count_expired(),
            'jumlah_obat_belum_expired' => $this->Obat_model->count_belum_expired(),
            'jumlah_user' => $this->User_model->count(),
            'jumlah_user_aktif' => $this->User_model->count_aktif(),
            'jumlah_user_tidak_aktif' => $this->User_model->count_tidak_aktif(),
            'obats' => $this->Obat_model->get_all(),

        ];

        $this->load->view('templates/dashboard/header', ['title' => 'Dashboard']);
        $this->load->view('dashboard', $data);
        $this->load->view('templates/dashboard/footer');
    }
}
