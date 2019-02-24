<?php

class Pages extends Controller {
    public function __construct(){
        $this->generalModel = $this->model('General');
    }

    public function index(){
        // Check for POST
        if($_SERVER['REQUEST_METHOD'] == 'POST') {
            // Process form

            // Sanitize POST data
            $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);

            $data = [
                'first_name' => trim($_POST['first_name']),
                'last_name' => trim($_POST['last_name']),
                'email' => trim($_POST['email']),
                'first_name_error' => '',
                'last_name_error' => '',
                'email_error' => ''
            ];

            if(empty($data['first_name'])) {
                $data['first_name_error'] = 'Παρακαλώ δώστε το όνομά σας.';
            }
            if(empty($data['last_name'])) {
                $data['last_name_error'] = 'Παρακαλώ δώστε το επίθετό σας.';
            }
            if(empty($data['email'])) {
                $data['email_error'] = 'Παρακαλώ δώστε το email σας.';
            }

            if (empty($data['first_name_error']) && empty($data['last_name_error']) && empty($data['email_error'])) {
                $result = mailChimp($data);
            }
        } else {
            $data = [
                'first_name' => '',
                'last_name' => '',
                'email' => '',
                'first_name_error' => '',
                'last_name_error' => '',
                'email_error' => ''
            ];
        }
        $this->view('pages/index', $data);
    }

    public function about(){
        $data = [
            'title' => 'About Us'
        ];

        $this->view('pages/about', $data);
    }

    public function error(){
        $data = [];

        $this->view('pages/error', $data);
    }

    
    public function blog(){
        $articles = $this->generalModel->getAllArticles();
        if(!$articles) {
            $articles = [];
        }

        $this->view('pages/blog', $articles);
    }
    public function article(string $id = null){
        if(!is_null($id)) {

            $data = $this->generalModel->getArticleById($id);

            if ($data) {
                $this->view('pages/article', $data);
            }
        }
        redirect('pages/blog');
    }
    public function termsofuse(){
        $data = [
            'title' => 'termsofuse'
        ];

        $this->view('pages/termsofuse', $data);
    }
    public function privacypolicy(){
        $data = [
            'title' => 'privacypolicy'
        ];

        $this->view('pages/privacypolicy', $data);
    }
    public function cookiespolicy(){
        $data = [
            'title' => 'cookiespolicy'
        ];

        $this->view('pages/cookiespolicy', $data);
    }
    public function messages(){
        $data = [
            'title' => 'messages'
        ];

        $this->view('pages/messages', $data);
    }

    public function contact() {
        $data = [];

        // Check for POST
        if($_SERVER['REQUEST_METHOD'] == 'POST') {
            // Process form

            // Sanitize POST data
            $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);

            // Init data
            $data = [
                'full_name' => trim($_POST['first_name']).' '.trim($_POST['last_name']),
                'receiver_name' => '',
                'message' => trim($_POST['email_text']),
                'sender_email' => trim($_POST['email']),
                'subject' => trim($_POST['subject']),
                'receiver_email' => 'info@georgegeorgakas.com',
            ];

            // Register User
            if(mailer($data)){
                flash('email_success', 'Ευχαριστούμε που επικοινωνήσατε μαζί μας.');
                redirect('pages/contact');
            } else{
                flash('email_success', 'Κάτι πήγε λάθος. Παρακαλούμε προσπαθείστε ξανά.', 'alert alert-danger');
                redirect('pages/contact');
            }
        } else {
            // Load view with errors
            $this->view('pages/contact', $data);
        }
    }
}