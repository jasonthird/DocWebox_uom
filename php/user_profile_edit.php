<?php 
session_start();
if(!isset($_SESSION["username"])){
    header("Location: login.php");
    exit();
}
?>
<html>
    <head>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css"
        rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
        <link rel="stylesheet" href="../css/user_profile_edit.css">

    </head>
    <body>
    <header>
    <nav class="navbar navbar-light bg-light">
            <a class="navbar-brand" href="#">
                <img src="../img/logo.png" width="280" height="80" class="d-inline-block align-top" alt="">
            </a>
            <?php
            //   session_start();
              include 'connect.php';
    
    

                echo '<div class="header" class="d-flex justify-content-end">
                        <h3 class="d-flex justify-content-end">
                        <div class="btn-group">
                        <button type="button" class="btn btn-info">Hello,' . $_SESSION["username"] .' </button>
                        <button type="button" class="btn btn-info dropdown-toggle dropdown-toggle-split" data-bs-toggle="dropdown" aria-expanded="false">
                            <span class="visually-hidden">Toggle Dropdown</span>
                        </button>
                        <ul class="dropdown-menu">
                        <li><a class="dropdown-item" href="user_hub.php">Doctors</a></li>
                        <li><a class="dropdown-item" href="#">Profile</a></li>
                        <li><a class="dropdown-item" href="user_appointment.php">My appointments</a></li>
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
        $query = "SELECT * FROM users u, profile where u.id=$id and u.id=user_id ";
        $result = mysqli_query($conn, $query);
        #check if user exists
        if (mysqli_num_rows($result) > 0) {
            
            while($row = $result->fetch_assoc()){ 
                #keep the appointment once 
                echo '<div class="container-float">
                <div class="row">
                    <div class="col-sm-9 col-md-7 col-lg-5 mx-auto ">
                    <div class="card border-0 shadow rounded-3 m-5">
                        <div class="card-body text-center p-3 m-1 ">
                            <h3 class="card-title">Edit Profile</h3>
                            <form method = "POST" action = "">
                            <div class="form-floating m-3">
                                <input type="text" name="username" class="form-control" id="floatingInput">
                                <label for="floatingInput">' . $row['userName'] . '</label>
                            </div>
                            <div class="form-floating m-3">
                                <input type="email" name="email" class="form-control" id="floatingInput">
                                <label for="floatingInput">' . $row['email'] . '</label>
                            </div>
                            <div class="form-floating m-3">
                                <input type="text" name="PhoneNumber" class="form-control" id="floatingInput">
                                <label for="floatingInput">' . $row['PhoneNumber'] . '</label>
                            </div>
                            <div class="form-floating m-3">
                                <select name="Address" class="form-control">
                                <option selected>' . $row['Address'] . '</option>
                                    <option>Thessaloniki</option>
                                    <option>Athens</option>
                                    <option>Patra</option>
                                    <option>Ioannina</option>
                                    
                                </select>
                            </div>
                            <div class="d-grid gap-2 col-6 mx-auto">
                                <button class="btn btn-primary" name="submit" type="button">Save Changes</button>
                            </div>
                    </div>
                    </div>
            </div>';
            }
              mysqli_close($conn);
        }

        
		if(isset($_POST['submit'])) {
		$pname = $_POST['username'];
        $email = $_POST['email'];
        $phone = $_POST['PhoneNumber'];
		$address = $_POST['Address'];


	
		$result = mysqli_query($link, "UPDATE profile SET email=$email  PhoneNumber=$phone  Address=$address WHERE user_id = $id") or
				die("Query error: " . mysqli_error($link));
		echo "Row updated!";
        }
    ?>
 
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    </body>
</html>
