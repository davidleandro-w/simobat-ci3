<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Obat extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('Obat_model');
        $this->load->model('JenisObat_model');
    }

    public function index()
    {
        $data = [
            'obats' => $this->Obat_model->get_all(),
            'jenisobats' => $this->JenisObat_model->get_all(),
        ];

        $this->load->view('templates/dashboard/header', ['title' => 'Manage  Obat']);
        $this->load->view('obat/index', $data);
        $this->load->view('templates/dashboard/footer');
    }

    public function store()
    {
        if ($this->form_validation->run('obat') == false) {
            echo validation_errors();
        } else {
            $data = [
                'nama_obat' => $this->input->post('nama_obat'),
                'id_jenis_obat' => $this->input->post('id_jenis_obat'),
                'satuan' => $this->input->post('satuan'),
                'harga' => $this->input->post('harga'),
                'stok' => $this->input->post('stok'),
                'tanggal_expired' => $this->input->post('tanggal_expired'),
            ];

            $this->db->insert('tb_obat', $data);
            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Data berhasil ditambahkan!</div>');
            echo 'success';
        }
    }

    public function update($id_obat)
    {
        if ($this->form_validation->run('obat') == false) {
            echo validation_errors();
        } else {
            $data = [
                'nama_obat' => $this->input->post('nama_obat'),
                'id_jenis_obat' => $this->input->post('id_jenis_obat'),
                'satuan' => $this->input->post('satuan'),
                'harga' => $this->input->post('harga'),
                'stok' => $this->input->post('stok'),
                'tanggal_expired' => $this->input->post('tanggal_expired'),
            ];

            $this->db->update('tb_obat', $data, ['id_obat' => $id_obat]);
            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Data berhasil diubah!</div>');
            echo 'success';
        }
    }

    public function delete($id_obat)
    {
        $this->db->delete('tb_obat', ['id_obat' => $id_obat]);
        $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Data berhasil dihapus!</div>');
        redirect('obat');
    }
}
