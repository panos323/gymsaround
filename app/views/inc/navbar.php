

<nav class="navbar navbar-expand-lg  navbar-dark" id="navbarstyle">
    
        <a class="navbar-brand" href="<?php echo URLROOT; ?>" ><img class="navbar_logo" src="<?php echo URLROOT; ?>/images/logo_name.png" alt="logo"></a>
        <p id="gymaroundlogo" > Gymaround</p>
   
        <button class="navbar-toggler collapsed" type="button" data-toggle="collapse" data-target="#mydropdown" aria-controls="navbarsExampleDefault" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
  <div class="collapse navbar-collapse" id="mydropdown">

    <ul class="navbar-nav ml-auto">
        <li class="nav-item <?php echo (isset($view) && $view==='pages/index') ? 'active' : '';?>">
            <a class="nav-link" href="<?php echo URLROOT; ?>">Αρχική</a>
        </li>
        <li class="nav-item <?php echo (isset($view) && $view==='gyms/search') ? 'active' : '';?>">
            <a class="nav-link" href="<?php echo URLROOT; ?>/gyms/search">Γυμναστήρια</a>
        </li>
        <li class="nav-item  <?php echo (isset($view) && $view==='pages/blog') ? 'active' : '';?>">
            <a class="nav-link" href="<?php echo URLROOT; ?>/pages/blog">Blog</a>
        </li>
        <li class="nav-item  <?php echo (isset($view) && $view==='pages/about') ? 'active' : '';?>">
            <a class="nav-link" href="<?php echo URLROOT; ?>/pages/about">Εταιρεία</a>
        </li>
        <li class="nav-item  <?php echo (isset($view) && $view==='pages/contact') ? 'active' : '';?>">
            <a class="nav-link" href="<?php echo URLROOT; ?>/pages/contact">Επικοινωνία</a>
        </li>
        <?php if(isset($_SESSION['id'])) : ?>
            <li class="nav-item <?php echo (isset($view) && $view=== $_SESSION['type'] . '/profile') ? 'active' : '';?>">
                <a class="nav-link" href="<?php echo URLROOT; ?>/<?php echo $_SESSION['type']; ?>/profile/account">Προφίλ</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="<?php echo URLROOT; ?>/<?php echo $_SESSION['type']; ?>/logout">Αποσύνδεση</a>
            </li>
        <?php else : ?>
            <!-- id="btnregister" -->
            <li id="btnliButtonFirst"  class="nav-item navbar-right btnNavabarStyle" <?php echo (isset($view) && $view=== 'users/register') ? 'active' : '';?>" >
            <button class="btn btn-outline-info " type="button"  data-toggle="modal" data-target="#registermodal">Εγγραφή</button>
            </li>
            <!--  id="btnlogin" -->
            <li  class="nav-item navbar-right btnNavabarStyle <?php echo (isset($view) && $view==='users/login') ? 'active' : '';?>">
                 <button  class="btn btn-outline-info" type="button"  id="btnlogin" data-toggle="modal" data-target="#loginmodal">Είσοδος</button>
            </li>
        <?php endif; ?>
    </ul>

  </div>

</nav>
    
<!------- *****************MODAL REGISTER*****************------->
    <div class="modal fade bd-example-modal-lg" id="registermodal" role="dialog">
    <div class="modal-dialog modal-lg">
    
      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">
        <h4 class="modal-title" id="modalregistertitle">Φόρμα Εγγραφής</h4>
          <button type="button" class="close" data-dismiss="modal">&times;</button>
         
        </div>
        <div class="modal-body">
        <form id="registerForm" action="<?php echo URLROOT; ?>/users/register" method="post">
                 <div class="form-group">
                    <label for="name">Όνομα</label>
                    <span class="text-center text-danger font-italic nameErr"></span>
                    <input type="text"
                           class="form-control"
                           id="name"
                           name="first_name"
                    >
                </div>
                <div class="form-group">
                    <label for="last_name">Επώνυμο</label>
                    <span class="text-center text-danger font-italic SurnameErr"></span>
                    <input type="text"
                           name="last_name"
                           class="form-control"
                           id="last_name"
                    >
                </div>
                <div class="form-group">
                    <label for="username">Όνομα Χρήστη</label>
                    <span class="text-center text-danger font-italic UsernameErr"></span>
                    <input type="text"
                           class="form-control"
                           id="username"
                           name="username"
                    >
                </div>
                <div class="form-group">
                    <label for="email">Email</label>
                    <span class="text-center text-danger font-italic MailErr"></span>
                    <input type="email"
                           class="form-control"
                           id="email"
                           name="email"
                    >
                </div>
                <div class="form-group">
                    <label for="password">Κωδικός</label>
                    <span class="text-center text-danger font-italic PasswordErr"></span>
                    <input type="password"
                           class="form-control"
                           id="password"
                           name="password"
                    >
                </div>
                <div class="form-group">
                    <label for="confrim_pass">Επιβεβαίωση κωδικού</label>
                    <span class="text-center text-danger font-italic passwordMatchErr"></span>
                    <input type="password"
                           class="form-control"
                           id="confrim_pass"
                           name="confirm_password"
                    >
                </div>
                <div class="form-check">
                    <input type="checkbox" class="form-check-input" id="exampleCheck1">
                    <label class="form-check-label" for="exampleCheck1">Εγγραφή στο Newslettert</label><br>
                </div>
                <div class="form-check">
                    <input type="checkbox" class="form-check-input" id="acceptTerms">
                    <label class="form-check-label" for="acceptTerms">Αποδέχομαι τους όρους 
                    </label>
                    <span class="text-center text-danger font-italic checkIfChecked"></span>
                    <br>
                </div>
                <button type="submit" class="btnmodalform" id="btnmodalregister">Εγγραφή</button>
                <a href="#" id="logintext">Είσοδος></a>
            </form>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        </div>
      </div>
      
    </div>
  </div>


  <!------- *****************MODAL LOGIN*****************------->
  <div class="modal fade" id="loginmodal" role="dialog">
    <div class="modal-dialog ">
      <!-- Modal content-->
      <div class="modal-content" id="modalcontentlogin">
        <div class="modal-header">
          <h4 class="modal-title">Είσοδος</h4>
          <button type="button" class="close" data-dismiss="modal">&times;</button>
        </div>
        <div class="modal-body">     
            <form id="loginForm" action="<?php echo URLROOT; ?>/users/login" method="post">
                <div class="form-group">
                    <label for="exampleInputEmailLog">Email ή Όνομα Χρήστη</label>
                    <span class="text-center text-danger font-italic nameEmailLoginErr"></span>
                    <input type="text"
                           name="login_credential"
                           class="form-control"
                           id="exampleInputEmailLog"
                          >
                </div>
                <div class="form-group">
                    <label for="passwordLoginPopUp">Κωδικός</label>
                    <span class="text-center text-danger font-italic PasswordErrLogin"></span>
                    <input type="password"
                           class="form-control"
                           id="passwordLoginPopUp"
                           name="password"
                         >
                </div>
                <div class="form-check">
                    <input type="checkbox" class="form-check-input" id="checkOutLoginC">
                    <label class="form-check-label" for="checkOutLoginC">Check me out</label>
                    <span class="text-center text-danger font-italic checkIfCheckedLogin"></span>
                    </br>
                </div>
                <button type="submit" class="btnmodalform">Είσοδος</button></br>
                <button type="button"  data-toggle="modal" data-target="#forgotpassmodal" id="forgotpass" >Ξέχασα τον κωδικό!</button>
                
            </form>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        </div>
      </div>
      
    </div>
  </div>
<!-------*******************MODAL FORGOTPASS-------->
<div id="forgotpassmodal" class="modal fade" role="dialog" style="z-index: 1500;">
  <div class="modal-dialog">
    <!-- Modal content-->
    <div class="modal-content" id="modalcontentfgpass">
      
    <div class="modal-header">
          <h4 class="modal-title" id="forgotpasstitle">Aποστολή νέου κωδικού!</h4>
          <button type="button" class="close" data-dismiss="modal">&times;</button>
        </div>
        <div class="modal-body">
            <?php flash('forgot_success'); ?>
            <form id="forgotpassform" action="<?php echo URLROOT; ?>/users/forgotPassword" method="post">
            <div class="form-group">
                    <label for="email">Email</label>
                    <input type="email"
                           class="form-control"
                           id="email"
                           name="email"
                    >
                </div>
                <button type="submit" class="btnmodalform">Αποστολή</button></br>
            </form>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        </div>
    </div>
  </div>
</div>