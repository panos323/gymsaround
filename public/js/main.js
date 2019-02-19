$( document ).ready(function() {
    
    //show selected items on dropdown for cities
    $(".showSelectedItemAreas button").click(function(){
        $("#dropdownMenuButton:first-child").text($(this).text());
        $("#dropdownMenuButton:first-child").val($(this).text());
    });

    //show again dropdown values on reset
    $("#dropdownReset").on("click", function() {
        $("#dropdownMenuButton:first-child").text('Περιοχή');
        location.reload();
    });

    //show selected items on dropdown for type of fitness
    $(".showSelectedItemType button").click(function(){
        $("#dropdownMenuButtonArr:first-child").text($(this).text());
        $("#dropdownMenuButtonArr:first-child").val($(this).text());
    });

    //show again dropdown values on reset
    $("#dropdownResetTypes").on("click", function() {
        $("#dropdownMenuButtonArr:first-child").text('Είδος');
        location.reload();
    });

    //show current item of slider
    var totalItemsOfSlider = $('#carouselItemsDisplay .carousel-item').length;
    var currentIndex = $('div.active').index() + 1;
    $('#number').html('1/3');
    $("#carouseControlsNumbers").on('slid.bs.carousel', function() {
        currentIndex = $('div.active').index() + 1;
       $('#number').html(''+currentIndex+'/'+totalItemsOfSlider+'');
    });



    //START VALIDATIONS FOR FORM SUBMIT
    var registerUserForm = $("#registerForm");
    var loginUserForm = $("#loginmodal");
    var registerOwnerForm = $("#registerOwnerForm");
    var updateUserDetailsForm = $("#updateDetailsForm");
    var updateUserDetailsFormUsername = $("#updateUsernameForm");
    var updateUserEmailForm = $("#updateEmailForm");
    var updatePasswordForm = $("#updatePasswordForm");
    var updateDetailsFormAdmin = $("#updateDetailsFormAdmin");
    var updateOwnernameForm = $("#updateOwnernameForm");
    var updateEmailFormOwners = $("#updateEmailFormOwners");
    var updateOwnersPasswordForm = $("#updateOwnersPasswordForm");



    //START ON REGISTER POP UP FORM SUMBIT
    registerUserForm.on("submit", function(e) {
        
        var firstname = $("#name").val().trim();
        var surname = $("#last_name").val().trim();
        var username = $("#username").val().trim();
        var emailcheck = $("#email").val().trim();
        var myPassword = $("#password").val().trim();
        var passwordConfirm = $("#confrim_pass").val().trim();
        var isCheckForm = $("#acceptTerms").is(":checked");

        validateName(firstname,e);
        validateSurName(surname,e);
        validateEmail(emailcheck,e);
        validateUserName(username,e)
        validatePassword(myPassword,e);
        validateMatchingPassword(myPassword,passwordConfirm,e);
        validateCheckboxField(isCheckForm,e);
    }) // on submit 
    //END ON REGISTER POP UP FORM SUMBIT


    //START ON LOGIN POP UP FORM SUMBIT
    loginUserForm.on("submit", function(e) {

        var nameEmail = $("#exampleInputEmailLog").val().trim();
        var myPassword = $("#passwordLoginPopUp").val().trim();
        var isCheckForm = $("#checkOutLoginC").is(":checked");

        validateNameEmail(nameEmail,e);
        validateLoginPassword(myPassword,e);
        validateLoginCheckbox(isCheckForm,e);
    }) // on submit 
    //END ON LOGIN POP UP FORM SUMBIT


    //START ON REGISTER OWNERS FORM SUMBIT
    registerOwnerForm.on("submit", function(e) {
        
        var firstname = $(".ownerNameInput").val().trim();
        var surname = $(".ownerLastNameInput").val().trim();
        var username = $(".ownerUserNameInput").val().trim();
        var emailcheck = $(".ownerEmailInput").val().trim();
        var mobilecheck = $(".ownerPhoneInput").val().trim();
        var myPassword = $(".ownerPasswordInput").val().trim();
        var passwordConfirm = $(".ownerPasswordMatchInput").val().trim();
        //var isCheckForm = $("#acceptTerms").is(":checked");

        validateOwnerName(firstname,e);
        validateOwnerSurName(surname,e);
        validateOwnerUserName(username,e);
        validateOwnerEmail(emailcheck,e);
        validateOwnerPassword(myPassword,e);
        validateOwnerPhone(mobilecheck,e);
        validateOwnerMatchingPassword(myPassword,passwordConfirm,e);
        //validateOwnerCheckboxField(isCheckForm,e);
    }) // on submit 
    //END ON REGISTER OWNERS FORM SUMBIT



    //START ON UPDATE OWNER DETAILS
    updateDetailsFormAdmin.on("submit", function(e) {

        var firstname = $(".updateOwnerFirstName").val().trim();
        var surname = $(".updateOwnerLastName").val().trim();
        var mobilecheck = $(".updateOwnerPhoneInput").val().trim();

        validateUpdateOwnerName(firstname,e);
        validateUpdateOwnerSurName(surname,e);
        validateUpdateOwnerPhone(mobilecheck,e);
    }) // on submit 

    updateOwnernameForm = $("#updateOwnernameForm").on("submit", function(e) {
        var username = $(".updateOwnerUserName").val().trim();
       
        validateUpdateOwnerUserName(username,e);

    }) // on submit 

    updateEmailFormOwners.on("submit", function(e) {

        var emailCheck = $(".updateOwnerEmailNew").val().trim();
       
        validateUpdateOwnerEmail(emailCheck,e);

    }) // on submit 

    updateOwnersPasswordForm.on("submit", function(e) {
        
        var myPassword = $(".checkCurrOwnerPassword").val().trim();
        var checkUSerPasswordNew = $(".checkOwnerPasswordNew").val().trim();
        var checkUSerPasswordNewAgain = $(".checkOwnerPasswordNewAgain").val().trim();
        
        validateCurrentOwnerPass(myPassword,e);
        validateCurrentOwnerPassnew(checkUSerPasswordNew,e);
        validateCurrentOwnerPassnewAgain(checkUSerPasswordNewAgain,e);
        validateMatchingPasswordOwnerUpdate(checkUSerPasswordNew,checkUSerPasswordNewAgain,e);

    }) // on submit 
    //END ON UPDATE OWNER DETAILS



    //START ON UPDATE USER DETAILS
    updateUserDetailsForm.on("submit", function(e) {

        var firstname = $(".updateUserFirstName").val().trim();
        var surname = $(".updateUserLastName").val().trim();

        validateUpdateUserName(firstname,e);
        validateUpdateUserSurName(surname,e);

    }) // on submit 

    updateUserDetailsFormUsername.on("submit", function(e) {

        var username = $(".updateUserUserName").val().trim();
       
        validateUpdateUserUserName(username,e);

    }) // on submit 

    updateUserEmailForm.on("submit", function(e) {

        var emailCheck = $(".updateUserEmailNew").val().trim();
       
        validateUpdateUserEmail(emailCheck,e);

    }) // on submit 

    updatePasswordForm.on("submit", function(e) {
        
        var myPassword = $(".checkCurrUSerPassword").val().trim();
        var checkUSerPasswordNew = $(".checkUSerPasswordNew").val().trim();
        var checkUSerPasswordNewAgain = $(".checkUSerPasswordNewAgain").val().trim();
        
        validateCurrentUserPass(myPassword,e);
        validateCurrentUserPassnew(checkUSerPasswordNew,e);
        validateCurrentUserPassnewAgain(checkUSerPasswordNewAgain,e);
        validateMatchingPasswordUserUpdate(checkUSerPasswordNew,checkUSerPasswordNewAgain,e);

    }) // on submit 
    //END ON UPDATE USER DETAILS
    




     //START FUNCTIONS FOR UPDATE OWNER  VALIDATION
     function validateUpdateOwnerName(firstname,e) {
        if (!isValidName(firstname)) {
            $(".nameOwnerUpdateErr").text(' (Το όνομα πρέπει να περιέχει τουλάχιστον δύο χαρακτήρες)');
            e.preventDefault();
        } else if (!isOnlyLetters(firstname)) {
            $(".nameOwnerUpdateErr").text(' (Το όνομα πρέπει να περιέχει μόνο γράμματα)');
            e.preventDefault();
        } else {
            $(".nameOwnerUpdateErr").text("");
        }
    } //end function 

    function validateUpdateOwnerSurName(surname,e) {
        if (!isValidSurName(surname)) {
            $(".lastnameOwnerUpdateErr").text(' (Το επώνυμο πρέπει να περιέχει τουλάχιστον δύο χαρακτήρες)');
            e.preventDefault();
        } else if (!isOnlyLetters(surname)) {
            $(".lastnameOwnerUpdateErr").text(' (Το επώνυμο πρέπει να περιέχει μόνο γράμματα)');
            e.preventDefault();
        } else {
            $(".lastnameOwnerUpdateErr").html("");
        }
    } // end function

    
    function validateUpdateOwnerPhone(mobilecheck,e) {
        if (!isValidPhone(mobilecheck)) {
           $(".phoneOwnerUpdateErr").html(" (Παρακαλώ εισάγετε τον τηλεφωνικό σας αριθμό)")
            e.preventDefault();
        } else {
            $(".phoneOwnerUpdateErr").html("");
        }
    } //end function 

    function validateUpdateOwnerUserName(username,e) {
        if (!isValidSurName(username)) {
            $(".userNameOwnerUpdateErr").text(' (Το όνομα χρήστη πρέπει να περιέχει τουλάχιστον δύο χαρακτήρες)');
            e.preventDefault();
        } else if (!hasWhiteSpace(username)) {
            $(".userNameOwnerUpdateErr").text(' (Το όνομα χρήστη δεν πρέπει να περιέχει κενά)');
            e.preventDefault();
        } else {
            $(".userNameOwnerUpdateErr").html("");
        }
    } // end function

    function validateUpdateOwnerEmail(emailcheck,e) {
        if (!isValidEmail(emailcheck)) {
            $(".EmailOwnerUpdateErr").html(' (Παρακαλώ γράψτε το email σας)')
            e.preventDefault();
        } else if (isEmailOk(emailcheck)) {
            $(".EmailOwnerUpdateErr").html(' (Παρακαλώ εισάγετε μια έγκυρη ηλεκτρονική διεύθυνση)')
            e.preventDefault();
        } else {
            $(".EmailOwnerUpdateErr").html("");
        }
    } //end function


    function validateCurrentOwnerPass(myPassword,e) {
        if (!isValidPassowrd(myPassword)) {
        $(".PassWordOwnerUpdateErr").text(" (Ο κωδικός ασφαλείας πρέπει να είναι τουλάχιστον 6 χαρακτήρες)");
        e.preventDefault();
        } else {
            $(".PassWordOwnerUpdateErr").text("");
        }
    } //end function

    function validateCurrentOwnerPassnew(checkUSerPasswordNew,e) {
        if (!isValidPassowrd(checkUSerPasswordNew)) {
        $(".PassWordOwnerUpdateNewErr").text(" (Ο κωδικός ασφαλείας πρέπει να είναι τουλάχιστον 6 χαρακτήρες)");
        e.preventDefault();
        } else {
            $(".PassWordOwnerUpdateNewErr").text("");
        }
    } //end function

    function validateCurrentOwnerPassnewAgain(checkUSerPasswordNewAgain,e) {
        if (!isValidPassowrd(checkUSerPasswordNewAgain)) {
        $(".PassWordOwnerUpdateNewConfirmErr").text(" (Ο κωδικός ασφαλείας πρέπει να είναι τουλάχιστον 6 χαρακτήρες)");
        e.preventDefault();
        } else {
            $(".PassWordOwnerUpdateNewConfirmErr").text("");
        }
    } //end function

    function validateMatchingPasswordOwnerUpdate(checkUSerPasswordNew,checkUSerPasswordNewAgain,e) {
        if (checkUSerPasswordNew !== checkUSerPasswordNewAgain) {
        $(".PassWordOwnerUpdateMatchesConfirmErr").text(" (Οι κωδικοί ασφαλείας δεν ταιριάζουν)");
        e.preventDefault();
        } else {
            $(".PassWordOwnerUpdateMatchesConfirmErr").text("");
        }
    } //end function
    //END FUNCTIONS FOR UPDATE OWNER  VALIDATION



    //START FUNCTIONS FOR UPDATE USER  VALIDATION
    function validateUpdateUserName(firstname,e) {
        if (!isValidName(firstname)) {
            $(".nameUserUpdateErr").text(' (Το όνομα πρέπει να περιέχει τουλάχιστον δύο χαρακτήρες)');
            e.preventDefault();
        } else if (!isOnlyLetters(firstname)) {
            $(".nameUserUpdateErr").text(' (Το όνομα πρέπει να περιέχει μόνο γράμματα)');
            e.preventDefault();
        } else {
            $(".nameUserUpdateErr").text("");
        }
    } //end function 

    function validateUpdateUserSurName(surname,e) {
        if (!isValidSurName(surname)) {
            $(".lastnameUserUpdateErr").text(' (Το επώνυμο πρέπει να περιέχει τουλάχιστον δύο χαρακτήρες)');
            e.preventDefault();
        } else if (!isOnlyLetters(surname)) {
            $(".lastnameUserUpdateErr").text(' (Το επώνυμο πρέπει να περιέχει μόνο γράμματα)');
            e.preventDefault();
        } else {
            $(".lastnameUserUpdateErr").html("");
        }
    } // end function

    function validateUpdateUserUserName(username,e) {
        if (!isValidSurName(username)) {
            $(".UserNameUserUpdateErr").text(' (Το όνομα χρήστη πρέπει να περιέχει τουλάχιστον δύο χαρακτήρες)');
            e.preventDefault();
        } else if (!hasWhiteSpace(username)) {
            $(".UserNameUserUpdateErr").text(' (Το όνομα χρήστη δεν πρέπει να περιέχει κενά)');
            e.preventDefault();
        } else {
            $(".UserNameUserUpdateErr").html("");
        }
    } // end function

    function validateUpdateUserEmail(emailcheck,e) {
        if (!isValidEmail(emailcheck)) {
            $(".mailUserUpdateErr").text('(Παρακαλώ γράψτε το email σας)');
            e.preventDefault();
        } else if (isEmailOk(emailcheck)) {
            $(".mailUserUpdateErr").text('(Παρακαλώ εισάγετε μια έγκυρη ηλεκτρονική διεύθυνση)');
            e.preventDefault();
        } else {
            $(".mailUserUpdateErr").html("");
        }
    } //end function

    function validateCurrentUserPass(myPassword,e) {
        if (!isValidPassowrd(myPassword)) {
        $(".checkUserPasswordCurrentErr").text(" (Ο κωδικός ασφαλείας πρέπει να είναι τουλάχιστον 6 χαρακτήρες)");
        e.preventDefault();
        } else {
            $(".checkUserPasswordCurrentErr").text("");
        }
    } //end function

    function validateCurrentUserPassnew(checkUSerPasswordNew,e) {
        if (!isValidPassowrd(checkUSerPasswordNew)) {
        $(".checkUserPasswordnewErr").text(" (Ο κωδικός ασφαλείας πρέπει να είναι τουλάχιστον 6 χαρακτήρες)");
        e.preventDefault();
        } else {
            $(".checkUserPasswordnewErr").text("");
        }
    } //end function

    function validateCurrentUserPassnewAgain(checkUSerPasswordNewAgain,e) {
        if (!isValidPassowrd(checkUSerPasswordNewAgain)) {
        $(".checkUserPasswordnewAgainErr").text(" (Ο κωδικός ασφαλείας πρέπει να είναι τουλάχιστον 6 χαρακτήρες)");
        e.preventDefault();
        } else {
            $(".checkUserPasswordnewAgainErr").text("");
        }
    } //end function

    function validateMatchingPasswordUserUpdate(checkUSerPasswordNew,checkUSerPasswordNewAgain,e) {
        if (checkUSerPasswordNew !== checkUSerPasswordNewAgain) {
        $(".checkUserPasswordMatchErr").text(" (Οι κωδικοί ασφαλείας δεν ταιριάζουν)");
        e.preventDefault();
        } else {
            $(".checkUserPasswordMatchErr").text("");
        }
    } //end function
    //END FUNCTIONS FOR UPDATE USER  VALIDATION


    //START FUNCTIONS FOR OWNER  VALIDATION
    function validateOwnerName(nameEmail,e) {
        if (!isValidName(nameEmail)) {
           $("#nameOwnerErrorDis").html('<div class="alert alert-danger alert-dismissible fade show" role="alert">Το όνομα πρέπει να περιέχει τουλάχιστον δύο χαρακτήρες<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>')
            e.preventDefault();
        } else if (!isOnlyLetters(nameEmail)) {
            $("#nameOwnerErrorDis").html('<div class="alert alert-danger alert-dismissible fade show" role="alert">Το όνομα πρέπει να περιέχει μόνο γράμματα<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>')
            e.preventDefault();
        } else {
            $("#nameOwnerErrorDis").html("");
            $("#nameOwnerErrorDis").css("display","none")
        }
    } //end function 

    function validateOwnerSurName(surname,e) {
        if (!isValidName(surname)) {
           $("#LastNameOwnerErrorDis").html('<div class="alert alert-danger alert-dismissible fade show" role="alert">Το επώνυμο πρέπει να περιέχει τουλάχιστον δύο χαρακτήρες<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>')
            e.preventDefault();
        } else if (!isOnlyLetters(surname)) {
            $("#LastNameOwnerErrorDis").html('<div class="alert alert-danger alert-dismissible fade show" role="alert">Το επώνυμο πρέπει να περιέχει μόνο γράμματα<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>')
            e.preventDefault();
        } else {
            $("#LastNameOwnerErrorDis").html("");
            $("#LastNameOwnerErrorDis").css("display","none")
        }
    } //end function 


    function validateOwnerUserName(username,e) {
        if (!isValidSurName(username)) {
            $("#UsernameOwnerErrorDis").html('<div class="alert alert-danger alert-dismissible fade show" role="alert">Το όνομα χρήστη πρέπει να περιέχει τουλάχιστον δύο χαρακτήρες<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>')
            e.preventDefault();
        } else if (!hasWhiteSpace(username)) {
            $("#UsernameOwnerErrorDis").html('<div class="alert alert-danger alert-dismissible fade show" role="alert">Το όνομα χρήστη δεν πρέπει να περιέχει κενά<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>')
            e.preventDefault();
        } else {
            $("#UsernameOwnerErrorDis").html("");
            $("#UsernameOwnerErrorDis").css("display","none");
        }
    } // end function

    function validateOwnerEmail(emailcheck,e) {
        if (!isValidEmail(emailcheck)) {
            $("#ownerEmailErrorDis").html('<div class="alert alert-danger alert-dismissible fade show" role="alert">Παρακαλώ γράψτε το email σας<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>')
            e.preventDefault();
        } else if (isEmailOk(emailcheck)) {
            $("#ownerEmailErrorDis").html('<div class="alert alert-danger alert-dismissible fade show" role="alert">Παρακαλώ εισάγετε μια έγκυρη ηλεκτρονική διεύθυνση<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>')
            e.preventDefault();
        } else {
            $("#ownerEmailErrorDis").html("");
            $("#ownerEmailErrorDis").css("display","block");
        }
    } //end function

    function validateOwnerPassword(myPassword,e) {
        if (!isValidPassowrd(myPassword)) {
        $("#onwerPassErrorDis").html('<div class="alert alert-danger alert-dismissible fade show" role="alert">Ο κωδικός ασφαλείας πρέπει να είναι τουλάχιστον 6 χαρακτήρες<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>')
        e.preventDefault();
        } else {
            $("#onwerPassErrorDis").html("");
            $("#onwerPassErrorDis").css("display","block");
        }
    } //end function


    function validateOwnerMatchingPassword(myPassword,passwordConfirm,e) {
        if (myPassword !== passwordConfirm) {
        $("#onwerPassConfirmErrorDis").html('<div class="alert alert-danger alert-dismissible fade show" role="alert">Οι κωδικοί ασφαλείας δεν ταιριάζουν<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>')
        e.preventDefault();
        } else {
            $("#onwerPassConfirmErrorDis").html("");
            $("#onwerPassConfirmErrorDis").css("display","block")
        }
    } //end function

    function validateOwnerPhone(mobilecheck,e) {
        if (!isValidPhone(mobilecheck)) {
           $("#ownerPhoneErrorDis").html('<div class="alert alert-danger alert-dismissible fade show" role="alert">Παρακαλώ εισάγετε τον τηλεφωνικό σας αριθμό<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>')
            e.preventDefault();
        } else {
            $("#ownerPhoneErrorDis").html("");
            $("#ownerPhoneErrorDis").css("display","block")
        }
    } //end function 

    function isValidPhone(mobilecheck) {
        return mobilecheck.length == 10 && /^\d{10}$/.test(mobilecheck);
    } //end function
    //END FUNCTIONS FOR OWNER  VALIDATION



    //START FUNCTIONS FOR LOGIN POP UP VALIDATION
    function validateNameEmail(nameEmail,e) {
        if (!isValidName(nameEmail)) {
            $(".nameEmailLoginErr").text(' (Το πεδίο πρέπει να περιέχει τουλάχιστον δύο χαρακτήρες)');
            e.preventDefault();
        } else {
            $(".nameEmailLoginErr").text("");
        }
    } //end function 

    function validateLoginPassword(myPassword,e) {
        if (!isValidPassowrd(myPassword)) {
        $(".PasswordErrLogin").text(" (Ο κωδικός ασφαλείας πρέπει να είναι τουλάχιστον 6 χαρακτήρες)");
        e.preventDefault();
        } else {
            $(".PasswordErrLogin").text("");
        }
    } //end function

    function validateLoginCheckbox(isCheckForm,e) {
        if (!isCheckForm) {
            $(".checkIfCheckedLogin").text(" (Παρακαλώ αποδεχθείτε τους όρους)");
            e.preventDefault();
        } else {
            $(".checkIfCheckedLogin").text("");
        }
    }
    //END FUNCTIONS FOR LOGIN POP UP VALIDATION



    // FUNCTIONS FOR NAME VALIDATION
    function validateName(firstname,e) {
        if (!isValidName(firstname)) {
            $(".nameErr").text(' (Το όνομα πρέπει να περιέχει τουλάχιστον δύο χαρακτήρες)');
            e.preventDefault();
        } else if (!isOnlyLetters(firstname)) {
            $(".nameErr").text(' (Το όνομα πρέπει να περιέχει μόνο γράμματα)');
            e.preventDefault();
        } else {
            $(".nameErr").text("");
        }
    } //end function 

    function isValidName(firstname) {
        return firstname.length >= 2;
    } // function isValidName

    
    // FUNCTIONS FOR SURNAME VALIDATION
    function validateSurName(surname,e) {
        if (!isValidSurName(surname)) {
            $(".SurnameErr").text(' (Το επώνυμο πρέπει να περιέχει τουλάχιστον δύο χαρακτήρες)');
            e.preventDefault();
        } else if (!isOnlyLetters(surname)) {
            $(".SurnameErr").text(' (Το επώνυμο πρέπει να περιέχει μόνο γράμματα)');
            e.preventDefault();
        } else {
            $(".SurnameErr").html("");
        }
    } // end function

    function isValidSurName(surname) {
        return surname.length >= 2;
    } //end function


    // FUNCTIONS FOR SURNAME VALIDATION
    function validateUserName(username,e) {
        if (!isValidSurName(username)) {
            $(".UsernameErr").text(' (Το όνομα χρήστη πρέπει να περιέχει τουλάχιστον δύο χαρακτήρες)');
            e.preventDefault();
        } else if (!hasWhiteSpace(username)) {
            $(".UsernameErr").text(' (Το όνομα χρήστη δεν πρέπει να περιέχει κενά)');
            e.preventDefault();
        } else {
            $(".UsernameErr").html("");
        }
    } // end function

    function isValidSurName(username) {
        return username.length >= 2;
    } //end function

    
    // FUNCTIONS FOR EMAIL VALIDATION
    function validateEmail(emailcheck,e) {
        if (!isValidEmail(emailcheck)) {
            $(".MailErr").text('(Παρακαλώ γράψτε το email σας)');
            e.preventDefault();
        } else if (isEmailOk(emailcheck)) {
            $(".MailErr").text('(Παρακαλώ εισάγετε μια έγκυρη ηλεκτρονική διεύθυνση)');
            e.preventDefault();
        } else {
            $(".MailErr").html("");
        }
    } //end function

    function isValidEmail(emailcheck) {
        return emailcheck.length >= 3;
    } //end function

    function isEmailOk(emailcheck) {
        var regex = /^([a-zA-Z0-9_.+-])+\@(([a-zA-Z0-9-])+\.)+([a-zA-Z0-9]{2,4})+$/;
        return !regex.test(emailcheck)
    }

    // FUNCTIONS FOR PASSWORD VALIDATION
    function validatePassword(myPassword,e) {
        if (!isValidPassowrd(myPassword)) {
        $(".PasswordErr").text(" (Ο κωδικός ασφαλείας πρέπει να είναι τουλάχιστον 6 χαρακτήρες)");
        e.preventDefault();
        } else {
            $(".PasswordErr").text("");
        }
    } //end function

    function isValidPassowrd(myPassword) {
        return myPassword.length >= 6;
    } //end function


    // FUNCTIONS FOR RE-ENTER PASSWORD VALIDATION
    function validateMatchingPassword(myPassword,passwordConfirm,e) {
            if (myPassword !== passwordConfirm) {
            $(".passwordMatchErr").text(" (Οι κωδικοί ασφαλείας δεν ταιριάζουν)");
            e.preventDefault();
        } else {
            $(".passwordMatchErr").text("");
        }
    } //end function

    //FUNCTION FOR CHECKBOX VALIDATION
    function validateCheckboxField(isCheckForm,e) {
        if (!isCheckForm) {
            $(".checkIfChecked").text(" (Παρακαλώ αποδεχθείτε τους όρους χρήσης)");
            e.preventDefault();
        } else {
            $(".checkIfChecked").text("");
        }
    } //end function

    //FUNCTION TO CHECK IF ONLY HAS LETTERS
    function isOnlyLetters(firstname) {
        return !/[^a-z]/i.test(firstname);
    }

    //FUNCTION TO CHECK FOR WHITESPACES
    function hasWhiteSpace(username) {
        return !/\s/.test(username);
    }
    //END VALIDATIONS FOR FORM SUBMIT


    


 }); // ON PAGE LOADED