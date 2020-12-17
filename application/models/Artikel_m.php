<?php

class Artikel_m extends CI_Model
{
	public function getAll2(){
		return $this->db->get('tb_artikel');
	}

	public function detail_artikel($id = NULL){
		$query = $this->db->get_where('tb_artikel', array('id_artikel' => $id))-> row();
		return $query; 
	}

	public function artikelfind($id = '')
    {
        $this->db->select('*')
            ->from('tb_artikel a')
            ->join('tb_member m','m.id_member = a.id_member ')
            ->where('a.status_artikel=1');
            

        if ($id){
            $this->db->where('a.id_artikel', $id);
        }

        return $this->db->get();
    }

    public function artikelview($id = '')
    {

        $this->db->select('*, a.id_artikel as artikel_id, COUNT(k.id_artikel) as jml_komentar')
            ->from('tb_artikel a')
            ->join('tb_member m','a.id_member = m.id_member')
            ->join('tb_komentar k','a.id_artikel = k.id_artikel ', 'left')
            ->where('a.status_artikel=1')
            ->group_by('k.id_artikel')
            ->ORDER_BY('tanggal_artikel DESC');

        if ($id){
            $this->db->where('a.id_artikel', $id);
        }

        return $this->db->get();
    }

    public function komentarview($id = '')
    {
        $this->db->select('*')
            ->from('tb_member m')
            ->join('tb_artikel a','m.id_member = a.id_member ')
            ->join('tb_komentar k','a.id_artikel = k.id_artikel ');

        if ($id){
            $this->db->where('a.id_artikel', $id);
        }

        return $this->db->get();
    }

    public function artikelpopuler($id = '')
    {
        $this->db->select('*')
            ->from('tb_artikel')
            ->order_by('artikel_dilihat', 'desc');
            

        if ($id){
            $this->db->where('id_artikel', $id);
        }

        return $this->db->get();
    }

    public function add_data($post){
        $data['id_artikel'] = $post['id_artikel'];
        $data['nama_komentar'] = $post['nama_komentar'];
        $data['email_komentar'] = $post['email_komentar'];
        $data['no_tlp'] = $post['no_tlp'];
        $data['deskripsi_komentar'] = $post['deskripsi_komentar'];
        $this->db->insert('tb_komentar', $data);
    }
}