<!DOCTYPE html>
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
    session_start();
    if ($_SERVER['REQUEST_METHOD'] == "POST") {
        $con = new mysqli("localhost", "root", "", "blood_donation");
        $post = true;


        $user_id = $_SESSION['user_id'];
        $camp_name = $_SESSION['camp_name'];
        $camp_id = $_POST['camp_id'];
        $camp_date = $_SESSION['camp_date'];
        $camp_address = $_SESSION['camp_address'];

        $sql = "INSERT INTO `donations` VALUES (NULL, $user_id, $camp_id);";


        $result = mysqli_query($con, $sql);

        try {
            if ($result) {
               header("Location: /blood-donation-project/donate.php");
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
                echo "Not working";
            }
        }
    } else {
        echo "<h1>Error 404! File Not Found! </h1>";
    }



    ?>
</body>

</html>