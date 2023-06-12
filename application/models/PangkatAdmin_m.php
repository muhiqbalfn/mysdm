<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class PangkatAdmin_m extends CI_Model {

	public function get_edit_periode($id){
		$query=$this->db->query("SELECT*FROM tb_kp_periode WHERE id_periode='$id'");
		if($query->num_rows()>0){
			foreach ($query->result() as $value) {
				$data=array(
					'id_periode' 		   => $value->id_periode,
					'nama_periode'         => $value->nama_periode,
					'waktu_mulai'          => $value->waktu_mulai,
					'waktu_selesai'    	   => $value->waktu_selesai,
					'catatan_periode'      => $value->catatan_periode
				);
			}
		}
		return $data;
	}






	#==============================DAFTAR KP PEGAWAI===========================
	public function get_periode($id_periode){
		$this->db->from('tb_kp_periode');
		$this->db->where('id_periode',$id_periode);
		return $this->db->get()->result();
	}

	#DOSEN--------------------
	public function get_dosen(){
		$this->db->from('tb_pegawai');
		$this->db->where('isdosen',1);
		$this->db->where('namastatuspegawai','PNS');
		$this->db->where('idstatusaktif','A');
		$this->db->order_by('namalengkap','ASC');
		return $this->db->get()->result();
	}

	public function get_pegawai_kp_dosen($id_periode){
		$this->db->from('tb_kp_dosen');
		$this->db->join('tb_pegawai','tb_pegawai.nip=tb_kp_dosen.nip');
		$this->db->where('id_periode',$id_periode);
		return $this->db->get()->result();
	}

	#TENDIK-------------------
	public function get_tendik(){
		$this->db->from('tb_pegawai');
		$this->db->where('isdosen',0);
		$this->db->where('namastatuspegawai','PNS');
		$this->db->where('idstatusaktif','A');
		$this->db->order_by('namalengkap','ASC');
		return $this->db->get()->result();
	}

	public function get_pegawai_kp_tendik($id_periode){
		$this->db->from('tb_kp_tendik');
		$this->db->join('tb_pegawai','tb_pegawai.nip=tb_kp_tendik.nip');
		$this->db->where('id_periode',$id_periode);
		return $this->db->get()->result();
	}






	#==============================DETAIL BERKAS===================================
	
	#DOSEN-------------------
	public function get_kp_dosen($id_kp_dosen){
		$this->db->from('tb_kp_dosen');
		$this->db->join('tb_pegawai','tb_pegawai.nip=tb_kp_dosen.nip');
		$this->db->where('id_kp_dosen',$id_kp_dosen);
		return $this->db->get()->result();
	}

	#TENDIK-------------------
	public function get_kp_tendik($id_kp_tendik){
		$this->db->from('tb_kp_tendik');
		$this->db->join('tb_pegawai','tb_pegawai.nip=tb_kp_tendik.nip');
		$this->db->where('id_kp_tendik',$id_kp_tendik);
		return $this->db->get()->result();
	}

}
