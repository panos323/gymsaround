<?php
/**
 * Created by PhpStorm.
 * User: george
 * Date: 8/12/2018
 * Time: 1:54 μμ
 */

class Users{
    public function __construct(){
        $this->userModel = $this->model('User');
    }

    public function register(){
        // Check email
        if($this->userModel->findUserByEmail($data['email'])){
            $data['error'] = 'Email is already taken';
        }
    }
}