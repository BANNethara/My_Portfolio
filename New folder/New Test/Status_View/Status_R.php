<!DOCTYPE html>
<html>
<head>
  <title>Status Viewing</title>
  <link rel="stylesheet" type="text/css" href="../Status_View/Status_Style.css">
</head>
<body>
  <div class="container">
   
    <div class="row">
      <div class="col">
        <label for="name">Name</label>
      </div>
      <div class="col">
        <input type="text" id="name" placeholder="" class="text-right" readonly>
      </div>
    </div>

    <div class="row">
      <div class="col">
        <label for="complaintNumber">Complaint Number</label>
      </div>
      <div class="col">
        <input type="text" id="complaintNumber" placeholder="" class="text-right" readonly>
      </div>
    </div>

    <div class="row">
      <div class="col">
        <label for="complaintType">Complaint Type</label>
      </div>
      <div class="col">
        <input type="text" id="complaintType" placeholder="" class="text-right" readonly>
      </div>
    </div>

    <div class="row">
      <div class="col">
        <label for="complaintText">Complaint</label>
      </div>
      <div class="col">
        <textarea id="complaintText" rows="5" cols="50" class="text-right" readonly></textarea>
      </div>
    </div>

    <div class="row">
      <div class="col">
        <label for="currentStatus">Current Status</label>
      </div>
      <div class="col">
        <textarea id="currentStatus" rows="10" cols="40" class="text-right" readonly></textarea>
      </div>
    </div>
  </div>
  </div> <!-- End of .container -->
  <a href="../Website/Web.php" class="home-btn">HOME</a>
</body>
</html>
