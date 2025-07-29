<?php include 'includes/header.php'; ?>
<?php $breadcrumb_items = [
  ['label' => 'Home', 'url' => 'Home.php'],
  ['label' => 'About Us']
];
include 'includes/breadcrumb.php'; ?>
<div class="about-page  ">
  <div class="head text-center w-75 mb-5 m-auto">
    <h2 class="section-title">What we do</h2>
    <p class="section-description">
      We provide comprehensive advisory services in legal, financial, and business domains, helping you make informed
      decisions backed by deep expertise and market insight.
    </p>

  </div>
  <div class="mb-5">
    <section class="our-categories ">
      <div class="container position-relative">
        <div class="categories-bg-gradient">
          <div class="gradient1"></div>
          <div class="gradient2"></div>
        </div>
        <div class="categories-grid">
          <div class="category-card" style="background-image: url('assets/images/img1.jpg');">
            
          </div>
          <div class="category-card category-card-right" style="background-image: url('assets/images/img2.png');">
          
          </div>
          <div class="third">
            <p class="category-description">
              <span class="highlight-blue">Vision</span> provide comprehensive advisory services in legal, financial,
              and business domains, helping you
              make informed decisions backed by deep expertise and market insight. We provide comprehensive
              advisory services in legal, financial, and business domains, helping you make informed decisions
              backed by deep expertise and market insight.We provide comprehensive advisory services in legal,
              financial, and business domains,
            </p>
            <div class="category-card" style="background-image: url('assets/images/img3.jpg');">
              
            </div>
          </div>
          <p class="category-description-second mt-5">
            <span class="highlight-blue">Mission</span> provide comprehensive advisory services in legal, financial,
            and business domains, helping you
            make informed decisions backed by deep expertise and market insight. We provide comprehensive
            advisory services in legal, financial, and business domains, helping you make informed decisions
            backed by deep expertise and market insight.We provide comprehensive advisory services in legal,
            financial, and business domains,
          </p>
        </div>
      </div>

    </section>


  </div>

  <?php include 'components/stats-section.php'; ?>

</div>
<?php include 'includes/footer.php'; ?>