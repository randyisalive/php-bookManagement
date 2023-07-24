<?php
include '../services/db.php';


$sql = "SELECT * FROM bookcategories";
$temp = $conn->prepare($sql);

// check if the query successfull
if ($temp === false) {
    die("Error executing query: " . $conn->error);
}

$temp->execute();

$result = $temp->get_result();



?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add New Category</title>
    <!-- Include Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body>
    <?php include '../nav.php'; ?>
    <div class="container mt-5">
        <div class="row justify-content-center">
            <div class="col-md-6">
                <div class="card">
                    <div class="card-header">
                        <h3 class="text-center">Categories</h3>
                    </div>
                    <div class="card-body">
                        <ul class="list-group">
                            <?php
                            if ($result->num_rows > 0) {
                                while ($row = $result->fetch_assoc()) {
                                    echo '<li class="list-group-item d-flex">';
                                    echo '<div class="content w-100 d-flex align-items-center">';
                                    echo $row['categories'];
                                    echo '</div>';
                                    echo '
                                    <button type="button" class="btn btn-danger me-2" data-bs-toggle="modal" data-bs-target="#deleteModal' . $row['id'] . '">
                                        Delete
                                    </button>';
                                    echo '
                                    <button type="button" class="btn btn-warning" data-bs-toggle="modal" data-bs-target="#editModal' . $row['id'] . '">
                                        Edit
                                    </button>';
                                    echo '</li>';


                                    // MODAL DELETE
                                    echo '<!-- Modal -->
                                    <div class="modal fade" id="deleteModal' . $row['id'] . '" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                        <div class="modal-dialog">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h1 class="modal-title fs-5" id="exampleModalLabel">Delete Categories</h1>
                                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                </div>
                                                <div class="modal-body">
                                                    Are you sure you want to delete this categories?
                                                </div>
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                                    <a type="button" class="btn btn-danger" href="../services/categories_delete.php?id=';
                                    echo $row['id'];
                                    echo '">Delete</a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    ';
                                    // MODAL EDIT
                                    echo '
                                    <!-- Modal -->
                                    <div class="modal fade" id="editModal' . $row['id'] . '" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                        <div class="modal-dialog">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h1 class="modal-title fs-5" id="exampleModalLabel">Edit Categories</h1>
                                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                </div>
                                                <div class="modal-body">';
                                    echo 'Change it to new categories';
                                    echo ' <form action="../services/categories_update.php?id=';
                                    echo $row['id'];
                                    echo '" method="POST" >
                                                <input type="text" name="categoryName" value="';
                                    echo $row['categories'];
                                    echo '" class="form-control mt-3">
                                            ';
                                    echo '
                                                    
                                
                                                </div>
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                                    <button type="submit" class="btn btn-warning">Edit</button>
                                                </div>
                                            </div>
                                        </div>
                                    </div></form>';
                                }
                            }
                            ?>
                        </ul>
                    </div>




                </div>
            </div>
        </div>
    </div>

    <div class="container mt-5">
        <div class="row justify-content-center">
            <div class="col-md-6">
                <div class="card">
                    <div class="card-header">
                        <h3 class="text-center">Add New Category</h3>
                    </div>
                    <div class="card-body">
                        <form action="../services/categories_services.php" method="post">
                            <div class="mb-3">
                                <label for="categoryName" class="form-label">Category Name</label>
                                <input type="text" class="form-control" id="categoryName" name="categoryName" required>
                            </div>
                            <div class="d-grid gap-2">
                                <button type="submit" class="btn btn-primary">Add Category</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>



    <!-- Modal -->
    <div class="modal fade" id="deleteModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="exampleModalLabel">Categoiries Settings</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    Are you sure you want to delete this categories?
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <a href="" type="button" class="btn btn-danger">Delete</a>
                </div>
            </div>
        </div>
    </div>
    <!-- Modal -->
    <div class="modal fade" id="editModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="exampleModalLabel">Edit Categories</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    Are you sure you want to edit this categories?

                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <a type="button" class="btn btn-warning">Edit</a>
                </div>
            </div>
        </div>
    </div>
    <!-- Include Bootstrap JS (Optional, for certain Bootstrap features) -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>