<?php
/**
 * Created by PhpStorm.
 * User: george
 * Date: 8/12/2018
 * Time: 1:50 μμ
 */

class User{
    private $db;

    public function __construct(){
        $this->db = new Database;
    }

    //Find user by email
    public function findUserByEmail($email){
        $this->db->query('SELECT * FROM users WHERE email = :email');
        $this->db->bind(':email', $email);
        $row = $this->db->single();
        // Check row
        if($this->db->rowCount() > 0){
            return true;
        }else {
            return false;
        }
    }
}