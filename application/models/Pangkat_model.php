<?php

class Pangkat_model extends CI_Model{
    public function getAllPangkat(){
        return $this->db->get('golongan')->result_array();
    }

    public function insertPangkat($id,$pangkat){
        $this->db->insert('golongan',['id_golongan' => $id,'pangkat' => $pangkat]);
        return $this->db->affected_rows();
    }

    public function deletePangkat($id){
        $this->db->delete('golongan',['id_golongan' => $id]);
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


    public function getPangkatPegawai($id){
        return $this->db->get_where('riwayat_pangkat',['id_riwayat'=>$id])->row_array();
     }

    private function _deleteFile($id){
        $pangkat = $this->getPangkatPegawai($id);
        if ($pangkat['file_sk'] != "default.jpg"){
            $filename = explode(".", $pangkat['file_sk'])[0];
            return array_map('unlink',glob(FCPATH."upload/pdf/sk/$filename.*"));
        }
    }

    public function insertPangkatPegawai(){
        if ($this->checkPangkat($this->input->post('nip')) >0){
            $this->updateStatusPangkat($this->input->post('nip'));
        }

        $data=[
            'nip' => $this->input->post('nip'),
            'id_golongan' => $this->input->post('id_golongan'),
            'jenis_sk' => $this->input->post('jenis_sk'),
            'no_sk' => $this->input->post('no_sk'),
            'tanggal_sk' => $this->input->post('tanggal_sk'),
            'tmt_golongan' => $this->input->post('tmt_golongan'),
            'file_sk' =>  $this->_uploadPdf(),
            'status' => '1'
        ];
        $this->db->insert('riwayat_pangkat',$data);

        return $this->db->affected_rows();
    }

    public function updatePangkatPegawai(){
        $data=[
            'nip' => $this->input->post('nip'),
            'id_golongan' => $this->input->post('id_golongan'),
            'jenis_sk' => $this->input->post('jenis_sk'),
            'no_sk' => $this->input->post('no_sk'),
            'tanggal_sk' => $this->input->post('tanggal_sk'),
            'tmt_golongan' => $this->input->post('tmt_golongan'),
            'status' => $this->input->post('status')
        ];

        if (!empty($_FILES["file_sk"]["name"])) {
            $this->_deleteFile($this->input->post('id_riwayat'));
            $data['file_sk'] = $this->_uploadPdf();
        }

        $this->db->where('id_riwayat',$this->input->post('id_riwayat'));
        $this->db->update('riwayat_pangkat',$data);

        return $this->db->affected_rows();
    }
    

    public function getPangkatTerakhirPegawai($nip){
        $this->db->select('*');
        $this->db->from('riwayat_pangkat');
        $this->db->join('golongan', 'riwayat_pangkat.id_golongan = golongan.id_golongan','left');
        $this->db->where('nip',$nip);
        $this->db->where('status','1');
        return $this->db->get()->row_array(); 
    }

    public function getPangkatTerakhirAllPegawai($id_golongan){
        $this->db->select('pegawai.nama,jabatan_struktural.nm_jabatan,pegawai.nip,pegawai.foto');
        $this->db->join('pegawai','pegawai.nip = riwayat_pangkat.nip');
        $this->db->join('struktural','pegawai.nip = struktural.nip');
        $this->db->join('jabatan_struktural','struktural.id_jabatan = jabatan_struktural.id_jabatan');
        $this->db->where('id_golongan',$id_golongan);
        $this->db->order_by('pegawai.nama','ASC');
        $this->db->where('riwayat_pangkat.status','1');
        $this->db->where_not_in('pegawai.keterangan',array('Dipekerjakan','Pensiun','Berhenti','Lainnya'));
        $this->db->where('struktural.status','1');
        return $this->db->get('riwayat_pangkat')->result_array();
    }

    public function deletePangkatPegawai($id){
        $this->_deleteFile($id);
        $this->db->delete('riwayat_pangkat',['id_riwayat' => $id]);
        return $this->db->affected_rows();
    }

    public function checkPangkat($nip){
        $query = $this->db->query('SELECT * from riwayat_pangkat where nip="'.$nip.'" ');
        return $query->num_rows();
    }

    public function updateStatusPangkat($nip){
        $this->db->where('status','1');
        $this->db->where('nip',$nip);
        $this->db->update('riwayat_pangkat',['status'=>'0']);
    }

    public function setPangkatTerakhir($id,$nip){
        $this->updateStatusPangkat($nip);
        $this->db->where('id_riwayat',$id);
        $this->db->update('riwayat_pangkat',['status'=>'1']);

        return $this->db->affected_rows();
    }

    public function getPangkatPegawaiCount(){

        $pangkat=$this->getAllPangkat();
        $data=[];
        foreach ($pangkat as $row){
            $query = $this->db->query('SELECT id_riwayat,id_golongan from riwayat_pangkat where status="1" and id_golongan="'.$row['id_golongan'].'"');
           array_push($data,[
               "label" => $row['id_golongan'],
               "count" => $query->num_rows()
           ]);
        }
        
        return $data;
    }
}