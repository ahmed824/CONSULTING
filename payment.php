<?php include 'includes/header.php'; ?>

<section class="payment-section">
  <h2>Payment Information</h2>
  <form id="payment-form" action="process_payment.php" method="POST">

    <!-- Payment Method Selection -->
    <div class="payment-method-section">
      <h3>Choose Payment Method</h3>
      <div class="payment-methods">
        <label class="payment-option">
          <input type="radio" name="payment_method" value="credit_card" checked>
          <span>Credit/Debit Card</span>
        </label>
        <label class="payment-option">
          <input type="radio" name="payment_method" value="paypal">
          <span>PayPal</span>
        </label>
        <label class="payment-option">
          <input type="radio" name="payment_method" value="bank_transfer">
          <span>Bank Transfer</span>
        </label>
      </div>
    </div>

    <!-- Customer Information Section -->
    <div class="customer-info">
      <h3>Customer Information</h3>
      <div class="mb-3">
        <label for="consultName" class="form-label">Name</label>
        <input type="text" class="form-control" id="consultName" name="name" required>
      </div>
      <div class="mb-3">
        <label for="consultEmail" class="form-label">Email</label>
        <input type="email" class="form-control" id="consultEmail" name="email" required>
      </div>
      <div class="mb-3">
        <label for="consultPhone" class="form-label">Phone</label>
        <input type="tel" class="form-control" id="consultPhone" name="phone">
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

<script>
  document.addEventListener('DOMContentLoaded', () => {
    const paymentMethods = document.querySelectorAll('input[name="payment_method"]');
    const paymentDetails = {
      'credit_card': document.getElementById('credit-card-fields'),
      'paypal': document.getElementById('paypal-fields'),
      'bank_transfer': document.getElementById('bank-transfer-fields')
    };

    paymentMethods.forEach(method => {
      method.addEventListener('change', () => {
        Object.values(paymentDetails).forEach(field => field.style.display = 'none');
        paymentDetails[method.value].style.display = 'block';

        // Update required fields based on payment method
        updateRequiredFields(method.value);
      });
    });

    function updateRequiredFields(method) {
      const fields = {
        'credit_card': ['card_number', 'expiry_date', 'cvv', 'card_holder'],
        'paypal': ['paypal_email'],
        'bank_transfer': ['account_number', 'routing_number']
      };

      Object.keys(paymentDetails).forEach(key => {
        const inputs = paymentDetails[key].querySelectorAll('input');
        inputs.forEach(input => {
          input.required = method === key && fields[key].includes(input.name);
        });
      });
    }

    // Basic form validation
    document.getElementById('payment-form').addEventListener('submit', (e) => {
      const amount = document.getElementById('amount').value;
      if (amount <= 0) {
        e.preventDefault();
        alert('Please enter a valid amount');
      }
    });

    // Input formatting
    document.getElementById('card-number').addEventListener('input', (e) => {
      let value = e.target.value.replace(/\D/g, '');
      value = value.match(/.{1,4}/g)?.join(' ') || value;
      e.target.value = value;
    });

    document.getElementById('expiry-date').addEventListener('input', (e) => {
      let value = e.target.value.replace(/\D/g, '');
      if (value.length > 2) {
        value = value.slice(0, 2) + '/' + value.slice(2);
      }
      e.target.value = value;
    });

    // Label animation for form inputs
    const form = document.getElementById('payment-form');
    if (form) {
      const inputs = form.querySelectorAll('input, textareaوری, select');
      inputs.forEach(input => {
        const label = form.querySelector('label[for="' + input.id + '"]');
        if (!label) return;
        input.addEventListener('focus', () => {
          label.classList.add('active');
        });
        input.addEventListener('blur', () => {
          label.classList.remove('active');
        });
      });
    }
  });
</script>

<?php include 'includes/footer.php'; ?>