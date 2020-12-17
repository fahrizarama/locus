<?php 
	class Recruitmen_m extends CI_Model
	{

    public function add_data($data){
		
		$this->db->insert('tbl_karyawan', $data);

		$latest_id_karyawan = $this->db->insert_id();

		//INSERT DATA RIWAYAT KESEHATAN
		foreach($this->input->post('addmore') as $items) {
			$data_kesehatan = array (
				'id_karyawan' => $latest_id_karyawan,
				'tahun' => $items['tahun'],
				'lama_sakit' => $items['lama_sakit'],
				'nama_penyakit' => $items['nama_penyakit'],
				'cara_perawatan' => $items['cara_perawatan'],
				'hasil_perawatan' => $items['hasil_perawatan']
			);
			$this->db->insert('tbl_riwayat_kesehatan', $data_kesehatan);
		}

		// //INSERT DATA PENDIDIKAN FORMAL
		// foreach($this->input->post('addmore2') as $items) {
		// 	$data_pendidikan_formal = array (
		// 		'id_karyawan' => $latest_id_karyawan,
		// 		'jenjang' => $items['jenjang_formal'],
		// 		'awal_tahun' => $items['tahun_awal_formal'],
		// 		'akhir_tahun' => $items['tahun_akhir_formal'],
		// 		'nama_lembaga' => $items['nama_lembaga_pendidikan_formal'],
		// 		'alamat_lembaga' => $items['alamat_lembaga_formal'],
		// 		'status_pendidikan' => $items['status_formal'],
		// 		'prestasi' => '0',
		// 		'jenis_pendidikan' => 'Formal'
		// 	);
		// 	$this->db->insert('tbl_pendidikan', $data_pendidikan_formal);
		// }

		// //INSERT DATA PENDIDIKAN NON FORMAL
		// foreach($this->input->post('addmore3') as $items) {
		// 	$data_pendidikan_non_formal = array (
		// 		'id_karyawan' => $latest_id_karyawan,
		// 		'jenjang' => $items['jenjang_non_formal'],
		// 		'awal_tahun' => $items['tahun_awal_non_formal'],
		// 		'akhir_tahun' => $items['tahun_akhir_non_formal'],
		// 		'nama_lembaga' => $items['nama_lembaga_pendidikan_non_formal'],
		// 		'alamat_lembaga' => $items['alamat_lembaga_non_formal'],
		// 		'status_pendidikan' => $items['status_non_formal'],
		// 		'prestasi' => '0',
		// 		'jenis_pendidikan' => 'Non Formal'
		// 	);
		// 	$this->db->insert('tbl_pendidikan', $data_pendidikan_non_formal);
		// }

		// //INSERT DATA PENGALAMAN ORGANISASI
		// foreach($this->input->post('addmore4') as $items) {
		// 	$data_pengalaman_organisasi = array (
		// 		'id_karyawan' => $latest_id_karyawan,
		// 		'tanggal_awal' => $items['tahun_awal_organisasi'],
		// 		'tanggal_akhir' => $items['tahun_akhir_organisasi'],
		// 		'nama_organisasi' => $items['nama_organisasi'],
		// 		'alamat_organisasi' => $items['alamat_organisasi'],
		// 		'bidang_organisasi' => $items['bidang_organisasi'],
		// 		'posisi' => $items['posisi_organisasi']
		// 	);
		// 	$this->db->insert('tbl_pengalaman_organisasi', $data_pengalaman_organisasi);
		// }

		// //INSERT DATA RIWAYAT PEKERJAAN
		// foreach($this->input->post('addmore5') as $items) {
		// 	$data_riwayat_pekerjaan = array (
		// 		'id_karyawan' => $latest_id_karyawan,
		// 		'awal_tahun' => $items['tahun_awal_pekerjaan'],
		// 		'akhir_tahun' => $items['tahun_akhir_pekerjaan'],
		// 		'nama_instansi' => $items['nama_instansi'],
		// 		'alamat_instansi' => $items['alamat_instansi'],
		// 		'jabatan' => $items['riwayat_jabatan'],
		// 		'tugas_pekerjaan' => $items['riwayat_tugas'],
		// 		'alasan_berhenti' => $items['alasan_berhenti'],
		// 		'total_penghasilan' => $items['total_penghasilan_sebelumnya']
		// 	);
		// 	$this->db->insert('tbl_riwayat_pekerjaan', $data_riwayat_pekerjaan);
		// }

		// //INSERT DATA REFERENSI
		// foreach($this->input->post('addmore6') as $items) {
		// 	$data_referensi_pekerjaan = array (
		// 		'id_karyawan' => $latest_id_karyawan,
		// 		'nama' => $items['referensi_nama'],
		// 		'alamat' => $items['referensi_alamat'],
		// 		'telp' => $items['referensi_telp'],
		// 		'alamat_pekerjaan' => $items['referensi_alamat_pekerjaan'],
		// 		'jabatan' => $items['referensi_jabatan'],
		// 		'hubungan' => $items['referensi_hubungan'],
		// 		'prestasi' => $items['referensi_prestasi'],
		// 		'foto_referensi' => '0'
		// 	);
		// 	$this->db->insert('tbl_referensi_pekerjaan', $data_referensi_pekerjaan);
		// }

		// //INSERT PENGUASAAN BAHASA
		// foreach($this->input->post('addmore7') as $items) {
		// 	$data_bahasa = array (
		// 		'id_karyawan' => $latest_id_karyawan,
		// 		'bahasa_asing' => $items['penguasaan_bahasa'],
		// 		'lisan' => $items['penguasaan_lisan'],
		// 		'asing' => $items['penguasaan_tulis'],
		// 	);
		// 	$this->db->insert('tbl_penguasaan', $data_bahasa);
		// }

		// //INSERT PENGUASAAN KOMPUTER
		// foreach($this->input->post('addmore8') as $items) {
		// 	$data_komputer = array (
		// 		'id_karyawan' => $latest_id_karyawan,
		// 		'nama_aplikasi' => $items['penguasaan_komputer'],
		// 	);
		// 	$this->db->insert('tbl_penguasaan_komputer', $data_komputer);
		// }

		// //INSERT DATA KONTAK DARURAT
		// $data_kontak_darurat = array (
		// 	'id_karyawan' => $latest_id_karyawan,
		// 	'nama' => $this->input->post('nama_kontak_darurat'),
		// 	'hubungan' => $this->input->post('hubungan_kontak_darurat'),
		// 	'alamat' => $this->input->post('alamat_kontak_darurat'),
		// 	'telephone' => $this->input->post('telephone_kontak_darurat')
		// );
		// $this->db->insert('tbl_kontak_darurat', $data_kontak_darurat);

		//INSERT DATA PEMOHON PEKERJAAN
		$data_pemohon = array (
			'id_karyawan' => $latest_id_karyawan,
			'jabatan_harapan' => $this->input->post('jabatan_harapan'),
			'gaji_saat_ini' => $this->input->post('penghasilan_saat_ini'),
			'perolehan_gaji_dari' => $this->input->post('didapatkan_dari'),
			'harapan_penghasilan' => $this->input->post('harapan_penghasilan'),
			'tanggal_siap_kerja' => $this->input->post('tanggal_siap_kerja'),
			'tranportasi' => '0',
			'pernyataan' => '1'
		);
		$this->db->insert('tbl_pemohon_pekerjaan', $data_pemohon);

		return true;
    }

}
?>