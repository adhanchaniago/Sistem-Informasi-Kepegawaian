<?php 

class Pengalaman_model extends CI_Model{
    public function insertPengalamanPegawai($data){
        $this->db->insert('pengalaman_kerja',$data);
     return $this->db->affected_rows();
    }

    public function getPengalamanPegawai($nip){
        return $this->db->get_where('pengalaman_kerja',['nip'=>$nip])->result_array();
    }

    public function getPengalamanPegawaiById($id){
        return $this->db->get_where('pengalaman_kerja',['id_kerja'=>$id])->row_array();
    }

    public function deletePengalamanPegawai($id){
        $this->db->delete('pengalaman_kerja',['id_kerja' => $id]);
        return $this->db->affected_rows();
    }

    public function updatePengalamanPegawai($data,$id){
        $this->db->where('id_kerja',$id);
        $this->db->update('pengalaman_kerja',$data);
        return $this->db->affected_rows();
    }
}