<nav class="navbar navbar-expand-lg navbar-light bg-light">
    <div class="container">
        <a class="navbar-brand" href="#">Library System</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
            aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav ms-auto">
                <li class="nav-item">
                    <?php
                    // check wheather the user is on the index page, 
                    $indexPage = '/php-bookmanagement/index.php';
                    if ($_SERVER['PHP_SELF'] == $indexPage) : ?>
                    <a class="nav-link active" href="index.php">Home</a>
                    <?php else : ?>
                    <!-- If the user on other page, pagination -->
                    <a class="nav-link active" href="../index.php">Home</a>
                    <?php endif; ?>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="templates/book_form.php">Add Books</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">Categories</a>
                </li>
                <?php
                session_start();
                if (isset($_SESSION['username'])) : ?>
                <!-- If user is logged in, show the username in the navbar -->
                <li class="nav-item">
                    <span class="navbar-text">Welcome, <?php echo $_SESSION['username']; ?></span>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="services/delete_session.php">Logout</a>
                </li>
                <?php else : ?>
                <!-- If user is not logged in, show the login link -->
                <li class="nav-item">
                    <a class="nav-link" href="#">Login</a>
                </li>
                <?php endif; ?>
            </ul>
        </div>
    </div>
</nav>