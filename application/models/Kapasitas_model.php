<?php 

class Kapasitas_model extends CI_Model{
    public function getKapasitas(){
        return $this->db->get_where('kapasitas_server',['id_kapasitas'=>'1'])->row_array();
    }
    public function updateKapasitas($kapasitas){
        $this->db->where('id_kapasitas','1');
        $this->db->update('kapasitas_server',['kapasitas'=>$kapasitas]);
        return $this->db->affected_rows();
    }
}