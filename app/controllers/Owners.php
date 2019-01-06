<?php

class Owners extends Controller {
    public function __construct(){
        $this->ownerModel = $this->model('Owner');
    }

    public function register(string $register_type = ''){

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
                'phone' => isset($_POST['phone']) ? trim($_POST['phone']) : '',
                'fname_error' => '',
                'lname_error' => '',
                'username_error' => '',
                'email_error' => '',
                'pass_error' => '',
                'confirm_pass_error' => '',
                'register_error' => '',
                'address_error' => '',
                'phone_error' => ''
            ];

            // Validate email
            if(empty($data['email'])){
                $data['email_error'] = 'Please enter email';
            } else {
                // Check if email already exists
                if($this->ownerModel->findOwnerByEmail($data['email'])){
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

            // Validate username
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

            //Validate phone number
            if(empty($data['phone'])){
                $data['phone'] = 'Please enter your phone number';
            } elseif (strlen($data['phone']) !== 10){
                $data['phone_error'] = 'Phone should have 10 numbers';
            } elseif (!preg_match('/^[0-9]{10}$/', $data['phone'])) {
                $data['phone_error'] = 'Phone should have only numbers';
            } else {
                // Check if phone number already exists
                if($this->ownerModel->findOwnerByPhone($data['phone'])){
                    $data['phone_error'] = 'Phone number already exists';
                }
            }

            // Check if errors are empty
            if( empty($data['email_error']) &&
                empty($data['fname_error']) &&
                empty($data['lname_error']) &&
                empty($data['pass_error']) &&
                empty($data['confirm_pass_error']) &&
                empty($data['phone_error']) &&
                empty($data['username_error']) ){
                // Validated

                // Hash Password
                $data['password'] = password_hash($data['password'], PASSWORD_DEFAULT);

                // Register User
                if($this->ownerModel->register($data)){
                    flash('register_success', 'You are now registered and you can log in');
                    redirect('owners/login');
                } else{
                    $data['register_error'] = 'Something went wrong. Please try again.';
                    $this->view('owners/register', $data);
                }
            } else {
                // Load view with errors
                $this->view('owners/register', $data);
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
                'phone' => '',
                'fname_error' => '',
                'lname_error' => '',
                'username_error' => '',
                'email_error' => '',
                'pass_error' => '',
                'confirm_pass_error' => '',
                'register_error' => '',
                'address_error' => '',
                'phone_error' => ''
            ];

            // Load view
            $this->view('owners/register', $data);

        }
    }

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
            if((!$this->ownerModel->findOwnerByUsername($data['login_credential'])) && (!$this->ownerModel->findOwnerByEmail($data['login_credential']))) {
                $data['login_credential_error'] = 'Username/Email does not exist';
            }

            // Check if errors are empty
            if (empty($data['login_credential_error']) &&
                empty($data['pass_error'])) {
                // Login User
                $isLoggedIn = $this->ownerModel->login($data['login_credential'], $data['password']);
                if (!$isLoggedIn){
                    $data['pass_error'] = 'Password is wrong. Please try again.';
                    $this->view('owners/login', $data);
                }else{
                    $this->createOwnerSession($isLoggedIn);
                }
            } else {
                // Load view with errors
                $this->view('owners/login', $data);
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
            $this->view('owners/login', $data);
        }
    }

/*
    public function facebook(){
        $this->view('owners/facebook');
    }

    public function profile(string $username){
        if($this->isLoggedIn() && $_SESSION['username'] === $username){
            $data = [
                'username' => $username
            ];
            // Load view
            $this->view('owners/profile', $data);
        }else{
            //TODO: Unauthenticated page create.
            die('You are not authenticated to access this page');
        }
    }
*/
    public function createOwnerSession($user){
        $_SESSION['ownername'] = $user->owner_username;
        $_SESSION['owner_id'] = $user->owner_id;
        $_SESSION['first_name'] = $user->owner_first_name;
        $_SESSION['last_name'] = $user->owner_last_name;
        redirect('owners/profile/'.$_SESSION['ownername']);
    }

    public function logout(){
        unset($_SESSION['ownername']);
        unset($_SESSION['owner_id']);
        unset($_SESSION['first_name']);
        unset($_SESSION['last_name']);
        session_destroy();
        redirect('owners/login');
    }

    public function isLoggedIn(){
        if(isset($_SESSION['owner_id'])){
            return true;
        }
        return false;
    }
}
