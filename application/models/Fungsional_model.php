<?php

class Fungsional_model extends CI_Model
{
    public function getAllFungsional()
    {
        return $this->db->get('jabatan')->result_array();
    }
    public function getAllFungsionalDistinct()
    {
        $this->db->select('nm_jabatan');
        $this->db->distinct();
        return $this->db->get('jabatan')->result_array();
    }

    public function insertFungsional($data)
    {
        $this->db->insert('jabatan', $data);
        return $this->db->affected_rows();
    }

    // public function getAllFungsionalPegawai(){
    //     $this->db->select('id_fungsional,nm_jabatan');
    //     $this->db->join
    //     return $this->db->get()
    // }

    public function insertFungsionalPegawai($data)
    {
        $data['file_sk'] = $this->_uploadPdf();
        if ($data['status_fungsional'] == 'Keluar') {
            $this->updateStatusFungsional($data['nip']);
        }
        $this->db->insert('fungsional', $data);
        return $this->db->affected_rows();
    }

    public function getFungsionalPegawai($id)
    {
        return $this->db->get_where('fungsional', ['id_fungsional' => $id])->row_array();
    }

    public function updateFungsionalPegawai($data)
    {

        if (!empty($_FILES["file_sk"]["name"])) {
            $this->_deleteFile($this->input->post('id_fungsional'));
            $data['file_sk'] = $this->_uploadPdf();
        }
        if ($data['status_fungsional'] == 'Keluar') {
            $this->updateStatusFungsional($data['nip']);
        }
        $this->db->where('id_fungsional', $this->input->post('id_fungsional'));
        $this->db->update('fungsional', $data);

        return $this->db->affected_rows();
    }

    private function _uploadPdf()
    {
        $config['upload_path']          = './upload/pdf/sk/';
        $config['allowed_types']        = 'pdf|jpg|png';
        $config['file_name']            = md5(uniqid());
        $config['overwrite']            = true;
        $config['max_size']             = 3072; // 2MB
        // $config['max_width']            = 1024;
        // $config['max_height']           = 768;

        $this->load->library('upload', $config);

        if ($this->upload->do_upload('file_sk')) {
            return $this->upload->data("file_name");
        }

        return "default.jpg";
    }

    private function _deleteFile($id)
    {
        $pangkat = $this->getFungsionalPegawai($id);
        if ($pangkat['file_sk'] != "default.jpg") {
            $filename = explode(".", $pangkat['file_sk'])[0];
            return array_map('unlink', glob(FCPATH . "upload/pdf/sk/$filename.*"));
        }
    }

    public function deleteFungsional($id)
    {
        $this->db->delete('jabatan', ['id' => $id]);
        return $this->db->affected_rows();
    }

    public function deleteFungsionalPegawai($id)
    {
        $this->_deleteFile($id);
        $this->db->delete('fungsional', ['id_fungsional' => $id]);
        return $this->db->affected_rows();
    }

    public function updateStatusFungsional($nip)
    {
        $this->db->where('status', '1');
        $this->db->where('nip', $nip);
        $this->db->update('fungsional', ['status' => '0']);
    }

    public function setFungsionalTerakhir($id, $nip)
    {
        $this->updateStatusFungsional($nip);
        $this->db->where('id_fungsional', $id);
        $this->db->update('fungsional', ['status' => '1']);

        return $this->db->affected_rows();
    }

    public function getFungsionalPegawaiCount()
    {

        $Fungsional = $this->getAllFungsionalDistinct();
        $data = [];
        foreach ($Fungsional as $row) {
            $query = $this->db->query('SELECT id_fungsional,jabatan.nm_jabatan from fungsional INNER JOIN jabatan ON jabatan.id=fungsional.id_jabatan where fungsional.status="1" and nm_jabatan="' . $row['nm_jabatan'] . '"');
            array_push($data, [
                "label" => $row['nm_jabatan'],
                "count" => $query->num_rows()
            ]);
        }

        return $data;
    }
}
