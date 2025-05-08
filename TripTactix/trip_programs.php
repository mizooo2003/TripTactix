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
          <form action="func/program_requests.php" method="post">
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
            action="trip_programs.php">
            <div class="row">
              <div class="col-lg-2">
                <h4>Sort Deals By:</h4>
              </div>

              <div class="col-lg-8">
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

  <div class="amazing-deals">
    <div class="container">
      <div class="row">
        <div class="col-lg-6 offset-lg-3">
          <div class="section-heading text-center">
            <h2>Best Weekly Offers In Each City</h2>

          </div>
        </div>




        <?php



        if (isset($_POST['filter'])) {

          $sql = "SELECT trip_programs.id,
                trip_programs.program_title,
                trip_programs.foregin_ticket, 
                trip_programs.egyptian_ticket, 
                tourism_places.title as place_title,
                tourism_places.place_image,
                 tour_guides.guide_name, 
                transportations.duration, 
                transportations.time_slot, transportations.direction, 
                transportation_types.title AS type_name, city_from.city AS city_from, city_to.city AS city_to 
                FROM trip_programs 
                INNER JOIN transportations ON transportations.id = trip_programs.transportation_id 
                INNER JOIN tourism_places ON tourism_places.id = trip_programs.place_id
                INNER JOIN tour_guides ON tour_guides.id = trip_programs.guid_id
                INNER JOIN cities AS city_from ON city_from.id = transportations.city_from 
                INNER JOIN cities AS city_to ON city_to.id = transportations.city_to 
                INNER JOIN transportation_types ON transportation_types.id = transportations.type_id
                
                where ('$_POST[price]' = '' or trip_programs.egyptian_ticket <= '$_POST[price]')
                ";
        } else {
          $sql = "SELECT trip_programs.id,
                trip_programs.program_title,
                trip_programs.foregin_ticket, 
                trip_programs.egyptian_ticket, 
                tourism_places.title as place_title,
                tourism_places.place_image,
                 tour_guides.guide_name, 
                transportations.duration, 
                transportations.time_slot, transportations.direction, 
                transportation_types.title AS type_name, city_from.city AS city_from, city_to.city AS city_to 
                FROM trip_programs 
                INNER JOIN transportations ON transportations.id = trip_programs.transportation_id 
                INNER JOIN tourism_places ON tourism_places.id = trip_programs.place_id
                INNER JOIN tour_guides ON tour_guides.id = trip_programs.guid_id
                INNER JOIN cities AS city_from ON city_from.id = transportations.city_from 
                INNER JOIN cities AS city_to ON city_to.id = transportations.city_to 
                INNER JOIN transportation_types ON transportation_types.id = transportations.type_id";
        }


        $result = $DB->query($sql) or die("failed to query" . mysqli_error($DB));

        while ($row = $result->fetch_assoc()): {

        ?>

            <div class="col-lg-6 col-sm-6">
              <div class="item">
                <div class="row">
                  <div class="col-lg-6">
                    <div class="image">
                      <img src="dashboard/functions/places/<?php echo $row['place_image'] ?>" alt="" style="height: 460px;" />
                    </div>
                  </div>
                  <div class="col-lg-6 align-self-center">
                    <div class="content">
                      <span class="info">*Today & Tomorrow Only <?php echo $row['egyptian_ticket']; ?> / EGP</span>
                      <h4><?php echo $row['program_title']; ?></h4>
                      <div class="row">
                        <div class="col-6">
                          <i class="fa fa-home"></i>
                          <span class="list"><?php echo $row['place_title']; ?></span>
                        </div>
                        <div class="col-6">
                          <i class="fa fa-user"></i>
                          <span class="list"><?php echo $row['guide_name']; ?></span>
                        </div>
                      </div>
                      <p>
                        Pickup Point : <?php echo $row['city_from']; ?>
                        <br>
                        To : <?php echo $row['city_to']; ?>
                        <br>
                        Time : <?php echo date('h:i:s a', strtotime($row['time_slot'])) ?>
                        <br>
                        Duration : <?php echo $row['duration']; ?>
                        <br>
                        <a target="_blank" href="<?php echo $row['direction']; ?>">Get Direction ? </a>

                      </p>

                      <div class="main-button">
                        <a href="javascript:void(0)"
                          onclick="OpenModal(<?php echo $row['id']; ?>,<?php echo $row['egyptian_ticket']; ?>,<?php echo $row['foregin_ticket']; ?>)">Book Now</a>
                      </div>
                    </div>
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