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
    $userExists = false;

    // Check if the user already exists in the database
    while ($row = $result->fetch_assoc()) {
        if ($username === $row['username']) {
            $userExists = true;
            break; // Break out of the loop once we find a matching username
        }
    }

    if ($userExists) {
        echo "User already exists!!";
    } else {
        // If the user does not exist, insert the data
        // SQL inserting data into the database
        $sql2 = "INSERT INTO users (username, password) VALUES ('$username','$password')";
        $temp2 = $conn->prepare($sql2);

        if ($temp2->execute()) {
            $conn->commit();
            header("Location: ../templates/login_template.php");
            exit(); // Terminate the script to prevent further execution
        } else {
            echo "Error: " . $conn->error;
        }
    }
}

$conn->close();
