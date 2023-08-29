<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Obat_model extends CI_Model
{
    private $_table = 'tb_obat';
    private $_primary_key = 'id_obat';

    public function get_all()
    {
        return $this->db
            ->join('tb_jenis_obat', 'tb_jenis_obat.id_jenis_obat = tb_obat.id_jenis_obat')
            ->select(
                'tb_obat.*, 
                tb_jenis_obat.nama_jenis_obat,
                (tb_obat.harga * tb_obat.stok) AS total_harga_stok,
                DATE_FORMAT(tb_obat.tanggal_expired, "%d-%m-%Y") AS tanggal_expired_str
                '
            )
            ->order_by('tb_obat.tanggal_expired', 'ASC')
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

    public function count_expired()
    {
        return $this->db->where('tanggal_expired <', date('Y-m-d'))->count_all_results($this->_table);
    }

    public function count_belum_expired()
    {
        return $this->db->where('tanggal_expired >=', date('Y-m-d'))->count_all_results($this->_table);
    }
}
