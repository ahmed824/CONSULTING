<div class="custom-package-section">
    <div class="container">
        <div class="linear-bg"></div>
        <div class="custom-package-card" data-aos="fade-up" data-aos-delay="100">
            <div class="custom-package-content" data-aos="fade-right" data-aos-delay="500">
                <span class="custom-package-label">Custom Package</span>
                <h2 class="custom-package-title">Build Your Package<br>Based on Your Needs</h2>
                <div class="custom-package-price">
                    <span class="price-amount">27</span>
                    <span class="price-original">30</span>
                    <span class="price-currency">
                        <?php
                        $fillColor = '#B68F0E';
                        include 'includes/Reyal.php';
                        ?>
                    </span>
                </div>
                <p class="custom-package-desc">
                    We provide comprehensive advisory services in legal, financial, and business domains.
                </p>
                <div class="custom-package-actions">
                    <select id="service-select" class="custom-package-select" required>
                        <option value="" disabled selected hidden>Select Service</option>
                        <option value="tax">Tax and Zakat</option>
                        <option value="accounting">Accounting</option>
                    </select>
                    <select id="duration-select" class="custom-package-select" style="display: none;" required>
                        <option value="" disabled selected hidden>Package Duration</option>
                        <option value="1">Monthly</option>
                        <option value="3">Yearly</option>
                    </select>
                    <select id="days-select" class="custom-package-select mb-3" style="display: none;" required>
                        <option value="" disabled selected hidden>Number of Days</option>
                        <option value="1">1 Day</option>
                        <option value="2">2 Days</option>
                        <option value="3">3 Days</option>
                        <option value="4">4 Days</option>
                        <option value="5">5 Days</option>
                        <option value="6">6 Days</option>
                    </select>
                    <select id="hours-select" class="custom-package-select mb-3" style="display: none;" required>
                        <option value="" disabled selected hidden>Number of Hours</option>
                        <option value="1">1 Hour</option>
                        <option value="2">2 Hours</option>
                        <option value="3">3 Hours</option>
                        <option value="4">4 Hours</option>
                        <option value="5">5 Hours</option>
                        <option value="6">6 Hours</option>
                        <option value="7">7 Hours</option>
                        <option value="8">8 Hours</option>
                    </select>
                    <button type="button" class="btn btn-submit">Request Package</button>
                </div>
            </div>
            <div class="custom-package-image" data-aos="fade-left" data-aos-delay="500">
                <div class="icon-bg">
                    <img src="assets/images/check.gif" alt="gif check" class="check-gif">
                </div>
            </div>
        </div>
    </div>
</div>

<script>
    document.addEventListener('DOMContentLoaded', function () {
        const serviceSelect = document.getElementById('service-select');
        const daysSelect = document.getElementById('days-select');
        const hoursSelect = document.getElementById('hours-select');
        const durationSelect = document.getElementById('duration-select');
        const priceAmount = document.querySelector('.price-amount');
        const priceOriginal = document.querySelector('.price-original');

        const prices = {
            '1': { sale: 27, original: 30 },
            '3': { sale: 76.5, original: 85 },
            '6': { sale: 144, original: 160 },
            '12': { sale: 270, original: 300 }
        };

        serviceSelect.addEventListener('change', function () {
            if (this.value === 'accounting') {
                daysSelect.style.display = 'block';
                hoursSelect.style.display = 'block';
                durationSelect.style.display = 'block';
            } else {
                daysSelect.style.display = 'none';
                hoursSelect.style.display = 'none';
                durationSelect.style.display = 'none';
                // Reset prices to default when tax is selected
                priceAmount.textContent = '27';
                priceOriginal.textContent = '30';
            }
        });

        durationSelect.addEventListener('change', function () {
            const selectedDuration = this.value;
            if (prices[selectedDuration]) {
                priceAmount.textContent = prices[selectedDuration].sale;
                priceOriginal.textContent = prices[selectedDuration].original;
            } else {
                priceAmount.textContent = '27'; // Fallback to default
                priceOriginal.textContent = '30';
            }
        });
    });
</script>