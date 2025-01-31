<html>

<head>
    <title>Online Dormitory Management System</title>
    <link rel="icon" type="image/x-icon" href="../image/DMU.jpg" />
    <link rel="stylesheet" type="text/css" href="../style.css" />
</head>

<body>
    <div class="head"> <img src="../image/DMU.jpg" width="40px" />
        <h1 style="background-color: rgb(23,34,45); color:white; padding:10px; margin: 0px;"> Well Come To Debremarkos
            University Online Dormitory Management
            System </h1>
    </div>
    <nav>
        <ul class="nav-links">
            <li><a href="header.php"> Home </a></li>
            <li><a href="requestMaintain.php"> Maintain request </a></li>
            <li><a href="viewAssignment.php"> view Assignment </a></li>
            <li><a href="changePass.php"> view personal </a></li>
            <li><a href="requestPro.php"> Request Ownership </a></li>
            <li><a href="viewpro.php"> View reqP </a></li>
            <li><a href="viewMn.php"> View reqM </a></li>
        </ul>

        <?php
        // Start a session (if not already started)
        if (session_status() !== PHP_SESSION_ACTIVE) {
            session_start();
        }
        if (isset($_SESSION['loggedin']) && $_SESSION['loggedin'] === true) {
            // User is logged in, display logout button
            echo '<a href="../logout.php" id="log"> Logout </a>';
            echo $_SESSION['username']; 

        } else {
            // User is not logged in, display login button
            echo '<a href="../login.php" id="log"> Login </a>';
        }
        ?>
    </nav>
</body>

</html>