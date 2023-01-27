<?php 
session_start();
if(!isset($_SESSION["username"])){
    header("Location: login.php");
    exit();
}
if($_SESSION["type"] != 'patient'){
    header("Location: login.php");
    exit();
}
?>
<html>
    <head>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css"
        rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
        <link rel="stylesheet" href="../css/_user_appointment.css">

    </head>
    <body>
    <?php
            // session_start();
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
                        <a href="user_hub.php">Doctors</a>
                      </li>
                      <li class="nav-item active">
                        <a href="user_profile_edit.php">Profile</a>
                      </li>
                      <li class="nav-item active">
                        <a href="user_appointment.php">My appointments</a>
                      </li>
                      <li class="nav-item active">
                        <a href="nukeSession.php">Logout</a>
                      </li>
                    </ul>
                  </div>
                </div>
              </nav>';            
        ?> 

        <?php
        
        include 'connect.php';
        
        if(isset($_GET['id']))
        {
          $app=$_GET['id'];
          $delete= mysqli_query($conn, "DELETE from appointments WHERE id = $app");
                
        }
    
        $id = $_SESSION["id"];
        $query = "SELECT a.id as app_id, doc_id, FirstName, SureName, PhoneNumber, Address, date, time  FROM appointments a join profile p where doc_id=p.user_id and patient_id = $id ";
        $result = mysqli_query($conn, $query);
        #check if user exists
        if (mysqli_num_rows($result) > 0) {
                #keep the appointment once 
                echo '<div class="d-flex flex-wrap">';
                while($row = $result->fetch_assoc()){ 
                    echo '<div class="col-sm-3 doctors">
                            <div class="blog-item m-1">
                              <div class="card">
                                <img src="../img/profile.png" class=" doctor-profile-pic card-img-top">
                                <div class="card-body">
                                <h4 class="card-title">' . $row['FirstName']  ." ". $row['SureName'] . '</h4>
                                <h6>' . $row['PhoneNumber'] . '</h6>
                                <h6>' . $row['Address'] . '</h6>
                                <h6>' . $row['date']  .'</h6>
                                <h6>' . $row['time']  .'</h6>
                                <a id="doc_profile" href="doctor_profile_view.php?id=' . $row['doc_id'] . '">View Doctor Profile</a>
                                <div class="text-center">
                                  <a href="user_appointment_edit.php?id='.$row['app_id'].'" class="btn btn-primary">Edit</a>
                                  <a href="user_appointment.php?id='.$row['app_id'].'" class="btn btn-primary">Delete</a>
                                </div>
                                </div>
                              </div>
                            </div>
                          </div>';
                }
                echo '</div>';
            //     echo '<div class="container-float">
            //     <div class="row">
            //         <div class="col-sm-9 col-md-8 col-lg-8 mx-auto ">
            //         <div class="card border-0 shadow rounded-3 m-5">
            //             <div class="card-body text-center p-3 m-1 ">
            //                 <h3 class="card-title">Your Appointment</h3>
            //                 <p>
            //                     <img src="../img/profile.png">
            //                     <h5>' . $row['FirstName']  . $row['SureName'] . '</h5>
            //                     <h5>' . $row['PhoneNumber'] . '</h5>
            //                     <h5>' . $row['Address'] . '</h5>
            //                     <h5>' . $row['date']  .'</h5>
            //                     <h5>' . $row['time']  .'</h5>
            //                     <a id="doc_profile" href="doctor_profile_view.php?id=' . $row['doc_id'] . '">View Doctor Profile</a>
    
            //                 </p>
            //                 <div class="d-grid gap-2 col-3 mx-auto">
            //                   <a href="user_appointment_edit.php?id='.$row['app_id'].'" class="btn btn-primary">Edit</a>
            //                   <a href="user_appointment.php?id='.$row['app_id'].'" class="btn btn-primary">Delete</a>
            //                 </div>
            //         </div>
            //         </div>
            // </div>';
            }
              mysqli_close($conn);
    ?>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    </body>
</html>
