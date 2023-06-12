<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class CutiAdmin_m extends CI_Model {

	public function getusulancuti(){
		$this->db->from('tb_cuti_usulancuti');
		$this->db->join('tb_cuti_jeniscuti','tb_cuti_jeniscuti.id_jeniscuti=tb_cuti_usulancuti.id_jeniscuti');
		$this->db->join('tb_pegawai','tb_pegawai.nip=tb_cuti_usulancuti.nip');
		$this->db->join('tb_cuti_cutipenting','tb_cuti_cutipenting.id_cutipenting=tb_cuti_usulancuti.id_cutipenting');
		$this->db->where('statususulancuti !=',0);
		$this->db->order_by('statususulancuti');
		$this->db->order_by('idusulancuti','desc');
		return $this->db->get()->result();
	}

	public function getsuratizin($id){
		$this->db->from('tb_cuti_usulancuti');
		$this->db->join('tb_cuti_jeniscuti','tb_cuti_jeniscuti.id_jeniscuti=tb_cuti_usulancuti.id_jeniscuti');
		$this->db->join('tb_cuti_cutipenting','tb_cuti_cutipenting.id_cutipenting=tb_cuti_usulancuti.id_cutipenting');
		$this->db->join('tb_pegawai','tb_pegawai.nip=tb_cuti_usulancuti.nip');
		$this->db->where('idusulancuti',$id);
		return $this->db->get()->result();
	}

	#AJUAN CUTI
	public function get_edit_proses($id){
		$query=$this->db->query("SELECT*FROM tb_cuti_usulancuti WHERE idusulancuti='$id'");
		if($query->num_rows()>0){
			foreach ($query->result() as $value) {
				$data=array(
					'idusulancuti'      => $value->idusulancuti,
					'nip'    			=> $value->nip,
					'file_izincuti'    	=> $value->file_izincuti,
					'no_suratizin'    	=> $value->no_suratizin,
					'tgl_suratizin'    	=> $value->tgl_suratizin
				);
			}
		}
		return $data;
	}

	public function get_edit_usulan($id){
		$query=$this->db->query("SELECT*FROM tb_cuti_usulancuti WHERE idusulancuti='$id'");
		if($query->num_rows()>0){
			foreach ($query->result() as $value) {
				$data=array(
					'idusulancuti'      => $value->idusulancuti,
					'nip'    			=> $value->nip,
					'tgl_mulai'     	=> $value->tgl_mulai,
					'tgl_selesai'     	=> $value->tgl_selesai,
					'anak_ke'    		=> $value->anak_ke,
					'id_jeniscuti'      => $value->id_jeniscuti,
					'id_cutipenting'    => $value->id_cutipenting,
					'file_usulancuti'   => $value->file_usulancuti
				);
			}
		}
		return $data;
	}

}
