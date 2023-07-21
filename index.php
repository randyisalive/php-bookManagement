<?php
session_start();
if (!isset($_SESSION['user_id'])) {
    header('Location: login_template.php');
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Book Application - detikProject</title>
    <link rel="stylesheet" href="/static/styles.css">
</head>

<body>
    <h1>Hello World</h1>
    <?php echo $_SESSION['username']; ?>

</body>

</html>