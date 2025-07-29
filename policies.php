<?php include 'includes/header.php'; ?>
<?php
$breadcrumb_items = [
    ['label' => 'Home', 'url' => 'Home.php'],
    ['label' => 'Policies']
];
include 'includes/breadcrumb.php';
?>

<section class="policies-section">
    <div class="container">
        <h2 class="policies-title">Our Consulting Policies</h2>
        <p class="policies-subtitle">Learn about our commitment to delivering trusted consulting services tailored to
            your business needs.</p>

        <div class="consulting-services">
            <div class="service-card" data-aos="fade-up" data-aos-delay="100">
                <div class="service-icon">
                    <i class="fas fa-balance-scale"></i>
                </div>
                <h3 class="service-title">Trusted Legal Services</h3>
                <p class="service-desc">
                    Our legal consulting services provide expert guidance on compliance, contracts, and dispute
                    resolution. We ensure your business operates within regulatory frameworks, offering tailored
                    solutions to protect your interests and mitigate risks.
                </p>
                <ul class="service-features">
                    <li> Contract drafting and review</li>
                    <li> Regulatory compliance advice</li>
                    <li> Dispute resolution support</li>
                </ul>
            </div>

            <div class="service-card" data-aos="fade-up" data-aos-delay="200">
                <div class="service-icon">
                    <i class="fas fa-calculator"></i>
                </div>
                <h3 class="service-title">Professional Accounting Services</h3>
                <p class="service-desc">
                    Our accounting services streamline your financial operations with expert bookkeeping, tax planning,
                    and financial reporting. We help you maintain accurate records and optimize your financial strategy
                    for sustainable growth.
                </p>
                <ul class="service-features">
                    <li> Bookkeeping and financial statements</li>
                    <li> Tax planning and compliance</li>
                    <li> Budgeting and forecasting</li>
                </ul>
            </div>

            <div class="service-card" data-aos="fade-up" data-aos-delay="300">
                <div class="service-icon">
                    <i class="fas fa-cogs"></i>
                </div>
                <h3 class="service-title">Engineering Consulting Solutions</h3>
                <p class="service-desc">
                    Our engineering consulting services deliver innovative solutions for project management, design, and
                    implementation. We provide technical expertise to ensure your projects are completed efficiently and
                    meet industry standards.
                </p>
                <ul class="service-features">
                    <li> Project planning and management</li>
                    <li> Technical design and analysis</li>
                    <li> Quality assurance and compliance</li>
                </ul>
            </div>
        </div>

        <div class="policy-agreement">
            <h3 class="agreement-title">Policy Agreement</h3>
            <p class="agreement-desc">
                By engaging with our services, you agree to adhere to our policies, which ensure transparency,
                confidentiality, and mutual respect. For detailed terms, please contact our support team or review our
                full policy documentation.
            </p>

        </div>
    </div>
</section>

<?php include 'includes/footer.php'; ?>

 