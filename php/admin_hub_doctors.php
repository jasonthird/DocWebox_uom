
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
            <a class="nav-link" href="admin_hub_appointments.php">Appointments</a>
            <a class="nav-link active" aria-current="page" href="#">Doctors</a>
        </nav>
        <br>
        <?php
        
            include 'connect.php';
            
            #query to check if user exists
            $query = "SELECT * from users u, profile p where type='doctor' and user_id = u.id";
            $result = mysqli_query($conn, $query);
            #check if user exists
            if (mysqli_num_rows($result) > 0) {
                
                echo '<div class="row">';
                $counter=0;
                while($row = $result->fetch_assoc()){ 
                    $counter++;
                    if($counter<5){
                    echo '<div class="col-sm-3">
                            <div class="blog-item">
                              <div class="card">
                              <img src="../img/profile2.jpg" class="card-img-top">
                              <div class="card-body">
                                <h5 class="card-title">' . $row['FirstName'] . $row['SureName']  .'</h5>
                                <p class="card-text"><h6>' . $row['Specialization']  . '</h6><h6>'  .$row['Address'] .' </h6></p>
                                <a href="doctor_profile_view.php?id=' . $row['user_id'] . '" class="btn btn-primary">View Profile</a>
                              </div>
                              </div>
                            </div>
                          </div>';
                    }else if($counter=5)
                    {
                        echo '</div><br><div class="row"><div class="col-sm-3">
                        <div class="blog-item">
                          <div class="card">
                          <img src="../img/profile2.jpg" class="card-img-top">
                          <div class="card-body">
                            <h5 class="card-title">' . $row['FirstName'] . $row['SureName']  .'</h5>
                            <p class="card-text"><h6>' . $row['Specialization']  . '</h6><h6>'  .$row['Address'] .' </h6></p>
                            <a href="doctor_profile_view.php?id=' . $row['user_id'] . '" class="btn btn-primary">View Profile</a>
                          </div>
                          </div>
                        </div>
                      </div>';
                        $counter=0;
                    }
                }
                  mysqli_close($conn);
            }
    
        ?>

        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    </body>
</html>