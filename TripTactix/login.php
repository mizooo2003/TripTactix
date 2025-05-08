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

  <title>Trip Tactix Login</title>

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
          <h4>Sign In</h4>
          <h2>Login To Be Able To Use Our Services</h2>
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
          <form
            id="reservation-form"
            name="gs"
            method="post"
            role="search"
            action="func/login_func.php">
            <div class="row">
              <div class="col-lg-12">
                <h4>Sign <em>In</em> Through This <em>Form</em></h4>
              </div>


              <div class="col-lg-6">
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

              <div class="col-lg-6">
                <fieldset>
                  <label for="Number" class="form-label">Password</label>
                  <input
                    type="password"
                    name="password"
                    class="Number"
                    placeholder="xxxxxxxxx"
                    autocomplete="on"
                    required />
                </fieldset>
              </div>



              <div class="col-lg-12 mt-5">
                <fieldset>
                  <input type="submit" name="login" class="main-button" value="Sign In Now"
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
          'Successfully Logged In',
          'success'
        )

        setTimeout(() => {
          window.location.href = "index.php";

        }, 2000);

      });
    </script>

  <?php
  }
  unset($_SESSION['success']);
  ?>


  <?php
  if (isset($_SESSION['error'])) {
  ?>
    <script>
      $(document).ready(function() {

        Swal.fire(
          'Opps !',
          'Wrong Email Or Password ! Please Try Again',
          'error'
        )
      });
    </script>

  <?php
  }
  unset($_SESSION['error']);
  ?>


<?php
  if (isset($_SESSION['session_erorr'])) {
  ?>
    <script>
      $(document).ready(function() {

        Swal.fire(
          'Opps !',
          'You Have To Login First',
          'warning'
        )
      });
    </script>

  <?php
  }
  unset($_SESSION['session_erorr']);
  ?>

  <script>
    $(".option").click(function() {
      $(".option").removeClass("active");
      $(this).addClass("active");
    });
  </script>
</body>

</html>