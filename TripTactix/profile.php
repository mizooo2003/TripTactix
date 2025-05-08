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

  <title>Trip Tactix Profile</title>

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
          <h4>User Profile</h4>
          <h2>All Your Details Here</h2>

        </div>
      </div>
    </div>
  </div>

  <?php
  if (isset($_SESSION['logged_id'])) {

    $sql = "select * from users where id = '$_SESSION[logged_id]'";
    $result = $DB->query($sql) or die("failed to query" . mysqli_error($db));
    $row = $result->fetch_assoc();
  } else {
    header('location:login.php');
  }


  ?>

  <div class="more-info reservation-info">
    <div class="container">
      <div class="row">
        <div class="col-lg-12 col-sm-12">
          <div class="info-item">
            <img src="func/users/<?php echo $row['image'] ?>" alt="" style="width: 150px;height: 150px;border-radius: 150px;margin-bottom: 10px;">
            <h4><?php echo $row['name'] ?></h4>
            <a href="tel:<?php echo $row['phone'] ?>"><?php echo $row['phone'] ?></a>
            <p><?php echo $row['email'] ?></p>
            <p><?php echo $row['address'] ?></p>
          </div>
        </div>


      </div>

      <div class="row mt-5">
        <div class="col-lg-10 col-sm-10 offset-1">
          <h2>Tourism Places Requests</h2>
          <div class="info-item mt-3" style="width: 100%;overflow-x: scroll;" >
            <table class="table table-hover">
              <thead>
                <tr>
                  <th scope="col">Place Image</th>
                  <th scope="col">Place Title</th>
                  <th scope="col">City</th>
                  <th scope="col">Ticket Price</th>
                  <th scope="col">Quantity</th>
                  <th scope="col">Total</th>
                  <th scope="col">Request Date</th>
                  <th scope="col">Status</th>
                </tr>
              </thead>
              <tbody>
                <?php
                $sql = "SELECT places_requests.id, users.image, users.name, users.email,
                 users.phone, users.address, tourism_places.place_image, tourism_places.title, cities.city,
                  places_requests.ticket_price, places_requests.qty,
                   places_requests.req_date, places_requests.status 
                   from places_requests 
                   INNER JOIN users on users.id = places_requests.user_id 
                   INNER JOIN tourism_places on tourism_places.id = places_requests.place_id 
                    INNER JOIN cities on cities.id = tourism_places.city_id
                    where 
                    places_requests.user_id = '$_SESSION[logged_id]'";
                $result = $DB->query($sql) or die("failed to query" . mysqli_error($DB));

                while ($row = $result->fetch_assoc()): {

                ?>

                    <tr>
                      <td><img src="dashboard/functions/places/<?php echo $row['place_image']; ?>" width="70" height="70"></td>
                      <td><?php echo $row['title']; ?></td>
                      <td><?php echo $row['city']; ?></td>
                      <td><?php echo $row['ticket_price']; ?> EGP</td>
                      <td><?php echo $row['qty']; ?></td>
                      <td><?php echo number_format( $row['qty'] * $row['ticket_price']); ?> EGP</td>

                      <td><?php echo date('d/m/y h:i:s a', strtotime($row['req_date']))  ?></td>
                      <td><?php echo $row['status']; ?></td>
                      
                    </tr>

                <?php
                  }
                endwhile;
                ?>

              </tbody>
            </table>

          </div>
        </div>


      </div>


      <div class="row mt-5">
        <div class="col-lg-10 col-sm-10 offset-1">
          <h2>Tour Guides Requests</h2>
          <div class="info-item mt-3" style="width: 100%;overflow-x: scroll;" >
            <table class="table table-hover" >
              <thead>
                <tr>
                  <th scope="col">Guide Image</th>
                  <th scope="col">Guide Name</th>
                  <th scope="col">City</th>
                  <th scope="col">Ticket Price</th>
                  <th scope="col">Quantity</th>
                  <th scope="col">Total</th>
                  <th scope="col">Request Date</th>
                  <th scope="col">Status</th>
                </tr>
              </thead>
              <tbody>
                <?php
                $sql = "SELECT tour_guides_requests.id, users.image, users.name, users.email,
                 users.phone, users.address, tour_guides.guide_image, tour_guides.guide_name, 
                 cities.city,
                  tour_guides_requests.ticket_price,
                   tour_guides_requests.qty,
                   tour_guides_requests.req_date, tour_guides_requests.status 
                   from tour_guides_requests 
                   INNER JOIN users on users.id = tour_guides_requests.user_id 
                   INNER JOIN tour_guides on tour_guides.id = tour_guides_requests.guide_id 
                    INNER JOIN cities on cities.id = tour_guides.city_id
                    where 
                    tour_guides_requests.user_id = '$_SESSION[logged_id]'
                    ";
                $result = $DB->query($sql) or die("failed to query" . mysqli_error($DB));

                while ($row = $result->fetch_assoc()): {

                ?>

                    <tr>
                      <td><img src="dashboard/functions/guides/<?php echo $row['guide_image']; ?>" width="70" height="70"></td>
                      <td><?php echo $row['guide_name']; ?></td>
                      <td><?php echo $row['city']; ?></td>
                      <td><?php echo $row['ticket_price']; ?> EGP</td>
                      <td><?php echo $row['qty']; ?></td>
                      <td><?php echo number_format( $row['qty'] * $row['ticket_price']); ?> EGP</td>

                      <td><?php echo date('d/m/y h:i:s a', strtotime($row['req_date']))  ?></td>
                      <td><?php echo $row['status']; ?></td>
                     
                    </tr>

                <?php
                  }
                endwhile;
                ?>

              </tbody>
            </table>

          </div>
        </div>


      </div>


      <div class="row mt-5">
        <div class="col-lg-10 col-sm-10 offset-1">
          <h2>Transportations Requests</h2>
          <div class="info-item mt-3" style="width: 100%;overflow-x: scroll;" >
            <table class="table table-hover">
              <thead>
                <tr>
                  <th scope="col">Place Image</th>
                  <th scope="col">Transportation Type</th>
                  <th scope="col">City From</th>
                  <th scope="col">City To</th>
                  <th scope="col">Duration</th>
                  <th scope="col">Time Slot</th>
                  <th scope="col">Ticket Price</th>
                  <th scope="col">Quantity</th>
                  <th scope="col">Total</th>
                  <th scope="col">Request Date</th>
                  <th scope="col">Status</th>
                </tr>
              </thead>
              <tbody>
                <?php
                $sql = "SELECT transportation_requests.id, users.image, users.name, users.email,
                 users.phone, users.address, transportations.city_image, transportations.duration,
                 transportations.time_slot, 
                  transportation_types.title AS type_name, city_from.city AS city_from, city_to.city AS city_to,
                  transportation_requests.ticket_price, transportation_requests.qty,
                   transportation_requests.req_date, transportation_requests.status 
                   from transportation_requests 
                   INNER JOIN users on users.id = transportation_requests.user_id 
                    INNER JOIN transportations on transportations.id = transportation_requests.transportation_id 
                  INNER JOIN cities AS city_from ON city_from.id = transportations.city_from 
                INNER JOIN cities AS city_to ON city_to.id = transportations.city_to 
                INNER JOIN transportation_types ON transportation_types.id = transportations.type_id
                
                 where 
                    transportation_requests.user_id = '$_SESSION[logged_id]'
                ";
                $result = $DB->query($sql) or die("failed to query" . mysqli_error($DB));

                while ($row = $result->fetch_assoc()): {

                ?>

                    <tr>
                      <td><img src="dashboard/functions/places/<?php echo $row['city_image']; ?>" width="70" height="70"></td>
                      <td><?php echo $row['type_name']; ?></td>
                      <td><?php echo $row['city_from']; ?></td>
                      <td><?php echo $row['city_to']; ?></td>
                      <td><?php echo $row['duration']; ?></td>
                      <td><?php echo date('h:i:s a', strtotime($row['time_slot'])) ?></td>
                      <td><?php echo $row['ticket_price']; ?> EGP</td>
                      <td><?php echo $row['qty']; ?></td>
                      <td><?php echo number_format( $row['qty'] * $row['ticket_price']); ?> EGP</td>

                      <td><?php echo date('d/m/y h:i:s a', strtotime($row['req_date']))  ?></td>
                      <td><?php echo $row['status']; ?></td>
                     
                    </tr>

                <?php
                  }
                endwhile;
                ?>

              </tbody>
            </table>

          </div>
        </div>


      </div>



      <div class="row mt-5">
        <div class="col-lg-10 col-sm-10 offset-1">
          <h2>Programs Requests</h2>
          <div class="info-item mt-3" style="width: 100%;overflow-x: scroll;" >
            <table class="table table-hover">
              <thead>
                <tr>
                  <th scope="col">Place Image</th>
                  <th scope="col">Place Title</th>
                  <th scope="col">Guide Name</th>
                  <th scope="col">Transportation Type</th>
                  <th scope="col">City From</th>
                  <th scope="col">City To</th>
                  <th scope="col">Duration</th>
                  <th scope="col">Time Slot</th>
                  <th scope="col">Ticket Price</th>
                  <th scope="col">Quantity</th>
                  <th scope="col">Total</th>
                  <th scope="col">Request Date</th>
                  <th scope="col">Status</th>
                </tr>
              </thead>
              <tbody>
                <?php
                $sql = "SELECT trip_programs_requests.id,
                trip_programs.program_title,
                trip_programs.foregin_ticket, 
                trip_programs.egyptian_ticket, 
                tourism_places.title as place_title,
                tourism_places.place_image,
                tour_guides.guide_name, 
                transportations.duration, 
                transportations.time_slot, transportations.direction, 
                transportation_types.title AS type_name, city_from.city AS city_from, city_to.city AS city_to ,
                trip_programs_requests.ticket_price, trip_programs_requests.qty,
                   trip_programs_requests.req_date, trip_programs_requests.status 
                FROM trip_programs_requests 

                INNER JOIN trip_programs ON trip_programs.id = trip_programs_requests.trip_id 
                INNER JOIN transportations ON transportations.id = trip_programs.transportation_id 
                INNER JOIN tourism_places ON tourism_places.id = trip_programs.place_id
                INNER JOIN tour_guides ON tour_guides.id = trip_programs.guid_id
                INNER JOIN cities AS city_from ON city_from.id = transportations.city_from 
                INNER JOIN cities AS city_to ON city_to.id = transportations.city_to 
                INNER JOIN transportation_types ON transportation_types.id = transportations.type_id
                
                 where 
                    trip_programs_requests.user_id = '$_SESSION[logged_id]'
                ";
                $result = $DB->query($sql) or die("failed to query" . mysqli_error($DB));

                while ($row = $result->fetch_assoc()): {

                ?>

                    <tr>
                      <td><img src="dashboard/functions/places/<?php echo $row['place_image']; ?>" width="70" height="70"></td>
                      <td><?php echo $row['place_title']; ?></td>
                      <td><?php echo $row['guide_name']; ?></td>
                      <td><?php echo $row['type_name']; ?></td>
                      <td><?php echo $row['city_from']; ?></td>
                      <td><?php echo $row['city_to']; ?></td>
                      <td><?php echo $row['duration']; ?></td>
                      <td><?php echo date('h:i:s a', strtotime($row['time_slot'])) ?></td>
                      <td><?php echo $row['ticket_price']; ?> EGP</td>
                      <td><?php echo $row['qty']; ?></td>
                      <td><?php echo number_format( $row['qty'] * $row['ticket_price']); ?> EGP</td>

                      <td><?php echo date('d/m/y h:i:s a', strtotime($row['req_date']))  ?></td>
                      <td><?php echo $row['status']; ?></td>
                     
                    </tr>

                <?php
                  }
                endwhile;
                ?>

              </tbody>
            </table>

          </div>
        </div>


      </div>


    </div>


  </div>

  <div class="reservation-form">
    <div class="container">
      <div class="row">
        <div class="col-lg-12">

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

  <script>
    $(".option").click(function() {
      $(".option").removeClass("active");
      $(this).addClass("active");
    });
  </script>
</body>

</html>