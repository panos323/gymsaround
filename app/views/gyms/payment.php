<?php require  APPROOT . '/views/inc/header.php'?>
<div class="payment-css">
    <div class="container">
        <h2 class="my-4 text-center">Συνδρομή <?php echo $data['month']; ?> μηνών <?php echo $data['amount']; ?>&euro; στο <?php echo $data['name']; ?></h2>
        <form action="<?php echo URLROOT; ?>/gyms/payment" method="post" id="payment-form">
            <div class="form-row">
                <input type="text" name="first_name" class="form-control mb-3 StripeElement StripeElement--empty" placeholder="First Name">
                <input type="text" name="last_name" class="form-control mb-3 StripeElement StripeElement--empty" placeholder="Last Name">
                <input type="email" name="email" class="form-control mb-3 StripeElement StripeElement--empty" placeholder="Email Address">
                <input type="hidden" value="Συνδρομή <?php echo $data['month']; ?> μηνών <?php echo $data['amount']; ?>Ε στο <?php echo $data['name']; ?>" name="description">
                <input type="hidden" value="<?php echo $data['amount']; ?>" name="amount">
                <div id="card-element" class="form-control">
                    <!-- A Stripe Element will be inserted here. -->
                </div>

                <!-- Used to display form errors. -->
                <div id="card-errors" role="alert"></div>
            </div>

            <button>Submit Payment</button>
        </form>
    </div>
</div>
    <script src="https://js.stripe.com/v3/"></script>
    <script src="<?php echo URLROOT; ?>/js/charge.js"/></script>
<?php require  APPROOT . '/views/inc/footer.php'?>