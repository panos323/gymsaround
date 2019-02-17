<?php require  APPROOT . '/views/inc/header.php'?>



<div class="container-fuild" >
            <div class="col-12 fimage">
                
                    <div class="row">
                        <div class="col-lg-5 offset-lg-1 col-md-5 offset-md-0">
                            <p id="bigtitle">ΒΡΕΣ ΤΟ ΓΥΜΝΑΣΤΗΡΙΟΥ ΠΟΥ ΣΟΥ ΤΑΙΡΙΑΖΕΙ</p>
                                <div class="row">
                                    <div class="col-lg-5 col-md-6 offset-md-0">
                                   <button class="btnblue" id="btnmember">Γίνε Μέλος</button></a>
                                    </div>
                                </div> 
                                    
                            </div>
                    

                    <div class="col-lg-4 offset-lg-2 col-md-6 offset-md-1 col-sm-12">
                        <div id="boxgrey">

                            <div class="row">
                                <div class="col-lg-3 offset-lg-4 col-md-5 offset-md-3 col-sm-10  col-12">
                                    <p id="mobiletitle">Βρες το γυμναστήριο που σου ταιριάζει!</p>
                                    <p id="title">Επέλεξε</p>
                                </div>
                            </div>
                    
                            <div class="row">
                                <div class="col-lg-7 offset-lg-2 col-md-9 offset-md-1 col-sm-8 offset-sm-1" id="slc">
                                    <select id="slc1">
                                        <option value="hidden">Περιοχή</option>
                                        <option value="athens">Αθήνα</option>
                                        <option value="thessalonikh">Θεσσαλονίκη</option>
                                        <option value="Trikala">Τρίκαλα</option>
                                        <option value="kalamata">Καλαμάτα</option>
                                    </select>
                                    <select id="slc2">
                                        <option value="hidden">Τύπος Γυμναστικής</option>
                                        <option value="cross">Crossfit</option>
                                        <option value="box">Box</option>
                                        <option value="yoga">Yoga</option>
                                        <option value="Pilates">Pilates</option>
                                    </select>
                                </div>
                            </div>
                            <div class="row"> 
                                <div class="col-lg-7 offset-lg-3 col-md-9 offset-md-1 col-sm-8 offset-sm-1">
                                <button class="btnorange" id="btnsearch">Αναζήτηση</button></a>
                                </div>
                            </div>
            
                        </div> <!--edn box grey--->
                    </div><!-- end col-4 offset-2-->
                </div><!--col-12 fimage-->
            </div><!--col-12 first row-->

        <!--- END ROW 1---->

        <!--- START ROW 2 - GYM ---->
<div class="bestgym">
     <div class="row">
        <div class="col-12">
            <div class="box1">
                        <div class="container">
                    
                                <div class="row">
                                    <div class="col-4">
                                        <p class="rowtitle" id="gymtitle">ΔΗΜΟΦΙΛΗ</p> 
                                        <div class="orangeline"></div>
                                    </div>
                                </div>
                                <!--------BEST GYM DESKTOP--------->
                                <div class="rowbestgym">
                                <div class="row">
                                    <div class="col-lg-4 offset-lg-0 col-md-5 offset-md-0">
                                        <p id="gymname">Workout Hall Crossfit</p>
                                        <img src= " <?php echo URLROOT; ?>/images/stars.png" alt="stars">
                                        <p style="margin-top:10px;">Ρόδων 6 & Κυβέλης 17456, Άλιμος</p>
                                        <p style="font-size:18px;"><b>Crosfii, Boxing, KingBoxing,Climbing</b></p>
                                    </div>

                                    <div class="col-lg-6 offset-lg-2 col-md-6 offset-md-1" id="bestgymimg" >
                                        <!--START IMAGE GALLERY-CAROUSEL -->
                                        <div id="carouseControlsNumbers" class="carousel slide" data-ride="carousel">
                                            <div id="carouselItemsDisplay" class="carousel-inner">
                                                <div class="carousel-item active">
                                                <img src="<?php echo URLROOT; ?>/images/bestgym1.jpg" height="auto" class="d-block w-100" alt="...">
                                                </div>
                                                <div class="carousel-item">
                                                <img src="<?php echo URLROOT; ?>/images/bestgym1.jpg" height="auto" class="d-block w-100" alt="...">
                                                </div>
                                                <div class="carousel-item">
                                                <img src="<?php echo URLROOT; ?>/images/bestgym1.jpg" height="auto" class="d-block w-100" alt="...">
                                                </div>
                                            </div>
                                            <a class="carousel-control-prev" href="#carouseControlsNumbers" role="button" data-slide="prev">
                                                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                                                <span class="sr-only">Previous</span>
                                            </a>
                                            <a class="carousel-control-next" href="#carouseControlsNumbers" role="button" data-slide="next">
                                                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                                                <span class="sr-only">Next</span>
                                            </a>
                                        </div>
                                        <!--END IMAGE GALLERY-CAROUSEL -->

                                    </div>

                                </div> <!--end row-->
                            
                                <div class="row">
                                    <div class="col-md-1 offset-md-7 col-sm-1 offset-sm-6">
                                       <!--  -->
                                    </div>
                                    <div class="col-lg-2 col-sm-2">
                                        <p id="number"  style="text-align:center;"><span id="numbercolor"></p>
                                    </div>
                                    <div class="col-1 ">
                                        <!--  -->
                                    </div>
                                </div>
                                </div>


                                 <!--------BEST GYM MOBILE--------->
                                 <div class="rowbestgymmobile">
                                  
                                    
                                     <div class="row" id="bgborder">
                                         <div class="col-5">
                                         <img src= " <?php echo URLROOT; ?>/images/bestgym1.jpg" width="100%" height="auto">
                                         </div>
                                         <div class="col-7">
                                                <p id="gymname">Workout Hall Crossfit</p>
                                                <img src= " <?php echo URLROOT; ?>/images/stars.png" alt="stars" width="30%">
                                                <p id="bgelementmobile">Ρόδων 6 & Κυβέλης 17456, Άλιμος</p>
                                                <p id="bgelementmobile">Crosfii, Boxing, KingBoxing,Climbing</p>
                                         </div>
                                       </div> 
                                     <div class="row" id="bgborder">
                                         <div class="col-5">
                                         <img src= " <?php echo URLROOT; ?>/images/bestgym1.jpg" width="100%" height="auto">
                                         </div>
                                         <div class="col-7">
                                                <p id="gymname">Workout Hall Crossfit</p>
                                                <img src= " <?php echo URLROOT; ?>/images/stars.png" alt="stars" width="30%">
                                                <p id="bgelementmobile">Ρόδων 6 & Κυβέλης 17456, Άλιμος</p>
                                                <p id="bgelementmobile">Crosfii, Boxing, KingBoxing,Climbing</p>
                                         </div>
                                     </div>
                                     <div class="row" id="bgborder">
                                         <div class="col-5">
                                         <img src= " <?php echo URLROOT; ?>/images/bestgym1.jpg" width="100%" height="auto">
                                         </div>
                                         <div class="col-7">
                                                <p id="gymname">Workout Hall Crossfit</p>
                                                <img src= " <?php echo URLROOT; ?>/images/stars.png" alt="stars" width="30%">
                                                <p id="bgelementmobile">Ρόδων 6 & Κυβέλης 17456, Άλιμος</p>
                                                <p id="bgelementmobile">Crosfii, Boxing, KingBoxing,Climbing</p>
                                         </div>
                                     </div>
                                  

                                 </div>


                        </div><!-- end conatiner--->
                <!-- end bestgym--->
                </div>   
                </div>   
     </div>         
     </div>
 <!--- START ROW 3 - BLOG---->
<div class="blogrow">
        <div class="row">
            <div class="col-lg-7 col-md-6 ">
                <div class="box2"></div>
            </div>
            <div class="col-lg-5 col-md-6">
                <div class="blogarticle">
                    <p class="rowtitle" id="blogtitle">BLOG</p>
                    <p  id="articletitle">5 Συμβουλές Διατροφής!</p>
                    <p  id="article">Lorem Ipsum is simply dummy text of the printing and typesetting industry.
                        Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an 
                        unknown printer took a galley of type and scrambled 
                        it to make a type specimen book.  </p>
                        <div class="row">
                            <div class="col-lg-4 offset-lg-6 col-sm-5 offset-sm-5">
                              <a class="btnblue" id="btnblog" href="#">Περισσότερα</a>
                            </div>
                        </div>
                </div>
            </div>
        </div>
</div>
<!--- START ROW 4-NEWSLETTER---->

 <!--- START ROW 4-SPONSORS---->

    <div class="row">
        <div class="col-12">
            <div class="box3">
                <div class="container">
                    <p class="rowtitle" id="blogtitle">ΥΠΟΣΤΗΡΙΚΤΕΣ</p>
                        <div class="row">
                            <div class="col-1" id="sponsors">
                                <img  src= " <?php echo URLROOT; ?>/images/back.png" alt="stars" width="25" height="30">
                            </div>
                            <div class="col-10">
                                <div class="flex-container">
                                    <div> <img  src= " <?php echo URLROOT; ?>/images/testlogo.png" alt="stars" width="100%" height="auto"></div>
                                    <div> <img  src= " <?php echo URLROOT; ?>/images/testlogo.png" alt="stars" width="100%" height="auto"></div>
                                    <div> <img  src= " <?php echo URLROOT; ?>/images/testlogo.png" alt="stars" width="100%" height="auto"></div>
                                    <div> <img  src= " <?php echo URLROOT; ?>/images/testlogo.png" alt="stars" width="100%" height="auto"></div>
                                    <div> <img  src= " <?php echo URLROOT; ?>/images/testlogo.png" alt="stars" width="100%" height="auto"></div>
                                    <div> <img  src= " <?php echo URLROOT; ?>/images/testlogo.png" alt="stars" width="100%" height="auto"></div>
                                </div>
                            </div>
                            <div class="col-1" id="sponsors">
                                <img  src= " <?php echo URLROOT; ?>/images/front.png" alt="stars" width="25" height="30">
                            </div>
                    </div>
                </div>
             </div>
        </div> 
    </div>

        <!--- START ROW 4-NEWSLETTER---->

<div class="row">
<div class="col-md-12" id="newsletter">

</div>


</div>

</div> <!-- end conatiner fuild-->

<?php require  APPROOT . '/views/inc/footer.php'?>

