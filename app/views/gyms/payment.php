<?php require  APPROOT . '/views/inc/header.php'?>
    <form action="<?php echo URLROOT; ?>/gyms/payment" method="post" id="payment-form">
        <div class="form-row">
            <label for="card-element">
                Credit or debit card
            </label>
            <div id="card-element">
                <!-- A Stripe Element will be inserted here. -->
            </div>

            <!-- Used to display form errors. -->
            <div id="card-errors" role="alert"></div>
        </div>

        <button>Submit Payment</button>
    </form>
    <script src="https://js.stripe.com/v3/"></script>
    <script src="<?php echo URLROOT; ?>/js/charge.js"/></script>
<?php require  APPROOT . '/views/inc/footer.php'?>