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
        <link rel="stylesheet" href="../css/doctor_profile_view.css">

    </head>
    <body >
        <header>

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
  
              mysqli_close($conn);
        
            ?> 
           
        </header>
        <?php
           
            include 'connect.php';
            if(isset($_GET['id'])){
                $id = $_GET['id'];
        
            $query = "SELECT * from users u, profile p  where user_id =$id and u.id= $id ";
            $result = mysqli_query($conn, $query);
            #check if user exists
            if (mysqli_num_rows($result) >0) {
                
               
                while($row = $result->fetch_assoc()){ 
                   
                    echo '        
                    <div class="container-float">
                    <div class="row">
                        <div class="col-sm-9 col-md-8 col-lg-8 mx-auto ">
                        <div class="card border-0 shadow rounded-3 m-5">
                            <div class="card-body text-center p-3 m-1 ">
                                <h3 class="card-title">' . $row['FirstName'] . $row['SureName']  .'</h3>
                                <p>
                                    <img src="../img/profile.png">
                                    <h5>'  .$row['Address'] .'</h5>
                                    <h5>'  .$row['PhoneNumber'] .'</h5>
                                    <h5>'  .$row['email'] .'</h5>
                                    <h5>'  .$row['Specialization'] .'</h5>
                                    <h6>'  .$row['bio'] .'</h6>
        
                                </p>
                                <form method="POST" action="">
                                <div class="form-floating m-3">
                                <input type="date" name="date" value="" class="form-control" id="floatingInput">
                                <label for="floatingInput">Date</label>
                                </div>
                                <div class="form-floating m-3">
                                <input type="time" name="time" value="" class="form-control" id="floatingInput">
                                <label for="floatingInput">Time</label>
                                </div>
                                <div class="d-grid gap-2 col-3 mx-auto">
                                    <button class="btn btn-primary" name="submit" type="submit">Submit Appointment</button>
                                </div>
                                </form>';
 
                }
                  
                if (isset($_POST['submit'])) {
                    $id = $_GET['id'];
                    $insert_id =$_SESSION["id"];
                    $date = $_POST['date'];
                    $time = $_POST['time'];
                    #check if time and date is available
                    $query = "SELECT * from appointments where doc_id =$id and date = '$date' and time = '$time' ";
                    $result = mysqli_query($conn, $query);
                    if (mysqli_num_rows($result) >0) {
                        echo '<div class="alert alert-danger" role="alert">
                        This time is not available
                      </div>';
                    }
                    #check if date is in the past
                    elseif($date < date('Y-m-d')){
                        echo '<div class="alert alert-danger" role="alert">
                        This date is in the past
                      </div>';
                    }
                    else{
                        $query = "INSERT INTO appointments (patient_id, doc_id, date, time) VALUES ('$insert_id', '$id', '$date', '$time')";
                        $result = mysqli_query($conn, $query);
                        header('location: user_hub.php');
                    }
                   mysqli_close($conn); 
                }
            }
        }
        ?>
        </div>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    </body>
</html>
