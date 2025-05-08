<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8" />
  <meta
    name="viewport"
    content="width=device-width, initial-scale=1, shrink-to-fit=no" />

  <link
    href="https://fonts.googleapis.com/css2?family=Poppins:wght@100;200;300;400;500;600;700;800;900&display=swap"
    rel="stylesheet" />

  <title>Trip Tactix Contact Us</title>

  <!-- Bootstrap core CSS -->
  <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet" />

  <!-- Additional CSS Files -->
  <link rel="stylesheet" href="assets/css/fontawesome.css" />
  <link rel="stylesheet" href="assets/css/templatemo-woox-travel.css" />
  <link rel="stylesheet" href="assets/css/owl.css" />
  <link rel="stylesheet" href="assets/css/animate.css" />
  <link
    rel="stylesheet"
    href="https://unpkg.com/swiper@7/swiper-bundle.min.css" />
  <link rel="stylesheet" href="assets/css/sweetalert2.min.css" />
  <!--

TemplateMo 580 Woox Travel

https://templatemo.com/tm-580-woox-travel

-->
</head>

<body>
  <!-- ***** Preloader Start ***** -->
  <div id="js-preloader" class="js-preloader">
    <div class="preloader-inner">
      <span class="dot"></span>
      <div class="dots">
        <span></span>
        <span></span>
        <span></span>
      </div>
    </div>
  </div>
  <!-- ***** Preloader End ***** -->

  <!-- ***** Header Area Start ***** -->
  <header class="header-area header-sticky">
    <div class="container">
      <div class="row">
        <div class="col-12">
          <?php include('nav.php') ?>
        </div>
      </div>
    </div>
  </header>
  <!-- ***** Header Area End ***** -->

  <div class="second-page-heading">
    <div class="container">
      <div class="row">
        <div class="col-lg-12">
          <h4>Fill Free To Contact Us</h4>
          <h2>We Will Be Here For Any Inquiries</h2>
          <p>
            You Can Visit Our Agency Or Contact Us Through Any Of Our Channels
          </p>
        </div>
      </div>
    </div>
  </div>

  <div class="more-info reservation-info">
    <div class="container">
      <div class="row">
        <div class="col-lg-4 col-sm-6">
          <div class="info-item">
            <i class="fa fa-phone"></i>
            <h4>Make a Phone Call</h4>
            <a href="tel:011005995667">011005995667</a>
          </div>
        </div>
        <div class="col-lg-4 col-sm-6">
          <div class="info-item">
            <i class="fa fa-envelope"></i>
            <h4>Contact Us via Email</h4>
            <a href="mailto:info@TripTactix.com">info@TripTactix.com</a>
          </div>
        </div>
        <div class="col-lg-4 col-sm-6">
          <div class="info-item">
            <i class="fa fa-map-marker"></i>
            <h4>Visit Our Offices</h4>
            <a href="#">9th Street Maddi Cairo, Egypt</a>
          </div>
        </div>
      </div>
    </div>
  </div>

  <div class="reservation-form">
    <div class="container">
      <div class="row">
        <div class="col-lg-12">
          <div id="map">
            <iframe
              src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3456.4514157170684!2d31.25178397534178!3d29.966454274962945!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x1458478cd4b144c5%3A0xd99e2450fa10e375!2sStreet%209%2C%20Maadi%2C%20Cairo%20Governorate!5e0!3m2!1sen!2seg!4v1742247595249!5m2!1sen!2seg"
              width="100%"
              height="450px"
              frameborder="0"
              style="
                  border: 0;
                  border-top-left-radius: 23px;
                  border-top-right-radius: 23px;
                "
              allowfullscreen=""></iframe>
          </div>
        </div>
        <div class="col-lg-12">
          <form
            id="reservation-form"
            name="gs"
            method="post"
            role="search"
            action="func/contact_func.php">
            <div class="row">
              <div class="col-lg-12">
                <h4>Contact <em>Us</em> Through This <em>Form</em></h4>
              </div>
              <div class="col-lg-6">
                <fieldset>
                  <label for="Name" class="form-label">First Name</label>
                  <input
                    type="text"
                    name="fname"
                    class="Name"
                    placeholder="Ex. John Smithee"
                    autocomplete="on"
                    required />
                </fieldset>
              </div>
              <div class="col-lg-6">
                <fieldset>
                  <label for="Number" class="form-label">Last Name</label>
                  <input
                    type="text"
                    name="lname"
                    class="Number"
                    placeholder="Ex. Khalaf"
                    autocomplete="on"
                    required />
                </fieldset>
              </div>
              <div class="col-lg-12">
                <fieldset>
                  <label for="Number" class="form-label">E-mail</label>
                  <input
                    type="email"
                    name="email"
                    class="Number"
                    placeholder="Ex. Khalaf@gmail.com"
                    autocomplete="on"
                    required />
                </fieldset>
              </div>

              <div class="col-lg-12">
                <fieldset>
                  <label for="Number" class="form-label">Message</label>
                  <textarea
                    name="message"
                    id=""
                    class="form-control"
                    rows="5"
                    cols="50"></textarea>
                </fieldset>
              </div>

              <div class="col-lg-12 mt-5">
                <fieldset>
                  <input type="submit" name="submit" class="main-button" value="Send Now" 
                  style="background-color: #22b3c1;color: white;" />
                </fieldset>
              </div>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>

  <?php include('footer.php') ?>

  <!-- Scripts -->
  <!-- Bootstrap core JavaScript -->
  <script src="vendor/jquery/jquery.min.js"></script>
  <script src="vendor/bootstrap/js/bootstrap.min.js"></script>

  <script src="assets/js/isotope.min.js"></script>
  <script src="assets/js/owl-carousel.js"></script>
  <script src="assets/js/wow.js"></script>
  <script src="assets/js/tabs.js"></script>
  <script src="assets/js/popup.js"></script>
  <script src="assets/js/custom.js"></script>
  <script src="assets/js/sweetalert2.min.js"></script>

  <?php
  if (isset($_SESSION['success'])) {
  ?>
    <script>
      $(document).ready(function() {

        Swal.fire(
          'Success !',
          'Your Message Was Successfully Sent We Will Contact You As Soon As Possible',
          'success'
        )
      });
    </script>

  <?php
  }
  unset($_SESSION['success']);
  ?>

  <script>
    $(".option").click(function() {
      $(".option").removeClass("active");
      $(this).addClass("active");
    });
  </script>
</body>

</html>