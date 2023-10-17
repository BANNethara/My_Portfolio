<?php
include '../Database/connection.php';

if (isset($_POST['submit'])) {
  echo "Login Successfully.<br>";
    $Name = $_POST["name"];
    $Pass = $_POST["pwd"];

    // Use prepared statements to prevent SQL injection
    $sql = "SELECT Password FROM `sign_up` WHERE User_Name = ?";
    $stmt = mysqli_prepare($con, $sql);
    mysqli_stmt_bind_param($stmt, "s", $Name);
    mysqli_stmt_execute($stmt);
    $result = mysqli_stmt_get_result($stmt);

    if ($result) {
        // Check if a row is returned
        if (mysqli_num_rows($result) == 1) {
            $row = mysqli_fetch_assoc($result);
            $storedPassword = $row['Password'];

            // Use password_verify for secure password comparison
            if ($Pass == $storedPassword) {
                // Passwords match, redirect to the desired page
                echo "<script>alert('Login successful'); window.location='../Case_Invest/Investigator.php';</script>";
                exit;
            } else {
                echo "<script>alert('Incorrect password');</script>";
            }
        } else {
            echo "<script>alert('User not found');</script>";
        }
    } else {
        echo "<script>alert('Database query failed');</script>";
    }

    // Close the prepared statement and database connection
    mysqli_stmt_close($stmt);
    mysqli_close($con);
}
?>


<!DOCTYPE html>

<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Login</title>
    <link rel="stylesheet" href="../Investigator_login/In_login.css">
    <link rel="stylesheet" href="../Nav_Bar/style.css">
  </head>
  <body>
    <header>
      <?php include_once("../Nav_Bar/navigation.php")?>
    </header>
    <div class="center">
      <img src="../images/Login_logo.jpg" alt="Police Logo" width="70" height="100">
      <h1>Minor Offence Complaint Handling System</h1>
      <form method="post">
        <div class="txt_field">
        <input type="text" name="name" required>
          <span></span>
          <label>Username</label>
        </div>
        <div class="txt_field">
        <input type="password" name="pwd" required>
          <span></span>
          <label>Password</label>
        </div>
        <div class="pass">Forgot Password?</div>
        <input type="submit" name = "submit" value="Login">
        <div class="signup_link">
      Don't have an account <a href="../Agreement/Agreement.php">Signup</a>
        </div>
      </form>
    </div>
    <a href="../Website/Web.php" class="home-btn">HOME</a>
  </body>
</html>


