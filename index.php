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
            <div class="row justify-content-center">

                <h4 class="w-50 welcome p-2 bg-primary bg-gradient rounded-5 m-4 text-center">Welcome to the Blood Donation Camp!</h4>
                <h5 class="m-2 text-center fw-normal fs-4">Blood donation is a voluntary procedure that can help save lives. There are several types of blood donation. Each type helps meet different medical needs. The blood donation process from the time you arrive until the time you leave takes about an hour. The donation itself is only about 8-10 minutes on average.</h5>

            </div>

            <div class="row justify-content-center">
                <h4 class="w-25 p-2 m-4 m-4 bg-primary bg-gradient rounded-5 text-center">Why it's done?</h4>
                <p class="text-center fs-4">You agree to have blood drawn so that it can be given to someone who needs a blood transfusion.
                    <br>
                    Millions of people need blood transfusions each year. Some may need blood during surgery. Others depend on it after an accident or because they have a disease that requires certain parts of blood. Blood donation makes all of this possible. There is no substitute for human blood — all transfusions use blood from a donor.

                </p>
            </div>

            <div class="row justify-content-center">
                <h4 class="w-25 p-2 m-4 bg-primary bg-gradient rounded-5 text-center">How it's done?</h4>
            </div>

            <div class="row justify-content-center">

                <div class="col my-3">
                    <img src="images/1.jpg" style="margin-left: 50px" alt="donate.jpg" height="300">
                </div>
                <div class="col my-3">
                    <ul>
                        <li class="fs-5">
                            If you’re donating whole blood, we’ll cleanse an area on your arm and insert a brand new sterile needle for the blood draw. (This feels like a quick pinch and is over in seconds.)
                        </li>
                        <li class="fs-5">
                            Other types of donations, such as platelets, are made using an apheresis machine which will be connected to both arms.
                        </li>
                        <li class="fs-5">
                            A whole blood donation takes about 8-10 minutes, during which you’ll be seated comfortably or lying down.
                        </li>
                        <li class="fs-5">
                            When approximately a pint of whole blood has been collected, the donation is complete and a staff person will place a bandage on your arm.
                        </li>
                        <li class="fs-5">
                            For platelets, the apheresis machine will collect a small amount of blood, remove the platelets, and return the rest of the blood through your other arm; this cycle will be repeated several times over about 2 hours.
                        </li>
                    </ul>
                </div>
            </div>

            <div class="row justify-content-center">
                <h4 class="w-25 p-2 m-4 bg-primary bg-gradient rounded-5 text-center">Refreshment and Recovery</h4>
            </div>

            <div class="row justify-content-center">

                <div class="col my-3 mx-nt">
                    <img src="images/2.jpeg" style="margin-left: 50px" alt="thankyou.jpg" height="280">
                </div>
                <div class="col my-3">
                    <ul>
                        <li class="fs-5">
                            After donating blood, you’ll have a snack and something to drink in the refreshment area.
                        </li>
                        <br>
                        <li class="fs-5">
                            You’ll leave after 10-15 minutes and continue your normal routine.
                        </li>
                        <br>
                        <li class="fs-5">
                            Enjoy the feeling of accomplishment knowing you are helping to save lives.
                        </li>
                        <br>
                        <li class="fs-5">
                            Take a selfie, or simply share your good deed with friends. It may inspire them to become blood donors.
                        </li>

                    </ul>
                </div>
            </div>

            <div class="row justify-content-center">
                <h4 class="w-25 p-2 m-4 bg-primary bg-gradient rounded-5 text-center">How to Donate?</h4>
                <p class="text-center fs-4">You can go to a Blood Donation Camp near you or find one online and volunteer in it or donate your blood. 
                    You can also register to our website to donate blood. 
                    After registration, you'll be informed through call or text, when blood donation will be required in your area. <br>
                    To register with us, click the "Register Now!" button below and join the good cause of donating blood.
                </p>
            </div>

            <div class="row justify-content-center">
                <h4 class="w-25 register p-2 m-4 bg-danger bg-gradient rounded-5 text-center">
                    <a style="color:black; text-decoration: none;" href="./signup.php">Register Now!</a>
                </h4>
            </div>


        </div>
    </main>
    <script src="js/bootstrap.min.js"></script>
</body>

</html>