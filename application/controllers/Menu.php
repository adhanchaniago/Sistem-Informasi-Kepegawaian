<?php
defined('BASEPATH') OR exit('No direct script access allowed');
require_once 'DiskStatus.php';

class Menu extends CI_Controller{
    public function __construct(){
        parent::__construct();
        if (empty($this->session->userdata('nip'))){
            redirect('Login');
        }
        $this->load->model('Kepegawaian_model','kepegawaian');
        header('Cache-Control: no cache'); //no cache
    }
    
    public function index(){
     
        $data['tanggal']=date("m");
        $data['tanggal1']=date('m',strtotime('+1 months'));
          
        if ($this->session->userdata('level')=='pegawai'){ 
            $this->load->view('templates/header.php');
            $this->load->view('templates/headerbar.php');
            $this->load->view('templates/sidebar.php');
            $this->load->view('menu/menu_v',$data);
        }
    }
    public function getUltahPegawai(){
      
        $tanggal = $this->input->post('tanggal');
        // $tanggal = date_create(date('Y-m-d'));
        // $data = $this->kepegawaian->getUltahPegawai($tanggal->format("m-d"));
        $data = $this->kepegawaian->getUltahPegawai($tanggal);
        echo json_encode($data);
      }
}
?>