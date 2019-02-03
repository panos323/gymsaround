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
                <div class="col-md-11 profile_boxes">
                    <h4>Tα στοιχεία μου</h4>
                    <?php flash('update_details_success'); ?>
                    <form id="updateDetailsForm" action="<?php echo URLROOT; ?>/owners/updateDetails" method="post">
                        <div class="form-row">
                            <div class="form-group col-sm-6">
                                <input type="text"
                                       name="name"
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
                            <input type="tel"
                                   name="phone"
                                   class="form-control form-control-lg <?php echo (isset($data['phone_error']) && !empty($data['phone_error'])) ? 'is-invalid' : ''; ?>"
                                   placeholder="<?php echo isset($_SESSION['phone']) ? '' : 'Enter your Phone number'; ?>"
                                   value="<?php echo isset($_SESSION['phone']) ? $_SESSION['phone'] : ''; ?>">
                            <span class="invalid-feedback"><?php echo isset($data['phone_error']) ? $data['phone_error'] : ''; ?></span>
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
                    <form id="updateUsernameForm" action="<?php echo URLROOT; ?>/owners/updateUsername" method="post">
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
                    <form id="updateEmailForm" action="<?php echo URLROOT; ?>/owners/updateEmail" method="post">
                        <div class="form-group">
                            <input type="text"
                                   name="disabled_mail"
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
                    <form id="updatePasswordForm" action="<?php echo URLROOT; ?>/owners/updatePassword" method="post">
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
                            <button type="submit" class="btn btn-success">Update Password</button>
                        </div>
                        <span class="invalid-feedback"><?php echo isset($data['update_error']) ? $data['update_error'] : ''; ?></span>
                    </form>
                </div>

            <!-- This is the display for gym details upload -->
            <?php elseif ($data['tab'] === 'my_gym') : ?>
                <?php if(isset($data['no_gym']) && !empty($data['no_gym'])) : ?>
                <div class="col-md-8 offset-2 mt-4">
                    <?php flash('gym_update'); ?>
                    <form id="registerGymForm" action="<?php echo URLROOT; ?>/owners/register_gym" method="post" enctype="multipart/form-data">
                            <div class="form-group">
                                <label for="name">Όνομα</label>
                                <input
                                        name="name"
                                        type="text"
                                        id="name"
                                        class="form-control"
                                        placeholder="name@example.com">
                            </div>
                            <div class="form-group">
                                <label for="location">Τοποθεσία</label>
                                <input
                                        name="location"
                                        type="text"
                                        id="location"
                                        class="form-control"
                                        placeholder="name@example.com">
                            </div>
                            <div class="form-group">
                                <label for="type">Τύπος Γυμναστηρίου</label>
                                <input
                                        name="type"
                                        type="text"
                                        id="type"
                                        class="form-control"
                                        placeholder="name@example.com">
                            </div>
                            <div class="form-group">
                                <label for="year_price">Ετήσια Συνδρομή</label>
                                <input
                                        name="year_price"
                                        type="number"
                                        id="year_price"
                                        class="form-control"
                                        min="0"
                                        placeholder="100">
                            </div>
                            <div class="form-group">
                                <label for="month_price">Μηνιαία Συνδρομή</label>
                                <input
                                        name="month_price"
                                        type="number"
                                        id="month_price"
                                        class="form-control"
                                        min="0"
                                        placeholder="30">
                            </div>
                            <div class="form-group">
                                <label for="description">Περιγραφή</label>
                                <textarea id="description" class="form-control" rows="3" name="description"></textarea>
                            </div>
                            <div class="form-group">
                                <label for="logo">Το logo σας</label>
                                <input name="logo" type="file" class="form-control-file" id="logo">
                            </div>
                            <button type="submit" class="btn btn-success">Προσθέστε το γυμναστήριό σας</button>
                        </form>
                </div>
                <?php else : ?>
                <div class="col-md-12 profile_boxes">
                    <h4>Το γυμναστήριό μου</h4>
                    <?php flash('gym_update'); ?>
                    <form id="updateGymForm" action="<?php echo URLROOT; ?>/owners/update_gym" method="post" enctype="multipart/form-data">
                        <div class="form-group">
                            <label for="name">Όνομα</label>
                            <input
                                    name="name"
                                    type="text"
                                    id="name"
                                    class="form-control"
                                    value="<?php echo $data['my_gym_details']['gym_name']; ?>"
                                    placeholder="name@example.com">
                        </div>
                        <div class="form-group">
                            <label for="location">Τοποθεσία</label>
                            <input
                                    name="location"
                                    type="text"
                                    id="location"
                                    class="form-control"
                                    value="<?php echo $data['my_gym_details']['gym_location']; ?>"
                                    placeholder="name@example.com">
                        </div>
                        <div class="form-group">
                            <label for="type">Τύπος Γυμναστηρίου</label>
                            <input
                                    name="type"
                                    type="text"
                                    id="type"
                                    class="form-control"
                                    value="<?php echo $data['my_gym_details']['gym_type']; ?>"
                                    placeholder="name@example.com">
                        </div>
                        <div class="form-group">
                            <label for="year_price">Ετήσια Συνδρομή</label>
                            <input
                                    name="year_price"
                                    type="number"
                                    id="year_price"
                                    class="form-control"
                                    value="<?php echo $data['my_gym_details']['gym_yearly_price']; ?>"
                                    min="0"
                                    placeholder="100">
                        </div>
                        <div class="form-group">
                            <label for="month_price">Μηνιαία Συνδρομή</label>
                            <input
                                    name="month_price"
                                    type="number"
                                    id="month_price"
                                    class="form-control"
                                    value="<?php echo $data['my_gym_details']['gym_monthly_price']; ?>"
                                    min="0"
                                    placeholder="30">
                        </div>
                        <div class="form-group">
                            <label for="description">Περιγραφή</label>
                            <textarea id="description" class="form-control" rows="3" name="description"><?php echo $data['my_gym_details']['gym_name']; ?></textarea>
                        </div>
                        <button type="submit" class="btn btn-success">Ανανεώστε το γυμναστήριό σας</button>
                    </form>
                    <form id="deleteGymForm" action="<?php echo URLROOT; ?>/owners/delete_gym" method="post">
                        <button type="submit" class="btn btn-danger">Διαγραφή Γυμναστηρίου</button>
                    </form>
                </div>
                <?php endif; ?>
            <!-- This is the display for trainers details upload   -->
            <?php elseif ($data['tab'] === 'my_trainers') : ?>
                <!-- Button trigger modal -->
                <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">
                    Προσθήκη Γυμναστή
                </button>

                <!-- Modal -->
                <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLabel">Γυμναστές</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">
                                <form id="addTrainerForm" action="<?php echo URLROOT; ?>/owners/add_trainer" method="post" enctype="multipart/form-data">
                                    <div class="form-group">
                                        <label for="name" class="col-form-label">Όνομα Γυμναστή:</label>
                                        <input type="text" class="form-control" id="name" name="name">
                                    </div>
                                    <div class="form-group">
                                        <label for="trainer_title" class="col-form-label">Τίτλος Γυμναστή:</label>
                                        <input type="text" class="form-control" id="trainer_title" name="title">
                                    </div>
                                    <div class="form-group">
                                        <label for="description" class="col-form-label">Περιγραφή:</label>
                                        <textarea class="form-control" id="description" name="description"></textarea>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                        <button type="submit" class="btn btn-primary">Προσθήκη</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
                <?php if(isset($data['trainers']) && !empty($data['trainers'])) : ?>
                <div class="col-md-12 profile_boxes mt-3">
                    <h4>Οι γυμναστές μου</h4>
                    <?php flash('trainer_update'); ?>
                    <?php foreach ($data['trainers'] as $key=>$trainer) { ?>
                        <form class="mt-4" id="updateTrainerForm<?php echo $key; ?>" action="<?php echo URLROOT; ?>/owners/update_trainer" method="post" enctype="multipart/form-data">
                            <div class="form-group">
                                <label for="name<?php echo $key; ?>">Όνομα</label>
                                <input
                                        name="name"
                                        type="text"
                                        id="name<?php echo $key; ?>"
                                        class="form-control"
                                        value="<?php echo $trainer->trainer_name; ?>">
                            </div>
                            <div class="form-group">
                                <label for="title<?php echo $key; ?>">Τίτλος</label>
                                <input
                                        name="title"
                                        type="text"
                                        id="title<?php echo $key; ?>"
                                        class="form-control"
                                        value="<?php echo $trainer->trainer_title; ?>">
                            </div>
                            <div class="form-group">
                                <label for="description<?php echo $key; ?>">Περιγραφή</label>
                                <textarea id="description<?php echo $key; ?>" class="form-control" rows="3" name="description"><?php echo $trainer->trainer_description; ?></textarea>
                            </div>
                            <input type="hidden" name="id" value="<?php echo $trainer->trainer_id; ?>">
                            <button class="btn btn-success mb-2" type="submit">Αλλαγή Στοιχείων</button>
                        </form>
                        <form id="deleteTrainerForm<?php echo $key; ?>" action="<?php echo URLROOT; ?>/owners/delete_trainer" method="post">
                            <input type="hidden" name="id" value="<?php echo $trainer->trainer_id; ?>">
                            <button type="submit" class="btn btn-danger">Διαγραφή Γυμναστή</button>
                        </form>
                        <hr>
                    <?php } ?>
                </div>
                <?php else : ?>
                    <p>Δεν έχετε προσθέσει γυμναστές.</p>
                <?php endif; ?>

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