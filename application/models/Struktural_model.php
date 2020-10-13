<?php 

class Struktural_model extends CI_Model{
    public function getAllStruktural(){
        return $this->db->get('jabatan_struktural')->result_array();
    }
    public function getAllEselon(){
        return $this->db->get('eselon')->result_array();
    }

    public function insertStruktural($data){
        $this->db->insert('jabatan_struktural',$data);
        return $this->db->affected_rows();
    }

    public function getJabatanStruktural($id){
        return $this->db->get_where('jabatan_struktural',["id_jabatan"=>$id])->row_array();
    }       
    public function getStrukturalPegawai($id){
        return $this->db->get_where('struktural',['id_struktural'=>$id])->row_array();
    }
    public function checkLevelJabatan($id){
        $this->db->select('jabatan_struktural.level_jabatan');
        $this->db->from('struktural');
        $this->db->join('jabatan_struktural','struktural.id_jabatan=jabatan_struktural.id_jabatan');
        $this->db->where('struktural.id_struktural',$id);
        return $this->db->get()->row_array();
    }
    public function getStrukturalTerakhirPegawai($nip){
        $this->db->select('*');
        $this->db->from('struktural');
        $this->db->join('jabatan_struktural','struktural.id_jabatan=jabatan_struktural.id_jabatan');
        $this->db->where('nip',$nip);
        $this->db->where('status','1');
        return $this->db->get()->row_array();
    }

    public function insertEselon($gol){
        $this->db->insert('eselon',['gol_eselon'=>$gol]);
        return $this->db->affected_rows();
    }

    public function insertStrukturalPegawai($data){
        $data['file_sk']=$this->_uploadPdf();
        $this->db->insert('struktural',$data);
        return $this->db->affected_rows();
    }

    private function _uploadPdf()
    {
        $config['upload_path']          = './upload/pdf/sk/';
        $config['allowed_types']        = 'pdf|jpg|png';
        $config['file_name']            = md5(uniqid());
        $config['overwrite']			= true;
        $config['max_size']             = 3072; // 2MB
        // $config['max_width']            = 1024;
        // $config['max_height']           = 768;

        $this->load->library('upload', $config);

        if ($this->upload->do_upload('file_sk')) {
            return $this->upload->data("file_name");
        }
        
        return "default.jpg";
    }

    private function _deleteFile($id){
        $struktural = $this->getStrukturalPegawai($id);
        if ($struktural['file_sk'] != "default.jpg"){
            $filename = explode(".", $struktural['file_sk'])[0];
            return array_map('unlink',glob(FCPATH."upload/pdf/sk/$filename.*"));
        }
    }

    public function deleteStruktural($id){
        $this->db->delete('jabatan_struktural',['id_jabatan'=>$id]);
        return $this->db->affected_rows();
    }

    public function deleteEselon($id){
        $this->db->delete('eselon',['id_eselon'=>$id]);
        return $this->db->affected_rows();
    }

    
    public function updateStrukturalPegawai($data){

        if (!empty($_FILES["file_sk"]["name"])) {
            $this->_deleteFile($this->input->post('id_struktural'));
            $data['file_sk'] = $this->_uploadPdf();
        }

        $this->db->where('id_struktural',$this->input->post('id_struktural'));
        $this->db->update('struktural',$data);

        return $this->db->affected_rows();
    }

    
    public function deleteStrukturalPegawai($id){
        $this->_deleteFile($id);
        $this->db->delete('struktural',['id_struktural' => $id]);
        return $this->db->affected_rows();
    }
    
    public function updateStatusStruktural($nip){
        $this->db->where('status','1');
        $this->db->where('nip',$nip);
        $this->db->update('struktural',['status'=>'0']);
    }

    public function setStrukturalTerakhir($id,$nip){
        $this->updateStatusStruktural($nip);
        $this->db->where('id_struktural',$id);
        $this->db->update('struktural',['status'=>'1']);

        return $this->db->affected_rows();
    }
}