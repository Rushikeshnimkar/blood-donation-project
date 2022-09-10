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

    <?php
        $con = new mysqli("localhost", "root", "", "blood_donation");
        if ($con->connect_errno) {
            echo "Failed to connect to MySQL: " . $mysqli->connect_error;
            exit();
        }

        if ($result = mysqli_query($con, "SELECT * FROM addresses")) {
            $rows = mysqli_fetch_all($result);
            $states = array();
            $cities = array();
            $areas = array();
            foreach ($rows as $row) {
                array_push($states, $row[3]);
                array_push($cities, $row[2]);
                array_push($areas, $row[1]);
            }
            
        }

        mysqli_close($con);
    ?>



    <nav class="navbar navbar-expand-lg bg-dark ">
        <div class="container-fluid">
            <div class="container">
                <a class="navbar-brand text-bg-dark" href="index.php">Blood Donations</a>
            </div>

            <ul class="nav justify-content-end d-flex flex-nowrap">
                <li class="nav-item">
                    <a class="nav-link text-bg-dark active" aria-current="page" href="donate.php">Donate</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link text-bg-dark" href="request.php">Request</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link text-bg-dark" href="signin.php">SignIn</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link text-bg-dark" href="signup.php">SignUp</a>
                </li>

            </ul>
        </div>
    </nav>

    <main>
        <div class="container body-container">
            <div class="row this-row justify-content-center">
                <h3 class="w-25 p-2 bg-danger bg-gradient rounded-5 m-4 text-center">Sign Up</h3>
            </div>


        </div>

        <div class="container body-container">
            <div class="row justify-content-center">
                <form action="submit.php" method="post" class="row g-3 m-4">
                    <div class="col-md-4">
                        <label for="inputName4" class="form-label">Name</label>
                        <input type="text" name="name" class="form-control" id="inputName4">
                    </div>
                    <div class="col-md-4">
                        <label for="inputEmail4" class="form-label">Email</label>
                        <input type="email" name="email" class="form-control" id="inputEmail4">
                    </div>
                    <div class="col-md-4">
                        <label for="inputPhone4" class="form-label">Phone</label>
                        <input type="tel" name="phone" class="form-control" id="inputPhone4" placeholder="12345-67890" pattern="[0-9]{5}-[0-9]{5}">
                    </div>
                    <div class="col-md-6">
                        <label for="inputUsername4" class="form-label">Username</label>
                        <input type="username" name="username" class="form-control" id="inputUsername4">
                    </div>
                    <div class="col-md-6">
                        <label for="inputPassword4" class="form-label">Password</label>
                        <input type="password" name="password" class="form-control" id="inputPassword4">
                    </div>

                    <div class="col-md-4">
                        <label for="inputState" class="form-label">State</label>
                        <select id="inputState" name="state" class="form-select state-value">
                            <option value='NULL' selected disabled>Choose...</option>
                            <option value="Maharashtra">Maharashtra</option>
                            <option value="Gujarat">Gujarat</option>
                            <option value="Rajasthan">Rajasthan</option>
                            <option value="Delhi">Delhi</option>
                            <option value="Punjab">Punjab</option>
                        </select>
                    </div>

                    <div class="col-md-4">
                        <label for="inputState" class="form-label">City</label>
                        <select id="inputCity" name="city" class="form-select city-value">
                            <option value='NULL' selected disabled>Choose...</option>

                        </select>
                    </div>
                    <div class="col-md-4">
                        <label for="inputState" class="form-label">Area</label>
                        <select id="inputArea" name="area" class="form-select area-value disabled">
                            <option value='NULL' selected disabled>Choose...</option>
                        </select>
                    </div>

                    <div class="col-12 my-4 justify-content-center text-center">
                        <button type="submit" id="submitButton" class="btn btn-primary">Sign Up</button>
                    </div>
                </form>
            </div>
        </div>



    </main>

    <script src="js/bootstrap.min.js"></script>
    <script>let states = <?php echo json_encode($states); ?>;let cities = <?php echo json_encode($cities); ?>;let areas = <?php echo json_encode($areas); ?>;</script>
    <script src="./script.js"></script>
</body>

</html>