<?php include 'includes/header.php'; ?>
<?php
$breadcrumb_items = [
    ['label' => 'Home', 'url' => 'home.php'],
    ['label' => 'Services', 'url' => 'services.php'],
    ['label' => 'Professional Accounting Services']
];
include 'includes/breadcrumb.php';
?>

<main class="accounting-services-page5">
    <div class="container">
        <header class="text-center mb-5" data-aos="fade-up">
            <h1 class="page-title">Professional Accounting Services</h1>
            <p class="lead text-muted">Streamline your financial operations with our expert accounting solutions
                tailored for your business success and growth.</p>
        </header>

        <section class="services-overview mb-5">
            <div class="row">
                <div class="col-md-6 mb-4" data-aos="fade-up" data-aos-delay="100">
                    <div class="service-card p-4 fade-in-up">
                        <h2 class="service-title">Bookkeeping Services</h2>
                        <p>Accurate and timely bookkeeping to keep your financial records organized and compliant with
                            industry standards.</p>
                        <ul class="service-features">
                            <li>Real-time transaction recording and categorization</li>
                            <li>Monthly financial reports and analysis</li>
                            <li>Bank reconciliation and cash flow management</li>
                            <li>Digital receipt management and storage</li>
                        </ul>
                    </div>
                </div>
                <div class="col-md-6 mb-4" data-aos="fade-up" data-aos-delay="200">
                    <div class="service-card p-4 fade-in-up">
                        <h2 class="service-title">Tax Preparation & Planning</h2>
                        <p>Maximize deductions and ensure compliance with our comprehensive tax services and strategic
                            planning.</p>
                        <ul class="service-features">
                            <li>Corporate and individual tax returns</li>
                            <li>Strategic tax planning and optimization</li>
                            <li>IRS audit support and representation</li>
                            <li>Quarterly tax estimates and filings</li>
                        </ul>
                    </div>
                </div>
                <div class="col-md-6 mb-4" data-aos="fade-up" data-aos-delay="300">
                    <div class="service-card p-4 fade-in-up">
                        <h2 class="service-title">Payroll Management</h2>
                        <p>Simplify payroll processing with our efficient, secure, and compliant payroll solutions.</p>
                        <ul class="service-features">
                            <li>Automated employee payment processing</li>
                            <li>Tax withholding and government filings</li>
                            <li>Comprehensive payroll reporting</li>
                            <li>Employee self-service portal access</li>
                        </ul>
                    </div>
                </div>
                <div class="col-md-6 mb-4" data-aos="fade-up" data-aos-delay="400">
                    <div class="service-card p-4 fade-in-up">
                        <h2 class="service-title">Financial Consulting</h2>
                        <p>Strategic financial advice to optimize your performance, drive growth, and achieve your
                            business goals.</p>
                        <ul class="service-features">
                            <li>Advanced budgeting and forecasting</li>
                            <li>Cash flow analysis and optimization</li>
                            <li>Business valuation and financial modeling</li>
                            <li>Financial risk assessment and management</li>
                        </ul>
                    </div>
                </div>
            </div>
        </section>

        <!-- Process Section -->
        <section class="process-section" data-aos="fade-up">
            <div class="text-center mb-4">
                <h2 class="mb-3" style="color: var(--dark-blue); font-weight: 700;">Our Proven Process</h2>
                <p class="lead text-muted">Simple steps to get your accounting needs handled professionally</p>
            </div>
            <div class="process-steps">
                <div class="process-step" data-aos="fade-up" data-aos-delay="100">
                    <div class="step-number">1</div>
                    <h3 class="step-title">Initial Consultation</h3>
                    <p class="step-description">We discuss your business needs and financial goals to create a
                        customized solution.</p>
                </div>
                <div class="process-step" data-aos="fade-up" data-aos-delay="200">
                    <div class="step-number">2</div>
                    <h3 class="step-title">Service Setup</h3>
                    <p class="step-description">Our team configures your accounting systems and processes for maximum
                        efficiency.</p>
                </div>
                <div class="process-step" data-aos="fade-up" data-aos-delay="300">
                    <div class="step-number">3</div>
                    <h3 class="step-title">Ongoing Support</h3>
                    <p class="step-description">Receive continuous support and regular financial insights to drive your
                        business forward.</p>
                </div>
            </div>
        </section>

        <section class="cta-section text-center py-5" data-aos="fade-up" data-aos-delay="200">
            <h2>Get Started Today</h2>
            <p class="mb-4">Contact us to learn how our accounting services can streamline your business operations and
                drive growth.</p>
            <a href="payment.php" class="btn cta-btn">Request Consultation</a>
        </section>
    </div>
</main>


<?php include 'includes/footer.php'; ?>