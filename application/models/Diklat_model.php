<?php 

class Diklat_model extends CI_Model{
    
    public function insertDiklatPegawai($data){
        $data['file_diklat']=$this->_uploadPdf();
        $this->db->insert('diklat',$data);
        return $this->db->affected_rows();
    }

    public function getDiklatPegawai($id){
      return  $this->db->get_where('diklat',["id_diklat"=>$id])->row_array();
    }

    public function getDiklatPegawaiById($nip){
        return $this->db->get_where('diklat',['nip'=>$nip])->result_array();
    }

    private function _uploadPdf()
    {
        $config['upload_path']          = './upload/pdf/diklat/';
        $config['allowed_types']        = 'pdf|jpg|png';
        $config['file_name']            = md5(uniqid());
        $config['overwrite']			= true;
        $config['max_size']             = 3072; // 2MB
        // $config['max_width']            = 1024;
        // $config['max_height']           = 768;

        $this->load->library('upload', $config);

        if ($this->upload->do_upload('file_diklat')) {
            return $this->upload->data("file_name");
        }
        
        return "default.jpg";
    }

    private function _deleteFile($id){
        $pangkat = $this->getDiklatPegawai($id);
        if ($pangkat['file_diklat'] != "default.jpg"){
            $filename = explode(".", $pangkat['file_diklat'])[0];
            return array_map('unlink',glob(FCPATH."upload/pdf/diklat/$filename.*"));
        }
    }
    
    public function deleteDiklatPegawai($id){
        $this->_deleteFile($id);
        $this->db->delete('diklat',['id_diklat' => $id]);
        return $this->db->affected_rows();
    }

    public function updateDiklatPegawai($data,$id){

        if (!empty($_FILES["file_diklat"]["name"])) {
            $this->_deleteFile($this->input->post('id_diklat'));
            $data['file_diklat'] = $this->_uploadPdf();
        }

        $this->db->where('id_diklat',$id);
        $this->db->update('diklat',$data);

        return $this->db->affected_rows();
    }

}