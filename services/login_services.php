<?php
include 'db.php';


?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Log in - Book Management System</title>
</head>

<body>
    <?php

    //POST data
    $username_post = $_POST['username'];
    $password_post = $_POST['password'];

    // get all user
    $sql = "SELECT * FROM users";
    $stmt = $conn->prepare($sql);


    // check if the query successfull
    if ($stmt === false) {
        die("Error executing query: " . $conn->error);
    }

    $stmt->execute();

    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            if ($username_post == $row['username'] && $password_post == $row['password']) {
                session_start();
                $_SESSION['user_id'] = $row['id'];
                $_SESSION['username'] = $row['username'];
                $_SESSION['password'] = $row['password'];
                header("Location: ../index.php");
            } else {
                echo "Log in Error!!! " . $username_post . $password_post;
            }
        }
    }
    ?>



</body>

</html>