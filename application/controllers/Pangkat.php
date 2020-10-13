<?php 
defined('BASEPATH') OR exit('No direct script access allowed');
class Pangkat extends CI_Controller{
    public function __construct(){
        parent::__construct();
        $this->load->model('Kepegawaian_model','kepegawaian');
        $this->load->model('Pangkat_model','pangkat');
        if(empty($this->session->userdata('nip'))){
          redirect('Login');
        }
        header('Cache-Control: no cache'); //no cache
    }

    public function index(){
        $data['pegawai']=$this->kepegawaian->getAllPegawaiPNS();
        $data['golongan']=$this->pangkat->getAllPangkat();
        $this->form_validation->set_rules('nip','NIP','required|min_length[18]|numeric',
        array('required'=>'NIP wajib diisi','min_length'=>'NIP harus 18 digit','numeric'=>'NIP harus numerik'));
        $this->form_validation->set_rules('id_golongan','golongan','required',array('required'=>'golongan wajib diisi'));
        $this->form_validation->set_rules('jenis_sk','Jenis SK','required',array('required'=>'Jenis SK wajib diisi'));
        $this->form_validation->set_rules('no_sk','no SK','required',array('required'=>'no SK wajib diisi'));
        $this->form_validation->set_rules('tmt_golongan','TMT Golongan','required',array('required'=>'TMT Golongan wajib diisi'));
        $this->form_validation->set_rules('tanggal_sk','tanggal SK','required',array('required'=>'tanggal SK wajib diisi'));
        
        if (empty($_FILES['file_sk']['name'])){
          $this->form_validation->set_rules('file_sk','File SK','required',array('required'=>'File SK wajib diisi pdf atau foto, maksimal 3 MB'));
        }

        
          if ($this->form_validation->run()==FALSE){
            $this->load->view('templates/header_form.php');
            $this->load->view('templates/headerbar.php');
            $this->load->view('templates/sidebar.php');
            $this->load->view('kepegawaian/pangkat_v',$data);
            $this->load->view('templates/footer_form.php');
          }
          else{
              if ($this->pangkat->insertPangkatPegawai()>0 )
                {
                  $this->session->set_flashdata('flash','Pangkat / Golongan berhasil dimasukan');
                  redirect('Profile/Index/'.$this->input->post('nip').'/golongan');
                }
              else{
                $this->session->set_flashdata('flash','gagal upload image');
                redirect('Profile/Index/'.$this->input->post('nip').'/golongan');
              }
          }

    }

    public function editPangkat($id){
      $id = decrypt_url($id);
      $data['pegawai']=$this->kepegawaian->getAllPegawaiPNS();
      $data['golongan']=$this->pangkat->getAllPangkat();
      $data['riwayat']=$this->pangkat->getPangkatPegawai($id);
      $this->form_validation->set_rules('nip','NIP','required|min_length[18]|numeric',
      array('required'=>'NIP wajib diisi','min_length'=>'NIP harus 18 digit','numeric'=>'NIP harus numerik'));
      $this->form_validation->set_rules('id_golongan','golongan','required',array('required'=>'golongan wajib diisi'));
      $this->form_validation->set_rules('jenis_sk','Jenis SK','required',array('required'=>'Jenis SK wajib diisi'));
      $this->form_validation->set_rules('no_sk','no SK','required',array('required'=>'no SK wajib diisi'));
      $this->form_validation->set_rules('tmt_golongan','TMT Golongan','required',array('required'=>'TMT Golongan wajib diisi'));
      $this->form_validation->set_rules('tanggal_sk','tanggal SK','required',array('required'=>'tanggal SK wajib diisi'));

        if ($this->form_validation->run()==FALSE){
          $this->load->view('templates/header_form.php');
          $this->load->view('templates/headerbar.php');
          $this->load->view('templates/sidebar.php');
          $this->load->view('kepegawaian/editPangkat_v',$data);
          $this->load->view('templates/footer_form.php');
        }
        else{
            if ($this->pangkat->updatePangkatPegawai()>0 )
              {
                $this->session->set_flashdata('flash','Pangkat / Golongan berhasil diupdate');
                redirect('Profile/Index/'.$this->input->post('nip').'/golongan');
              }
            else{
              $this->session->set_flashdata('flash','gagal upload image');
              redirect('Profile/Index/'.$this->input->post('nip').'/golongan');
            }
        }

    }

    public function addPangkat(){
        $Pangkat = $this->input->post('pangkat',true);
        $id = $this->input->post('id_golongan',true);
    
        if ($this->pangkat->insertPangkat($id,$Pangkat)>0){
            $this->session->set_flashdata('flash','Pangkat / Golongan berhasil ditambah');
            redirect('Pangkat');
        }
        else{

        }
    }

    
    public function deletePangkat(){
        $id = $this->input->post('id',true);
        if ($this->pangkat->deletePangkat($id)>0){
            $this->session->set_flashdata('flash','Pangkat / Golongan berhasil dihapus');
            redirect('Pangkat');
        }
        else{
          
        }
      }

    public function deleteGolonganPegawai(){
      $id = $this->input->post('id_golongan',true);
      $nip = $this->input->post('nip',true);
      if ($this->pangkat->deletePangkatPegawai($id)>0){
          $this->session->set_flashdata('flash','Pangkat / Golongan berhasil dihapus');
          redirect('Profile/index/'.$nip);
      }
      else{
        echo "error";
      }
    }

    public function getPangkatPegawaiJson(){
      $id = $this->input->post('id_riwayat');
      $data = $this->pangkat->getPangkatPegawai($id);
      echo json_encode($data);
    }

    public function setPangkatTerakhir(){
      if($this->pangkat->setPangkatTerakhir($this->input->post('id_riwayat'),$this->input->post('nip'))>0){
        $this->session->set_flashdata('flash','Pangkat terakhir berhasil diset');
        redirect('Profile/index/'.$this->input->post('nip').'/golongan');
      }
    }


}