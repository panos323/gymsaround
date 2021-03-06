<?php

class User{
    private $db;

    public function __construct(){
        $this->db = new Database;
    }

    /**
     * Get all users or owners or gyms
     * depending on $tab
     *
     * @param string $type
     * @return array
     */
    public function getAll(string $type){
        // Retrieve all from db
        $this->db->query("SELECT * FROM $type");
        $results = $this->db->resultSet();
        if($this->db->rowCount() > 0) {
            return $results;
        }
        return [];
    }

    /**
     * Register User
     * @param array $data
     * @return bool
     */
    public function register(array $data){

        // Register the user
        $this->db->query('INSERT INTO users (user_first_name, user_last_name , user_password, user_email, user_username, user_address, user_is_admin) 
                            VALUES (:fname, :lname, :password, :email, :username, :address, :admin )');
        // Bind Values
        $this->db->bind(':fname',$data['first_name']);
        $this->db->bind(':lname',$data['last_name']);
        $this->db->bind(':password',$data['password']);
        $this->db->bind(':email',$data['email']);
        $this->db->bind(':username',$data['username']);
        $this->db->bind(':address',$data['address']);
        $this->db->bind(':admin',false);

        // Execute
        try{
            $this->db->execute();
            return true;
        } catch (Exception $e){
            return false;
        }
    }

    /**
     * Find user by ID
     * @param string $id
     * @return bool
     */
    public function findUserById(string $id){
        $this->db->query('SELECT * FROM users WHERE user_id = :id');
        $this->db->bind(':id', $id);
        $row = $this->db->single();
        // Check row
        if($this->db->rowCount() > 0){
            return $row;
        }
        return false;
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
        if($this->db->rowCount() > 0){
            $pass = $row->user_password;
            if(password_verify($password, $pass)){
                return $row;
            }
        }
        return false;
    }

    /**
     * Check if the password on db is the same as our input
     * @param string $password
     * @param string $id
     * @return bool
     */
    public function checkPasswordByUsersId(string $password, string $id){
        $this->db->query('SELECT user_password FROM users WHERE user_id = :id');
        $this->db->bind(':id', $id);
        $row = $this->db->single();
        if($this->db->rowCount() > 0){
            $pass = $row->user_password;
            if(password_verify($password, $pass)){
                return true;
            }
        }
        return false;
    }

    /**
     * Find user's gym
     * @param string $gym_id
     * @return bool
     */
    public function findUserGym(string $gym_id) {
        $this->db->query('SELECT * FROM gyms WHERE gym_id = :gym_id');
        $this->db->bind(':gym_id', $gym_id);
        $row = $this->db->single();
        // Check row
        if($this->db->rowCount() > 0){
            return $row;
        }else {
            return false;
        }
    }


     /**
     * Update user by username
     * @param string $username
     * @param int id
     * 
     * @return bool
     */
    public function UpdateUserByUsername(string $username, int $id){
        $this->db->query('UPDATE users 
                          SET user_username = :username
                          WHERE user_id = :id
                          ');
        $this->db->bind(':username', $username);
        $this->db->bind(':id', $id);

         // Execute
         try{
            $this->db->execute();
            return true;
        } catch (Exception $e){
            return false;
        }
    }

    /**
     * Update user by username
     * @param string $newEmail
     * @param int id
     * @return bool
     */
    public function UpdateUserByEmail(string $newEmail, int $id){
        $this->db->query('UPDATE users 
                          SET user_email = :newEmail
                          WHERE user_id = :id
                        ');
        $this->db->bind(':newEmail', $newEmail);
        $this->db->bind(':id', $id);
        
          // Execute
          try{
            $this->db->execute();
            return true;
        } catch (Exception $e){
            return false;
        }
    }


    /**
     * Update user by password
     * @param string $password
     * @param int id
     * @return bool
     */
    public function UpdateUserByPassword(string $password, int $id){
        $this->db->query('UPDATE users 
                          SET user_password = :password
                          WHERE user_id = :id
                          ');
        $this->db->bind(':password', $password);
        $this->db->bind(':id', $id);

         // Execute
         try{
            $this->db->execute();
            return true;
        } catch (Exception $e){
            return false;
        }
    }

    /**
     * Update user
     * @param array $data
     * @param string $id
     * @return bool
     */
    public function updateUser(array $data, string $id){

        // Update the user
        $this->db->query('UPDATE users 
                          SET user_first_name = :first_name,
                              user_last_name = :last_name,
                              user_address = :address,
                              user_image = :image
                          WHERE user_id = :id
                        ');

        // Bind Values
        $this->db->bind(':first_name',$data['first_name']);
        $this->db->bind(':last_name',$data['last_name']);
        $this->db->bind(':address',$data['address']);
        $this->db->bind(':id', $id);
        $this->db->bind(':image', $data['image_file']);

        // Execute
        try{
            $this->db->execute();
            return true;
        } catch (Exception $e){
            return false;
        }
    }

    /**
     * Make a user admin OR remove admin from a user
     * @param string $isAdmin
     * @param string $id
     * @return bool
     */
    public function makeAdmin(string $isAdmin, string $id) {
        $this->db->query('UPDATE users 
                              SET  user_is_admin = :isAdmin
                              WHERE user_id = :id');
        $this->db->bind(':isAdmin', $isAdmin);
        $this->db->bind(':id', $id);

        try {
            $this->db->execute();
            return true;
        }catch (Exception $e) {
            return false;
        }
    }

    /**
     * Admin can delete Users if he wants to
     * @param string $id
     * @return bool
     */
    public function deleteUser(string $id) {
        $this->db->query('DELETE FROM users WHERE user_id = :id');
        $this->db->bind(':id', $id);

        try {
            $this->db->execute();
            return true;
        } catch (Exception $e) {
            return false;
        }
    }

    /**
     * Search for user by email.
     * If exists add token for password recovery.
     * @param string $email
     * @param string $token
     * @return bool
     */
    public function forgotPassword(string $email, string $token = '') {
        $this->db->query('UPDATE users
                              SET user_token = :token
                              WHERE user_email = :email');
        $this->db->bind(':email', $email);
        $this->db->bind(':token', $token);
        $this->db->execute();
        if($this->db->rowCount() > 0){
            return true;
        }
        return false;
    }

    /**
     * Check token and email if exist on user
     * @param string $email
     * @param string $token
     * @return bool
     */
    public function checkTokenAndEmail(string $email, string $token) {
        $this->db->query("SELECT  *
                              FROM users
                              WHERE user_email = :email AND user_token = :token");
        $this->db->bind(':email', $email);
        $this->db->bind(':token', $token);
        $row = $this->db->single();
        if($this->db->rowCount() > 0) {
            return $row->user_id;
        }
        return false;
    }

    /**
     * Change user's password without login
     * @param string $id
     * @param string $password
     * @return bool
     */
    public function resetPassword(string $id, string $password) {
        $this->db->query("UPDATE users
                              SET user_password = :password,
                                  user_token = ''
                              WHERE user_id = :id");
        $this->db->bind(':id', $id);
        $this->db->bind(':password', $password);
        $this->db->execute();
        if($this->db->rowCount() > 0){
            return true;
        }
        return false;
    }
}