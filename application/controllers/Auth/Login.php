<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Login extends CI_Controller
{
    public function index()
    {
        // load view
        $this->load->view('templates/auth/header', ['title' => 'Login']);
        $this->load->view('auth/login');
        $this->load->view('templates/auth/footer');
    }

    public function authenticate()
    {
        // check form validation
        if ($this->form_validation->run('login') == false) {
            $this->index();
        } else {
            $this->_login();
        }
    }

    private function _login()
    {
        // get input from form
        $username = $this->input->post('username', true);
        $password = $this->input->post('password', true);

        $auth_check = $this->User_model->auth_check($username, $password);

        // check if user is authenticated
        if ($auth_check) {
            if ($auth_check['is_active'] == 1) {
                // set session
                $this->session->set_userdata($auth_check);
                $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Selamat datang, ' . $auth_check['fullname'] . '!</div>');
                redirect('dashboard');
            } else {
                // user is not activated
                $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Akun belum diaktivasi oleh Admin!</div>');
                redirect('auth/login');
            }
        } else {
            $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Username dan Password tidak sesuai!</div>');
            redirect('auth/login');
        }
    }
}
