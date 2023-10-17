<?php
include '../Database/connection.php';
if(isset($_POST['Submit'])){

    $Complaint_No  = $_POST["Com_num"];
    $In_Parties = $_POST["parties"];
    $Final = $_POST["Update"];
    $Start_Date = $_POST["Sdate"];
    $Start_Time = $_POST["Stime"];
    $End_Date = $_POST["Edate"];
    $End_Time = $_POST["Etime"];


    $sql_test = "INSERT INTO `case_investigate`(`Complaint_No`,`In_Parties`, `Final`, `Start_Date`, `Start_Time`, `End_Date`, `End_Time`) VALUES 
    ('$Complaint_No','$In_Parties','$Final','$Start_Date','$Start_Time','$End_Date','$End_Time')";

    $result = mysqli_query($con,$sql_test);

    if($result){
        header ('location:../Website/Web.php');
    }else{
        echo "Failed";
    }
}
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Investigator Update</title>
    <link rel="stylesheet" href="../Case_Invest/Inves.css">
  
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
    
 
    <!-- <form action="SDatabase.php" method="POST" class="form" onsubmit="return showSuccessMessage(event)"> -->
    <form method="POST" class="form" onsubmit="onFormSubmit(event)" >
        <h1 class="text-center"></h1>

        <div class="two-columns">
            <!-- 1st Column -->
            <div class="form-column">
            <div class="input-group">
                <label class="actionlable" for="input2">Complaint No:</label>
                <input type="text" class="form-control" name="Com_num" id="" placeholder="" required >
            </div>
                <div class="input-group">
                    <label>Names of complaint parties:</label>
                    <textarea class="form-control" name="parties" placeholder="Enter the Complaint Parties"required ></textarea>
                   
                </div>
                <br>
                <div class="input-group">
                <label class="actionlable" for="input2">Action Taken:</label>
            
            
            <div class="picContainer">
                <!-- Image Upload -->
                <label for="imageInput">  
                    <img class="imageInput" src="../images/images (1).png" alt="Image Icon"> Upload Image:
                <input type="file" id="imageInput" name="image" accept="image/*"></label>
                <!-- Audio Upload -->
                <label for="audioInput">
                    <img class="imageInput" src="../images/Audio.jpg" &nbsp;alt="Audio Icon"> Upload Audio:
                <input type="file" id="audioInput" name="audio" accept="audio/*">  </label>
                <!-- Text Upload -->
                <label for="textInput">
                    <img class="imageInput" src="../images/55145543-text-file-icon.jpg" alt="Text Icon"> Upload Text:    
                <input type="file" id="textInput" name="text" accept=".txt"></label> 
                <!-- Video Upload -->
                <label for="videoInput">
                    <img class="imageInput" src="../images/1000_F_284454780_Tf9Zxh71D2ozOTSJfB1YXQkDS368OROh.jpg" alt="Video Icon"> Upload Video:&nbsp;
                <input type="file" id="videoInput" name="video" accept="video/*"> </label>
            </div>
                </div>
                   
                    
            </div>

            <!-- 2nd Column -->
            <div class="form-column">
            <div class="input-group">
    <label>Final Update:</label>
    <textarea class="form-control" name="Update" placeholder="Enter the Final Update" rows="5" required></textarea>
</div>
                <div class="input-group">
                    <label>Start Date:</label>
                    <input type="date" class="form-control" name="Sdate" placeholder=""  required>
                </div>
                <div class="input-group">
                    <label>Start Time:</label>
                    <input type="time" class="form-control" name="Stime" id="" placeholder="" required>
                </div>
                <div class="input-group">
                    <label>End Date:</label>
                    <input type="date" class="form-control" name="Edate" id="" placeholder="" required>
                </div>
                <div class="input-group">
                    <label>End Time:</label>
                    <input type="time" class="form-control" name="Etime" placeholder="" required>
                </div>
            </div>

        
        </div>
       

        <!-- Submit button -->
   <!-- Place this above your submit button -->
<span id="alertMessage" style="color: red; display: block; margin-bottom: 10px;"></span> <!-- Alert message placeholder -->

<!-- Your Submit button -->
<input class="submitbtn" name="Submit" type="Submit" value="Submit"><br><br>

<script>
   function onFormSubmit(event) {
    // Fetch the start and end dates
    var startDate = new Date(document.querySelector("[name='Sdate']").value);
    var endDate = new Date(document.querySelector("[name='Edate']").value);

    // Placeholder for the message
    var alertMessage = document.getElementById("alertMessage");

    // Calculate the difference in days
    var timeDifference = endDate - startDate;
    var dayDifference = timeDifference / (1000 * 3600 * 24);

    // Check if the dates are valid
    if (!isNaN(dayDifference) && dayDifference >= 0) {
        alertMessage.textContent = "Duration of the Investigation:" + dayDifference + " days.";
        event.preventDefault(); // Prevent the form from submitting
    } else if (dayDifference < 0) {
        alertMessage.textContent = "The end date should be after the start date.";
        event.preventDefault(); // Prevent the form from submitting
    } else {
        alertMessage.textContent = "Please provide valid start and end dates.";
        event.preventDefault(); // Prevent the form from submitting
    }
    alertMessage.textContent = "Duration of the Investigation: " + dayDifference + " days.";
alertMessage.style.display = "block";  // Ensure the message is displayed as a block
}
</script>
    </form>
</body>
</html>