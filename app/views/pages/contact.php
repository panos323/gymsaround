<?php require  APPROOT . '/views/inc/header.php'?>

<div class="row">
    <div class="col-md-12" id="imgcontact">
        <div class="col-8 offset-2" id="contactpage">
            <p id="contactpagetitle" >Επικοινωνία</p>
            <p id="contactdescription" >Επικοινωνήστε μαζί μας για ότι χρειάστείτε!</p>
        </div>
    </div>
</div>

<div class="contactform"></div>
    <div class="row">
        <!--register-->
        <div class="col-lg-6 col-md-8 mx-auto">
            <div class="card card-body " id="cardBodyReg">
                <?php flash('email_success'); ?>
               
                <form id="contactForm" action="<?php echo URLROOT; ?>/pages/contact" method="post">
                    <div class="form-row mt-3">
                        <div class="form-group col-sm-6">
                            <input type="text"
                                   name="first_name"
                                   class="form-control form-control-lg"
                                   placeholder="'Ονομα"
                            >
                        </div>
                        <div class="form-group col-sm-6">
                            <input type="text"
                                   name="last_name"
                                   class="form-control form-control-lg"
                                   placeholder="Επίθετο"
                            >
                        </div>
                    </div><!--form-row-->
                    <div class="form-group mt-3">
                        <input type="email"
                               name="email"
                               class="form-control form-control-lg"
                               placeholder="E-mail"
                         >
                    </div>
                    <div class="form-group mt-3">
                        <input type="text"
                               name="subject"
                               class="form-control form-control-lg"
                               placeholder="Θέμα"
                        >
                    </div>
                    <div class="form-group">
                        <label for="email_text"></label>
                        <textarea name="email_text" class="form-control" id="email_text" cols="30" rows="10" placeholder="Στείλτε μας το μήνυμά σας"></textarea>
                    </div>
                    <div class="row mt-4">
                        <div class="col-md-4 offset-md-4 col-sm-10 offset-sm-1 btn-group  mb-4" role="group" aria-label="Second group">
                            <button type="submit"  value="Register" class="btn btn-success" id="btncontactform">Αποστολή</button>
                        </div>
                    </div>
                    <span class="invalid-feedback"><?php echo $data['register_error']; ?></span>
                </form>
            </div>
        </div>
        <!--end register form-->
    </div>
    
<?php require  APPROOT . '/views/inc/footer.php'?>