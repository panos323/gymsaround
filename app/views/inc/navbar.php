<nav class="navbar navbar-expand-lg navbar-dark " id="navbarstyle">
  
    <a class="navbar-brand offset-md-1" href="<?php echo URLROOT; ?>"><img class="navbar_logo" src="<?php echo URLROOT; ?>/images/logo.png" alt="logo"></a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarsExampleDefault" aria-controls="navbarsExampleDefault" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse">
        <ul class="navbar-nav offset-7">
            <li class="nav-item <?php echo (isset($view) && $view==='pages/index') ? 'active' : '';?>">
                <a class="nav-link" href="<?php echo URLROOT; ?>">Αρχική</a>
            </li>
            <li class="nav-item <?php echo (isset($view) && $view==='gyms/search') ? 'active' : '';?>">
                <a class="nav-link" href="<?php echo URLROOT; ?>/gyms/search">Γυμναστήρια</a>
            </li>
            <li class="nav-item  <?php echo (isset($view) && $view==='pages/about') ? 'active' : '';?>">
                <a class="nav-link" href="<?php echo URLROOT; ?>/pages/about">Εταιρεία</a>
            </li>
            <?php if(isset($_SESSION['id'])) : ?>
                <li class="nav-item <?php echo (isset($view) && $view=== $_SESSION['type'] . '/profile') ? 'active' : '';?>">
                    <a class="nav-link" href="<?php echo URLROOT; ?>/<?php echo $_SESSION['type']; ?>/profile/account">Προφίλ</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="<?php echo URLROOT; ?>/<?php echo $_SESSION['type']; ?>/logout">Αποσύνδεση</a>
                </li>
            <?php else : ?>
                <li class="nav-item col-md-3 offset-md-1 id="styleregisterbtn" <?php echo (isset($view) && $view=== 'users/register') ? 'active' : '';?>" >
                <button type="button"  id="btnregister" data-toggle="modal" data-target="#registermodal">Εγγραφή</button>
                </li>
                <li class="nav-item col-md-3 <?php echo (isset($view) && $view==='users/login') ? 'active' : '';?>">
                     <button type="button"  id="btnlogin" data-toggle="modal" data-target="#loginmodal">Είσοδος</button>
                </li>
            <?php endif; ?>
        </ul>
    </div>

    
<!------- *****************MODAL REGISTER*****************------->
    <div class="modal fade bd-example-modal-lg" id="registermodal" role="dialog">
    <div class="modal-dialog modal-lg">
    
      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">
        <h4 class="modal-title">Εγγραφή</h4>
          <button type="button" class="close" data-dismiss="modal">&times;</button>
         
        </div>
        <div class="modal-body">
          <p>Some text in the modal.</p>
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
      <div class="modal-content">
        <div class="modal-header">
          <h4 class="modal-title">Είσοδος</h4>
          <button type="button" class="close" data-dismiss="modal">&times;</button>
        </div>
        <div class="modal-body">     
            <form>
                <div class="form-group">
                    <label for="exampleInputEmail1">Email address</label>
                    <input type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter email">
                </div>
                <div class="form-group">
                    <label for="exampleInputPassword1">Password</label>
                    <input type="password" class="form-control" id="exampleInputPassword1" placeholder="Password">
                </div>
                <div class="form-check">
                    <input type="checkbox" class="form-check-input" id="exampleCheck1">
                    <label class="form-check-label" for="exampleCheck1">Check me out</label></br>
                </div>
                <button type="submit" class="btnmodalform">Είσοδος</button></br>
                <a href="#" id="forgotpass">Ξέχασα τον κωδικό!</a>
            </form>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        </div>
      </div>
      
    </div>
  </div>


</nav>