<?php
class Login extends CI_Controller{

    public function __construct(){
        parent::__construct();
        $this->load->model('Login_model','login');
        $this->load->model('Kepegawaian_model','kepegawaian');
        header('Cache-Control: no cache'); //no cache
    }

    public function index(){

        $this->form_validation->set_rules('username','Username','required',array('required'=>'Username wajib diisi'));
        $this->form_validation->set_rules('password','Password','required',array('required'=>'Password wajib diisi'));

        if ($this->form_validation->run()==FALSE){
            $this->load->view('login/login');
            $this->load->view('templates/footer');
        }else
        {
            $username = htmlspecialchars($this->input->post('username',TRUE));
            $password = htmlspecialchars($this->input->post('password',TRUE));

            $password = encrypt_url($password);
            if ($this->login->checkLogin($username,$password)>0){

                $data=$this->login->getUserById($username,$password);
                $this->session->set_userdata('level',$data['level']);
                $this->session->set_userdata('username',$data['username']);
                $this->session->set_userdata('nama',$data['nama']);
                $this->session->set_userdata('nip',$data['nip']);
                $this->session->set_userdata('status_klg',$data['status_klg']);
                $pegawai=$this->kepegawaian->getPegawaiById($data['nip']);
                $this->session->set_userdata('foto',$pegawai['foto']);
                $this->session->set_userdata('status',$pegawai['status_pgw']);
                $this->session->set_userdata('keterangan',$pegawai['keterangan']);
                if ($this->session->userdata('level')=='admin'){
                    redirect('Dashboard');
                }
                else if($this->session->userdata('level')=='pegawai'){
                    redirect('Menu');
                }
            }else{
            
            $data['error']=' username atau password salah';

            $this->load->view('login/login',$data);
            $this->load->view('templates/footer');
            }
        }
        
        
    }



}