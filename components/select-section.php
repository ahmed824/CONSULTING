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
                    <select class="custom-package-select" required>
                        <option value="" disabled selected hidden>Select Duration</option>
                        <option value="1">1 Month</option>
                        <option value="3">3 Months</option>
                        <option value="6">6 Months</option>
                        <option value="12">12 Months</option>
                    </select>
                    <button type="button" class="btn btn-gold ms-3" data-bs-toggle="modal"
                        data-bs-target="#consultationModal">Request Package</button>
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
        const select = document.querySelector('.custom-package-select');
        const priceAmount = document.querySelector('.price-amount');
        const priceOriginal = document.querySelector('.price-original');

        const prices = {
            '1': { sale: 27, original: 30 },
            '3': { sale: 76.5, original: 85 },
            '6': { sale: 144, original: 160 },
            '12': { sale: 270, original: 300 }
        };

        select.addEventListener('change', function () {
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