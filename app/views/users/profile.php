<?php require  APPROOT . '/views/inc/header.php'?>

<!-- Should fix functions,form values -->

<div class="row profile">
    <div class="col-md-2 sidemenu">
        <div class="list-group">
            <a href="<?php echo URLROOT; ?>/users/profile/account" class="list-group-item <?php echo ($data['tab'] === 'account') ? 'active_profile_tab' : ''; ?>">Λογαριασμός</a>
            <?php if(!$_SESSION['isAdmin']) : ?>
                <a href="<?php echo URLROOT; ?>/users/profile/my_gym" class="list-group-item <?php echo ($data['tab'] === 'my_gym') ? 'active_profile_tab' : ''; ?>">Γυμναστήριο</a>
            <?php else : ?>
                <a href="<?php echo URLROOT; ?>/users/profile/my_users" class="list-group-item <?php echo ($data['tab'] === 'my_users') ? 'active_profile_tab' : ''; ?>">Χρήστες</a>
                <a href="<?php echo URLROOT; ?>/users/profile/my_owners" class="list-group-item <?php echo ($data['tab'] === 'my_owners') ? 'active_profile_tab' : ''; ?>">Ιδιοκτήτες</a>
                <a href="<?php echo URLROOT; ?>/users/profile/my_gyms" class="list-group-item <?php echo ($data['tab'] === 'my_gyms') ? 'active_profile_tab' : ''; ?>">Γυμναστήρια</a>
            <?php endif; ?>
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
                                   value="<?php echo isset($_SESSION['address']) ? $_SESSION['address'] : ''; ?>">
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

                <?php if(!$_SESSION['isAdmin']) : ?>
                    <!-- This is the display for gym details upload -->
                    <div class="col-md-5 offset-1 profile_boxes mt-4">
                        <h4>Το γυμναστήριό μου</h4>
                        <?php if(!empty($data['msg'])) : ?>
                            <div class="no-gym mt-3">
                                <?php echo $data['msg'];?>
                                <a href="<?php echo URLROOT; ?>/gyms/search">Βρείτε το γυμναστήριο που σας ταιριάζει</a>
                            </div>
                        <?php else : ?>
                            <div>
                                <?php echo $data['name'];?>
                            </div>
                        <?php endif; ?>
                    </div>
                <?php else : ?>
                    <!-- TODO: Check to remove if not needed -->
                    <div class="col-md-5 offset-1 profile_boxes mt-4">
                        <h4>Αν χρειαζεται καποιο notification για τον admin</h4>
                    </div>
                <?php endif; ?>
            <?php elseif($data['tab'] === 'my_users')  : ?>
                <hr>
                <div class="container bootstrap snippet">
                    <div class="row admin_users">
                        <div class="col-lg-12">
                            <div class="main-box no-header clearfix">
                                <div class="main-box-body clearfix">
                                    <div class="table-responsive">
                                        <?php flash('admin_success'); ?>
                                        <table class="table user-list">
                                            <thead>
                                            <tr>
                                                <th><span>Χρήστης</span></th>
                                                <th><span>Username</span></th>
                                                <th class="text-center"><span>Δημιουργήθηκε</span></th>
                                                <th><span>Email</span></th>
                                                <th><span>Ενέργειες</span></th>
                                            </tr>
                                            </thead>
                                            <tbody>
                                            <?php foreach ($data['users'] as $user) : ?>
                                                <?php if($user->user_id !== $_SESSION['id']) : ?>
                                                    <tr>
                                                        <td>
                                                            <img src="https://bootdey.com/img/Content/user_1.jpg" alt="user_profile_picture">
                                                            <a href="#" class="user-link"><?php echo $user->user_first_name ." ". $user->user_last_name; ?></a>
                                                            <span class="user-subhead"><?php echo ($user->user_is_admin) ? 'Admin' : 'Member'; ?></span>
                                                        </td>
                                                        <td><?php echo $user->user_username; ?></td>
                                                        <td class="text-center">
                                                            <span><?php echo $user->user_register_day; ?></span>
                                                        </td>
                                                        <td>
                                                            <span><?php echo $user->user_email; ?></span>
                                                        </td>
                                                        <td>
                                                            <form id="makeAdminForm" action="<?php echo URLROOT; ?>/users/makeAdmin" method="post">
                                                                <input type="hidden" name="isAdmin" value="<?php echo $user->user_is_admin; ?>">
                                                                <input type="hidden" name="id" value="<?php echo $user->user_id; ?>">
                                                                <button class="btn btn-sm btn-primary mb-2"><?php echo ($user->user_is_admin) ? 'Αφαίρεση ' : 'Προσθήκη '; ?>Διαχειριστή</button>
                                                            </form>
                                                            <form id="deleteUserAdminForm" action="<?php echo URLROOT; ?>/users/deleteUser" method="post">
                                                                <input type="hidden" name="id" value="<?php echo $user->user_id; ?>">
                                                                <button class="btn btn-sm btn-danger">Διαγραφή</button>
                                                            </form>
                                                        </td>
                                                    </tr>
                                            <?php endif; ?>
                                            <?php endforeach; ?>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            <?php elseif($data['tab'] === 'my_owners')  : ?>
                <hr>
                <div class="container bootstrap snippet">
                    <div class="row admin_users">
                        <div class="col-lg-12">
                            <div class="main-box no-header clearfix">
                                <div class="main-box-body clearfix">
                                    <div class="table-responsive">
                                        <table class="table user-list">
                                            <?php flash('owner_success'); ?>
                                            <thead>
                                            <tr>
                                                <th><span>Owner</span></th>
                                                <th><span>Username</span></th>
                                                <th class="text-center"><span>Status</span></th>
                                                <th><span>Email</span></th>
                                                <th><span>Actions</span></th>
                                            </tr>
                                            </thead>
                                            <tbody>
                                            <?php foreach ($data['owners'] as $owner) : ?>
                                                <tr>
                                                    <td>
                                                        <img src="https://bootdey.com/img/Content/user_1.jpg" alt="owner_profile_picture">
                                                        <a href="#" class="user-link"><?php echo $owner->owner_first_name ." ". $owner->owner_last_name; ?></a>
                                                        <span class="user-subhead">Owner</span>
                                                    </td>
                                                    <td><?php echo $owner->owner_username; ?></td>
                                                    <td class="text-center">
                                                        <span><?php echo ($owner->owner_is_activated) ? '<span class="owner_active">active</span>' : 'pending'; ?></span>
                                                    </td>
                                                    <td>
                                                        <span><?php echo $owner->owner_email; ?></span>
                                                    </td>
                                                    <td>
                                                        <form id="activateOwnerForm" action="<?php echo URLROOT; ?>/users/activateOwner" method="post">
                                                            <input type="hidden" name="isActivated" value="<?php echo $owner->owner_is_activated; ?>">
                                                            <input type="hidden" name="id" value="<?php echo $owner->owner_id; ?>">
                                                            <button class="btn btn-sm btn-primary mb-2"><?php echo (!$owner->owner_is_activated) ? 'Ενεργοποίηση ' : 'Απενεργοποίηση  '; ?>Ιδιοκτήτη</button>
                                                        </form>
                                                        <form id="deleteOwnerForm" action="<?php echo URLROOT; ?>/users/deleteOwner" method="post">
                                                            <input type="hidden" name="id" value="<?php echo $owner->owner_id; ?>">
                                                            <button class="btn btn-sm btn-danger">Διαγραφή</button>
                                                        </form>
                                                    </td>
                                                </tr>
                                            <?php endforeach; ?>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            <?php elseif($data['tab'] === 'my_gyms')  : ?>
                <hr>
                <div class="container bootstrap snippet">
                    <div class="row admin_users">
                        <div class="col-lg-12">
                            <div class="main-box no-header clearfix">
                                <div class="main-box-body clearfix">
                                    <div class="table-responsive">
                                        <table class="table user-list">
                                            <thead>
                                            <tr>
                                                <th><span>Γυμναστήριο</span></th>
                                                <th><span>Διεύθυνση</span></th>
                                                <th><span>Κατάσταση</span></th>
                                                <th><span>Τύπος</span></th>
                                                <th><span>Ενέργειες</span></th>
                                            </tr>
                                            </thead>
                                            <tbody>
                                            <?php foreach ($data['gyms'] as $gym) : ?>
                                                <tr>
                                                    <td>
                                                        <img src="https://bootdey.com/img/Content/user_1.jpg" alt="user_profile_picture">
                                                        <a href="#" class="user-link"><?php echo $gym->gym_name; ?></a>
                                                    </td>
                                                    <td><?php echo $gym->gym_location; ?></td>
                                                    <td>
                                                        <span><?php echo ($gym->gym_is_activated) ? '<span class="owner_active">ενεργό</span>' : 'εκκρεμή'; ?></span>
                                                    </td>
                                                    <td class="text-center">
                                                        <span><?php echo $gym->gym_type; ?></span>
                                                    </td>
                                                    <td>
                                                        <form id="activateGymForm" action="<?php echo URLROOT; ?>/gyms/activateGym" method="post">
                                                            <input type="hidden" name="isActivated" value="<?php echo $gym->gym_is_activated; ?>">
                                                            <input type="hidden" name="id" value="<?php echo $gym->gym_id; ?>">
                                                            <button class="btn btn-sm btn-primary mb-2"><?php echo (!$gym->gym_is_activated) ? 'Ενεργοποίηση ' : 'Απενεργοποίηση  '; ?>Γυμναστηρίου</button>
                                                        </form>
                                                        <form id="deleteGymForm" action="<?php echo URLROOT; ?>/gyms/deleteGym" method="post">
                                                            <input type="hidden" name="id" value="<?php echo $gym->gym_id; ?>">
                                                            <button class="btn btn-sm btn-danger">Διαγραφή</button>
                                                        </form>
                                                    </td>
                                                </tr>
                                            <?php endforeach; ?>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
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