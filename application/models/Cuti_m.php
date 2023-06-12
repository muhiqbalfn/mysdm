<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Cuti_m extends CI_Model {

	public function judulcuti($idjeniscuti){
		$this->db->from('tb_cuti_jeniscuti');
		$this->db->where('id_jeniscuti',$idjeniscuti);
		return $this->db->get()->result();
	}

	public function getcutipenting(){
		$this->db->from('tb_cuti_cutipenting');
		$this->db->where('id_cutipenting !=',0);
		return $this->db->get()->result();
	}

	public function getdatausulan(){
		$nip = $this->session->userdata('nip');

		$this->db->from('tb_cuti_usulancuti');
		$this->db->join('tb_cuti_jeniscuti','tb_cuti_jeniscuti.id_jeniscuti=tb_cuti_usulancuti.id_jeniscuti');
		$this->db->join('tb_pegawai','tb_pegawai.nip=tb_cuti_usulancuti.nip');
		$this->db->where('tb_pegawai.nip',$nip);
		$this->db->where('statususulancuti',0);
		return $this->db->get()->result();
	}

	public function getriwayat(){
		$nip = $this->session->userdata('nip');

		$this->db->from('tb_cuti_usulancuti');
		$this->db->join('tb_cuti_jeniscuti','tb_cuti_jeniscuti.id_jeniscuti=tb_cuti_usulancuti.id_jeniscuti');
		$this->db->join('tb_pegawai','tb_pegawai.nip=tb_cuti_usulancuti.nip');
		$this->db->where('tb_pegawai.nip',$nip);
		$this->db->order_by('idusulancuti','asc');
		return $this->db->get()->result();
	}

	public function getpass(){
		$nip = $this->session->userdata('nip');

		$this->db->from('tb_pegawai');
		$this->db->where('nip',$nip);
		return $this->db->get()->result();
	}




	#LIST CUTI UNTUK ADMIN FAKULTAS -----------------------------
	public function getusulancuti(){
		$parentsatker = $this->session->userdata('parentsatker');

		$this->db->from('tb_cuti_usulancuti');
		$this->db->join('tb_cuti_jeniscuti','tb_cuti_jeniscuti.id_jeniscuti=tb_cuti_usulancuti.id_jeniscuti');
		$this->db->join('tb_pegawai','tb_pegawai.nip=tb_cuti_usulancuti.nip');
		$this->db->join('tb_cuti_cutipenting','tb_cuti_cutipenting.id_cutipenting=tb_cuti_usulancuti.id_cutipenting');
		$this->db->where('statususulancuti !=',0);
		$this->db->where('namaparentsatker',$parentsatker);
		$this->db->order_by('statususulancuti');
		$this->db->order_by('idusulancuti','desc');
		return $this->db->get()->result();
	}

}
