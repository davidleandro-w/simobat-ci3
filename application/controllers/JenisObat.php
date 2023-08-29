<?php
defined('BASEPATH') or exit('No direct script access allowed');

class JenisObat extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('JenisObat_model');
    }

    public function index()
    {
        $data = [
            'jenisobats' => $this->JenisObat_model->get_all()
        ];

        $this->load->view('templates/dashboard/header', ['title' => 'Manage Jenis Obat']);
        $this->load->view('jenisobat/index', $data);
        $this->load->view('templates/dashboard/footer');
    }

    public function store()
    {
        if ($this->form_validation->run('jenis_obat') == false) {
            echo validation_errors();
        } else {
            $data = [
                'nama_jenis_obat' => $this->input->post('nama_jenis_obat'),
            ];

            $this->db->insert('tb_jenis_obat', $data);
            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Data berhasil ditambahkan!</div>');
            echo 'success';
        }
    }

    public function update($id_jenis_obat)
    {
        if ($this->form_validation->run('jenis_obat') == false) {
            echo validation_errors();
        } else {
            $data = [
                'nama_jenis_obat' => $this->input->post('nama_jenis_obat'),
            ];

            $this->db->update('tb_jenis_obat', $data, ['id_jenis_obat' => $id_jenis_obat]);
            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Data berhasil diubah!</div>');
            echo 'success';
        }
    }

    public function delete($id_jenis_obat)
    {
        $this->db->delete('tb_jenis_obat', ['id_jenis_obat' => $id_jenis_obat]);
        $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Data berhasil dihapus!</div>');
        redirect('jenisobat');
    }
}
