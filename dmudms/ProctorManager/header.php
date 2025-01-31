<html>

<head>
    <title>Online Dormitory Management System</title>
    <link rel="icon" type="image/x-icon" href="image/DMU.jpg" />
    <link rel="stylesheet" type="text/css" href="../style.css" />
    <style>

     .dropbtn{
        padding: 1px;
        background-color: lightgreen;
        font-size: 30px;
        border: none;
        display: inline;
        color: white;
     }

     .dropdown{
    position: relative;
    display: inline-block;
  }

  .dropdown-content{
    display: none;
    position: absolute;
    background-color: lightblue;
    min-width:160px;
    box-shadow:0px 8px 16px 8px rgba(0,0,0,0.2);
    z-index:1;
    color: blue;
  }

  .dropdown:hover .dropdown-content{
    display: block;
  }

table{
padding: 10px;
border: 1px solid black;
}
 tr,td{
  border: 1px solid blue;
  padding: 5px;
  text-align: center;
}
  th{
    background-color: rgb(2, 255, 2);
}

tr:nth-child(even) {
    background-color: aquamarine;
}

tr:nth-child(odd) {
    background-color: powderblue;
}

tr:hover {
    background-color: pink;
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
       <li> <div class="dropdown"> 
         <button class="dropbtn"> Add </button>
        <div class="dropdown-content">
               <a href="addBlock.php"> Block </a>
               <a href="addRoom.php"> Room </a>
         </div>
    </div> 
    </li>
     <li>
         <div class="dropdown">
            <button class="dropbtn"> View </button>
              <div class="dropdown-content">
                <a href="students.php"> Student </a>
                <a href="viewStudent.php"> AssStuds </a>
                <a href="viewBlock.php"> Block </a> 
                <a href="viewRoom.php"> Room </a> 
                <a href="viewPAss.php"> Proctor ASS </a>
              </div> 
           </div>
       </li>
      <li>
        <div class="dropdown">
          <button class="dropbtn"> Assign </button>
           <div class="dropdown-content">
                <a href="assignProctor.php"> Proctor </a>
                <a href="assignStudent.php"> Student </a>
                <!-- <a href="autoAssignStud.php"> AutoS </a> -->
            </div> 
          </div>
           </li>
            <li><a href="ManageMy.php"> Manage Pass </a></li>
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
<!-- <script>
        // Show/hide the dropdown content
        function toggleDropdown() {
            var dropdownContent = document.querySelector('.dropdown-content');
            dropdownContent.style.display = dropdownContent.style.display === 'none' ? 'block' : 'none';
        }
        
        // Attach event listener to the dropdown button
        var dropdownButton = document.querySelector('.dropdown-button');
        dropdownButton.addEventListener('click', toggleDropdown);
    </script> -->

