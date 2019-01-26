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




    /*--------TESTING UPDATES-----------------*/


    /**
     * Find user's gym
     * @param int $gym_id
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
     * @param string $username
     * @param int id
     * 
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
     * @return bool
     */
    public function updateUser(array $data, string $id){

        // Update the user
        $this->db->query('UPDATE users 
                          SET user_first_name = :first_name,
                              user_last_name = :last_name,
                              user_address = :address
                          WHERE user_id = :id
                        ');

        // Bind Values
        $this->db->bind(':first_name',$data['first_name']);
        $this->db->bind(':last_name',$data['last_name']);
        $this->db->bind(':address',$data['address']);
        $this->db->bind(':id', $id);

        // Execute
        try{
            $this->db->execute();
            return true;
        } catch (Exception $e){
            return false;
        }
    }

    /*--------TESTING UPDATES-----------------*/


}