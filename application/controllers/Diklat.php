<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Diklat extends CI_Controller{
    public function __construct(){
        parent::__construct();
        $this->load->model('Kepegawaian_model','kepegawaian');
        $this->load->model('Diklat_model','diklat');
        if(empty($this->session->userdata('nip'))){
          redirect('Login');
        }
        
          
        header('Cache-Control: no cache'); //no cache
    }

    public function index(){
     
        $data['pegawai']=$this->kepegawaian->getAllPegawaiBiasa();
          $this->form_validation->set_rules('nip','NIP','required',
          array('required'=>'NIP wajib diisi'));
          $this->form_validation->set_rules('nama_diklat','Nama Diklat','required',array('required'=>'Nama Diklat wajib diisi'));
          $this->form_validation->set_rules('daterange','Waktu wajib diisi','required',array('required'=>'Waktu wajib diisi'));
          $this->form_validation->set_rules('tanda_lulus_diklat','Tanda Lulus','required',array('required'=>'Tanda Lulus wajib diisi'));
          $this->form_validation->set_rules('tempat_diklat','Tempat','required',array('required'=>'Tempat wajib diisi'));
          $this->form_validation->set_rules('negara_diklat','Negara','required',array('required'=>'Negara wajib diisi'));
         

          if ($this->form_validation->run()==FALSE){
            $this->load->view('diklat/formDiklat_v',$data);
          }
          else{
              
            $tanggal = $this->input->post('daterange');
            $tanggal = explode(" - ",$tanggal);
            $tanggalMulai = explode("/",$tanggal[0]);
            $tanggalSelesai = explode("/",$tanggal[1]);
            $mulai_diklat = $tanggalMulai[2]."-".$tanggalMulai[0]."-".$tanggalMulai[1];
            $selesai_diklat = $tanggalSelesai[2]."-".$tanggalSelesai[0]."-".$tanggalSelesai[1];
              
            $data=[
              "nip" => $this->input->post('nip'),
              "nama_diklat" => $this->input->post('nama_diklat'),
              "mulai_diklat" => $mulai_diklat,
              "selesai_diklat" => $selesai_diklat,
              "tanda_lulus_diklat" => $this->input->post('tanda_lulus_diklat'),
              "tempat_diklat" => $this->input->post('tempat_diklat'),
              "negara_diklat" => $this->input->post('negara_diklat'),
              "sponsor_diklat" => $this->input->post('sponsor_diklat'),
              "keterangan" => $this->input->post('keterangan')
            ];

            if ($this->diklat->insertDiklatPegawai($data)>0){
              $this->session->set_flashdata('flash','Pelatihan berhasil ditambah');
              redirect('Profile/index/'. $this->input->post('nip').'/pelatihan');
            }
            else{
              $this->session->set_flashdata('flashgagal','Pelatihan gagal ditambah');
              redirect('Profile/index/'. $this->input->post('nip').'/pelatihan');
            }
          }

    }

    public function getDiklatPegawaiJson(){
        $data=$this->diklat->getDiklatPegawai($this->input->post('id_Diklat'));
        echo json_encode($data);
    }

    public function deleteDiklatPegawai(){
      $id = $this->input->post('id_diklat',true);
      $nip = $this->input->post('nip',true);
      if ($this->diklat->deleteDiklatPegawai($id)>0){
          $this->session->set_flashdata('flash','Diklat berhasil dihapus');
          redirect('Profile/index/'.$nip.'/pelatihan');
      }
      else{
        echo "error";
      }
    }

    public function editDiklat($id){
      $id = decrypt_url($id);
      $data['pegawai']=$this->kepegawaian->getAllPegawaiBiasa();
      $data['diklat']=$this->diklat->getDiklatPegawai($id);
      $mulai=explode('-',$data['diklat']['mulai_diklat']);
      $selesai=explode('-',$data['diklat']['selesai_diklat']);
      $data['diklat']['mulai_diklat']=$mulai[1]."/".$mulai[2]."/".$mulai[0];
      $data['diklat']['selesai_diklat']=$selesai[1]."/".$selesai[2]."/".$selesai[0];

      $this->form_validation->set_rules('nip','NIP','required',
      array('required'=>'NIP wajib diisi'));
      $this->form_validation->set_rules('nama_diklat','Nama Diklat','required',array('required'=>'Nama Diklat wajib diisi'));
      $this->form_validation->set_rules('daterange','Waktu wajib diisi','required',array('required'=>'Waktu wajib diisi'));
      $this->form_validation->set_rules('tanda_lulus_diklat','Tanda Lulus','required',array('required'=>'Tanda Lulus wajib diisi'));
      $this->form_validation->set_rules('tempat_diklat','Tempat','required',array('required'=>'Tempat wajib diisi'));
      $this->form_validation->set_rules('negara_diklat','Negara','required',array('required'=>'Negara wajib diisi'));
     

      if ($this->form_validation->run()==FALSE){
        $this->load->view('diklat/editDiklat_v',$data);
      }
      else{
          
        $tanggal = $this->input->post('daterange');
        $tanggal = explode(" - ",$tanggal);
        $tanggalMulai = explode("/",$tanggal[0]);
        $tanggalSelesai = explode("/",$tanggal[1]);
        $mulai_diklat = $tanggalMulai[2]."-".$tanggalMulai[0]."-".$tanggalMulai[1];
        $selesai_diklat = $tanggalSelesai[2]."-".$tanggalSelesai[0]."-".$tanggalSelesai[1];
          
        $data=[
          "nip" => $this->input->post('nip'),
          "nama_diklat" => $this->input->post('nama_diklat'),
          "mulai_diklat" => $mulai_diklat,
          "selesai_diklat" => $selesai_diklat,
          "tanda_lulus_diklat" => $this->input->post('tanda_lulus_diklat'),
          "tempat_diklat" => $this->input->post('tempat_diklat'),
          "negara_diklat" => $this->input->post('negara_diklat'),
          "sponsor_diklat" => $this->input->post('sponsor_diklat'),
          "keterangan" => $this->input->post('keterangan')
        ];

        if ($this->diklat->updateDiklatPegawai($data,$id)>0){
          $this->session->set_flashdata('flash','Pelatihan berhasil diupdate');
          redirect('Profile/index/'. $this->input->post('nip').'/pelatihan');
        }
        else{
          $this->session->set_flashdata('flashgagal','Pelatihan gagal diupdate');
          redirect('Profile/index/'. $this->input->post('nip').'/pelatihan');
        }
      }

    }
}