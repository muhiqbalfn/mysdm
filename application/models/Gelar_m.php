<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Gelar_m extends CI_Model {

	public function get_pg_pegawai(){
		$parentsatker = $this->session->userdata('parentsatker');

		$this->db->from('tb_pg');
		$this->db->join('tb_pegawai','tb_pegawai.nip=tb_pg.nip');
		$this->db->where('namaparentsatker',$parentsatker);
		return $this->db->get()->result();
	}

	public function get_pg_berkas($id_pg){
		$this->db->from('tb_pg');
		$this->db->join('tb_pegawai','tb_pegawai.nip=tb_pg.nip');
		$this->db->where('id_pg',$id_pg);
		return $this->db->get()->result();
	}

	public function get_pegawai_unit(){
		$parentsatker = $this->session->userdata('parentsatker');

		$this->db->from('tb_pegawai');
		$this->db->where('namaparentsatker',$parentsatker);
		return $this->db->get()->result();
	}


}
