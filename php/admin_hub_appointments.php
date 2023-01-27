<?php
    session_start();
    if(!isset($_SESSION["username"])){
        header("Location: login.php");
        exit();
    }
    if($_SESSION["type"] != 'admin'){
        header("Location: login.php");
        exit();
    }
?>

<html>
    <head>
      <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.1/jquery.min.js"></script>
      <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css"
      rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
      <link rel="stylesheet" href="../css/admin_hub.css">
    </head>
    <body>
      <?php
        include 'connect.php';
        echo '<nav class="navbar navbar-expand-lg navbar-light bg-light sticky-top">
        <div class="container-fluid">
          <a class="navbar-brand" href="#">
              <img src="../img/logo.png" width="200" height="80" class="d-inline-block align-top" alt="">
          </a>
          <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
          </button>
          <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
              <li class="nav-item">
                <a>Hello,' . $_SESSION["username"] .'</a>
              </li>
              <li class="nav-item active">
                <a href="admin_hub_appointments.php">Appointments</a>
              </li>  
              <li class="nav-item active">
                <a href="admin_hub_doctors.php">Doctors</a>
              </li> 
              <li class="nav-item active">
                <a href="nukeSession.php">Logout</a>
              </li> 
            </ul>
            <form class="d-flex">
              <input type="text" name="searchbox" id="searchbox" class="filterinput form-control" placeholder="search appointments">
            </form>
            </div>
          </div>
        </nav>';
        mysqli_close($conn);     
      ?> 
      <br>
      <?php
        include 'connect.php';
        // delete appointments
        if(isset($_GET['id']))
        {
            $app=$_GET['id'];
            $delete= mysqli_query($conn, "DELETE from appointments WHERE id = $app");
        }
        $query = "SELECT p1.FirstName as n1, p1.SureName as s1, p2.FirstName as n2, p2.SureName as s2,time, date, a.id FROM (appointments a join profile p2 on p2.user_id=patient_id) join profile p1 on p1.user_id=doc_id";
        $result = mysqli_query($conn, $query);

        if (mysqli_num_rows($result) > 0) {
          echo '<div class="d-flex flex-wrap">';
            while($row = $result->fetch_assoc()){ 
                #keep the appointment once 
                echo '<div class="col-sm-3 col-lg-3 col-xl-2 doctors">
                        <div class="blog-item m-1">
                          <div class="card">
                            <div class="card-body">
                                <h4 class="card-title">Appointment ' . $row['id'] . '</h4>
                                <p class="card-text">
                                  <h6> Doctor: ' . $row['n1'] . " " . $row['s1'] .'</h6>
                                  <h6> Patient: ' . $row['n2'] . " " . $row['s2'] . '</h6> 
                                  <h6> Date: ' . $row['date'] . '</h6>
                                  <h6> Time: ' . $row['time'] . '</h6>
                                </p>
                                <div class="text-center">
                                  <a href="admin_appointment_edit.php?id='.$row['id'].'" class="btn btn-primary">Edit</a>
                                  <a href="admin_hub_appointments.php?id='.$row['id'].'" class="btn btn-primary">Delete</a>
                                </div>
                            </div>
                        </div>
                      </div>
                    </div>';
            }
            echo '</div>';
            mysqli_close($conn);
        }else{
          echo '<div class="col-sm-9 col-md-7 col-lg-5 mx-auto my-5">
                    <div id="no_appoint" class="text-center py-4">
                      <h1>No Appointments</h1>
                    </div>
                </div>';
        }
        ?>
        <script>
        //live search
        $(document).ready(function() {
            $("#searchbox").on("keyup", function() {
                var value = $(this).val().toLowerCase();
                $(".doctors").filter(function() {
                    $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
                });
            });
        });
      </script>
          <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
          integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    </body>
</html>