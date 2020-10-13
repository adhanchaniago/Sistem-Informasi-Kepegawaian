<?php 

class Subbid_model extends CI_Model{
    public function insertStaffSubBidPegawai($data){
        $this->db->insert('staffsubbid',$data);
        return $this->db->affected_rows();
    }

    public function getStaffSubBidPegawai($nip){
        $this->db->select('*');
        $this->db->from('staffsubbid');
        $this->db->where('nip',$nip);
        $this->db->join('subbidang','staffsubbid.id_subbidang=subbidang.id_subbidang');
        return $this->db->get()->row_array();
    }

    public function getStaffSubBidPegawaiById($id){
        return $this->db->get_where('staffsubbid',['id_staffsubbid'=>$id])->row_array();
    }

    public function updateStaffSubBidPegawai($data,$id){
        $this->db->where('id_staffsubbid',$id);
        $this->db->update('staffsubbid',$data);
        return $this->db->affected_rows();
    }

    public function insertSubBidang($data){
        $this->db->insert('subbidang',$data);
        return $this->db->affected_rows();
    }

    public function updateSubBidang($data,$id){
        $this->db->where('id_subbidang',$id);
        $this->db->update('subbidang',$data);
        return $this->db->affected_rows();
    }
    
    public function deleteSubBidang($id){
        $this->db->delete('subbidang',['id_subbidang'=>$id]);
        return $this->db->affected_rows();
    }
    public function getAllSubBidang(){
        return $this->db->get('subbidang')->result_array();
    }
    public function getSubBidangByBidang($id_bidang){
        return $this->db->get_where('subbidang',['id_bidang'=>$id_bidang])->result_array();
    }
    public function getSubBidangById($id){
        return $this->db->get_where('subbidang',['id_subbidang'=>$id])->result_array();
    }
    
    public function deleteStaffSubBidPegawai($id){
        $this->db->delete('staffsubbid',['id_staffsubbid'=>$id]);
        return $this->db->affected_rows();
    }
    public function deleteStaffSubBidPegawaiByNip($nip){
        $this->db->delete('staffsubbid',['nip'=>$nip]);
        return $this->db->affected_rows();
    }
}