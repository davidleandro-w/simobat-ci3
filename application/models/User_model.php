<?php
defined('BASEPATH') or exit('No direct script access allowed');

class User_model extends CI_Model
{
    private $_table = 'tb_user';
    private $_primary_key = 'id_user';

    public function auth_check($username, $password)
    {
        $user = $this->db->get_where($this->_table, ['username' => $username])->row_array();

        if ($user) {
            if (password_verify($password, $user['password'])) {
                return [
                    'id_user' => $user['id_user'],
                    'fullname' => $user['fullname'],
                    'username' => $user['username'],
                    'logged_in' => true,
                    'is_active' => $user['is_active'],
                ];
            } else {
                return false;
            }
        } else {
            return false;
        }
    }

    public function register($fullname, $username, $password)
    {
        $data = [
            'fullname' => $fullname,
            'username' => $username,
            'password' => password_hash($password, PASSWORD_DEFAULT)
        ];

        return $this->db->insert($this->_table, $data);
    }

    public function get_all()
    {
        return $this->db->get($this->_table)->result_array();
    }

    public function get_by_id($id_user)
    {
        return $this->db->get_where($this->_table, [$this->_primary_key => $id_user])->row_array();
    }

    public function count()
    {
        return $this->db->count_all($this->_table);
    }

    public function count_aktif()
    {
        return $this->db->where('is_active', 1)->count_all_results($this->_table);
    }

    public function count_tidak_aktif()
    {
        return $this->db->where('is_active', 0)->count_all_results($this->_table);
    }
}
