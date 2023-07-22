<nav class="navbar navbar-expand-lg navbar-light bg-light">
    <div class="container">
        <a class="navbar-brand" href="<?php
                                        $indexPage = '/php-bookmanagement/index.php';
                                        echo $indexPage ?>">Library System</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav ms-auto">
                <li class="nav-item">
                    <?php
                    // check wheather the user is on the index page, 

                    $categoriesPage = '/php-bookManagement/templates/categories_template.php';
                    if ($_SERVER['PHP_SELF'] == $indexPage) : ?>
                        <a class="nav-link active" href="index.php">Home</a>
                    <?php else : ?>
                        <!-- If the user on other page, pagination -->
                        <a class="nav-link active" href="../index.php">Home</a>
                    <?php endif; ?>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="/php-bookManagement/templates/book_form.php">Add Books</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="/php-bookManagement/templates/categories_template.php">Categories</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="/php-bookManagement/services/delete_session.php">Log out</a>
                </li>
            </ul>
        </div>
    </div>
</nav>