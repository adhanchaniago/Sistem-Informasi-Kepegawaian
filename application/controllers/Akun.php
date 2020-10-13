<?php

class Akun extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        if (empty($this->session->userdata('nip'))) {
            redirect('Login');
        }
        $this->load->model('User_model', 'user');
        $this->load->model('Login_model', 'login');

        header('Cache-Control: no cache'); //no cache
    }

    public function ubahPassword($username)
    {
        $data['user'] = $this->user->getUserByUsername($username);

        $this->form_validation->set_rules('password_lama', 'Password Lama', 'required', array('required', 'Password Lama Wajib diisi'));
        $this->form_validation->set_rules('password', 'Password Baru', 'required', array('required', 'Password Baru Wajib diisi'));

        if ($this->form_validation->run() == FALSE) {

            $this->load->view('templates/header_form.php');
            $this->load->view('templates/headerbar.php');
            $this->load->view('templates/sidebar.php');
            $this->load->view('datauser/ubahPassword_v', $data);
            $this->load->view('templates/footer_form.php');
        } else {

            $password_lama = $this->input->post('password_lama');
            $username = $this->input->post('username');
            $password = $this->input->post('password');
            $password_lama = encrypt_url($password_lama);
            if ($this->login->checkLogin($username, $password_lama) > 0) {
                if ($this->user->updatePasswordUser($username, $password) > 0) {
                    $this->session->set_flashdata('flash', ' Password berhasil dirubah');
                    redirect('Profile/index/' . $this->session->userdata('nip'));
                }
            } else {
                $this->session->set_flashdata('flashgagal', 'Password lama salah, jika lupa, hubungin admin untuk reset password');
                redirect('Akun/ubahPassword/' . $username);
            }
        }
    }
}
