<?php
include '../Database/connection.php';

if (isset($_POST['submit'])) {
  
    $Name = $_POST["name"];
    $Pass = $_POST["pwd"];

    // Use prepared statements to prevent SQL injection
    $sql = "SELECT Password, Status, Logged FROM `sign_up` WHERE User_Name = ?";
    $stmt = mysqli_prepare($con, $sql);
    mysqli_stmt_bind_param($stmt, "s", $Name);
    mysqli_stmt_execute($stmt);
    $result = mysqli_stmt_get_result($stmt);

    if ($result) {
        // Check if a row is returned
        if (mysqli_num_rows($result) == 1) {
            $row = mysqli_fetch_assoc($result);
            $storedPassword = $row['Password'];
            $status = $row['Status'];
            $logged = $row['Logged'];

            // Use password_verify for secure password comparison
            if ($Pass == $storedPassword) {
              if ($logged == 0) {
                // Display a password change form
                echo '<div id="changePasswordModal" style="display: block; background: rgba(0, 0, 0, 0.5); position: fixed; top: 0; left: 0; width: 100%; height: 100%; text-align: center; z-index: 999;">
                            <div style="background: white; padding: 20px; width: 300px; margin: 100px auto;">
                                <h2>Change Password</h2>
                                <form method="POST" action="change_password.php">
                                    <input type="hidden" name="user_name" value="' . $Name . '">
                                    <label for="new_password">New Password:</label>
                                    <input type="password" name="new_password" required><br>
                                    <label for="confirm_password">Confirm Password:</label>
                                    <input type="password" name="confirm_password" required><br>
                                    <input type="submit" name="change_password" value="Change Password">
                                </form>
                            </div>
                        </div>';
              }else{
                // Passwords match, redirect to the desired page
                if ($status == "I") {
                  echo "<script>alert('Login successful'); window.location='../Case_Invest/Investigator.php';</script>";
                }
                elseif ($status == "PF") {
                  echo "<script>alert('Login successful'); window.location='../Complaint_Register/C_part1.php';</script>";
                }
                elseif ($status == "O") {
                  echo "<script>alert('Login successful'); window.location='../Users.php';</script>";
                }
                else {
                  echo "<script>alert('Invalid User Role');";
                }
                exit;
              }
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
    <link rel="stylesheet" href="../Login/Login_style.css">
  </head>
  <body>
    
<div class="main">
        <div class="navbar">
      
        <div class="icon">
                <h2 class="logo">MOCHS</h2>
             
            </div>
            <div class="menu"> 
            <ul>
                    <li><a href="../Website/Website.php">HOME</a></li>
                    <li><a href="../About/About.php">ABOUT</a></li>
                    <li><a href="#">CONTACT</a></li>
                    <li class="dropdown">
                     <a href="#">ADMIN</a>
                    <ul class="dropdown-content">
                <li><a href="#">OIC</a></li>
                <li><a href="#">Police Officer</a></li>
                <li><a href="#">Investigator</a></li>
                
            </ul>
</div>
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
 
  </body>
</html>


