<?php

class User{
    private $db;

    public function __construct(){
        $this->db = new Database;
    }

    /**
     * Register User
     * @param array $data
     * @return bool
     */
    public function register(array $data){
        $this->db->query('INSERT INTO users (user_first_name, user_last_name , user_password, user_email, user_username) 
                              VALUES (:fname, :lname, :password, :email, :username )');

        // Bind Values
        $this->db->bind(':fname',$data['first_name']);
        $this->db->bind(':lname',$data['last_name']);
        $this->db->bind(':password',$data['password']);
        $this->db->bind(':email',$data['email']);
        $this->db->bind(':username',$data['username']);

        // Execute
        try{
            $this->db->execute();
            return true;
        } catch (Exception $e){
            return false;
        }

    }

    /**
     * Find user by email
     * @param string $email
     * @return bool
     */
    public function findUserByEmail(string $email){
        $this->db->query('SELECT * FROM users WHERE user_email = :email');
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