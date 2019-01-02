<nav class="navbar navbar-expand-lg navbar-dark bg-dark mb-3">
    <a class="navbar-brand" href="<?php echo URLROOT; ?>"><?php echo SITENAME; ?></a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarsExampleDefault" aria-controls="navbarsExampleDefault" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse">
        <ul class="navbar-nav ml-auto">
            <li class="nav-item <?php echo (isset($view) && $view==='pages/index') ? 'active' : '';?>">
                <a class="nav-link" href="<?php echo URLROOT; ?>">Αρχική</a>
            </li>
            <li class="nav-item <?php echo (isset($view) && $view==='pages/index') ? 'active' : '';?>">
                <a class="nav-link" href="<?php echo URLROOT; ?>">Γυμναστήρια</a>
            </li>
            <li class="nav-item <?php echo (isset($view) && $view==='pages/about') ? 'active' : '';?>">
                <a class="nav-link" href="<?php echo URLROOT; ?>/pages/about">Εταιρεία</a>
            </li>
            <li class="nav-item <?php echo (isset($view) && $view==='users/register') ? 'active' : '';?>">
                <a class="nav-link" href="<?php echo URLROOT; ?>/users/register">Εγγραφή</a>
            </li>
            <li class="nav-item <?php echo (isset($view) && $view==='users/login') ? 'active' : '';?>">
                <a class="nav-link" href="<?php echo URLROOT; ?>/users/login">Είσοδος</a>
            </li>
        </ul>
    </div>
</nav>