<?php 
defined('BASEPATH') OR exit('No direct script access allowed');
class Pendidikan extends CI_Controller{
    public function __construct(){
        parent::__construct();
        $this->load->model('Kepegawaian_model','kepegawaian');
        $this->load->model('Pendidikan_model','pendidikan');
        if(empty($this->session->userdata('nip'))){
          redirect('Login');
        }
        header('Cache-Control: no cache'); //no cache
    }

    public function index(){

        $data['pegawai']=$this->kepegawaian->getAllPegawaiBiasa();
        $tingkat = $this->input->post('tingkat');
        if (($tingkat=="SD") || ($tingkat=="SMP") || ($tingkat=="SMA")){
          $this->form_validation->set_rules('nip','NIP','required',
          array('required'=>'NIP wajib diisi'));
          $this->form_validation->set_rules('tingkat','Tingkat','required',array('required'=>'Tingkat wajib diisi'));
          $this->form_validation->set_rules('tahun_lulus','Tahun Lulus','required',array('required'=>'Tahun Lulus wajib diisi'));
        }
        else{
          $this->form_validation->set_rules('nip','NIP','required',
          array('required'=>'NIP wajib diisi'));
          $this->form_validation->set_rules('tingkat','Tingkat','required',array('required'=>'Tingkat wajib diisi'));
          $this->form_validation->set_rules('tahun_lulus','Tahun Lulus','required',array('required'=>'Tahun Lulus wajib diisi'));
          $this->form_validation->set_rules('sekolah','Sekolah','required',array('required'=>'Sekolah wajib diisi'));
          $this->form_validation->set_rules('jurusan','Jurusan','required',array('required'=>'Jurusan wajib diisi'));
          $this->form_validation->set_rules('gelar','Gelar','required',array('required'=>'Gelar wajib diisi'));
          $this->form_validation->set_rules('konsentrasi','Konsentrasi','required',array('required'=>'Konsentrasi wajib diisi'));
      
      
          if (empty($_FILES['file_pendidikan']['name'])){
            $this->form_validation->set_rules('file_pendidikan','File','required',array('required'=>'File wajib diisi pdf atau foto, maksimal 3 MB'));
          }
        }

          if ($this->form_validation->run()==FALSE){
            $this->load->view('templates/header_form.php');
            $this->load->view('templates/headerbar.php');
            $this->load->view('templates/sidebar.php');
            $this->load->view('pendidikan/formPendidikan_v',$data);
            $this->load->view('templates/footer_form.php');
          }
          else{

            if (($tingkat=="SD") || ($tingkat=="SMP") || ($tingkat=="SMA")){
              $dataInput=[
                'nip' => $this->input->post('nip'),
                'tingkat' => $this->input->post('tingkat'),
                'tahun_lulus' => $this->input->post('tahun_lulus'),
                'sekolah' => $this->input->post('sekolah'),
                'status' => "0",
              ]; 
            }
            else{
              $dataInput=[
                'nip' => $this->input->post('nip'),
                'tingkat' => $this->input->post('tingkat'),
                'tahun_lulus' => $this->input->post('tahun_lulus'),
                'sekolah' => $this->input->post('sekolah'),
                'jurusan' => $this->input->post('jurusan'),
                'konsentrasi' => $this->input->post('konsentrasi'),
                'gelar' => $this->input->post('gelar'),
                'status' => "0",
              ];
            }
              
              if ($this->pendidikan->insertPendidikanPegawai($dataInput)>0 )
                {
                 $this->session->set_flashdata('flash','Pendidikan berhasil dimasukan');
                 redirect('Profile/index/'. $this->input->post('nip').'/pendidikan');
                }
              else{
                $this->session->set_flashdata('flash','gagal upload image');
                redirect('Profile/index/'. $this->input->post('nip').'/pendidikan');
              }
          }

    }

    public function editPendidikan($id){
      $id = decrypt_url($id);

        $data['pegawai']=$this->kepegawaian->getAllPegawaiBiasa();
        $data['pendidikan'] = $this->pendidikan->getPendidikanPegawaiById($id);
        $tingkat = $this->input->post('tingkat');
        if (($tingkat=="SD") || ($tingkat=="SMP") || ($tingkat=="SMA")){
          $this->form_validation->set_rules('nip','NIP','required',
          array('required'=>'NIP wajib diisi'));
          $this->form_validation->set_rules('tingkat','Tingkat','required',array('required'=>'Tingkat wajib diisi'));
          $this->form_validation->set_rules('tahun_lulus','Tahun Lulus','required',array('required'=>'Tahun Lulus wajib diisi'));
        }
        else{
          $this->form_validation->set_rules('nip','NIP','required',
          array('required'=>'NIP wajib diisi'));
          $this->form_validation->set_rules('tingkat','Tingkat','required',array('required'=>'Tingkat wajib diisi'));
          $this->form_validation->set_rules('tahun_lulus','Tahun Lulus','required',array('required'=>'Tahun Lulus wajib diisi'));
          $this->form_validation->set_rules('sekolah','Sekolah','required',array('required'=>'Sekolah wajib diisi'));
          $this->form_validation->set_rules('jurusan','Jurusan','required',array('required'=>'Jurusan wajib diisi'));
          $this->form_validation->set_rules('gelar','Gelar','required',array('required'=>'Gelar wajib diisi'));
          $this->form_validation->set_rules('konsentrasi','Konsentrasi','required',array('required'=>'Konsentrasi wajib diisi'));


        }

          if ($this->form_validation->run()==FALSE){
            $this->load->view('templates/header_form.php');
            $this->load->view('templates/headerbar.php');
            $this->load->view('templates/sidebar.php');
            $this->load->view('pendidikan/editPendidikan_v',$data);
            $this->load->view('templates/footer_form.php');
          }
          else{

            if (($tingkat=="SD") || ($tingkat=="SMP") || ($tingkat=="SMA")){
              $dataInput=[
                'nip' => $this->input->post('nip'),
                'tingkat' => $this->input->post('tingkat'),
                'tahun_lulus' => $this->input->post('tahun_lulus'),
                'sekolah' => $this->input->post('sekolah')
              ]; 
            }
            else{
              $dataInput=[
                'nip' => $this->input->post('nip'),
                'tingkat' => $this->input->post('tingkat'),
                'tahun_lulus' => $this->input->post('tahun_lulus'),
                'sekolah' => $this->input->post('sekolah'),
                'jurusan' => $this->input->post('jurusan'),
                'konsentrasi' => $this->input->post('konsentrasi'),
                'gelar' => $this->input->post('gelar')
              ];
            }
              
              if ($this->pendidikan->updatePendidikanPegawai($id,$dataInput)>0 )
                {
                 $this->session->set_flashdata('flash','Pendidikan berhasil diupdate');
                 redirect('Profile/index/'. $this->input->post('nip').'/pendidikan');
                }
              else{
                $this->session->set_flashdata('flash','gagal upload image');
                redirect('Profile/index/'. $this->input->post('nip').'/pendidikan');
              }
          }

    }

    public function getPendidikanPegawaiJson(){
      $id=$this->input->post('id_Pendidikan');
      $data = $this->pendidikan->getPendidikanPegawaiById($id);
      echo json_encode($data);
    }

    public function deletePendidikanPegawai(){
      $id = $this->input->post('id_pendidikan');
      $nip = $this->input->post('nip');
      if ($this->pendidikan->deletePendidikanPegawai($id)>0){
        $this->session->set_flashdata('flash','Pendidikan berhasil dihapus');
        redirect('Profile/index/'.$nip.'/pendidikan');
      }
    }
    
    public function setPendidikanTerakhir(){
      if($this->pendidikan->setPendidikanTerakhir($this->input->post('id_pendidikan'),$this->input->post('nip'))>0){
        $this->session->set_flashdata('flash','Pendidikan terakhir berhasil diset');
        redirect('Profile/index/'. $this->input->post('nip').'/pendidikan');
      }
    }

}