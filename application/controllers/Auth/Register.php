<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Register extends CI_Controller
{
    public function index()
    {
        // load view
        $this->load->view('templates/auth/header', ['title' => 'Register']);
        $this->load->view('auth/register');
        $this->load->view('templates/auth/footer');
    }

    public function store()
    {
        // check form validation
        if ($this->form_validation->run('register') == false) {
            $this->index();
        } else {
            $this->_register();
        }
    }

    private function _register()
    {
        // get input from form
        $fullname = $this->input->post('fullname', true);
        $username = $this->input->post('username', true);
        $password = $this->input->post('password', true);

        $register = $this->User_model->register($fullname, $username, $password);

        // check if user is registered
        if ($register) {
            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Register berhasil!</div>');
            redirect('auth/login');
        } else {
            $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Register gagal!</div>');
            redirect('auth/register');
        }
    }
}
