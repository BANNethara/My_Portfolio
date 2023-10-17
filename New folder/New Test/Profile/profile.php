<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="../Profile/profile.css">
</head>
<body>
<section style="background-color: #eee;">
    <div class="container py-5">
        <div class="row">
            <div class="col">
                <nav aria-label="breadcrumb" class="bg-light rounded-3 p-3 mb-4">
                    <ol class="breadcrumb mb-0">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item"><a href="#">User</a></li>
                        <li class="breadcrumb-item active" aria-current="page">User Profile</li>
                    </ol>
                </nav>
            </div>
        </div>

        <div class="row">
        <!-- Profile Column (Leftmost) -->
        <div class="col-lg-3">
        <div class="card-body text-center">
                <img src="../images/download.jpg" alt="avatar" class="rounded-circle img-fluid" style="width: 150px;" id="profileImage">
                  <!-- Upload Form -->
                  <input type="file" id="imageUpload" style="display: none;">
                  <br>
                <button onclick="document.getElementById('imageUpload').click();">Upload Image</button>
                <h5 class="my-3">Name</h5>
                <p class="text-muted mb-1">Status(job)</p>
                <p class="text-muted mb-4">Address</p>
              
            </div>
            </div>
        </div>
            <!-- Information Column -->
            <div class="col-lg-9">
            <div class="row">
                    <!-- First Column of Information -->
                    <div class="col-md-6">
                        <div class="card mb-4">
                            <div class="card-body">
                                <div class="mb-3">
                                    <p class="mb-0">First Name</p>
                                    <p class="text-muted">Suchini</p>
                                </div>
                                <hr>
                                <div class="mb-3">
                                    <p class="mb-0">Last Name</p>
                                    <p class="text-muted">De Silva</p>
                                </div>
                                <hr>
                                <div class="mb-3">
                                    <p class="mb-0">Service No:</p>
                                    <p class="text-muted">5689356</p>
                                </div>
                                <hr>
                                <div class="mb-3">
                                    <p class="mb-0">NIC</p>
                                    <p class="text-muted">200059300222</p>
                                </div>
                                <hr>
                                <div class="mb-3">
                                    <p class="mb-0">Birth date:</p>
                                    <p class="text-muted">02/04/2000</p>
                                </div>
                                <hr>
                            </div>
                        </div>
                    </div>

                    <!-- Second Column of Information -->
                    <div class="col-md-6">
                        <div class="card mb-4">
                            <div class="card-body">
                                <div class="mb-3">
                                    <p class="mb-0">Gender</p>
                                    <p class="text-muted">Female</p>
                                </div>
                                <hr>
                                <div class="mb-3">
                                    <p class="mb-0">Email</p>
                                    <p class="text-muted">example@example.com</p>
                                </div>
                                <hr>
                                <div class="mb-3">
                                    <p class="mb-0">Phone</p>
                                    <p class="text-muted">(097) 234-5678</p>
                                </div>
                                <hr>
                                <div class="mb-3">
                                    <p class="mb-0">Mobile</p>
                                    <p class="text-muted">(098) 765-4321</p>
                                </div>
                                <hr>
                                <div class="mb-3">
                                    <p class="mb-0">Address</p>
                                    <p class="text-muted">Bay Area, San Francisco, CA</p>
                                </div>
                                <hr>
                                <!-- Location -->
                                <p class="mb-4 text-primary font-italic">Location</p>
                                <div class="progress rounded mb-2" style="height: 5px;">
                                    <div class="progress-bar" role="progressbar" style="width: 80%" aria-valuenow="80"
                                         aria-valuemin="0" aria-valuemax="100"></div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
</body>
</html>
