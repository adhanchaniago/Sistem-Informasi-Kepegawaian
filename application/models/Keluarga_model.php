<?php 

class Keluarga_model extends CI_Model{
    public function getKeluargaPegawai($nip){
        return $this->db->get_where('keluarga',['nip'=>$nip])->result_array();
    }

    public function insertKeluargaPegawai($data){
        $this->db->insert('keluarga',$data);
        return $this->db->affected_rows();
    }

    public function getKeluargaPegawaiById($id){
        return $this->db->get_where('keluarga',['id_keluarga'=>$id])->row_array();
    }

    public function deleteKeluargaPegawai($id){
        $this->db->delete('keluarga',['id_keluarga'=>$id]);
        return $this->db->affected_rows();
    }

    public function updateKeluargaPegawai($data,$id){
        $this->db->where('id_keluarga',$id);
        $this->db->update('keluarga',$data);
        return $this->db->affected_rows();
    }
}