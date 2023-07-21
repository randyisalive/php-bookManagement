<?php
include '../services/db.php';


$username = $_POST['username'];
$password = $_POST['password'];



// logic in case user already register
$sql = "SELECT * FROM users";
$temp = $conn->prepare($sql);
$temp->execute();
$result = $temp->get_result();




if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        if ($username == $row['username']) {
            echo "User already exist !!";
        } else {
            // if none user exist, insert the data
            // sql inserting data into the database
            $sql2 = "INSERT INTO users (username, password) VALUES ('$username','$password')";
            $temp2 = $conn->prepare($sql2);
            if ($temp2->execute()) {
                $conn->commit();
                header("Location: ../templates/login_template.php");
                $conn->close();
            } else {
                echo "Error: " . $conn->error;
            }
        }
    }
}
