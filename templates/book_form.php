<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Book Form</title>
    <!-- Include Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body>
    <?php include '../nav.php'; ?>
    <div class="container mt-5">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">
                        <h3 class="text-center">Book Form</h3>
                    </div>
                    <div class="card-body">
                        <form action="../services/book_services.php" method="post" enctype="multipart/form-data">
                            <div class="mb-3">
                                <label for="title" class="form-label">Book Title</label>
                                <input type="text" class="form-control" id="title" name="title" required>
                            </div>
                            <div class="mb-3">
                                <label for="category" class="form-label">Book Category</label>
                                <select class="form-select" id="category" name="category" required>
                                    <option value="">Select a category</option>
                                    <option value="fiction">Fiction</option>
                                    <option value="non-fiction">Non-Fiction</option>
                                    <option value="fantasy">Fantasy</option>
                                    <!-- Add more options as needed -->
                                </select>
                            </div>
                            <div class="mb-3">
                                <label for="description" class="form-label">Description</label>
                                <textarea class="form-control" id="description" name="description" rows="4" required></textarea>
                            </div>
                            <div class="mb-3">
                                <label for="quantity" class="form-label">Quantity</label>
                                <input type="number" class="form-control" id="quantity" name="quantity" required>
                            </div>
                            <div class="mb-3">
                                <label for="bookFile" class="form-label">Upload Book File (PDF)</label>
                                <input type="file" class="form-control" id="bookFile" name="bookFile" accept=".pdf" required>
                            </div>
                            <div class="mb-3">
                                <label for="bookCover" class="form-label">Upload Book Cover (jpeg/jpg/png)</label>
                                <input type="file" class="form-control" id="bookCover" name="bookCover" accept="image/jpeg, image/jpg, image/png" required>
                            </div>
                            <div class="d-grid">
                                <button type="submit" class="btn btn-primary">Submit</button>
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