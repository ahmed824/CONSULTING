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
                    <li><i class="fas fa-check-circle"></i> Contract drafting and review</li>
                    <li><i class="fas fa-check-circle"></i> Regulatory compliance advice</li>
                    <li><i class="fas fa-check-circle"></i> Dispute resolution support</li>
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
                    <li><i class="fas fa-check-circle"></i> Bookkeeping and financial statements</li>
                    <li><i class="fas fa-check-circle"></i> Tax planning and compliance</li>
                    <li><i class="fas fa-check-circle"></i> Budgeting and forecasting</li>
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
                    <li><i class="fas fa-check-circle"></i> Project planning and management</li>
                    <li><i class="fas fa-check-circle"></i> Technical design and analysis</li>
                    <li><i class="fas fa-check-circle"></i> Quality assurance and compliance</li>
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
            <a href="#" class="btn btn-gold" data-bs-toggle="modal" data-bs-target="#consultationModal">Request More
                Information</a>
        </div>
    </div>
</section>

<?php include 'includes/footer.php'; ?>

<style>
    .policies-section {
        padding: 40px 20px;
        background: #f7fafc;
    }

    .policies-title {
        font-size: 32px;
        font-weight: 700;
        color: #1a202c;
        text-align: center;
        margin-bottom: 15px;
    }

    .policies-subtitle {
        font-size: 16px;
        color: #718096;
        text-align: center;
        margin-bottom: 40px;
        max-width: 600px;
        margin-left: auto;
        margin-right: auto;
    }

    .consulting-services {
        display: grid;
        grid-template-columns: repeat(auto-fit, minmax(300px, 1fr));
        gap: 30px;
        margin-bottom: 60px;
    }

    .service-card {
        background: #fff;
        border-radius: 15px;
        padding: 30px;
        box-shadow: 0 4px 15px rgba(0, 0, 0, 0.1);
        transition: all 0.3s ease;
    }

    .service-card:hover {
        background: linear-gradient(90deg, rgba(255, 255, 255, 0.1), rgba(255, 255, 255, 0.4) 30%, rgba(255, 255, 255, 0.1) 60%);
        background-size: 200% 100%;
        animation: slideBlur 1s ease-in-out infinite;
        transform: translateY(-5px);
    }

    .service-icon {
        width: 60px;
        height: 60px;
        background: #b68f0e;
        color: #fff;
        border-radius: 50%;
        display: flex;
        align-items: center;
        justify-content: center;
        font-size: 24px;
        margin-bottom: 20px;
    }

    .service-title {
        font-size: 24px;
        font-weight: 600;
        color: #1a202c;
        margin-bottom: 15px;
    }

    .service-desc {
        font-size: 16px;
        color: #718096;
        margin-bottom: 20px;
    }

    .service-features {
        list-style: none;
        padding: 0;
    }

    .service-features li {
        display: flex;
        align-items: center;
        gap: 10px;
        font-size: 15px;
        color: #1a202c;
        margin-bottom: 10px;
    }

    .service-features li i {
        color: #b68f0e;
    }

    .policy-agreement {
        text-align: center;
        max-width: 800px;
        margin: 0 auto;
    }

    .agreement-title {
        font-size: 24px;
        font-weight: 600;
        color: #1a202c;
        margin-bottom: 15px;
    }

    .agreement-desc {
        font-size: 16px;
        color: #718096;
        margin-bottom: 30px;
    }

   
    .btn-gold:hover {
        background: linear-gradient(90deg, #a67c00, rgba(255, 255, 255, 0.4) 30%, rgba(255, 255, 255, 0.1) 60%);
        background-size: 200% 100%;
        animation: slideBlur 1s ease-in-out infinite;
        transform: translateY(-3px);
        border: 0.1px solid #a67c00;
    }

    @media (max-width: 768px) {
        .consulting-services {
            grid-template-columns: 1fr;
        }

        .service-card {
            text-align: center;
        }

        .service-icon {
            margin-left: auto;
            margin-right: auto;
        }
    }

    @keyframes slideBlur {
        0% {
            background-position: 0% 50%;
        }

        100% {
            background-position: 200% 50%;
        }
    }
</style>