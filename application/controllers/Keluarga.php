<?php 

class Keluarga extends CI_Controller{
    public function __construct(){
        parent::__construct();
        $this->load->model('Keluarga_model','keluarga');
        $this->load->model('Kepegawaian_model','kepegawaian');
        if (empty($this->session->userdata('nip'))){
            redirect('Login');
        }
        header('Cache-Control: no cache'); //no cache
    }

    public function index(){
        $nip = $this->input->post('nip');
        $data['pegawai']=$this->kepegawaian->getPegawaiById($nip);
        $status = $this->input->post('status_klg');
        $this->form_validation->set_rules('nama_klg','Nama keluarga','required',array('required'=>'Nama keluarga wajib diisi'));
        $this->form_validation->set_rules('status_klg','Status Keluarga','required',array('required'=>'Pilih salah satu Status Keluarga '));
        $this->form_validation->set_rules('jk_klg','Jenis Kelamin','required',array('required'=>'Pilih salah satu Jenis Kelamin '));
        $this->form_validation->set_rules('tl_klg','Tanggal Lahir','required',array('required'=>'Tanggal Lahir wajib diisi'));

          if ($this->form_validation->run()==FALSE){
            $this->load->view('templates/header_form.php');
            $this->load->view('templates/headerbar.php');
            $this->load->view('templates/sidebar.php');
            $this->load->view('keluarga/formkeluarga_v',$data);
            $this->load->view('templates/footer_form.php');
          }
          else{
              if ($status=='Istri' || $status=='Suami'){
                $dataInput=[
                    'nip' => $this->input->post('nip'),
                    'nama_klg' => $this->input->post('nama_klg'),
                    'status_klg' => $this->input->post('status_klg'),
                    'jk_klg' => $this->input->post('jk_klg'),
                    'tl_klg' => $this->input->post('tl_klg'),
                    'tl_menikah' => $this->input->post('tl_menikah'),
                    'catatan' => $this->input->post('catatan')
                ];
              }else{
                $anak="Anak ke- ".$this->input->post('anak_ke');
                $dataInput=[
                  'nip' => $this->input->post('nip'),
                  'nama_klg' => $this->input->post('nama_klg'),
                  'status_klg' => $anak ,
                  'jk_klg' => $this->input->post('jk_klg'),
                  'tl_klg' => $this->input->post('tl_klg'),
                  'catatan' => $this->input->post('catatan')
              ];
              }

              if ($this->keluarga->insertKeluargaPegawai($dataInput)>0 )
                {
                 $this->session->set_flashdata('flash','Keluarga berhasil dimasukan');
                 redirect('Profile/index/'. $this->input->post('nip').'/'.uniqid().'/keluarga');
                }
              else{
                $this->session->set_flashdata('flashgagal','Keluarga gagal dimasukan');
                redirect('Profile/index/'. $this->input->post('nip').'/'.uniqid().'/keluarga');
              }
          }
    }
    

    public function editKeluarga($id){
      $id = decrypt_url($id);
      $data['keluarga'] = $this->keluarga->getKeluargaPegawaiById($id);
      $data['pegawai']=$this->kepegawaian->getPegawaiById($data['keluarga']['nip']);
        if ($data['keluarga']['status_klg']!='Suami' && $data['keluarga']['status_klg']!='Istri'){
          $anakk=explode('Anak ke- ',$data['keluarga']['status_klg']);
          $data['anakke']=$anakk[1];
          $data['anak']='Anak';
          $data['pasangan']='0';
        }else{
          $data['anakke']='0';
          $data['anak']='0';
          $data['pasangan']='ada';
        }

        $status = $this->input->post('status_klg');
        $this->form_validation->set_rules('nama_klg','Nama keluarga','required',array('required'=>'Nama keluarga wajib diisi'));
        $this->form_validation->set_rules('status_klg','Status Keluarga','required',array('required'=>'Pilih salah satu Status Keluarga '));
        $this->form_validation->set_rules('jk_klg','Jenis Kelamin','required',array('required'=>'Pilih salah satu Jenis Kelamin '));
        $this->form_validation->set_rules('tl_klg','Tanggal Lahir','required',array('required'=>'Tanggal Lahir wajib diisi'));

          if ($this->form_validation->run()==FALSE){
            $this->load->view('templates/header_form.php');
            $this->load->view('templates/headerbar.php');
            $this->load->view('templates/sidebar.php');
            $this->load->view('keluarga/editkeluarga_v',$data);
            $this->load->view('templates/footer_form.php');
          }
          else{
              if ($status=='Istri' || $status=='Suami'){
                $dataInput=[
                    'nip' => $this->input->post('nip'),
                    'nama_klg' => $this->input->post('nama_klg'),
                    'status_klg' => $this->input->post('status_klg'),
                    'jk_klg' => $this->input->post('jk_klg'),
                    'tl_klg' => $this->input->post('tl_klg'),
                    'tl_menikah' => $this->input->post('tl_menikah'),
                    'catatan' => $this->input->post('catatan')
                ];
              }else{
                $anak="Anak ke- ".$this->input->post('anak_ke');
                $dataInput=[
                  'nip' => $this->input->post('nip'),
                  'nama_klg' => $this->input->post('nama_klg'),
                  'status_klg' => $anak ,
                  'jk_klg' => $this->input->post('jk_klg'),
                  'tl_klg' => $this->input->post('tl_klg'),
                  'catatan' => $this->input->post('catatan')
              ];
              }

              if ($this->keluarga->updateKeluargaPegawai($dataInput,$id)>0 )
                {
                 $this->session->set_flashdata('flash','Keluarga berhasil diupdate');
                 redirect('Profile/index/'. $this->input->post('nip').'/'.uniqid().'/keluarga');
                }
              else{
                $this->session->set_flashdata('flashgagal','Keluarga gagal diupdate');
                redirect('Profile/index/'. $this->input->post('nip').'/'.uniqid().'/keluarga');
              }
          }
    }

    public function deleteKeluargaPegawai(){
      $id = $this->input->post('id_keluarga');
      $nip = $this->input->post('nip');
      if ($this->keluarga->deleteKeluargaPegawai($id)>0){
        $this->session->set_flashdata('flash','Keluarga berhasil dihapus');
        redirect('Profile/index/'.$nip.'/'.uniqid().'/keluarga');
      }
    }
    
    public function getKeluargaPegawaiJson(){
      $id=$this->input->post('id_keluarga');
      $data = $this->keluarga->getKeluargaPegawaiById($id);
      echo json_encode($data);
    }

    
}