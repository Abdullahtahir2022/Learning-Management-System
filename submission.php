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
                    <h3 class="text-dark mb-4">Submission</h3>
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

                                  <?php if (isset($_POST['submit'])){ $cid=$_POST['data'];
                                  $_SESSION['cid'] = $cid;

                                  $query2="select course_student_id from course_student_enrolment where course_id=$cid and  student_id=$id and teacher_id=(select teacher_id from course_teacher_enrolment where course_id=$cid)";
                                                            $execute2=mysqli_query($conn, $query2);
                                                            $result2=mysqli_fetch_assoc($execute2);
                                                            $csi=$result2['course_student_id'];


                                    $query3="select course_teacher_id from course_teacher_enrolment where course_id=$cid and  teacher_id=(select teacher_id from course_teacher_enrolment where course_id=$cid)";
                                                            $execute3=mysqli_query($conn, $query3);
                                                            $result3=mysqli_fetch_assoc($execute3);
                                                            $cti=$result3['course_teacher_id']; 

                                                            $_SESSION['csi'] = $csi;
                                                            $_SESSION['cti'] = $cti;
                                  ?>

                                
                                               
                                                    <?php  
                                                            
                                                            $SELECT="SELECT status from submission_status  where course_teacher_id=$cti";
                                                            $resul=mysqli_query($conn, $SELECT);
                                                            $result1 = mysqli_fetch_assoc($resul);


                                                            if($result1['status']==1){

                                                            $SELECT="SELECT * from assignment  where course_student_id=$csi";
                                                            $resul=$conn->query($SELECT);

                                                            if($resul->num_rows==0){






                                                             ?>










<p style="margin-left: 2.5em;padding: 0 7em 2em 0;border-width: 2px;"></p>


<form method="post" enctype="multipart/form-data">
</div><input type="file" class="form-control" name="file" style="background-color: rgb(247,249,252);"></div>
<button class="btn btn-primary"  type="submit" name="sub">Submit</button>
</form>

<?php }

else{ ?>

                                <table class="table">
                                    <thead>
                                        
                                        <tr>
                                            <th> Name  </th>
                                            <th> Id  </th>
                                            <th> Date  </th>
                                            <th> Assignment  </th>
                                            <th> Grade  </th>

                                        </tr>


<tbody>
       <?php
                                        
                                        $_SESSION['cid'] = $cid;

                                        $query0="select student_id from course_student_enrolment  where course_student_id=$csi";
                                        $execute0=mysqli_query($conn, $query0);
                                        $result0 = mysqli_fetch_assoc($execute0);
                                        $s=$result0['student_id'];
                                        
                                        



                                        $query111="select name,student_id,date, assignment, Grades from student NATURAL JOIN assignment where student_id=$s and course_student_id=$csi";
                                        $execute111=mysqli_query($conn, $query111);
                                        
  
                                        while($result111 = mysqli_fetch_assoc($execute111))
                                        { $a=$result111['student_id'];


        

                                        ?>


                    <tr>
                                            <td><?php echo $result111['name']; ?></td>
                                            <td><?php echo $result111['student_id']; ?></td>
                                            <td><?php echo $result111['date']; ?></td>
                                            <form> <td><a href="<?php echo $result111['assignment']; ?>"><?php echo "Assignment" ?></a></td> </form>
                                            <td><?php echo $result111 ['Grades']; ?></td>

                                            <form method="post"><td><button type="submit" name="remove"  class="btn btn-primary">Remove Submission</button></td></form>


                                            </tr> <?php } ?>



<?php

}


 ?>


                                                <?php
                                                        }
                                                            else{echo "<div class='alert alert-success'>
                                                            No Submission created yet!!!</div>";}

                                                    ?>
                                            




                                <?php }?>


<?php if (isset($_POST['sub'])){
$cid=$_SESSION['cid'];
$av= $_FILES['file']['name'];

$temp=$_FILES['file']['tmp_name'];
$folder='PDF/';
$des=$folder.$av;
move_uploaded_file($temp, $folder.$av);

$query1="SELECT teacher_id from course_teacher_enrolment where course_id=$cid";
$execute1=mysqli_query($conn, $query1);
$result1 = mysqli_fetch_assoc($execute1);
$tea=$result1['teacher_id'];
 $query2="select course_student_id from course_student_enrolment where course_id=$cid and  student_id=$id and teacher_id=$tea";
                                                            $execute2=mysqli_query($conn, $query2);
                                                            $result2=mysqli_fetch_assoc($execute2);
                                                            $csi=$result2['course_student_id'];
                                                            

if($des!='PDF/')
{
        $INSERT = "INSERT INTO assignment(course_student_id,assignment) values(?,?)";
        $stmt=$conn->prepare($INSERT);
        $stmt->bind_param("is",$csi,$des);
        $stmt->execute();
        echo "<div class='alert alert-success'>
                                        Submission successfull!!
                                         </div>";
        $stmt->close();}

        else{
            echo "<div class='alert alert-success'>
                                        No selected File!!
                                         </div>";

        }






}
    ?>


<?php
 if (isset($_POST['remove'])){ 
    $cid=$_SESSION['cid'];


$query1="SELECT teacher_id from course_teacher_enrolment where course_id=$cid";
$execute1=mysqli_query($conn, $query1);
$result1 = mysqli_fetch_assoc($execute1);
$tea=$result1['teacher_id'];
 $query2="select course_student_id from course_student_enrolment where course_id=$cid and  student_id=$id and teacher_id=$tea";
                                                            $execute2=mysqli_query($conn, $query2);
                                                            $result2=mysqli_fetch_assoc($execute2);
                                                            $csi=$result2['course_student_id'];
                                                            

     $query1="DELETE from assignment where course_student_id=$csi";
                                        $execute1=mysqli_query($conn, $query1);

        echo "<div class='alert alert-success'>
                                        Your Submission removed!!!
                                         </div>";
}


?>                                


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