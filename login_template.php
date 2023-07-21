<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Document</title>
    <?php include 'css.php' ?>
    <style>
    .body {
        display: flex;
        justify-content: center;
        align-items: center;
        font-family: 'Roboto', sans-serif;
        height: 100vh;
    }

    .form-container {
        background-color: red;
        height: 500px;
        width: 500px;
    }

    .title-form {
        display: flex;
        justify-content: center;
        align-items: center;
    }

    .content-form {
        background-color: green;
        display: flex;
        justify-content: center;
        align-items: center;

    }

    form {
        display: flex;
        flex-direction: column;
        gap: 1rem;

    }
    </style>



</head>

<body>
    <div class="body">
        <div class="form-container">
            <div class="title-form">
                <h1>Login Page</h1>
            </div>
            <div class="content-form">
                <div class="content-form-container">
                    <form action="services/login_services.php" method="post">
                        <input type="text" name="username" placeholder="Username">
                        <input type="password" name="password" placeholder="Password">
                        <button type="submit">Log in</button>
                    </form>
                </div>

            </div>
        </div>

    </div>
</body>

</html>