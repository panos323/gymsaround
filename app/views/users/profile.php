<?php require  APPROOT . '/views/inc/header.php'?>

<!-- Should fix functions,form values -->

<div class="row profile">
    <div class="col-md-2 sidemenu">
        <div class="list-group">
            <a href="<?php echo URLROOT; ?>/users/profile/account" class="list-group-item <?php echo ($data['tab'] === 'account') ? 'active_profile_tab' : ''; ?>">Λογαριασμός</a>
            <a href="<?php echo URLROOT; ?>/users/profile/my_gym" class="list-group-item <?php echo ($data['tab'] === 'my_gym') ? 'active_profile_tab' : ''; ?>">Γυμναστήριο</a>
        </div>
    </div>
    <div class="col-md-10">
        <div class="row main_profile">

            <!-- This is the display for Users info -->
            <?php if($data['tab'] === 'account')  : ?>
                <div class="col-md-11 profile_boxes">
                    <h4>Tα στοιχεία μου</h4>
                    <?php flash('update_details_success'); ?>
                    <form id="updateDetailsForm" action="<?php echo URLROOT; ?>/users/updateUser" method="post">
                        <div class="form-row">
                            <div class="form-group col-sm-6">
                                <input type="text"
                                       name="first_name"
                                       class="form-control form-control-lg <?php echo (isset($data['name_error']) && !empty($data['name_error'])) ? 'is-invalid' : ''; ?>"
                                       value="<?php echo $_SESSION['first_name']; ?>">
                                <span class="invalid-feedback"><?php echo isset($data['name_error']) ? $data['name_error'] : ''; ?></span>
                            </div>
                            <div class="form-group col-sm-6">
                                <input type="text"
                                       name="last_name"
                                       class="form-control form-control-lg <?php echo (isset($data['last_name_error']) && !empty($data['last_name_error'])) ? 'is-invalid' : ''; ?>"
                                       placeholder="<?php echo isset($data['last_name']) ? $data['last_name'] : ''; ?>"
                                       value="<?php echo $_SESSION['last_name'] ?>">
                                <span class="invalid-feedback"><?php echo isset($data['last_name_error']) ? $data['last_name_error'] : ''; ?></span>
                            </div>
                        </div>
                        <div class="form-group">
                            <input type="text"
                                   name="address"
                                   class="form-control form-control-lg"
                                   placeholder="<?php echo isset($_SESSION['address']) ? '' : 'Enter your Address number'; ?>"
                                   value="<?php echo isset($_SESSION['phone']) ? $_SESSION['address'] : ''; ?>">
                            <span class="invalid-feedback"><?php echo isset($data['address_error']) ? $data['address_error'] : ''; ?></span>
                        </div>
                        <div class="btn-group ml-3 mb-3" role="group" aria-label="Second group">
                            <button type="submit"  value="Register" class="btn btn-success">Update Details</button>
                        </div>
                        <span class="invalid-feedback"><?php echo isset($data['']) ? $data[''] : ''; ?></span>
                    </form>
                </div>
                <div class="col-md-5 profile_boxes mt-4">
                    <h4>Αλλαγή Username</h4>
                    <?php flash('update_username_success'); ?>
                    <form id="updateUsernameForm" action="<?php echo URLROOT; ?>/users/UpdateUserUsername" method="post">
                        <div class="form-group">
                            <input type="text"
                                   name="disable_username"
                                   class="form-control form-control-lg <?php echo (isset($data['username_error']) && !empty($data['username_error'])) ? 'is-invalid' : ''; ?>"
                                   value="<?php echo $_SESSION['username']; ?>" disabled>
                            <input type="hidden" name="username" value="<?php echo $_SESSION['username']; ?>">
                            <span class="invalid-feedback"><?php echo isset($data['username_error']) ? $data['username_error'] : ''; ?></span>
                        </div>
                        <div class="form-group">
                            <input type="text"
                                   name="new_username"
                                   class="form-control form-control-lg <?php echo (isset($data['new_username_error']) && !empty($data['new_username_error'])) ? 'is-invalid' : ''; ?>"
                                   placeholder="Enter New Username"
                                   value="<?php echo isset($data['new_username']) ? $data['new_username'] : ''; ?>">
                            <span class="invalid-feedback"><?php echo isset($data['new_username_error']) ? $data['new_username_error'] : ''; ?></span>
                        </div>
                        <div class="btn-group ml-3 mb-3" role="group" aria-label="Second group">
                            <button type="submit"  value="Register" class="btn btn-success">Update Username</button>
                        </div>
                        <span class="invalid-feedback"><?php echo isset($data['update_error']) ? $data['update_error'] : ''; ?></span>
                    </form>
                </div>
                <div class="col-md-5 offset-1 profile_boxes mt-4">
                    <h4>Αλλαγή E-mail</h4>
                    <?php flash('update_mail_success'); ?>
                    <form id="updateEmailForm" action="<?php echo URLROOT; ?>/users/UpdateUserEmail" method="post">
                        <div class="form-group">
                            <input type="text"
                                   name="email"
                                   class="form-control form-control-lg <?php echo (isset($data['email_error']) && !empty($data['email_error'])) ? 'is-invalid' : ''; ?>"
                                   value="<?php echo $_SESSION['email']; ?> " disabled>
                            <input type="hidden" name="email" value="<?php echo $_SESSION['email']; ?>">
                            <span class="invalid-feedback"><?php echo isset($data['email_error']) ? $data['email_error'] : ''; ?></span>
                        </div>
                        <div class="form-group">
                            <input type="text"
                                   name="new_email"
                                   class="form-control form-control-lg <?php echo (isset($data['new_email_error']) && !empty($data['new_email_error'])) ? 'is-invalid' : ''; ?>"
                                   placeholder="Enter New E-mail"
                                   value="<?php echo isset($data['new_email']) ? $data['new_email'] : ''; ?>">
                            <span class="invalid-feedback"><?php echo isset($data['new_email_error']) ? $data['new_email_error'] : ''; ?></span>
                        </div>
                        <div class="btn-group ml-3 mb-3" role="group" aria-label="Second group">
                            <button type="submit"  value="Register" class="btn btn-success">Update E-mail</button>
                        </div>
                        <span class="invalid-feedback"><?php echo isset($data['update_error']) ? $data['update_error'] : ''; ?></span>
                    </form>
                </div>
                <div class="col-md-5 profile_boxes mt-4">
                    <h4>Αλλαγή Password</h4>
                    <?php flash('update_password_success'); ?>
                    <form id="updatePasswordForm" action="<?php echo URLROOT; ?>/users/UpdateUserPassword" method="post">
                        <div class="form-group">
                            <input type="password"
                                   name="password"
                                   class="form-control form-control-lg <?php echo (isset($data['password_error']) && !empty($data['password_error'])) ? 'is-invalid' : ''; ?>"
                                   placeholder="Enter current password"
                                   value="<?php echo isset($data['password']) ? $data['password'] : ''; ?>">
                            <span class="invalid-feedback"><?php echo isset($data['password_error']) ? $data['password_error'] : ''; ?></span>
                        </div>
                        <div class="form-group">
                            <input type="password"
                                   name="new_password"
                                   class="form-control form-control-lg <?php echo (isset($data['new_password_error']) && !empty($data['new_password_error'])) ? 'is-invalid' : ''; ?>"
                                   placeholder="Enter New Password"
                                   value="<?php echo isset($data['new_password']) ? $data['new_password'] : ''; ?>">
                            <span class="invalid-feedback"><?php echo isset($data['new_password_error']) ? $data['new_password_error'] : ''; ?></span>
                        </div>
                        <div class="form-group">
                            <input type="password"
                                   name="confirm_password"
                                   class="form-control form-control-lg <?php echo (isset($data['confirm_password_error']) && !empty($data['confirm_password_error'])) ? 'is-invalid' : ''; ?>"
                                   placeholder="Confirm New Password"
                                   value="<?php echo isset($data['confirm_password']) ? $data['confirm_password'] : ''; ?>">
                            <span class="invalid-feedback"><?php echo isset($data['confirm_password_error']) ? $data['confirm_password_error'] : ''; ?></span>
                        </div>
                        <div class="btn-group ml-3 mb-3" role="group" aria-label="Second group">
                            <button type="submit"  value="Register" class="btn btn-success">Update Password</button>
                        </div>
                        <span class="invalid-feedback"><?php echo isset($data['update_error']) ? $data['update_error'] : ''; ?></span>
                    </form>
                </div>

            <!-- This is the display for gym details upload -->
            <?php elseif ($data['tab'] === 'my_gym') : ?>
            <div class="col-md-12 profile_boxes">
                <h4>Το γυμναστήριό μου</h4>
                <form action="<?php echo URLROOT; ?>/users/UserGym" method="post">
                <input type="text" name="gym_id"
                value="<?php echo isset($data['gym_id']) ?? ''; ?>"
                >
                </form>
            </div>

            <!-- This is the display for trainers details upload   -->
            <?php elseif ($data['tab'] === 'my_trainers') : ?>
            <div class="col-md-12 profile_boxes">
                <h4>Οι γυμναστές μου</h4>
            </div>

            <!-- It should should never reach this display but just in case -->
            <?php else: ?>
            <div>
                <h1>Something went wrong.</h1>
            </div>
            <?php endif; ?>
        </div>
    </div>
</div>
<?php require  APPROOT . '/views/inc/footer.php'?>