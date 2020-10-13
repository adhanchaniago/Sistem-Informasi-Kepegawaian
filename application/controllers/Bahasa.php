<?php 

class Bahasa extends CI_Controller{
    public function __construct(){
        parent::__construct();
        if(empty($this->session->userdata('nip'))){
            redirect('Login');
        }
        $this->load->model('Bahasa_model','bahasa');
        $this->load->model('Kepegawaian_model','kepegawaian');
        header('Cache-Control: no cache'); //no cache
    }

    
    public function index(){
        
        $data['pegawai']=$this->kepegawaian->getAllPegawai();
        $this->form_validation->set_rules('nip','NIP','required',
        array('required'=>'NIP wajib diisi'));
        $this->form_validation->set_rules('bahasa','Bahasa','required',array('required'=>'Bahasa wajib diisi'));
        $this->form_validation->set_rules('kemampuan_bahasa','kemampuan bahasa','required',array('required'=>'Pilih salah satu kemampuan bahasa '));

          if ($this->form_validation->run()==FALSE){
            $this->load->view('templates/header_form.php');
            $this->load->view('templates/headerbar.php');
            $this->load->view('templates/sidebar.php');
            $this->load->view('bahasa/formbahasa_v',$data);
            $this->load->view('templates/footer_form.php');
          }
          else{
              $dataInput=[
                'nip' => $this->input->post('nip'),
                'bahasa' => $this->input->post('bahasa'),
                'kemampuan_bahasa' => $this->input->post('kemampuan_bahasa')
              ];
              if ($this->bahasa->insertBahasaPegawai($dataInput)>0 )
                {
                 $this->session->set_flashdata('flash','Kemampuan Bahasa berhasil dimasukan');
                 redirect('Profile/index/'. $this->input->post('nip').'/'.uniqid().'/bahasa');
                }
              else{
                $this->session->set_flashdata('flashgagal','Kemampuan Bahasa gagal dimasukan');
                redirect('Profile/index/'. $this->input->post('nip').'/'.uniqid().'/bahasa');
              }
          }

    }
    
    public function editbahasa($id){
        
      $id = decrypt_url($id);
        $data['pegawai']=$this->kepegawaian->getAllPegawaiPNS();
        $data['bahasa']=$this->bahasa->getBahasaPegawaiById($id);
        $this->form_validation->set_rules('nip','NIP','required',
        array('required'=>'NIP wajib diisi'));
        $this->form_validation->set_rules('bahasa','Bahasa','required',array('required'=>'Bahasa wajib diisi'));
        $this->form_validation->set_rules('kemampuan_bahasa','kemampuan bahasa','required',array('required'=>'Pilih salah satu kemampuan bahasa '));

          if ($this->form_validation->run()==FALSE){
            $this->load->view('templates/header_form.php');
            $this->load->view('templates/headerbar.php');
            $this->load->view('templates/sidebar.php');
            $this->load->view('bahasa/editbahasa_v',$data);
            $this->load->view('templates/footer_form.php');
          }
          else{
              $dataInput=[
                'nip' => $this->input->post('nip'),
                'bahasa' => $this->input->post('bahasa'),
                'kemampuan_bahasa' => $this->input->post('kemampuan_bahasa')
              ];
              if ($this->bahasa->updateBahasaPegawai($dataInput,$id)>0 )
                {
                 $this->session->set_flashdata('flash','Kemampuan Bahasa berhasil diupdate');
                 redirect('Profile/index/'. $this->input->post('nip').'/'.uniqid().'/bahasa');
                }
              else{
                $this->session->set_flashdata('flashgagal','Kemampuan Bahasa gagal diupdate');
                redirect('Profile/index/'. $this->input->post('nip').'/'.uniqid().'/bahasa');
              }
          }

    }
    
  public function getBahasaPegawaiJson(){
      $data=$this->bahasa->getBahasaPegawaiById($this->input->post('id_bahasa'));
      echo json_encode($data);
  }

  public function deleteBahasaPegawai(){
    $id = $this->input->post('id_bahasa',true);
    $nip = $this->input->post('nip',true);
    if ($this->bahasa->deleteBahasaPegawai($id)>0){
        $this->session->set_flashdata('flash','kemampuan bahasa berhasil dihapus');
        redirect('Profile/index/'.$nip.'/'.uniqid().'/bahasa');
    }
    else{
      echo "error";
    }
  }
}