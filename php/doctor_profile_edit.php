<?php 
session_start();
if(!isset($_SESSION["username"])){
    header("Location: login.php");
    exit();
}
if($_SESSION["type"] != 'doctor'){
    header("Location: login.php");
    exit();
}
?>
<html>
    <head>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css"
        rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
        <link rel="stylesheet" href="../css/doctor_profile_edit.css">

    </head>
    <body>
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
                 <a href="doctor_hub.php">My Appointments</a>
              </li>  
              <li class="nav-item active">
                <a href="doctor_profile_edit.php">Profile</a>
              </li>  
              <li class="nav-item active">
                <a href="nukeSession.php">Logout</a>
              </li>
              </ul>
            </div>
          </div>
        </nav>';
    
           ?> 
            
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
                            <form method="post" action="">
                            <div class="form-floating m-3">
                                <input type="text" name="firstname" class="form-control" id="floatingInput">
                                <label for="floatingInput">' . $row['FirstName'] . '</label>
                            </div>
                            <div class="form-floating m-3">
                                <input type="text" name="surename" class="form-control" id="floatingInput">
                                <label for="floatingInput">' . $row['SureName'] . '</label>
                            </div>
                            <div class="form-floating m-3">
                                <input type="email" name="email" class="form-control" id="floatingInput">
                                <label for="floatingInput">' . $row['email'] . '</label>
                            </div>
                            <div class="form-floating m-3">
                                <input type="text" name="phone" class="form-control" id="floatingInput">
                                <label for="floatingInput">' . $row['PhoneNumber'] . '</label>
                            </div>
                            <div class="form-floating m-3">
                                <input type="text" name="spesialization" class="form-control" id="floatingInput">
                                <label for="floatingInput">' . $row['Specialization'] . '</label>
                            </div>
                            <div class="form-floating m-3">
                                <select name="address" class="form-control" >
                                    <option selected>' . $row['Address'] . '</option>
                                    <option>Thessaloniki</option>
                                    <option>Athens</option>
                                    <option>Patra</option>
                                    <option>Ioannina</option>
                                </select>
                            </div>
                            <div class="form-floating m-3">
                                <input type="textarea" name="bio" class="form-control" id="floatingInput">
                                <label for="floatingInput">' . $row['bio'] .'</label>
                            </div>
                            <div class="d-grid gap-2 col-6 mx-auto">
                                <button class="btn btn-primary" name="save" type="submit">Save Changes</button>
                            </div>
                    </div>
                    </div>
            </div>';
            }
            $query = "SELECT * FROM profile where user_id=$id";
            $result = mysqli_query($conn, $query);
            $row = $result->fetch_assoc();
            if (isset($_POST['save'])){
                $id = $_SESSION["id"];
                if (isset($_POST['firstname'])&& $_POST['firstname'] != ""){
                    $firstName = $_POST['firstname'];
                }else{
                    $firstName = $row['FirstName'];
                }
                if (isset($_POST['surename'])&& $_POST['surename'] != ""){
                    $lastName = $_POST['surename'];
                }else{
                    $lastName = $row['SureName'];
                }
                if (isset($_POST['email'])&& $_POST['email'] != ""){
                    $email = $_POST['email'];
                }else{
                    $email = $row['email'];
                }
                if (isset($_POST['phone'])&& $_POST['phone'] != ""){
                    $phone = $_POST['phone'];
                }else{
                    $phone = $row['PhoneNumber'];
                }
                if (isset($_POST['address'])&& $_POST['address'] != ""){
                    $address = $_POST['address'];
                }else{
                    $address = $row['Address'];
                }
                if (isset($_POST['spesialization'])&& $_POST['spesialization'] != ""){
                    $specialization = $_POST['spesialization'];
                }else{
                    $specialization = $row['Specialization'];
                }
                if (isset($_POST['bio'])&& $_POST['bio'] != ""){
                    $bio = $_POST['bio'];
                }else{
                    $bio = $row['bio'];
                }
                $updateQuery = "UPDATE profile SET bio='$bio', FirstName='$firstName', SureName='$lastName', email='$email', PhoneNumber='$phone', Address='$address', Specialization='$specialization' WHERE user_id=$id";
                $result2 = mysqli_query($conn, $updateQuery);
                if($result2){
                    echo '<script>alert("Profile updated successfully")</script>';

                    echo '<script>window.location.href = "doctor_profile_edit.php";</script>';
                }else{
                    echo '<script>alert("Profile not updated")</script>';
                }
            }
              mysqli_close($conn);
        }
    ?>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    </body>
</html>