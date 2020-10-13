<?php

class User_model extends CI_Model{
    public function InsertUser($un,$pw,$lvl,$nip){
        $pw=encrypt_url($pw);
        $this->db->insert('user',['username'=> $un, 'password' => $pw,'level' => $lvl, 'nip'=>$nip ]);
        return $this->db->affected_rows();
    }

    public function getUser(){
     return $this->db->get('user')->result_array();
    }

    public function resetUser($datas){

    $pass=encrypt_url("123");
    
     $data=[
        "password" => $pass
     ];

     $this->db->where('username',$datas);
     $this->db->update('user',$data);
    }

    public function getUserByUsername($username){
         return $this->db->get_where('user',['username' => $username])->row_array();
    }
    public function checkUsername($username){
        $this->db->get_where('user',['username' => $username]);
        return $this->db->affected_rows();   
    }
    public function getUserCount(){

        $query = $this->db->query('SELECT nip from user where level="pegawai" ');
        $pegawai = $query->num_rows();
        $query = $this->db->query('SELECT username from user where level="admin" ');
       $admin = $query->num_rows();

        $data=[
            [
                "label" => "pegawai",
                "count" => $pegawai
            ],
            [
                "label" => "admin",
                "count" => $admin
            ]
        ];

        return $data;
    }

    public function deleteUserModel($username){
        $this->db->delete('user',['username' => $username ]);
        return $this->db->affected_rows();
    }

    public function getUserJoin(){
        $this->db->select('*');
        $this->db->from('user');
        $this->db->join('pegawai', 'user.nip = pegawai.nip');
        return $this->db->get()->result_array();
    }

    public function InsertUserPegawai($username,$nip){
        $password = encrypt_url('123');
        $this->db->insert('user',['username' => $username, 'password' => $password, 'level'=>'pegawai', 'nip' => $nip]);
        return $this->db->affected_rows();
    }

    public function updatePasswordUser($username,$password){
        $this->db->where('username',$username);
        $password = encrypt_url($password);
        $this->db->update('user',['password'=>$password]);
        return $this->db->affected_rows();
    }

    
}