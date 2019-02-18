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

    //ON REGISTER POP UP FORM SUMBIT
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

    //ON LOGIN POP UP FORM SUMBIT
    loginUserForm.on("submit", function(e) {

        var nameEmail = $("#exampleInputEmailLog").val().trim();
        var myPassword = $("#passwordLoginPopUp").val().trim();
        var isCheckForm = $("#checkOutLoginC").is(":checked");

        validateNameEmail(nameEmail,e);
        validateLoginPassword(myPassword,e);
        validateLoginCheckbox(isCheckForm,e);
    }) // on submit 


    //START FUNCTIONS FOR LOGIN POP UP VALIDATION

    function validateNameEmail(nameEmail,e) {
        if (!isValidName(nameEmail)) {
            $(".nameEmailLoginErr").text(' (Name/Email should be at least two characters long)');
            e.preventDefault();
        } else {
            $(".nameEmailLoginErr").text("");
        }
    } //end function 


    function validateLoginPassword(myPassword,e) {
        if (!isValidPassowrd(myPassword)) {
        $(".PasswordErrLogin").text(" (Please enter a password that contains at least 6 characters)");
        e.preventDefault();
        } else {
            $(".PasswordErrLogin").text("");
        }
    } //end function

    function validateLoginCheckbox(isCheckForm,e) {
        if (!isCheckForm) {
            $(".checkIfCheckedLogin").text(" (Please agree with the terms)");
            e.preventDefault();
        } else {
            $(".checkIfCheckedLogin").text("");
        }
    }
    

    //END FUNCTIONS FOR LOGIN POP UP VALIDATION



    // FUNCTIONS FOR NAME VALIDATION
    function validateName(firstname,e) {
        if (!isValidName(firstname)) {
            $(".nameErr").text(' (Name should be at least two characters long)');
            e.preventDefault();
        } else if (!isOnlyLetters(firstname)) {
            $(".nameErr").text(' (Name should contain only characters)');
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
            $(".SurnameErr").text(' (Surname should be at least two characters long)');
            e.preventDefault();
        } else if (!isOnlyLetters(surname)) {
            $(".SurnameErr").text(' (Surname should contain only characters)');
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
            $(".UsernameErr").text(' (Username should be at least two characters long)');
            e.preventDefault();
        } else if (!hasWhiteSpace(username)) {
            $(".UsernameErr").text(' (Please enter a valid username)');
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
            $(".MailErr").text('(Please enter a valid email)');
            e.preventDefault();
        } else if (isEmailOk(emailcheck)) {
            $(".MailErr").text('(Please enter a valid email)');
            e.preventDefault();
        } else {
            $(".MailErr").html("");
        }
    } //end function

    function isValidEmail(emailcheck) {
        return emailcheck.length >= 6;
    } //end function

    function isEmailOk(emailcheck) {
        var regex = /^([a-zA-Z0-9_.+-])+\@(([a-zA-Z0-9-])+\.)+([a-zA-Z0-9]{2,4})+$/;
        return !regex.test(emailcheck)
    }

    // FUNCTIONS FOR PASSWORD VALIDATION
    function validatePassword(myPassword,e) {
        if (!isValidPassowrd(myPassword)) {
        $(".PasswordErr").text(" (Please enter a password that contains at least 6 characters)");
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
            $(".passwordMatchErr").text(" (Passwords should match)");
            e.preventDefault();
        } else {
            $(".passwordMatchErr").text("");
        }
    } //end function


    //FUNCTION FOR CHECKBOX VALIDATION
    function validateCheckboxField(isCheckForm,e) {
        if (!isCheckForm) {
            $(".checkIfChecked").text(" (Please agree with the terms)");
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