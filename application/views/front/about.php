<main id="main">

    <!-- ======= Breadcrumbs ======= -->
    <section id="breadcrumbs" class="breadcrumbs">
      <div class="container">

        <div class="d-flex justify-content-between align-items-center">
          <h2><?=$lists->title ?></h2>
          <ol>
            <li><a href="<?=base_url() ?>">Home</a></li>
            <li><?=$lists->title ?></li>
          </ol>
        </div>

      </div>
    </section><!-- End Breadcrumbs -->

    <!-- ======= About Us Section ======= -->
    <section id="about-us" class="about-us">
      <div class="container" data-aos="fade-up">

        <div class="row content">
          <div class="col-lg-6" data-aos="fade-right">
            <h2><?=$lists->page_title;  ?></h2>
            <!-- <h3>Voluptatem dignissimos provident quasi corporis voluptates sit assum perenda sruen jonee trave</h3> -->
          </div>
          <div class="col-lg-6 pt-4 pt-lg-0" data-aos="fade-left">
            <?=$lists->page_descn;  ?>
          </div>
        </div>

      </div>
    </section><!-- End About Us Section -->

    

  </main><!-- End #main -->