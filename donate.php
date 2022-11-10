<!DOCTYPE html>
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
                session_start();
                if (isset($_SESSION['logged'])) {

                    if ($_SESSION['logged'] == true) {
                        echo '
                                <li class="nav-item">
                                    <a class="nav-link text-bg-dark" href="logout.php">Log Out</a>
                                </li>
                            ';
                    } else {
                        echo '<li class="nav-item">
                        <a class="nav-link text-bg-dark" href="signin.php">SignIn</a>
                    </li>
                    
                        <a class="nav-link text-bg-dark" href="signup.php">Sign Up</a>
                    ';
                    }
                } else {
                    echo '<li class="nav-item">
                        <a class="nav-link text-bg-dark" href="signin.php">SignIn</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link text-bg-dark" href="signup.php">SignUp</a>
                    </li>';
                }
                ?>

            </ul>
        </div>
    </nav>

    <main>
        <div class="container-fluid body-container mt-5">
            <div class="row this-row justify-content-center">

                <h3 class="w-25 p-2 bg-danger bg-gradient rounded-5 m-4 text-center">Donate Blood</h3>
            </div>

            <!-- <div class="card text-center">
                <div class="card-header">
                    Featured
                </div>
                <div class="card-body">
                    <h5 class="card-title">Special title treatment</h5>
                    <p class="card-text">With supporting text below as a natural lead-in to additional content.</p>
                    <a href="#" class="btn btn-primary">Go somewhere</a>
                </div>
                <div class="card-footer text-muted">
                    2 days ago
                </div>
            </div> -->



            <?php

            if (isset($_SESSION['logged'])) {
                if ($_SESSION['logged'] == true) {
                    $sql = "SELECT * FROM `bootcamps`;";
                    $con = new mysqli("localhost", "root", "", "blood_donation");
                    if ($con->connect_errno) {
                        echo "Failed to connect to MySQL: " . $mysqli->connect_error;
                        exit();
                        header('Location: /blood-donation-project/index.php');
                    }

                    if ($result = mysqli_query($con, $sql)) {
                        $rows = mysqli_fetch_all($result);

                        foreach ($rows as $row) {
                            $camp_date = $row[3];
                            $add_id = $row[2];
                            $camp_name = $row[1];
                            $camp_id = $row[0];
                            $_SESSION['camp_name'] = $camp_name;
                            $_SESSION['camp_date'] = $camp_date;
                            $donor_id = $_SESSION['user_id'];
                            $address = "SELECT area, city, state from addresses where id = $camp_id;";

                            $result = mysqli_query($con, $address);
                            $result = mysqli_fetch_row($result);

                            $location = "Address: $result[0], $result[1], $result[2]";
                            $_SESSION['camp_address'] = $location;

                            $sql = "SELECT donor_id from `donations` where donor_id=$donor_id and bootcamp_id=$camp_id";
                            $result = mysqli_query($con, $sql);
                            $result = mysqli_fetch_row($result);



                            if ($result != "") {
                                $date = "SELECT camp_date from bootcamps where id = $camp_id";
                                $prevDate = mysqli_query($con, $date);
                                $prevDate = mysqli_fetch_array($prevDate);
                                $prevDate = $prevDate[0];

                                $date = 'SELECT DATE_ADD("' . $prevDate . '", INTERVAL 15 DAY);';
                                $newDate = mysqli_fetch_array(mysqli_query($con, $date))[0];

                                $currDate = mysqli_fetch_array(mysqli_query($con, "SELECT CURDATE()"))[0];

                                if($currDate < $newDate) {
                                    echo '
                                    <div class="card text-center m-5 ">
    
                                        <div class="card-body">
                                            <h5 class="card-title">', $camp_name, '</h5>
                                            <p class="card-text">', $location, '</p>
                                            <p class="card-text">', $camp_date, '</p>
                                            <form>
                                                <button type="submit" class="btn btn-success" disabled>Appointment Booked</a>
                                            </form>
                                        </div>
    
                                    </div>
                                    <div class="card text-center m-5 p-3">
                                        <h5 class="card-title">You have registered for donation before. You have a minimum span of 15 days before donating the blood again.
                                        Your previous donation to our camp and good cause is shown above.</h5>
                                    </div>
                                    ';
                                    return;
                                } else {
                                    continue;
                                }
                               
                            } else {
                                echo '<div class="card text-center m-5 ">

                                <div class="card-body">
                                    <h5 class="card-title">', $camp_name, '</h5>
                                    <p class="card-text">', $location, '</p>
                                    <p class="card-text">', $camp_date, '</p>
                                    <form action="appointment.php" method="post">
                                        <input value="', $camp_id, '" name="camp_id" hidden>

                                        <button class="btn btn-primary" >Book your apointment</a>
                                    </form>
                                </div>

                            </div>';
                            }
                        }
                    }
                    mysqli_close($con);
                } else {
                    echo "<div class='d-flex justify-content-center'>
                            <h1 class='center'>Please Create an Account and Sign In!</h1>
                        </div>";
                }
            } else {
                echo "<div class='d-flex justify-content-center'>
                        <h1 class='center'>Please Create an Account and Sign In!</h1>
                    </div>";
            }
            ?>




        </div>




    </main>

    <script src="js/bootstrap.min.js"></script>
</body>

</html>