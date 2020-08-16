<main id="main">

    <!-- ======= Breadcrumbs ======= -->
    <section id="breadcrumbs" class="breadcrumbs">
      <div class="container">

        <div class="d-flex justify-content-between align-items-center">
          <h2><?=$title  ?></h2>
          <ol>
            <li><a href="<?=base_url() ?>">Home</a></li>
            <li><?=$title  ?></li>
          </ol>
        </div>

      </div>
    </section><!-- End Breadcrumbs -->

    <!-- ======= Blog Section ======= -->
    <section id="blog" class="blog">
      <div class="container">

        <div class="row">
        <?php
        if(!empty($lists)){ 
          foreach($lists as $list){  ?>
          <div class="col-lg-4  col-md-6 d-flex align-items-stretch" data-aos="fade-up">
            <article class="entry">

              <div class="entry-img">
                <img src="<?=base_url()  ?>assets/img/events/<?=$list->event_image  ?>" alt="" class="img-fluid">
              </div>

              <h2 class="entry-title">
                <span><?=$list->event_title  ?></span>
              </h2>

              <div class="entry-meta">
                <ul>
                  <li class="d-flex align-items-center"><i class="icofont-user"></i> <a ><?=$list->event_title  ?></a></li>
                  <!-- <li class="d-flex align-items-center"><i class="icofont-wall-clock"></i> <a href="blog-single.html"><time datetime="2020-01-01">Jan 1, 2020</time></a></li> -->
                </ul>
              </div>

              <div class="entry-content">
                <p>
                <?=$list->event_descn  ?>
                </p>
                <!-- <div class="read-more">
                  <a href="blog-single.html">Read More</a>
                </div> -->
              </div>

            </article><!-- End blog entry -->
          </div>
        <?php 
            } 
          }
        ?>
         

        </div>

        <!-- <div class="blog-pagination" data-aos="fade-up">
          <ul class="justify-content-center">
            <li class="disabled"><i class="icofont-rounded-left"></i></li>
            <li><a href="#">1</a></li>
            <li class="active"><a href="#">2</a></li>
            <li><a href="#">3</a></li>
            <li><a href="#"><i class="icofont-rounded-right"></i></a></li>
          </ul>
        </div> -->

      </div>
    </section><!-- End Blog Section -->

  </main><!-- End #main -->