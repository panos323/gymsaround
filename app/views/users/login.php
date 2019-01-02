<?php require  APPROOT . '/views/inc/header.php'?>

    <div class="row">
        <div class="col-md-10 mx-auto">
            <img class="img-fluid mb-5" src="../images/placeholder.jpg" alt="placeholder" style="width:100px; height:100px;">
            <i class="fa fa-user-plus float-right fa-3x	" aria-hidden="true"></i>
        </div>
    </div>

    <div class="row mb-5">

        <div class="col-lg-6 col-md-4 mt-5">
            <img class="img-fluid" src="../images/placeholder.jpg" alt="placeholder">
        </div>

        <!--start login form-->
        <div class="col-lg-5 col-md-6 mx-auto mt-5">
            <div class="card card-body" id="cardBodyForm">
                <?php flash('register_success'); ?>
                <h2 class="mb-4">Login</h2>
                <form id="loginForm" action="<?php echo URLROOT; ?>/users/login" method="post">
                    <div class="form-group">
                        <!--<label for="login_credential">Username/Email: <sup>*</sup></label>-->
                        <input type="text"
                               name="login_credential"
                               class="form-control form-control-lg <?php echo (!empty($data['login_credential_error'])) ? 'is-invalid' : ''; ?>"
                               placeholder="username or email"
                               value="<?php echo $data['login_credential']; ?>">
                        <span class="invalid-feedback"><?php echo $data['login_credential_error']; ?></span>
                    </div>
                    <div class="form-group" id="passwordDiv">
                        <!--<label for="last_name">Password: <sup>*</sup></label>-->
                       
                        <input type="password"
                               name="password"
                               class=" form-control form-control-lg <?php echo (!empty($data['pass_error'])) ? 'is-invalid' : ''; ?>"
                               placeholder="password"
                               value="<?php echo $data['password']; ?>">
                        <span class="invalid-feedback"><?php echo $data['pass_error']; ?></span>
                        <i class="fa fa-eye glyphicon" aria-hidden="true"></i>
                    </div>
                    <div class="row">
                        <div class="col text-center">
                            <input type="submit" value="Login" class="btn btn-success mt-3 mb-4" style="width:150px;">
                        </div>
                    </div>
                    <div class="col text-center">
                        <a href="">Forgot password?
                            <i class="fa fa-arrow-right" aria-hidden="true"></i>
                        </a>
                    </div>
                </form>
            </div>
        </div>
        <!--end login form-->
    </div><!--row-->
    
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