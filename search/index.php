<!DOCTYPE html>
<html lang="en" dir="ltr">
<head>
<meta charset="utf-8">
<title>Admin Portal</title>
<style>
  body {
    font-family: Arial, sans-serif;
    margin: 0;
    padding: 0;
    background-color: #fff;
}

header {
    background-color: #e1a876;
    color: #fff;
    padding: 2px;
    text-align: center;
}

header h1 {
    margin: 0;
    text-align: left;
}

nav ul {
    list-style-type: none;
    padding: 0;
    text-align: right;
}

nav ul li {
    display: inline;
    margin-right: 20px;
    text-align: right;
}

nav ul li a {
    color: #663105;
    text-decoration: none;
}

main {
    padding: 10px;
}

section {
    margin-bottom: 30px;
}

section h2 {
    margin-top: 0;
}
  h2 {
    color: #333;
  }
  table {
    border-collapse: collapse;
    width: 100%;
  }
  th, td {
    border: 1px solid #ddd;
    padding: 8px;
    text-align: left;
  }
  th {
    background-color: #f2f2f2;
  }
  tr:nth-child(even) {
    background-color: #f9f9f9;
  }
  tr:hover {
    background-color: #ddd;
  }
  a {
    text-decoration: none;
    color: #007bff;
  }
  button {
    background-color: #dc3545;
    border: none;
    color: white;
    padding: 5px 10px;
    border-radius: 5px;
    cursor: pointer;
  }
  button:hover {
    background-color: #c82333;
  }
  .profile-icon {
            position: absolute;
            top: 10px; 
            left: 15px; 
        }
        .profile-icon img {
            width: 35px; 
            height: 35px; 
            border-radius: 50%; 
        }
</style>
</head>
<body>
<header>
        <nav>
            <div class="container1">
                <nav>
                    <ul class="nav navbar-nav">
                    <li class="profile-icon">
                        <a class="profile-link" href="http://localhost:8080/test/profile.jsp">
                            <img src="profile-icon.jpg" alt="Profile Icon">
                        </a>
                        </li>
                        <li>
                            <a class="page-scroll" href="http://localhost/search/cricscore.php">HOME</a>
                        </li>
                        <li>
                            <a class="page-scroll" href="http://localhost/search/currmatches.php">MATCHES</a>
                        </li>
                        <li>
                            <a class="page-scroll" href="http://localhost/search/player_search.html">PLAYERS</a>
                        </li>
                        <li>
                            <a class="page-scroll" href="http://localhost/search/ipl.php">IPL</a>
                        </li>
                        <li>
                            <a class="page-scroll" href="http://localhost:8080/test/glossary.html">GLOSSARY</a>
                        </li>
                        <li>
                            <a class="page-scroll" href="http://localhost:8080/test/about.html">ABOUT</a>
                        </li>
                        <li>
                            <a class="page-scroll" href="http://localhost/search/index.php">ADMIN PORTAL</a>
                        </li>
                    </ul>
                </nav>
            </div>
        </nav>
    </header>
  <h2>Index</h2>
  <table>
    <tr>
      <th>#</th>
      <th>First Name</th>
      <th>Last Name</th>
      <th>Email</th>
      <th>State</th>
      <th>Mobile</th>
      <th>Action</th>
    </tr>
    <?php
    require 'config.php';
    $rows = mysqli_query($conn, "SELECT * FROM registration");
    $i = 1;
    ?>
    <?php foreach($rows as $row) : ?>
    <tr id=<?php echo $row["id"]; ?>>
      <td><?php echo $i++; ?></td>
      <td><?php echo $row["firstName"]; ?></td>
      <td><?php echo $row["lastName"]; ?></td>
      <td><?php echo $row["email"]; ?></td>
      <td><?php echo $row["state"]; ?></td>
      <td><?php echo $row["mobile"]; ?></td>
      <td>
        <a href="edituser.php?id=<?php echo $row['id']; ?>">Edit</a>
        <button type="button" onclick="submitData(<?php echo $row['id']; ?>);">Delete</button>
      </td>
    </tr>
    <?php endforeach; ?>
  </table>
  <br>
  <a href="adduser.php">Add User</a>
  <?php require 'script.php'; ?>
</body>
</html>
