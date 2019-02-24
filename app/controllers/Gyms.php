<?php

class Gyms extends Controller
{

    public function __construct()
    {
        $this->gymModel = $this->model('Gym');
        $this->ownerModel = $this->model('Owner');
    }

    public function index(string $id){
        $gym = $this->gymModel->findGymById($id);
        $trainers = $this->ownerModel->getTrainersByGymId($id);
        if($gym) {
            $data = [
                'gym' => $gym,
                'trainers' => $trainers
            ];
            $this->view('gyms/index', $data);
        }

        redirect('pages/search');
    }

    public function search(){
        $data = [];

        $data = $this->gymModel->getAllGyms();
            $this->view('gyms/search', $data);
        
    }

    public function activateGym() {
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

            if($this->gymModel->activateGym(!$data['isActivated'], $data['id'])){
                flash('gym_success', 'Η ενέργειά σας πραγματοποιήθηκε με επιτυχία.');
            }else {
                flash('gym_success', 'Η ενέργειά σας απέτυχε.', 'alert alert-danger');
            }
            redirect('users/profile/my_gyms');
        } else {
            redirect('users/profile/my_gyms');
        }
    }

    public function deleteGym() {
        //Check for POST
        if($_SERVER['REQUEST_METHOD'] == 'POST' && $_SESSION['isAdmin']) {
            //Process form

            //Sanitize POST data
            $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);

            // Init data
            $data = [
                'id' => trim($_POST['id']),
            ];

            if($this->gymModel->deleteTrainersByGymId($data['id']) && $this->gymModel->deleteGym($data['id'])){
                flash('gym_success', 'Η ενέργειά σας πραγματοποιήθηκε με επιτυχία.');
            }else {
                flash('gym_success', 'Η ενέργειά σας απέτυχε.', 'alert alert-danger');
            }
            redirect('users/profile/my_gyms');
        } else {
            redirect('users/profile/my_gyms');
        }
    }

    public function payment() {
        $data = [];
        $this->view('gyms/payment', $data);
    }
}