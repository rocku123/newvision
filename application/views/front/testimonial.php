<main id="main">

<!-- ======= Breadcrumbs ======= -->
<section id="breadcrumbs" class="breadcrumbs">
  <div class="container">

    <div class="d-flex justify-content-between align-items-center">
      <h2>Testimonials</h2>
      <ol>
        <li><a href="<?=base_url() ?>">Home</a></li>
        <li>Testimonials</li>
      </ol>
    </div>

  </div>
</section><!-- End Breadcrumbs -->

<!-- ======= Testimonials Section ======= -->
<section id="testimonials" class="testimonials section-bg">
  <div class="container">

    <div class="row">
    <?php
    if(!empty($lists)){ 
      foreach($lists as $list){  ?>
      <div class="col-lg-6" data-aos="fade-up">
        <div class="testimonial-item">
          <img src="<?=base_url() ?>assets/img/testimonials/<?=$list->testimonial_image  ?>" class="testimonial-img" alt="">
          <h3><?=$list->testimonial_name  ?></h3>
          <h4><?=$list->testimonial_designation  ?></h4>
          <p>
            <i class="bx bxs-quote-alt-left quote-icon-left"></i>
            <?=$list->testimonial_descn  ?>
            <i class="bx bxs-quote-alt-right quote-icon-right"></i>
          </p>
        </div>
      </div>
    <?php 
        } 
      }
    ?>

    </div>

  </div>
</section><!-- End Testimonials Section -->

</main><!-- End #main -->