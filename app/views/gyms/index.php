<?php require  APPROOT . '/views/inc/header.php'?>

    <div class="row">
        <div class="col-lg-6 col-md-12 gymelement">
                <div class="row">
                 <!-- <div class="col-md-6 offset-md-2">
                        <p id="gymsnames">Workout Hall Crossfit</p>
                        <img src= " <?php echo URLROOT ?> /images/stars.png" alt="stars"/>
                        <p>Ρόδων 6 & Κυβέλης 17456, Άλιμος</p>
                        <p><b>Crosfii, Boxing, KingBoxing,Climbing</b></p>
                        <button class="btnorange" id="btnsearch"><a href="#">Πακέτα Συνδρομών</a></button>
                    </div>-->
                    <div class="col-lg-3 offset-lg-2 col-md-3 offset-md-1 col-sm-3 offset-sm-1 col-6 offset-1 mt-5">
                         <img id="gymlogo" width="100%" src= " <?php echo URLROOT;?>/images/gym/gymlogo.png" alt="logo"/>
                    </div>
                    <div class="col-lg-6 offset-lg-1 col-md-6 offset-md-1 col-sm-6 offset-sm-1 col-10 offset-1 mt-5" >
                        <p id="gymsnames"><?php echo $data['gym']->gym_name; ?></p>
                        <img src= " <?php echo URLROOT;?>/images/stars.png" alt="stars"/>
                        <div id="gymaddress">
                            <a href="#">
                             <p><?php echo $data['gym']->gym_location;?>  <img src= " <?php echo URLROOT;?>/images/gym/mappin.png" width="20%" alt="pin"/></p>
                            </a>
                        </div>
                        <p id="activities"><b>Crosfii | Boxing | KingBoxing | Climbing</b></p>
                       <a class="btnorange" id="btnsundromes" href="#">Πακέτα Συνδρομών</a>
                    </div>
            </div>
        </div>
        <div class="col-lg-6 " id="biggymimg">
            <img src= " <?php echo URLROOT;?>/images/gym/bigimggym.jpg" width="100%"   height="600"; alt="biggym">
        </div>
    </div>

 
<!-----------------------------------------------------------------------------------------------------------------
-------------------------------------------WHO WE ARE--------------------------------------------------------------->

    <div class="container">
        <div class="row">
        <div class="aboutscroll hide">
            <div class="col-md-12 my-5" id="bigabouttext">
                <p class="basictitle" id="gymstitle">ΠΟΙΟΙ ΕΙΜΑΣΤΕ</p>
             
                <p> Το Workout Hall δημιουργήθηκε το 2008, στη Γλυφάδα, σε έναν χώρο 90 τ.μ., αποκλειστικά για personal training. Σταδιακά αναπτύχθηκε και αποτελεί σήμερα ένα υπερσύγχρονο αθλητ
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
    </div>
<!-----------------------------------------------------------------------------------------------------------------
-------------------------------------------***IMAGES**--------------------------------------------------------------->

    <div id="images">

     

 <div class="container">
     <div class="row">
         <div class="col-md-5 mt-5 mb-3">
            <p class="basictitle" id="gymstitle">ΦΩΤΟΓΡΑΦΙΕΣ</p>
         </div>
     </div>


         <!-- Images used to open the lightbox -->
         <div class="rowLightBox">
            <div class="columnLightBox">
                <img class="img-fluid"  src= " <?php echo URLROOT; ?>/images/gym/image2.jpg" onclick="openModal();currentSlide(1)" class="hover-shadow">
            </div>
            <div class="columnLightBox">
                <img class="img-fluid"  src= " <?php echo URLROOT; ?>/images/gym/image2.jpg" onclick="openModal();currentSlide(2)" class="hover-shadow">
            </div>
            <div class="columnLightBox">
                <img class="img-fluid"  src= " <?php echo URLROOT; ?>/images/gym/image2.jpg" onclick="openModal();currentSlide(3)" class="hover-shadow">
            </div>
            <div class="columnLightBox">
                <img class="img-fluid"  src= " <?php echo URLROOT; ?>/images/gym/image2.jpg" onclick="openModal();currentSlide(3)" class="hover-shadow">
            </div>
            <div class="columnLightBox">
                <img class="img-fluid"  src= " <?php echo URLROOT; ?>/images/gym/image2.jpg" onclick="openModal();currentSlide(3)" class="hover-shadow">
            </div>
            <div class="columnLightBox">
                <img class="img-fluid mb-5"  src= " <?php echo URLROOT; ?>/images/gym/image2.jpg" onclick="openModal();currentSlide(3)" class="hover-shadow">
            </div>
        </div>

        <!-- The Modal/Lightbox -->
        <div id="myModalLightBox" class="modalLightBox">
        <span class="closeLightBox cursor" onclick="closeModal()"><i class="text-white fa fa-1x fa-window-close" aria-hidden="true"></i>
        </span>
        <div class="modal-contentLightBox">

            <div class="mySlides">
            <div class="numbertext lead">1 / 6</div>
            <img  src= " <?php echo URLROOT; ?>/images/gym/image2.jpg" style="width:100%">
            </div>

            <div class="mySlides">
            <div class="numbertext lead">2 / 6</div>
            <img  src= " <?php echo URLROOT; ?>/images/gym/image2.jpg" style="width:100%">
            </div>

            <div class="mySlides">
            <div class="numbertext lead">3 / 6</div>
            <img  src= " <?php echo URLROOT; ?>/images/gym/image2.jpg" style="width:100%">
            </div>

            <div class="mySlides">
            <div class="numbertext lead">4 / 6</div>
            <img  src= " <?php echo URLROOT; ?>/images/gym/image2.jpg" style="width:100%">
            </div>

            <div class="mySlides">
            <div class="numbertext lead">5 / 6</div>
            <img  src= " <?php echo URLROOT; ?>/images/gym/image2.jpg" style="width:100%">
            </div>

            <div class="mySlides">
            <div class="numbertext lead">6 / 6</div>
            <img  src= " <?php echo URLROOT; ?>/images/gym/image2.jpg" style="width:100%">
            </div>

            <!-- Next/previous controls -->
            <a class="prevLightBox" onclick="plusSlides(-1);"><i class="text-success fa fa-2x fa-arrow-left" aria-hidden="true"></i>
            </a>
            <a class="nextLightBox" onclick="plusSlides(1);"><i class="text-success fa fa-2x fa-arrow-right" aria-hidden="true"></i></a>

            <!-- Caption text -->
            <div class="caption-container">
            <p id="caption"></p>
            </div>

            <!-- Thumbnail image controls -->
            <div class="columnLightBox">
            <img class="demoLightBox"  src= " <?php echo URLROOT; ?>/images/gym/image2.jpg" onclick="currentSlide(1);" alt="Gym Photos">
            </div>

            <div class="columnLightBox">
            <img class="demoLightBox"  src= " <?php echo URLROOT; ?>/images/gym/image2.jpg" onclick="currentSlide(2);" alt="Gym Photos">
            </div>

            <div class="columnLightBox">
            <img class="demoLightBox"  src= " <?php echo URLROOT; ?>/images/gym/image2.jpg" onclick="currentSlide(3);" alt="Gym Photos">
            </div>

            <div class="columnLightBox">
            <img class="demoLightBox"  src= " <?php echo URLROOT; ?>/images/gym/image2.jpg" onclick="currentSlide(4);" alt="Gym Photos">
            </div>

            <div class="columnLightBox">
            <img class="demoLightBox"  src= " <?php echo URLROOT; ?>/images/gym/image2.jpg" onclick="currentSlide(5);" alt="Gym Photos">
            </div>

            <div class="columnLightBox">
            <img class="demoLightBox"  src= " <?php echo URLROOT; ?>/images/gym/image2.jpg" onclick="currentSlide(6);" alt="Gym Photos">
            </div>

        </div>
        </div>

        </div> <!--container-->
    </div> <!--images-->




<!--         
            <div class="row justify-content-center">
                <div class="col-md-12 mb-1"  id="imagerow1">
                <img src= " <?php echo URLROOT; ?>/images/gym/image2.jpg" width="32%" alt="gymimg">
                <img src= " <?php echo URLROOT; ?>/images/gym/image2.jpg" width="32%" alt="gymimg">
                <img src= " <?php echo URLROOT; ?>/images/gym/image2.jpg" width="32%" alt="gymimg">
                </div>
            </div>
            <div class="row">
                <div class="col-md-12 mb-5" id="imagerow2">
                    <img src= " <?php echo URLROOT; ?>/images/gym/image2.jpg" width="32%" alt="gymimg">
                    <img src= " <?php echo URLROOT; ?>/images/gym/image3.jpg" width="32%"  alt="gymimg">
                </div>
            </div>
        </div>
    </div> -->
<!-----------------------------------------------------------------------------------------------------------------
-------------------------------------------***TRAINERS**--------------------------------------------------------------->

    
        <div class="container">
            <div class="row">
                <div class="col-md-5 mt-5 mb-3">
                    <p class="basictitle" id="gymstitle">ΠΡΟΣΩΠΙΚΟ</p>
                </div>
            </div>
            <div class="row d-flex justify-content-center">
            <!--START DYNAMIC EXAMPLE SLIDER -->
                <div class="col-md-6 mb-5">
                    <div id="carouselDynamicIndicators" class="banner carousel slide">
                        <ol class="carousel-indicators">
                            <?php foreach ($data['trainers'] as $key=>$trainer) : ?>
                                <li data-target="#carouselDynamicIndicators" data-slide-to="<?php echo $key; ?>"></li>
                            <?php endforeach; ?>
                        </ol>
                        <div class="carousel-inner">
                            <?php foreach ($data['trainers'] as $key=>$trainer) : ?>
                                <div class="carousel-item img<?php echo $key; ?>">
                                    <img class="d-block w-100" src="<?php echo '../../public/images/trainers/'.$data['gym']->gym_name.'/'.$trainer->trainer_image; ?>" alt="First slide">
                                    <div class="trainerdescr"><p><?php echo $trainer->trainer_name.'-'.$trainer->trainer_title;?></p></div>
                                </div>
                            <?php endforeach; ?>
                        </div>
                        <a class="carousel-control-prev" href="#carouselDynamicIndicators" role="button" data-slide="prev">
                            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                            <span class="sr-only">Previous</span>
                        </a>
                        <a class="carousel-control-next" href="#carouselDynamicIndicators" role="button" data-slide="next">
                            <span class="carousel-control-next-icon" aria-hidden="true"></span>
                            <span class="sr-only">Next</span>
                        </a>
                    </div>
                </div>
            <!--END DYNAMIC EXAMPLE SLIDER -->
            </div>
        </div>   
  

 <!-----------------------------------------------------------------------------------------------------------------
-------------------------------------------***SYNDROMES**--------------------------------------------------------------->   
    <div class="sundromesrow">
        <div class="container">
        <div class="row">
            <div class="col-md-5 mt-5 mb-3">
            <p class="basictitle" id="gymstitle">ΠΑΚΕΤΑ ΣΥΝΔΡΟΜΩΝ</p>
                </div>
</div> 
                <div class="row">
                    <div class="col-md-12 mb-5">
                        <div class="flex-container-sundromes">
                        <div class="flip-card">
                            <div class="flip-card-inner">
                            <div class="flip-card-front">
                                <div class="orangebox">
                                    <p id="month"><b>1 ΜΗΝΑΣ</b></p>
                                    <p><b>CrossFit</b></p>
                                    <p><b>Climbing</b></p>
                                    <p id="price"><b>70€</b></p>
                                </div>
                            </div>
                            <div class="flip-card-back">
                                <h5>Mηνιαία Συνδρομή</h5>
                                <a href="#">Aγορά</a>
                            </div>
                        </div>
                     </div>
                   


                        <div class="orangebox">
                            <p id="month"><b>3 ΜΗΝΑΣ</b></p>
                            <p><b>CrossFit</b></p>
                            <p><b>Climbing</b></p>
                            <p id="price"><b>180€</b></p>
                        </div>
                        <div class="orangebox">
                            <p id="month"><b>6 ΜΗΝΑΣ</b></p>
                            <p><b>CrossFit</b></p>
                            <p><b>Climbing</b></p>
                            <p id="price"><b>360€</b></p>
                        </div>
                        <div class="orangebox">
                            <p id="month"><b>1 ΕΤΟΣ</b></p>
                            <p><b>CrossFit</b></p>
                            <p><b>Climbing</b></p>
                            <p id="price"><b>450€</b></p>
                        </div>
                   </div>    
                  </div>
            </div>    
        </div>
    </div>
    <div class="row">
        <div class="col-md-12">
            <iframe src="http://maps.google.com/maps?q=37.9838,23.72758&z=15&output=embed" width="100%" height="600" frameborder="0" style="border:0" allowfullscreen></iframe>
        </div>
    </div>

    <script type="text/javascript">
    (function(){
       var  aboutEl= $('div.aboutscroll'),
            aboutoffset= 200,
            documentEl=$(document);
        
        documentEl.on("scroll", function(){
            if (documentEl.scrollTop() > aboutoffset && aboutEl.hasClass('hide')) aboutEl.removeClass('hide');
            
        });
        })();
    </script>
<?php require  APPROOT . '/views/inc/footer.php'?>

