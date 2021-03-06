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
                    <div class="col-lg-5 offset-lg-2 col-md-7 offset-md-1 col-sm-12" style="padding-right: 0 !important;">
                        <div id="boxgrey">

                            <div class="row">
                                <div class="col-lg-12  col-md-12 col-sm-10 col-12">
                                    <p id="mobiletitle">Βρες το γυμναστήριο που σου ταιριάζει!</p>
                                    <p id="title">Επέλεξε</p>
                                        <select id="slc1" class="sortByNameBtn">
                                            <option value="hidden">Περιοχή</option>
                                            <option id="dropdownAthens" value="Αθήνα">Αθήνα</option>
                                            <option value="Θεσσαλονίκη">Θεσσαλονίκη</option>
                                            <option value="Τρίκαλα">Τρίκαλα</option>
                                            <option value="Καλαμάτα">Καλαμάτα</option>
                                        </select>
                                        <select id="slc2" class="dropdownMenuButtonArr">
                                            <option value="hidden">Τύπος Γυμναστικής</option>
                                            <option value="Πολεμικές Τέχνες">Πολεμικές Τέχνες</option>
                                            <option value="Crossfit">Crossfit</option>
                                            <option value="Αerobic">Αerobic</option>
                                            <option value="Χοροί">Χοροί</option>
                                        </select>
                                    <a href="<?php echo URLROOT; ?>/gyms/search"><button class="btnorange" id="btnsearch">Αναζήτηση</button></a>

                                </div>
                            </div>
                        </div> <!--edn box grey--->
                    </div><!-- end col-4 offset-2-->
                </div><!--col-12 fimage-->
            </div><!--col-12 first row-->

        <!--- END ROW 1---->

        <!--- START ROW 2 - GYM ---->

     <div class="row">
        <div class="col-12 mb-5">
            <div class="box1">
                        <div class="container">
                    
                                <div class="row">
                                    <div class="col-4 mt-5">
                                        <p class="rowtitle" id="gymtitle">ΔΗΜΟΦΙΛΗ</p> 
                                        <div class="orangeline"></div>
                                    </div>
                                </div>
                                <!--------BEST GYM DESKTOP--------->
                                <div class="rowbestgym">
                                    <div class="row">
                                        <div class="col-lg-4 offset-lg-0 col-md-5 offset-md-0">
                                            <!--start first gym details to display -->
                                            <div class="displayFirstGym anime">
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
                                            <div class="displayFirstGymPhoto anime-left">
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
                                        <div id="leftArrowChangeGym" class="col-md-1 offset-md-7 col-sm-1 offset-sm-6 mb-5">
                                            <i class="text-secondary fa fa-arrow-left fa-2x" aria-hidden="true"></i>
                                        </div>
                                        <div class="col-lg-2 col-sm-2">
                                            <p id="number" style="text-align:center;"><span id="numbercolor"></p>
                                        </div>
                                        <div id="rightArrowChangeGym" class="col-1 ">
                                            <i class="text-secondary fa fa-arrow-right fa-2x" aria-hidden="true"></i>
                                        </div>
                                        <!--end arrow controls -->
                                    </div><!--end row-->
                                </div>


                                 <!--------BEST GYM MOBILE--------->
                                 <div class="rowbestgymmobile">
                                     <div class="row" id="bgborder">
                                         <div class="col-md-5 col-sm-5 offset-sm-0 col-10 offset-1 mb-4">
                                         <img src= " <?php echo URLROOT; ?>/images/bestgym1.jpg" width="100%" height="auto">
                                         </div>
                                         <div class="col-md-7 col-sm-7 offset-sm-0 col-10 offset-1">
                                                <p id="gymname">Workout Hall Crossfit</p>
                                                <img src= " <?php echo URLROOT; ?>/images/stars.png" alt="stars" width="20%">
                                                <p style="margin-top:10px;" id="bgelementmobile">Ρόδων 6 & Κυβέλης 17456, Άλιμος</p>
                                                <p id="bgelementmobile"><b>Crosfii, Boxing, KingBoxing,Climbing</b></p>
                                         </div>
                                       </div> 
                                     <div class="row" id="bgborder">
                                         <div class="col-md-5 col-sm-5 offset-sm-0 col-10 offset-1 mb-4">
                                         <img src= " <?php echo URLROOT; ?>/images/bestgym2.jpeg" width="100%" height="auto">
                                         </div>
                                         <div  class="col-md-7 col-sm-7 offset-sm-0 col-10 offset-1">
                                                <p id="gymname">Benefit</p>
                                                <img src= " <?php echo URLROOT; ?>/images/stars.png"  width="30%" alt="stars">
                                                <p style="margin-top:10px;">Ιωνίας 25, Τρίκαλα</p>
                                                <p><b>Salsa, Zumba, KingBoxing</b></p>
                                         </div>
                                     </div>
                                     <div class="row" id="bgborder">
                                         <div class="col-md-5 col-sm-5 offset-sm-0 col-10 offset-1 mb-4">
                                         <img src= " <?php echo URLROOT; ?>/images/bestgym3.jpeg" width="100%" height="auto">
                                         </div>
                                         <div class="col-md-7 col-sm-7 offset-sm-0 col-10 offset-1">
                                                <p id="gymname">BodyBuilding Club</p>
                                                <img src= " <?php echo URLROOT; ?>/images/stars.png"  width="30%" alt="stars">
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
    
 <!--- START ROW 3 - BLOG---->
<div class="blogrow">
        <div class="row">
            <div class="col-lg-7 col-md-6  ">
                <div class="box2"></div>
            </div>
            <div class="col-lg-5 col-md-6">
                <div class="blogarticle">
                    <p class="rowtitle" id="blogtitle">BLOG</p>
                    <p class="anime-left" id="articletitle">5 Συμβουλές Διατροφής!</p>
                    <p class="anime-left" id="article">Lorem Ipsum is simply dummy text of the printing and typesetting industry.
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
        <div class="col-12 mt-lg-5 mt-md-5 mt-0">
            <div class="box3">
                <div class="container">
                    <p class="rowtitle" id="sponsorstitle">ΥΠΟΣΤΗΡΙΚΤΕΣ</p>
                        <div class="row my-5">
                            <div class="flexAllItems">
                            <div class="col-1" id="sponsors1">
                                <i class="text-secondary fa fa-arrow-left fa-2x" aria-hidden="true"></i>
                            </div>
                            <div class="col-10">
                                <div class="flex-container">
                                    <!-- first sponsors -->
                                    <div class="sponsorsFirst"> <img class="img-fluid" src= " <?php echo URLROOT; ?>/images/placeholder-red.png" alt="stars" width="100%" height="auto"></div>
                                    <div class="sponsorsFirst"> <img class="img-fluid" src= " <?php echo URLROOT; ?>/images/placeholder-red.png" alt="stars" width="100%" height="auto"></div>
                                    <div class="sponsorsFirst"> <img class="img-fluid" src= " <?php echo URLROOT; ?>/images/placeholder-red.png" alt="stars" width="100%" height="auto"></div>
                                    <div class="sponsorsFirst"> <img class="img-fluid" src= " <?php echo URLROOT; ?>/images/placeholder-red.png" alt="stars" width="100%" height="auto"></div>
                                    
                                    <!-- second sponsors -->
                                    <div class="sponsorsSecond"> <img class="img-fluid" src= " <?php echo URLROOT; ?>/images/placeholder.jpg" alt="stars" width="100%" height="auto"></div>
                                    <div class="sponsorsSecond"> <img class="img-fluid" src= " <?php echo URLROOT; ?>/images/placeholder.jpg" alt="stars" width="100%" height="auto"></div>
                                    <div class="sponsorsSecond"> <img class="img-fluid" src= " <?php echo URLROOT; ?>/images/placeholder.jpg" alt="stars" width="100%" height="auto"></div>
                                    <div class="sponsorsSecond"> <img class="img-fluid" src= " <?php echo URLROOT; ?>/images/placeholder.jpg" alt="stars" width="100%" height="auto"></div>
                                </div> <!-- flex container -->
                            </div>
                            <div class="col-1" id="sponsors2">
                                <i class="text-secondary fa fa-arrow-right fa-2x" aria-hidden="true"></i>
                            </div>
                        </div>  <!-- flex all -->
                        
                    </div>
                </div>
             </div>
        </div> 
    </div>

        <!--- START ROW 4-NEWSLETTER---->

    <div class="row">
        <div class="col-md-12" id="newsletter">
       
            <div class="row">
                <div class="col-md-6 offset-md-3 my-5"  >
                <p id="titlenewsletter">Εγγραφείτε στο Newsletter μας!</p>
                    <form id="subscribeForm" action="<?php echo URLROOT; ?>/pages/index" method="post">
                    <div class="form-row">
                            <div class="form-group col-lg-6 col-md-12 col-sm-6 px-3">
                                <label for="name">Όνομα</label>
                                <span class="text-center text-danger font-italic nameLetterErr"></span>
                                <input type="text"
                                    class="namenewsLetter form-control"
                                    id="name"
                                    name="first_name"
                                >
                            </div>
                            <div class="form-group col-lg-6 col-md-12  col-sm-6  px-3">
                                <label for="last_name">Επώνυμο</label>
                                <span class="text-center text-danger font-italic SurnameLetterErr"></span>
                                <input type="text"
                                    name="last_name"
                                    class="lastNamenewsLetter form-control"
                                    id="last_name"
                                >
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="form-group col-lg-6 offset-lg-3 col-md-12 offset-md-0  col-sm-6 offset-sm-3  px-3">
                                <label for="email">Email</label>
                                <span class="text-center text-danger font-italic EmailLetterErr"></span>
                                <input type="email"
                                    name="email"
                                    class="EmailnewsLetter form-control"
                                    id="email"
                                >
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-lg-4 offset-lg-4 col-md-12 offset-md-0 col-sm-6 offset-sm-3 mb-5 mt-4 px-4">
                                <button type="submit" id="btnnewsletter">Εγγραφή</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

</div> <!-- end conatiner fuild-->
<script type="text/javascript">

debounce = function(func, wait, immediate) {
    var timeout;
    return function() {
        var context = this, args = arguments;
        var later = function() {
            timeout = null;
            if (!immediate) func.apply(context, args);
        };
        var callNow = immediate && !timeout;
        clearTimeout(timeout);
        timeout = setTimeout(later, wait);
        if (callNow) func.apply(context, args);
    };
};


(function(){
	var $target = $('.anime'),
			animationClass = 'anime-start',
			offset = $(window).height() * 3/4;

	function animeScroll() {
		var documentTop = $(document).scrollTop();

		$target.each(function(){
			var itemTop = $(this).offset().top;
			if (documentTop > itemTop - offset) {
				$(this).addClass(animationClass);
			} else {
				$(this).removeClass(animationClass);
			}
		});
	}

	animeScroll();

	$(document).scroll(debounce(function(){
		animeScroll();
	}, 200));
})();



(function(){
	var $target = $('.anime-left'),
			animationClass = 'anime-end',
			offset = $(window).height() * 3/4;

	function animeScroll() {
		var documentTop = $(document).scrollTop();

		$target.each(function(){
			var itemTop = $(this).offset().top;
			if (documentTop > itemTop - offset) {
				$(this).addClass(animationClass);
			} else {
				$(this).removeClass(animationClass);
			}
		});
	}

	animeScroll();

	$(document).scroll(debounce(function(){
		animeScroll();
	}, 200));
})();


</script>



<?php require  APPROOT . '/views/inc/footer.php'?>

