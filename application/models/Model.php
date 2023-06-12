<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Model extends CI_Model {

	public function getAll($tb){
		$this->db->from($tb);
		return $this->db->get()->result();
	}

	public function getAllwhere($tb,$kolom,$where,$id){
		$this->db->from($tb);
		$this->db->where($kolom,$where);
		$this->db->order_by($id,'desc');
		return $this->db->get()->result();
	}

	public function get_tubel_dosen(){
		$this->db->from('tb_tubel');
		$this->db->where('jenis_pegawai','dosen');
		$this->db->order_by('id_tubel','desc');
		return $this->db->get()->result();
	}

	public function get_tubel_tendik(){
		$this->db->from('tb_tubel');
		$this->db->where('jenis_pegawai','tendik');
		$this->db->order_by('id_tubel','desc');
		return $this->db->get()->result();
	}

	public function get_pensiun_dosen(){
		$this->db->from('tb_pensiun');
		$this->db->where('jenis_pegawai','dosen');
		$this->db->order_by('id_pensiun','desc');
		return $this->db->get()->result();
	}

	public function get_pensiun_tendik(){
		$this->db->from('tb_pensiun');
		$this->db->where('jenis_pegawai','tendik');
		$this->db->order_by('id_pensiun','desc');
		return $this->db->get()->result();
	}

	//COUNT TOTAL USULAN
	public function count_kp_dosen(){
		$query = $this->db->query("SELECT COUNT(nip) AS jml FROM tb_kp WHERE jenis_pegawai='dosen'");
		return $query->row();
	}
	public function count_kp_tendik(){
		$query = $this->db->query("SELECT COUNT(nip) AS jml FROM tb_kp WHERE jenis_pegawai='tendik'");
		return $query->row();
	}
	public function count_kj_dosen(){
		$query = $this->db->query("SELECT COUNT(nip) AS jml FROM tb_kj WHERE jenis_pegawai='dosen'");
		return $query->row();
	}
	public function count_kj_tendik(){
		$query = $this->db->query("SELECT COUNT(nip) AS jml FROM tb_kj WHERE jenis_pegawai='tendik'");
		return $query->row();
	}
	public function count_tubel(){
		$query = $this->db->query("SELECT COUNT(nip) AS jml FROM tb_tubel");
		return $query->row();
	}
	public function count_pensiun(){
		$query = $this->db->query("SELECT COUNT(nip) AS jml FROM tb_pensiun");
		return $query->row();
	}

	public function get_user(){
		$this->db->from('tb_user');
		return $this->db->get()->result();
	}

	#IMPORT DATA PEGAWAI FORM I-SDM ===========================================
	public function importjson_peg_isdm($data){
		$this->db->insert('tb_pegawai', $data);
	}

}
