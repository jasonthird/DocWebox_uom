<?php
    session_start();
    #check if session exists
    if (isset($_SESSION['username'])) {
        switch ($_SESSION['type']) {
            case 'doctor':
                header("Location: doctor_hub.php");
                break;
            case 'patient':
                header("Location: user_hub.php");
                break;
            case 'admin':
                header("Location: admin_hub_appointments.php");
                break;
        }
    }
    ?>
<html>
    <head>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css"
        rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
        <link rel="stylesheet" href="../css/login.css">

    </head>

    <body class="d-flex flex-column min-vh-100">
        <div class="container-float">
            <div class="row">
                <div class="col-sm-9 col-md-7 col-lg-5 mx-auto">
                    <div id="login" class="card border-0 shadow m-3">
                        <div class="card-body text-center p-3 m-1">
                            <img src="../img/logo.png" class="img-fluid">
                            <h3 class="card-title">Login</h3>
                            <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
                                <div class="form-floating m-3">
                                    <input type="text" name="username" class="textfield form-control" id="floatingInput">
                                    <label for="floatingInput">Username</label>
                                </div>
                                <div class="form-floating m-3">
                                    <input type="password" name="password" class="textfield form-control" id="floatingPassword">
                                    <label for="floatingPassword">Password</label>
                                </div>
                                <div class="d-grid gap-2 col-6 mx-auto">
                                    <button class="btn btn-primary" type="submit" name="submit" data-toggle="modal" data-target="#exampleModalLong">Submit</button>
                                </div>
                            </form>
                            
                            <?php
                                    #check method is post
                                    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
                                        include 'connect.php';
                                        #get username and password
                                        $username = $_POST['username'];
                                        $password = $_POST['password'];
                                        
                                        #query to check if user exists
                                        $query = "SELECT * FROM users WHERE userName = '$username' AND password = '$password'";
                                        $result = mysqli_query($conn, $query);
                                        #check if user exists
                                        if (mysqli_num_rows($result) > 0) {
                                            #create session
                                            // session_start();
                                            unset($_SESSION["username"]);
                                            unset($_SESSION["id"]);

                                            $_SESSION["username"] = $username;
                                            #get type from result
                                            $row = mysqli_fetch_assoc($result);
                                            $type = $row["type"];
                                            $id = $row["id"];
                                            
                                            #set session type
                                            $_SESSION['type'] = $type;
                                            $_SESSION["id"] = $id;
                                            
                                            #redirect to correct page
                                            echo $type;
                                            if ($type == 'admin') {
                                                header("Location: admin_hub_appointments.php");
                                            } elseif ($type == 'patient') {
                                                header("Location: user_hub.php");
                                            } elseif ($type == 'doctor'){
                                                header("Location: doctor_hub.php");
                                            }

                                        } else {
                                            #user does not exist
                                            echo "<script>alert('User does not exist!')</script>";
                                            echo mysqli_error($conn);
                                        }
                                    }
                                ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <footer class="mt-auto bg-light text-center text-lg-start">
            <!-- Copyright -->
                 <div class="text-center p-3" style="background-color: rgba(0, 0, 0, 0.2);">
                    © 2023 Copyright:
                    <a class="text-dark" href="https://uom.gr/" target="_blank">UOM Project</a>
                </div>
            <!-- Copyright -->
        </footer> 
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    </body>
</html>
