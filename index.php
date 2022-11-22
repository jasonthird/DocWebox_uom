<?php
    require 'DbConnection.php';
    $db = new DbConnection();
    $connection = $db->connect();
    $sql = "SELECT * FROM Users";
    $result = $connection->query($sql);
    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            echo "id: " . $row["id"] . " - Name: " . $row["userName"] . " --Type: " . $row["type"] . "<br>";
        }
    } else {
        echo "0 results";
    }

    //html form to search for a user
    echo "<form action='index.php' method='post'>
        <input type='text' name='search' placeholder='Search for a user'>
        <input type='submit' name='submit' value='Search'>
    </form>";
    //search for a user
    if (isset($_POST['submit'])) {
        $search = $_POST['search'];
        $sql = "SELECT * FROM Users WHERE userName LIKE '%$search%'";
        $result = $connection->query($sql);
        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                echo "id: " . $row["id"] . " - Name: " . $row["userName"] . " " . $row["type"] . "<br>";
            }
        } else {
            echo "0 results";
        }
    }

?>