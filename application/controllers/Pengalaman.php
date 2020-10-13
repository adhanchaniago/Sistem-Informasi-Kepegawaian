<?php 

class Pengalaman extends CI_Controller{
    public function __construct(){
        parent::__construct();
        if (empty($this->session->userdata('nip'))){
            redirect('Login');
        }
        $this->load->model('Kepegawaian_model','kepegawaian');
        $this->load->model('Pengalaman_model','pengalaman');
        header('Cache-Control: no cache'); //no cache
    }
    
    public function index(){
        
        $data['pegawai']=$this->kepegawaian->getAllPegawai();
        $this->form_validation->set_rules('nip','NIP','required',
        array('required'=>'NIP wajib diisi'));
        $this->form_validation->set_rules('perusahaan_kerja','Perusahaan','required',array('required'=>'Perusahaan wajib diisi'));
        $this->form_validation->set_rules('jabatan_kerja','Jabatan / Nama Pekerjaan ','required',array('required'=>'Jabatan / Nama Pekerjaan  wajib diisi'));
        $this->form_validation->set_rules('mulai_kerja','Tanggal Mulai','required',array('required'=>'Tanggal Mulai wajib diisi'));
        $this->form_validation->set_rules('selesai_kerja','Tanggal Selesai','required',array('required'=>'Tanggal Selesai wajib diisi'));

          if ($this->form_validation->run()==FALSE){
            $this->load->view('templates/header_form.php');
            $this->load->view('templates/headerbar.php');
            $this->load->view('templates/sidebar.php');
            $this->load->view('pengalaman/formPengalaman_v',$data);
            $this->load->view('templates/footer_form.php');
          }
          else{
              $dataInput=[
                'nip' => $this->input->post('nip'),
                'perusahaan_kerja' => $this->input->post('perusahaan_kerja'),
                'jabatan_kerja' => $this->input->post('jabatan_kerja'),
                'mulai_kerja' => $this->input->post('mulai_kerja'),
                'selesai_kerja' => $this->input->post('selesai_kerja')
              ];
              if ($this->pengalaman->insertPengalamanPegawai($dataInput)>0 )
                {
                 $this->session->set_flashdata('flash',' Pengalaman kerja berhasil dimasukan');
                 redirect('Profile/index/'. $this->input->post('nip').'/pengalaman');
                }
              else{
                $this->session->set_flashdata('flashgagal',' Pengalaman kerja gagal dimasukan');
                redirect('Profile/index/'. $this->input->post('nip').'/pengalaman');
              }
          }

    }

    public function editPengalaman($id){
      $id = decrypt_url($id);
        $data['pengalaman']=$this->pengalaman->getPengalamanPegawaiById($id);
        $data['pegawai']=$this->kepegawaian->getAllPegawai();
        $this->form_validation->set_rules('nip','NIP','required',
        array('required'=>'NIP wajib diisi'));
        $this->form_validation->set_rules('perusahaan_kerja','Perusahaan','required',array('required'=>'Perusahaan wajib diisi'));
        $this->form_validation->set_rules('jabatan_kerja','Jabatan / Nama Pekerjaan ','required',array('required'=>'Jabatan / Nama Pekerjaan  wajib diisi'));
        $this->form_validation->set_rules('mulai_kerja','Tanggal Mulai','required',array('required'=>'Tanggal Mulai wajib diisi'));
        $this->form_validation->set_rules('selesai_kerja','Tanggal Selesai','required',array('required'=>'Tanggal Selesai wajib diisi'));

          if ($this->form_validation->run()==FALSE){
            $this->load->view('templates/header_form.php');
            $this->load->view('templates/headerbar.php');
            $this->load->view('templates/sidebar.php');
            $this->load->view('pengalaman/editPengalaman_v',$data);
            $this->load->view('templates/footer_form.php');
          }
          else{
              $dataInput=[
                'nip' => $this->input->post('nip'),
                'perusahaan_kerja' => $this->input->post('perusahaan_kerja'),
                'jabatan_kerja' => $this->input->post('jabatan_kerja'),
                'mulai_kerja' => $this->input->post('mulai_kerja'),
                'selesai_kerja' => $this->input->post('selesai_kerja')
              ];
              if ($this->pengalaman->updatePengalamanPegawai($dataInput,$id)>0 )
                {
                 $this->session->set_flashdata('flash',' Pengalaman kerja berhasil diupdate');
                 redirect('Profile/index/'. $this->input->post('nip').'/pengalaman');
                }
              else{
                $this->session->set_flashdata('flashgagal',' Pengalaman kerja gagal diupdate');
                redirect('Profile/index/'. $this->input->post('nip').'/pengalaman');
              }
          }

    }

    public function getPengalamanPegawaiJson(){
        $data=$this->pengalaman->getPengalamanPegawaiById($this->input->post('id_kerja'));
        echo json_encode($data);
    }

    public function deletePengalamanPegawai(){
      $id = $this->input->post('id_kerja',true);
      $nip = $this->input->post('nip',true);
      if ($this->pengalaman->deletePengalamanPegawai($id)>0){
          $this->session->set_flashdata('flash',' pengalaman berhasil dihapus');
          redirect('Profile/index/'.$nip.'/penghargaan');
      }
      else{  
        $this->session->set_flashdata('flashgagal',' pengalaman gagal dihapus');
         redirect('Profile/index/'. $nip.'/penghargaan');
      }
    }

}