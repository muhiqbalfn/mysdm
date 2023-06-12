<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Pangkat_m extends CI_Model {

	public function get_kp_periode(){
		$this->db->from('tb_kp_periode');
		$this->db->where('waktu_selesai >=',date('Y-m-d'));
		return $this->db->get()->result();
	}




	#==============================HOME=============================
	public function get_kp_dosen(){
		$parentsatker = $this->session->userdata('parentsatker');
		$this->db->from('tb_kp_dosen');
		$this->db->join('tb_pegawai','tb_pegawai.nip=tb_kp_dosen.nip');
		$this->db->where('namaparentsatker',$parentsatker);
		return $this->db->get()->result();
	}

	public function get_kp_tendik(){
		$parentsatker = $this->session->userdata('parentsatker');
		$this->db->from('tb_kp_tendik');
		$this->db->join('tb_pegawai','tb_pegawai.nip=tb_kp_tendik.nip');
		$this->db->where('namaparentsatker',$parentsatker);
		return $this->db->get()->result();
	}




	#===========================DETAIL BERKAS==========================
	public function get_berkas_dosen($id_kp_dosen){
		$this->db->from('tb_kp_dosen');
		$this->db->join('tb_pegawai','tb_pegawai.nip=tb_kp_dosen.nip');
		$this->db->where('id_kp_dosen',$id_kp_dosen);
		return $this->db->get()->result();
	}

	public function get_berkas_tendik($id_kp_tendik){
		$this->db->from('tb_kp_tendik');
		$this->db->join('tb_pegawai','tb_pegawai.nip=tb_kp_tendik.nip');
		$this->db->where('id_kp_tendik',$id_kp_tendik);
		return $this->db->get()->result();
	}


}	