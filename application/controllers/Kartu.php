<?php 

class Kartu extends CI_Controller{
    public function __construct(){
        parent::__construct();
        if (empty($this->session->userdata('nip'))){
            redirect('Login');
        }
        $this->load->model('Kartu_model','kartu');
        $this->load->model('Kepegawaian_model','kepegawaian');
        header('Cache-Control: no cache'); //no cache
    }
    
    public function index(){
        
        $data['pegawai']=$this->kepegawaian->getAllPegawai();
        $this->form_validation->set_rules('nip','NIP','required',
        array('required'=>'NIP wajib diisi'));
        $this->form_validation->set_rules('jenis_kartu','Jenis / Nama Kartu','required',array('required'=>'Jenis / Nama Kartu wajib diisi'));
        $this->form_validation->set_rules('no_kartu','No kartu','required',array('required'=>'No kartu wajib diisi'));
  
        if (empty($_FILES['file_kartu']['name'])){
          $this->form_validation->set_rules('file_kartu','File','required',array('required'=>'File wajib diisi pdf atau foto, maksimal 3 MB'));
        }

          if ($this->form_validation->run()==FALSE){
            $this->load->view('templates/header_form.php');
            $this->load->view('templates/headerbar.php');
            $this->load->view('templates/sidebar.php');
            $this->load->view('kartu/formkartu_v',$data);
            $this->load->view('templates/footer_form.php');
          }
          else{
              $dataInput=[
                'nip' => $this->input->post('nip'),
                'jenis_kartu' => $this->input->post('jenis_kartu'),
                'no_kartu' => $this->input->post('no_kartu')
              ];
              if ($this->kartu->insertKartuPegawai($dataInput)>0 )
                {
                 $this->session->set_flashdata('flash',' kartu berhasil dimasukan');
                 redirect('Profile/index/'. $this->input->post('nip').'/kartu');
                }
              else{
                $this->session->set_flashdata('flashgagal',' kartu gagal dimasukan');
                redirect('Profile/index/'. $this->input->post('nip').'/kartu');
              }
          }

    }
    
    public function editKartu($id){
      $id = decrypt_url($id);
        
        $data['kartu']=$this->kartu->getKartuPegawaiById($id);
        $data['pegawai']=$this->kepegawaian->getAllPegawai();
        $this->form_validation->set_rules('nip','NIP','required',
        array('required'=>'NIP wajib diisi'));
        $this->form_validation->set_rules('jenis_kartu','Jenis / Nama Kartu','required',array('required'=>'Jenis / Nama Kartu wajib diisi'));
        $this->form_validation->set_rules('no_kartu','No kartu','required',array('required'=>'No kartu wajib diisi'));

          if ($this->form_validation->run()==FALSE){
            $this->load->view('templates/header_form.php');
            $this->load->view('templates/headerbar.php');
            $this->load->view('templates/sidebar.php');
            $this->load->view('kartu/editkartu_v',$data);
            $this->load->view('templates/footer_form.php');
          }
          else{
              $dataInput=[
                'nip' => $this->input->post('nip'),
                'jenis_kartu' => $this->input->post('jenis_kartu'),
                'no_kartu' => $this->input->post('no_kartu')
              ];
              if ($this->kartu->updateKartuPegawai($dataInput,$id)>0 )
                {
                 $this->session->set_flashdata('flash',' kartu berhasil diupdate');
                 redirect('Profile/index/'. $this->input->post('nip').'/kartu');
                }
              else{
                $this->session->set_flashdata('flashgagal',' kartu gagal diupdate');
                redirect('Profile/index/'. $this->input->post('nip').'/kartu');
              }
          }

    }

    public function deleteKartuPegawai(){
      $id = $this->input->post('id_kartu');
      $nip = $this->input->post('nip');
      if ($this->kartu->deleteKartuPegawai($id)>0){
        $this->session->set_flashdata('flash','Kartu berhasil dihapus');
        redirect('Profile/index/'.$nip.'/kartu');
      }
    }
    
    public function getKartuPegawaiJson(){
      $id=$this->input->post('id_kartu');
      $data = $this->kartu->getKartuPegawaiById($id);
      echo json_encode($data);
    }

}