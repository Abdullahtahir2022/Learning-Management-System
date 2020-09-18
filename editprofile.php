<?php
session_start();
 $id=$_SESSION['id'];
 $role=$_SESSION['role'];
    $host='localhost';
    $dbUsername='root';
    $dbpassword='';
    $dbname='project';
    // creating connection
    $conn = new mysqli($host,$dbUsername,$dbpassword,$dbname) or die("Connect failed: %s\n". $conn -> error);


        $query="select name from role where role_id='$role'";
        $execute=mysqli_query($conn, $query);
        $result5 = mysqli_fetch_assoc($execute);


        



if($result5['name']=='student' || $result5['name']=='Student'){


     $nameemail="select name, email  from student where student_id ='$id'";
     $img="select image  from image where id ='$id'";
     $country="select name from country where country_no =(select country_no from student where student_id='$id')";
     $city="select name from city where city_no =(select city_no from student where student_id='$id')";
        $execute1=mysqli_query($conn, $country);
        $execute2=mysqli_query($conn, $city);
        $execute3=mysqli_query($conn, $nameemail);
        $execute4=mysqli_query($conn, $img);
        $result1 = mysqli_fetch_assoc($execute1);
        $result2 = mysqli_fetch_assoc($execute2);
        $result3 = mysqli_fetch_assoc($execute3);
        $result4 = mysqli_fetch_assoc($execute4);}


        if($result5['name']=='Teacher' || $result5['name']=='teacher'){


                $nameemail="select name, email  from teacher where teacher_id ='$id'";
     $img="select image  from image where id ='$id'";
     $country="select name from country where country_no =(select country_no from teacher where teacher_id='$id')";
     $city="select name from city where city_no =(select city_no from teacher where teacher_id='$id')";

    
        $execute1=mysqli_query($conn, $country);
        $execute2=mysqli_query($conn, $city);
        $execute3=mysqli_query($conn, $nameemail);
        $execute4=mysqli_query($conn, $img);
        $result1 = mysqli_fetch_assoc($execute1);
        $result2 = mysqli_fetch_assoc($execute2);
        $result3 = mysqli_fetch_assoc($execute3);
        $result4 = mysqli_fetch_assoc($execute4);}



?>







<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
    <title>Profile - Brand</title>
    <link rel="stylesheet" href="assets1/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Titillium+Web:400,600,700">
    <link rel="stylesheet" href="assets1/fonts/fontawesome-all.min.css">
    <link rel="stylesheet" href="assets1/fonts/font-awesome.min.css">
    <link rel="stylesheet" href="assets1/fonts/fontawesome5-overrides.min.css">
    <link rel="stylesheet" href="assets1/css/Button-Change-Text-on-Hover.css">
    <link rel="stylesheet" href="assets1/css/dh-row-text-image-right.css">
    <link rel="stylesheet" href="assets1/css/divider-text-middle.css">
    <link rel="stylesheet" href="assets1/css/Drag--Drop-Upload-Form.css">
    <link rel="stylesheet" href="assets1/css/Drag-Drop-File-Input-Upload.css">
    <link rel="stylesheet" href="assets1/css/Pretty-Login-Form.css">
    <link rel="stylesheet" href="assets1/css/Profile-Edit-Form-1.css">
    <link rel="stylesheet" href="assets1/css/Profile-Edit-Form.css">
    <link rel="stylesheet" href="assets1/css/TD-BS4-Simple-Contact-Form-1.css">
    <link rel="stylesheet" href="assets1/css/TD-BS4-Simple-Contact-Form.css">
</head>

<body id="page-top">
        <div id="wrapper">
        <nav class="navbar navbar-dark align-items-start sidebar sidebar-dark accordion bg-gradient-primary p-0">
            <div class="container-fluid d-flex flex-column p-0"><button class="btn rounded-circle border-0" id="sidebarToggle" type="button"></button>
                <hr class="sidebar-divider my-0">
                <ul class="nav navbar-nav text-light" id="accordionSidebar">
                    <li class="nav-item" role="presentation"><a class="nav-link" href="dashboard.php"><i class="fas fa-tachometer-alt"></i><span>Dashboard</span></a></li>
                    <li class="nav-item" role="presentation"><a class="nav-link active" href="editprofile.php"><i class="fas fa-user"></i><span>Edit Profile</span></a></li>
                    <li class="nav-item" role="presentation"><a class="nav-link" href="hello.pdf"><i class="fas fa-table"></i><span>Course Outline</span></a></li>
                                        <?php if($result5['name']=='Teacher' || $result5['name']=='teacher'){?>
                    
                    
                    <li class="nav-item" role="presentation"><a class="nav-link " href="table.php"><i class="fas fa-table"></i><span>Edit Attendance</span></a></li> <?php }   ?>


                    <?php if($result5['name']=='Student' || $result5['name']=='student'){
                        ?>
                    
                    
                    <li class="nav-item" role="presentation"><a class="nav-link " href="Student_table.php"><i class="fas fa-table"></i><span>Review Attendance </span></a></li> <?php }   ?>

                    <?php if($result5['name']=='Teacher' || $result5['name']=='teacher'){?>
                    
                    
                    <li class="nav-item" role="presentation"><a class="nav-link " href="mark_assignment.php"><i class="fas fa-table"></i><span>Review Submission</span></a></li> <?php }   ?>

                    <?php if($result5['name']=='Student' || $result5['name']=='student'){
                        ?>
                    
                    
                    <li class="nav-item" role="presentation"><a class="nav-link " href="submission.php"><i class="fas fa-table"></i><span>Add Submission</span></a></li> <?php }   ?>


                    <?php if($result5['name']=='Teacher' || $result5['name']=='teacher'){?>
                    
                    
                    <li class="nav-item" role="presentation"><a class="nav-link " href="createsub.php"><i class="fas fa-table"></i><span>Create Submission</span></a></li> <?php }   ?>




                    <li class="nav-item" role="presentation"></li>
                    <li class="nav-item" role="presentation"></li>
                </ul>
                <div class="text-center d-none d-md-inline"></div>
            </div>
        </nav>
        <div class="d-flex flex-column" id="content-wrapper">
            <div id="content">
                <nav class="navbar navbar-light navbar-expand bg-white shadow mb-4 topbar static-top">
                    <div class="container-fluid"><button class="btn btn-link d-md-none rounded-circle mr-3" id="sidebarToggleTop" type="button"><i class="fas fa-bars"></i></button>
                        <form class="form-inline d-none d-sm-inline-block mr-auto ml-md-3 my-2 my-md-0 mw-100 navbar-search">
                            <div class="input-group"></div>
                        </form>
                        <ul class="nav navbar-nav flex-nowrap ml-auto">
                            <li class="nav-item dropdown d-sm-none no-arrow"><a class="dropdown-toggle nav-link" data-toggle="dropdown" aria-expanded="false" href="#"><i class="fas fa-search"></i></a>
                                <div class="dropdown-menu dropdown-menu-right p-3 animated--grow-in" role="menu" aria-labelledby="searchDropdown">
                                    <form class="form-inline mr-auto navbar-search w-100">
                                        <div class="input-group"><input class="bg-light form-control border-0 small" type="text" placeholder="Search for ...">
                                            <div class="input-group-append"><button class="btn btn-primary py-0" type="button"><i class="fas fa-search"></i></button></div>
                                        </div>
                                    </form>
                                </div>
                            </li>
                            <li ><a href="main.php" class="btn btn-primary btn-lg active" role="button" aria-pressed="true" >Log Out</a>
                            </li>
                        </ul>
                    </div>
                </nav>
                <div class="container-fluid">
                    <h3 class="text-dark mb-4">Profile</h3>
                    <div class="row mb-3">
                        <div class="col-md-4 relative">
                            <div class="avatar">
                                <img src="<?php echo $result4['image'];      ?>" class="rounded float-left" width="250" height="250">
                            </div></div>
                        <div class="col-lg-8">
                            <div class="row mb-3 d-none">
                                <div class="col">
                                    <div class="card text-white bg-primary shadow">
                                        <div class="card-body">
                                            <div class="row mb-2">
                                                <div class="col">
                                                    <p class="m-0">Peformance</p>
                                                    <p class="m-0"><strong>65.2%</strong></p>
                                                </div>
                                                <div class="col-auto"><i class="fas fa-rocket fa-2x"></i></div>
                                            </div>
                                            <p class="text-white-50 small m-0"><i class="fas fa-arrow-up"></i>&nbsp;5% since last month</p>
                                        </div>
                                    </div>
                                </div>
                                <div class="col">
                                    <div class="card text-white bg-success shadow">
                                        <div class="card-body">
                                            <div class="row mb-2">
                                                <div class="col">
                                                    <p class="m-0">Peformance</p>
                                                    <p class="m-0"><strong>65.2%</strong></p>
                                                </div>
                                                <div class="col-auto"><i class="fas fa-rocket fa-2x"></i></div>
                                            </div>
                                            <p class="text-white-50 small m-0"><i class="fas fa-arrow-up"></i>&nbsp;5% since last month</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col">
                                    <div class="card shadow mb-3">
                                        <div class="card-header py-3">
                                            <p class="text-primary m-0 font-weight-bold">User details</p>
                                        </div>
                                        <div class="card-body">
                                            <form>
                                                <div class="form-row">
                                                    <div class="col">
                                                        <div class="form-group"><label for="username"><strong>Name</strong><br></label><input class="form-control" type="text" placeholder="<?php echo $result3['name'];       ?>" name=""></div>
                                                    </div>
                                                    <div class="col">
                                                        <div class="form-group"><label for="address"><strong>Email</strong></label><input class="form-control" type="text" placeholder="<?php echo $result3['email'];       ?>" name="address"></div>
                                                    </div>
                                                </div>
                                                <div class="form-row">
                                                    <div class="col">
                                                        <div class="form-group"><label for="city"><strong>City</strong></label><input class="form-control" type="text" placeholder="<?php echo $result2['name'];       ?>" name="city"></div>
                                                    </div>
                                                    <div class="col">
                                                        <div class="form-group"><label for="country"><strong>Country</strong></label><input class="form-control" type="text" placeholder="<?php echo $result1['name'];       ?>" name="country"></div>
                                                    </div>
                                                </div>
                                                
                                            </form>
                                        </div>
                                    </div>
                                    <div class="card shadow"></div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="card shadow mb-5"></div>
                </div>
            </div>
            <footer class="bg-white sticky-footer"></footer>
        </div><a class="border rounded d-inline scroll-to-top" href="#page-top"><i class="fas fa-angle-up"></i></a></div>
    <script src="assets1/js/jquery.min.js"></script>
    <script src="assets1/bootstrap/js/bootstrap.min.js"></script>
    <script src="https:1//cdnjs.cloudflare.com/ajax/libs/jquery-easing/1.4.1/jquery.easing.js"></script>
    <script src="assets1/js/Profile-Edit-Form.js"></script>
    <script src="assets1/js/theme.js"></script>
</body>

</html>