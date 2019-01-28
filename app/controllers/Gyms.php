<?php

class Gyms extends Controller
{

    public function __construct()
    {
        $this->gymModel = $this->model('Gym');
    }

    public function index(){
        $data = [];

        $this->view('gyms/index', $data);
    }

    public function search(){
        $data = [];

        $this->view('gyms/search', $data);
    }

}