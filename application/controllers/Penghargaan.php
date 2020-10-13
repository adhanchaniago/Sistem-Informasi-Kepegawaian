<?php 


class Penghargaan extends CI_Controller{
    public function __construct(){
        parent::__construct();
        if (empty($this->session->userdata('nip'))){
            redirect('Login');
        }
        $this->load->model('Penghargaan_model','penghargaan');
        $this->load->model('Kepegawaian_model','kepegawaian');
        header('Cache-Control: no cache'); //no cache
    }
    
    public function index(){
        
        $data['pegawai']=$this->kepegawaian->getAllPegawaiPNS();
        $this->form_validation->set_rules('nip','NIP','required',
        array('required'=>'NIP wajib diisi'));
        $this->form_validation->set_rules('nama_penghargaan','Penghargaan','required',array('required'=>'Penghargaan wajib diisi'));
        $this->form_validation->set_rules('no_surat','No Surat','required',array('required'=>'No Surat wajib diisi'));
        $this->form_validation->set_rules('instansi','Instansi','required',array('required'=>'Instansi wajib diisi'));
        $this->form_validation->set_rules('tanggal_penghargaan','Tanggal Penghargaan','required',array('required'=>'Pilih salah satu Tanggal Penghargaan '));

        if (empty($_FILES['file_penghargaan']['name'])){
          $this->form_validation->set_rules('file_penghargaan','File','required',array('required'=>'File wajib diisi pdf atau foto, maksimal 3 MB'));
        }

        if ($this->session->userdata('level')=="admin" || $this->session->userdata('level')=="pegawai"){
          if ($this->form_validation->run()==FALSE){
            $this->load->view('templates/header_form.php');
            $this->load->view('templates/headerbar.php');
            $this->load->view('templates/sidebar.php');
            $this->load->view('penghargaan/formpenghargaan_v',$data);
            $this->load->view('templates/footer_form.php');
          }
          else{
              $dataInput=[
                'nip' => $this->input->post('nip'),
                'nama_penghargaan' => $this->input->post('nama_penghargaan'),
                'tanggal_penghargaan' => $this->input->post('tanggal_penghargaan'),
                'no_surat' => $this->input->post('no_surat'),
                'instansi' => $this->input->post('instansi'),
                'keterangan' => $this->input->post('keterangan')
              ];
              if ($this->penghargaan->insertPenghargaanPegawai($dataInput)>0 )
                {
                 $this->session->set_flashdata('flash',' penghargaan berhasil dimasukan');
                 redirect('Profile/index/'. $this->input->post('nip').'/penghargaan');
                }
              else{
                $this->session->set_flashdata('flashgagal',' penghargaan gagal dimasukan');
                redirect('Profile/index/'. $this->input->post('nip').'/penghargaan');
              }
          }

        }
        else{
          redirect('Login');  
        }
    }

    public function editPenghargaan($id){
      $id = decrypt_url($id);
        
        $data['pegawai']=$this->kepegawaian->getAllPegawaiPNS();
        $data['penghargaan']=$this->penghargaan->getPenghargaanPegawaiById($id);
        $this->form_validation->set_rules('nip','NIP','required',
        array('required'=>'NIP wajib diisi'));
        $this->form_validation->set_rules('nama_penghargaan','Penghargaan','required',array('required'=>'Penghargaan wajib diisi'));
        $this->form_validation->set_rules('no_surat','No Surat','required',array('required'=>'No Surat wajib diisi'));
        $this->form_validation->set_rules('instansi','Instansi','required',array('required'=>'Instansi wajib diisi'));
        $this->form_validation->set_rules('tanggal_penghargaan','Tanggal Penghargaan','required',array('required'=>'Pilih salah satu Tanggal Penghargaan '));

        if ($this->session->userdata('level')=="admin"){
          if ($this->form_validation->run()==FALSE){
            $this->load->view('templates/header_form.php');
            $this->load->view('templates/headerbar.php');
            $this->load->view('templates/sidebar.php');
            $this->load->view('penghargaan/editpenghargaan_v',$data);
            $this->load->view('templates/footer_form.php');
          }
          else{
              $dataInput=[
                'nip' => $this->input->post('nip'),
                'nama_penghargaan' => $this->input->post('nama_penghargaan'),
                'tanggal_penghargaan' => $this->input->post('tanggal_penghargaan'),
                'no_surat' => $this->input->post('no_surat'),
                'instansi' => $this->input->post('instansi'),
                'keterangan' => $this->input->post('keterangan')
              ];
              if ($this->penghargaan->updatePenghargaanPegawai($dataInput,$id)>0 )
                {
                 $this->session->set_flashdata('flash',' penghargaan berhasil diupdate');
                 redirect('Profile/index/'. $this->input->post('nip').'/penghargaan');
                }
              else{
                $this->session->set_flashdata('flashgagal',' penghargaan gagal diupdate');
                redirect('Profile/index/'. $this->input->post('nip').'/penghargaan');
              }
          }

        }
        else{
          redirect('Login');  
        }
    }
      
    public function getPenghargaanPegawaiJson(){
        $data=$this->penghargaan->getPenghargaanPegawaiById($this->input->post('id_Penghargaan'));
        echo json_encode($data);
    }

    public function deletePenghargaanPegawai(){
      $id = $this->input->post('id_penghargaan',true);
      $nip = $this->input->post('nip',true);
      if ($this->penghargaan->deletePenghargaanPegawai($id)>0){
          $this->session->set_flashdata('flash',' penghargaan berhasil dihapus');
          redirect('Profile/index/'.$nip.'/penghargaan');
      }
      else{  
        $this->session->set_flashdata('flashgagal',' penghargaan gagal dihapus');
         redirect('Profile/index/'. $nip.'/penghargaan');
      }
    }
    
}