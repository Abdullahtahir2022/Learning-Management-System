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
        $result3 = mysqli_fetch_assoc($execute);

        
?>













<!DOCTYPE html>
<html>



<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
    <title>Table - Brand</title>
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
                    <li class="nav-item" role="presentation"><a class="nav-link " href=""><i class="fas fa-table"></i><span>Course Outline</span></a></li>

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
                    <h3 class="text-dark mb-4">Attendance</h3>
                    <div class="card shadow">
                        <div class="card-header py-3">
                         


   
  
<?php if($result3['name']=='Student' || $result3['name']=='student'){
    $query="select course_name, course_id from course NATURAL JOIN course_student_enrolment where student_id='$id'";
    $execute=mysqli_query($conn, $query);
    
}
    if($result3['name']=='Teacher' || $result3['name']=='teacher'){
        $query="select course_name, course_id  from course NATURAL JOIN course_teacher_enrolment where teacher_id='$id'";
        $execute=mysqli_query($conn, $query);
    }


  ?>


    
    

<form method="post">
  <select  name="data">
    <option >Choose your Course</option>
    <?php while ($result=mysqli_fetch_assoc($execute)) {?>
    
        <option value=  <?php echo $result['course_id']; ?>   ><?php echo $result['course_name'];?></option>n <?php } ?>
    
  </select>
  <button   type="submit" name="submit">Submit</button>
</form>







  
  

    








                        
                        <div class="card-body">
                            <div class="panel-body">

                                  <?php if (isset($_POST['submit'])){
                                  ?>

                                
                                <form method="post">
                                <table class="table">
                                    <thead>
                                        
                                        <tr>
                                            <th> Name  </th>
                                            <th> Id  </th>
                                            <th> Email  </th>
                                            <th> Date  </th>
                                            <th> Attendance  </th>




                                        </tr>

                                    </thead>

                                    <tbody>

                                        <?php
                                        $cid=$_POST['data'];
                                        
                                        


                                        $query="select course_student_id from course_student_enrolment where course_id=$cid and student_id=$id and teacher_id=(select teacher_id from course_student_enrolment where course_id=$cid and student_id=$id)";
                                                            $execute1=mysqli_query($conn, $query);
                                                            $result=mysqli_fetch_assoc($execute1);
                                                            $csi=$result['course_student_id'];


                                        $query1="select student_id,name,email from student NATURAL JOIN course_student_enrolment  where course_student_id=$csi" ;
                                        $execute1=mysqli_query($conn, $query1);




                                        $SELECT23="select date from attendance where course_student_id=$csi";
                                                            $resul23=$conn->query($SELECT23);
                                                            $resul2 = mysqli_num_rows($resul23);
                                                            if($resul2==0)
                                                            {
                                                                $resul23 = mysqli_fetch_assoc($resul23);
                                                                $resul23['date']=$date=date('yy-m-d');
                                                            }
                                                            else
                                                            {

                                                                $resul23 = mysqli_fetch_assoc($resul23);
                                                            }


                                        
                                        while($result1 = mysqli_fetch_assoc($execute1))
                                        { $a=$result1['student_id'];


        

                                        ?>








                                        <tr>
                                            <td><?php echo $result1['name']; ?></td>
                                            <td><?php echo $result1['student_id']; ?></td>
                                            <td><?php echo $result1['email']; ?></td>
                                            <td><?php echo $resul23['date']; ?></td>
                                            <td>
                                                
                                                <button type="button" class="btn btn-light">
                                                    <?php 
                                                            
                                                            $SELECT="select status from attendance where course_student_id=$csi";
                                                            $resul=$conn->query($SELECT);
                                                            if($resul->num_rows>0){
                                                            $execut=mysqli_query($conn, $SELECT);
                                                            $resul = mysqli_fetch_assoc($execut);
                                                            echo $resul['status'];}
                                                            else{echo "None";}

                                                    ?>
                                                   
                                                </button>
                                                
                                                
                                            </td>
                                         </tr> <?php } ?>

                                         

                                         

                                    </tbody>


                                    </table>
                                
                                </form> 
                                <?php }?>


                               


                                    




                                





                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <footer class="bg-white sticky-footer"></footer>
        </div>
    </div>
    <script src="assets1/js/jquery.min.js"></script>
    <script src="assets1/bootstrap/js/bootstrap.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-easing/1.4.1/jquery.easing.js"></script>
    <script src="assets1/js/Profile-Edit-Form.js"></script>
    <script src="assets1/js/theme.js"></script>
</body>



</html>