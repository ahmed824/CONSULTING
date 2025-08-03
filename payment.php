<?php include 'includes/header.php'; ?>

<style>
  /* Modal Styles */
  .modal-overlay {
    position: fixed;
    top: 0;
    left: 0;
    width: 100%;
    height: 100%;
    background: rgba(0, 0, 0, 0.8);
    z-index: 1000;
    display: flex;
    align-items: center;
    justify-content: center;
    opacity: 0;
    visibility: hidden;
    transition: all 0.3s ease;
  }

  .modal-overlay.active {
    opacity: 1;
    visibility: visible;
  }

  .success-modal {
    background: white;
    border-radius: 20px;
    padding: 50px;
    max-width: 500px;
    width: 90%;
    text-align: center;
    transform: scale(0.8);
    transition: all 0.3s ease;
    box-shadow: 0 30px 60px rgba(0, 0, 0, 0.3);
    position: relative;
  }

  .modal-overlay.active .success-modal {
    transform: scale(1);
  }

  .success-icon {
    width: 80px;
    height: 80px;
    background: linear-gradient(135deg, #27ae60, #2ecc71);
    border-radius: 50%;
    display: flex;
    align-items: center;
    justify-content: center;
    margin: 0 auto 30px;
    animation: pulse 2s infinite;
  }

  .success-icon i {
    font-size: 36px;
    color: white;
  }

  @keyframes pulse {
    0% {
      transform: scale(1);
    }

    50% {
      transform: scale(1.1);
    }

    100% {
      transform: scale(1);
    }
  }

  .modal-title {
    font-size: 32px;
    font-weight: 700;
    color: #2c3e50;
    margin-bottom: 15px;
  }

  .modal-subtitle {
    color: #7f8c8d;
    font-size: 18px;
    margin-bottom: 30px;
    line-height: 1.6;
  }

  .payment-details-summary {
    background: #f8f9fa;
    padding: 25px;
    border-radius: 15px;
    margin-bottom: 30px;
    text-align: left;
  }

  .summary-row {
    display: flex;
    justify-content: space-between;
    margin-bottom: 10px;
    font-size: 16px;
  }

  .summary-row:last-child {
    font-weight: 700;
    font-size: 18px;
    padding-top: 10px;
    border-top: 2px solid #e1e8ed;
    margin-bottom: 0;
  }

  .modal-actions {
    display: flex;
    gap: 15px;
    justify-content: center;
  }

  .btn-download {
    background: linear-gradient(135deg, var(--dark-blue) 0% 60%, #23645d 100%);
    color: white !important;
    display: inline-flex;
    align-items: center;
    gap: 10px;
    padding: 12px 24px;
    border: none;
    border-radius: 8px;
    font-weight: 600;
    font-size: 16px;
    cursor: pointer;
    transition: all 0.3s ease !important;
    box-shadow: 0 4px 12px rgba(0, 0, 0, 0.1);
    text-decoration: none;
  }

  .btn-download:hover {
    transform: translateY(-2px);
    background: linear-gradient(135deg, #23645d 0% 40%, var(--dark-blue) 100%);
    box-shadow: 0 6px 18px rgba(0, 0, 0, 0.15);
  }

  .btn-download:disabled {
    opacity: 0.7;
    cursor: not-allowed;
    transform: none;
  }

  .btn-close-icon {
    position: absolute;
    top: 15px;
    right: 15px;
    background: #6c757d;
    color: white;
    border: none;
    border-radius: 50%;
    width: 40px;
    height: 40px;
    display: flex;
    align-items: center;
    justify-content: center;
    font-size: 20px;
    padding: 0;
    cursor: pointer;
    transition: background 0.3s ease;
  }

  .btn-close-icon:hover {
    background: #5a6268;
  }

  @media (max-width: 768px) {
    .success-modal {
      padding: 30px;
      margin: 20px;
    }

    .modal-actions {
      flex-direction: column;
    }

    .btn-close-icon {
      width: 36px;
      height: 36px;
      font-size: 18px;
      top: 10px;
      right: 10px;
    }
  }
</style>

<!-- Add jsPDF library -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf/2.5.1/jspdf.umd.min.js"></script>

</head>

<body>
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
            <?php include 'includes/Reyal.php'; ?>56
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
              <input type="checkbox" id="policy-agree" name="policy_agree" required>
              <span class="policy-label">
                I agree to the <a href="policies.php" class="terms-link">Policies</a>
              </span>
            </label>
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
          <form id="payment-form">
            <h3>Personal Information</h3>
            <!-- Personal Information -->
            <div class="form-group">
              <label for="consultName" class="form-label">Name</label>
              <input type="text" class="form-control" id="consultName" name="name" placeholder="Enter your full name"
                required>
            </div>
            <div class="form-group">
              <label for="email" class="form-label">Email</label>
              <input type="email" class="form-control" id="email" name="email" value="Deanna.Curtis@Example.Com"
                placeholder="Enter your email address" required>
            </div>
            <div class="form-group">
              <label for="consultPhone" class="form-label">Phone</label>
              <input type="tel" class="form-control" id="consultPhone" name="phone"
                placeholder="Enter your phone number">
            </div>
            <div class="form-group">
              <label for="city" class="form-label">City</label>
              <select class="custom-package-select" id="city" name="city" required>
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
            </div>
            <div class="form-group">
              <label for="address" class="form-label">Address</label>
              <input type="text" class="form-control" id="address" name="address" placeholder="Enter your full address">
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
                    placeholder="3431 2201 8931 855" required>
                  <span class="card-brand" id="card-brand">VISA</span>
                </div>
              </div>
              <div class="form-row" id="card-details-row">
                <div class="form-group">
                  <label for="expiry-date" class="form-label">Expiry Date</label>
                  <input type="text" class="form-control" id="expiry-date" name="expiry_date" placeholder="12/05/23"
                    required>
                </div>
                <div class="form-group">
                  <label for="cvv" class="form-label">CVV</label>
                  <input type="text" class="form-control" id="cvv" name="cvv" placeholder="123" required maxlength="4">
                </div>
              </div>
            </div>

            <!-- PayPal Section -->
            <div id="paypal-section" class="payment-details" style="display: none;">
              <div class="form-group">
                <label for="paypal-email" class="form-label">PayPal Email</label>
                <input type="email" class="form-control" id="paypal-email" name="paypal_email"
                  placeholder="example@paypal.com">
              </div>
            </div>

            <!-- Bank Transfer Section -->
            <div id="bank-transfer-section" class="payment-details" style="display: none;">
              <div class="form-group">
                <label for="account-number" class="form-label">Account Number</label>
                <input type="text" class="form-control" id="account-number" name="account_number"
                  placeholder="Enter your account number">
              </div>
              <div class="form-group">
                <label for="routing-number" class="form-label">Routing Number</label>
                <input type="text" class="form-control" id="routing-number" name="routing_number"
                  placeholder="Enter your routing number">
              </div>
            </div>

            <!-- Discount Section -->
            <div class="discount-section">
              <label for="discount-code" class="form-label">Discount Coupon</label>
              <div class="discount-input-group">
                <input type="text" class="form-control discount-input" id="discount-code" name="discount_code"
                  placeholder="Enter coupon code">
                <button type="button" class="apply-btn">Apply</button>
              </div>
            </div>
          </form>
        </div>

        <!-- Payment Actions -->
        <div class="payment-actions">
          <button type="button" class="btn btn-cancel">Cancel</button>
          <button type="submit" class="btn btn-primary" id="payment-submit" form="payment-form">Make Payment</button>
        </div>
      </div>
    </div>
  </div>

  <!-- Success Modal -->
  <div class="modal-overlay" id="success-modal">
    <div class="success-modal">
      <button class="btn btn-close-icon" id="close-payment-modal" title="Close">
        <i class="fas fa-times"></i>
      </button>
      <div class="success-icon">
        <i class="fas fa-check"></i>
      </div>
      <h2 class="modal-title">Payment Successful!</h2>
      <p class="modal-subtitle">Your payment has been processed successfully. Thank you for your purchase!</p>

      <div class="payment-details-summary">
        <div class="summary-row">
          <span>Package:</span>
          <span>Standard Package</span>
        </div>
        <div class="summary-row">
          <span>Amount:</span>
          <span>SAR 56.00</span>
        </div>
        <div class="summary-row">
          <span>Payment Method:</span>
          <span id="modal-payment-method">Credit Card</span>
        </div>
        <div class="summary-row">
          <span>Transaction ID:</span>
          <span id="transaction-id">#TXN123456789</span>
        </div>
        <div class="summary-row">
          <span>Total Paid:</span>
          <span>SAR 56.00</span>
        </div>
      </div>

      <div class="modal-actions">
        <button class="btn btn-download" id="download-bill">
          <i class="fas fa-download"></i>
          Download PDF Bill
        </button>
      </div>
    </div>
  </div>

  <script>
    document.addEventListener('DOMContentLoaded', function () {
      // Payment method switching
      const paymentMethods = document.querySelectorAll('input[name="payment_method"]');
      const creditCardSection = document.getElementById('credit-card-section');
      const paypalSection = document.getElementById('paypal-section');
      const bankTransferSection = document.getElementById('bank-transfer-section');
      const cardDetailsRow = document.getElementById('card-details-row');

      function switchPaymentMethod() {
        const selectedMethodInput = document.querySelector('input[name="payment_method"]:checked');
        const selectedMethod = selectedMethodInput ? selectedMethodInput.value : 'credit_card';

        if (creditCardSection && paypalSection && bankTransferSection && cardDetailsRow) {
          creditCardSection.style.display = selectedMethod === 'credit_card' ? 'block' : 'none';
          paypalSection.style.display = selectedMethod === 'paypal' ? 'block' : 'none';
          bankTransferSection.style.display = selectedMethod === 'bank_transfer' ? 'block' : 'none';
          cardDetailsRow.style.display = selectedMethod === 'credit_card' ? 'grid' : 'none';

          // Handle required attributes based on selected payment method
          const cardNumberInput = document.getElementById('card-number');
          const expiryDateInput = document.getElementById('expiry-date');
          const cvvInput = document.getElementById('cvv');
          const paypalEmailInput = document.getElementById('paypal-email');
          const accountNumberInput = document.getElementById('account-number');
          const routingNumberInput = document.getElementById('routing-number');

          if (selectedMethod === 'credit_card') {
            cardNumberInput.required = true;
            expiryDateInput.required = true;
            cvvInput.required = true;
            if (paypalEmailInput) paypalEmailInput.required = false;
            if (accountNumberInput) accountNumberInput.required = false;
            if (routingNumberInput) routingNumberInput.required = false;
          } else if (selectedMethod === 'paypal') {
            if (paypalEmailInput) paypalEmailInput.required = true;
            cardNumberInput.required = false;
            expiryDateInput.required = false;
            cvvInput.required = false;
            if (accountNumberInput) accountNumberInput.required = false;
            if (routingNumberInput) routingNumberInput.required = false;
          } else if (selectedMethod === 'bank_transfer') {
            if (accountNumberInput) accountNumberInput.required = true;
            if (routingNumberInput) routingNumberInput.required = true;
            cardNumberInput.required = false;
            expiryDateInput.required = false;
            cvvInput.required = false;
            if (paypalEmailInput) paypalEmailInput.required = false;
          }
        }
      }

      if (paymentMethods.length > 0) {
        paymentMethods.forEach(method => {
          method.addEventListener('change', switchPaymentMethod);
        });
        switchPaymentMethod();
      }

      // Card number formatting and brand detection
      const cardNumberInput = document.getElementById('card-number');
      const cardBrandSpan = document.getElementById('card-brand');

      if (cardNumberInput && cardBrandSpan) {
        cardNumberInput.addEventListener('input', function (e) {
          let value = e.target.value.replace(/\s/g, '').replace(/[^0-9]/gi, '');
          let formattedValue = value.match(/.{1,4}/g)?.join(' ') || value;
          e.target.value = formattedValue;

          if (value.startsWith('4')) {
            cardBrandSpan.textContent = 'VISA';
          } else if (value.startsWith('5') || value.startsWith('2')) {
            cardBrandSpan.textContent = 'MASTERCARD';
          } else if (value.startsWith('3')) {
            cardBrandSpan.textContent = 'AMEX';
          } else {
            cardBrandSpan.textContent = 'CARD';
          }
        });
      }

      // Expiry date formatting
      const expiryInput = document.getElementById('expiry-date');
      if (expiryInput) {
        expiryInput.addEventListener('input', function (e) {
          let value = e.target.value.replace(/\D/g, '');
          if (value.length >= 2) {
            value = value.substring(0, 2) + '/' + value.substring(2, 4) + '/' + value.substring(4, 6);
          }
          e.target.value = value;
        });
      }

      // CVV input restriction
      const cvvInput = document.getElementById('cvv');
      if (cvvInput) {
        cvvInput.addEventListener('input', function (e) {
          e.target.value = e.target.value.replace(/\D/g, '').substring(0, 3);
        });
      }

      // Apply discount functionality
      const applyBtn = document.querySelector('.apply-btn');
      if (applyBtn) {
        applyBtn.addEventListener('click', function () {
          alert('Discount applied successfully!');
        });
      }

      // Modal functionality
      const modal = document.getElementById('success-modal');
      const closeModalBtn = document.getElementById('close-payment-modal');
      const downloadBillBtn = document.getElementById('download-bill');

      // Close modal
      closeModalBtn.addEventListener('click', function () {
        modal.classList.remove('active');
      });

      // Enhanced PDF generation with better formatting
      function generatePDF() {
        try {
          // Disable button during generation
          downloadBillBtn.disabled = true;
          downloadBillBtn.innerHTML = '<i class="fas fa-spinner fa-spin"></i> Generating PDF...';

          const { jsPDF } = window.jspdf;
          const doc = new jsPDF();

          // Company colors
          const primaryColor = [35, 100, 93]; // Dark blue-green
          const secondaryColor = [113, 140, 141]; // Light gray-blue
          const textColor = [44, 62, 80]; // Dark gray

          // Header section with company branding
          doc.setFillColor(...primaryColor);
          doc.rect(0, 0, 210, 40, 'F');

          doc.setTextColor(255, 255, 255);
          doc.setFontSize(24);
          doc.setFont(undefined, 'bold');
          doc.text('PAYMENT RECEIPT', 20, 25);

          doc.setFontSize(12);
          doc.setFont(undefined, 'normal');
          doc.text(`Date: ${new Date().toLocaleDateString('en-US', {
            year: 'numeric',
            month: 'long',
            day: 'numeric'
          })}`, 140, 25);

          // Transaction ID
          const transactionId = document.getElementById('transaction-id').textContent;
          doc.text(`Transaction ID: ${transactionId}`, 140, 32);

          // Reset text color for body
          doc.setTextColor(...textColor);

          // Customer Information Section
          let yPos = 60;
          doc.setFontSize(16);
          doc.setFont(undefined, 'bold');
          doc.text('Customer Information', 20, yPos);

          // Underline
          doc.setDrawColor(...primaryColor);
          doc.setLineWidth(0.5);
          doc.line(20, yPos + 2, 80, yPos + 2);

          yPos += 15;
          doc.setFontSize(11);
          doc.setFont(undefined, 'normal');

          const customerInfo = [
            ['Name:', document.getElementById('consultName').value || 'N/A'],
            ['Email:', document.getElementById('email').value || 'N/A'],
            ['Phone:', document.getElementById('consultPhone').value || 'N/A'],
            ['City:', document.getElementById('city').value || 'N/A'],
            ['Address:', document.getElementById('address').value || 'N/A']
          ];

          customerInfo.forEach(([label, value]) => {
            doc.setFont(undefined, 'bold');
            doc.text(label, 20, yPos);
            doc.setFont(undefined, 'normal');
            doc.text(value, 50, yPos);
            yPos += 8;
          });

          // Package Details Section
          yPos += 10;
          doc.setFontSize(16);
          doc.setFont(undefined, 'bold');
          doc.text('Package Details', 20, yPos);

          doc.setDrawColor(...primaryColor);
          doc.line(20, yPos + 2, 70, yPos + 2);

          yPos += 15;
          doc.setFontSize(11);
          doc.setFont(undefined, 'normal');

          doc.setFont(undefined, 'bold');
          doc.text('Package:', 20, yPos);
          doc.setFont(undefined, 'normal');
          doc.text('Standard Package (5/7 Services)', 50, yPos);
          yPos += 10;

          doc.setFont(undefined, 'bold');
          doc.text('Services Included:', 20, yPos);
          yPos += 8;

          const services = [
            '• Bookkeeping & Financial Reporting',
            '• Tax Preparation & Planning',
            '• Payroll Management',
            '• Financial Consulting',
            '• Dedicated Account Manager'
          ];

          doc.setFont(undefined, 'normal');
          services.forEach(service => {
            doc.text(service, 25, yPos);
            yPos += 6;
          });

          // Payment Summary Box
          yPos += 15;
          const boxHeight = 35;
          const boxWidth = 170;

          // Box background
          doc.setFillColor(248, 249, 250);
          doc.rect(20, yPos - 5, boxWidth, boxHeight, 'F');

          // Box border
          doc.setDrawColor(...secondaryColor);
          doc.setLineWidth(1);
          doc.rect(20, yPos - 5, boxWidth, boxHeight);

          doc.setFontSize(14);
          doc.setFont(undefined, 'bold');
          doc.text('Payment Summary', 25, yPos + 5);

          yPos += 15;
          doc.setFontSize(11);

          const paymentDetails = [
            ['Amount:', 'SAR 56.00'],
            ['Payment Method:', document.getElementById('modal-payment-method').textContent],
            ['Status:', 'PAID']
          ];

          paymentDetails.forEach(([label, value]) => {
            doc.setFont(undefined, 'normal');
            doc.text(label, 25, yPos);
            doc.setFont(undefined, 'bold');
            doc.text(value, 140, yPos);
            yPos += 7;
          });

          // Total amount highlight
          yPos += 5;
          doc.setFillColor(...primaryColor);
          doc.rect(25, yPos - 3, 140, 12, 'F');
          doc.setTextColor(255, 255, 255);
          doc.setFontSize(12);
          doc.setFont(undefined, 'bold');
          doc.text('TOTAL PAID: SAR 56.00', 30, yPos + 4);

          // Footer
          doc.setTextColor(...textColor);
          doc.setFontSize(10);
          doc.setFont(undefined, 'normal');
          doc.text('Thank you for your business!', 20, 260);
          doc.text('For support, contact us at support@company.com', 20, 268);
          doc.text('This is a computer-generated receipt.', 20, 276);

          // Generate timestamp for filename
          const timestamp = new Date().toISOString().slice(0, 19).replace(/[-:]/g, '').replace('T', '_');
          const filename = `Payment_Receipt_${timestamp}.pdf`;

          // Save the PDF
          doc.save(filename);

        } catch (error) {
          console.error('Error generating PDF:', error);
          alert('Error generating PDF. Please try again.');
        } finally {
          // Re-enable button
          downloadBillBtn.disabled = false;
          downloadBillBtn.innerHTML = '<i class="fas fa-download"></i> Download PDF Bill';
        }
      }

      // Download bill functionality
      downloadBillBtn.addEventListener('click', generatePDF);

      // Form submission
      const form = document.getElementById('payment-form');
      if (form) {
        form.addEventListener('submit', function (e) {
          e.preventDefault();

          // Generate random transaction ID
          const transactionId = '#TXN' + Date.now().toString().slice(-9);
          document.getElementById('transaction-id').textContent = transactionId;

          const selectedMethod = document.querySelector('input[name="payment_method"]:checked').value;
          const paymentMethodDisplay = document.getElementById('modal-payment-method');
          if (paymentMethodDisplay) {
            paymentMethodDisplay.textContent =
              selectedMethod === 'credit_card' ? 'Credit Card' :
                selectedMethod === 'paypal' ? 'PayPal' :
                  'Bank Transfer';
          }
          modal.classList.add('active');
        });
      }

      // Close modal when clicking outside
      modal.addEventListener('click', function (e) {
        if (e.target === modal) {
          modal.classList.remove('active');
        }
      });
    });
  </script>
</body>

</html>
<?php include 'includes/footer.php'; ?>