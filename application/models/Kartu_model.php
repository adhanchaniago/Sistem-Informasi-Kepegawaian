<?php 

class Kartu_model extends CI_Model{
    public function insertKartuPegawai($data){
        $data['file_kartu']=$this->_uploadPdf();
        $this->db->insert('kartu',$data);
        return $this->db->affected_rows();
    }

    public function getKartuPegawai($nip){
        return $this->db->get_where('kartu',['nip'=>$nip])->result_array();
    }

    public function getKartuPegawaiById($id){
        return $this->db->get_where('kartu',['id_kartu'=>$id])->row_array();
    }

    public function updateKartuPegawai($data,$id){
        if (!empty($_FILES["file_kartu"]["name"])) {
            $this->_deleteFile($id);
            $data['file_kartu'] = $this->_uploadPdf();
        }

        $this->db->where('id_kartu',$id);
        $this->db->update('kartu',$data);
        return $this->db->affected_rows();
    }

    public function deleteKartuPegawai($id){
        $this->_deleteFile($id);
        $this->db->delete('kartu',['id_kartu'=>$id]);
        return $this->db->affected_rows();
    }

    private function _uploadPdf()
    {
        $config['upload_path']          = './upload/pdf/kartu/';
        $config['allowed_types']        = 'pdf|jpg|png';
        $config['file_name']            = md5(uniqid());
        $config['overwrite']			= true;
        $config['max_size']             = 3072; // 2MB
        // $config['max_width']            = 1024;
        // $config['max_height']           = 768;

        $this->load->library('upload', $config);

        if ($this->upload->do_upload('file_kartu')) {
            return $this->upload->data("file_name");
        }
        
        return "default.jpg";
    }

    private function _deleteFile($id){
        $pangkat = $this->getKartuPegawaiById($id);
        if ($pangkat['file_kartu'] != "default.jpg"){
            $filename = explode(".", $pangkat['file_kartu'])[0];
            return array_map('unlink',glob(FCPATH."upload/pdf/kartu/$filename.*"));
        }
    }
}