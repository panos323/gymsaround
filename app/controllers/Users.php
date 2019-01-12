<?php

class Users extends Controller {
    public function __construct(){
        $this->userModel = $this->model('User');
    }

    // Registration method for user
    public function register(){

        // Check for POST
        if($_SERVER['REQUEST_METHOD'] == 'POST'){
            // Process form

            // Sanitize POST data
            $_POST = filter_input_array(INPUT_POST,FILTER_SANITIZE_STRING);

            // Init data
            $data = [
                'first_name' => trim($_POST['first_name']),
                'last_name' => trim($_POST['last_name']),
                'username' => trim($_POST['username']),
                'email' => trim($_POST['email']),
                'password' => trim($_POST['password']),
                'confirm_password' => trim($_POST['confirm_password']),
                'address' => isset($_POST['address']) ? trim($_POST['address']) : '',
                'fname_error' => '',
                'lname_error' => '',
                'username_error' => '',
                'email_error' => '',
                'pass_error' => '',
                'confirm_pass_error' => '',
                'register_error' => '',
                'address_error' => '',
            ];

            // Validate email
            if(empty($data['email'])){
                $data['email_error'] = 'Please enter email';
            } else {
                // Check if email already exists
                if($this->userModel->findUserByEmail($data['email'])){
                    $data['email_error'] = 'Email already exists';
                }
            }

            // Validate first name
            if(empty($data['first_name'])){
                $data['fname_error'] = 'Please enter first name';
            }

            // Validate last name
            if(empty($data['last_name'])){
                $data['lname_error'] = 'Please enter last name';
            }

            // Validate last name
            if(empty($data['username'])){
                $data['username_error'] = 'Please enter username';
            }

            // Validate password
            if(empty($data['password'])){
                $data['pass_error'] = 'Please enter password';
            } elseif (strlen($data['password']) < 6){
                $data['pass_error'] = 'Password must be at least 6 characters';
            }

            // Validate confirm password
            if(empty($data['confirm_password'])){
                $data['confirm_pass_error'] = 'Please confirm password';
            } else {
                if($data['password'] != $data['confirm_password']){
                    $data['confirm_pass_error'] = 'Passwords do not match';
                }
            }

            // Check if errors are empty
            if( empty($data['email_error']) &&
                empty($data['fname_error']) &&
                empty($data['lname_error']) &&
                empty($data['pass_error']) &&
                empty($data['confirm_pass_error']) &&
                empty($data['username_error']) ){
                // Validated

                // Hash Password
                $data['password'] = password_hash($data['password'], PASSWORD_DEFAULT);

                // Register User
                if($this->userModel->register($data)){
                    flash('register_success', 'You are now registered and you can log in');
                    redirect('users/login');
                } else{
                    $data['register_error'] = 'Something went wrong. Please try again.';
                    $this->view('users/register', $data);
                }
            } else {
                // Load view with errors
                $this->view('users/register', $data);
            }
        }else {
            // Init data
            $data = [
                'first_name' => '',
                'last_name' => '',
                'username' => '',
                'email' => '',
                'password' => '',
                'confirm_password' => '',
                'address' => '',
                'fname_error' => '',
                'lname_error' => '',
                'username_error' => '',
                'email_error' => '',
                'pass_error' => '',
                'confirm_pass_error' => '',
                'register_error' => '',
                'address_error' => '',
            ];

            // Load view
            $this->view('users/register', $data);
        }
    }

    // Login method
    public function login() {
        // Check for POST
        if ($_SERVER['REQUEST_METHOD'] == 'POST'){

            // Sanitize POST data
            $_POST = filter_input_array(INPUT_POST,FILTER_SANITIZE_STRING);

            // Init data
            $data = [
                'login_credential' => trim($_POST['login_credential']),
                'password' => trim($_POST['password']),
                'login_credential_error' => '',
                'pass_error' => '',
            ];

            // Validate email/username
            if(empty($data['login_credential'])){
                $data['login_credential_error'] = 'Please enter email or username';
            }

            // Validate password
            if(empty($data['password'])){
                $data['pass_error'] = 'Please enter password';
            }

            //wrong  email
            if((!$this->userModel->findUserByUsername($data['login_credential'])) && (!$this->userModel->findUserByEmail($data['login_credential']))) {
                $data['login_credential_error'] = 'Username/Email does not exist';
            }

            // Check if errors are empty
            if (empty($data['login_credential_error']) &&
                empty($data['pass_error'])) {
                // Login User
                $isLoggedIn = $this->userModel->login($data['login_credential'], $data['password']);
                if (!$isLoggedIn){
                    $data['pass_error'] = 'Password is wrong. Please try again.';
                    $this->view('users/login', $data);
                }else{
                    $this->createUserSession($isLoggedIn);
                }
            } else {
                // Load view with errors
                $this->view('users/login', $data);
            }

        } else {
            // Init data
            $data = [
                'login_credential' => '',
                'password' => '',
                'login_credential_error' => '',
                'pass_error' => ''
            ];

            // Load view
            $this->view('users/login', $data);
        }
    }

    // Load view for facebook login
    // TODO: Fix this to implement profile after login
    public function facebook(){
        $this->view('users/facebook');
    }

    // Method for user's profile
    public function profile(string $username){
        if($this->isLoggedIn() && $_SESSION['username'] === $username){
            $data = [
                'username' => $username
            ];
            // Load view
            $this->view('users/profile', $data);
        }else{
            //TODO: Unauthenticated page create.
            die('You are not authenticated to access this page');
        }
    }

    // Create session for users
    public function createUserSession($user){
        $_SESSION['username'] = $user->user_username;
        $_SESSION['id'] = $user->user_id;
        $_SESSION['first_name'] = $user->user_first_name;
        $_SESSION['last_name'] = $user->user_last_name;
        $_SESSION['type'] = 'users';
        redirect('users/profile/'.$_SESSION['username']);
    }

    // Logout method for users
    public function logout(){
        unset($_SESSION['username']);
        unset($_SESSION['id']);
        unset($_SESSION['first_name']);
        unset($_SESSION['last_name']);
        unset($_SESSION['type']);
        session_destroy();
        redirect('users/login');
    }

    // Method to check if user is logged in.
    public function isLoggedIn(){
        if(isset($_SESSION['user_id'])){
            return true;
        }
        return false;
    }


















    
    /*---------------testing updates-----------------------*/
    public function updateUser() {
        //Check for POST
        if($_SERVER['REQUEST_METHOD'] == 'POST'){
            //Process form

            //Sanitize POST data
            $_POST = filter_input_array(INPUT_POST,FILTER_SANITIZE_STRING);

            // Init data
            $data = [
                'first_name' => trim($_POST['first_name']),
                'last_name' => trim($_POST['last_name']),
                'address' => isset($_POST['address']) ? trim($_POST['address']) : '',
                'fname_error' => '',
                'lname_error' => '',
                'address_error' => '',
                'update_error' => '',
            ];
        

        // Validate first name
        if(empty($data['first_name'])){
            $data['fname_error'] = 'Please enter first name';
        }

        // Validate last name
        if(empty($data['last_name'])){
            $data['lname_error'] = 'Please enter last name';
        }

        // Check if errors are empty
        if (empty($data['fname_error']) &&
                empty($data['lname_error'])) {
                // Update User
                $updateUser = $this->userModel->updateUser($data, $id);
                if (!$updateUser){
                    $data['update_error'] = 'Something went wrong. Please try again.';
                    $this->view('users/profile', $data);
                }else{
                    $this->createUserSession($isLoggedIn);
                }
            } else {
                // Load view with errors
                $this->view('users/profile', $data);
            }

        } else {
            // Init data
            $data = [
                'first_name' => '',
                'last_name' => '',
                'address' =>  '',
                'fname_error' => '',
                'lname_error' => '',
                'address_error' => '',
                'update_error' => '',
            ];

            // Load view
            $this->view('users/profile', $data);
        }            
    }


    public function UpdateUserEmail() {
        //Check for POST
        if($_SERVER['REQUEST_METHOD'] == 'POST'){
            //Process form

            //Sanitize POST data
            $_POST = filter_input_array(INPUT_POST,FILTER_SANITIZE_STRING);

             // Init data
             $data = [
                'email' => trim($_POST['email']),
                'email_error' => '',
            ];


             // Validate email
            if(empty($data['email'])){
                $data['email_error'] = 'Please enter email';
            } else {
                // Check if email already exists
                if($this->userModel->findUserByEmail($data['email'])){
                    $data['email_error'] = 'Email already exists';
                }
            }

            // Check if errors are empty
            if (empty($data['email_error'])) {
                // Update User
                $updateEmail = $this->userModel->UpdateUserByEmail($data, $id);
                if (!$updateEmail){
                    $data['email_error'] = 'Something went wrong. Please try again.';
                    $this->view('users/profile', $data);
                }else{
                    $this->createUserSession($isLoggedIn);
                }
            } else {
                // Load view with errors
                $this->view('users/profile', $data);
            }

        } else {
            // Init data
            $data = [
                'email' => '',
                'email_error' => '',
            ];

            // Load view
            $this->view('users/profile', $data);
        }

    }

    public function UpdateUserUseName() {
        //Check for POST
        if($_SERVER['REQUEST_METHOD'] == 'POST'){
            //Process form

            //Sanitize POST data
            $_POST = filter_input_array(INPUT_POST,FILTER_SANITIZE_STRING);

                // Init data
                $data = [
                'username' => trim($_POST['username']),
                'username_error' => '',
            ];


                // Validate email
            if(empty($data['username'])){
                $data['username_error'] = 'Please enter username';
            } else {
                // Check if email already exists
                if($this->userModel->findUserByUsername($data['username'])){
                    $data['username_error'] = 'Username already exists';
                }
            }

            // Check if errors are empty
            if (empty($data['username_error'])) {
                // Update User
                $updateUsername = $this->userModel->UpdateUserByUsername($data, $id);
                if (!$updateUsername){
                    $data['username_error'] = 'Something went wrong. Please try again.';
                    $this->view('users/profile', $data);
                }else{
                    $this->createUserSession($isLoggedIn);
                }
            } else {
                // Load view with errors
                $this->view('users/profile', $data);
            }

        } else {
            // Init data
            $data = [
                'email' => '',
                'email_error' => '',
            ];

            // Load view
            $this->view('users/profile', $data);
        }

    }


    public function UpdateUserPassword() {
        //Check for POST
        if($_SERVER['REQUEST_METHOD'] == 'POST'){
            //Process form

            //Sanitize POST data
            $_POST = filter_input_array(INPUT_POST,FILTER_SANITIZE_STRING);

             // Init data
             $data = [
                'password' => trim($_POST['password']),
                'password_error' => '',
            ];


             // Validate email
            if(empty($data['password'])){
                $data['password_error'] = 'Please enter password';
            } 

            // Check if errors are empty
            if (empty($data['password_error'])) {
                // Update User
                $updateUserpass = $this->userModel->UpdateUserByPassword($data, $id);
                if (!$updateUserpass){
                    $data['password_error'] = 'Something went wrong. Please try again.';
                    $this->view('users/profile', $data);
                }else{
                    $this->createUserSession($isLoggedIn);
                }
            } else {
                // Load view with errors
                $this->view('users/profile', $data);
            }

        } else {
            // Init data
            $data = [
                'password' => '',
                'password_error' => '',
            ];

            // Load view
            $this->view('users/profile', $data);
        }

    }

    /*---------------testing updates-----------------------*/



}