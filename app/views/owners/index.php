<?php require  APPROOT . '/views/inc/header.php'?>

<div class="row">
    <div class="col-md-12" id="imgpartner">
        <div class="col-8 offset-2" id="ourservices">
            <p class="titlepartner">Γίνε Συνεργάτης!</p>
            <div class="row">
                <div class="col-md-4 " id="stepsicons" >
                    <img src= " <?php echo URLROOT; ?> /images/owners/form.png" width="110" alt="teamimg">
                    <p>Κάνε εγγραφή συμπληρώνοντας την φόρμα!</p>
                </div>    
                <div class="col-md-4" id="stepsicons" >
                     <img src= " <?php echo URLROOT; ?> /images/owners/edit1.png" width="110" alt="teamimg">
                     <p>Ετοίμασε την προβολή σου</p>
                </div>    
                <div class="col-md-4" id="stepsicons">
                     <img src= " <?php echo URLROOT; ?> /images/owners/newcustomers.png" width="110" alt="teamimg">
                     <p>Απόκτησε νεες συνδρομες</p>
                </div>
            </div>
            <?php flash('register_owner_success'); ?>
        </div>
    </div>
</div>


<div class="partnerform">
    <p class="titlepartnerform">Συμπλήρωσε την Φόρμα!</p>
    <div class="row">
        <div class="col-md-6 offset-md-3">
            <div class="container">

            <!-- if any errors start  display here -->
            <ul style="list-style-type: none;" id="displayErrorsList" class="text-center">
                <li id="nameOwnerErrorDis"></li>
                <li id="LastNameOwnerErrorDis"></li>
                <li id="UsernameOwnerErrorDis"></li>
                <li id="ownerEmailErrorDis"></li>
                <li id="ownerPhoneErrorDis"></li>
                <li id="onwerPassErrorDis"></li>
                <li id="onwerPassConfirmErrorDis"></li>
            </ul>
            <!-- if any errors end  display here -->

                <form id="registerOwnerForm" action="<?php echo URLROOT; ?>/owners/index" method="post">
                <div class="form-row">
                        <div class="form-group col-md-6">
                            <label for="name">Όνομα</label>
                            <input type="text"
                                   name="first_name"
                                   class="ownerNameInput form-control <?php echo (!empty($data['fname_error'])) ? 'is-invalid' : ''; ?>"
                                   id="name"
                                   value="<?php echo $data['first_name']; ?>"
                            >
                            <span class="invalid-feedback"><?php echo $data['fname_error']; ?></span>
                        </div>
                        <div class="form-group col-md-6">
                            <label for="last-name">Επώνυμο</label>
                            <input type="text"
                                   name="last_name"
                                   class="ownerLastNameInput form-control <?php echo (!empty($data['lname_error'])) ? 'is-invalid' : ''; ?>"
                                   id="last-name"
                                   value="<?php echo $data['last_name']; ?>"
                            >
                            <span class="invalid-feedback"><?php echo $data['lname_error']; ?></span>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="username">Όνομα Χρήστη</label>
                        <input type="text"
                               name="username"
                               class="ownerUserNameInput form-control <?php echo (!empty($data['username_error'])) ? 'is-invalid' : ''; ?>"
                               id="username"
                               value="<?php echo $data['username']; ?>"
                        >
                        <span class="invalid-feedback"><?php echo $data['username_error']; ?></span>
                    </div>

                    <div class="form-row">
                        <div class="form-group col-md-6">
                            <label for="email">Email</label>
                            <input type="email"
                                   name="email"
                                   class="ownerEmailInput form-control <?php echo (!empty($data['email_error'])) ? 'is-invalid' : ''; ?>"
                                   id="email"
                                   placeholder="name@example.com"
                                   value="<?php echo $data['email']; ?>"
                            >
                            <span class="invalid-feedback"><?php echo $data['email_error']; ?></span>
                        </div>
                        <div class="form-group col-md-6">
                            <label for="number">Τήλεφωνο</label>
                            <input type="number"
                                   id="number"
                                   name="phone"
                                   class="ownerPhoneInput form-control <?php echo (!empty($data['phone_error'])) ? 'is-invalid' : ''; ?>"
                                   value="<?php echo $data['phone']; ?>">
                            <span class="invalid-feedback"><?php echo $data['phone_error']; ?></span>
                        </div>
                    </div>

                    <div class="form-row">
                        <div class="form-group col-md-6">
                            <label for="password">Κωδικός</label>
                            <input  type="password"
                                    name="password"
                                    class="ownerPasswordInput form-control <?php echo (!empty($data['pass_error'])) ? 'is-invalid' : ''; ?>"
                                    id="password"
                                    value="<?php echo $data['password']; ?>"
                            >
                            <span class="invalid-feedback"><?php echo $data['pass_error']; ?></span>
                        </div>
                        <div class="form-group col-md-6">
                            <label for="conf_pass">Επιβεβαίωση Κωδικού</label>
                            <input type="password"
                                   name="confirm_password"
                                   class="ownerPasswordMatchInput form-control <?php echo (!empty($data['confirm_pass_error'])) ? 'is-invalid' : ''; ?>"
                                   id="conf_pass"
                                   value="<?php echo $data['confirm_password']; ?>">
                            <span class="invalid-feedback"><?php echo $data['confirm_pass_error']; ?></span>
                        </div>
                    </div>
                    <button type="submit" class="btn btn-primary" id="btnformpartner">Εγγραφή</button>
                </form>
            </div>
        </div>
    </div>
</div>


<?php require  APPROOT . '/views/inc/footer.php'?>
