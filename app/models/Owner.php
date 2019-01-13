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
     * Check if the password on db is the same as our input
     * @param string $password
     * @param string $id
     * @return bool
     */
    public function checkPasswordByUserId(string $password, string $id){
        $this->db->query('SELECT owner_password FROM owners WHERE owner_id = :id');
        $this->db->bind(':id', $id);
        $row = $this->db->single();
        if($this->db->rowCount() > 0){
            $pass = $row->owner_password;
            if(password_verify($password, $pass)){
                return true;
            }
        }
        return false;
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
        if($this->db->rowCount() > 0){
            $pass = $row->owner_password;
            if(password_verify($password, $pass)){
                return $row;
            }
        }
        return false;
    }

    /**
     * Update username
     * @param string newUsername
     * @param int id
     *
     * @return bool
     */
    public function updateUsername(string $newUsername, int $id){
        $this->db->query('UPDATE owners SET owner_username=:newUsername WHERE owner_id=:id');
        $this->db->bind(':newUsername', $newUsername);
        $this->db->bind(':id', $id);
        try {
            $this->db->execute();
            return true;
        }catch (Exception $e){
            return false;
        }
    }

    /**
     * Update email
     * @param string $newEmail
     * @param int id
     *
     * @return bool
     */
    public function updateEmail(string $newEmail, int $id){
        $this->db->query('UPDATE owners SET owner_email=:newEmail WHERE owner_id=:id');
        $this->db->bind(':newEmail', $newEmail);
        $this->db->bind(':id', $id);
        try {
            $this->db->execute();
            return true;
        }catch (Exception $e){
            return false;
        }
    }

    /**
     * Update password
     * @param string newPassword
     * @param int id
     *
     * @return bool
     */
    public function updatePassword(string $newPassword, int $id){
        $this->db->query('UPDATE owners SET owner_password=:newPassword WHERE owner_id=:id');
        $this->db->bind(':newPassword', $newPassword);
        $this->db->bind(':id', $id);
        try {
            $this->db->execute();
            return true;
        }catch (Exception $e){
            return false;
        }
    }

    /**
     * Update Owner Personal details
     * @param array $data
     * @param int id
     *
     * @return bool
     */
    public function updateDetails(array $data, int $id){
        $this->db->query('UPDATE owners 
                              SET owner_first_name = :name, owner_last_name = :last_name, owner_phone = :phone
                              WHERE owner_id = :id');
        $this->db->bind(':name', $data['name']);
        $this->db->bind(':last_name', $data['last_name']);
        $this->db->bind(':phone', $data['phone']);
        $this->db->bind(':id', $id);
        try{
            $this->db->execute();
            return true;
        }catch (Exception $e){
            return false;
        }
    }

    /**
     * Find if Owner has currently a Gym
     * @param int $id
     *
     * @return array
     */
    public function getGymByUserId(int $id){
        $this->db->query('SELECT * FROM gyms WHERE owners_owner_id = :id');
        $this->db->bind(':id', $id);
        $row = $this->db->single();
        if($this->db->rowCount() > 0){
            return $row;
        }
        return [];
    }

    /**
     * Find Trainers for current Gym
     * @param int $id
     *
     * @return array
     */
    public function getTrainersByGymId(int $id){
        $this->db->query('SELECT * FROM trainers WHERE gym_id = :id');
        $this->db->bind(':id', $id);
        $row = $this->db->resultSet();
        if($this->db->rowCount() > 0){
            return $row;
        }
        return [];
    }
}