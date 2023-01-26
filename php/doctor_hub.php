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
    <header>
        <nav class="navbar navbar-light bg-light">
            <a class="navbar-brand" href="#">
                <img src="../img/logo.png" width="280" height="80" class="d-inline-block align-top" alt="">
            </a>
            <?php
                
    //    session_start();
        include 'connect.php';
        if(isset($_GET['app']))
                {
                    $app=$_GET['app'];
                    $delete= mysqli_query($conn, "DELETE from appointments WHERE id = $app");
                    
                }

                echo '<div class="header" class="d-flex justify-content-end">
                        <h3 class="d-flex justify-content-end">
                        <div class="btn-group">
                        <button type="button" class="btn btn-primary">Hello,' . $_SESSION["username"] .' </button>
                        <button type="button" class="btn btn-primary dropdown-toggle dropdown-toggle-split" data-bs-toggle="dropdown" aria-expanded="false">
                            <span class="visually-hidden">Toggle Dropdown</span>
                        </button>
                        <ul class="dropdown-menu">
                            <li><a class="dropdown-item" href="doctor_profile_edit.php">Profile</a></li>
                            <li><a class="dropdown-item" href="doctor_hub.php">My appointments</a></li>
                            <li><hr class="dropdown-divider"></li>
                            <li><a class="dropdown-item" href="nukeSession.php">Logout</a></li>
                        </ul>
                        </div>
                    </div>';
        
            
              mysqli_close($conn);
    
           ?> 
        </nav>
        <br>
        </header>
        <?php
        
        include 'connect.php';
        
        $id=$_SESSION["id"];
        $query = "SELECT p.FirstName, p.SureName, a.date, a.time, a.id FROM appointments a join profile p where doc_id= $id and patient_id=p.user_id";
        $result = mysqli_query($conn, $query);
        #check if user exists
        if (mysqli_num_rows($result) > 0) {
            
            while($row = $result->fetch_assoc()){ 
                #keep the appointment once 
                echo '<div class="card w-50">
                        <div class="card-body">
                            <h5 class="card-title">Appointment ' . $row['id'] . '</h5>
                            <h5>
                            ' . $row['FirstName'] . ' ' .   $row['SureName'] . '</br> 
                            ' . $row['date'] . '</br>
                            ' . $row['time'] . '
                            </h5>
                            <a href="doctor_appointment_edit.php?app='.$row['id'].'" class="btn btn-primary">Edit Appointment</a>
                            <a href="doctor_hub.php?app='.$row['id'].'" class="btn btn-primary">Delete Appointment</a>

                        </div>
                        </div>
                        <br>';
            }
              mysqli_close($conn);
        }else
        {
            echo'no appointments';
        }


    ?>
        
        


        </div>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    </body>
</html>