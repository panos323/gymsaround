<?php

class Owners extends Controller {
    public function __construct(){
        $this->ownerModel = $this->model('Owner');
    }

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
                'phone' => isset($_POST['phone']) ? trim($_POST['phone']) : '',
                'fname_error' => '',
                'lname_error' => '',
                'username_error' => '',
                'email_error' => '',
                'pass_error' => '',
                'confirm_pass_error' => '',
                'register_error' => '',
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
                    flash('register_success', 'Thank you for joining us. One of our people will get in contact with you soon.');
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
                'phone' => '',
                'fname_error' => '',
                'lname_error' => '',
                'username_error' => '',
                'email_error' => '',
                'pass_error' => '',
                'confirm_pass_error' => '',
                'register_error' => '',
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

    public function createOwnerSession($owner){
        $_SESSION['username'] = $owner->owner_username;
        $_SESSION['id'] = $owner->owner_id;
        $_SESSION['first_name'] = $owner->owner_first_name;
        $_SESSION['last_name'] = $owner->owner_last_name;
        $_SESSION['email'] = $owner->owner_email;
        $_SESSION['type'] = 'owners';
        redirect('owners/profile/account');
    }

    public function profile(string $tab = 'account') {
        if(!$this->isLoggedIn()){
            redirect('pages/index');
        }
        if($tab === 'account' || $tab === 'my_gym' || $tab === 'my_trainers'){
            $data = [
                'tab' => $tab
            ];
            $this->view('owners/profile', $data);
        }else {
            redirect('owners/profile/account');
        }
    }

    public function logout(){
        unset($_SESSION['username']);
        unset($_SESSION['id']);
        unset($_SESSION['first_name']);
        unset($_SESSION['last_name']);
        unset($_SESSION['type']);
        session_destroy();
        redirect('owners/login');
    }

    public function isLoggedIn(){
        if(isset($_SESSION['id'])){
            return true;
        }
        return false;
    }

    public function updateDetails(){

        // Check for POST
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            // Sanitize POST data
            $_POST = filter_input_array(INPUT_POST,FILTER_SANITIZE_STRING);

            // Init data
            $data = [
                'login_credential' => trim($_POST['login_credential']),
                'password' => trim($_POST['password']),
                'login_credential_error' => '',
                'pass_error' => '',
            ];
        } else {
            redirect('owners/profile/account');
        }
    }
    public function updatePassword(){

        // Check for POST
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            // Sanitize POST data
            $_POST = filter_input_array(INPUT_POST,FILTER_SANITIZE_STRING);

            // Init data
            $data = [
                'password' => trim($_POST['password']),
                'new_password' => trim($_POST['new_password']),
                'confirm_password' => trim($_POST['confirm_password']),
                'password_error' => '',
                'new_password_error' => '',
                'confirm_password_error' => '',
                'update_error' => '',
                'tab' => 'account'
            ];

            // Check current password field
            if(empty($data['password'])){
                $data['password_error'] = 'Please provide your current password';
            }elseif (!$this->ownerModel->checkPasswordByUserId($data['password'], $_SESSION['id'])){
                $data['password_error'] = 'Your password is wrong. Please try again.';
            }

            // Check new password field
            if(empty($data['new_password'])){
                $data['new_password_error'] = 'Please provide your new password';
            }elseif($data['new_password'] === $data['password']){
                $data['new_password_error'] = 'Password is the same as before';
            }elseif ($this->ownerModel->checkPasswordByUserId($data['new_password'], $_SESSION['id'])){
                $data['new_password_error'] = 'Your new password is the same with the current.';
            }

            // Check confirm password
            if(empty($data['confirm_password'])){
                $data['confirm_password_error'] = 'Please confirm your new password';
            }elseif($data['confirm_password'] !== $data['new_password']){
                $data['confirm_password_error'] = 'Passwords do not match';
            }


            if(empty($data['password_error']) && empty($data['new_password_error']) && empty($data['confirm_password_error'])){
                // Hash Password
                $data['new_password'] = password_hash($data['new_password'], PASSWORD_DEFAULT);

                if($this->ownerModel->updatePassword($data['new_password'], $_SESSION['id'])){
                    flash('update_password_success', 'Your password has been updated!');
                    redirect('owners/profile/account');
                }else{
                    $data['update_error'] = 'Password is the same as before. Please try again';
                    $this->view('owners/profile',$data);
                }
            }else{
                $this->view('owners/profile', $data);
            }

        } else {
            redirect('owners/profile/account');
        }
    }

    public function updateEmail(){

        // Check for POST
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            // Sanitize POST data
            $_POST = filter_input_array(INPUT_POST,FILTER_SANITIZE_STRING);

            // Init data
            $data = [
                'email' => trim($_POST['email']),
                'new_email' => trim($_POST['new_email']),
                'email_error' => '',
                'new_email_error' => '',
                'update_error' => '',
                'tab' => 'account'
            ];

            // Check current email field
            if(empty($data['email'])){
                $data['email_error'] = 'Please provide your current email';
            }elseif ($data['email'] !== $_SESSION['email']){
                $data['email_error'] = 'Please enter correct your current email';
            }

            // Check new email field
            if(empty($data['new_email'])){
                $data['new_email_error'] = 'Please provide your new email';
            }elseif($data['new_email'] === $data['email']){
                $data['new_email_error'] = 'Email is the same as before';
            }elseif($this->ownerModel->findOwnerByEmail($data['new_email'])){
                $data['new_email_error'] = 'Email already exists.';
            }

            if(empty($data['email_error']) && empty($data['new_email_error'])){
                if($this->ownerModel->updateEmail($data['new_email'], $_SESSION['id'])){
                    $_SESSION['email'] = $data['new_email'];
                    flash('update_mail_success', 'Your e-mail has been updated!');
                    redirect('owners/profile/account');
                }else{
                    $data['update_error'] = 'Your email is wrong. Please try again.';
                    $this->view('owners/profile',$data);
                }
            }else{
                $this->view('owners/profile', $data);
            }

        } else {
            redirect('owners/profile/account');
        }
    }

    public function updateUsername(){

        // Check for POST
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            // Sanitize POST data
            $_POST = filter_input_array(INPUT_POST,FILTER_SANITIZE_STRING);

            // Init data
            $data = [
                'username' => trim($_POST['username']),
                'new_username' => trim($_POST['new_username']),
                'username_error' => '',
                'new_username_error' => '',
                'update_error' => '',
                'tab' => 'account'
            ];

            // Check current username field
            if(empty($data['username'])){
                $data['username_error'] = 'Please provide your current username';
            }elseif ($data['username'] !== $_SESSION['username']){
                $data['username_error'] = 'Please enter correct your current username';
            }

            // Check new username field
            if(empty($data['new_username'])){
                $data['new_username_error'] = 'Please provide your new username';
            }elseif($data['new_username'] === $data['username']){
                $data['new_username_error'] = 'Username is the same as before';
            }elseif($this->ownerModel->findOwnerByUsername($data['new_username'])){
                $data['new_username_error'] = 'Username already exists.';
            }

            if(empty($data['username_error']) && empty($data['new_username_error'])){
                if($this->ownerModel->updateUsername($data['new_username'], $_SESSION['id'])){
                    flash('update_username_success', 'Your username has been updated!');
                    $_SESSION['username'] = $data['new_username'];
                    redirect('owners/profile/account');
                }else{
                    $data['update_error'] = 'Something went wrong. Please try again';
                    $this->view('owners/profile',$data);
                }
            }else{
                $this->view('owners/profile', $data);
            }

        } else {
            redirect('owners/profile/account');
        }
    }
}
