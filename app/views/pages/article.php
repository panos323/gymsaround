<?php require  APPROOT . '/views/inc/header.php'?>


<div class="row">
    <div class="col-md-12" id="imgblog">
        <div class="col-8 offset-2" id="blogpage">
            <p id="blogpagetitle" >Blog</p>
            <p id="blogdescription" > <?php echo $data->post_title; ?></p>
    </div>
</div>
</div>
<div class="container">

    <div class="row">
        <div class="col-md-12">
            <img src= " <?php echo URLROOT;?>/images/blog/imgblog1.jpg" style="margin-bottom:15px;" width="100%" alt="stars"/>
            <div class="row">
                <div class="col-md-1 offset-md-9">
                <img style="border-radius:50%;"class="mr-3"  src= " <?php echo URLROOT; ?>/images/blog/user.jpg" width="60" alt="Generic placeholder image">
                </div>
                <div class="col-md-2">
                    <p style="font-size:15px;color:#2c2b2b;margin-top:5px;margin-bottom:5px;"><?php echo $data->user_first_name; ?></p>
                    <p style="font-size:13px;color:#2c2b2b;"><?php echo $data->post_time; ?></p>
                </div>
            </div>
            <div class="articlerow">
               <p><?php echo $data->post_description; ?></p>
            </div>
        </div> 
    </div>
    <div class="row">
        <div class="col-md-4">
            <p style="color:#169b99;font-size:25px;font-family:impact;">02 Σχόλια</p>
        </div>
    </div>

    <div class="media mediacomments">
     <img style="border-radius:50%;" class="mr-3"  src= " <?php echo URLROOT; ?>/images/blog/user1.jpg" width="80" alt="Generic placeholder image">
        <div class="media-body">
            <h5 class="mt-0" style="padding-top:10px;">Μαρία</h5></h5>
            <p>Cras sit amet nibh libero, in gravida nulla. Nulla vel metus scelerisque ante sollicitudin. te fringilla. Donec laciniafaucibus.</p>
            <p id="commentday">24 Ιαν. 2018, 09:10 πμ</p>
        </div>
    </div>

    <div class="media mediacomments">
     <img  style="border-radius:50%;" class="mr-3"  src= " <?php echo URLROOT; ?>/images/blog/user2.jpg" width="80" alt="Generic placeholder image">
         <div class="media-body">
            <h5 class="mt-0" style="padding-top:10px;">Νίκος</h5></h5>
            <p>Cras sit amet nibh libero, in gravida nulla. Nulla vel metus scelerisque ante sollicitudin. te fringilla. Donec laciniafaucibus.</p>
            <p id="commentday">22 Ιαν. 2018, 11:00 πμ</p>
        </div>
    </div>

    <div class="row">
        <div class="col-md-4">
            <p style="color:#169b99;font-size:25px;font-family:impact;">Γράψτε ένα σχόλιο</p>
        </div>
    </div>

    <div class="row">
        <div class="col-md-12">
            <textarea>Σχόλιο</textarea>
        </div>
    </div>

    <div class="row">
        <div class="col-md-3 offset-md-9 col-8 offset-2">
             <button type="submit" class="btn btn-primary" id="btncomment">Αποστολή</button>
        </div>
    </div>



</div>

<?php require  APPROOT . '/views/inc/footer.php'?>