<?php require  APPROOT . '/views/inc/header.php'?>
    <div class="row">
        <div class="col-lg-5 col-md-3 gym-title">
            <h1>Επικοινωνία</h1>
        </div>

        <!--register-->
        <div class="col-lg-6 col-md-8 mx-auto mt-5">
            <div class="card card-body mt-5" id="cardBodyReg">
                <h2>Επικοινωνήστε μαζί μας</h2>
                <form id="contactForm" action="<?php echo URLROOT; ?>/pages/contact" method="post">
                    <div class="form-row mt-3">
                        <div class="form-group col-sm-6">
                            <input type="text"
                                   name="first_name"
                                   class="form-control form-control-lg"
                                   placeholder="Name"
                            >
                        </div>
                        <div class="form-group col-sm-6">
                            <input type="text"
                                   name="last_name"
                                   class="form-control form-control-lg"
                                   placeholder="Last Name"
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
                        <label for="email_text"></label>
                        <textarea name="email_text" class="form-control" id="email_text" cols="30" rows="10" placeholder="Στείλτε μας το μήνυμά σας"></textarea>
                    </div>
                    <div class="row mt-4">
                        <div class="btn-group mr-4 mb-3" role="group" aria-label="Second group">
                            <button type="submit"  value="Register" class="btn btn-success">Αποστολή</button>
                        </div>
                    </div>
                    <span class="invalid-feedback"><?php echo $data['register_error']; ?></span>
                </form>
            </div>
        </div>
        <!--end register form-->
    </div>
<?php require  APPROOT . '/views/inc/footer.php'?>