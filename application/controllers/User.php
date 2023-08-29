<?php
defined('BASEPATH') or exit('No direct script access allowed');

class User extends CI_Controller
{
    public function index()
    {
        $data = [
            'users' => $this->User_model->get_all()
        ];

        $this->load->view('templates/dashboard/header', ['title' => 'Manage User']);
        $this->load->view('user/index', $data);
        $this->load->view('templates/dashboard/footer');
    }

    public function store()
    {
        if ($this->form_validation->run('user') == false) {
            echo validation_errors();
        } else {
            $data = [
                'fullname' => $this->input->post('fullname'),
                'username' => $this->input->post('username'),
                'password' => password_hash($this->input->post('password'), PASSWORD_DEFAULT),
                'is_active' => $this->input->post('is_active')
            ];

            $this->db->insert('tb_user', $data);
            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Data berhasil ditambahkan!</div>');
            echo 'success';
        }
    }

    public function update($id_user)
    {
        if ($this->form_validation->run('user') == false) {
            echo validation_errors();
        } else {
            $data = [
                'fullname' => $this->input->post('fullname'),
                'username' => $this->input->post('username'),
                'is_active' => $this->input->post('is_active')
            ];

            if ($this->input->post('password')) {
                $data['password'] = password_hash($this->input->post('password'), PASSWORD_DEFAULT);
            }

            $this->db->update('tb_user', $data, ['id_user' => $id_user]);
            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Data berhasil diubah!</div>');
            echo 'success';
        }
    }

    public function delete($id_user)
    {
        if ($id_user !== $this->session->userdata('id_user')) {
            $this->db->delete('tb_user', ['id_user' => $id_user]);
            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Data berhasil dihapus!</div>');
            redirect('user');
        } else {
            $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Tidak dapat menghapus data diri sendiri!</div>');
            redirect('user');
        }
    }
}
