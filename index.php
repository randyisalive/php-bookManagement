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
                    <thead>
                        <tr>
                            <th scope="col">Book Title</th>
                            <th scope="col">Category</th>
                            <th scope="col">Description</th>
                            <th scope="col">Total</th>
                        </tr>
                    </thead>
                    <tbody>

                        <?php
                        $sql = 'SELECT * FROM books';
                        $temp = $conn->prepare($sql);
                        $temp->execute();
                        $result = $temp->get_result();

                        if ($result->num_rows > 0) {
                            while ($row = $result->fetch_assoc()) {
                                echo
                                '<tr><td>';
                                echo $row['title'];
                                echo '</td><td>';
                                echo $row['category'];
                                echo '</td><td>';
                                echo $row['description'];
                                echo '</td><td>';
                                echo $row['total'];
                                echo '</td></tr>';
                            }
                        } else {
                            echo "Empty Book Shelf";
                        }

                        ?>


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