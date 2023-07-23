<?php
include '../services/db.php';

session_start();

$id = $_GET['id'];

$sql = "SELECT * FROM books WHERE id = '$id'";
$temp = $conn->prepare($sql);

if ($temp === false) {
    echo 'Error fetching book';
}

$temp->execute();
$result = $temp->get_result();

$row = $result->fetch_assoc();
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= $row['title'] ?> - Library System</title>
    <!-- Include Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body>
    <div class="container mt-5">
        <div class="row">
            <div class="col-md-4">
                <!-- Book Cover -->
                <img src="../bookData/<?= $row['cover_page']; ?>" class="img-fluid rounded" alt="Book Cover">
            </div>
            <div class="col-md-8">
                <!-- Book Details -->
                <h2><?php echo $row['title'] ?></h2>
                <p><strong>Category: </strong><?= $row['category'];

                                                ?></p>
                <p><strong>Description: </strong><?= $row['description']; ?></p>
                <p><strong>Quantity: </strong><?= $row['total']; ?></p>
                <!-- Add more book details as needed -->
            </div>
        </div>
    </div>


    <!-- Include Bootstrap JS (Optional, for certain Bootstrap features) -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>