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
                    <div class="col-lg-3 offset-lg-2 col-md-3 offset-md-1 col-sm-3 offset-sm-1 col-6 offset-1 mt-lg-5 mt-0">
                         <img id="gymlogo" width="100%" src= " <?php echo URLROOT;?>/images/gym/gymlogo.png" alt="logo"/>
                    </div>
                    <div class="col-lg-6 offset-lg-1 col-md-6 offset-md-1 col-sm-6 offset-sm-1 col-10 offset-1 mt-lg-5 mt-0" >
                        <p id="gymsnames"><?php echo $data['gym']->gym_name; ?></p>
                        <img src= " <?php echo URLROOT;?>/images/stars.png" alt="stars"/>
                        <div id="gymaddress">
                            <a href="#">
                             <p><?php echo $data['gym']->gym_location;?>  <img src= " <?php echo URLROOT;?>/images/gym/mappin.png" width="20%" alt="pin"/></p>
                            </a>
                        </div>
                        <p id="activities"><b><?php echo $data['gym']->gym_type; ?></b></p>
                        <a class="btnorange" id="btnsundromes" href="#sundromestitle">Πακέτα Συνδρομών</a>
                    </div>
            </div>
        </div>
        <div class="col-lg-6 " id="biggymimg">
            <img src= " <?php echo URLROOT;?>/images/general_gyms_images/<?php echo $data['gym']->gym_name.'/'.$data['gym']->gym_main_image; ?>" width="100%" height="600" alt="biggym">
        </div>
    </div>

 
<!-----------------------------------------------------------------------------------------------------------------
-------------------------------------------WHO WE ARE--------------------------------------------------------------->

    <div class="container">
        <div class="row">
        <div class="aboutscroll hide">
            <div class="col-md-12 my-5" id="bigabouttext">
                <p class="basictitle" id="gymstitle">ΠΟΙΟΙ ΕΙΜΑΣΤΕ</p>
             
                <p><?php echo $data['gym']->gym_description; ?></p>

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
             <?php foreach ($data['all_images'] as $key=>$image) : ?>
                <div class="columnLightBox">
                    <img class="img-fluid"  src= " <?php echo URLROOT; ?>/images/general_gyms_images/<?php echo $data['gym']->gym_name.'/'.$image; ?>" onclick="openModal();currentSlide(<?php echo $key+1; ?>)" class="hover-shadow">
                </div>
            <?php endforeach; ?>
        </div>

        <!-- The Modal/Lightbox -->
        <div id="myModalLightBox" class="modalLightBox">
        <span class="closeLightBox cursor" onclick="closeModal()"><i class="text-white fa fa-1x fa-window-close" aria-hidden="true"></i>
        </span>
        <div class="modal-contentLightBox">
            <?php foreach ($data['all_images'] as $key=>$image) : ?>
                <div class="mySlides">
                    <div class="numbertext lead"><?php echo ($key+1).'/'.$data['total_images']; ?></div>
                    <img  src= "<?php echo URLROOT; ?>/images/general_gyms_images/<?php echo $data['gym']->gym_name.'/'.$image; ?>" style="width:100%">
                </div>
            <?php endforeach; ?>


            <!-- Next/previous controls -->
            <a class="prevLightBox" onclick="plusSlides(-1);"><i class="text-secondary fa fa-2x fa-arrow-left" aria-hidden="true" style="color:red;"></i>
            </a>
            <a class="nextLightBox" onclick="plusSlides(1);"><i class="text-secondary fa fa-2x fa-arrow-right" aria-hidden="true"></i></a>

            <!-- Caption text -->
            <div class="caption-container">
            <p id="caption"></p>
            </div>

        </div>
        </div>

        </div> <!--container-->
    </div> <!--images-->

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
                    <div id="carouselDynamicIndicators" class="banner carousel slide" style="padding-bottom:20px;">
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
                <div class="col-md-5 mt-5">
                     <p class="basictitle" id="sundromestitle">ΠΑΚΕΤΑ ΣΥΝΔΡΟΜΩΝ</p>
                </div>
            </div> 
            <div class="row">
                <div class="col-md-12 mb-5">
                    <div class="flex-container-sundromes">
                            <div class="flip-card mb-3">
                                <div class="flip-card-inner">
                                    <div class="flip-card-front">
                                        <div class="orangebox">
                                            <p id="month"><b>1 ΜΗΝΑΣ</b></p>
                                            <p><b><?php echo $data['gym']->gym_type; ?></b></p>
                                            <p id="price"><b><?php echo $data['gym']->gym_monthly_price; ?>&euro;</b></p>
                                        </div>
                                    </div>
                                    <div class="flip-card-back">
                                        <p id="priceback"><b><?php echo $data['gym']->gym_monthly_price; ?>&euro; <h4 >1 Mήνα</h4></b></p>
                                        <a href="<?php echo URLROOT; ?>/gyms/payment?name=<?php echo $data['gym']->gym_name; ?>&amount=<?php echo $data['gym']->gym_monthly_price; ?>&month=1" class="buylink">Aγορά</a>
                                    </div>
                                </div>
                            </div>
                        <div class="flip-card mb-3">
                            <div class="flip-card-inner">
                                <div class="flip-card-front">
                                    <div class="orangebox">
                                        <p id="month"><b>3 ΜΗΝΕΣ</b></p>
                                        <p><b><?php echo $data['gym']->gym_type; ?></b></p>
                                        <p id="price"><b><?php echo $data['gym']->gym_monthly_price*3-20; ?>&euro;</b></p>
                                    </div>
                                </div>
                                <div class="flip-card-back">
                                
                                    <p id="priceback"><b><?php echo $data['gym']->gym_monthly_price*3-10; ?>&euro; <h4 >3 Mήνες</h4></b></p>
                                    <a href="<?php echo URLROOT; ?>/gyms/payment?name=<?php echo $data['gym']->gym_name; ?>&amount=<?php echo $data['gym']->gym_monthly_price*3-20; ?>&month=2" class="buylink">Aγορά</a>
                                </div>
                        </div>
                    </div>

                    <div class="flip-card mb-3">
                            <div class="flip-card-inner">
                                <div class="flip-card-front">
                                    <div class="orangebox">
                                        <p id="month"><b>6 ΜΗΝΕΣ</b></p>
                                        <p><b><?php echo $data['gym']->gym_type; ?></b></p>
                                        <p id="price"><b><?php echo $data['gym']->gym_monthly_price*6-50; ?>&euro;</b></p>
                                    </div>
                                </div>
                                <div class="flip-card-back">
                                     <p id="priceback"><b><?php echo $data['gym']->gym_monthly_price*6-50; ?>&euro; <h4 >6 Mήνες</h4></b></p>
                                    <a href="<?php echo URLROOT; ?>/gyms/payment?name=<?php echo $data['gym']->gym_name; ?>&amount=<?php echo $data['gym']->gym_monthly_price*6-50; ?>&month=6" class="buylink">Aγορά</a>
                                </div>
                            </div>
                    </div>
                
                    <div class="flip-card mb-3">
                            <div class="flip-card-inner">
                                <div class="flip-card-front">
                                    <div class="orangebox">
                                        <p id="month"><b>12 ΜΗΝΕΣ</b></p>
                                        <p><b><?php echo $data['gym']->gym_type; ?></b></p>
                                        <p id="price"><b><?php echo $data['gym']->gym_yearly_price; ?>&euro;</b></p>
                                    </div>
                                </div>
                                <div class="flip-card-back">
                                     <p id="priceback"><b><?php echo $data['gym']->gym_yearly_price; ?>&euro; <h4 >12 Mήνες</h4></b></p>
                                    <a href="<?php echo URLROOT; ?>/gyms/payment?name=<?php echo $data['gym']->gym_name; ?>&amount=<?php echo $data['gym']->gym_yearly_price; ?>&month=12" class="buylink">Aγορά</a>
                                </div>
                            </div>
                    </div>
                   </div>    
                  </div>
            </div>    
        </div>
    </div>


    <div class="row">
        <div class="col-md-12">
            <iframe src="http://maps.google.com/maps?q=<?php echo $data['gym']->gym_lat.','.$data['gym']->gym_long; ?>&z=15&output=embed" width="100%" height="600" frameborder="0" style="border:0" allowfullscreen></iframe>
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

