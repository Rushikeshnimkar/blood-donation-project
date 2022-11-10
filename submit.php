<!DOCTYPE html>
<?php
session_start();
if ($_SERVER["REQUEST_METHOD"] == "GET") {
    $con = new mysqli("localhost", "root", "", "blood_donation");
    $email = $_GET['email'];
    $password = $_GET['password'];
    $queryString = "SELECT password from users where email='$email';";
    $result = mysqli_query($con, $queryString);
    $row = mysqli_fetch_row($result);

    $success = false;

    if ($password == $row[0]) {
        setcookie("user", hash("sha256", "user logged in"));
        $_SESSION['logged'] = true;
        $_SESSION['email'] = $_GET['email'];
        $_SESSION['password'] = $_GET['password'];

        $user_query = "SELECT id FROM `users` where email='$email' and password='$password'";
        $result = mysqli_query($con, $user_query);
        $row = mysqli_fetch_row($result);
        $user_id = $row[0];
        $_SESSION['user_id'] = $user_id;
        header('Location: /blood-donation-project/signup.php');
    } else {
        header('Location: /blood-donation-project/signup.php');
    }
}
?>
<html lang="en">

<head>

    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="css/style.css" rel="stylesheet">
    </link>
    <link href="css/bootstrap.min.css" rel="stylesheet">
    </link>

</head>

<body>



    <?php
    if ($_SERVER['REQUEST_METHOD'] == "POST") {
        $con = new mysqli("localhost", "root", "", "blood_donation");
        $post = true;
        if (empty($_POST['name'])) {
            $nameErr = "Name is required";
            echo '<script>alert("', $nameErr, '");  history.back();</script>';

            $post = false;
            return;
        } else {
            $name = $_POST['name'];
            // check if name only contains letters and whitespace
            if (!preg_match("/^[a-zA-Z-' ]*$/", $name)) {
                $nameErr = "Only letters and white space allowed";
                echo '<script>alert("', $nameErr, '");  history.back();</script>';
                return;
            }
        }


        if (empty($_POST['email'])) {
            $emailErr = "Email is required";
            echo $emailErr;
            $post = false;
            return;
        } else {
            $email = $_POST['email'];
            $email = filter_var($email, FILTER_SANITIZE_EMAIL);
            if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
                echo '<script>alert("Enter a valid email address"); history.back();</script>';
                $post = false;
                return;
            }
        }

        if (empty($_POST['phone'])) {
            $phoneErr = "Phone number is required";
            echo '<script>alert("', $nameErr, '");  history.back();</script>';
            $post = false;
            return;
        } else {
            $phone = $_POST['phone'];
            $phone = filter_var($phone, FILTER_SANITIZE_NUMBER_INT);
            if (!filter_var($phone, FILTER_SANITIZE_NUMBER_INT)) {
                $phoneErr = "Phone number is not valid";
                echo '<script>alert("', $nameErr, '");  history.back();</script>';

                $post = false;
                return;
            }
        }

        if (empty($_POST['username'])) {
            $userErr = "Username is required";
            echo '<script>alert("', $userErr, '");  history.back();</script>';

            $post = false;
            return;
        } else {
            $user = $_POST['username'];
            // $user= filter_input(INPUT_POST,'user',FILTER_SANITIZE_SPECIAL_CHARS);
            // $user = mysqli_real_escape_string($con, $user);
            if (preg_match('/[\'^£$%&*()}{@#~?><>,|=_+¬-]/', $user)) {
                $userErr = "Special Characters not allowed! Only letters and numbers allowed!";
                echo '<script>alert("', $userErr, '");  history.back();</script>';
                return;
            }
        }

        if (empty($_POST['password'])) {
            $pwdErr = "Enter a password";
            echo '<script>alert("', $pwdErr, '");  history.back();</script>';
            $post = false;
            return;
        } else {
            $password = $_POST['password'];
            $pwdErr = "special char not allowed in password";
            if (preg_match('/[\'^£$%&*()}{@#~?><>,|=_+¬-]/', $password)) {
                echo '<script>alert("', $pwdErr, '");  history.back();</script>';
                return;
            }
        }

        $state = $_POST['state'];
        $city = $_POST['city'];
        $area = $_POST['area'];

        $address_query = "SELECT id FROM addresses WHERE state='$state' and city='$city' and area = '$area'";

        $result = mysqli_query($con, $address_query);

        $row = mysqli_fetch_all($result);
        $row = $row[0][0];

        $query = "INSERT INTO users values (NULL, '$name', '$email', $phone, '$user', '$password', $row);";
        try {
            $result = mysqli_query($con, $query);

            if ($result) {
                echo '<nav class="navbar navbar-expand-lg bg-dark ">
                <div class="container-fluid">
                    <div class="container">
                        <a class="navbar-brand text-bg-dark" href="index.php">Blood Donations</a>
                    </div>
        
                    <ul class="nav justify-content-end d-flex flex-nowrap">
                        <li class="nav-item">
                            <a class="nav-link text-bg-dark active" aria-current="page" href="index.php">Home</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link text-bg-dark active" aria-current="page" href="donate.php">Donate</a>
                        </li>
        
                        <li class="nav-item">
                            <a class="nav-link text-bg-dark" href="signin.php">SignIn</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link text-bg-dark" href="signup.php">SignUp</a>
                        </li>
        
                    </ul>
                </div>
            </nav>';
            }
        } catch (\Throwable $th) {
            if (mysqli_errno($con) == 1062) {
                echo '
                <div class="container body-container">
                    <div class="row justify-content-center" >
                        <h3 class="text-center">
                            An account with this phone number or email alread exists
                        </h3>
                    </div>
                </div>
                ';
            } else {
                echo "not workign";
            }
        }
    }



    ?>
</body>

</html>