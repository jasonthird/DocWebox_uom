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
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css"
        rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
        <link rel="stylesheet" href="../css/admin_hub.css">

    </head>
    <body>
    <?php
        
        include 'connect.php';
        // delete appointments
        if(isset($_GET['id']))
        {
            $app=$_GET['id'];
            
        }
        $query = "SELECT p1.FirstName as n1, p1.SureName as s1, p2.FirstName as n2, p2.SureName as s2,time, date, a.id FROM (appointments a join profile p2 on p2.user_id=patient_id) join profile p1 on p1.user_id=doc_id where a.id=$app";
        $result = mysqli_query($conn, $query);

        if (mysqli_num_rows($result) > 0) {
            while($row = $result->fetch_assoc()){ 
                #keep the appointment once 
                echo '<div class="col-sm-3 doctors mx-auto">
                        <div class="blog-item m-1">
                            <div class="card">
                                <div class="card-body">
                                <h3 class="card-title">Edit Appointment</h3>
                                <h5 class="card-text">Doctor: ' . $row['n1'] . " " . $row['s1'] . '</h5>
                                <h5 class="card-text">Patient: ' . $row['n2'] . " " . $row['s2'] . '</h5>
                                <form method="POST" action="">
                                    <div class="form-floating m-3">
                                        <input type="date" name="date" value="' . $row['date'] . '" class="form-control" id="floatingInput">
                                        <label for="floatingInput">' . $row['date'] . '</label>
                                    </div>
                                    <div class="form-floating m-3">
                                        <input type="time" name="time" value="' . $row['time'] . '" class="form-control" id="floatingInput">
                                        <label for="floatingInput">' . $row['time'] . '</label>
                                    </div>
                                    <div class="d-grid gap-2 col-6 mx-auto">
                                        <button class="btn btn-primary" name="save" type="submit">Save Changes</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>';
            }
            
        }
        if (isset($_POST['save'])) {
            $id = $_GET['id'];
            $date = $_POST['date'];
            $time = $_POST['time'];
            #check if time and date is available
            $query = "SELECT * from appointments where id=$id and date='$date' and time='$time'";
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
                $query = "UPDATE appointments SET date='$date', time='$time' WHERE id=$id";
                $result = mysqli_query($conn, $query);
                echo '<script>alert("Profile appointment changed successfully")</script>';
                #wait for the alert to close
                header("Refresh:0; url=user_appointment.php");
            }
        mysqli_close($conn); 
        }
    ?>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    </body>
</html>
