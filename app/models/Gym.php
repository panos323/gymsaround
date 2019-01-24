<?php

class Gym
{
    private $db;

    public function __construct()
    {
        $this->db = new Database;
    }
}