<?php

class Login_model extends CI_Model{
    public function getUserById($username,$password){
        return $this->db->get_where('user',['username' => $username, 'password' => $password])->row_array();
    }
    public function checkLogin($username,$password){
        $this->db->get_where('user',['username' => $username, 'password' => $password]);
        return $this->db->affected_rows();   
    }

    public function getPegawaiById($username){
        return $this->db->get_where('username',['username'=>$username])->row_array();
    }
}