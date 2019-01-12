<?php require  APPROOT . '/views/inc/header.php'?>
<div class="row profile">
    <div class="col-md-2 sidemenu">
        <div class="list-group">
            <a href="<?php echo URLROOT; ?>/owners/profile/account" class="list-group-item <?php echo ($data['tab'] === 'account') ? 'active_profile_tab' : ''; ?>">Λογαριασμός</a>
            <a href="<?php echo URLROOT; ?>/owners/profile/my_gym" class="list-group-item <?php echo ($data['tab'] === 'my_gym') ? 'active_profile_tab' : ''; ?>">Γυμναστήριο</a>
            <a href="<?php echo URLROOT; ?>/owners/profile/my_trainers" class="list-group-item <?php echo ($data['tab'] === 'my_trainers') ? 'active_profile_tab' : ''; ?>">Γυμναστές</a>
        </div>
    </div>
    <div class="col-md-10">
        <div class="row main_profile">

            <!-- This is the display for Owners info -->
            <?php if($data['tab'] === 'account')  : ?>
            <div class="col-md-5 profile_boxes">
                <h4>Αλλαγή Username</h4>
                <form id="updateUsernameForm" action="<?php echo URLROOT; ?>/owners/updateUsername" method="post">
                    <div class="form-group">
                        <input type="text"
                               name="username"
                               class="form-control form-control-lg <?php echo (isset($data['username_error']) && !empty($data['username_error'])) ? 'is-invalid' : ''; ?>"
                               value="<?php echo $_SESSION['username']; ?>">
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
                <div class="col-md-5 offset-1 profile_boxes">
                    <h4>Αλλαγή E-mail</h4>
                    <form id="updateUsernameForm" action="<?php echo URLROOT; ?>/owners/updateEmail" method="post">
                        <div class="form-group">
                            <input type="text"
                                   name="email"
                                   class="form-control form-control-lg <?php echo (isset($data['email_error']) && !empty($data['email_error'])) ? 'is-invalid' : ''; ?>"
                                   value="<?php echo $_SESSION['email']; ?>">
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

            <!-- This is the display for gym details upload -->
            <?php elseif ($data['tab'] === 'my_gym') : ?>
            <div class="col-md-12 profile_boxes">
                <h4>Το γυμναστήριό μου</h4>
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