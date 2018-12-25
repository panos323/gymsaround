
<?php require  APPROOT . '\views\inc\header.php'?>

    <div class="row">
        <div class="col-md-6 mx-auto">
            <div class="card card-body bg-light mt-5">
                <h2>Login</h2>
                <form  action="<?php echo URLROOT; ?>/users/login" method="post">
                    
                    <div class="form-group">
                        <label for="username">Username/Email: <sup>*</sup></label>
                        <input type="text"
                               name="username"
                               class="form-control form-control-lg <?php echo (!empty($data['empty_error'])) ? 'is-invalid' : ''; ?> 
                               form-control-lg <?php echo $data['wrong_cred'] ? 'is-invalid' : ''; ?>"
                               value="<?php echo $data['username']; ?>">
                        <span class="invalid-feedback"><?php echo $data['empty_error']; ?></span>
                        <span class="invalid-feedback"><?php echo $data['wrong_cred']; ?></span>
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

<?php require  APPROOT . '\views\inc\footer.php'?>