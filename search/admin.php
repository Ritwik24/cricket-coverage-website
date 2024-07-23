<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Password Verification</title>
<style>
body {
    font-family: Arial, sans-serif;
    background-color: #f5f5f5;
    margin: 0;
    padding: 0;
}

.container {
    max-width: 400px;
    margin: 100px auto;
    background-color: #fff;
    border-radius: 5px;
    box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
    padding: 20px;
}

h2 {
    margin-top: 0;
    color: #333;
    text-align: center;
}

form {
    text-align: center;
}

label {
    display: block;
    margin-bottom: 10px;
    color: #333;
}

input[type="password"] {
    width: 100%;
    padding: 10px;
    margin-bottom: 20px;
    border: 1px solid #ccc;
    border-radius: 3px;
    box-sizing: border-box;
}

button {
    background-color: #007bff;
    color: #fff;
    border: none;
    padding: 10px 20px;
    border-radius: 5px;
    cursor: pointer;
}

button:hover {
    background-color: #0056b3;
}

.error-message {
    color: #dc3545;
    margin-top: 10px;
    text-align: center;
}
</style>
</head>
<body>
<div class="container">
    <?php
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        // Check if password is correct
        $password = $_POST['password'];
        if ($password == "Admin1234") {
            // Redirect to index.php if password is correct
            header("Location: index.php");
            exit();
        } else {
            // Display error message if password is incorrect
            echo "<p class='error-message'>Password is incorrect. Please try again.</p>";
        }
    }
    ?>
    <h2>Enter Password</h2>
    <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
        <label for="password">Password:</label>
        <input type="password" id="password" name="password" required>
        <button type="submit">Submit</button>
    </form>
</div>
</body>
</html>
