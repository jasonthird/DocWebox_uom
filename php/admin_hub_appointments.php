
<html>
    <head>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css"
        rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
        <link rel="stylesheet" href="../css/admin_hub.css">

    </head>
    <body>
        <header>
            <nav class="navbar navbar-light bg-light">
                <a class="navbar-brand" href="#">
                    <img src="../img/logo.png" width="280" height="80" class="d-inline-block align-top" alt="">
                </a>
                <?php
                session_start();
                include 'connect.php';
        
        

                    echo '<div class="header" class="d-flex justify-content-end">
                            <h3 class="d-flex justify-content-end">
                            <div class="btn-group">
                            <button type="button" class="btn btn-info">Hello,' . $_SESSION["username"] .' </button>
                            <button type="button" class="btn btn-info dropdown-toggle dropdown-toggle-split" data-bs-toggle="dropdown" aria-expanded="false">
                                <span class="visually-hidden">Toggle Dropdown</span>
                            </button>
                            <ul class="dropdown-menu">
                                
                                <li><a class="dropdown-item" href="login.php">Logout</a></li>
                            </ul>
                            </div>
                        </div>';
    
                mysqli_close($conn);
            
                ?> 
            </nav>
            <br>
        </header>
        <nav class="nav nav-pills nav-justified">
            <a class="nav-link active" aria-current="page" href="#">Appointments</a>
            <a class="nav-link" href="admin_hub_doctors.php">Doctors</a>
        </nav>
        <br>
        <?php
        
            include 'connect.php';
            
            #query to check if user exists
            $query = "SELECT u.userName, a.date, a.time, a.id FROM appointments a join users u where doc_id= u.id or patient_id= u.id";
            $result = mysqli_query($conn, $query);
            #check if user exists
            if (mysqli_num_rows($result) > 0) {
                
                while($row = $result->fetch_assoc()){ 
                    #keep the appointment once 
                    echo '<div class="card w-50">
                            <div class="card-body">
                                <h5 class="card-title">Appointment' . $row['id'] . '</h5>
                                <h5>' . $row['userName'] . '</br>
                                ' . $row['userName'] . '</br> 
                                ' . $row['date'] . '</br>
                                ' . $row['time'] . '
                                </h5>
                                <a href="admin_appointment_edit.php" class="btn btn-primary">View Appointment</a>
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