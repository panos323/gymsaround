<?php require  APPROOT . '/views/inc/header.php'?>


<div class="row">
    <div class="col-md-12" id="imgblog">
        <div class="col-8 offset-2" id="blogpage">
            <p id="blogpagetitle" >Blog</p>
            <p id="blogdescription" > Μάθε τα πάντα για την γυμναστική και τη σωστή διατροφή!</p>
        </div>
    </div>
</div>
<div class="container">
    <?php foreach ($data as $article) : ?>
        <div class="row">
            <div class="col-md-6">
               <a href="<?php echo URLROOT.'/pages/article/'.$article->post_id;?>"><img src= " <?php echo URLROOT;?>/images/blog/imgblog1.jpg" style="margin-bottom:15px;" width="100%" alt="stars"/></a>
            </div>
            <div class="col-md-6 blogbox">
            <a href="<?php echo URLROOT.'/pages/article/'.$article->post_id;?>"> <h4><?php echo $article->post_title; ?></h4></a>
                <br>
                <p class="maxLength"><?php echo $article->post_description; ?></p>
                </div>
        </div>
    <?php endforeach; ?>

    <div class="row">
        <div class="col-md-6 ">
             <a href="#"><img src= " <?php echo URLROOT;?>/images/blog/imgblog5.jpg"  style="margin-bottom:15px;" width="100%" alt="stars"/></a>
        </div>   
        <div class="col-md-6 blogbox">
            <a href="#"> <h4>10 λόγοι για να ξεκινήσετε το τρέξιμο σήμερα</h4></a>
            <br>
            <p>Λάβετε θέσεις, έτοιμοι, πάμε! Αν το γυμναστήριο, σας πνίγει, σας προκαλεί πλήξη και σας βγάζει έξω από το μηνιαίο σας budget,
                μη βιαστείτε να κρεμάσετε τα αθλητικά σας παπούτσια. Σκεφτείτε μόνο, ότι η σωματική και ψυχική σας υγεία βρίσκεται μερικούς δρασκελισμούς μακριά! </p>
            </div>
    </div>

    <div class="row">
        <div class="col-md-6">
            <a href="#"> <img src= " <?php echo URLROOT;?>/images/blog/imgblog2.jpeg" style="margin-bottom:15px;" width="100%" alt="stars"/></a>
        </div>   
        <div class="col-md-6 blogbox">
            <a href="#"> <h4>Πορτοκάλια και λεμόνια μειώνουν τις συνέπειες της παχυσαρκίας</h4></a>
            <br>
            <p>Tα εσπεριδοειδή δεν είναι πλούσια μόνο σε βιταμίνη C αλλά και σε τρεις άλλες ουσίες οι οποίες μπορεί να
                εμποδίζουν την ανάπτυξη των «νοσημάτων της παχυσαρκίας», σύμφωνα με μία νέα μελέτη.</p>
        </div>  
    </div>

    <nav aria-label="Page navigation example">
        <ul class="pagination justify-content-center">
            <li class="page-item disabled">
            <a class="page-link" href="#" tabindex="-1"> < </a>
            </li>
            <li class="page-item"><a class="page-link" href="#">1</a></li>
            <li class="page-item"><a class="page-link" href="#">2</a></li>
            <li class="page-item"><a class="page-link" href="#">3</a></li>
            <li class="page-item">
            <a class="page-link" href="#"> > </a>
            </li>
        </ul>
    </nav>



</div>

<?php require  APPROOT . '/views/inc/footer.php'?>