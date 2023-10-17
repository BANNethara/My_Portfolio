<?php
include '../Database/connection.php';
if(isset($_POST['Next'])){

    $Complaint_No = $_POST["complaintNumber"];
    $Date = $_POST["date"];
    $Title = $_POST["title"];
    $First_Name = $_POST["Fname"];
    $Last_Name = $_POST["Lname"];
    $E_Mail = $_POST["email"];
    $Contact_Number = $_POST["contactNumber"];
    $NIC  = $_POST["nicNumber"];
    $Age = $_POST["age"];
    $Birth_Date = $_POST["DOB"];
    $Gender = $_POST["gender"];
    $Address = $_POST["address"];
    $District = $_POST["district"];
    $City = $_POST["city"];
    $Division_Code = $_POST["division_Code"];
    $Investigator_Name = $_POST["Iname"];



    $sql_test = "INSERT INTO `complaint_reg`(`Complaint_No`, `Date`, `Title`, `First_Name`, `Last_Name`, `E_Mail`, `Contact_Number`, `NIC`, `Age`, 
    `Birth_Date`, `Gender`, `Address`, `District`, `City`, `Division_Code`, `Investigator_Name`) VALUES ('$Complaint_No','$Date','$Title',
    '$First_Name','$Last_Name','$E_Mail', '$Contact_Number','$NIC','$Age','$Birth_Date','$Gender','$Address','$District','$City', '$Division_Code',
    '$Investigator_Name')";

    $result = mysqli_query($con,$sql_test);

    if($result){
        header ("location:../Complaint_Register/C_part2.php?param_name=" . urlencode($Complaint_No));
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
    <title>Registration 1</title>
    <link rel="stylesheet" href="../Complaint_Register/C_part_1.css" /><!--link with css code-->
    <script src="../Complaint_Register/C_PART1.js" defer></script><!--link with javascript code-->
    <style type="text/css"><!--align in label-->
   
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
    <h2><u>Complainant Registration</u></h2>
    <br>
    <form method="POST" class="form" action="../Complaint_Register/C_part1.php" name="textForm" onsubmit="return validateForm()">
    <!--    <form method="POST" class="form">-->

        
       <!-- 2-columns start here -->
       <div class="form-row">
        <!-- Column 1 -->
        <div class="form-column">
        <div class="input-box">
        <label class="label-style">Complaint No:</label>
            <input type="text" name="complaintNumber" size="35" required readonly>
        </div>
                    <!-- Date -->
                    <div class="input-box">
                        <label>Date:</label>
                        <input type="date" placeholder="DD/MM/YY" name="date" size="35" required>
                    </div>
            <div class="gender-box"><!--Title Selection-->
                <br>
                <h3>Title:</h3>
                <div class="gender-option">
               <input type="radio" name="title" value="Mr">Mr.
            <input type="radio" name="title" value="Mrs">Mrs.
                <input type="radio" name="title" value="Ms">Ms.
                <input type="radio" name="title" value="Rev">Rev.
                </div>
                    <div class="input-box">
                        <label>First Name:</label><!--Enter First Name-->
                        <input type="text" name="Fname" placeholder="Enter the First Name" oninput="validateName(this)" required>
                        <!--Giving Validation for First Name & Enter as the text-->
                    </div>
                        <div class="input-box">
                            <label>Last Name:</label><!--Enter Last Name-->
                            <input type="text" name="Lname" placeholder="Enter the Last Name" oninput="validateName(this)" required>
                            <!--Giving Validation for Last Name & Enter as the text-->
                        </div>
            <div class="input-box">
                <label>E-mail</label><!--Email-->
                <input type="email" placeholder="abscefg@gmail.com" size="35" name="email" required>
            </div>
            <div class="input-box">
                <label>Contact Number:</label><!--Enter Contact Number-->
                <input type="number" name="contactNumber" oninput="validateNumber(this)" pattern="^[0-9]{10}$" title="Please enter exactly 10 digits." placeholder="**********" size="35" required>
                <!--Give a validation part as a only can enter numbers and it should be a 10 digits-->
            </div>
        </div>
        <div class="input-box">
            <label>NIC:</label><!--Enter NIC Number-->
            <input type="text" name="nicNumber" placeholder="Enter the NIC number" oninput="validateNIC(this); calculateDetails()" id="nic" pattern="^[0-9]{9}[vV]$|^[0-9]{12}$"
            title="Please enter a valid NIC number: 9 digits followed by 'V' or 12 digits." size="35" required>
            <!--Validation and calculating parts of NIC, can add only 9 or 12 digits and letter "V"-->
            <!--Calculate gender, Birthday, Age by NIC-->
        </div>
        </div>
           <!-- Column 2 -->
           <div class="form-column">
           <div class="input-box">
                <label>Age:</label><!--Complainant age-->
                <input type="number" name="age" id="age" placeholder="" size="2" maxlength="2" required>
                <!--autogenerated by NIC & max length is 2-->
            </div>
            <div class="input-box">
                <label>Birth Date:</label><!--Complainant Birthday-->
                <input type="date" id="dob" name = "DOB" placeholder="DD/MM/YY" size="50" required>
                    <br>
        <div class="gender-box">
            <br>
            <label>Gender:</label><!--Complainant Gender-->
            <input type="text" id="gender"  name= "gender" placeholder="Gender will appear here" size="35" readonly>
            </div>
        <div class="input-box">
            <label>Address:</label><!--Complainant Address-->
            <td><textarea rows="2" cols="48" name="address" placeholder="Enter the Address" size="35" required></textarea></td>
            <!--give a textarea to address for multiple areas-->
                <div class="select-box" >
                    <br>
                <label>District:</label><!--Complaint District-->
                <select name="district" style="background-color: #f5f5f5;">
                    <!--Can select 25 districts as a option-->
                    <option>Colombo</option> 
                    <option>Gampaha</option>
                    <option>Kalutara</option>
                    <option>Kandy</option>
                    <option>Matale</option>
                    <option>Nuwara Eliya</option>
                    <option>Galle</option>
                    <option>Matara</option>
                    <option>Hambantota</option>
                    <option>Jaffna</option>
                    <option>Kilinochchi</option>
                    <option>Mannar</option>
                    <option>Mullaitivu</option>
                    <option>Vauniya</option>
                    <option>Batticaloa</option>
                    <option>Ampara</option>
                    <option>Trincomalee</option>
                    <option>Kurunegala</option>
                    <option>Puttalam</option>
                    <option>Anuradhapura</option>
                    <option>Polonnaruwa</option>
                    <option>Badulla</option>
                    <option>Monaragala</option>
                    <option>Ratnapura</option>
                    <option>Kegalle</option>
                </select>
            </div>
            <div class="input-box">
                <label> City:</label><!--Enter the Complainant Living City-->
        <input type="text" name= "city" placeholder="Enter the City" size="35" required/>
    </div>
                <div class="input-box">
                    <label>Division Code:</label><!--Enter Complainant Division code-->
                <input type="text" name="division_Code" placeholder="Enter the division code" size="35" required/>
            </div>
            <div class="input-box">
                <label>Investigator Name:</label><!--Complainant age-->
                <input type="text" name="Iname" id="Iname" placeholder="Enter the duty investigator name" required>
                <!--autogenerated by NIC & max length is 2-->
            </div>
        </div>
            <br>
            <button type="submit" class="btn btn-primary" name="Next">Next</button>
           
        </button>
       
    </form>
</section>
</body>
</html>