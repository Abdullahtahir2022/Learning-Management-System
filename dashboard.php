<?php
 session_start();

$id=$_SESSION['id'];



    $host='localhost';
    $dbUsername='root';
    $dbpassword='';
    $dbname='project';
    // creating connection
    $conn = new mysqli($host,$dbUsername,$dbpassword,$dbname) or die("Connect failed: %s\n". $conn -> error);
?>
<?php
$query6="select role from account_details where id=$id";
        $execute6=mysqli_query($conn, $query6);
        $result6 = mysqli_fetch_assoc($execute6);
        $role=$result6['role'];
        $_SESSION['role']=$role;
      




$query="select name from role where role_id='$role'";
        $execute=mysqli_query($conn, $query);
        $result3 = mysqli_fetch_assoc($execute);




          if($result3['name']=='Teacher' || $result3['name']=='teacher'){
        $query="select course_name from course NATURAL JOIN course_teacher_enrolment where student_id='$id'";
        $execute=mysqli_query($conn, $query);}
         if($result3['name']=='student' || $result3['name']=='Student'){
        $query="select course_name from course NATURAL JOIN course_student_enrolment where student_id='$id'";
        $execute=mysqli_query($conn, $query);}
        
        

?>



<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
    <title>Dashboard </title>
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
                    <li class="nav-item" role="presentation"><a class="nav-link active" href="Dashboard.php"><i class="fas fa-tachometer-alt"></i><span>Dashboard</span></a></li>
                    <li class="nav-item" role="presentation"><a class="nav-link " href="editprofile.php"><i class="fas fa-user"></i><span>Edit Profile</span></a></li>
                    <li class="nav-item" role="presentation"><a class="nav-link " href="hello.pdf"><i class="fas fa-table"></i><span>Course Outline</span></a></li>

                    <?php if($result3['name']=='Teacher' || $result3['name']=='teacher'){?>
                    
                    
                    <li class="nav-item" role="presentation"><a class="nav-link " href="table.php"><i class="fas fa-table"></i><span>Edit Attendance</span></a></li> <?php }   ?>


                    <?php if($result3['name']=='Student' || $result3['name']=='student'){
                        ?>
                    
                    
                    <li class="nav-item" role="presentation"><a class="nav-link " href="Student_table.php"><i class="fas fa-table"></i><span>Review Attendance </span></a></li> <?php }   ?>


                    <?php if($result3['name']=='Teacher' || $result3['name']=='teacher'){?>
                    
                    
                    <li class="nav-item" role="presentation"><a class="nav-link " href="mark_assignment.php"><i class="fas fa-table"></i><span>Review Submission</span></a></li> <?php }   ?>

                    <?php if($result3['name']=='Student' || $result3['name']=='student'){
                        ?>
                    
                    
                    <li class="nav-item" role="presentation"><a class="nav-link " href="submission.php"><i class="fas fa-table"></i><span>Add Submission</span></a></li> <?php }   ?>

                    <?php if($result3['name']=='Teacher' || $result3['name']=='teacher'){?>
                    
                    
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
                    <div class="container-fluid"><button class="btn btn-link d-md-none rounded-circle mr-3" id="sidebarToggleTop" type="button"><i class="fas fa-bars"></i></button><img src="assets1/img/nulms.JPG">
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
                            <li >
                            	<a href="main.php" class="btn btn-primary btn-lg active" role="button" aria-pressed="true" >Log Out</a>


                            </li>
                        </ul>
                    </div>
                </nav>
                <div class="container-fluid">
                    <div class="d-sm-flex justify-content-between align-items-center mb-4">
                        <h3 class="text-dark mb-0">Dashboard</h3>
                    </div>
                    <div class="row">
<?php  


if($result3['name']=='Student' || $result3['name']=='student'){


$query="select course_name,course_id from course NATURAL JOIN course_student_enrolment where student_id='$id'";
        $execute=mysqli_query($conn, $query);
        

        }

if($result3['name']=='Teacher' || $result3['name']=='teacher'){
        $query="select course_name, course_id from course NATURAL JOIN course_teacher_enrolment where teacher_id='$id'";
        $execute=mysqli_query($conn, $query);
        
        
}





?>


<?php

while ($result = mysqli_fetch_assoc($execute)) { 

    if($result3['name']=='Student' || $result3['name']=='student'){$a=$result['course_id'];
        $SELECT="select name   from teacher natural join course_student_enrolment where course_id=$a and student_id=$id";
                                                            $resul=mysqli_query($conn, $SELECT);
                                                            $resu = mysqli_fetch_assoc($resul);}
    $i=$result['course_id'];
    $SELECT23="select image from image where id=(select teacher_id from course_teacher_enrolment where course_id=$i)";
                                                            $resul23=mysqli_query($conn, $SELECT23);
                                                            $resu23 = mysqli_fetch_assoc($resul23);

                                                            
 
	?>




                        <div  class="col-md-6 col-xl-3 mb-4">
                            <div class="card shadow border-left-primary py-2">
                                <div class="card-body">
                                    <div class="row align-items-center no-gutters">
                                        <div class="col mr-2"><img src="<?php echo $resu23['image']; ?>"></a></div>
                                    </div>
                                    <div class="row align-items-center no-gutters">
                                        <div class="col mr-2">
                                            <div class="text-uppercase text-primary font-weight-bold text-xs mb-1"></div>
                                            <div  id="<?php $b;?>" onclick="myfunction()" class="text-dark font-weight-bold h5 mb-0"><span> 
                                                <p id="demo"></p>

                                                <?php if($result3['name']=='Student' || $result3['name']=='student'){

                                                 echo $result['course_name'],' (',$resu['name'],')';} ?>
                                             <?php     if($result3['name']=='Teacher' || $result3['name']=='teacher')
                                                 {
                                                    echo $result['course_name'];
                                                 }



                                                 ?></span></div>
                                        </div>
                                        <div class="col-auto"><i class="fas fa-clipboard-list fa-2x text-gray-300"></i></div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <?php   

                       }

?>






                    </div>
                </div>
            </div>
        </div>
    </div>
    <script src="assets1/js/jquery.min.js"></script>
    <script src="assets1/bootstrap/js/bootstrap.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-easing/1.4.1/jquery.easing.js"></script>
    <script src="assets1/js/Profile-Edit-Form.js"></script>
    <script src="assets1/js/theme.js"></script>


</body>






</html>
