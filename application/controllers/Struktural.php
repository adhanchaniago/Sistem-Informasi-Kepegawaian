<?php 
defined('BASEPATH') OR exit('No direct script access allowed');
class Struktural extends CI_controller{
  
    public function __construct(){
        parent::__construct();
        $this->load->model('Struktural_model','struktural');
        $this->load->model('Subbid_model','subbid');
        $this->load->model('Kepegawaian_model','kepegawaian');
        if(empty($this->session->userdata('nip'))){
          redirect('Login');
        }
        header('Cache-Control: no cache'); //no cache
    }

    public function index(){
        $data['pegawai']=$this->kepegawaian->getAllPegawai();
        $data['jabatan']=$this->struktural->getAllStruktural();
        $data['eselon']=$this->struktural->getAllEselon();
        $jabatan_struktural = $this->struktural->getJabatanStruktural($this->input->post('id_jabatan')); 

        if($jabatan_struktural['level_jabatan']==4){
          $this->form_validation->set_rules('nip','NIP','required',
          array('required'=>'NIP wajib diisi'));
          $this->form_validation->set_rules('id_jabatan','jabatan','required',array('required'=>'jabatan wajib diisi'));
        }
        else{
          $this->form_validation->set_rules('nip','NIP','required',
          array('required'=>'NIP wajib diisi'));
          $this->form_validation->set_rules('id_jabatan','jabatan','required',array('required'=>'jabatan wajib diisi'));
          $this->form_validation->set_rules('id_eselon','eselon','required',array('required'=>'eselon wajib diisi'));
          $this->form_validation->set_rules('status_struktural','Status Struktural','required',array('required'=>'Status Struktural wajib diisi'));
          $this->form_validation->set_rules('tmt_jabatan','TMT Jabatan','required',array('required'=>'TMT Jabatan wajib diisi'));
          $this->form_validation->set_rules('no_sk','no SK','required',array('required'=>'no SK wajib diisi'));
          $this->form_validation->set_rules('tanggal_sk','tanggal SK','required',array('required'=>'tanggal SK wajib diisi'));
          
        if (empty($_FILES['file_sk']['name'])){
          $this->form_validation->set_rules('file_sk','File SK','required',array('required'=>'File SK wajib diisi pdf atau foto, maksimal 3 MB'));
        }

        }

          if ($this->form_validation->run()==FALSE){
            $this->load->view('templates/header_form.php');
            $this->load->view('templates/headerbar.php');
            $this->load->view('templates/sidebar.php');
            $this->load->view('kepegawaian/jabatanstruktural_v',$data);
            $this->load->view('templates/footer_form.php');
          }
          else{
            if ($jabatan_struktural['level_jabatan']==4){
              $dataInput=[
                'nip' => $this->input->post('nip'),
                'id_jabatan' => $this->input->post('id_jabatan'),
                'id_eselon' => "3",
                'status' => "1",
              ];
            }
            else{
              $dataInput=[
                'nip' => $this->input->post('nip'),
                'id_jabatan' => $this->input->post('id_jabatan'),
                'status_struktural' => $this->input->post('status_struktural'),
                'id_eselon' => $this->input->post('id_eselon'),
                'tanggal_sk' => $this->input->post('tanggal_sk'),
                'no_sk' => $this->input->post('no_sk'),
                'tmt_jabatan' => $this->input->post('tmt_jabatan'),
              ];
              if ($jabatan_struktural['level_jabatan']==1 || $jabatan_struktural['level_jabatan']==2){
                if ($this->subbid->deleteStaffSubBidPegawaiByNip($this->input->post('nip'))>0){
                }
              }
            }
              if ($this->struktural->insertStrukturalPegawai($dataInput)>0 )
                {
                 $this->session->set_flashdata('flash','Jabatan Struktural berhasil dimasukan');
                 redirect('Profile/Index/'.$this->input->post('nip').'/struktural');
                }
              else{
                $this->session->set_flashdata('flash','gagal upload image');
                redirect('Datauser');
              }
          }

    }

    public function editStruktural($id){
        $id = decrypt_url($id);
        $data['pegawai']=$this->kepegawaian->getAllPegawai();
        $data['jabatan']=$this->struktural->getAllStruktural();
        $data['eselon']=$this->struktural->getAllEselon();
        $data['struktural']=$this->struktural->getStrukturalPegawai($id);
        $jabatan_struktural=$this->struktural->getJabatanStruktural($data['struktural']['id_jabatan']);
        $data['jabatan_struktural']=$jabatan_struktural['level_jabatan'];
        if($jabatan_struktural['level_jabatan']==4){
          $this->form_validation->set_rules('nip','NIP','required',
          array('required'=>'NIP wajib diisi'));
          $this->form_validation->set_rules('id_jabatan','jabatan','required',array('required'=>'jabatan wajib diisi'));
        }
        else{
          $this->form_validation->set_rules('nip','NIP','required',
          array('required'=>'NIP wajib diisi'));
          $this->form_validation->set_rules('id_jabatan','jabatan','required',array('required'=>'jabatan wajib diisi'));
          $this->form_validation->set_rules('id_eselon','eselon','required',array('required'=>'eselon wajib diisi'));
          $this->form_validation->set_rules('status_struktural','Status Struktural','required',array('required'=>'Status Struktural wajib diisi'));
          $this->form_validation->set_rules('tmt_jabatan','TMT Jabatan','required',array('required'=>'TMT Jabatan wajib diisi'));
          $this->form_validation->set_rules('no_sk','no SK','required',array('required'=>'no SK wajib diisi'));
          $this->form_validation->set_rules('tanggal_sk','tanggal SK','required',array('required'=>'tanggal SK wajib diisi'));

        }
    

          if ($this->form_validation->run()==FALSE){
            $this->load->view('templates/header_form.php');
            $this->load->view('templates/headerbar.php');
            $this->load->view('templates/sidebar.php');
            $this->load->view('kepegawaian/editStruktural_v',$data);
            $this->load->view('templates/footer_form.php');
          }
          else{
              $dataInput=[
                'nip' => $this->input->post('nip'),
                'id_jabatan' => $this->input->post('id_jabatan'),
                'status_struktural' => $this->input->post('status_struktural'),
                'id_eselon' => $this->input->post('id_eselon'),
                'tanggal_sk' => $this->input->post('tanggal_sk'),
                'no_sk' => $this->input->post('no_sk'),
                'tmt_jabatan' => $this->input->post('tmt_jabatan'),
              ];
              if ($this->struktural->updateStrukturalPegawai($dataInput)>0 )
                {
                 $this->session->set_flashdata('flash','Jabatan Struktural berhasil diupdate');
                 redirect('Profile/Index/'.$this->input->post('nip').'/struktural');
                }
              else{
              }
          }

    }

    public function addStruktural(){
      $jabatan = $this->input->post('nm_jabatan',true);
      if (strpos($jabatan,'Kepala Pusyantek')!==false){
        $level=1;
      }
      else if((strpos($jabatan,'Kepala Bidang')!==false) || (strpos($jabatan,'Ka.Bid')!==false)){
        $level=2;
      }
      else if((strpos($jabatan,'Kepala Sub')!==false) || (strpos($jabatan,'Ka.Sub')!==false)){
        $level=3;
      }
      else{
        $level=4;
      }

      $data=[
        'nm_jabatan' => $jabatan,
        'level_jabatan' => $level
      ];
      if ($this->struktural->insertStruktural($data)>0){
          $this->session->set_flashdata('flash','jabatan struktural berhasil ditambah');
          redirect('Struktural');
      }
      else{

      }
    }

    public function addEselon(){
      $gol = $this->input->post('gol_eselon',true);
      if ($this->struktural->insertEselon($gol)>0){
          $this->session->set_flashdata('flash','eselon berhasil ditambah');
          redirect('Struktural');
      }
      else{

      }
    }


    public function getStrukturalPegawaiJson(){
      $id = $this->input->post('id_struktural');
      $data = $this->struktural->getStrukturalPegawai($id);
      echo json_encode($data);
    }

    public function getStrukturalJson(){
      $id = $this->input->post('id');
      $data = $this->struktural->getJabatanStruktural($id);
      echo json_encode($data);
    }

    public function deleteStruktural(){
      $id=$this->input->post('id');
      if($this->struktural->deleteStruktural($id)>0){
        $this->session->set_flashdata('flash','jabatan struktural berhasil dihapus');
        redirect('Struktural');
      }
    }
      public function deleteEselon(){
        $id=$this->input->post('id');
        if($this->struktural->deleteEselon($id)>0){
          $this->session->set_flashdata('flash','eselon berhasil dihapus');
          redirect('Struktural');
        }
      }

    public function deleteStrukturalPegawai(){
      $id = $this->input->post('id_struktural',true);
      $nip = $this->input->post('nip',true);
      if ($this->struktural->deleteStrukturalPegawai($id)>0){
          $this->session->set_flashdata('flash','Struktural berhasil dihapus');
          redirect('Profile/index/'.$nip.'/struktural');
      }
      else{
        echo "error";
      }
    }

    
    public function setStrukturalTerakhir(){
      $struktural = $this->struktural->checkLevelJabatan($this->input->post('id_struktural'));
      if ($struktural['level_jabatan']=='2' ||$struktural['level_jabatan']=='1'){
        if ($this->subbid->deleteStaffSubBidPegawaiByNip($this->input->post('nip'))>0){
        }
      }
      if($this->struktural->setStrukturalTerakhir($this->input->post('id_struktural'),$this->input->post('nip'))>0){
        $this->session->set_flashdata('flash','Jabatan struktural terakhir berhasil diset');
        redirect('Profile/index/'.$this->input->post('nip').'/struktural');
      }
    }

}