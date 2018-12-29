<?php require  APPROOT . '/views/inc/header.php'?>
    <div class="row">
        <div class="col-md-6 mx-auto">
            <div class="card card-body bg-light mt-5">
                <?php flash('register_success'); ?>
                <h2>Login</h2>
                <form  action="<?php echo URLROOT; ?>/users/login" method="post">
                    <div class="form-group">
                        <label for="login_credential">Username/Email: <sup>*</sup></label>
                        <input type="text"
                               name="login_credential"
                               class="form-control form-control-lg <?php echo (!empty($data['login_credential_error'])) ? 'is-invalid' : ''; ?>"
                               value="<?php echo $data['login_credential']; ?>">
                        <span class="invalid-feedback"><?php echo $data['login_credential_error']; ?></span>
                    </div>
                    <div class="form-group">
                        <label for="last_name">Password: <sup>*</sup></label>
                        <input type="password"
                               name="password"
                               class="form-control form-control-lg <?php echo (!empty($data['pass_error'])) ? 'is-invalid' : ''; ?>"
                               value="<?php echo $data['password']; ?>">
                        <span class="invalid-feedback"><?php echo $data['pass_error']; ?></span>
                    </div>
                    <div class="row">
                        <div class="col">
                            <input type="submit" value="Login" class="btn btn-success btn-block">
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
<?php require  APPROOT . '/views/inc/footer.php'?>