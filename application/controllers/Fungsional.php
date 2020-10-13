<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Fungsional extends CI_Controller{
    public function __construct(){
        parent::__construct();
        $this->load->model('Fungsional_model','fungsional');
        $this->load->model('Kepegawaian_model','kepegawaian');
        if(empty($this->session->userdata('nip'))){
          redirect('Login');
        }
        header('Cache-Control: no cache'); //no cache
    }

    public function index(){
        $data['pegawai']=$this->kepegawaian->getAllPegawaiPNS();
        $data['jabatan']=$this->fungsional->getAllFungsional();
        $this->form_validation->set_rules('nip','NIP','required|min_length[18]|numeric',
        array('required'=>'NIP wajib diisi','min_length'=>'NIP harus 18 digit','numeric'=>'NIP harus numerik'));
        $this->form_validation->set_rules('id_jabatan','jabatan','required',array('required'=>'jabatan wajib diisi'));
        $this->form_validation->set_rules('status_fungsional','Status Fungsional','required',array('required'=>'Status Fungsional wajib diisi'));
        $this->form_validation->set_rules('tmt_jabatan','TMT Jabatan','required',array('required'=>'TMT Jabatan wajib diisi'));
        $this->form_validation->set_rules('no_sk','no SK','required',array('required'=>'no SK wajib diisi'));
        $this->form_validation->set_rules('tanggal_sk','tanggal SK','required',array('required'=>'tanggal SK wajib diisi'));
        if (empty($_FILES['file_sk']['name'])){
          $this->form_validation->set_rules('file_sk','File SK','required',array('required'=>'File SK wajib diisi pdf atau foto, maksimal 3 MB'));
        }

          if ($this->form_validation->run()==FALSE){
            $this->load->view('templates/header_form.php');
            $this->load->view('templates/headerbar.php');
            $this->load->view('templates/sidebar.php');
            $this->load->view('kepegawaian/jabatanFungsional_v',$data);
            $this->load->view('templates/footer_form.php');
          }
          else{
              $dataInput=[
                'nip' => $this->input->post('nip'),
                'id_jabatan' => $this->input->post('id_jabatan'),
                'status_fungsional' => $this->input->post('status_fungsional'),
                'id_fungsional' => $this->input->post('id_fungsional'),
                'tanggal_sk' => $this->input->post('tanggal_sk'),
                'no_sk' => $this->input->post('no_sk'),
                'tmt_jabatan' => $this->input->post('tmt_jabatan'),
              ];
              if ($this->fungsional->insertFungsionalPegawai($dataInput)>0 )
                {
                 $this->session->set_flashdata('flash','Jabatan Fungsional berhasil dimasukan');
                 redirect('Profile/index/'. $this->input->post('nip').'/fungsional');
                }
              else{
                $this->session->set_flashdata('flash','gagal upload image');
                redirect('Datauser');
              }
          }

    }

    public function editFungsional($id){
       $id = decrypt_url($id);
        $data['pegawai']=$this->kepegawaian->getAllPegawaiPNS();
        $data['jabatan']=$this->fungsional->getAllFungsional();
        $data['fungsional']=$this->fungsional->getFungsionalPegawai($id);
        $this->form_validation->set_rules('nip','NIP','required|min_length[18]|numeric',
        array('required'=>'NIP wajib diisi','min_length'=>'NIP harus 18 digit','numeric'=>'NIP harus numerik'));
        $this->form_validation->set_rules('id_jabatan','jabatan','required',array('required'=>'jabatan wajib diisi'));
        $this->form_validation->set_rules('status_fungsional','Status Fungsional','required',array('required'=>'Status Fungsional wajib diisi'));
        $this->form_validation->set_rules('tmt_jabatan','TMT Jabatan','required',array('required'=>'TMT Jabatan wajib diisi'));
        $this->form_validation->set_rules('no_sk','no SK','required',array('required'=>'no SK wajib diisi'));
        $this->form_validation->set_rules('tanggal_sk','tanggal SK','required',array('required'=>'tanggal SK wajib diisi'));
   
          if ($this->form_validation->run()==FALSE){
            $this->load->view('templates/header_form.php');
            $this->load->view('templates/headerbar.php');
            $this->load->view('templates/sidebar.php');
            $this->load->view('kepegawaian/editFungsional_v',$data);
            $this->load->view('templates/footer_form.php');
          }
          else{
              $dataInput=[
                'nip' => $this->input->post('nip'),
                'id_jabatan' => $this->input->post('id_jabatan'),
                'status_fungsional' => $this->input->post('status_fungsional'),
                'id_fungsional' => $this->input->post('id_fungsional'),
                'tanggal_sk' => $this->input->post('tanggal_sk'),
                'no_sk' => $this->input->post('no_sk'),
                'tmt_jabatan' => $this->input->post('tmt_jabatan'),
                'status' => $this->input->post('status'),
              ];
              if ($this->fungsional->updateFungsionalPegawai($dataInput)>0 )
                {
                 $this->session->set_flashdata('flash','Jabatan Fungsional berhasil diupdate');
                 redirect('Profile/index/'. $this->input->post('nip').'/fungsional');
                }
              else{
                
                $this->session->set_flashdata('flashgagal','Jabatan Fungsional gagal diupdate');
                redirect('Profile/index/'. $this->input->post('nip').'/fungsional');
              }
          }

    }

    public function addFungsional(){
      $id = $this->input->post('id_jabatan',true);
      $jabatan = $this->input->post('nm_jabatan',true);
      $data=[
        'id_jabatan' => $id,
        'nm_jabatan' => $jabatan
      ];
      if ($this->fungsional->insertFungsional($data)>0){
          $this->session->set_flashdata('flash','jabatan fungsional berhasil ditambah');
          redirect('Fungsional');
      }
      else{

      }

    }

    public function getFungsionalPegawaiJson(){
      $id = $this->input->post('id_fungsional');
      $data = $this->fungsional->getFungsionalPegawai($id);
      echo json_encode($data);
    }
    
    public function deleteFungsional(){
      $id = $this->input->post('id');
      if($this->fungsional->deleteFungsional($id)>0){
        $this->session->set_flashdata('flash','jabatan fungsional berhasil dihapus');
        redirect('Fungsional');
      }
    }
    public function deleteFungsionalPegawai(){
      $id = $this->input->post('id_fungsional',true);
      $nip = $this->input->post('nip',true);
      if ($this->fungsional->deleteFungsionalPegawai($id)>0){
          $this->session->set_flashdata('flash','Fungsional berhasil dihapus');
          redirect('Profile/index/'.$nip.'/fungsional');
      }
      else{
        echo "error";
      }
    }

    public function setFungsionalTerakhir(){
      if($this->fungsional->setFungsionalTerakhir($this->input->post('id_fungsional'),$this->input->post('nip'))>0){
        $this->session->set_flashdata('flash','Jabatan fungsional terakhir berhasil diset');
        redirect('Profile/index/'.$this->input->post('nip').'/fungsional');
      }
    }

}