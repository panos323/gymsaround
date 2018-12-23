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

    /**
     * Find user by username
     * @param string $username
     * @return bool
     */
    public function findUserByUsername(string $username){
        $this->db->query('SELECT * FROM users WHERE user_username = :username');
        $this->db->bind(':username', $username);
        $row = $this->db->single();
        // Check row
        if($this->db->rowCount() > 0){
            return true;
        }else {
            return false;
        }
    }

    /**
     * Verify password by user with email or username
     * @param string $key
     * @param string $password
     * @return bool
     */
    public function login(string $key,string $password){
        $this->db->query('SELECT * FROM users WHERE user_username = :key or user_email = :key');
        $this->db->bind(':key', $key);
        $row = $this->db->single();
        $pass = $row->user_password;
        if($this->db->rowCount() > 0){
            if(password_verify($password, $pass)){
                return $row;
            }
        }
        return false;
    }
}