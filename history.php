<?php
/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
session_start();
$ss = $_SESSION['akash'];
if (!isset($ss)) {
    header("Location:index.php");
}
$con = new mysqli('localhost', 'root', '', 'hospital');
//host       ^username ^database name
$sql = "SELECT * FROM `users` WHERE username = '$ss'";
$result = $con->query($sql);
$row = mysqli_fetch_assoc($result);
$id = $row['u_id'];
$sql1 = "SELECT * FROM prescriptions_master,prescription_details WHERE prescriptions_master.patient_id='$id' AND prescriptions_master.id=prescription_details.prescription_id";
$result1 = $con->query($sql1);
?>


<<!DOCTYPE html>
<html>
    <head>

        <title>My History</title>
        <link href="style/mystyle.css" rel="stylesheet" type="text/css"/>

        <link rel="shortcut icon" type="image" href="images/logo.png" />

        <link href="style/w3.css" rel="stylesheet" type="text/css"/>

        <link href="style/w3-theme-light-green.css" rel="stylesheet" type="text/css"/>


    </head>
    <body class="w3-theme-light">
        <div class="navbar container w3-theme-l1 w3-row">
            <a href="home.php">
                <img class="nev-img" src="images/logo.PNG" height="100%" alt="leave-small"/>
                <span class=" nev-left menu-item w3-hover-text-black" onclick="">MediCare</span>
            </a>
            <div class="navbar-menu">
                <a style="text-decoration: none;" href="home.php"><span class=" menu-item w3-hover-text-red w3-text-dark-gray" onclick="">Home</span></a>
                <a style="text-decoration: none;" href="history.php"><span class=" menu-item w3-hover-text-red w3-text-dark-gray" onclick="">My History</span></a>

                <span class="menu-item w3-hover-text-black" onclick=""><?= strtoupper($ss) ?></span>
                <a href="logout.php" style="text-decoration: none;"><span class="menu-item w3-hover-text-red w3-text-dark-gray">Logout</span></a>
            </div>
        </div>
        <div style="margin-left: 5%; margin-right: 5%" class=" w3-container w3-theme-l3 w3-card-4">

            <div style="margin: 0% 2% 2% 2%;" class="w3-container w3-row w3-card-4">

                <div style="width: 50%; margin-right: 1%" class="w3-container w3-col">
                    <?php
                    $row1 = $result1->fetch_assoc();
                    $pro = $row1['problems'];
                    $pDate = $row1['prescribe_date'];
                    $nDate = $row1['next_visiting_date'];
                    ?>
                    <p> <b>Visiting Date:</b> <?php echo $pDate; ?></p>
                    <p> <b>Next Visiting Date:</b> <?php echo $nDate; ?></p>
                    <p> <b>Diagnosis:</b> <?php echo $pro; ?></p>
                </div>
                <div class="w3-container w3-rest">
                    <?php
                    $med = $row1['medicine_name'];
                    $mor = $row1['morning'];
                    $lun = $row1['lunch'];
                    $nig = $row1['night'];
                    $days = $row1['days'];
                    ?>
                    <p><?php echo $med; ?></p>
                    <span><?php echo $mor; ?>+</span><span><?php echo $lun; ?>+</span><span><?php echo $nig; ?></span><span> --<?php echo $days ?>(days).</span>
                    <?php
                    while ($row1 = $result1->fetch_assoc()) {
                        $med1 = $row1['medicine_name'];
                        $mor1 = $row1['morning'];
                        $lun1 = $row1['lunch'];
                        $nig1 = $row1['night'];
                        $days1 = $row1['days'];
                        ?>
                        <p><?php echo $med1; ?></p>
                        <span><?php echo $mor1; ?>+</span><span><?php echo $lun1; ?>+</span><span><?php echo $nig1; ?></span><span> --<?php echo $days1 ?>(days).</span>


                    <?php }
                    ?>

                </div>


            </div>


            <div style="margin-left: 2%; margin-right: 2%;" class="w3-container w3-card-4">

            </div>

        </div>

    </body>
</html>


