<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class TipeIzinCuti extends CI_Controller{
    public function __construct(){
        parent::__construct();
        $this->load->model('User_model','user');
        $this->load->model('Kepegawaian_model','kepegawaian');
        if($this->session->userdata('level')!='admin'){
          redirect('Login');
         }
         header('Cache-Control: no cache'); //no cache
    }

    public function index(){
        $data['username']=$this->session->userdata('username');
        $data['level']=$this->session->userdata('level');
        $data['pegawai']=$this->kepegawaian->getAllPegawaiBiasa();
        $data['data']=$this->user->getUserJoin();

        if ($data['level']=="admin"){
  
          $this->load->view('templates/header_user');  
        $this->load->view('templates/headerbar',$data);
          $this->load->view('templates/sidebar');
          $this->load->view('izincuti/harilibur_v',$data);
          $this->load->view('templates/footer_user');
        }
        else{
          redirect('Login');  
        }
    }

    public function addUser(){
      $username=$this->input->post('username');
      $password=$this->input->post('password');
      if ($this->user->checkUsername($username)>0){
      
        $this->session->set_flashdata('flashgagal','username sudah ada');
        redirect('Datauser');
      }else{  $level=$this->input->post('level');
        $nip=$this->input->post('nip');
        if ($this->user->InsertUser($username,$password,$level,$nip) > 0){
          $this->session->set_flashdata('flash','user berhasil ditambah');
         redirect('Datauser');
        }else{
        $this->session->set_flashdata('flashgagal','username sudah ada');
        redirect('Datauser');
        }
      }
     
    }

    public function resetPass(){
      $this->user->resetUser($this->input->post('username'));
      $this->session->set_flashdata('flash','direset');
      redirect('Datauser');
    }

    public function getReset(){
      $username = $this->input->post('username');
      $data = $this->user->getUserByUsername($username);
      echo json_encode($data);
    }

    public function deleteUser(){
     $this->user->deleteUserModel($this->input->post('username'));
     $this->session->set_flashdata('flash','dihapus');
     redirect('Datauser');
    }


}