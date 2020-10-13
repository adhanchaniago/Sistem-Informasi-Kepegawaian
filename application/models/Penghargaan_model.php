<?php 

class Penghargaan_model extends CI_Model{
    public function insertPenghargaanPegawai($data){
        $data['file_penghargaan']=$this->_uploadPdf();
        $this->db->insert('penghargaan',$data);
        return $this->db->affected_rows();
    }

    public function getPenghargaanPegawai($nip){
        return $this->db->get_where('penghargaan',['nip'=>$nip])->result_array();
    }

    public function getPenghargaanPegawaiById($id){
        return $this->db->get_where('penghargaan',['id_penghargaan'=>$id])->row_array();
    }

    public function updatePenghargaanPegawai($data,$id){
        if (!empty($_FILES["file_penghargaan"]["name"])) {
            $this->_deleteFile($id);
            $data['file_penghargaan'] = $this->_uploadPdf();
        }

        $this->db->where('id_penghargaan',$id);
        $this->db->update('penghargaan',$data);
        return $this->db->affected_rows();
    }

    public function deletePenghargaanPegawai($id){
        $this->_deleteFile($id);
        $this->db->delete('penghargaan',['id_penghargaan'=>$id]);
        return $this->db->affected_rows();
    }

    private function _uploadPdf()
    {
        $config['upload_path']          = './upload/pdf/penghargaan/';
        $config['allowed_types']        = 'pdf|jpg|png';
        $config['file_name']            = md5(uniqid());
        $config['overwrite']			= true;
        $config['max_size']             = 3072; // 2MB
        // $config['max_width']            = 1024;
        // $config['max_height']           = 768;

        $this->load->library('upload', $config);

        if ($this->upload->do_upload('file_penghargaan')) {
            return $this->upload->data("file_name");
        }
        
        return "default.jpg";
    }

    private function _deleteFile($id){
        $pangkat = $this->getPenghargaanPegawaiById($id);
        if ($pangkat['file_penghargaan'] != "default.jpg"){
            $filename = explode(".", $pangkat['file_penghargaan'])[0];
            return array_map('unlink',glob(FCPATH."upload/pdf/penghargaan/$filename.*"));
        }
    }
}