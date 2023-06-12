<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class KJModel extends CI_Model {

	public function add_kj($tb,$dat){  
        $result = $this->db->insert($tb,$dat);
        return $result;
    }

    public function del($id,$table){
		$this->db->where($id);
		$this->db->delete($table);
	}

	public function get_edit($id){
		$query=$this->db->query("SELECT*FROM tb_kj WHERE id_kj='$id'");
		if($query->num_rows()>0){
			foreach ($query->result() as $value) {
				$data=array(
					'id_kj'      => $value->id_kj,
					'nip'        => $value->nip,
					'nama'       => $value->nama,
					'jabatan'    => $value->jabatan,
					'gol'        => $value->gol,
					'unit_kerja' => $value->unit_kerja,
					'usulan_kj'  => $value->usulan_kj,
					'tgl_usulan' => $value->tgl_usulan,
					'status'     => $value->status
				);
			}
		}
		return $data;
	}

	public function edit_kj($table,$data,$id){
		$this->db->set($data);
		$this->db->where($id);
		$this->db->update($table,$data);
	}

}
