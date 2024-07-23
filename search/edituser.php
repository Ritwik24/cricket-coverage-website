<!DOCTYPE html>
<html lang="en" dir="ltr">
<head>
<meta charset="utf-8">
<title>Edit User</title>
<style>
  body {
    font-family: Arial, sans-serif;
    background-color: #f5f5f5;
    margin: 0;
    padding: 0;
  }
  h2 {
    color: #333;
    text-align: center;
    margin-top: 20px;
  }
  form {
    max-width: 500px;
    margin: 0 auto;
    background-color: #fff;
    padding: 20px;
    border-radius: 5px;
    box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
  }
  label {
    display: block;
    margin-bottom: 5px;
    color: #333;
  }
  input[type="text"], select {
    width: 100%;
    padding: 10px;
    margin-bottom: 15px;
    border: 1px solid #ccc;
    border-radius: 3px;
    box-sizing: border-box;
  }
  select {
    cursor: pointer;
  }
  button {
    background-color: #007bff;
    color: #fff;
    border: none;
    padding: 10px 20px;
    border-radius: 5px;
    cursor: pointer;
    display: block;
    width: 100%;
  }
  button:hover {
    background-color: #0056b3;
  }
  a {
    text-decoration: none;
    color: #007bff;
    display: block;
    text-align: center;
    margin-top: 20px;
  }
</style>
</head>
<body>
<h2>Edit User</h2>
<form autocomplete="off" action="" method="post">
  <?php
  require 'config.php';
  $id = $_GET["id"];
  $rows = mysqli_fetch_assoc(mysqli_query($conn, "SELECT * FROM registration WHERE id = $id"));
  ?>
  <input type="hidden" id="id" value="<?php echo $rows['id']; ?>">
  <label for="fname">First Name</label>
  <input type="text" id="fname" value="<?php echo $rows['firstName']; ?>">
  <label for="lname">Last Name</label>
  <input type="text" id="lname" value="<?php echo $rows['lastName']; ?>">
  <label for="email">Email</label>
  <input type="text" id="email" value="<?php echo $rows['email']; ?>">
  <label for="state">State</label>
  <select name="state" id="state" required>
            <option value="" style="color: lightgrey" disabled selected>Select state or Union territory</option>
            <option value="Andaman and Nicobar Islands">Andaman and Nicobar Islands</option>
            <option value="Andhra Pradesh">Andhra Pradesh</option>
            <option value="Arunachal Pradesh">Arunachal Pradesh</option>
            <option value="Assam">Assam</option>
            <option value="Bihar">Bihar</option>
            <option value="Chandigarh">Chandigarh</option>
            <option value="Chhattisgarh">Chhattisgarh</option>
            <option value="Dadra and Nagar Haveli and Daman and Diu">Dadra and Nagar Haveli and Daman and Diu</option>
            <option value="Delhi">Delhi</option>
            <option value="Goa">Goa</option>
            <option value="Gujarat">Gujarat</option>
            <option value="Haryana">Haryana</option>
            <option value="Himachal Pradesh">Himachal Pradesh</option>
            <option value="Jammu and Kashmir">Jammu and Kashmir</option>
            <option value="Jharkhand">Jharkhand</option>
            <option value="Karnataka">Karnataka</option>
            <option value="Kerala">Kerala</option>
            <option value="Ladakh">Ladakh</option>
            <option value="Lakshadweep">Lakshadweep</option>
            <option value="Madhya Pradesh">Madhya Pradesh</option>
            <option value="Maharashtra">Maharashtra</option>
            <option value="Manipur">Manipur</option>
            <option value="Meghalaya">Meghalaya</option>
            <option value="Mizoram">Mizoram</option>
            <option value="Nagaland">Nagaland</option>
            <option value="Odisha">Odisha</option>
            <option value="Puducherry">Puducherry</option>
            <option value="Punjab">Punjab</option>
            <option value="Rajasthan">Rajasthan</option>
            <option value="Sikkim">Sikkim</option>
            <option value="Tamil Nadu">Tamil Nadu</option>
            <option value="Telangana">Telangana</option>
            <option value="Tripura">Tripura</option>
            <option value="Uttarakhand">Uttarakhand</option>
            <option value="Uttar Pradesh">Uttar Pradesh</option>
            <option value="West Bengal">West Bengal</option>
            </select>
  <label for="mobile">Mobile</label>
  <input type="text" id="mobile" value="<?php echo $rows['mobile']; ?>">
  <button type="button" onclick="submitData('edit');">Edit</button>
</form>
<a href="index.php">Go To Index</a>
<?php require 'script.php'; ?>
</body>
</html>
