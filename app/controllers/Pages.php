<?php

class Pages extends Controller {
    public function __construct(){
    }

    public function index(){
        $data = [
            'title' => 'Welcome'
        ];

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
        $data = [
            'title' => 'Blog'
        ];

        $this->view('pages/blog', $data);
    }


}