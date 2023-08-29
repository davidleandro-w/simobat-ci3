<?php
defined('BASEPATH') or exit('No direct script access allowed');

class JenisObat_model extends CI_Model
{
    private $_table = 'tb_jenis_obat';
    private $_primary_key = 'id_jenis_obat';

    public function get_all()
    {
        return $this->db
        ->order_by('nama_jenis_obat', 'ASC')
        ->get($this->_table)
        ->result_array();
    }

    public function get_by_id($id_user)
    {
        return $this->db->get_where($this->_table, [$this->_primary_key => $id_user])->row_array();
    }

    public function count()
    {
        return $this->db->count_all($this->_table);
    }
}
