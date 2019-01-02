<?php require  APPROOT . '/views/inc/header.php'?>

    <div class="row">
        <div class="col-md-10 mx-auto">
            <img class="img-fluid mb-5" src="../images/placeholder.jpg" alt="placeholder" style="width:100px; height:100px;">
            <i class="fa fa-id-card  float-right fa-3x" aria-hidden="true"></i>
        </div>
    </div>

    <div class="row mb-5">

        <div class="col-lg-6 col-md-4 mt-5">
            <img class="img-fluid" src="../images/placeholder.jpg" alt="placeholder">
        </div>

        <!--register-->
        <div class="col-lg-5 col-md-7 mx-auto mt-5">
            <div class="card card-body mt-5" id="cardBodyReg">
                <h2>Register</h2>
                <form id="registerForm" action="<?php echo URLROOT; ?>/users/register" method="post">

                    <div class="form-row">
                        <!--<label for="first_name">First Name: <sup>*</sup></label>-->
                        <div class="form-group col-sm-6">
                        <input type="text"
                               name="first_name"
                               class="form-control form-control-lg <?php echo (!empty($data['fname_error'])) ? 'is-invalid' : ''; ?>"
                               placeholder="Name"
                               value="<?php echo $data['first_name']; ?>">
                        <span class="invalid-feedback"><?php echo $data['fname_error']; ?></span>
                        </div>
                        <div class="form-group col-sm-6">
                            <!--<label for="last_name">Last Name: <sup>*</sup></label>-->
                            <input type="text"
                                name="last_name"
                                class="form-control form-control-lg <?php echo (!empty($data['lname_error'])) ? 'is-invalid' : ''; ?>"
                                placeholder="Last Name"
                                value="<?php echo $data['last_name']; ?>">
                            <span class="invalid-feedback"><?php echo $data['lname_error']; ?></span>
                        </div>
                    </div><!--form-row-->

                    <div class="form-group">
                         <!--<label for="username">Username: <sup>*</sup></label>-->
                        <input type="text"
                               name="username"
                               class="form-control form-control-lg <?php echo (!empty($data['username_error'])) ? 'is-invalid' : ''; ?>"
                               placeholder="Username"
                               value="<?php echo $data['username']; ?>">
                        <span class="invalid-feedback"><?php echo $data['username_error']; ?></span>
                    </div>
                    <div class="form-group">
                         <!--<label for="email">Email <sup>*</sup></label>-->
                        <input type="email"
                               name="email"
                               class="form-control form-control-lg <?php echo (!empty($data['email_error'])) ? 'is-invalid' : ''; ?>"
                               placeholder="E-mail"
                               value="<?php echo $data['email']; ?>">
                        <span class="invalid-feedback"><?php echo $data['email_error']; ?></span>
                    </div>

                    <div class="form-row">
                        <div class="form-group col-sm-6" id="passwordDivReg">
                            <!--<label for="last_name">Password: <sup>*</sup></label>-->
                            <input type="password"
                                name="password"
                                class="form-control form-control-lg <?php echo (!empty($data['pass_error'])) ? 'is-invalid' : ''; ?>"
                                placeholder="Password"
                                value="<?php echo $data['password']; ?>">
                            <span class="invalid-feedback"><?php echo $data['pass_error']; ?></span>
                            <i class="fa fa-eye glyphicon" aria-hidden="true"></i>
                        </div>
                        <div class="form-group col-sm-6">
                            <!--<label for="confirm_password">Confirm Password: <sup>*</sup></label>-->
                            <input type="password"
                                name="confirm_password"
                                class="form-control form-control-lg <?php echo (!empty($data['confirm_pass_error'])) ? 'is-invalid' : ''; ?>"
                                placeholder="Confirm Password"
                                value="<?php echo $data['confirm_password']; ?>">
                            <span class="invalid-feedback"><?php echo $data['confirm_pass_error']; ?></span>
                        </div>
                    </div><!--form-row-->

                    <div class="form-group">
                        <input type="text"
                               name="address"
                               class="form-control form-control-lg" 
                               placeholder="Address">
                    </div>
                    <div class="form-check mb-2">
                        <input class="form-check-input" type="checkbox" value="" id="defaultCheck1">
                        <label class="form-check-label" for="defaultCheck1">
                            Newsletter
                        </label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" value="" id="defaultCheck2">
                        <label class="form-check-label" for="defaultCheck2">
                            Terms & Conditions
                        </label>
                    </div>
                    <div class="row mt-4">
                        <!-- <div class="col text-center">
                            <input type="submit" value="Register" class="btn btn-success mt-4 mb-4" style="width:150px;"">
                        </div> -->
                        <div class="btn-group mr-4 mb-3" role="group" aria-label="Second group">
                            <button type="submit"  value="Register" class="btn btn-success">Register</button>
                        </div>
                        <span class="mr-4 mb-3" style="line-height:50px;">OR</span>
                        <div class="btn-group mb-3" role="group" aria-label="Third group">
                        <button type="submit"  value="fb" class="btn btn-outline-primary">
                            <i class="fa fa-facebook-official fa-lg" aria-hidden="true"></i>
                            &nbsp; Register with Facebook</button>
                        </div>
                    </div>
                    <span class="invalid-feedback"><?php echo $data['register_error']; ?></span>
                    <div class="col mt-3">
                        <a href="">Login
                            <i class="fa fa-arrow-right" aria-hidden="true"></i>
                        </a>
                    </div>
                </form>
            </div>
        </div>
        <!--end register form-->
    </div>

    <div class="row text-center">
        <div class="col-md-2 mx-auto col-sm-6 mb-4">
            <div class="pl-5">
                <img class="img-fluid mb-5" src="../images/placeholder.jpg" alt="placeholder" style="width:100px; height:100px;">
            </div>
        </div>
        <div class="col-md-3 col-sm-6 mb-4">
            <h3 class="mb-3">A Subtitle</h3>
            <p><a href="">Home</a></p>
            <p><a href="">Find your gym</a></p>
            <p><a href="">Blog</a></p>
            <p><a href="">About us</a></p>
            <p><a href="">Contact</a></p>
        </div>
        <div class="col-md-3 col-sm-6 mb-4">
            <h3 class="mb-3">A Subtitle</h3>
            <p><a href="">Οροι Χρήσης</a></p>
            <p><a href="">Πολιτική Απορρήτου</a></p>
            <p><a href="">Πολιτική Cookies</a></p>
            <p><a href="">FAQ</a></p>
            <p><a href="">Αλλαγή γλώσσας</a></p>
        </div>
        <div class="col-md-3 col-sm-6 mb-4">
            <h3 class="mb-4">A Subtitle</h3>
            <button class="btn btn-outline-success">
                Γίνε συνεργάτης
            </button>
        </div>
    </div><!--row-->

    <div class="row">
        <div class="col-md-12 text-center mt-5">
            <h4>gymaround 2019 <span><i class="fa fa-copyright fa-lg" aria-hidden="true"></i></span></h4>
        </div>
    </div><!--row-->

<?php require  APPROOT . '/views/inc/footer.php'?>