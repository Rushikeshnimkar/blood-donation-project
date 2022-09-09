<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <?php
    if ($_SERVER['REQUEST_METHOD'] == "POST") {
        $con = new mysqli("localhost", "root", "", "blood_donation");
        $post = true;
        if (empty($_POST['name'])) {
            $nameErr = "Name is required";
            echo $nameErr;
            $post = false;
            return;
        } else {
            $name = $_POST['name'];
            // check if name only contains letters and whitespace
            if (!preg_match("/^[a-zA-Z-' ]*$/", $name)) {
                $nameErr = "Only letters and white space allowed";
                echo $nameErr;
                $post = false;
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
                echo ("$email is not a valid email address");
                $post = false;
                return;
            }
        }

        if (empty($_POST['username'])) {
            $userErr = "Username is required";
            echo $userErr;
            $post = false;
            return;
        } else {
            $user = $_POST['username'];
            // $user= filter_input(INPUT_POST,'user',FILTER_SANITIZE_SPECIAL_CHARS);
            // $user = mysqli_real_escape_string($con, $user);
            if (preg_match('/[\'^£$%&*()}{@#~?><>,|=_+¬-]/', $user)) {
                echo "special char found";
            } else {
                echo $user;
            }

        }
    }



    ?>
</body>

</html>