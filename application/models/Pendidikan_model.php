<?php 

class Pendidikan_model extends CI_Model{

    public function getPendidikanPegawai($nip){
      $this->db->order_by('tahun_lulus','ASC');
      return  $this->db->get_where('pendidikan',["nip"=>$nip])->result_array();
    }
    
    public function insertPendidikanPegawai($data){
      $data['file_pendidikan']=$this->_uploadPdf();
        $this->db->insert('pendidikan',$data);
        return $this->db->affected_rows();
    }

    public function getPendidikanPegawaiById($id){
      return  $this->db->get_where('pendidikan',["id_pendidikan"=>$id])->row_array();
    }

    
    public function updateStatusPendidikan($nip){
      $this->db->where('status','1');
      $this->db->where('nip',$nip);
      $this->db->update('pendidikan',['status'=>'0']);
  }

  public function setPendidikanTerakhir($id,$nip){
      $this->updateStatusPendidikan($nip);
      $this->db->where('id_pendidikan',$id);
      $this->db->update('pendidikan',['status'=>'1']);

      return $this->db->affected_rows();
  }

    public function updatePendidikanPegawai($id,$data){
      if (!empty($_FILES["file_pendidikan"]["name"])) {
          $this->_deleteFile($id);
          $data['file_pendidikan'] = $this->_uploadPdf();
      }
        $this->db->where('id_pendidikan',$id);
        $this->db->update('pendidikan',$data);
        return $this->db->affected_rows();
    }

    public function deletePendidikanPegawai($id){
      $this->_deleteFile($id);
      $this->db->delete('pendidikan',['id_pendidikan'=>$id]);
      return $this->db->affected_rows();
    }

    public function getPendidikanPegawaiCount(){

      $Pendidikan=["SD","SMP","SMA","D1","D2","D3","D4","S1","S2","S3"];
      $data=[];
      foreach ($Pendidikan as $row){
          $query = $this->db->query('SELECT id_pendidikan,tingkat from pendidikan where status="1" and tingkat="'.$row.'"');
         array_push($data,[
             "label" => $row,
             "count" => $query->num_rows()
         ]);
      }
      
      return $data;
  }

  public function getPendidikanTerakhirAllPegawai($tingkat){
      $this->db->select('pegawai.nama,jabatan_struktural.nm_jabatan,pegawai.nip,pegawai.foto');
      $this->db->join('pegawai','pegawai.nip = pendidikan.nip','right');
      $this->db->join('struktural','pegawai.nip = struktural.nip','right');
      $this->db->join('jabatan_struktural','struktural.id_jabatan = jabatan_struktural.id_jabatan','right');
      
      $this->db->where('tingkat',$tingkat);
      $this->db->order_by('pegawai.nama','ASC');
      $this->db->where('pendidikan.status','1');
      $this->db->where_not_in('pegawai.keterangan',array('Dipekerjakan','Pensiun','Berhenti','Lainnya'));
      $this->db->where('struktural.status','1');
      return $this->db->get('pendidikan')->result_array();
  }

  
  private function _uploadPdf()
  {
      $config['upload_path']          = './upload/pdf/pendidikan/';
      $config['allowed_types']        = 'pdf|jpg|png';
      $config['file_name']            = md5(uniqid());
      $config['overwrite']			= true;
      $config['max_size']             = 3072; // 2MB
      // $config['max_width']            = 1024;
      // $config['max_height']           = 768;

      $this->load->library('upload', $config);

      if ($this->upload->do_upload('file_pendidikan')) {
          return $this->upload->data("file_name");
      }
      
      return "default.jpg";
  }

  private function _deleteFile($id){
      $pangkat = $this->getPendidikanPegawaiById($id);
      if ($pangkat['file_pendidikan'] != "default.jpg"){
          $filename = explode(".", $pangkat['file_pendidikan'])[0];
          return array_map('unlink',glob(FCPATH."upload/pdf/pendidikan/$filename.*"));
      }
  }
}