<?php require  APPROOT . '/views/inc/header.php'?>



<div class="container-fuild" >
            <div class="col-12 fimage">
                
                    <div class="row">
                        <div class="col-lg-4 offset-lg-1 col-md-4 offset-md-0">
                            <p id="bigtitle" class="animated fadeInLeft">ΒΡΕΣ ΤΟ ΓΥΜΝΑΣΤΗΡΙΟΥ ΠΟΥ ΣΟΥ ΤΑΙΡΙΑΖΕΙ</p>
                                <div class="row">
                                    <div class="col-lg-5 col-md-6 offset-md-0">
                                   <button class="btnblue" id="btnmember">Γίνε Μέλος</button></a>
                                    </div>
                                </div> 
                                    
                            </div>
                    

                    <div class="col-lg-5 offset-lg-2 col-md-7 offset-md-1 col-sm-12">
                        <div id="boxgrey">

                            <div class="row">
                                <div class="col-lg-3 offset-lg-5 col-md-5 offset-md-3 col-sm-10  col-12">
                                    <p id="mobiletitle">Βρες το γυμναστήριο που σου ταιριάζει!</p>
                                    <p id="title">Επέλεξε</p>
                                </div>
                            </div>
                    
                            <div class="row">
                                <div class="col-lg-7 offset-lg-3 col-md-9 offset-md-1 col-sm-8 offset-sm-1" id="slc">
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
                                <div class="col-lg-7 offset-lg-4 col-md-9 offset-md-1 col-sm-8 offset-sm-1">
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
                                            <!--start first gym details to display -->
                                            <div class="displayFirstGym">
                                                <p id="gymname">Workout Hall Crossfit</p>
                                                <img src= " <?php echo URLROOT; ?>/images/stars.png" alt="stars">
                                                <p style="margin-top:10px;">Ρόδων 6 & Κυβέλης 17456, Άλιμος</p>
                                                <p style="font-size:18px;"><b>Crosfii, Boxing, KingBoxing,Climbing</b></p>
                                            </div>
                                            <!--end first gym details to display -->

                                            <!--start second gym details to display -->
                                            <div class="displaySecondGym">
                                                <p id="gymname">Benefit</p>
                                                <img src= " <?php echo URLROOT; ?>/images/stars.png" alt="stars">
                                                <p style="margin-top:10px;">Ιωνίας 25, Τρίκαλα</p>
                                                <p style="font-size:18px;"><b>Salsa, Zumba, KingBoxing</b></p>
                                            </div>
                                            <!--end second gym details to display -->

                                            <!--start third gym details to display -->
                                            <div class="displayThirdGym">
                                                <p id="gymname">BodyBuilding Club</p>
                                                <img src= " <?php echo URLROOT; ?>/images/stars.png" alt="stars">
                                                <p style="margin-top:10px;">Ριχάρδου 27, Θεσσαλονίκη</p>
                                                <p style="font-size:18px;"><b>Crosfit, Pilates,BodyBuilding</b></p>
                                            </div>
                                            <!--end third gym details to display -->
                                        </div>

                                        <div class="col-lg-6 offset-lg-2 col-md-6 offset-md-1" id="bestgymimg" >
                                            <!--start first gym photo to display -->
                                            <div class="displayFirstGymPhoto">
                                                <img src="<?php echo URLROOT; ?>/images/bestgym1.jpg" height="auto" class="d-block w-100" alt="Gym Photo">      
                                            </div>
                                            <!--start first gym photo to display -->

                                            <!--start second gym photo to display -->
                                            <div class="displaySecondGymPhoto">
                                                <img src="<?php echo URLROOT; ?>/images/bestgym2.jpeg" height="auto" class="d-block w-100" alt="Gym Photo">      
                                            </div>
                                            <!--start second gym photo to display -->

                                            <!--start third gym photo to display -->
                                            <div class="displayThirdGymPhoto">
                                                <img src="<?php echo URLROOT; ?>/images/bestgym3.jpeg" height="auto" class="d-block w-100" alt="Gym Photo">      
                                            </div>
                                            <!--start third gym photo to display -->
                                        </div>

                                    </div><!--end row-->
                            

                                    <div class="row">
                                        <!--start arrow controls -->
                                        <div id="leftArrowChangeGym" class="col-md-1 offset-md-7 col-sm-1 offset-sm-6">
                                            <i class="text-info fa fa-arrow-left fa-2x" aria-hidden="true"></i>
                                        </div>
                                        <div class="col-lg-2 col-sm-2">
                                            <p id="number" style="text-align:center;"><span id="numbercolor"></p>
                                        </div>
                                        <div id="rightArrowChangeGym" class="col-1 ">
                                            <i class="text-info fa fa-arrow-right fa-2x" aria-hidden="true"></i>
                                        </div>
                                        <!--end arrow controls -->
                                    </div><!--end row-->
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
                                                <p style="margin-top:10px; id="bgelementmobile">Ρόδων 6 & Κυβέλης 17456, Άλιμος</p>
                                                <p id="bgelementmobile"><b>Crosfii, Boxing, KingBoxing,Climbing</b></p>
                                         </div>
                                       </div> 
                                     <div class="row" id="bgborder">
                                         <div class="col-5">
                                         <img src= " <?php echo URLROOT; ?>/images/bestgym2.jpeg" width="100%" height="auto">
                                         </div>
                                         <div class="col-7">
                                                <p id="gymname">Benefit</p>
                                                <img src= " <?php echo URLROOT; ?>/images/stars.png" alt="stars">
                                                <p style="margin-top:10px;">Ιωνίας 25, Τρίκαλα</p>
                                                <p><b>Salsa, Zumba, KingBoxing</b></p>
                                         </div>
                                     </div>
                                     <div class="row" id="bgborder">
                                         <div class="col-5">
                                         <img src= " <?php echo URLROOT; ?>/images/bestgym3.jpeg" width="100%" height="auto">
                                         </div>
                                         <div class="col-7">
                                                <p id="gymname">BodyBuilding Club</p>
                                                <img src= " <?php echo URLROOT; ?>/images/stars.png" alt="stars">
                                                <p  style="margin-top:10px;">Ριχάρδου 27, Θεσσαλονίκη</p>
                                                <p><b>Crosfit, Pilates,BodyBuilding</b></p>
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

    <div class="row mt-5">
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

