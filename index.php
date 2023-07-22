<?php
include 'services/db.php'; ?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Book Listing</title>
    <!-- Include Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body>
    <?php include 'nav.php'; ?>
    <div class="container mt-5">
        <div class="row">
            <div class="col">
                <h2 class="text-center mb-4">Book Listing</h2>
                <table class="table table-striped">
                    <?php
                    $sql = 'SELECT id,title,category FROM books';
                    $temp = $conn->prepare($sql);
                    $temp->execute();
                    $result = $temp->get_result();
                    if ($result->num_rows > 0) : ?>
                    <thead>

                        <tr>
                            <th>#</th>
                            <th scope="col">Book Title</th>
                            <th scope="col">Category</th>
                            <th>Option</th>
                        </tr>
                    </thead>
                    <?php else : ?>
                    <h1>NO DATA</h1>
                    <?php endif; ?>
                    <tbody>


                        <?php
                        $x = 1; // number of table
                        if ($result->num_rows > 0) {
                            while ($row = $result->fetch_assoc()) {
                                echo '<a href="">';
                                echo '<tr><td>';
                                echo $x;
                                echo '</td>';
                                echo '<td>';
                                echo $row['title'];
                                echo '</td><td>';
                                if ($row['category'] == 1) {
                                    echo "Fiction";
                                    echo '</td>';
                                } else if ($row['category'] == 2) {
                                    echo "Non-Fiction";
                                    echo '</td>';
                                } else if ($row['category'] == 3) {
                                    echo "Fantasy";
                                    echo '</td>';
                                } else {
                                    echo "NO CATEGORY";
                                }
                                echo '<td>';
                                echo '<a href="./templates/book_detail.php?id=';
                                echo $row['id'];
                                echo '" class="btn btn-primary me-2">Detail</a>';
                                echo '<a href="./templates/book_edit.php?id=';
                                echo $row['id'];
                                echo '" class="btn btn-warning">Edit</a>';
                                $x++;
                            }
                        } else {
                            echo "Empty Book Shelf";
                        }

                        ?>
                        <a href=""></a>







                        <!-- Sample book data (replace with dynamic data from back-end) -->


                        <!-- Add more book data here -->
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    <!-- Include Bootstrap JS (Optional, for certain Bootstrap features) -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>