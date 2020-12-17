<?php

$config = array(
    'karyawan' => array(
            array(
                'field' => 'nama_lengkap',
                'label' => 'Nama Lengkap',
                'rules' => 'required'
            ),
            array(
                'field' => 'email',
                'label' => 'Email',
                'rules' => 'required|valid_email',
                'errors' => array(
                    'required' => 'You must provide a %s.',
                    'valid_email' => 'Data yang diisi harus berupa email'
                )
            ),
            array(
                'field' => 'npwp',
                'label' => 'NPWP',
                'rules' => 'numeric',
                'errors' => array(
                    'numeric' => 'Data %s yang diisi harus berupa angka'
                )
            ),
            array(
                'field' => 'status_nikah',
                'label' => 'Status Nikah',
                'rules' => 'required'
            ),
            array(
                'field' => 'jenis_kelamin',
                'label' => 'Jenis Kelamin',
                'rules' => 'required'
            ),
            array(
                'field' => 'tempat_tgl_lahir',
                'label' => 'Tempat, Tanggal Lahir',
                'rules' => 'required'
            ),
            array(
                'field' => 'agama',
                'label' => 'Agama',
                'rules' => 'required'
            ),
            array(
                'field' => 'alamat',
                'label' => 'Alamat',
                'rules' => 'required'
            ),
            array(
                'field' => 'alamat',
                'label' => 'Alamat',
                'rules' => 'required'
            ),
            array(
                'field' => 'status_rumah',
                'label' => 'Status Tempat Tinggal',
                'rules' => 'required'
            ),
            array(
                'field' => 'telephone',
                'label' => 'No. Telp',
                'rules' => 'required|numeric',
                'errors' => array(
                    'numeric' => 'Data %s yang diisi harus berupa angka'
                )
            ),
            array(
                'field' => 'kebangsaan',
                'label' => 'Kebangsaan',
                'rules' => 'required'
            ),
            array(
                'field' => 'suku',
                'label' => 'Suku',
                'rules' => 'required'
            ),
            array(
                'field' => 'tinggi_badan',
                'label' => 'Tinggi Badan',
                'rules' => 'required|numeric',
                'errors' => array(
                    'numeric' => 'Data %s yang diisi harus berupa angka'
                )
            ),
            array(
                'field' => 'berat_badan',
                'label' => 'Berat Badan',
                'rules' => 'required|numeric',
                'errors' => array(
                    'numeric' => 'Data %s yang diisi harus berupa angka'
                )
            ),
            array(
                'field' => 'merokok',
                'label' => 'Merokok',
                'rules' => 'required'
            ),
            array(
                'field' => 'cacat_fisik',
                'label' => 'Cacat Fisik',
                'rules' => 'required'
            ),
            array(
                'field' => 'sakit_periodik',
                'label' => 'Sakit Periodik',
                'rules' => 'required'
            ),
            array(
                'field' => 'alergi',
                'label' => 'Alergi',
                'rules' => 'required'
            ),
            array(
                'field' => 'addmore[0][tahun]',
                'label' => 'Tahun Sakit',
                'rules' => 'numeric',
                'errors' => array(
                    'numeric' => 'Data %s yang diisi harus berupa angka tahun'
                )
            ),
            array(
                'field' => 'addmore[0][lama_sakit]',
                'label' => 'Lama Sakit',
                'rules' => 'numeric',
                'errors' => array(
                    'numeric' => 'Data %s yang diisi harus berupa angka'
                )
            )
    ),
    'kesehatan' => array(
            array(
                'field' => 'addmore[0][tahun]',
                'label' => 'Tahun Sakit',
                'rules' => 'required|int',
                'errors' => array(
                    'int' => 'Data $s yang diisi harus berupa angka'
                )
            ),
            array(
                'field' => 'addmore[0][lama_sakit]',
                'label' => 'Lama Sakit',
                'rules' => 'required|int',
                'errors' => array(
                    'int' => 'Data $s yang diisi harus berupa angka'
                )
            )
    )
);