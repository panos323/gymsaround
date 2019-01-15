<?php require  APPROOT . '/views/inc/header.php'?>
    <div class="row">
        <div class="col-lg-5 col-md-3 gym-title">
            <h1>GymAround</h1>
        </div>

        <!--register-->
        <div class="col-lg-6 col-md-8 mx-auto mt-5">
            <div class="card card-body mt-5" id="cardBodyReg">
                <h2>Register</h2>
                <form id="registerForm" action="<?php echo URLROOT; ?>/owners/register" method="post">

                    <div class="form-row">
                        <div class="form-group col-sm-6">
                        <input type="text"
                               name="first_name"
                               class="form-control form-control-lg <?php echo (!empty($data['fname_error'])) ? 'is-invalid' : ''; ?>"
                               placeholder="Name"
                               value="<?php echo $data['first_name']; ?>">
                        <span class="invalid-feedback"><?php echo $data['fname_error']; ?></span>
                        </div>
                        <div class="form-group col-sm-6">
                            <input type="text"
                                name="last_name"
                                class="form-control form-control-lg <?php echo (!empty($data['lname_error'])) ? 'is-invalid' : ''; ?>"
                                placeholder="Last Name"
                                value="<?php echo $data['last_name']; ?>">
                            <span class="invalid-feedback"><?php echo $data['lname_error']; ?></span>
                        </div>
                    </div><!--form-row-->

                    <div class="form-group">
                        <input type="text"
                               name="username"
                               class="form-control form-control-lg <?php echo (!empty($data['username_error'])) ? 'is-invalid' : ''; ?>"
                               placeholder="Username"
                               value="<?php echo $data['username']; ?>">
                        <span class="invalid-feedback"><?php echo $data['username_error']; ?></span>
                    </div>
                    <div class="form-group">
                        <input type="email"
                               name="email"
                               class="form-control form-control-lg <?php echo (!empty($data['email_error'])) ? 'is-invalid' : ''; ?>"
                               placeholder="E-mail"
                               value="<?php echo $data['email']; ?>">
                        <span class="invalid-feedback"><?php echo $data['email_error']; ?></span>
                    </div>

                    <div class="form-row">
                        <div class="form-group col-sm-6" id="passwordDivReg">
                            <input type="password"
                                name="password"
                                class="form-control form-control-lg <?php echo (!empty($data['pass_error'])) ? 'is-invalid' : ''; ?>"
                                placeholder="Password"
                                value="<?php echo $data['password']; ?>">
                            <span class="invalid-feedback"><?php echo $data['pass_error']; ?></span>
                            <i class="fa fa-eye glyphicon" aria-hidden="true"></i>
                        </div>
                        <div class="form-group col-sm-6">
                            <input type="password"
                                name="confirm_password"
                                class="form-control form-control-lg <?php echo (!empty($data['confirm_pass_error'])) ? 'is-invalid' : ''; ?>"
                                placeholder="Confirm Password"
                                value="<?php echo $data['confirm_password']; ?>">
                            <span class="invalid-feedback"><?php echo $data['confirm_pass_error']; ?></span>
                        </div>
                        <div class="form-group col-sm-12">
                            <input type="number"
                                   name="phone"
                                   class="form-control form-control-lg <?php echo (!empty($data['phone_error'])) ? 'is-invalid' : ''; ?>"
                                   placeholder="Phone number"
                                   value="<?php echo $data['phone']; ?>">
                            <span class="invalid-feedback"><?php echo $data['phone_error']; ?></span>
                        </div>
                    </div><!--form-row-->

                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" value="" id="defaultCheck2">
                        <label class="form-check-label" for="defaultCheck2">
                            Terms & Conditions
                        </label>
                    </div>
                    <div class="row mt-4">
                        <div class="btn-group mr-4 mb-3" role="group" aria-label="Second group">
                            <button type="submit"  value="Register" class="btn btn-success">Register</button>
                        </div>
                    </div>
                    <span class="invalid-feedback"><?php echo $data['register_error']; ?></span>
                    <div class="col mt-3">
                        <a href="<?php echo URLROOT; ?>/owners/login">Login
                            <i class="fa fa-arrow-right" aria-hidden="true"></i>
                        </a>
                    </div>
                </form>
            </div>
        </div>
        <!--end register form-->
    </div>
<?php require  APPROOT . '/views/inc/footer.php'?>