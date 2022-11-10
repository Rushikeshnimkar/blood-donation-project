<!DOCTYPE html>
<?php
// Start the session
session_start();
$_SESSION['id'] = "test";

?>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Blood Donation Project</title>
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="css/style.css" rel="stylesheet">

</head>

<body>

    <nav class="navbar fixed-top navbar-expand-lg bg-dark ">
        <div class="container-fluid">
            <div class="container">
                <a class="navbar-brand text-bg-dark" href="index.php">Blood Donations</a>
            </div>

            <ul class="nav justify-content-right d-flex flex-nowrap">
                <li class="nav-item">
                    <a class="nav-link text-bg-dark active" aria-current="page" href="index.php">Home</a>
                </li>

                <li class="nav-item">
                    <a class="nav-link text-bg-dark active" aria-current="page" href="donate.php">Donate</a>
                </li>


                <?php

                if (isset($_SESSION['logged'])) {
                    if ($_SESSION['logged'] == true) {
                        echo '
                                <li class="nav-item">
                                    <a class="nav-link text-bg-dark" aria-current="page" href="logout.php">Log Out</a>
                                </li>
                            ';
                    } else {
                        echo '<li class="nav-item">
                        <a class="nav-link text-bg-dark" aria-current="page" href="signin.php">SignIn</a>
                    </li>
                    
                        <a class="nav-link text-bg-dark" aria-current="page" href="signup.php">Sign Up</a>
                    ';
                    }
                } else {
                    echo '<li class="nav-item">
                        <a class="nav-link text-bg-dark" aria-current="page" href="signin.php">SignIn</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link text-bg-dark" aria-current="page" href="signup.php">SignUp</a>
                    </li>';
                }
                ?>

            </ul>
        </div>
    </nav>

    <main class="container-fluid no-scroll mt-5 body-container" style="height: 35rem;">
        <div class="container-fluid">
            <div class="row this-row justify-content-center">

                <h3 class="w-25 p-2 bg-danger bg-gradient rounded-5 m-4 text-center">Sign In</h3>
            </div>

        </div>

        <div class="container-fluid">
            <div class="row justify-content-center">
                <form action="submit.php" method="get" class="row g-3">
                    <div class="col-md-6">
                        <label for="inputEmail4" class="form-label">Email</label>
                        <input type="email" name="email" class="form-control" id="inputEmail4">
                    </div>
                    <div class="col-md-6">
                        <label for="inputPassword4" class="form-label">Password</label>
                        <input type="password" name="password" class="form-control" id="inputPassword4">
                    </div>
                    <div class="col-12 my-4 justify-content-center text-center">
                        <button type="submit" class="btn btn-primary">Sign In</button>
                    </div>
                </form>
            </div>
        </div>

    </main>

    <script src="js/bootstrap.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.js">
    </script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js">
    </script>

    <script>
        
    </script>
</body>

</html>