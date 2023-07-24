<?php
include 'services/db.php';
session_start();
?>

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
                <div class="d-flex justify-content-center w-100">
                    <div class="d-flex align-items-center" style="width: 55vw;">
                        <h2 class="text-center">Book Listing</h2>

                    </div>
                    <form action="index.php" method="get" class="align-items-center d-flex gap-2" style="width: 13vw;">
                        <select name="category" id="category" class="form-control">
                            <option value="all">All Categories</option>
                            <?php
                            $sql = "SELECT * FROM bookcategories";
                            $temp = $conn->prepare($sql);
                            $temp->execute();
                            $result = $temp->get_result();

                            if ($result->num_rows > 0) {
                                while ($row = $result->fetch_assoc()) {
                                    echo '<option value="';
                                    echo $row['categories'];
                                    echo '">';
                                    echo $row['categories'];
                                    echo '</option>';
                                }
                            }
                            ?>

                            <!-- Add more options for other categories dynamically -->
                        </select>
                        <input type="submit" value="Filter" class="btn btn-primary">
                    </form>


                </div>
                <!-- Assuming you have a list of categories available in your database -->

                <table class="table table-striped text-center">
                    <?php
                    $user_id = $_SESSION['user_id'];



                    if (!isset($_GET['category'])) { // check if $filter is assing or not
                        $filter = "all";
                    } else {
                        $filter = $_GET['category'];
                    }
                    if ($user_id == 1) {
                        // 1 is mean Admin 
                        if ($filter == "all") {
                            $sql = "SELECT * FROM books";
                        } else {
                            $sql = "SELECT * FROM books WHERE category = '$filter'";
                        }
                    } else {
                        if ($filter == "all" || !isset($filter)) {
                            $sql = "SELECT * FROM books WHERE user_id = '$user_id'";
                        } else {
                            $sql = "SELECT * FROM books WHERE category = '$filter' AND user_id='$user_id'";
                        }
                    }

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
                        <div class="d-flex vh-100 justify-content-center align-items-center">
                            <h1>NO DATA</h1>


                        </div>
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
                                echo $row['category'];
                                echo '</td>';
                                echo '<td>';
                                echo '<a href="./templates/book_detail.php?id=';
                                echo $row['id'];
                                echo '" class="btn btn-primary me-2">Detail</a>';
                                echo '<a href="./templates/book_edit.php?id=';
                                echo $row['id'];
                                echo '" class="btn btn-warning">Edit</a>';
                                $x++;
                            }
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