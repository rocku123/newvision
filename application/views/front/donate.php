<main id="main">

<!-- ======= Breadcrumbs ======= -->
<section id="breadcrumbs" class="breadcrumbs">
  <div class="container">

    <div class="d-flex justify-content-between align-items-center">
      <h2>Donate Us</h2>
      <ol>
        <li><a href="<?=base_url() ?>">Home</a></li>
        <li>Donate Us</li>
      </ol>
    </div>

  </div>
</section><!-- End Breadcrumbs -->

<!-- ======= Contact Section ======= -->


<section id="contact" class="contact">
  <div class="container">
    <div class="section-title" data-aos="fade-up">
      <h2>Donate<strong> Us</strong></h2>
      <!-- <p>Magnam dolores commodi suscipit. Necessitatibus eius consequatur ex aliquid fuga eum quidem. Sit sint consectetur velit. Quisquam quos quisquam cupiditate. Et nemo qui impedit suscipit alias ea. Quia fugiat sit in iste officiis commodi quidem hic quas.</p> -->
    </div>
    

    <div class="row mt-5 justify-content-center" data-aos="fade-up">
      <div class="col-lg-10">
        <form action="forms/contact.php" method="post" role="form" class="php-email-form">
          <div class="form-row">
            <div class="col-md-6 form-group">
              <input type="text" name="name" class="form-control" id="name" placeholder="Your Name" data-rule="minlen:4" data-msg="Please enter at least 4 chars" />
              <div class="validate"></div>
            </div>
            <div class="col-md-6 form-group">
              <input type="email" class="form-control" name="email" id="email" placeholder="Your Email" data-rule="email" data-msg="Please enter a valid email" />
              <div class="validate"></div>
            </div>
          </div>
          <div class="form-row">
            <div class="col-md-6 form-group">
              <input type="text" name="phone" class="form-control" id="phone" placeholder="Your Phone" data-rule="minlen:4" data-msg="Please Enter Ypur Phone Number" />
              <div class="validate"></div>
            </div>
            <div class="col-md-6 form-group">
              <input type="number" class="form-control" name="amount" id="amount" placeholder="Amount" data-rule="email" data-msg="Please enter a valid email" />
              <div class="validate"></div>
            </div>
            <div class="col-md-12 form-group">
              <input type="text" class="form-control" name="transaction" id="transaction" placeholder="Transaction No" data-rule="email" data-msg="Please enter a Transaction No" />
              <div class="validate"></div>
            </div>
          </div>
          <!-- <div class="form-group">
            <input type="text" class="form-control" name="subject" id="subject" placeholder="Subject" data-rule="minlen:4" data-msg="Please enter at least 8 chars of subject" />
            <div class="validate"></div>
          </div> -->
          <div class="form-group">
            <textarea class="form-control" name="message" rows="5" data-rule="required" data-msg="Please write something for us" placeholder="Message"></textarea>
            <div class="validate"></div>
          </div>
          <div class="mb-3">
            <div class="loading">Loading</div>
            <div class="error-message"></div>
            <div class="sent-message">Your message has been sent. Thank you!</div>
          </div>
          <div class="text-center"><button type="submit">Submit</button></div>
        </form>
      </div>

    </div>

  </div>
</section><!-- End Contact Section -->

</main><!-- End #main -->