<?php require  APPROOT . '/views/inc/header.php'?>
  

    <div class="row">
        <div class="col-md-12" id="imgabout">

        </div>
    </div>
</div>

<div class="container">
    <div class="row">
        <div class="col-md-5 mt-5">
            <p class="basictitle" id="gymstitle" >ΠΟΙΟΙ ΕΙΜΑΣΤΕ</p>
        </div>
    </div>
   <div class="row">
       
      <!-- <div class="aboutscroll hide">-->
        <div class="col-md-12 mb-5" id="bigabouttext">
            <p> 
                Είμαστε ο Γιώργος, η Θεοδώρα, ο Πάνος και πολλοί ακόμα. Έχουμε πολύ διαφορετικές ιστορίες αλλά κοινή αποστολή. Αυτή έχει σημασία. Τα υπόλοιπα είναι ιστορία.
                <br>
                <br>
                <h4 style="color:#169b99;"><b>Αποστολή μας είναι να πετυχαίνεις τους fitness στόχους σου.</b></h4>
                <br>
                <h6>Ξέρουμε τους λόγους που δεν τα καταφέρνεις γιατί έχουμε αποτύχει και εμείς.</h6> 
                Ξέρουμε πως το πάπλωμα είναι βαρύ το χειμώνα, η ζέστη εξαντλητική το καλοκαίρι και η άνοιξη κρατάει με το ζόρι 10 μέρες. Πως είσαι όλη μέρα στο πόδι και πως ο 
                αποχωρισμός του καναπέ είναι δύσκολος.Πως είναι ευκολότερο το continue watching από μια ώρα τρέξιμο και πως πίτσες και σουβλάκια είναι ένα κλικ μακριά από το 
                τραπεζάκι του σαλονιού σου.</p>
                <br>
                <h6>Ξέρουμε πως μπορείς να πετύχεις του στόχους σου γιατί τα έχουμε καταφέρει και εμείς.</h6> 
                Πως απλά χρειάζεσαι ένα χέρι να σε τραβήξει από τον καναπέ, κάποιον να σου πει πως υπάρχουν υγιεινές και λαχταριστές συνταγές (ναι, ναι, και τα δύο ταυτόχρονα) και 
                κάπου να βρεις τις καλύτερες δραστηριότητες τόσο για τα απογεύματά σου όσο και για τα ΣουΚου.
            </p>
        </div>
        <!--</div>-->
    </div>
</div>  

<div class="team">
    <div class="container">
        <div class="row">
            <div class="col-md-5 mt-5">
                <p class="basictitle" id="gymstitle" >ΟΜΑΔΑ</p>
            </div>
        </div>  
        <div class="row">
            <div class="col-md-3 offset-md-1 col-10 offset-1 mb-5" id="teamimg">
                <img src= " <?php echo URLROOT; ?>/images/aboutus/tg.jpg" width="250" alt="teamimg">
                <p><b>Theodora G.</b></p>
                <p>Web Designer</p>
            </div>    
            <div class="col-md-3 offset-md-1 col-10 offset-1" id="teamimg">
                <img src= " <?php echo URLROOT; ?>/images/aboutus/gg.jpg" width="250" alt="teamimg">
                <p><b>Georgos G.</p></b>
                <p>Web Developer</p>
            </div>    
            <div class="col-md-3 offset-md-1 col-10 offset-1" id="teamimg">
                <img src= " <?php echo URLROOT; ?>/images/aboutus/pp.jpg" width="250" alt="teamimg">
                <h4 style><b>Panagiotis P.</h4></b>
                <p>Web Developer</p>
            </div>
        </div>
    </div>
</div>
<!--
<script type="text/javascript">
    (function(){
       var  aboutEl= $('div.aboutscroll'),
            aboutoffset= 200,
            documentEl=$(document);
        
        documentEl.on("scroll", function(){
            if (documentEl.scrollTop() > aboutoffset && aboutEl.hasClass('hide')) aboutEl.removeClass('hide');
            
        });
        })();
    </script>-->

<?php require  APPROOT . '/views/inc/footer.php'?>

