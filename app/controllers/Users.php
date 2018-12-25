<?php

class Users extends Controller {
    public function __construct(){
        $this->userModel = $this->model('User');
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
                'fname_error' => '',
                'lname_error' => '',
                'username_error' => '',
                'email_error' => '',
                'pass_error' => '',
                'confirm_pass_error' => '',
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
                try{
                    $this->userModel->register($data);
                    redirect('pages/index');
                } catch (Exception $e){
                    redirect('pages/about');
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
                'fname_error' => '',
                'lname_error' => '',
                'username_error' => '',
                'email_error' => '',
                'pass_error' => '',
                'confirm_pass_error' => '',
            ];

            // Load view
            $this->view('users/register', $data);

        }
    }


    /*----------------TEST LOGIN------------------------*/
    public function login() {
        // Check for POST
        if ($_SERVER['REQUEST_METHOD'] == 'POST'){

            // Sanitize POST data
            $_POST = filter_input_array(INPUT_POST,FILTER_SANITIZE_STRING);

            // Init data
            $data = [
                'username' => trim($_POST['username']),
                'email' => trim($_POST['username']),
                'password' => trim($_POST['password']),
                'empty_error' => '',
                'pass_error' => '',
                'wrong_cred' => '',
                'wrong_cred2' => '',
            ];

            // Validate email/username
            if(empty($data['username'])){
                $data['empty_error'] = 'Please enter email or username';
            }

             // Validate password
             if(empty($data['password'])){
                $data['pass_error'] = 'Please enter password';
            }
            
            //wrong  username
            if( (strlen($data['username']) > 0) && (!$this->userModel->findUserByUsername($data['username']))) {
                $data['wrong_cred'] = 'Username/Email doesnt exists';
            } elseif ($this->userModel->findUserByUsername($data['username'])) {
                $data['wrong_cred'] = '';
                $data['wrong_cred2'] = '';
            }

             //wrong  email
            if( (strpos($data['email'], '@') !== false) && (strlen($data['email']) > 0) && (!$this->userModel->findUserByEmail($data['email']))) {
                $data['wrong_cred2'] = 'Username/Email doesnt exists';
            } elseif ($this->userModel->findUserByEmail($data['email'])) {
                $data['wrong_cred'] = '';
                $data['wrong_cred2'] = '';
            }
            
           
            // Check if errors are empty
            if (empty($data['empty_error']) &&
                empty($data['pass_error']) && 
                empty($data['wrong_cred']) &&
                empty($data['wrong_cred2'])) {
                // Login User        
                 
            try{
                $this->userModel->login($data['username'], $data['password']);                
                //redirect('pages/index');
                echo "working";
            } catch (Exception $e){
                //redirect('pages/about');
                echo "not working";
            }
        
             } else {
                // Load view with errors
                $this->view('users/login', $data);
            }

        } else {
            // Init data
            $data = [
                'username' => '',
                'email' => '',
                'password' => '',
                'empty_error' => '',
                'pass_error' => '',
                'wrong_cred' => '',
                'wrong_cred2' => '',
            ];

            // Load view
            $this->view('users/login', $data);

        }
    }//function login
    /*----------------TEST LOGIN------------------------*/


}