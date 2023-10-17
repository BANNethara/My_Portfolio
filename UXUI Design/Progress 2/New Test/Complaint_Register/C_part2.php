<?php
include '../Database/connection.php';

if (isset($_GET['param_name'])) {
    $id = $_GET['param_name'];

    if (isset($_POST['Submit'])) {
        $Complaint_Type = $_POST["type"];
        $Other_Type = $_POST["other"];
        $Description = $_POST["description"];
        $Other_Details = $_POST["other"];
        $Suspects = $_POST["suspects"];

        // Update query with a WHERE clause based on User_Name
        $sql_update = "UPDATE `complaint_reg` 
                       SET 
                           `Complaint_Type` = '$Complaint_Type',
                           `Other_Type` = '$Other_Type',
                           `Description` = '$Description',
                           `Other_Details` = '$Other_Details',
                           `Suspects` = '$Suspects'
                       WHERE 
                           `Complaint_No` = '$id'";

        $result = mysqli_query($con, $sql_update);

        if ($result) {
            header('location:../Website/Web.php');
        } else {
            echo "Failed to update record.";
        }
    }
} else {
    header('location:./C_part1.php');
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../Complaint_Register/C_part_2.css" />
    <title>Part2</title>
    <style type="text/css">
        label{
            width: 200px;
            display: inline-block;
        }
    </style>
</head>
<body>
<div class="main">
        <div class="navbar">
            <div class="icon">
                <h2 class="logo">MOCHS</h2>      
            </div>
            <div class="menu">
                <ul>
                    <li><a href="../Website/Web.php">HOME</a></li>
                    
                    <li><a href="../About/About.php">ABOUT</a></li>
                    <li><a href="#">CONTACT</a></li>
                    <li class="dropdown">
                     <a href="#">ADMIN</a>
                    <ul class="dropdown-content">
                <li><a href="#">OIC</a></li>
                <li><a href="#">Police Officer</a></li>
                <li><a href="#">Investigator</a></li>
                </ul>
         </li>
        </li>
    </ul>
    </div>
</div>
        </div>
    <section class="container">
    <h2 class="underlined-title"><u>Complaint Details<u></h2>
    <form method="POST" class="form">
   
    <div class="select-box">
        <br>
        <br>
        <label>Complaint Type:</label>
        <select name="type" style="background-color: #f5f5f5;">
            <br>
        
            <option>(Section 100) Abetment of the doing things. </option>
            <option>(Section 310) Of Hurt. </option>
            <option>(Section 312) Voluantarity causing hurt. </option>
            <option>(Section 366) Theft. </option>
            <option>(Section 386) Criminal misappropriation. </option>
            <option>(Section 388) Criminal breach of trust.</option>
            <option>(Section 308) Cruelty to children.</option>
            <option>(Section 330) Wrongful restraint.</option>
            <option>(Section 331) Wrongful Confincement.</option>
            <option>(Section 341) Criminal force.</option>
            <option>(Section 345) Sexual harassment.</option>
            <option>(Section 408) Mischief.</option>
            <option>(Section 427) Criminal tresspass.</option>
            <option>(Section 483) Criminal Intimidation.</option>
            <option>(Section 350) Kidnapping.</option>
            <option>Other</option>
        </select>
        <br>
        
            <div class="input-box">
                <br>
                <label>Other Complaint Type:</label>
            <input type="text" name="other" placeholder="Enter other types of complaint" size="57" />
        
                <div class="input-box">
                    <br>
                    <label for="complaintDescription">Complaint Description:</label>
                    <textarea id="complaintDescription" name="description" placeholder="Enter the Complaint Details" class="description-textarea"></textarea>
                
                    <div class="input-box">
                        <br>
                        <label>Other Details:</label>
                     <td><textarea rows="8" cols="90" name="other" placeholder="Enter the Extra Details about the Complaint" size="50" ></textarea></td>

                     <div class="input-box">
                    <br>
                    <label for="suspects">Suspects:</label>
                    <textarea id="complaintDescription" name="suspects" placeholder="Enter the Complaint Details" class="description-textarea"></textarea>

                    <br>
                    <br>
                    <br>
                    <div class="button-container">
                    <button type="button" class="btn btn-primary" onclick="goBack()">Back</button>
                        <button class="btn btn-primary" name="Submit">Submit</button>

                    </div>
                    <script>
                        function goBack() {
                        window.history.back();
                        }
                     </script>
                    </form>
     </section>
     
</body>
</html>
