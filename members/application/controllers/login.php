<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_Controller {

	function __construct(){
		parent::__construct();
		$this->load->library('session');
		$this->load->model('member_m');
        $this->load->model('anggota_m');
        $this->load->library('form_validation');
	}
		
	public function index() {
		$this->load->view('member/login');
	}

	public function getlogin() {
		$user = $this->input->post('username');
		$pass = $this->input->post('password');
		$user = $this->auth->log_admin($user,$pass);
			if($user==true){
				$this->session->set_userdata('id_member',$user->id_member);
				$this->session->set_userdata('username',$user->username);
				$this->session->set_userdata('nama_member',$user->nama_member);
				$this->session->set_userdata('profesi_member',$user->profesi_member);
				$this->session->set_userdata('password',$user->password);
				$this->session->set_userdata('view_password',$user->view_password);
				$this->session->set_userdata('id_kategori',$user->id_kategori);
				
				if ($this->session->userdata('id_kategori') == '1') {
					$data['hasil'] = 1;
					echo json_encode($data);
				}
				else if ($this->session->userdata('id_kategori') == '2'){
					$data['hasil'] = 2;
					echo json_encode($data);
				}
				else if ($this->session->userdata('id_kategori') == '3'){
					$data['hasil'] = 3;
					echo json_encode($data);
				}
				else{
					$data['hasil'] = 4;
					echo json_encode($data);	
				}
			}else{
				$data['hasil'] = 0;
				echo json_encode($data);
			}
    }
    
    //REGISTRASI
    public function pilih_jenis_member() {
        $this->load->view('member/jenis_member');
    }

    private function regisrasi_rules() {
        $this->form_validation->set_rules('username', 'Username', 'trim|required|is_unique[tb_member.username]|min_length[5]', array('min_length' => '%s minimal 5 karakter'));
        $this->form_validation->set_rules('nama_member', 'Nama Member', 'trim|required|min_length[5]', array('min_length' => '%s minimal 5 karakter'));
        $this->form_validation->set_rules('password', 'Password', 'trim|required|min_length[8]', array('min_length' => '%s minimal 8 karakter'));
        $this->form_validation->set_rules('pasconf', 'Konfirmasi Password', 'trim|required|matches[password]', array('matches' => '%s tidak sesuai dengan password'));

        //KOMUNITAS
        $this->form_validation->set_rules('anggota_id1', 'Komunitas','trim|required');
        $this->form_validation->set_rules('no_anggota', 'Nomor Anggota','trim|required|callback_no_anggota_check');

        //PERUSAHAAN
        $this->form_validation->set_rules('anggota_id2', 'Instansi/Perusahaan','trim|required');
        // $this->form_validation->set_rules('foto_kta1', 'Foto KTA','trim|required');

        //PENDIDIKAN
        $this->form_validation->set_rules('anggota_id3', 'Lembaga Pendidikan','trim|required');
        // $this->form_validation->set_rules('foto_kta2', 'Foto KTA','required');

        $this->form_validation->set_message('required','%s masih kosong silahkan diisi*');
        $this->form_validation->set_message('is_unique','%s ini sudah dipakai, silahkan ganti');
    }

    public function registrasi_personal() {

        $this->regisrasi_rules();

        if ($this->form_validation->run() == FALSE){
            $this->load->view('member/registrasi/personal');
        }
        else{
            $this->insert_registrasi_personal();
        }
    }

    public function registrasi_komunitas() {
        $komunitas = '2';

        $data['komunitas'] = $this->member_m->getKategori($komunitas);

        $this->regisrasi_rules();

        if ($this->form_validation->run() == FALSE){
            $this->load->view('member/registrasi/komunitas', $data);
        }
        else{
            $this->insert_registrasi_komunitas();
        }
    }

    public function registrasi_perusahaan() {
        $instansi = '3';

        $data['instansi'] = $this->member_m->getKategori($instansi);

        $this->regisrasi_rules();

        if ($this->form_validation->run() == FALSE){
            $this->load->view('member/registrasi/perusahaan', $data);
        }
        else{
            $this->insert_registrasi_perusahaan();
        }
    }

    public function registrasi_pendidikan() {
        $pendidikan = '4';

        $data['pendidikan'] = $this->member_m->getKategori($pendidikan);

        $this->regisrasi_rules();

        if ($this->form_validation->run() == FALSE){
            $this->load->view('member/registrasi/pendidikan', $data);
        }
        else{
            $this->insert_registrasi_pendidikan();
        }
    }

    public function no_anggota_check($input){

        $anggota_id1 = $this->input->post('anggota_id1');
        $nama_member = $this->input->post('nama_member');
        $query = "SELECT * FROM tb_anggota WHERE no_anggota = ? AND anggota_id = '".$anggota_id1."' AND nama_anggota = '".$nama_member."'";
        $arg = array( $input );
        $exec = $this->db->query($query, $arg) or die(mysqli_error());

        if ($input != NULL) {

            if ($exec->num_rows() > 0) {
                return TRUE;
            }
            else{
                $this->form_validation->set_message('no_anggota_check','%s tidak sesuai');
                $this->form_validation->set_error_delimiters('<span class="has-fail">','</span>');
                return FALSE;
            }
        }
        else{
            return TRUE;
        }

    }

    private function uploader($upload, $index = array())
    {
        $data = array();

        foreach ($index as $key => $value) {
            if (isset($_FILES[$value]['size']) > 0) {
                if ($upload->upload($value)) {
                    $file_name = $upload->get_file_name();

                    $data[$key] = $file_name;
                } else {
                    return false;
                }
            } else {
                $data[$key] = null;
            }
        }

        return $data;
    }

    public function insert_registrasi_personal() {

        $username = $this->input->post('username');
        $nama_member = $this->input->post('nama_member');
        $password = md5($this->input->post("password"));
        $view_password = $this->input->post('password');
        $id_kategori = $this->input->post('id_kategori');

        $dataInsert['username'] = $username;
        $dataInsert['nama_member'] = $nama_member;
        $dataInsert['password'] = $password;
        $dataInsert['view_password'] = $view_password;
        $dataInsert['id_kategori'] = $id_kategori;

        // if ($this->member_m->insert($dataInsert)) {
        //     echo "<script>alert('Registrasi Akun Berhasil!!'); </script>";
        //     echo "<script>window.location='".base_url('login')."';</script>";
        // } else {
        //     echo "<script>alert('Registrasi Akun Gagal!!. Silahkan Diulang Kembali'); </script>";
        //     echo "<script>window.location='".site_url('login')."';</script>";        
        // }

        $this->member_m->insert($dataInsert);
        $id_member = $this->db->insert_id();

        $status = $this->input->post('fv_status');
        $data = array();
        $data = [
            'fv_nama' =>$nama_member,
            'id_member' => $id_member,
            'fv_alamat' =>$this->input->post('fv_alamat'),
            'fv_noktp' =>$this->input->post('fv_noktp'),
            'fv_email' =>$this->input->post('fv_email'),
            'fv_nohp' =>$this->input->post('fv_nohp'),
            'f_fcktp' =>$_FILES['fcktp']['name'],
            'fv_gender' =>$this->input->post('fv_gender'),
            'fv_organisasi' =>$this->input->post('fv_organisasi'),
            'fv_keahlian' =>$this->input->post('fv_keahlian'),
            'fd_tgl_lahir' =>$this->input->post('fd_tgl_lahir'),    
        ];
    
            
        if($status=='pekerja'){
            $data['fv_status'] = 'pekerja';
        }else{
            $data['fv_status'] = 'mahasiswa';
        }
    
        $this->db->insert('tm_pribadi',$data);
        $id_ad = $this->db->insert_id();
        
        $sekolah = $this->input->post('sekolah');
        $tahun = $this->input->post('tahun');
        for ($i=0; $i < sizeof($sekolah); $i++) { 
            $data_det[$i]['fv_nama']= $sekolah[$i];
            $data_det[$i]['d_tahun']= $tahun[$i]; 
    
            $data_pri[$i]['fn_idpribadi'] = $id_ad;
            $data_pri[$i]['fv_nama'] =  $data_det[$i]['fv_nama'];
            $data_pri[$i]['d_tahun'] = $data_det[$i]['d_tahun'];
            $this->member_m->insert_riwayat_pendidikan($data_pri[$i]);
        }   
    
        if($this->input->post('fv_status')=='pekerja'){
            $data_status = array(
                'fn_idpribadi' => $id_ad,
                'fv_nama'  => $this->input->post('nama_pekerjaan'),
                'fv_alamat' => $this->input->post('alamat_pekerjaan'),
                'fv_notelp' => $this->input->post('notelp_pekerjaan'),
                'fv_bidang_usaha' => $this->input->post('bidang_pekerjaan'),
                'fv_web' => $this->input->post('web_pekerjaan')
            );
    
            $this->db->insert('tm_pekerjaan',$data_status);
        } else if ($this->input->post('fv_status')=='mahasiswa') {
            $data_status = array(
                'fn_idpribadi' => $id_ad,
                'fv_namakampus'  => $this->input->post('nama_kampus'),
                'fv_jurusan' => $this->input->post('nama_jurusan'),
                'd_tahun_masuk' => $this->input->post('tahun_masuk_kampus'),
            );
    
            $this->db->insert('tm_mahasiswa',$data_status);
        }

        echo "<script>alert('Registrasi Akun Berhasil!!'); </script>";
        echo "<script>window.location='".base_url('login')."';</script>";
    }

    public function insert_registrasi_komunitas()
    {   

        $username = $this->input->post('username');
        $nama_member = $this->input->post('nama_member');
        $anggota_id1 = $this->input->post('anggota_id1');
        $no_anggota = $this->input->post('no_anggota');
        $password = md5($this->input->post("password"));
        $view_password = $this->input->post('password');
        $id_kategori = $this->input->post('id_kategori');

        $dataInsert['username'] = $username;
        $dataInsert['nama_member'] = $nama_member;
        $dataInsert['password'] = $password;
        $dataInsert['view_password'] = $view_password;
        $dataInsert['anggota_id'] = $anggota_id1;
        $dataInsert['no_anggota'] = $no_anggota;
        $dataInsert['id_kategori'] = $id_kategori;

        if ($this->member_m->insert($dataInsert)) {
            echo "<script>alert('Registrasi Akun Berhasil!!'); </script>";
            echo "<script>window.location='".base_url('login')."';</script>";
        } else {
            echo "<script>alert('Registrasi Akun Gagal!!. Silahkan Diulang Kembali'); </script>";
            echo "<script>window.location='".site_url('login')."';</script>";        
        }
    }

    public function insert_registrasi_perusahaan()
    {   

        $username = $this->input->post('username');
        $nama_member = $this->input->post('nama_member');
        $anggota_id2 = $this->input->post('anggota_id2');
        $password = md5($this->input->post("password"));
        $view_password = $this->input->post('password');
        $id_kategori = $this->input->post('id_kategori');

        $upload = new FileUploadLibrary();
        $upload->setConfig(array(
            'upload_path' => realpath('assets/foto'),
            'allowed_types' => 'jpg|png|jpeg',
            'max_size' => 2048, //2 MB
            'encrypt_name' => true
        ));
        $upload->initialize();

        $dataUpload1 = $this->uploader(
            $upload,
            array(
                'foto_kta' => 'foto_kta1'
            )
        );

        $dataInsert['username'] = $username;
        $dataInsert['nama_member'] = $nama_member;
        $dataInsert['password'] = $password;
        $dataInsert['view_password'] = $view_password;
        $dataInsert['id_kategori'] = $id_kategori;
        $dataInsert['anggota_id'] = $anggota_id2;

        foreach ($dataUpload1 as $key => $value) {
            $dataInsert[$key] = $value;
        }

        if ($this->member_m->insert($dataInsert)) {
            echo "<script>alert('Registrasi Akun Berhasil!!'); </script>";
            echo "<script>window.location='".base_url('login')."';</script>";
        } else {
            echo "<script>alert('Registrasi Akun Gagal!!. Silahkan Diulang Kembali'); </script>";
            echo "<script>window.location='".site_url('login')."';</script>";        
        }
    }

    public function insert_registrasi_pendidikan()
    {   
        $username = $this->input->post('username');
        $nama_member = $this->input->post('nama_member');
        $anggota_id3 = $this->input->post('anggota_id3');
        $password = md5($this->input->post("password"));
        $view_password = $this->input->post('password');
        $id_kategori = $this->input->post('id_kategori');

        $upload = new FileUploadLibrary();
        $upload->setConfig(array(
            'upload_path' => realpath('assets/foto'),
            'allowed_types' => 'jpg|png|jpeg',
            'max_size' => 2048, //2 MB
            'encrypt_name' => true
        ));
        $upload->initialize();

        $dataUpload2 = $this->uploader(
            $upload,
            array(
                'foto_kta' => 'foto_kta2'                
            )
        );

        $dataInsert['username'] = $username;
        $dataInsert['nama_member'] = $nama_member;
        $dataInsert['password'] = $password;
        $dataInsert['view_password'] = $view_password;
        $dataInsert['id_kategori'] = $id_kategori;
        $dataInsert['anggota_id'] = $anggota_id3;

        foreach ($dataUpload2 as $key => $value) {
            $dataInsert[$key] = $value;
        }

        if ($this->member_m->insert($dataInsert)) {
            echo "<script>alert('Registrasi Akun Berhasil!!'); </script>";
            echo "<script>window.location='".base_url('login')."';</script>";
        } else {
            echo "<script>alert('Registrasi Akun Gagal!!. Silahkan Diulang Kembali'); </script>";
            echo "<script>window.location='".site_url('login')."';</script>";        
        }
    }

	public function logout(){
		$this->session->sess_destroy();
		redirect('login','refresh');
    }

    // public function registrasi(){

    //     $komunitas = '2';
    //     $instansi = '3';
    //     $pendidikan = '4';

    //     $data['komunitas'] = $this->member_m->getKategori($komunitas);
    //     $data['instansi'] = $this->member_m->getKategori($instansi);
    //     $data['pendidikan'] = $this->member_m->getKategori($pendidikan);
    //     $data['result'] = $this->member_m->getAllKategori();

    //     $this->form_validation->set_rules('username', 'Username', 'trim|required|is_unique[tb_member.username]|min_length[5]', array('min_length' => '%s minimal 5 karakter'));
    //     $this->form_validation->set_rules('nama_member', 'Nama Member', 'trim|required|min_length[5]', array('min_length' => '%s minimal 5 karakter'));
    //     $this->form_validation->set_rules('password', 'Password', 'trim|required|min_length[8]', array('min_length' => '%s minimal 8 karakter'));
    //     $this->form_validation->set_rules('pasconf', 'Konfirmasi Password', 'trim|required|matches[password]', array('matches' => '%s tidak sesuai dengan password'));

    //     $anggota_id1 = $this->input->post("anggota_id1");
    //     $anggota_id2 = $this->input->post("anggota_id2");
    //     $anggota_id3 = $this->input->post("anggota_id3");
    //     $querykmn = "SELECT * FROM tb_member WHERE id_kategori = ? AND id_member = '".$anggota_id1."'";
    //     $queryins = "SELECT * FROM tb_member WHERE id_kategori = ? AND id_member = '".$anggota_id2."'";
    //     $querypdk = "SELECT * FROM tb_member WHERE id_kategori = ? AND id_member = '".$anggota_id3."'";
    //     $kmn = array( $komunitas );
    //     $ins = array( $instansi );
    //     $pdk = array( $pendidikan );
    //     $execkmn = $this->db->query($querykmn, $kmn) or die(mysqli_error());
    //     $execins = $this->db->query($queryins, $ins) or die(mysqli_error());
    //     $execpdk = $this->db->query($querypdk, $pdk) or die(mysqli_error());

    //     if ($anggota_id1 != NULL) {
    //         if ($anggota_id1 == 0) {
    //             if ($anggota_id2 != NULL) {
    //                 if ($anggota_id2 == 0) {
    //                     if ($anggota_id3 != NULL) {
    //                         if ($anggota_id3 == 0) {
    //                             $this->form_validation->set_rules('foto_kta2', 'Foto KTA');
    //                         }
    //                         elseif ($execpdk->num_rows() > 0) {
    //                             $this->form_validation->set_rules('foto_kta2', 'Foto KTA','trim|required');
    //                         }
    //                     }
    //                 }
    //                 elseif ($execins->num_rows() > 0) {
    //                     $this->form_validation->set_rules('foto_kta1', 'Foto KTA','trim|required');
    //                 }
    //             }
    //         }
    //         else if ($execkmn->num_rows() > 0) {
    //             $this->form_validation->set_rules('no_anggota', 'Nomor Anggota','trim|required|callback_no_anggota_check');
    //         }
    //     }
    //     else if ($anggota_id2 != NULL) {
    //         if ($anggota_id2 == 0) {
    //             if ($anggota_id3 != NULL) {
    //                 if ($anggota_id3 == 0) {
    //                     if ($anggota_id1 != NULL) {
    //                         if ($anggota_id1 == 0) {
    //                             $this->form_validation->set_rules('foto_kta2', 'Foto KTA');
    //                         }
    //                         elseif ($execkmn->num_rows() > 0) {
    //                             $this->form_validation->set_rules('no_anggota', 'Nomor Anggota','trim|required|callback_no_anggota_check');
    //                         }
    //                     }
    //                 }
    //                 elseif ($execpdk->num_rows() > 0) {
    //                     $this->form_validation->set_rules('foto_kta2', 'Foto KTA','trim|required');
    //                 }
    //             }
    //         }
    //         else if ($execins->num_rows() > 0) {
    //             $this->form_validation->set_rules('foto_kta1', 'Foto KTA','trim|required');
    //         }
    //     }
    //     else if ($anggota_id3 != NULL) {
    //         if ($anggota_id3 == 0) {
    //             if ($anggota_id1 != NULL) {
    //                 if ($anggota_id1 == 0) {
    //                     if ($anggota_id2 != NULL) {
    //                         if ($anggota_id2 == 0) {
    //                             $this->form_validation->set_rules('foto_kta2', 'Foto KTA');
    //                         }
    //                         elseif ($execins->num_rows() > 0) {
    //                             $this->form_validation->set_rules('foto_kta1', 'Foto KTA','trim|required');
    //                         }
    //                     }
    //                 }
    //                 elseif ($execkmn->num_rows() > 0) {
    //                     $this->form_validation->set_rules('no_anggota', 'Nomor Anggota','trim|required|callback_no_anggota_check');
    //                 }
    //             }
    //         }
    //         else if ($execpdk->num_rows() > 0) {
    //             $this->form_validation->set_rules('foto_kta2', 'Foto KTA','trim|required');
    //         }
    //     }

    //     $this->form_validation->set_message('required','%s masih kosong silahkan diisi*');
    //     $this->form_validation->set_message('is_unique','%s ini sudah dipakai, silahkan ganti');


    //     if ($this->form_validation->run() == FALSE){

    //         $this->load->view('member/registrasi', $data);
    //     }
    //     else{
           
    //         $this->insert_registrasi();
    //     }
    // }

    // public function insert_registrasi()
    // {   

    //     $username = $this->input->post('username');
    //     $nama_member = $this->input->post('nama_member');
    //     $anggota_id1 = $this->input->post('anggota_id1');
    //     $anggota_id2 = $this->input->post('anggota_id2');
    //     $anggota_id3 = $this->input->post('anggota_id3');
    //     $no_anggota = $this->input->post('no_anggota');
    //     $password = md5($this->input->post("password"));
    //     $view_password = $this->input->post('password');
    //     $id_kategori = $this->input->post('id_kategori');

    //     $upload = new FileUploadLibrary();
    //     $upload->setConfig(array(
    //         'upload_path' => realpath('assets/foto'),
    //         'allowed_types' => 'jpg|png|jpeg',
    //         'max_size' => 2048, //2 MB
    //         'encrypt_name' => true
    //     ));
    //     $upload->initialize();

    //     $dataUpload1 = $this->uploader(
    //         $upload,
    //         array(
    //             'foto_kta' => 'foto_kta1'
    //         )
    //     );

    //     $dataUpload2 = $this->uploader(
    //         $upload,
    //         array(
    //             'foto_kta' => 'foto_kta2'                
    //         )
    //     );

    //     $dataInsert['username'] = $username;
    //     $dataInsert['nama_member'] = $nama_member;
    //     $dataInsert['password'] = $password;
    //     $dataInsert['view_password'] = $view_password;
    //     $dataInsert['id_kategori'] = $id_kategori;

    //     if ($anggota_id1 != NULL) {
    //         $dataInsert['anggota_id'] = $anggota_id1;
    //     }
    //     elseif ($anggota_id2 != NULL) {
    //         $dataInsert['anggota_id'] = $anggota_id2;   
    //     }
    //     elseif ($anggota_id3 != NULL) {
    //         $dataInsert['anggota_id'] = $anggota_id3;   
    //     }

    //     if ($no_anggota != NULL) {
    //         $dataInsert['no_anggota'] = $no_anggota;
    //     }

        // if ($dataUpload1 == NULL) {
        //     if ($dataUpload2 != NULL) {
        //         foreach ($dataUpload2 as $key => $value) {
        //             $dataInsert[$key] = $value;
        //         }
        //     }
        // }
        // else{
        //     if ($dataUpload1 != NULL) {
        //         foreach ($dataUpload1 as $key => $value) {
        //             $dataInsert[$key] = $value;
        //         }
        //     }   
        // }

    //     if ($this->member_m->insert($dataInsert)) {
    //         echo "<script>alert('Registrasi Akun Berhasil!!'); </script>";
    //         echo "<script>window.location='".site_url('login')."';</script>";
    //     } else {
    //         echo "<script>alert('Registrasi Akun Gagal!!. Silahkan Diulang Kembali'); </script>";
    //         echo "<script>window.location='".site_url('login/tambah')."';</script>";        
    //     }
    // }

}
