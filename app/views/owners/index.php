<?php require  APPROOT . '/views/inc/header.php'?>



<div class="row">
    <div class="col-md-12" id="imgpartner">
        <div class="col-md-8 offset-2" id="ourservices">
            <p class="titlepartner">Γινε Συνεργάτης!</p>
            <div class="row">
                <div class="col-md-2 offset-md-1 " id="stepsicons" >
                    <img src= " <?php echo URLROOT ?> /images/owners/edit.png" width="110" alt="teamimg">
                </div>    
                <div class="col-md-2 offset-md-2" id="stepsicons" >
                     <img src= " <?php echo URLROOT ?> /images/owners/edit1.png" width="110" alt="teamimg">
                </div>    
                <div class="col-md-2 offset-md-2" id="stepsicons">
                     <img src= " <?php echo URLROOT ?> /images/owners/edit.png" width="110" alt="teamimg">
                </div>
            </div>


            <div class="row" id="stepsdescription">
                <div class="col-md-4">
                    <p>Κάνε εγγραφή συμπληρώνοντας την φόρμα!</p>
                </div>    
                <div class="col-md-4" >
                    <p>Ετοίμασε την προβολή σου</p>
                </div>    
                <div class="col-md-4">
                    <p>Απόκτησε νεες συνδρομες</p>
                </div>
            </div>
        </div>
    </div>
</div>


<div class="partnerform">
    <p class="titlepartnerform">Συμπλήρωσε την Φόρμα!</p>
    <div class="row">
        <div class="col-md-6 offset-md-3">
            <div class="container">
                <form>
                <div class="form-row">
                        <div class="form-group col-md-6">
                        <label>Όνομα</label>
                        <input type="text" class="form-control" id="inputEmail4" >
                        </div>
                        <div class="form-group col-md-6">
                        <label >Επώνυμο</label>
                        <input type="text" class="form-control" id="inputPassword4">
                        </div>
                    </div>
                    <div class="form-group">
                        <label >Όνομα Χρήστη</label>
                        <input type="text" class="form-control" id="inputAddress2" >
                    </div>

                    <div class="form-group">
                        <label for="exampleFormControlInput1">Email</label>
                        <input type="email" class="form-control" id="exampleFormControlInput1" placeholder="name@example.com">
                    </div>

                    <div class="form-row">
                        <div class="form-group col-md-6">
                        <label >Κωδιός</label>
                        <input type="password" class="form-control" id="inputPassword4">
                        </div>
                        <div class="form-group col-md-6">
                        <label for="inputPassword4">Επιβεβαίωση Κωδικού</label></label>
                        <input type="password" class="form-control" id="inputPassword4">
                        </div>
                    </div>
                    
                   
                    
                  
                    <button type="submit" class="btn btn-primary" id="btnformpartner">Εγγραφή</button>
                </form>
            </div>
        </div>
    </div>
</div>


<?php require  APPROOT . '/views/inc/footer.php'?>
