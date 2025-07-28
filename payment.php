<?php include 'includes/header.php'; ?>
<?php
$breadcrumb_items = [
  ['label' => 'Home', 'url' => 'Home.php'],
  ['label' => 'Payment Information']
];
include 'includes/breadcrumb.php';
?>

<section class="payment-section">
  <h2>Payment Information</h2>

  <!-- Personal Information Form -->
  <form id="personal-info-form" action="process_personal_info.php" method="POST" class="mb-5">
    <div class="customer-info">
      <h3>Personal Information</h3>
      <div class="mb-3">
        <label for="consultName" class="form-label">Name</label>
        <input type="text" class="form-control" id="consultName" name="name" placeholder="Enter your full name" required
          aria-describedby="consultNamePlaceholder">
        <span id="consultNamePlaceholder" class="visually-hidden">Enter your full name</span>
      </div>
      <div class="mb-3">
        <label for="consultEmail" class="form-label">Email</label>
        <input type="email" class="form-control" id="consultEmail" name="email" placeholder="Enter your email address"
          required aria-describedby="consultEmailPlaceholder">
        <span id="consultEmailPlaceholder" class="visually-hidden">Enter your email address</span>
      </div>
      <div class="mb-3">
        <label for="consultPhone" class="form-label">Phone</label>
        <input type="tel" class="form-control" id="consultPhone" name="phone" placeholder="Enter your phone number"
          aria-describedby="consultPhonePlaceholder">
        <span id="consultPhonePlaceholder" class="visually-hidden">Enter your phone number</span>
      </div>
      <button type="submit" class="btn btn-gold w-100">Save Personal Information</button>
    </div>
  </form>

  <!-- Payment Method and Details Form -->
  <form id="payment-form" action="process_payment.php" method="POST">
    <!-- Payment Method Selection -->
    <div class="payment-method-section">
      <h3>Choose Payment Method</h3>
      <div class="payment-methods">
        <label class="payment-option">
          <input type="radio" name="payment_method" value="credit_card" checked>
          <span class="payment-label">
            <i class="fas fa-credit-card" style="color: #b68f0e;"></i> Credit/Debit Card
          </span>
        </label>
        <label class="payment-option">
          <input type="radio" name="payment_method" value="paypal">
          <span class="payment-label">
            <i class="fab fa-paypal" style="color: #003087;"></i> PayPal
          </span>
        </label>
        <label class="payment-option">
          <input type="radio" name="payment_method" value="bank_transfer">
          <span class="payment-label">
            <i class="fas fa-university" style="color: #4a4a4a;"></i> Bank Transfer
          </span>
        </label>
      </div>
    </div>

    <!-- Credit Card Fields -->
    <div id="credit-card-fields" class="payment-details">
      <div class="mb-3">
        <label class="form-label" for="card-number">Card Number</label>
        <input type="text" class="form-control" id="card-number" name="card_number" placeholder="1234 5678 9012 3456"
          required aria-describedby="cardNumberPlaceholder">
        <span id="cardNumberPlaceholder" class="visually-hidden">Enter your card number</span>
      </div>
      <div class="row">
        <div class="col-md-6 mb-3">
          <label class="form-label" for="expiry-date">Expiry Date</label>
          <input type="text" class="form-control" id="expiry-date" name="expiry_date" placeholder="MM/YY" required
            aria-describedby="expiryDatePlaceholder">
          <span id="expiryDatePlaceholder" class="visually-hidden">Enter card expiry date</span>
        </div>
        <div class="col-md-6 mb-3">
          <label class="form-label" for="cvv">CVV</label>
          <input type="text" class="form-control" id="cvv" name="cvv" placeholder="123" required
            aria-describedby="cvvPlaceholder">
          <span id="cvvPlaceholder" class="visually-hidden">Enter card CVV</span>
        </div>
      </div>
      <div class="mb-3">
        <label class="form-label" for="card-holder">Card Holder Name</label>
        <input type="text" class="form-control" id="card-holder" name="card_holder" placeholder="John Doe" required
          aria-describedby="cardHolderPlaceholder">
        <span id="cardHolderPlaceholder" class="visually-hidden">Enter card holder name</span>
      </div>
    </div>

    <!-- PayPal Fields -->
    <div id="paypal-fields" class="payment-details" style="display: none;">
      <div class="mb-3">
        <label class="form-label" for="paypal-email">PayPal Email</label>
        <input type="email" class="form-control" id="paypal-email" name="paypal_email" placeholder="example@paypal.com"
          aria-describedby="paypalEmailPlaceholder">
        <span id="paypalEmailPlaceholder" class="visually-hidden">Enter your PayPal email</span>
      </div>
    </div>

    <!-- Bank Transfer Fields -->
    <div id="bank-transfer-fields" class="payment-details" style="display: none;">
      <div class="mb-3">
        <label class="form-label" for="account-number">Account Number</label>
        <input type="text" class="form-control" id="account-number" name="account_number" placeholder="Account Number"
          aria-describedby="accountNumberPlaceholder">
        <span id="accountNumberPlaceholder" class="visually-hidden">Enter your account number</span>
      </div>
      <div class="mb-3">
        <label class="form-label" for="routing-number">Routing Number</label>
        <input type="text" class="form-control" id="routing-number" name="routing_number" placeholder="Routing Number"
          aria-describedby="routingNumberPlaceholder">
        <span id="routingNumberPlaceholder" class="visually-hidden">Enter your routing number</span>
      </div>
    </div>

    <div class="mb-3">
      <label class="form-label" for="amount">Amount ($)</label>
      <input type="number" class="form-control" id="amount" name="amount" placeholder="0.00" step="0.01" required
        aria-describedby="amountPlaceholder">
      <span id="amountPlaceholder" class="visually-hidden">Enter payment amount</span>
    </div>

    <button type="submit" class="pay-button btn btn-gold">Pay Now</button>
  </form>
</section>

<script>
  document.addEventListener('DOMContentLoaded', function () {
    const paymentMethods = document.querySelectorAll('input[name="payment_method"]');
    const creditCardFields = document.getElementById('credit-card-fields');
    const paypalFields = document.getElementById('paypal-fields');
    const bankTransferFields = document.getElementById('bank-transfer-fields');

    function togglePaymentFields() {
      const selectedMethod = document.querySelector('input[name="payment_method"]:checked').value;
      creditCardFields.style.display = selectedMethod === 'credit_card' ? 'block' : 'none';
      paypalFields.style.display = selectedMethod === 'paypal' ? 'block' : 'none';
      bankTransferFields.style.display = selectedMethod === 'bank_transfer' ? 'block' : 'none';
    }

    paymentMethods.forEach(method => {
      method.addEventListener('change', togglePaymentFields);
    });

    // Initial toggle to ensure correct fields are shown
    togglePaymentFields();
  });
</script>


<?php include 'includes/footer.php'; ?>