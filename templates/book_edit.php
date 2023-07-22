<?php

include '../services/db.php';
$book_id = $_GET['id'];

$sql = "SELECT * FROM books WHERE id = '$book_id'";



$temp = $conn->prepare($sql);
$temp->execute();

$result = $temp->get_result();

$row = $result->fetch_assoc();








?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Book Data</title>
    <!-- Include Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body>
    <?php
    include '../nav.php';
    ?>
    <div class="container mt-5">
        <div class="row justify-content-center">
            <div class="col-md-6">
                <div class="card">
                    <div class="card-header">
                        <h3 class="text-center">Edit Book Data</h3>
                    </div>
                    <div class="card-body">
                        <form action="../services/editBook_services.php?id=<?= $row['id']; ?>" method="post" enctype="multipart/form-data">
                            <div class="mb-3">
                                <label for="bookTitle" class="form-label">Book Title</label>
                                <input type="text" class="form-control" id="bookTitle" name="bookTitle" value="<?= $row['title'] ?>">
                            </div>
                            <div class="mb-3">
                                <label for="bookCategory" class="form-label">Book Category</label>
                                <select class="form-select" id="bookCategory" name="bookCategory">
                                    <?php
                                    $sql2 = "SELECT * FROM bookcategories";
                                    $temp2 = $conn->prepare($sql2);
                                    $temp2->execute();
                                    $result = $temp2->get_result();
                                    if ($result->num_rows > 0) {
                                        while ($row2 = $result->fetch_assoc()) {
                                            echo '<option value="Fiction">';
                                            echo  $row2['categories'];
                                            echo '</option>';
                                        }
                                    } ?>
                                </select>
                            </div>
                            <div class="mb-3">
                                <label for="bookDescription" class="form-label">Description</label>
                                <textarea class="form-control" id="bookDescription" name="bookDescription" rows="4"><?= $row['description'] ?></textarea>
                            </div>
                            <div class="mb-3">
                                <label for="bookQuantity" class="form-label">Quantity</label>
                                <input type="number" class="form-control" id="bookQuantity" name="bookQuantity" value="<?= $row['total'] ?>">
                            </div>
                            <div class="mb-3">
                                <label for="bookQuantity" class="form-label">Cover Book</label>
                                <input type="file" class="form-control" id="bookCover" name="bookCover" value="<?= $row['total'] ?>">
                            </div>
                            <!-- Add more input fields for other book details if necessary -->
                            <div class="d-grid gap-2">
                                <button type="submit" class="btn btn-primary">Save Changes</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Include Bootstrap JS (Optional, for certain Bootstrap features) -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>