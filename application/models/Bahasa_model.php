<?php 

class Bahasa_model extends CI_Model{
    public function insertBahasaPegawai($data){
        $this->db->insert('bahasa',$data);
        return $this->db->affected_rows();
    }

    public function getBahasaPegawai($nip){
        return $this->db->get_where('bahasa',['nip'=>$nip])->result_array();
    }

    public function getBahasaPegawaiById($id){
        return $this->db->get_where('bahasa',['id_bahasa'=>$id])->row_array();
    }

    public function updateBahasaPegawai($data,$id){
        $this->db->where('id_bahasa',$id);
        $this->db->update('bahasa',$data);
        return $this->db->affected_rows();
    }

    public function deleteBahasaPegawai($id){
        $this->db->delete('bahasa',['id_bahasa'=>$id]);
        return $this->db->affected_rows();
    }
}