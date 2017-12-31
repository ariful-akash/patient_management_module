<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $us = $_POST['username'];
    $ps = $_POST['password'];

    $con = new mysqli('localhost', 'root', '', 'hospital');
    //host       ^username ^database name
    $sql = "SELECT * FROM `users` WHERE username = '$us'OR email='$us' ";
    $result = $con->query($sql);
    $row = mysqli_fetch_assoc($result);
    $u = $row['username'];
    $p = $row['password'];
    $e = $row['email'];
    $f = $row['first_name'];
    $rool = $row['rool'];
    if ($u == $us || $e == $us && $p == $ps) {
        if ($rool == 1) {
            session_start();
            $_SESSION['akash'] = $u;
            header("Location:doctor.php");
        } else {
            session_start();
            $_SESSION['akash'] = $u;
            header("Location:patient.php");
        }
    }
}
?>


<!DOCTYPE html>
<html>
    <head>

        <title>Login to MediCare</title>

        <link rel="shortcut icon" type="image" href="images/logo.png" />

        <link href="style/w3.css" rel="stylesheet" type="text/css"/>

        <link href="style/w3-theme-light-green.css" rel="stylesheet" type="text/css"/>

        <script src="js/script.js" type="text/javascript"></script>
    </head>
    <body class="w3-theme-light" style="font-family: 'Lato', sans-serif;">

        <div class="w3-container w3-padding-64">

            <div class="w3-margin-bottom w3-center">
                <img height="30" width="50" src="images/logo.PNG" alt=""/>
                <label class="w3-xxlarge w3-center"><b>Login to MediCare</b></label>

            </div>

            <div class="w3-row" style="margin-left: 33%">
                <div class="w3-half w3-large">

                    <form action="" method="Post" onsubmit="return loginRequest()">

                        <label class="">Email (or username)</label>
                        <input name="username" onblur="EmailValidator()" class="w3-xlarge w3-input w3-round-large w3-light-gray w3-margin-bottom" type="text" placeholder="e.g., email@example.com">

                        <label>Password</label>
                        <input name="password" onblur="passwordValidator()" class="w3-xlarge w3-input w3-round-large w3-light-gray" type="password" placeholder="e.g., ********">

                        <div class="w3-row w3-margin-top">
                            <input type="submit" value="Login" class="w3-btn w3-theme-l1 w3-round" style="padding-left: 7%; padding-right: 7%;">
                            <a  href="signup.php" class="w3-right w3-text-theme" style="margin-top: 3%">Create an account</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </body>
</html>

