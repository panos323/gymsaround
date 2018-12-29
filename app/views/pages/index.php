<?php require  APPROOT . '/views/inc/header.php'?>
    <h1><?php echo $data['title'] ?></h1>
    <p>This is our website for Creative Project of SAE Athens.</p>
    <?php if(isset($_SESSION['user_id'])) : ?>
        <a class="btn btn-success btn-block" href="<?php echo URLROOT;?>/users/logout">Logout</a>
    <?php endif; ?>
<?php require  APPROOT . '/views/inc/footer.php'?>