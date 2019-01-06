<?php

class Owner{
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

        // Register the owner
        $this->db->query('INSERT INTO owners (owner_first_name, owner_last_name , owner_password, owner_email, owner_username, owner_phone, owner_is_activated) 
                            VALUES (:fname, :lname, :password, :email, :username, :phone, :activated )');

        // Bind Values
        $this->db->bind(':fname',$data['first_name']);
        $this->db->bind(':lname',$data['last_name']);
        $this->db->bind(':password',$data['password']);
        $this->db->bind(':email',$data['email']);
        $this->db->bind(':username',$data['username']);
        $this->db->bind(':phone',$data['phone']);
        $this->db->bind(':activated',0);

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
    public function findOwnerByEmail(string $email){
        $this->db->query('SELECT * FROM owners WHERE owner_email = :email');
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
    public function findOwnerByUsername(string $username){
        $this->db->query('SELECT * FROM owners WHERE owner_username = :username');
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
     * Find owner by phone
     * @param string $ownerphone
     * @return bool
     */
    public function findOwnerByPhone(string $ownerphone){
        $this->db->query('SELECT * FROM owners WHERE owner_phone = :phone');
        $this->db->bind(':phone', $ownerphone);
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
        $this->db->query('SELECT * FROM owners WHERE owner_username = :key or owner_email = :key');
        $this->db->bind(':key', $key);
        $row = $this->db->single();
        $pass = $row->owner_password;
        if($this->db->rowCount() > 0){
            if(password_verify($password, $pass)){
                return $row;
            }
        }
        return false;
    }
}