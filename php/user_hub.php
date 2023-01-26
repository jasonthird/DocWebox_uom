<!DOCTYPE html>
<?php 
session_start();
if(!isset($_SESSION["username"])){
    header("Location: login.php");
    exit();
}
if($_SESSION["type"] != 'patient'){
    header("Location: login.php");
    exit();
}
?>
<html>
    <head>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.1/jquery.min.js"></script>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css"
        rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
        <link rel="stylesheet" href="../css/user_hub.css">
    </head>
    <body>
      <nav class="navbar navbar-fixed-top">
          <a class="navbar-brand" href="#">
              <img src="../img/logo.png" width="280" height="80" class="d-inline-block align-top" alt="">
          </a>
      
        <?php
          // session_start();
          include 'connect.php';
            echo '<div class="header d-flex justify-content-end">
                    <h3 class="d-flex justify-content-end">
                    <div class="btn-group">
                    <button type="button" class="btn btn-info">Hello,' . $_SESSION["username"] .' </button>
                    <button type="button" class="btn btn-info dropdown-toggle dropdown-toggle-split" data-bs-toggle="dropdown" aria-expanded="false">
                        <span class="visually-hidden">Toggle Dropdown</span>
                    </button>
                    <ul class="dropdown-menu">
                        <li><a class="dropdown-item" href="#">Doctors</a></li>
                        <li><a class="dropdown-item" href="user_profile_edit.php">Profile</a></li>
                        <li><a class="dropdown-item" href="user_appointment.php">My appointments</a></li>
                        <li><hr class="dropdown-divider"></li>
                        <li><a class="dropdown-item" href="nukeSession.php">Logout</a></li>
                    </ul>
                    </div>
                </div>';            
        ?> 
      </nav>
      <input type="text" name="searchbox" id="searchbox" class="filterinput form-control" placeholder="search here">
      <br>
      <?php
          $query = "SELECT * from users u, profile p where type='doctor' and user_id = u.id";
          $result = mysqli_query($conn, $query);
          if (mysqli_num_rows($result) > 0) {
              echo '<div class="d-flex flex-wrap">';
              while($row = $result->fetch_assoc()){ 
                  echo '<div class="col-sm-3 doctors">
                          <div class="blog-item m-1">
                            <div class="card">
                            <img src="../img/profile2.jpg" class=" doctor-profile-pic card-img-top">
                            <div class="card-body">
                              <h4 class="card-title">' . $row['FirstName'] . $row['SureName']  .'</h4>
                              <p class="card-text"><h6>' . $row['Specialization']  . '</h6><h6>'  .$row['Address'] .' </h6></p>
                              <a href="doctor_profile_view.php?id=' . $row['user_id'] . '" class="btn btn-primary">View Profile</a>
                            </div>
                            </div>
                          </div>
                        </div>';
              }
              echo '</div>';
              mysqli_close($conn);
            }
      ?>

      <script>
        //live search
        $(document).ready(function() {
            $("#searchbox").on("keyup", function() {
                var value = $(this).val().toLowerCase();
                $(".doctors").filter(function() {
                    $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
                });
            });
        });
</script>

      <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
      integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    </body>
</html>