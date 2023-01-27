<?php 
session_start();
if(!isset($_SESSION["username"])){
    header("Location: login.php");
    exit();
}
// if($_SESSION["type"] != 'doctor'){
//     header("Location: login.php");
//     exit();
// }
?>
<html>
    <head>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css"
        rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
        <link rel="stylesheet" href="../css/admin_hub.css">

    </head>
    <body>
        <?php
            //   session_start();
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
                  </div>
                </div>
              </nav>';
              mysqli_close($conn);
        ?> 
        <?php
            include 'connect.php';
            if(isset($_GET['doc'])){
                $app=$_GET['doc'];
                $delete= mysqli_query($conn, "DELETE from users WHERE id = $doc"); 
            }

            if(isset($_GET['id'])){
                $id = $_GET['id'];
            }
            $query = "SELECT * from users u, profile p  where user_id =$id and u.id= $id ";
            $result = mysqli_query($conn, $query);
            #check if user exists
            if (mysqli_num_rows($result) >0) {
                while($row = $result->fetch_assoc()){ 
                    echo '<div class="container-float">
                    <div class="row">
                        <div class="col-sm-9 col-md-8 col-lg-8 mx-auto ">
                        <div class="card border-0 shadow rounded-3 m-5">
                            <div class="card-body text-center p-3 m-1">
                                <h3 class="card-title">' . $row['FirstName'] . $row['SureName']  .'</h3>
                                <p>
                                    <img src="../img/profile.png">
                                    <h5>'  .$row['Address'] .'</h5>
                                    <h5>'  .$row['PhoneNumber'] .'</h5>
                                    <h5>'  .$row['email'] .'</h5>
                                    <h5>'  .$row['Specialization'] .'</h5>
                                    <h6>'  .$row['bio'] .'</h6>
                                </p>
                                <a href="admin_doctor_edit.php?doc='.$id.'" class="btn btn-primary">Edit</a>
                                <a href="doctor_hub.php?doc='.$row['id'].'" class="btn btn-primary">Delete</a>
                            </div>
                        </div>
                        </div>
                    </div>
                    </div>';
                }
                  mysqli_close($conn);
            }
        ?>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    </body>
</html>