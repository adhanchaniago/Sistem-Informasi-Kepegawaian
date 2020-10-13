<?php 

class Seminar_model extends CI_Model{
    public function insertSeminarPegawai($data){
        $data['file_seminar']=$this->_uploadPdf();
        $this->db->insert('seminar',$data);
        return $this->db->affected_rows();
    }

    public function getSeminarPegawai($nip){
        $this->db->order_by('tanggal_seminar','ASC');
        return $this->db->get_where('seminar',['nip'=>$nip])->result_array();
    }

    public function getSeminarPegawaiById($id){
       return $this->db->get_where('seminar',['id_seminar'=>$id])->row_array();
    }

    public function deleteSeminarPegawai($id){
        $this->_deleteFile($id);
        $this->db->delete('seminar',['id_seminar' => $id]);
        return $this->db->affected_rows();
    }
    private function _uploadPdf()
    {
        $config['upload_path']          = './upload/pdf/seminar/';
        $config['allowed_types']        = 'pdf|jpg|png';
        $config['file_name']            = md5(uniqid());
        $config['overwrite']			= true;
        $config['max_size']             = 3072; // 2MB
        // $config['max_width']            = 1024;
        // $config['max_height']           = 768;

        $this->load->library('upload', $config);

        if ($this->upload->do_upload('file_seminar')) {
            return $this->upload->data("file_name");
        }
        
        return "default.jpg";
    }

    private function _deleteFile($id){
        $pangkat = $this->getSeminarPegawaiById($id);
        if ($pangkat['file_seminar'] != "default.jpg"){
            $filename = explode(".", $pangkat['file_seminar'])[0];
            return array_map('unlink',glob(FCPATH."upload/pdf/seminar/$filename.*"));
        }
    }
    
    public function updateSeminarPegawai($data,$id){

        if (!empty($_FILES["file_seminar"]["name"])) {
            $this->_deleteFile($id);
            $data['file_seminar'] = $this->_uploadPdf();
        }

        $this->db->where('id_seminar',$id);
        $this->db->update('seminar',$data);

        return $this->db->affected_rows();
    }
    
}