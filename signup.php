<<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $fsn = $_POST["first_name"];
    $lsn = $_POST["last_name"];
    $username = $_POST["username"];
    $email = $_POST["email"];
    $pass = $_POST["password"];

    $password = password_hash($pass, PASSWORD_BCRYPT);

    $con = new mysqli('localhost', 'root', '', 'hospital');
    //host       ^username ^database name
    $sql = "insert into users(first_name,last_name,username,email,password) values('$fsn','$lsn','$username','$email','$pass')";
    $result = $con->query($sql);
    header("LOcation:index.php");
}
?>

<!DOCTYPE html>
<html>
    <head>
        <title>Login to MediCare</title>

        <link rel="shortcut icon" type="image" href="images/logo.png" />
        <script src="js/signupscript.js" type="text/javascript"></script>
        <link href="style/w3.css" rel="stylesheet" type="text/css"/>
        <link href="style/w3-theme-light-green.css" rel="stylesheet" type="text/css"/>


    </head>
    <body class="w3-theme-light" style="font-family: 'Lato', sans-serif;">

        <div class="w3-container w3-padding-64">

            <div class="w3-margin-bottom"style="margin-left: 33%">
                <img height="30" width="50" src="images/logo.png" alt=""/>
                <label class="w3-xxlarge w3-center"><b>Sign Up to MediCare</b></label>

            </div>

            <div class="w3-row" style="margin-left: 33%">
                <div class="w3-half w3-large">
                    <form action="" method="post" onsubmit="return signupValidation()">
                        <label class="">First Name</label>
                        <input name="first_name" onkeyup="firstNameValidator(this.value)" class="w3-xlarge w3-input w3-round-large w3-light-gray w3-margin-bottom" style="display: inline" type="text" placeholder="e.g.,Ariful"><span id="first_name_sign"></span><br>

                        <label class="">Last Name</label>
                        <input name="last_name" onkeyup="lastNameValidator(this.value)" class="w3-xlarge w3-input w3-round-large w3-light-gray w3-margin-bottom" style="display: inline" type="text" placeholder="e.g.,Islam"><span id="last_name_sign"></span><br>

                        <label class="">Username</label><span id="username_msg"></span>
                        <input name="username" onkeyup="userNameValidator(this.value)" class="w3-xlarge w3-input w3-round-large w3-light-gray w3-margin-bottom" style="display: inline" type="text" placeholder="e.g.,Username to login"><span id="username_sign"></span><br>

                        <label class="">Email</label><span id="email_msg"></span>
                        <input name="email" onkeyup="emailValidator(this.value)" class="w3-xlarge w3-input w3-round-large w3-light-gray w3-margin-bottom" style="display: inline" type="text" placeholder="e.g.,example@email.com"><span id="email_sign"></span><br>

                        <label class="">Password</label><span id="password_length_msg"></span>
                        <input name="password" onkeyup="passwordValidator(this.value)" class="w3-xlarge w3-input w3-round-large w3-light-gray w3-margin-bottom" style="display: inline" type="password" placeholder="e.g.,<?php for ($i = 0; $i < 8; $i++) { ?>&#x25CF;<?php } ?>"><span id="password_sign"></span><br>

                        <label>Repeat Password</label>
                        <input name="repeat_password" onkeyup="repeatPasswordValidator(this.value)" class="w3-xlarge w3-input w3-round-large w3-light-gray" style="display: inline" type="password" placeholder="e.g.,<?php for ($i = 0; $i < 8; $i++) { ?>&#x25CF;<?php } ?>"><span id="repeat_password_sign"></span><br>

                        <div class="w3-row w3-margin-top">
                            <input type="submit" value="Sign Up" class="w3-btn w3-theme-l1 w3-round" style="padding-left: 7%; padding-right: 7%;">
                            <a  href="index.php" class="w3-right w3-text-theme" style="margin-top:3%; margin-right: 10%">Already I have an account</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </body>
</html>



