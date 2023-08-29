<?php

$config = array(
    'login' => array(
        array(
            'field' => 'username',
            'label' => 'Username',
            'rules' => 'required|trim|alpha_numeric'
        ),
        array(
            'field' => 'password',
            'label' => 'Password',
            'rules' => 'required|trim'
        ),
    ),
    'register' => array(
        array(
            'field' => 'fullname',
            'label' => 'Fullname',
            'rules' => 'required|trim'
        ),
        array(
            'field' => 'username',
            'label' => 'Username',
            'rules' => 'required|trim|alpha_numeric|min_length[5]|max_length[12]|is_unique[tb_user.username]'
        ),
        array(
            'field' => 'password',
            'label' => 'Password',
            'rules' => 'required|trim|min_length[5]|max_length[12]'
        ),
        array(
            'field' => 'password_confirm',
            'label' => 'Konfirmasi Password',
            'rules' => 'required|trim|matches[password]'
        ),
    ),
    'user' => array(
        array(
            'field' => 'fullname',
            'label' => 'Fullname',
            'rules' => 'required|trim|min_length[5]|max_length[50]'
        ),
        array(
            'field' => 'username',
            'label' => 'Username',
            'rules' => 'required|trim|alpha_numeric|min_length[5]|max_length[12]'
        ),
        array(
            'field' => 'password',
            'label' => 'Password',
            'rules' => 'trim|min_length[5]|max_length[12]'
        ),
        array(
            'field' => 'is_active',
            'label' => 'Status Aktif',
            'rules' => 'required|trim'
        ),
    ),
    'jenis_obat' => array(
        array(
            'field' => 'nama_jenis_obat',
            'label' => 'Nama Jenis Obat',
            'rules' => 'required|trim|min_length[5]|max_length[50]'
        ),
    ),
    'obat' => array(
        array(
            'field' => 'nama_obat',
            'label' => 'Nama Obat',
            'rules' => 'required|trim|min_length[5]|max_length[50]'
        ),
        array(
            'field' => 'id_jenis_obat',
            'label' => 'Jenis Obat',
            'rules' => 'required|trim|numeric'
        ),
        array(
            'field' => 'satuan',
            'label' => 'Satuan',
            'rules' => 'required|trim|min_length[2]|max_length[10]'
        ),
        array(
            'field' => 'harga',
            'label' => 'Harga',
            'rules' => 'required|trim|numeric'
        ),
        array(
            'field' => 'stok',
            'label' => 'Stok',
            'rules' => 'required|trim|numeric'
        ),
        array(
            'field' => 'tanggal_expired',
            'label' => 'Tanggal Expired',
            'rules' => 'required|trim'
        ),
    ),
);
