<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
    <a class="navbar-brand" href="<?php echo URLROOT; ?>"><img class="navbar_logo" src="<?php echo URLROOT; ?>/images/logo.png" alt="logo"></a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarsExampleDefault" aria-controls="navbarsExampleDefault" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse">
        <ul class="navbar-nav ml-auto">
            <li class="nav-item <?php echo (isset($view) && $view==='pages/index') ? 'active' : '';?>">
                <a class="nav-link" href="<?php echo URLROOT; ?>">Αρχική</a>
            </li>
            <li class="nav-item <?php echo (isset($view) && $view==='gyms/search') ? 'active' : '';?>">
                <a class="nav-link" href="<?php echo URLROOT; ?>/gyms/search">Γυμναστήρια</a>
            </li>
            <li class="nav-item <?php echo (isset($view) && $view==='pages/about') ? 'active' : '';?>">
                <a class="nav-link" href="<?php echo URLROOT; ?>/pages/about">Εταιρεία</a>
            </li>
            <?php if(isset($_SESSION['user_id'])) : ?>
                <li class="nav-item <?php echo (isset($view) && $view==='users/profile') ? 'active' : '';?>">
                    <a class="nav-link" href="<?php echo URLROOT; ?>/users/profile/<?php echo $_SESSION['username'];?>">Προφίλ</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="<?php echo URLROOT; ?>/users/logout">Αποσύνδεση</a>
                </li>
            <?php else : ?>
                <li class="nav-item <?php echo (isset($view) && $view==='users/register') ? 'active' : '';?>">
                    <a class="nav-link" href="<?php echo URLROOT; ?>/users/register">Εγγραφή</a>
                </li>
                <li class="nav-item <?php echo (isset($view) && $view==='users/login') ? 'active' : '';?>">
                    <a class="nav-link" href="<?php echo URLROOT; ?>/users/login">Είσοδος</a>
                </li>
            <?php endif; ?>
        </ul>
    </div>
</nav>