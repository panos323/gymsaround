<?php require  APPROOT . '/views/inc/header.php'?>



<div class="container-fuild" >
    <div class="col-12 fimage">
        
            <div class="row">
                <div class="col-5 offset-1">
                     <p id="bigtitle">ΒΡΕΣ ΤΟ ΓΥΜΝΑΣΤΗΡΙΟΥ ΠΟΥ ΣΟΥ ΤΑΙΡΙΑΖΕΙ</p>
                        <div class="row">
                            <div class="col-4 offset-2">
                            <button class="btnmember"><a href="#">Γίνε Μέλος</a></button>
                            </div>
                        </div>
                     
                </div>
             

              <div class="col-4 offset-2">
                <div id="boxgrey">
                 <div class="row">
                     <div class="col-4 offset-4">
                        <p id="title">Επέλεξε</p>
                     </div>
                 </div>
                
            
              
               
                    <div class="row">
                        <div class="col-7 offset-2" id="slc">
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
                     <div class="col-7 offset-3">
                        <button class="bsearch"><a href="#">Αναζήτηση</a></button>
                     </div>
                 </div>


                </div>
              </div>
        </div>
    </div>

<!--- END ROW 1---->

<!--- START ROW 2 - GYM ---->
<div class="bestgym">
        <div class="container">
            <div class="row">
               <div class="col-4">
                   <p class="rowtitle" id="gymtitle">ΔΗΜΟΦΙΛΗ</p>
               </div>
            </div>
            <div class="row">
               <div class="col-3 offset-1">
                   <p id="gymname">Workout Hall Crossfit</p>
                   <img src="../images/stars.png" alt="stars">
                   <p>Ρόδων 6 & Κυβέλης 17456, Άλιμος</p>
                   <p>Crosfii, Boxing, KingBoxing,Climbing</p>
               </div>
               <div class="col-6 offset-2" >
                    <img src="../images/bestgym1.jpg" alt="stars" width="550" height="330">
                    <button class="btnprobolh"><a href="#">Αναζήτηση</a></button>
               </div>
            </div>
            <div class="row">
                <div class="col-1 offset-8">
                     <img src="../images/back.png" alt="stars" width="25" height="30">
                </div>
                <div class="col-1 ">
                     <p>1/3</p>
                </div>
                <div class="col-1 ">
                     <img src="../images/front.png" alt="stars" width="25" height="30">
                </div>
            </div>
          

        </div>
</div>

</div>

<h1><?php echo $data['title'] ?></h1>
<p>This is our website for Creative Project of SAE Athens.</p>




<?php require  APPROOT . '/views/inc/footer.php'?>


