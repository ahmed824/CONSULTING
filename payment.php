<?php include 'includes/header.php'; ?>
<?php $breadcrumb_items = [
  ['label' => 'Home', 'url' => 'Home.php'],
  ['label' => 'Payment Information']
];
include 'includes/breadcrumb.php'; ?>
<section class="payment-section">
  <h2>Payment Information</h2>
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

    <!-- Customer Information Section -->
    <div class="customer-info">
      <h3>Customer Information</h3>
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
    </div>

    <!-- Credit Card Fields -->
    <div id="credit-card-fields" class="payment-details">
      <div class="form-group">
        <label class="form-label" for="card-number">Card Number</label>
        <input type="text" id="card-number" name="card_number" placeholder="1234 5678 9012 3456" required>
      </div>
      <div class="form-row">
        <div class="form-group">
          <label class="form-label" for="expiry-date">Expiry Date</label>
          <input type="text" id="expiry-date" name="expiry_date" placeholder="MM/YY" required>
        </div>
        <div class="form-group">
          <label class="form-label" for="cvv">CVV</label>
          <input type="text" id="cvv" name="cvv" placeholder="123" required>
        </div>
      </div>
      <div class="form-group">
        <label class="form-label" for="card-holder">Card Holder Name</label>
        <input type="text" id="card-holder" name="card_holder" placeholder="John Doe" required>
      </div>
    </div>

    <!-- PayPal Fields -->
    <div id="paypal-fields" class="payment-details" style="display: none;">
      <div class="form-group">
        <label class="form-label" for="paypal-email">PayPal Email</label>
        <input type="email" id="paypal-email" name="paypal_email" placeholder="example@paypal.com">
      </div>
    </div>

    <!-- Bank Transfer Fields -->
    <div id="bank-transfer-fields" class="payment-details" style="display: none;">
      <div class="form-group">
        <label class="form-label" for="account-number">Account Number</label>
        <input type="text" id="account-number" name="account_number" placeholder="Account Number">
      </div>
      <div class="form-group">
        <label class="form-label" for="routing-number">Routing Number</label>
        <input type="text" id="routing-number" name="routing_number" placeholder="Routing Number">
      </div>
    </div>

    <div class="form-group">
      <label class="form-label" for="amount">Amount ($)</label>
      <input type="number" id="amount" name="amount" placeholder="0.00" step="0.01" required>
    </div>

    <button type="submit" class="pay-button">Pay Now</button>
  </form>
</section>

<?php include 'includes/footer.php'; ?>