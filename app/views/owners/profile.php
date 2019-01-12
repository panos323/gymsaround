<?php require  APPROOT . '/views/inc/header.php'?>
<div class="row profile">
    <div class="col-md-2 sidemenu">
        <div class="list-group">
            <a href="<?php echo URLROOT; ?>/owners/profile/account" class="list-group-item <?php echo ($data['type'] === 'account') ? 'active_profile_tab' : ''; ?>">Λογαριασμός</a>
            <a href="<?php echo URLROOT; ?>/owners/profile/my_gym" class="list-group-item <?php echo ($data['type'] === 'my_gym') ? 'active_profile_tab' : ''; ?>">Γυμναστήριο</a>
            <a href="<?php echo URLROOT; ?>/owners/profile/my_trainers" class="list-group-item <?php echo ($data['type'] === 'my_trainers') ? 'active_profile_tab' : ''; ?>">Γυμναστές</a>
        </div>
    </div>
    <div class="col-md-10">
        <div class="row main_profile">

            <!-- This is the display for Owners info -->
            <?php if($data['type'] === 'account')  : ?>
            <div class="col-md-12 profile_boxes">
                <h4>Τα στοιχεία μου</h4>
            </div>

            <!-- This is the display for gym details upload -->
            <?php elseif ($data['type'] === 'my_gym') : ?>
            <div class="col-md-12 profile_boxes">
                <h4>Το γυμναστήριό μου</h4>
            </div>

            <!-- This is the display for trainers details upload   -->
            <?php elseif ($data['type'] === 'my_trainers') : ?>
            <div class="col-md-12 profile_boxes">
                <h4>Οι γυμναστές μου</h4>
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