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
        $type = 'Feature';
        $geometry = [
            'type' => 'Point',
            'coordinates' =>  [23.9438 , 37.7338]
        ];
        $properties = [
            'name' => 'Anavisos Gym',
            'linkPage' => 'http://localhost/gymaround/gyms/index/2',
            'address' => 'Αναβύσσου 85, Ανάβυσσος',
            'city' => 'Αθήνα',
            'postalCode' => '20037',
            'gymPhoto' => '\'../public/images/search/gym_small_image.jpg\'',
            'rating' => 3,
            'program' => 'KingBoxing - Pilates',
            'gymCost' => 'Από 30€'
        ];
//        $address = 'Nikaias 7'; // Google HQ
//        $prepAddr = str_replace(' ','+',$address);
//        $geocode=file_get_contents('https://maps.google.com/maps/api/geocode/json?address='.$prepAddr.'&sensor=false');
//        $output= json_decode($geocode);
//        $latitude = $output->results[0]->geometry->location->lat;
//        $longitude = $output->results[0]->geometry->location->lng;
//        $data = $this->gymModel->getAllGyms();
        $gym = [
            'type' => $type,
            'geometry' => $geometry,
            'properties' => $properties
        ];
        $data[] = $gym;
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
        //Check for POST
        if($_SERVER['REQUEST_METHOD'] == 'POST') {
            //Process form

            //Sanitize POST data
            $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);

            // Init data
            $data = [
                'first_name' => trim($_POST['first_name']),
                'last_name' => trim($_POST['last_name']),
                'email' => trim($_POST['email']),
                'token' => trim($_POST['stripeToken']),
            ];

            stripe_payment($data);
            if($this->gymModel->deleteTrainersByGymId($data['id']) && $this->gymModel->deleteGym($data['id'])){
                flash('gym_success', 'Η ενέργειά σας πραγματοποιήθηκε με επιτυχία.');
            }else {
                flash('gym_success', 'Η ενέργειά σας απέτυχε.', 'alert alert-danger');
            }
            redirect('users/profile/my_gyms');
        } else {
            $data = [];
            $this->view('gyms/payment', $data);
        }
    }
}