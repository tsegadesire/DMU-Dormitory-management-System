<?php 
if (session_status() !== PHP_SESSION_ACTIVE) {
            session_start();
        }
        ?>
        <html>

<head>
    <title>Online Dormitory Management System</title>
    <link rel="icon" type="image/x-icon" href="image/DMU.jpg" />
    <link rel="stylesheet" type="text/css" href="../style.css" />
</head>

<body>
    <div class="head"> <img src="../image/DMU.jpg" width="40px" />
        <h1 style="background-color: rgb(23,34,45); color:white; padding:10px; margin: 0px;"> Well Come To Debremarkos
            University Dormitory Management
            System </h1>
    </div>
    <nav>
        <ul class="nav-links">
            <li><a href="viewRequest.php"> View Request </a></li>
             <li><a href="ManageAccount.php"> Manage Account </a></li>
    </ul>

        <?php
        // Start a session (if not already started)
        
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