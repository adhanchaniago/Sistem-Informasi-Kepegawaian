<?php 


class SK_lain extends CI_Controller{
    public function __construct(){
        parent::__construct();
        if (empty($this->session->userdata('nip'))){
            redirect('Login');
        }
        $this->load->model('Sk_lain_model','sk');
        $this->load->model('Kepegawaian_model','kepegawaian');
        header('Cache-Control: no cache'); //no cache
    }
    
    public function index(){
        
        $data['pegawai']=$this->kepegawaian->getAllPegawaiBiasa();
        $this->form_validation->set_rules('nip','NIP','required',
        array('required'=>'NIP wajib diisi'));
        $this->form_validation->set_rules('no_sk','No SK','required',array('required'=>'No SK wajib diisi'));
        $this->form_validation->set_rules('tanggal_sk','Tanggak SK','required',array('required'=>'Tanggak SK wajib diisi'));
        $this->form_validation->set_rules('jenis_sk','Jenis SK','required',array('required'=>'Instansi wajib diisi'));
    
        if (empty($_FILES['file_sk']['name'])){
          $this->form_validation->set_rules('file_sk','File SK','required',array('required'=>'File wajib diisi pdf atau foto, maksimal 3 MB'));
        }

          if ($this->form_validation->run()==FALSE){
            $this->load->view('templates/header_form.php');
            $this->load->view('templates/headerbar.php');
            $this->load->view('templates/sidebar.php');
            $this->load->view('sk_lain/formsk_lain_v',$data);
            $this->load->view('templates/footer_form.php');
          }
          else{
              $dataInput=[
                'nip' => $this->input->post('nip'),
                'no_sk' => $this->input->post('no_sk'),
                'tanggal_sk' => $this->input->post('tanggal_sk'),
                'jenis_sk' => $this->input->post('jenis_sk'),
                'keterangan' => $this->input->post('keterangan')
              ];
              if ($this->sk->insertSkPegawai($dataInput)>0 )
                {
                 $this->session->set_flashdata('flash',' Sk berhasil dimasukan');
                 redirect('Profile/index/'. $this->input->post('nip').'/sk');
                }
              else{
                $this->session->set_flashdata('flashgagal',' Sk gagal dimasukan');
                redirect('Profile/index/'. $this->input->post('nip').'/sk');
              }
          }

  
    }
    
    public function editSk_lain($id){
      $id = decrypt_url($id);
        $data['sk']=$this->sk->getSkPegawaiById($id);
        $data['pegawai']=$this->kepegawaian->getAllPegawaiBiasa();
        $this->form_validation->set_rules('nip','NIP','required',
        array('required'=>'NIP wajib diisi'));
        $this->form_validation->set_rules('no_sk','No SK','required',array('required'=>'No SK wajib diisi'));
        $this->form_validation->set_rules('tanggal_sk','Tanggak SK','required',array('required'=>'Tanggak SK wajib diisi'));
        $this->form_validation->set_rules('jenis_sk','Jenis SK','required',array('required'=>'Instansi wajib diisi'));

          if ($this->form_validation->run()==FALSE){
            $this->load->view('templates/header_form.php');
            $this->load->view('templates/headerbar.php');
            $this->load->view('templates/sidebar.php');
            $this->load->view('sk_lain/editsk_lain_v',$data);
            $this->load->view('templates/footer_form.php');
          }
          else{
              $dataInput=[
                'nip' => $this->input->post('nip'),
                'no_sk' => $this->input->post('no_sk'),
                'tanggal_sk' => $this->input->post('tanggal_sk'),
                'jenis_sk' => $this->input->post('jenis_sk'),
                'keterangan' => $this->input->post('keterangan')
              ];
              if ($this->sk->updateSkPegawai($dataInput,$id)>0 )
                {
                 $this->session->set_flashdata('flash',' Sk berhasil diupdate');
                 redirect('Profile/index/'. $this->input->post('nip').'/sk');
                }
              else{
                $this->session->set_flashdata('flashgagal',' Sk gagal diupdate');
                redirect('Profile/index/'. $this->input->post('nip').'/sk');
              }
          }

  
    }

      
    public function getSkPegawaiJson(){
        $data=$this->sk->getSkPegawaiById($this->input->post('id_sk'));
        echo json_encode($data);
    }

    public function deleteSkPegawai(){
      $id = $this->input->post('id_sk',true);
      $nip = $this->input->post('nip',true);
      if ($this->sk->deleteSkPegawai($id)>0){
          $this->session->set_flashdata('flash',' Sk berhasil dihapus');
          redirect('Profile/index/'.$nip.'/sk');
      }
      else{  
        $this->session->set_flashdata('flashgagal',' Sk gagal dihapus');
         redirect('Profile/index/'. $nip.'/sk');
      }
    }
    
}