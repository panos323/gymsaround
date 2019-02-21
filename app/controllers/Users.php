<?php

class Users extends Controller {
    public function __construct(){
        $this->userModel = $this->model('User');
        $this->ownerModel = $this->model('Owner');
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
                $data['password'] = password_hash($data['password'], PASSWORD_BCRYPT);

                // Register User
                if($this->userModel->register($data)){
                    $attrs = [
                        'full_name' => 'GymAround',
                        'receiver_name' => '',
                        'message' => 'Καλώς ήρθατε στο GymAround! Ευχαριστούμε που μας επιλέξατε! Ξεκινήστε σήμερα τη γυμναστική σας!',
                        'sender_email' => 'info@georgegeorgakas.com',
                        'subject' => 'Επιτυχής Εγγραφή στο GymAround',
                        'receiver_email' => $data['email'],
                    ];
                    mailer($attrs);
                    flash('register_success', 'You are now registered and you can log in');
                    redirect('pages/index');
                } else{
                    $data['register_error'] = 'Something went wrong. Please try again.';
                    $this->view('pages/index', $data);
                }
            } else {
                // Load view with errors
                $this->view('pages/index', $data);
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
            if( (!$this->userModel->findUserByUsername($data['login_credential'])) &&
                (!$this->userModel->findUserByEmail($data['login_credential'])) &&
                (!$this->ownerModel->findOwnerByUsername($data['login_credential'])) &&
                (!$this->ownerModel->findOwnerByEmail($data['login_credential']))) {
                $data['login_credential_error'] = 'Username/Email does not exist';
            }

            // Check if errors are empty
            if (empty($data['login_credential_error']) &&
                empty($data['pass_error'])) {
                // Login User
                $isUserLoggedIn = $this->userModel->login($data['login_credential'], $data['password']);
                if (!$isUserLoggedIn){
                    $isOwnerLoggedIn = $this->ownerModel->login($data['login_credential'], $data['password']);
                    if(!$isOwnerLoggedIn){
                        $data['pass_error'] = 'Password is wrong. Please try again.';
                        $this->view('users/login', $data);
                    }else {
                        $this->createOwnerSession($isOwnerLoggedIn);
                    }
                }else{
                    $this->createUserSession($isUserLoggedIn);
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

    // Create session for users
    public function createUserSession($user){
        $_SESSION['username'] = $user->user_username;
        $_SESSION['id'] = $user->user_id;
        $_SESSION['first_name'] = $user->user_first_name;
        $_SESSION['last_name'] = $user->user_last_name;
        $_SESSION['email'] = $user->user_email;
        $_SESSION['gym_id'] = isset($user->gym_id) ? $user->gym_id : '';
        $_SESSION['isAdmin'] = $user->user_is_admin;
        $_SESSION['type'] = 'users';
        redirect('users/profile/account');
    }

    // Create session for owners
    public function createOwnerSession($owner){
        $_SESSION['username'] = $owner->owner_username;
        $_SESSION['id'] = $owner->owner_id;
        $_SESSION['first_name'] = $owner->owner_first_name;
        $_SESSION['last_name'] = $owner->owner_last_name;
        $_SESSION['email'] = $owner->owner_email;
        $_SESSION['phone'] = isset($owner->owner_phone) ? $owner->owner_phone : '';
        $_SESSION['type'] = 'owners';
        redirect('owners/profile/account');
    }

    // Load view for facebook login
    // TODO: Fix this to implement profile after login
    public function facebook(){
        $this->view('users/facebook');
    }

    public function profile(string $tab = 'account') {
        if(!$this->isLoggedIn()){
            redirect('pages/index');
        }
        if($tab === 'account' || $tab === 'my_gym' || $tab === 'my_users' || $tab === 'my_owners' || $tab === 'my_gyms'){
            $data = [
                'tab' => $tab,
                'name'=> ''
            ];
            if(!$_SESSION['isAdmin']){
                if (empty($_SESSION['gym_id'])) {
                    $data['msg'] = 'Παρακαλώ διαλέχτε γυμναστήριο';
                } else {
                    $gym = $this->userModel->findUserGym($_SESSION['gym_id']);
                    if($gym) {
                        $data['name'] = $gym->gym_name;
                    }else {
                        $data['gym_error'] = 'Δεν έχετε συνδρομή σε κάποιο γυμναστήριο';
                    }
                }
            } else {
                if ($tab === 'my_users') {
                    $type = 'users';
                } elseif ($tab === 'my_owners') {
                    $type = 'owners';
                } else {
                    $type = 'gyms';
                }
                $data[$type] = $this->userModel->getAll($type);
            }

            $this->view('users/profile', $data);
        }else {
            redirect('users/profile/account');
        }
    }


    // Logout method for users
    public function logout(){
        unset($_SESSION['username']);
        unset($_SESSION['id']);
        unset($_SESSION['first_name']);
        unset($_SESSION['last_name']);
        unset($_SESSION['email']);
        unset($_SESSION['type']);
        unset($_SESSION['gym_id']);
        unset($_SESSION['isAdmin']);
        session_destroy();
        redirect('users/login');
    }

    // Method to check if user is logged in.
    public function isLoggedIn(){
        if(isset($_SESSION['id'])){
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
                'name_error' => '',
                'last_name_error' => '',
                'address_error' => '',
                'update_error' => '',
                'tab' => 'account'
            ];
        

        // Validate first name
        if(empty($data['first_name'])){
            $data['name_error'] = 'Please enter first name';
        }

        // Validate last name
        if(empty($data['last_name'])){
            $data['last_name_error'] = 'Please enter last name';
        }

        // Check if errors are empty
        if (empty($data['name_error']) &&
                empty($data['last_name_error'])) {
                // Update User              
                if($this->userModel->updateUser($data, $_SESSION['id'])){
                    $_SESSION['first_name'] = $data['first_name'];
                    $_SESSION['last_name'] = $data['last_name'];
                    flash('update_details_success', 'Your details have been updated!');
                    redirect('users/profile/account');
                }else{
                    $data['update_error'] = 'Something went wrong. Please try again';
                    $this->view('users/profile',$data);
                }
                }else{
                $this->view('users/profile', $data);
                }

                } else {
                redirect('users/profile/account');
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
                'new_password' => trim($_POST['new_password']),
                'confirm_password' => trim($_POST['confirm_password']),
                'password_error' => '',
                'new_password_error' => '',
                'confirm_password_error' => '',
                'update_error' => '',
                'tab' => 'account'
            ];


             // Check password
            if(empty($data['password'])){
                $data['password_error'] = 'Please enter password';
            } elseif (!$this->userModel->checkPasswordByUsersId($data['password'], $_SESSION['id'])){
                $data['password_error'] = 'Your password is wrong. Please try again.';
            }

            // Check new password field
            if(empty($data['new_password'])){
                $data['new_password_error'] = 'Please provide your new password';
            }elseif($data['new_password'] === $data['password']){
                $data['new_password_error'] = 'Password is the same as before';
            }elseif ($this->userModel->checkPasswordByUsersId($data['new_password'], $_SESSION['id'])){
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

                if($this->userModel->UpdateUserByPassword($data['new_password'], $_SESSION['id'])){
                    flash('update_password_success', 'Your password has been updated!');
                    redirect('users/profile/account');
                }else{
                    $data['update_error'] = 'Password is the same as before. Please try again';
                    $this->view('users/profile',$data);
                }
            }else{
                $this->view('users/profile', $data);
            }

        } else {
            redirect('users/profile/account');
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
                'new_email' => trim($_POST['new_email']),
                'email_error' => '',
                'new_email_error' => '',
                'update_error' => '',
                'tab' => 'account'
             ];


             // Validate email
            if(empty($data['email'])){
                $data['email_error'] = 'Please enter email';
            } elseif ($data['email'] !== $_SESSION['email']){
                $data['email_error'] = 'Please enter correct your current email';
            }

             // Check new email field
             if(empty($data['new_email'])){
                $data['new_email_error'] = 'Please provide your new email';
            }elseif($data['new_email'] === $data['email']){
                $data['new_email_error'] = 'Email is the same as before';
            }elseif($this->userModel->findUserByEmail($data['new_email'])){
                $data['new_email_error'] = 'Email already exists.';
            }

            if(empty($data['email_error']) && empty($data['new_email_error'])){
                if($this->userModel->UpdateUserByEmail($data['new_email'], $_SESSION['id'])){
                    $_SESSION['email'] = $data['new_email'];
                    flash('update_mail_success', 'Your e-mail has been updated!');
                    redirect('users/profile/account');
                }else{
                    $data['update_error'] = 'Your email is wrong. Please try again.';
                    $this->view('users/profile',$data);
                }
            }else{
                $this->view('users/profile', $data);
            }

        } else {
            redirect('users/profile/account');
        }
    }

    public function UpdateUserUsername() {
        //Check for POST
        if($_SERVER['REQUEST_METHOD'] == 'POST'){
            //Process form

            //Sanitize POST data
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
            }elseif($this->userModel->findUserByUsername($data['new_username'])){
                $data['new_username_error'] = 'Username already exists.';
            }

            if(empty($data['username_error']) && empty($data['new_username_error'])){
                if($this->userModel->UpdateUserByUsername($data['new_username'], $_SESSION['id'])){
                    flash('update_username_success', 'Your username has been updated!');
                    $_SESSION['username'] = $data['new_username'];
                    redirect('users/profile/account');
                }else{
                    $data['update_error'] = 'Something went wrong. Please try again';
                    $this->view('users/profile',$data);
                }
            }else{
                $this->view('users/profile', $data);
            }

        } else {
            redirect('users/profile/account');
        }
    }

    public function UserGym() {

        // Init data
        $data = [
            'gym_id' => trim($_POST['gym_id']),
            'gym_error' => '',
            'tab' => 'my_gym'
        ];


        // Show Gym
        if($this->userModel->findUserGym($data['gym_id'])){
            flash('register_success', 'Your gym');
        } else{
            $data['gym_error'] = 'Something went wrong. Please try again.';
            $this->view('users/profile', $data);
        }
    }

    public function makeAdmin() {
        //Check for POST
        if($_SERVER['REQUEST_METHOD'] == 'POST') {
            //Process form

            //Sanitize POST data
            $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);

            // Init data
            $data = [
                'isAdmin' => trim($_POST['isAdmin']),
                'id' => trim($_POST['id']),
            ];

            if($this->userModel->makeAdmin(!$data['isAdmin'], $data['id'])){
                flash('admin_success', 'Η ενέργειά σας πραγματοποιήθηκε με επιτυχία.');
            }else {
                flash('admin_success', 'Η ενέργειά σας απέτυχε.', 'alert alert-danger');
            }
            redirect('users/profile/my_users');
        } else {
            redirect('users/profile/my_users');
        }
    }

    public function deleteUser() {
        //Check for POST
        if($_SERVER['REQUEST_METHOD'] == 'POST' && $_SESSION['isAdmin']) {
            //Process form

            //Sanitize POST data
            $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);

            // Init data
            $data = [
                'id' => trim($_POST['id']),
            ];

            if($this->userModel->deleteUser($data['id'])){
                flash('admin_success', 'Η ενέργειά σας πραγματοποιήθηκε με επιτυχία.');
            }else {
                flash('admin_success', 'Η ενέργειά σας απέτυχε.', 'alert alert-danger');
            }
            redirect('users/profile/my_users');
        } else {
            redirect('users/profile/my_users');
        }
    }

    public function activateOwner() {
        //Check for POST
        if($_SERVER['REQUEST_METHOD'] == 'POST') {
            //Process form

            //Sanitize POST data
            $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);

            // Init data
            $data = [
                'isActivated' => trim($_POST['isActivated']),
                'id' => trim($_POST['id']),
            ];

            if($this->ownerModel->activateOwner(!$data['isActivated'], $data['id'])){
                flash('owner_success', 'Η ενέργειά σας πραγματοποιήθηκε με επιτυχία.');
            }else {
                flash('owner_success', 'Η ενέργειά σας απέτυχε.', 'alert alert-danger');
            }
            redirect('users/profile/my_owners');
        } else {
            redirect('users/profile/my_owners');
        }
    }

    public function deleteOwner() {
        //Check for POST
        if($_SERVER['REQUEST_METHOD'] == 'POST' && $_SESSION['isAdmin']) {
            //Process form

            //Sanitize POST data
            $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);

            // Init data
            $data = [
                'id' => trim($_POST['id']),
            ];

            if($this->ownerModel->deleteOwner($data['id'])){
                flash('owner_success', 'Η ενέργειά σας πραγματοποιήθηκε με επιτυχία.');
            }else {
                flash('owner_success', 'Η ενέργειά σας απέτυχε.', 'alert alert-danger');
            }
            redirect('users/profile/my_owners');
        } else {
            redirect('users/profile/my_owners');
        }
    }

    public function forgotPassword() {
        //Check for POST
        if($_SERVER['REQUEST_METHOD'] == 'POST') {
            //Process form

            //Sanitize POST data
            $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);

            // Init data
            $data = [
                'email' => trim($_POST['email']),
            ];

            $token = generateRandomString();
            if($this->userModel->forgotPassword($data['email'], $token)){
                $attrs = [
                    'full_name' => 'GymAround',
                    'receiver_name' => '',
                    'message' => URLROOT . '/users/reset/'.urlencode($token),
                    'sender_email' => 'info@georgegeorgakas.com',
                    'subject' => 'Reset Your Password',
                    'receiver_email' => $data['email'],
                ];
                if(mailer($attrs)){
                    flash('forgot_success', 'Η ενέργειά σας πραγματοποιήθηκε με επιτυχία.');
                }else {
                    flash('forgot_success', 'Η ενέργειά σας απέτυχε.', 'alert alert-danger');
                }
            }else {
                flash('forgot_success', 'Η ενέργειά σας απέτυχε.', 'alert alert-danger');
            }
            redirect('pages/index');
        } else {
            redirect('pages/index');
        }
    }

    public function reset(string $token = '') {
        if (!empty($token)) {
            //Check for POST
            if($_SERVER['REQUEST_METHOD'] == 'POST') {
                //Process form

                //Sanitize POST data
                $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);

                $data = [
                    'email' => trim($_POST['email']),
                    'password' => trim($_POST['password'])
                ];

                $data['password'] = password_hash($data['password'], PASSWORD_BCRYPT);
                $user_id = $this->userModel->checkTokenAndEmail($data['email'], $token);
                if($user_id){
                    if($this->userModel->resetPassword($user_id, $data['password'])) {
                        flash('reset_success', 'Η ενέργειά σας πραγματοποιήθηκε με επιτυχία.');
                    } else {
                        flash('reset_success', 'Η ενέργειά σας απέτυχε.', 'alert alert-danger');
                    }
                } else {
                    flash('reset_success', 'Δε βρέθηκε ο χρήστης.', 'alert alert-danger');
                }
                redirect('users/reset/'.$token);
            } else {
                //Process form
                $data = [
                    'token' => $token
                ];

                $this->view('users/reset', $data);
            }
        } else {
            redirect('pages/index');
        }
    }
}