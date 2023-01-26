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
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css"
        rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
        <link rel="stylesheet" href="../css/admin_hub.css">

    </head>
    <body>
        <header>
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
                    </div>
                  </div>
                </nav>';
                mysqli_close($conn);
            
                ?> 
            <br>
        </header>
        <nav class="nav nav-pills nav-justified">
            <a class="nav-link active" aria-current="page" href="#">Appointments</a>
            <a class="nav-link" href="admin_hub_doctors.php">Doctors</a>
        </nav>
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
                while($row = $result->fetch_assoc()){ 
                    #keep the appointment once 
                    echo '<div class="card w-50">
                            <div class="card-body">
                                <h5 class="card-title">Appointment ' . $row['id'] . '</h5>
                                <h5> Doctor: ' . $row['n1'] . $row['s1'] .'</br>
                                Patient: ' . $row['n2'] .  $row['s2'] . '</br> 
                                Date: ' . $row['date'] . '</br>
                                Time: ' . $row['time'] . '
                                </h5>
                                <a href="admin_appointment_edit.php?id='.$row['id'].'" class="btn btn-primary">Edit</a>
                                <a href="admin_hub_appointments.php?id='.$row['id'].'" class="btn btn-primary">Delete</a>
                            </div>
                            </div>
                            <br>';
                }
                  mysqli_close($conn);
            }
        ?>
        
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    </body>
</html>