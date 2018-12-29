<?php require  APPROOT . '/views/inc/header.php'?>
    <div class="row">
        <div class="col-md-6 mx-auto">
            <div class="card card-body bg-light mt-5">
                <h2>Create a User</h2>
                <form action="<?php echo URLROOT; ?>/users/register" method="post">
                    <div class="form-group">
                        <label for="first_name">First Name: <sup>*</sup></label>
                        <input type="text"
                               name="first_name"
                               class="form-control form-control-lg <?php echo (!empty($data['fname_error'])) ? 'is-invalid' : ''; ?>"
                               value="<?php echo $data['first_name']; ?>">
                        <span class="invalid-feedback"><?php echo $data['fname_error']; ?></span>
                    </div>
                    <div class="form-group">
                        <label for="last_name">Last Name: <sup>*</sup></label>
                        <input type="text"
                               name="last_name"
                               class="form-control form-control-lg <?php echo (!empty($data['lname_error'])) ? 'is-invalid' : ''; ?>"
                               value="<?php echo $data['last_name']; ?>">
                        <span class="invalid-feedback"><?php echo $data['lname_error']; ?></span>
                    </div>
                    <div class="form-group">
                        <label for="username">Username: <sup>*</sup></label>
                        <input type="text"
                               name="username"
                               class="form-control form-control-lg <?php echo (!empty($data['username_error'])) ? 'is-invalid' : ''; ?>"
                               value="<?php echo $data['username']; ?>">
                        <span class="invalid-feedback"><?php echo $data['username_error']; ?></span>
                    </div>
                    <div class="form-group">
                        <label for="email">Email <sup>*</sup></label>
                        <input type="email"
                               name="email"
                               class="form-control form-control-lg <?php echo (!empty($data['email_error'])) ? 'is-invalid' : ''; ?>"
                               value="<?php echo $data['email']; ?>">
                        <span class="invalid-feedback"><?php echo $data['email_error']; ?></span>
                    </div>
                    <div class="form-group">
                        <label for="last_name">Password: <sup>*</sup></label>
                        <input type="password"
                               name="password"
                               class="form-control form-control-lg <?php echo (!empty($data['pass_error'])) ? 'is-invalid' : ''; ?>"
                               value="<?php echo $data['password']; ?>">
                        <span class="invalid-feedback"><?php echo $data['pass_error']; ?></span>
                    </div>
                    <div class="form-group">
                        <label for="confirm_password">Confirm Password: <sup>*</sup></label>
                        <input type="password"
                               name="confirm_password"
                               class="form-control form-control-lg <?php echo (!empty($data['confirm_pass_error'])) ? 'is-invalid' : ''; ?>"
                               value="<?php echo $data['confirm_password']; ?>">
                        <span class="invalid-feedback"><?php echo $data['confirm_pass_error']; ?></span>
                    </div>
                    <div class="row">
                        <div class="col">
                            <input type="submit" value="Register" class="btn btn-success btn-block">
                        </div>
                    </div>
                    <span class="invalid-feedback"><?php echo $data['register_error']; ?></span>
                </form>
            </div>
        </div>
    </div>
<?php require  APPROOT . '/views/inc/footer.php'?>