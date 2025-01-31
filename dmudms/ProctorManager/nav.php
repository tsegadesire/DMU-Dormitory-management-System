<!DOCTYPE html>
<html>

<head>
  <style>
    body {
      margin: 0;
    }

    .container {
      display: flex;
      flex-direction: column;
    }

    header {
      width: 100%;
      background-color: #24252a;
      padding: 30px;
      box-sizing: border-box;
    }

    .nav__links a,
    .cta {
      font-family: "Montserrat", sans-serif;
      font-weight: 500;
      color: #edf0f1;
      text-decoration: none;
    }

    .nav__links {
      list-style: none;
      display: flex;
      padding: 0px 20px;
    }

    .nav__links li {
      margin-left: 30px;
    }

    .nav__links li a:hover {
      color: #0088a9;
    }

    .cta {
      padding: 9px 25px;
      background-color: rgba(0, 136, 169, 1);
      border: none;
      border-radius: 50px;
      cursor: pointer;
      transition: background-color 0.3s ease 0s;
    }

    .cta:hover {
      background-color: rgba(0, 136, 169, 0.8);
    }

    .menu {
      display: none;
    }

    .overlay {
      height: 100%;
      width: 0;
      position: fixed;
      z-index: 1;
      left: 0;
      top: 0;
      background-color: #24252a;
      overflow-x: hidden;
      transition: width 0.5s ease 0s;
    }

    li img {
      width: 20px;
    }

    ul,
    ol,
    li a,
    a {
      list-style-type: none;
      text-decoration: none;
    }

    .logo {
      text-decoration: none;
      font-size: 32px;
      color: green;
    }

    .sidenav {
      width: 25%;
      background-color: #f1f1f1;
      position: fixed;
      left: 0;
      top: 180px;
      padding-top: 20px;
    }

    .sidenav.right {
      left: auto;
      right: 0;
    }

    .sidenav a {
      padding: 6px 8px 6px 16px;
      text-decoration: none;
      font-size: 20px;
      color: #818181;
      display: block;
    }

    .sidenav a:hover {
      color: #f1f1f1;
    }

    .content {
      margin-top: 130px;
      margin-left: 25%;
      margin-right: 25%;
      padding: 20px;
    }

    @media screen and (max-width: 650px) {
      header {
        padding: 30px 10%;
      }

      .nav__links,
      .cta {
        display: none;
      }

      .dropbtn {
        visibility: visible;
      }

      .dropdown:hover .dropdown-content {
        display: block;
      }

      .sidenav {
        width: 100%;
        height: auto;
        position: relative;
        top: 0;
        left: 0;
      }

      .sidenav.right {
        right: 0;
      }

      .sidenav a {
        padding: 10px;
        font-size: 18px;
      }

      .content {
        margin-left: 0;
        margin-right: 0;
        padding: 20px;
        height: 100vh;
        box-sizing: border-box;
        overflow-y: auto;
      }
    }
  </style>
</head>

<body>
  <div class="container">
    <header>
      <a class="logo" href="index.php" title="Home page" target="_self">&#x1F3E1;</a>
      <nav>
        <ul class="nav__links">
          <li><a href="gallery.php" title="Gallery page" target="_parent"><img alt="Gallery" src="gallery.svg"
                width="40px" /></a></li>
          <li><a href="myHistory.php" title="History page In Amharic language">&#x1F4DD;History-Amh</a></li>
          <li><a href="History.php" title="History page In English language">&#x1F4DC;History-Eng</a></li>
          <li><a href="#about"><img alt="About" src="about.svg" title="About webpage" />About</a></li>
        </ul>
      </nav>
      <a class="cta" href="registrationForm.php">Register</a>
      <button class="menu cta">Menu</button>
    </header>
    <div class="sidenav">
      <a href="addBlock.php">ADD Block</a>
      <a href="addRoom.php">ADD Room</a>
      <a href="assignStudents">Assign Students</a>
      <a href="assignProctor.php">Assign Proctor</a>
      <a href="nav.php">Nav</a>
      <a href="assignFCSV">Assign Students From CSV</a>
    </div>
    <div class="sidenav right">
      <a href="#">Right Side Navigation 1</a>
      <a href="#">Right Side Navigation 2</a>
      <a href="#">Right Side Navigation 3</a>
      <a href="#">Right Side Navigation 4</a>
      <a href="#">Right Side Navigation 5</a>
    </div>
    <div class="content">
      <h2>Assign Students</h2>
      <form action="" method="post">
        <label>Block Number:</label>
        <input type="text" name="blockNo" required><br><br>

        <label>Room No:</label>
        <input type="number" name="roomNo" required><br><br>

        <label>Block ID:</label>
        <select name="blockId" required>
          <option value="1">Block 1</option>
          <option value="2">Block 2</option>
          <option value="3">Block 3</option>
        </select><br><br>

        <input type="submit" name="submit" value="Add Room">
      </form>
      <?php  require("../connect.php");   $sql = "SELECT * FROM Room where BlockNum='1'";
    $RoomNoResult = mysqli_query($connect, $sql);
    $row = mysqli_num_rows($RoomNoResult);
    echo $row;
    ?>
    </div>
  </div>

  <script>
    const menuBtn = document.querySelector('.menu');
    const closeBtn = document.querySelector('.close');
    const overlay = document.querySelector('.overlay');
    const menu = document.querySelector('.menu');

    menuBtn.addEventListener('click', () => {
      overlay.style.width = '100%';
      menu.style.display = 'block';
    });

    closeBtn.addEventListener('click', () => {
      overlay.style.width = '0';
      menu.style.display = 'none';
    });
  </script>
</body>

</html>    <?php include("../footer.php");  ?>