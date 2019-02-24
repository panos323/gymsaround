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
                'trainers' => $trainers,
                'all_images' => explode(',', $gym->gym_images),
                'total_images' => count(explode(',', $gym->gym_images))
            ];
            $this->view('gyms/index', $data);
        }

        redirect('pages/search');
    }

    public function search(){
        $data = [];
        $gyms = $this->gymModel->getAllGyms();
        foreach ($gyms as $gym) {
            $type = 'Feature';
            $geometry = [
                'type' => 'Point',
                'coordinates' =>  [$gym->gym_long, $gym->gym_lat]
            ];
            $properties = [
                'name' => $gym->gym_name,
                'linkPage' => URLROOT.'/gyms/index/'.$gym->gym_id,
                'address' => $gym->gym_location,
                'city' => $gym->gym_city,
                'postalCode' => $gym->gym_postal_code,
                'gymPhoto' => '../public/images/gyms_images/'.$gym->gym_name.'/'.$gym->gym_logo,
                'rating' => $gym->gym_rating ?? 4,
                'program' => $gym->gym_type,
                'gymCost' => 'Από '.$gym->gym_monthly_price.'€'
            ];
            $properties['gymPhoto'] = str_replace(' ','%20', $properties['gymPhoto']);
            $array = [
                'type' => $type,
                'geometry' => $geometry,
                'properties' => $properties
            ];
            $data[] = $array;
        }
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
                'description' => trim($_POST['description']),
                'amount' => trim($_POST['amount']),
                'token' => trim($_POST['stripeToken']),
            ];

            if(stripe_payment($data)){
                flash('general_messages', 'Η ενέργειά σας πραγματοποιήθηκε με επιτυχία. Ευχαριστούμε που μας επιλέξατε!');
            }else {
                flash('general_messages', 'Η ενέργειά σας απέτυχε.', 'alert alert-danger');
            }
            redirect('pages/messages');
        } else {
            $data = [];
            $data['name'] = $_GET['name'];
            $data['amount'] = $_GET['amount'];
            $data['month'] = $_GET['month'];
            $this->view('gyms/payment', $data);
        }
    }
}