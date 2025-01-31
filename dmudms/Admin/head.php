<html>

<head>
    <title>Online Dormitory Management System</title>
    <link rel="icon" type="image/x-icon" href="image/DMU.jpg" />
    <style>
        body {
            margin: 0;
            padding: 0;
            font-family: Arial, sans-serif;
        }

        .head {
            display: flex;
            align-items: center;
            background-color: rgb(23, 34, 45);
            color: white;
            padding: 10px;
            margin: 0;
        }

        .head img {
            width: 40px;
            margin-right: 10px;
        }

        nav {
            background-color: rgb(23, 34, 45);
            color: white;
            padding: 10px;
        }

        .nav-links {
            list-style: none;
            display: flex;
            justify-content: flex-end;
            margin: 0;
            padding: 0;
        }

        .nav-links li {
            margin-left: 10px;
        }

        .nav-links li a {
            text-decoration: none;
            color: white;
        }

        #log {
            text-decoration: none;
            color: white;
            padding: 5px 10px;
            border: 1px solid white;
            border-radius: 3px;
        }

        #log:hover {
            background-color: white;
            color: rgb(23, 34, 45);
        }
    </style>
</head>

<body>
    <div class="head">
        <img src="../image/DMU.jpg" width="40px" />
        <h1>Well Come To Debremarkos University Online Dormitory Management System</h1>
    </div>
    <nav>
        <ul class="nav-links">
            <li><a href="index.php">Home</a></li>
            <li><a href="about.php">About</a></li>
            <li><a href="services.php">Services</a></li>
            <li><a href="#contact">Contact</a></li>
        </ul>
        <?php
        // Start a session (if not already started)
        if (session_status() !== PHP_SESSION_ACTIVE) {
            session_start();
        }
        if (isset($_SESSION['loggedin']) && $_SESSION['loggedin'] === true) {
            // User is logged in, display logout button
            echo '<a href="logout.php" id="log">Logout</a>';
        } else {
            // User is not logged in, display login button
            echo '<a href="../login.php" id="log">Login</a>';
        }
        ?>
    </nav>
</body>

</html>
