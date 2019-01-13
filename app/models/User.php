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
        $this->db->query('INSERT INTO users (user_first_name, user_last_name , user_password, user_email, user_username, user_address) 
                            VALUES (:fname, :lname, :password, :email, :username, :address )');
        // Bind Values
        $this->db->bind(':fname',$data['first_name']);
        $this->db->bind(':lname',$data['last_name']);
        $this->db->bind(':password',$data['password']);
        $this->db->bind(':email',$data['email']);
        $this->db->bind(':username',$data['username']);
        $this->db->bind(':address',$data['address']);

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













    /*--------TESTING UPDATES-----------------*/
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
    public function UpdateUserByEmail(string $email, int $id){
        $this->db->query('UPDATE users 
                          SET user_email = :email
                          WHERE user_id = :id
                        ');
        $this->db->bind(':email', $data['email']);
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
                              user_adress = :address
                          WHERE user_id = :id
                        ');

        // Bind Values
        $this->db->bind(':fname',$data['first_name']);
        $this->db->bind(':lname',$data['last_name']);
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