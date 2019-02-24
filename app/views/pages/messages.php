<?php require  APPROOT . '/views/inc/header.php'?>
<div class="container">
    <div class="row">
        <div style="text-align: center" class="col-md-12">

<!-- Modal -->
<div class="modalMessages modal fade" id="messagesModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Gymaround</h5>
      </div>
      <div class="modal-body">
        <?php flash('general_messages'); ?>
      </div>
      <div class="modal-footer">
       
        <a href="<?php echo URLROOT; ?>/pages/index" class="btn btn-success btn-block">Επιστροφή στην αρχική</a>
      </div>
    </div>
  </div>
</div>


            <img class="mt-3" src="../public/images/message_page.jpg" alt="">
            <a style="display: block; width: 30%; margin: auto" href="<?php echo URLROOT; ?>/pages/index" class="btn btn-success mt-3 mb-3">Επιστροφή στην αρχική?</a>
        </div> <!--col-md-12-->
    </div> <!--row-->
</div> <!--container-->


<?php require  APPROOT . '/views/inc/footer.php'?>