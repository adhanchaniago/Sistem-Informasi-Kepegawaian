<?php 

class Sk_lain_model extends CI_Model{
    public function insertSkPegawai($data){
        $data['file_sk']=$this->_uploadPdf();
        $this->db->insert('sk_lainnya',$data);
        return $this->db->affected_rows();
    }

    public function getSkPegawai($nip){
        return $this->db->get_where('sk_lainnya',['nip'=>$nip])->result_array();
    }

    public function getSkPegawaiById($id){
        return $this->db->get_where('sk_lainnya',['id_sk'=>$id])->row_array();
    }

    public function updateSkPegawai($data,$id){
        if (!empty($_FILES["file_sk"]["name"])) {
            $this->_deleteFile($id);
            $data['file_sk'] = $this->_uploadPdf();
        }

        $this->db->where('id_sk',$id);
        $this->db->update('sk_lainnya',$data);
        return $this->db->affected_rows();
    }

    public function deleteSkPegawai($id){
        $this->_deleteFile($id);
        $this->db->delete('sk_lainnya',['id_sk'=>$id]);
        return $this->db->affected_rows();
    }

    private function _uploadPdf()
    {
        $config['upload_path']          = './upload/pdf/sklain/';
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
        $pangkat = $this->getSkPegawaiById($id);
        if ($pangkat['file_sk'] != "default.jpg"){
            $filename = explode(".", $pangkat['file_sk'])[0];
            return array_map('unlink',glob(FCPATH."upload/pdf/sklain/$filename.*"));
        }
    }
}