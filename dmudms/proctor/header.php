<html>

<head>
    <title>Online Dormitory Management System</title>
    <link rel="icon" type="image/x-icon" href="../image/DMU.jpg" />
    <link rel="stylesheet" type="text/css" href="../style.css" />
    <style>
table {
    width: 100%;
    border-collapse: collapse;
    margin-top: 10px;
    padding: 5px;
}

th{
    background-color: rgb(27, 185, 185);
}

tr:nth-child(even) {
    background-color: rgb(120, 86, 153);
}

tr:nth-child(odd) {
    background-color: rgb(214, 171, 54);
}

tr:hover {
    background-color: rgb(126, 118, 160);
}

</style>
</head>

<body>
    <div class="head"> <img src="../image/DMU.jpg" width="40px" />
        <h1 style="background-color: rgb(23,34,45); color:white; padding:10px; margin: 0px;"> Well Come To Debremarkos
            University Dormitory Management
            System </h1>
    </div>
    <nav>
        <ul class="nav-links">
            <li><a href="header.php"> Home </a></li>
            <li><a href="viewMaintain.php"> Manage Maintain </a></li>
            <li><a href="ManagePro.php"> Manage Owners </a></li>
            <li><a href="viewStudents.php"> view Students </a></li>
            <li><a href="changePass.php"> Manage Password </a></li>
        </ul>

        <?php
        // Start a session (if not already started)
        if (session_status() !== PHP_SESSION_ACTIVE) {
            session_start();
        }
        if (isset($_SESSION['loggedin']) && $_SESSION['loggedin'] === true) {
            // User is logged in, display logout button
            echo '<a href="../logout.php" id="log"> Logout </a>';
        } else {
            // User is not logged in, display login button
            echo '<a href="../login.php" id="log"> Login </a>';
        }
        ?>
    </nav>
</body>

</html>