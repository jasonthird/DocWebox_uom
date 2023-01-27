<?php
    session_start();
    if(!isset($_SESSION["username"])){
        header("Location: login.php");
    }
    if($_SESSION["type"] != 'doctor'){
        header("Location: login.php");
    }


?>

<html>
    <head>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css"
        rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
        <link rel="stylesheet" href="../css/doctor_hub.css">

    </head>
    <body>
        <?php
          include 'connect.php';
          if(isset($_GET['app'])){
            $app=$_GET['app'];
            $delete= mysqli_query($conn, "DELETE from appointments WHERE id = $app");
          }
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
                  <a href="doctor_hub.php">My Appointments</a>
                </li> 
                <li class="nav-item active">
                  <a href="doctor_profile_edit.php">Profile</a>
                </li>  
                <li class="nav-item active">
                  <a href="nukeSession.php">Logout</a>
                </li> 
                </ul>
              </div>
            </div>
          </nav>';
        mysqli_close($conn);
      ?> 
      <br>
      <?php
        include 'connect.php';
        $id=$_SESSION["id"];
        $query = "SELECT p.FirstName, p.SureName, a.date, a.time, a.id FROM appointments a join profile p where doc_id= $id and patient_id=p.user_id";
        $result = mysqli_query($conn, $query);
        #check if user exists
        if (mysqli_num_rows($result) > 0) {
          #keep the appointment once 
          echo '<div class="d-flex flex-wrap">';
          while($row = $result->fetch_assoc()){ 
            echo '<div class="col-sm-3 doctors">
                    <div class="blog-item m-1">
                      <div class="card">
                        <div class="card-body">
                        <h4 class="card-title">Appointment ' . $row['id'] . '</h4>
                        <h6>' . $row['FirstName'] . ' ' .   $row['SureName'] . '</h6>
                        <h6>' . $row['date'] . '</h6>
                        <h6>' . $row['time']  .'</h6>
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
      <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
      integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    </body>
</html>