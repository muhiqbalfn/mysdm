<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class PensiunModel extends CI_Model {

	/*public function getPensiun($tb){
		$this->db->from('tb_pensiun');
		$this->db->order_by('id_pensiun','desc');
		return $this->db->get()->result();
	}*/

	public function add_pensiun($tb,$dat){  
        $result = $this->db->insert($tb,$dat);
        return $result;
    }

    public function del($id,$table){
		$this->db->where($id);
		$this->db->delete($table);
	}

	public function get_edit($id){
		$query=$this->db->query("SELECT*FROM tb_pensiun WHERE id_pensiun='$id'");
		if($query->num_rows()>0){
			foreach ($query->result() as $value) {
				$data=array(
					'id_pensiun' 	=> $value->id_pensiun,
					'nip'        	=> $value->nip,
					'nama'       	=> $value->nama,
					'tmp_lahir'    	=> $value->tmp_lahir,
					'tgl_lahir'     => $value->tgl_lahir,
					'gol' 			=> $value->gol,
					'tgl_pensiun' 	=> $value->tgl_pensiun,
					'tgl_kirim' 	=> $value->tgl_kirim,
					'status_sk'    	=> $value->status_sk,
					'tgl_terima'    => $value->tgl_terima,
					'ket' 			=> $value->ket,
					'jabatan' 	   	=> $value->jabatan,
					'unit_kerja'   	=> $value->unit_kerja,
					'jenis_pegawai' => $value->jenis_pegawai,
					'jenis_pensiun' => $value->jenis_pensiun
				);
			}
		}
		return $data;
	}

	public function edit_pensiun($table,$data,$id){
		$this->db->set($data);
		$this->db->where($id);
		$this->db->update($table,$data);
	}

}
