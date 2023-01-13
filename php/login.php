
<html>
    <head>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css"
        rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
        <link rel="stylesheet" href="../css/login.css">

    </head>
    <body>
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
                                <button class="btn btn-primary" type="submit" name="submit">Submit</button>
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
                                        session_start();
                                        $_SESSION['username'] = $username;
                                        #get type from result
                                        $row = mysqli_fetch_assoc($result);
                                        $type = $row['type'];

                                        #set session type
                                        $_SESSION['type'] = $type;

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
                                        echo "User does not exist";
                                        echo mysqli_error($conn);
                                    }
                                }
                            ?>
                </div>
                </div>
        </div>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    </body>
</html>
