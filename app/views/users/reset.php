<?php require  APPROOT . '/views/inc/header.php'?>
    <div class="row">
        <div class="col-lg-5 col-md-3 gym-title">
            <h1>GymAround</h1>
        </div>

        <!--start login form-->
        <div class="col-lg-5 col-md-6 mx-auto mt-5 login">
            <div class="card card-body" id="cardBodyForm">
                <?php flash('reset_success'); ?>
                <h2 class="mb-4">Αλλαγή κωδικού</h2>
                <form id="resetPasswordForm" action="<?php echo URLROOT; ?>/users/reset/<?php echo $data['token']; ?>" method="post">
                    <div class="form-group">
                        <input type="email"
                               name="email"
                               class=" form-control form-control-lg"
                               placeholder="E-mail"
                        >
                    </div>
                    <div class="form-group">
                        <input type="password"
                               name="password"
                               class=" form-control form-control-lg"
                               placeholder="Νέος Κωδικός"
                        >
                    </div>
                    <div class="form-group mt-3">
                        <input type="password"
                               name="confirm_password"
                               class=" form-control form-control-lg"
                               placeholder="Επιβεβαίωση κωδικού"
                        >
                    </div>
                    <div class="row">
                        <div class="col text-center">
                            <input type="submit" value="Αλλαγή Κωδικού" class="btn btn-success mt-3 mb-4">
                        </div>
                    </div>
                </form>
            </div>
        </div>
        <!--end login form-->
    </div><!--row-->
<?php require  APPROOT . '/views/inc/footer.php'?>