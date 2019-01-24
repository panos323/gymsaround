<?php

class Gyms extends Controller
{

    public function __construct()
    {
        $this->gymModel = $this->model('Gym');
    }

    public function search(){
        $data = [];

        $this->view('gyms/search', $data);
    }

}