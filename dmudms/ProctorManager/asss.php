<!DOCTYPE html>
<html>
<head>
    <title>Online Dormitory Management System</title>
    <link rel="icon" type="image/x-icon" href="image/DMU.jpg" />
    <link rel="stylesheet" type="text/css" href="../style.css" />
    <style>
        /* Existing styles */
        .head {
            display: flex;
            align-items: center;
            background-color: rgb(23,34,45);
            color: white;
            padding: 10px;
            margin: 0;
        }

        .head img {
            width: 40px;
        }

        /* Concatenated styles */
        .dropdown {
            position: relative;
            display: inline-block;
        }

        .dropdown-button {
            background-color: #4CAF50;
            color: white;
            padding: 8px;
            border: none;
            cursor: pointer;
        }

        .dropdown-content {
            display: none;
            position: absolute;
            background-color: blue;
            min-width: 160px;
            box-shadow: 0px 8px 16px 0px rgba(0,0,0,0.2);
            z-index: 1;
        }

        .dropdown-option {
            color: black;
            padding: 12px 16px;
            text-decoration: none;
            display: block;
        }

        .dropdown-option:hover {
            background-color: #f1f1f1;
        }

        nav {
            background-color: lightgreen;
            color: rgb(150, 69, 69);
            padding: 13px;
            font-size: 25px;
            display: flex;
            justify-content: space-between;
            align-items: center;
        }

        ul {
            list-style-type: none;
            margin: 0;
            padding: 0;
        }

        li {
            display: inline-block;
            margin-right: 10px;
        }

        .nav-links {
            display: flex;
        }

        .nav-links li {
            margin-right: 10px;
        }

        a {
            color: #fff;
            text-decoration: none;
            padding: 5px 10px;
        }

        a:hover {
            background-color: #555;
        }

        #log {
            background-color: aquamarine;
            color: rgb(148, 64, 64);
        }

        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            margin: 0;
            padding: 0;
        }

        h2 {
            text-align: center;
            margin-top: 50px;
        }

        .form-container {
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
        }

        form {
            max-width: 300px;
            margin: 0 auto;
            padding: 20px;
            background-color: #fff;
            border: 1px solid #ddd;
            border-radius: 5px;
            margin-top: 50px;
        }

        label {
            display: block;
            margin-bottom: 10px;
        }

        input[type="date"],
        input[type="text"],
        input[type="email"],
        input[type="password"] {
            width: 100%;
            padding: 10px;
            border: 1px solid #ddd;
            border-radius: 4px;
            margin-bottom: 20px;
        }

        input[type="submit"] {
            background-color: #4caf50;
            color: #fff;
            border: none;
            padding: 10px 20px;
            border-radius: 4px;
            cursor: pointer;
            font-size: 16px;
            font-weight: bold;
            text-align: center;
        }

        input[type="submit"]:hover {
            background-color: #45a049;
        }

        .error-message {
            color: red;
            margin-top: 10px;
        }

        table {
            width: 100%;
            border-collapse: collapse;
        }

        th {
            background-color: #23cc75;
        }

        tr:nth-child(even) {
            background-color: #911d1d;
        }

        tr:hover {
            background-color: #302c2c;
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
            <li>
                <!-- <div class="dropdown">
                    <button class="dropdown-button">Add</button> -->
                    <!-- <div class="dropdown-content" id="addDropdown"> -->
                        <a href="addBlock.php">Add Block</a>
                        <a href="addRoom.php">Add Room</a>
                    <!-- </div>
                </div> -->
            </li>
            <li>
                <!-- <div class="dropdown">
                    <button class="dropdown-button">View</button> -->
                    <!-- <div class="dropdown-content" id="viewDropdown"> -->
                        <a href="viewStudent.php">View Student</a>
                        <a href="viewBlock.php">View Block</a>
                        <a href="viewRoom.php">View Room</a>
                        <a href="viewProctor.php">View Proctor</a>
                    <!-- </div>
                </div> -->
            </li>
            <li>
                <!-- <div class="dropdown">
                    <button class="dropdown-button">Assign</button>
                    <div class="dropdown-content" id="assignDropdown"> -->
                        <a href="assignFCSV.php">Assign FCSV</a>
                        <a href="assignProctor">Assign Proctor</a>
                        <a href="assignStudent">Assign Student</a>
                        <a href="autoAssignStud.php">Auto Assign</a>
                    <!-- </div>
                </div> -->
            </li>
            <li><a href="ManageMy.php" style="font-size: 16px; font-weight: bold;">Manage Pass</a></li>
        </ul> 
    </nav>
    <?php
        if (isset($_SESSION['loggedin']) && $_SESSION['loggedin'] === true) {
            // User is logged in, display logout button
            echo '<a href="../logout.php" id="log">Logout</a>';
            echo $_SESSION['username'];
        } else {
            // User is not logged in, display login button
            echo '<a href="../login.php" id="log">Login</a>';
        }
    ?>
    <script>
        // Show/hide the dropdown content
        function toggleDropdown() {
            var dropdownContent = document.querySelector('.dropdown-content');
            dropdownContent.style.display = dropdownContent.style.display === 'none' ? 'block' : 'none';
        }
        
        // Attach event listener to the dropdown button
        var dropdownButton = document.querySelector('.dropdown-button');
        dropdownButton.addEventListener('click', toggleDropdown);
    </script>
</body>
</html>
