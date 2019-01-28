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

}?>

<?php require  APPROOT . '/views/inc/header.php'?>
<div class="row">
    <div class="col-md-6">
        <div class="gymelement">
            <div class="row">
                <div class="col-md-7 offset-md-2">
                  <p id="gymsnames">Workout Hall Crossfit</p>
                  <img src= " <?php echo URLROOT ?> /images/stars.png" alt="stars"/>
                  <p>Ρόδων 6 & Κυβέλης 17456, Άλιμος</p>
                  <p><b>Crosfii, Boxing, KingBoxing,Climbing</b></p>
                  <button class="btnorange" id="btnsearch"><a href="#">Πακέτα Συνδρομών</a></button>
                </div>  
            </div>
            
        </div>


    </div>
    <div class="col-md-6">
         <img src= " <?php echo URLROOT ?> /images/gym/bigimggym.jpg" alt="stars">
    </div>
</div>

<div class="container maintext">
    <div class="row">
        <div class="col-md-12">
           <p class="basictitle" id="gymstitle">ΠΟΙΟΙ ΕΙΜΑΣΤΕ</p> 
            <p>Το Workout Hall δημιουργήθηκε το 2008, στη Γλυφάδα, σε έναν χώρο 90 τ.μ., αποκλειστικά για personal training. Σταδιακά αναπτύχθηκε και αποτελεί σήμερα ένα υπερσύγχρονο αθλητ
            ικό κέντρο, 7.000 τ.μ., με indoor & outdoor training space.Η προσωπική εμπειρία, η αδιάλειπτη ενασχόληση με τον αθλητισμό και η αγάπη γι’ αυτόνοδήγησε στην δημιουργία του ση
            μερινού Workout Hall.</p>

            <p>Όλα αυτά τα χρόνια η φιλοσοφία παραμένει η ίδια αλλά ανανεώνονται συνεχώς οι ιδέες και οιστόχοι των ιθυνόντων, πράγμα που σημαίνει ότι
            δεν επαναπαύονται ποτέ.</p>
            <p>Το Workout Hall δημιουργήθηκε το 2008, στη Γλυφάδα, σε έναν χώρο 90 τ.μ., αποκλειστικά για personal training. Σταδιακά αναπτύχθηκε και αποτελεί σήμερα ένα υπερσύγχρονο αθλητ
            ικό κέντρο, 7.000 τ.μ., με indoor & outdoor training space.Η προσωπική εμπειρία, η αδιάλειπτη ενασχόληση με τον αθλητισμό και η αγάπη γι’ αυτόνοδήγησε στην δημιουργία του ση
            μερινού Workout Hall.</p>
        </div>
    </div>
</div>
<div id="images">
        <div class="container">
          <p class="basictitle" id="gymstitle">ΦΩΤΟΓΡΑΦΙΕΣ</p> 
            <div class="row">
                <div class="col-md-12">
                    <img src= " <?php echo URLROOT ?> /images/gym/image1.jpg" width="365" alt="gymimg"> 
                    <img src= " <?php echo URLROOT ?> /images/gym/image1.jpg" width="365"  alt="gymimg"> 
                    <img src= " <?php echo URLROOT ?> /images/gym/image1.jpg"  width="365" alt="gymimg"> 
                </div>
             </div>
         <div class="row">
            <div class="col-md-12">
                <img src= " <?php echo URLROOT ?> /images/gym/image1.jpg" width="365" alt="gymimg"> 
                <img src= " <?php echo URLROOT ?> /images/gym/image1.jpg" width="365"  alt="gymimg"> 
            </div>
         </div>
</div>
</div>
<div class="row">
    <div class="col-md-3">
    <img src= " <?php echo URLROOT ?> /images/gym/image1.jpg" width="365" alt="gymimg"> 
    </div>
</div>
<?php require  APPROOT . '/views/inc/footer.php'?>