<?php 

class Seminar extends CI_Controller{
    public function __construct(){
        parent::__construct();
        $this->load->model('Seminar_model','seminar');
        $this->load->model('Kepegawaian_model','kepegawaian');
        if (empty($this->session->userdata('nip'))){
            redirect('Login');
        }
        header('Cache-Control: no cache'); //no cache
    }

    public function index(){
        
        $data['pegawai']=$this->kepegawaian->getAllPegawaiPNS();
        $this->form_validation->set_rules('nip','NIP','required|min_length[18]|numeric',
        array('required'=>'NIP wajib diisi','min_length'=>'NIP harus 18 digit','numeric'=>'NIP harus numerik'));
        $this->form_validation->set_rules('nama_seminar','Nama Seminar','required',array('required'=>'Nama Seminar wajib diisi'));
        $this->form_validation->set_rules('peran','Peran Seminar','required',array('required'=>'Pilih salah satu peran seminar '));
        $this->form_validation->set_rules('tanggal_seminar','Tanggal Seminar','required',array('required'=>'Tanggal Seminar wajib diisi'));
        $this->form_validation->set_rules('tempat_seminar','Tempat Seminar','required',array('required'=>'Tempat Seminar wajib diisi'));
        if (empty($_FILES['file_seminar']['name'])){
          $this->form_validation->set_rules('file_seminar','File seminar','required',array('required'=>'File seminar wajib diisi pdf atau foto, maksimal 3 MB'));
        }

        
          if ($this->form_validation->run()==FALSE){
            $this->load->view('templates/header_form.php');
            $this->load->view('templates/headerbar.php');
            $this->load->view('templates/sidebar.php');
            $this->load->view('seminar/formseminar_v',$data);
            $this->load->view('templates/footer_form.php');
          }
          else{
              $dataInput=[
                'nip' => $this->input->post('nip'),
                'nama_seminar' => $this->input->post('nama_seminar'),
                'peran' => $this->input->post('peran'),
                'tanggal_seminar' => $this->input->post('tanggal_seminar'),
                'tempat_seminar' => $this->input->post('tempat_seminar')
              ];
              if ($this->seminar->insertSeminarPegawai($dataInput)>0 )
                {
                 $this->session->set_flashdata('flash','Seminar berhasil dimasukan');
                 redirect('Profile/index/'. $this->input->post('nip').'/seminar');
                }
              else{
                $this->session->set_flashdata('flashgagal','Seminar gagal dimasukan');
                redirect('Profile/index/'. $this->input->post('nip').'/seminar');
              }
          }

        
    }

    public function editSeminar($id){
      $id = decrypt_url($id);
        
        $data['pegawai']=$this->kepegawaian->getAllPegawaiPNS();
        $data['seminar']=$this->seminar->getSeminarPegawaiById($id);
        $this->form_validation->set_rules('nip','NIP','required|min_length[18]|numeric',
        array('required'=>'NIP wajib diisi','min_length'=>'NIP harus 18 digit','numeric'=>'NIP harus numerik'));
        $this->form_validation->set_rules('nama_seminar','Nama Seminar','required',array('required'=>'Nama Seminar wajib diisi'));
        $this->form_validation->set_rules('peran','Peran Seminar','required',array('required'=>'Pilih salah satu peran seminar '));
        $this->form_validation->set_rules('tanggal_seminar','Tanggal Seminar','required',array('required'=>'Tanggal Seminar wajib diisi'));
        $this->form_validation->set_rules('tempat_seminar','Tempat Seminar','required',array('required'=>'Tempat Seminar wajib diisi'));

        
          if ($this->form_validation->run()==FALSE){
            $this->load->view('templates/header_form.php');
            $this->load->view('templates/headerbar.php');
            $this->load->view('templates/sidebar.php');
            $this->load->view('seminar/editSeminar_v',$data);
            $this->load->view('templates/footer_form.php');
          }
          else{
              $dataInput=[
                'nip' => $this->input->post('nip'),
                'nama_seminar' => $this->input->post('nama_seminar'),
                'peran' => $this->input->post('peran'),
                'tanggal_seminar' => $this->input->post('tanggal_seminar'),
                'tempat_seminar' => $this->input->post('tempat_seminar')
              ];
              if ($this->seminar->updateSeminarPegawai($dataInput,$data['seminar']['id_seminar'])>0 )
                {
                 $this->session->set_flashdata('flash','Seminar berhasil diupdate');
                 redirect('Profile/index/'. $this->input->post('nip').'/seminar');
                }
              else{
                $this->session->set_flashdata('flashgagal','Seminar gagal diupdate');
                redirect('Profile/index/'. $this->input->post('nip').'/seminar');
              }
          }

        
    }
  
    public function getSeminarPegawaiJson(){
        $data=$this->seminar->getSeminarPegawaiById($this->input->post('id_seminar'));
        echo json_encode($data);
    }

    public function deleteSeminarPegawai(){
      $id = $this->input->post('id_seminar',true);
      $nip = $this->input->post('nip',true);
      if ($this->seminar->deleteSeminarPegawai($id)>0){
          $this->session->set_flashdata('flash','seminar berhasil dihapus');
          redirect('Profile/index/'.$nip.'/seminar');
      }
      else{
        echo "error";
      }
    }
}