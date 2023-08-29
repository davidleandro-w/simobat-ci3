<?php
defined('BASEPATH') or exit('No direct script access allowed');

class AuthMiddleware
{
    public function __construct()
    {
        $this->CI = &get_instance();
    }

    public function check_auth()
    {
        // Check if the user is authenticated, e.g., using a session variable
        if (
            !$this->CI->session->userdata('logged_in')
            and $this->CI->uri->segment(1) != 'auth'
        ) {
            redirect('auth/login'); // Redirect to login page if not authenticated
        } elseif (
            $this->CI->session->userdata('logged_in')
            and $this->CI->uri->segment(1) == 'auth'
        ) {
            redirect('dashboard'); // Redirect to dashboard if authenticated
        }
    }
}
