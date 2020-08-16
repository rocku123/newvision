<main id="main">

<!-- ======= Breadcrumbs ======= -->
<section id="breadcrumbs" class="breadcrumbs">
  <div class="container">

    <div class="d-flex justify-content-between align-items-center">
      <h2><?=$title  ?></h2>
      <ol>
        <li><a href="<?=base_url();  ?>">Home</a></li>
        <li><?=$title  ?></li>
      </ol>
    </div>

  </div>
</section><!-- End Breadcrumbs -->

<!-- ======= Portfolio Section ======= -->
<section id="portfolio" class="portfolio">
  <div class="container">

    <div class="row" data-aos="fade-up">
      <div class="col-lg-12 d-flex justify-content-center">
        <ul id="portfolio-flters">
          <!-- <li data-filter="*" class="filter-active">All</li> -->
          <li data-filter=".filter-web"><?=$title  ?></li>
          <!-- <li data-filter=".filter-card">Card</li>
          <li data-filter=".filter-web">Web</li> -->
        </ul>
      </div>
    </div>
   
    <div class="row portfolio-container" data-aos="fade-up">
    <?php
    if(!empty($lists)){ 
      foreach($lists as $list){  ?>
      <div class="col-lg-4 col-md-6 portfolio-item filter-web">
        <img src="<?=base_url() ?>assets/img/portfolio/<?=$list->image_name  ?>" class="img-fluid" alt="">
        <div class="portfolio-info">
          <h4>App 1</h4>
          <p>App</p>
          <a href="<?=base_url() ?>assets/img/portfolio/<?=$list->image_name  ?>" data-gall="portfolioGallery" class="venobox preview-link" title="App 1"><i class="bx bx-plus"></i></a>
          <!-- <a href="portfolio-details.html" class="details-link" title="More Details"><i class="bx bx-link"></i></a> -->
        </div>
      </div>
    <?php 
        } 
      }
      ?>

    </div>

  </div>
</section><!-- End Portfolio Section -->


</main><!-- End #main -->