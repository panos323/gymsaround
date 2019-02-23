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
     * Find owner by ID
     * @param string $id
     * @return bool
     */
    public function findOwnerById(string $id){
        $this->db->query('SELECT * FROM owners WHERE owner_id = :id');
        $this->db->bind(':id', $id);
        $row = $this->db->single();
        // Check row
        if($this->db->rowCount() > 0){
            return $row;
        }
        return false;
    }

    /**
     * Find owner by email
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
     * Find owner by username
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
                              SET owner_first_name = :name, owner_last_name = :last_name, owner_phone = :phone, owner_image = :image
                              WHERE owner_id = :id');
        $this->db->bind(':name', $data['name']);
        $this->db->bind(':last_name', $data['last_name']);
        $this->db->bind(':phone', $data['phone']);
        $this->db->bind(':id', $id);
        $this->db->bind(':image', $data['image_file']);
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
    public function getTrainersByGymId(){
        $this->db->query('SELECT * FROM trainers WHERE gym_id = :id');
        $this->db->bind(':id', $_SESSION['gym_id']);
        $row = $this->db->resultSet();
        if($this->db->rowCount() > 0){
            return $row;
        }
        return [];
    }

    /**
     * Register Gym on Database
     * @param array $data
     * @return bool
     */
    public function register_gym(array $data){
        //Query
        $this->db->query('INSERT INTO gyms (gym_name, gym_description, gym_location, gym_type, gym_monthly_price, gym_yearly_price, owners_owner_id)
                              VALUES (:name, :description, :location, :type, :month_price, :year_price, :owners)');

        // Bind values
        $this->db->bind(':name', $data['name']);
        $this->db->bind(':description', $data['description']);
        $this->db->bind(':location', $data['location']);
        $this->db->bind(':type', $data['type']);
        $this->db->bind(':month_price', $data['month_price']);
        $this->db->bind(':year_price', $data['year_price']);
        $this->db->bind(':owners', $_SESSION['id']);

        // Execute
        try {
            $this->db->execute();
            return true;
        } catch (Exception $e) {
            return false;
        }
    }

    /**
     * Update Gym Details
     * @param array $data
     * @return bool
     */
    public function update_gym(array $data){
        $this->db->query('UPDATE gyms 
                              SET gym_name = :name,
                                  gym_location = :location,
                                  gym_type = :type,
                                  gym_yearly_price = :year,
                                  gym_monthly_price = :month,
                                  gym_description = :description
                              WHERE owners_owner_id = :id');
        $this->db->bind(':name', $data['name']);
        $this->db->bind(':location', $data['location']);
        $this->db->bind(':type', $data['type']);
        $this->db->bind(':year', $data['year_price']);
        $this->db->bind(':month', $data['month_price']);
        $this->db->bind(':description', $data['description']);
        $this->db->bind(':id', $_SESSION['id']);
        try{
            $this->db->execute();
            return true;
        }catch (Exception $e){
            return false;
        }
    }

    /**
     * Delete specific Gym
     * @return bool
     */
    public function delete_gym(){
        $this->db->query('DELETE FROM gyms WHERE owners_owner_id = :id');
        $this->db->bind(':id', $_SESSION['id']);
        try{
            $this->db->execute();
            return true;
        }catch (Exception $e){
            return false;
        }
    }

    /**
     * Add Trainer for a specific gym
     * @param array $data
     * @param $image_file
     * @return bool
     */
    public function add_trainer(array $data, $image_file){
        $this->db->query('INSERT INTO trainers (trainer_name, trainer_description, trainer_title,trainer_image, gym_id) 
                              VALUES (:name, :description, :title, :image, :id)');
        $this->db->bind(':name', $data['name']);
        $this->db->bind(':description', $data['description']);
        $this->db->bind(':image', $image_file);
        $this->db->bind(':title', $data['title']);
        $this->db->bind(':id', $_SESSION['gym_id']);
        try{
            $this->db->execute();
            return true;
        }catch (Exception $e){
            return false;
        }
    }

    /**
     * Update Trainer Details
     * @param array $data
     * @return bool
     */
    public function update_trainer(array $data){
        $this->db->query('UPDATE trainers 
                              SET trainer_name = :name,
                                  trainer_title = :title,
                                  trainer_description = :description
                              WHERE trainer_id = :id');
        $this->db->bind(':name', $data['name']);
        $this->db->bind(':title', $data['title']);
        $this->db->bind(':description', $data['description']);
        $this->db->bind(':id', $data['id']);
        try{
            $this->db->execute();
            return true;
        }catch (Exception $e){
            return false;
        }
    }

    /**
     * Delete specific Trainer by ID
     * @param $id
     * @return bool
     */
    public function delete_trainer($id){
        $this->db->query('DELETE FROM trainers WHERE trainer_id = :id');
        $this->db->bind(':id', $id);
        try{
            $this->db->execute();
            return true;
        }catch (Exception $e){
            return false;
        }
    }

    /**
     * Activate an owner OR deactivate
     * @param string $isActivated
     * @param string $id
     * @return bool
     */
    public function activateOwner(string $isActivated, string $id) {
        $this->db->query('UPDATE owners 
                              SET  owner_is_activated = :isActivated
                              WHERE owner_id = :id');
        $this->db->bind(':isActivated', $isActivated);
        $this->db->bind(':id', $id);

        try {
            $this->db->execute();
            return true;
        }catch (Exception $e) {
            return false;
        }
    }

    /**
     * Admin can delete Owners if he wants to
     * @param string $id
     * @return bool
     */
    public function deleteOwner(string $id) {
        $this->db->query('DELETE FROM owners WHERE owner_id = :id');
        $this->db->bind(':id', $id);

        try {
            $this->db->execute();
            return true;
        } catch (Exception $e) {
            return false;
        }
    }
}