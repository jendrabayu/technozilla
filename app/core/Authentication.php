<?php

namespace App\Core;

use App\Core\DB;

class Authentication
{
    protected $db;

    public function __construct()
    {
        $this->db = new DB;
    }

    public function register($user, $data)
    {
        $query = "INSERT INTO $user VALUES('', :nama, :email, :password, :created_at, :updated_at)";
        $this->db->query($query);
        $this->db->bind('nama', $data['nama']);
        $this->db->bind('email', $data['email']);
        $this->db->bind('password', md5($data['password']));
        $this->db->bind('created_at', currentTimeStamp());
        $this->db->bind('updated_at', currentTimeStamp());
        $this->db->execute();
        return $this->db->rowCount();
    }

    public function login($user, $email, $password)
    {
        $password = md5($password);
        $this->db->query("SELECT * FROM $user WHERE email = $email AND password = $password");
        return $this->db->resultSet();
    }
}
