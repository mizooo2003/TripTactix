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

  <title>Trip Tactix - Special Deals</title>

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

  <!-- Modal -->
  <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Book Now</h5>

          <a href="javascript:void(0)" onclick="CloseModal()"><i class="fa fa-times"></i></a>
        </div>
        <div class="modal-body">
          <form action="func/transportation_request.php" method="post">
            <input type="hidden" name="hdn_id" id="hdn_id">
            <select class="form-control" id="tickets" name="price" required>

            </select>
            <br>

            <input type="number" name="qty" placeholder="Number Of Tickets" class="form-control" required>



        </div>
        <div class="modal-footer">
          <input type="submit" name="request" class="btn btn-secondary" value="Book" />
          </form>
        </div>
      </div>
    </div>
  </div>

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

  <div class="page-heading">
    <div class="container">
      <div class="row">
        <div class="col-lg-12">
          <h4>Discover Our Weekly Offers</h4>
          <h2>Amazing Prices &amp; More</h2>
          <div class="border-button">
            <a href="about.html">Discover More</a>
          </div>
        </div>
      </div>
    </div>
  </div>

  <div class="search-form">
    <div class="container">
      <div class="row">
        <div class="col-lg-12">
          <form
            id="search-form"
            name="gs"
            method="post"
            role="search"
            action="transportations.php">
            <div class="row">
              <div class="col-lg-2">
                <h4>Sort Deals By:</h4>
              </div>
              <div class="col-lg-4">
                <fieldset>
                  <select
                    name="city"
                    class="form-select"
                    aria-label="Default select example"
                    id="chooseLocation"
                    onChange="this.form.click()">
                    <option selected value="">Destinations</option>
                    <?php

                    $sql = "select * from cities";
                    $result = $DB->query($sql);
                    while ($row = $result->fetch_assoc()): {

                    ?>
                        <option value="<?php echo $row['id']; ?>"><?php echo $row['city']; ?></option>
                    <?php
                      }
                    endwhile;
                    ?>
                  </select>
                </fieldset>
              </div>
              <div class="col-lg-4">
                <fieldset>
                  <select

                    name="price"
                    class="form-select"
                    aria-label="Default select example"
                    id="choosePrice"
                    onChange="this.form.click()">
                    <option selected value="">Price Range</option>
                    <option value="100">
                      < EGP 100</option>
                    <option value="200">
                      < EGP 200</option>
                    <option value="500">
                      < EGP 500</option>
                    <option value="1000">
                      < EGP 1000</option>
                    <option value="2000">
                      < EGP 2000</option>
                  </select>
                </fieldset>
              </div>
              <div class="col-lg-2">
                <fieldset>
                  <input type="submit" class="border-button" value="Search Results" name="filter" />
                </fieldset>
              </div>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>

  <div class="weekly-offers">
    <div class="container">
      <div class="row">
        <div class="col-lg-6 offset-lg-3">
          <div class="section-heading text-center">
            <h2>Best Transportations Offers</h2>
            <p>We Have Punch Of Transportations Offers</p>
          </div>
        </div>
      </div>
    </div>
    <div class="container-fluid">
      <div class="row">
        <div class="col-lg-12">
          <div class="owl-weekly-offers owl-carousel">


            <?php

            if (isset($_POST['filter'])) {

              $sql = "SELECT transportations.id, transportations.city_image, transportations.foreign_ticket,
                 transportations.egyptian_ticket, transportations.duration, transportations.time_slot , 
                 transportations.direction, transportation_types.title AS type_name, city_from.city AS city_from, city_to.city AS city_to
                 FROM transportations 
                 INNER JOIN cities AS city_from ON city_from.id = transportations.city_from 
                 INNER JOIN cities AS city_to ON city_to.id = transportations.city_to 
                 INNER JOIN transportation_types ON transportation_types.id = transportations.type_id
                 
                 where
                     ('$_POST[city]' = '' or transportations.city_to = '$_POST[city]')
                     and
                     ('$_POST[price]' = '' or transportations.egyptian_ticket <= '$_POST[price]')";
            } else {
              $sql = "SELECT transportations.id, transportations.city_image, transportations.foreign_ticket,
  transportations.egyptian_ticket, transportations.duration, transportations.time_slot , 
  transportations.direction, transportation_types.title AS type_name, city_from.city AS city_from, city_to.city AS city_to
  FROM transportations 
  INNER JOIN cities AS city_from ON city_from.id = transportations.city_from 
  INNER JOIN cities AS city_to ON city_to.id = transportations.city_to 
  INNER JOIN transportation_types ON transportation_types.id = transportations.type_id";
            }


            $result = $DB->query($sql) or die("failed to query" . mysqli_error($DB));

            while ($row = $result->fetch_assoc()): {

            ?>


                <div class="item">
                  <div class="thumb">
                    <img src="dashboard/functions/places/<?php echo $row['city_image']; ?>" alt="" />
                    <div class="text">
                      <h4>
                        <?php echo $row['city_from']; ?> To <?php echo $row['city_to']; ?><br /><span><i class="fa fa-bus"></i>
                          <?php echo $row['type_name']; ?></span>
                      </h4>
                      <h6> <?php echo $row['egyptian_ticket']; ?> EGP <br /><span>/person</span></h6>
                      <div class="line-dec"></div>
                      <ul>
                        <li>More Details:</li>
                        <li>
                          <i class="fa fa-time"></i> <?php echo $row['duration']; ?> Hours
                        </li>
                        <li>
                          <i class="fa fa-time"></i> <?php echo date('h:i:s a', strtotime($row['time_slot'])) ?> Picking Up Time
                        </li>
                        <li>
                          <a target="_blank" href="<?php echo $row['direction']; ?>"><i class="fa fa-map-marker"></i> Get Picking Up Direction </a>
                        </li>
                      </ul>
                      <div class="main-button">
                        <a href="javascript:void(0)"
                          onclick="OpenModal(<?php echo $row['id']; ?>,<?php echo $row['egyptian_ticket']; ?>,<?php echo $row['foreign_ticket']; ?>)">Book Now</a>
                      </div>
                    </div>
                  </div>
                </div>



            <?php
              }
            endwhile;
            ?>





          </div>
        </div>
      </div>
    </div>
  </div>

  <div class="call-to-action">
    <div class="container">
      <div class="row">
        <div class="col-lg-8">
          <h2>Are You Looking To Travel ?</h2>
          <h4>Make A Reservation By Clicking The Button</h4>
        </div>
        <div class="col-lg-4">
          <div class="border-button">
            <a href="reservation.html">Book Yours Now</a>
          </div>
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
          'Successfully Booked',
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

    function OpenModal(place, eg, fr) {
      $('#hdn_id').val(place);
      $('#tickets').html("");
      $('#tickets').append("<option value=''>Select Ticket Type</option>");
      $('#tickets').append("<option value=" + eg + ">Egyptians Ticket " + eg + " EGP</option>");
      $('#tickets').append("<option value=" + fr + ">Foreigners Ticket  " + fr + " EGP</option>");

      $('#exampleModal').modal('show');
    }

    function CloseModal() {
      $('#exampleModal').modal('toggle');
    }
  </script>
</body>

</html>