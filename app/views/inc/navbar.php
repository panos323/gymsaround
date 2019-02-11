

    <nav class="navbar navbar-expand-md  navbar-dark " id="navbarstyle">
    
        <div class="navbar-header">   
        <a class="navbar-brand " href="<?php echo URLROOT; ?>"><img class="navbar_logo" src="<?php echo URLROOT; ?>/images/logo.png" alt="logo"></a>
        <button class="navbar-toggler collapsed" type="button" data-toggle="collapse" data-target="#mydropdown" aria-controls="navbarsExampleDefault" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        </div>
  <div class="collapse navbar-collapse" id="mydropdown">

        <ul class="navbar-nav offset-8 justify-content-end">
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
            <?php if(isset($_SESSION['id'])) : ?>
                <li class="nav-item <?php echo (isset($view) && $view=== $_SESSION['type'] . '/profile') ? 'active' : '';?>">
                    <a class="nav-link" href="<?php echo URLROOT; ?>/<?php echo $_SESSION['type']; ?>/profile/account">Προφίλ</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="<?php echo URLROOT; ?>/<?php echo $_SESSION['type']; ?>/logout">Αποσύνδεση</a>
                </li>
            <?php else : ?>
                <li id="btnregister" class="nav-item navbar-right" <?php echo (isset($view) && $view=== 'users/register') ? 'active' : '';?>" >
                <button type="button"  data-toggle="modal" data-target="#registermodal">Εγγραφή</button>
                </li>
                <li  id="btnlogin" class="nav-item <?php echo (isset($view) && $view==='users/login') ? 'active' : '';?>">
                     <button type="button" class="navbar-right" id="btnlogin" data-toggle="modal" data-target="#loginmodal">Είσοδος</button>
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
        <form>
                 <div class="form-group">
                    <label for="exampleInputEmail1">Όνομα</label>
                    <input type="first-name" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" >
                </div>
                <div class="form-group">
                    <label for="exampleInputEmail1">Επώνυμο</label>
                    <input type="last-name" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
                </div>
                <div class="form-group">
                    <label for="exampleInputEmail1">Όνομα Χρήστη</label>
                    <input type="username" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" >
                </div>
                <div class="form-group">
                    <label for="exampleInputEmail1">Email</label>
                    <input type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" >
                </div>
                <div class="form-group">
                    <label for="exampleInputPassword1">Κωδικός</label>
                    <input type="password" class="form-control" id="exampleInputPassword1">
                </div>
                <div class="form-group">
                    <label for="exampleInputPassword1">Επιβεβαίωση κωδικού</label>
                    <input type="password" class="form-control" id="exampleInputPassword1" >
                </div>
                <div class="form-check">
                    <input type="checkbox" class="form-check-input" id="exampleCheck1">
                    <label class="form-check-label" for="exampleCheck1">Εγγραφή στο Newslettert</label></br>
                </div>
                <div class="form-check">
                    <input type="checkbox" class="form-check-input" id="exampleCheck1">
                    <label class="form-check-label" for="exampleCheck1">Αποδέχομαι τους όρους</label></br>
                </div>
                <button type="submit" class="btnmodalform" id="btnmodalregister">Εγγραφή</button>
                <button type="submit" class="btnmodalform" id="btnmodalfb">Εγγραφή με facebook</button></br>
                <a href="#" id="logintext">Είσοδος  ></a>
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
                    <label for="exampleInputEmail1">Email ή Όνομα Χρήστη</label>
                    <input type="text"
                           name="login_credential"
                           class="form-control"
                           id="exampleInputEmail1"
                          >
                </div>
                <div class="form-group">
                    <label for="exampleInputPassword1">Κωδικός</label>
                    <input type="password"
                           class="form-control"
                           id="exampleInputPassword1"
                           name="password"
                         >
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

