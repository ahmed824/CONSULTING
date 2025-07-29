<?php include 'includes/header.php'; ?>
<?php
$breadcrumb_items = [
  ['label' => 'Home', 'url' => 'home.php'],
  ['label' => 'Services', 'url' => 'services.php'],
  ['label' => 'Payment']
];
include 'includes/breadcrumb.php';
?>

<div class="payment-container">
  <div class="payment-wrapper">
    <!-- Package Details Section -->
    <div class="package-section">
      <div>
        <div class="package-header">
          <div class="package-icon">⚡</div>
          <div>
            <h2 class="package-title">Standard Package</h2>
            <p class="package-subtitle">5/7 Services</p>
          </div>
        </div>
        <div class="package-price">
          <?php include 'includes/Reyal.php'; ?>56<span class="price-period"> / per month</span>
        </div>
        <ul class="package-features">
          <li><span class="feature-icon">✓</span> Bookkeeping & Financial Reporting</li>
          <li><span class="feature-icon">✓</span> Tax Preparation & Planning</li>
          <li><span class="feature-icon">✓</span> Payroll Management</li>
          <li><span class="feature-icon">✓</span> Financial Consulting</li>
          <li><span class="feature-icon">✓</span> Dedicated Account Manager</li>
          <li><span class="feature-icon disabled">○</span> Advanced Tax Optimization</li>
          <li><span class="feature-icon disabled">○</span> International Compliance</li>
        </ul>
      </div>
      <div class="auto-renewal">
        <div class="mt-0">
          <label class="policy-checkbox">
            <input type="checkbox" id="policy-agree" name="policy_agree" required aria-describedby="policyPlaceholder">
            <span class="policy-label">
              I agree to the <a href="policies.php" class="terms-link">Policies</a>
            </span>
          </label>
          <span id="policyPlaceholder" class="visually-hidden">Agree to the policies</span>
        </div>
      </div>
    </div>

    <!-- Payment Information Section -->
    <div class="payment-section">
      <div class="payment-header">
        <h2 class="payment-title">Final Step, Make the Payment</h2>
        <p class="payment-subtitle">
          If you would like to finalize your subscription, please complete the payment process using a valid payment
          method.
        </p>
      </div>
      <div class="payment-form-scroll">
        <form id="payment-form" action="process_payment.php" method="POST">
          <h3>Personal Information</h3>
          <!-- Personal Information -->
          <div class="form-group">
            <label for="consultName" class="form-label">Name</label>
            <input type="text" class="form-control" id="consultName" name="name" placeholder="Enter your full name"
              required aria-describedby="consultNamePlaceholder">
            <span id="consultNamePlaceholder" class="visually-hidden">Enter your full name</span>
          </div>
          <div class="form-group">
            <label for="email" class="form-label">Email</label>
            <input type="email" class="form-control" id="email" name="email" value="Deanna.Curtis@Example.Com"
              placeholder="Enter your email address" required aria-describedby="emailPlaceholder">
            <span id="emailPlaceholder" class="visually-hidden">Enter your email address</span>
          </div>
          <div class="form-group">
            <label for="consultPhone" class="form-label">Phone</label>
            <input type="tel" class="form-control" id="consultPhone" name="phone" placeholder="Enter your phone number"
              aria-describedby="consultPhonePlaceholder">
            <span id="consultPhonePlaceholder" class="visually-hidden">Enter your phone number</span>
          </div>
          <div class="form-group">
            <label for="city" class="form-label">City</label>
            <select class="custom-package-select" id="city" name="city" required aria-describedby="cityPlaceholder">
              <option value="" disabled>Select your city</option>
              <option value="Riyadh" selected>Riyadh</option>
              <option value="Jeddah">Jeddah</option>
              <option value="Mecca">Mecca</option>
              <option value="Medina">Medina</option>
              <option value="Dammam">Dammam</option>
              <option value="Khobar">Khobar</option>
              <option value="Abha">Abha</option>
              <option value="Tabuk">Tabuk</option>
              <option value="Hail">Hail</option>
              <option value="Jizan">Jizan</option>
            </select>
            <span id="cityPlaceholder" class="visually-hidden">Select your city</span>
          </div>
          <div class="form-group">
            <label for="address" class="form-label">Address</label>
            <input type="text" class="form-control" id="address" name="address" placeholder="Enter your full address"
              aria-describedby="addressPlaceholder">
            <span id="addressPlaceholder" class="visually-hidden">Enter your full address</span>
          </div>

          <!-- Payment Method Selection -->
          <div class="form-group">
            <h3>Payment Information</h3>
            <label class="form-label">Payment Method</label>
            <div class="payment-methods">
              <label class="payment-option">
                <input type="radio" name="payment_method" value="credit_card" checked>
                <span class="payment-option-content">
                  <i class="fas fa-credit-card"></i>
                  <span>Credit/Debit Card</span>
                </span>
              </label>
              <label class="payment-option">
                <input type="radio" name="payment_method" value="paypal">
                <span class="payment-option-content">
                  <i class="fab fa-paypal"></i>
                  <span>PayPal</span>
                </span>
              </label>
              <label class="payment-option">
                <input type="radio" name="payment_method" value="bank_transfer">
                <span class="payment-option-content">
                  <i class="fas fa-university"></i>
                  <span>Bank Transfer</span>
                </span>
              </label>
            </div>
          </div>

          <!-- Credit Card Information -->
          <div id="credit-card-section" class="payment-details">
            <div class="form-group">
              <label for="card-number" class="form-label">Credit Card Number</label>
              <div class="card-input">
                <input type="text" class="form-control" id="card-number" name="card_number"
                  placeholder="3431 2201 8931 855" required aria-describedby="cardNumberPlaceholder">
                <span class="card-brand" id="card-brand">VISA</span>
              </div>
              <span id="cardNumberPlaceholder" class="visually-hidden">Enter your credit card number</span>
            </div>
            <div class="form-row" id="card-details-row">
              <div class="form-group">
                <label for="expiry-date" class="form-label">Expiry Date</label>
                <input type="text" class="form-control" id="expiry-date" name="expiry_date" placeholder="12/05/23"
                  required aria-describedby="expiryDatePlaceholder">
                <span id="expiryDatePlaceholder" class="visually-hidden">Enter card expiry date</span>
              </div>
              <div class="form-group">
                <label for="cvv" class="form-label">CVV</label>
                <input type="text" class="form-control" id="cvv" name="cvv" placeholder="123" required
                  aria-describedby="cvvPlaceholder" pattern="\d{3,4}" maxlength="4">
                <span id="cvvPlaceholder" class="visually-hidden">Enter card CVV</span>
              </div>
            </div>
          </div>

          <!-- PayPal Section -->
          <div id="paypal-section" class="payment-details" style="display: none;">
            <div class="form-group">
              <label for="paypal-email" class="form-label">PayPal Email</label>
              <input type="email" class="form-control" id="paypal-email" name="paypal_email"
                placeholder="example@paypal.com" aria-describedby="paypalEmailPlaceholder">
              <span id="paypalEmailPlaceholder" class="visually-hidden">Enter your PayPal email</span>
            </div>
          </div>

          <!-- Bank Transfer Section -->
          <div id="bank-transfer-section" class="payment-details" style="display: none;">
            <div class="form-group">
              <label for="account-number" class="form-label">Account Number</label>
              <input type="text" class="form-control" id="account-number" name="account_number"
                placeholder="Enter your account number" aria-describedby="accountNumberPlaceholder">
              <span id="accountNumberPlaceholder" class="visually-hidden">Enter your account number</span>
            </div>
            <div class="form-group">
              <label for="routing-number" class="form-label">Routing Number</label>
              <input type="text" class="form-control" id="routing-number" name="routing_number"
                placeholder="Enter your routing number" aria-describedby="routingNumberPlaceholder">
              <span id="routingNumberPlaceholder" class="visually-hidden">Enter your routing number</span>
            </div>
          </div>

          <!-- Discount Section -->
          <div class="discount-section">
            <label for="discount-code" class="form-label">Discount Coupon</label>
            <div class="discount-input-group">
              <input type="text" class="form-control discount-input" id="discount-code" name="discount_code"
                placeholder="Enter coupon code  " aria-describedby="discountCodePlaceholder">
              <span id="discountCodePlaceholder" class="visually-hidden">Enter discount coupon code</span>
              <button type="button" class="apply-btn">Apply</button>
            </div>
          </div>

          <!-- Payment Actions -->
          <div class="payment-actions">
            <button type="button" class="btn btn-cancel">Cancel</button>
            <button type="submit" class="btn btn-primary">Make Payment</button>
          </div>
        </form>
      </div>
    </div>
  </div>
</div>

<?php include 'includes/footer.php'; ?>