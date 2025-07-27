<?php include 'includes/header.php'; ?>
<?php $breadcrumb_items = [
  ['label' => 'Home', 'url' => 'Home.php'],
  ['label' => 'Clients']
];
include 'includes/breadcrumb.php'; ?>

<div class="clients-page pb-5">
    <section class="clients-section">
        <div class="clients-header" data-aos="fade-up" data-aos-duration="1000">
            <p class="clients-subtitle">Our Clients</p>
            <h2 class="clients-title">Clients Who Trust Us</h2>
        </div>
        <div class="container">
            <div class="clients-grid" data-aos="fade-up" data-aos-delay="100" data-aos-duration="1000">
                <div class="client-logo"><img src="assets/images/Google.png" alt="Google Logo"></div>
                <div class="client-logo"><img src="assets/images/Pinterest.png" alt="Pinterest Logo"></div>
                <div class="client-logo"><img src="assets/images/Stripe.png" alt="Stripe Logo"></div>
                <div class="client-logo"><img src="assets/images/Reddit.png" alt="Reddit Logo"></div>
                <div class="client-logo"><img src="assets/images/Spotify.png" alt="Spotify Logo"></div>
                <div class="client-logo"><img src="assets/images/Stripe.png" alt="Stripe Logo"></div>
            </div>
        </div>
    </section>
</div>

<?php include 'includes/footer.php'; ?>

<link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">
<script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
<script>
    AOS.init({
        once: true,
        offset: 100,
        easing: 'ease-out-quad'
    });
</script>

<style>
    .clients-page {
        padding-bottom: 3rem;
    }
    .clients-section {
        padding-bottom: 60px;
    }
    .container {
        max-width: 1200px;
        margin: 0 auto;
        padding: 0 15px;
    }
    .clients-header {
        text-align: center;
        margin-bottom: 40px;
    }
    .clients-subtitle {
        font-size: 1.2rem;
        color: #b68f0e;
        margin-bottom: 10px;
    }
    .clients-title {
        font-size: 2.5rem;
        color: #333;
    }
    .clients-grid {
        display: grid;
        grid-template-columns: repeat(auto-fit, minmax(225px, 1fr));
        gap: 20px;
        max-width: 100%;
    }
    .client-logo {
        display: flex;
        justify-content: center;
        align-items: center;
        background: #fff;
        padding: 20px;
        border-radius: 10px;
        box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);
        transition: transform 0.3s ease;
    }
    .client-logo img {
        max-width: 100%;
        height: auto;
        max-height: 80px;
        object-fit: contain;
    }
    .client-logo:hover {
        transform: scale(1.05);
    }
    @media (max-width: 768px) {
        .clients-grid {
            grid-template-columns: repeat(auto-fit, minmax(120px, 1fr));
        }
        .clients-title {
            font-size: 2rem;
        }
    }
</style>