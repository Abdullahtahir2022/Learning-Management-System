<?php



    $host='localhost';
    $dbUsername='root';
    $dbpassword='';
    $dbname='project';
    // creating connection
    $conn = new mysqli($host,$dbUsername,$dbpassword,$dbname) or die("Connect failed: %s\n". $conn -> error);

    $query="select student_id,name from student";
        $execute=mysqli_query($conn, $query);


        $query1="select name,teacher_id from teacher";
        $execute1=mysqli_query($conn, $query1);

        $query4="select name,teacher_id from teacher";
        $execute4=mysqli_query($conn, $query4);



        $query2="select course_name,course_id from course";
        $execute2=mysqli_query($conn, $query2);


        $query3="select course_name,course_id from course";
        $execute3=mysqli_query($conn, $query3);





?>



<?php if (isset($_POST['st'])){ $role=$_POST['optradio'];
								$id= $_POST['id'];
        $SELECT="SELECT id from account_details where id= ?";
        $stmt=$conn->prepare($SELECT);
        $stmt->bind_param("i",$id);
        $stmt->execute();
        $stmt->bind_result($id);
        $stmt->store_result();
        $rnum=$stmt->num_rows;

        if($rnum==0)
            {
                if($role==3)
                { $INSERT="insert into account_details(id,role,password) values($id,$role,'1234')";
                            $insertResult=$conn->query($INSERT);

                }
                else{
                $INSERT="insert into account_details(id,role) values($id,$role)";
                            $insertResult=$conn->query($INSERT);}}


                                  







                                  }
                                  ?>

<?php if (isset($_POST['c'])){ $course=$_POST['course'];
								$id= $_POST['id'];
								
$SELECT="SELECT course_id from course where course_id= ?";
        $stmt=$conn->prepare($SELECT);
        $stmt->bind_param("i",$id);
        $stmt->execute();
        $stmt->bind_result($id);
        $stmt->store_result();
        $rnum=$stmt->num_rows;

        if($rnum==0)
            {$INSERT1="insert into course values($id,'$course')";
                            $insertResult=$conn->query($INSERT1);}
                                  }
                                  ?>



<?php if (isset($_POST['cse'])){ $s=$_POST['student'];
								$t= $_POST['teacher'];
								$c= $_POST['course'];
								
$SELECT="SELECT student_id,course_id,teacher_id from course_student_enrolment where student_id= ? and course_id=? and teacher_id=?";
        $stmt=$conn->prepare($SELECT);
        $stmt->bind_param("iii",$s,$c,$t);
        $stmt->execute();
        $stmt->bind_result($s,$c,$t);
        $stmt->store_result();
        $rnum=$stmt->num_rows;

        if($rnum==0)

            {  $SELECT="SELECT course_id,teacher_id from course_teacher_enrolment where course_id= ? and teacher_id=?";
        $stmt=$conn->prepare($SELECT);
        $stmt->bind_param("ii",$c,$t);
        $stmt->execute();
        $stmt->bind_result($c,$t);
        $stmt->store_result();
        $rnum=$stmt->num_rows;
        if($rnum==0)
        {
echo "<div class='alert alert-success'>
                                       Instructor is not enroled in the selected course!!
                                         </div>";
            

        }
        else
        {
            $INSERT1="insert into course_student_enrolment(student_id,course_id,teacher_id) values($s,$c,$t)";
                            $insertResult=$conn->query($INSERT1);}
        }




 
                
							




                                  }
                                  ?>


<?php if (isset($_POST['cte'])){ 
								$t= $_POST['teacher'];
								$c= $_POST['course'];

$SELECT="SELECT course_id,teacher_id from course_teacher_enrolment where course_id=? and teacher_id=?";
        $stmt=$conn->prepare($SELECT);
        $stmt->bind_param("ii",$c,$t);
        $stmt->execute();
        $stmt->bind_result($c,$t);
        $stmt->store_result();
        $rnum=$stmt->num_rows;

        if($rnum==0)
            {$INSERT1="insert into course_teacher_enrolment(course_id,teacher_id) values($c,$t)";
                            $insertResult=$conn->query($INSERT1);


            $query="select course_teacher_id from course_teacher_enrolment where course_id=$c and teacher_id=$t";
    $execute=mysqli_query($conn, $query);
    $result=mysqli_fetch_assoc($execute);
    $id=$result['course_teacher_id'];




$INSERT2="insert into submission_status(course_teacher_id,status) values($id,0)";
                            $insertResult=$conn->query($INSERT2);


                        }								

							




                                  }
                                  ?>




<?php if (isset($_POST['str'])){ 

$role=$_POST['optradio'];
$id= $_POST['id'];



$INSERT2="DELETE from assignment where student_id=$id or teacher_id=$id";
$insertResult=$conn->query($INSERT2);

$INSERT2="DELETE from attendance where student_id=$id or teacher_id=$id";
$insertResult=$conn->query($INSERT2);






$INSERT2="DELETE from course_student_enrolment where student_id=$id or teacher_id=$id";
$insertResult=$conn->query($INSERT2);

$INSERT2="DELETE from course_teacher_enrolment where teacher_id=$id";
$insertResult=$conn->query($INSERT2);
$INSERT2="DELETE from submission_status where teacher_id=$id";
$insertResult=$conn->query($INSERT2);

$INSERT2="DELETE from image where id=$id";
$insertResult=$conn->query($INSERT2);

$INSERT2="DELETE from teacher where teacher_id=$id";
$insertResult=$conn->query($INSERT2);
$INSERT2="DELETE from student where student_id=$id";
$insertResult=$conn->query($INSERT2);

$INSERT2="DELETE from account_details where id=$id and role=$role";
$insertResult=$conn->query($INSERT2);



}

?>



<?php if (isset($_POST['cr'])){ 

$course=$_POST['course'];
$id= $_POST['id'];






$INSERT2="DELETE from assignment where course_id=$id";
$insertResult=$conn->query($INSERT2);


$INSERT2="DELETE from attendance where course_id=$id";
$insertResult=$conn->query($INSERT2);

$INSERT2="DELETE from submission_status where course_id=$id";
$insertResult=$conn->query($INSERT2);
$INSERT2="DELETE from course_student_enrolment where course_id=$id";
$insertResult=$conn->query($INSERT2);


$INSERT2="DELETE from course_teacher_enrolment where course_id=$id";
$insertResult=$conn->query($INSERT2);



$INSERT2="DELETE from course where course_id = $id";
$insertResult=$conn->query($INSERT2);


}

?>



<?php if (isset($_POST['cser'])){ 

 $s=$_POST['student'];
                                $t= $_POST['teacher'];
                                $c= $_POST['course'];




$INSERT2="DELETE from assignment where course_id=$c and student_id=$s";
$insertResult=$conn->query($INSERT2);


$INSERT2="DELETE from attendance where course_id=$c and student_id=$s";
$insertResult=$conn->query($INSERT2);
$INSERT2="DELETE from course_student_enrolment where course_id=$c and teacher_id=$t and student_id=$s";
$insertResult=$conn->query($INSERT2);



}

?>

<?php if (isset($_POST['cter'])){ 

$t= $_POST['teacher'];
                                $c= $_POST['course'];




$INSERT2="DELETE from submission_status where course_id=$c and teacher_id=$t";
$insertResult=$conn->query($INSERT2);

$INSERT2="DELETE from assignment where course_id=$c and teacher_id=$t";
$insertResult=$conn->query($INSERT2);
$INSERT2="DELETE from attendance where course_id=$c and teacher_id=$t";
$insertResult=$conn->query($INSERT2);
$INSERT2="DELETE from course_teacher_enrolment where course_id=$c and teacher_id=$t";
$insertResult=$conn->query($INSERT2);
}

?>





<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
    <title>Home - Brand</title>
    <link rel="stylesheet" href="assets2/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,700,300italic,400italic,700italic">
    <link rel="stylesheet" href="assets2/css/Pretty-Login-Form.css">
</head>

<body id="page-top">
    <nav class="navbar navbar-light navbar-expand" id="sidebar-wrapper">
        <div class="container"><button data-toggle="collapse" class="navbar-toggler d-none" data-target="#"></button>
            <div class="collapse navbar-collapse">
                <ul class="nav navbar-nav sidebar-nav" id="sidebar-nav">
                    <li class="nav-item sidebar-brand" role="presentation"><a class="nav-link active js-scroll-trigger" href="#page-top">Brand</a></li>
                    <li class="nav-item sidebar-nav-item" role="presentation"><a class="nav-link js-scroll-trigger" href="#page-top">Home</a></li>
                    <li class="nav-item sidebar-nav-item" role="presentation"><a class="nav-link js-scroll-trigger" href="#about">About</a></li>
                    <li class="nav-item sidebar-nav-item" role="presentation"><a class="nav-link js-scroll-trigger" href="#services">Services</a></li>
                    <li class="nav-item sidebar-nav-item" role="presentation"><a class="nav-link js-scroll-trigger" href="#portfolio">Portfolio</a></li>
                    <li class="nav-item sidebar-nav-item" role="presentation"><a class="nav-link js-scroll-trigger" href="#contact">Contact</a></li>
                </ul>
            </div>
        </div>
    </nav>
    <header class="d-flex masthead" style="background-image:url('admin.jpg');">
        <div class="container my-auto text-center">
           <h1><a href="main.php" class="btn btn-primary btn-lg active" role="button" aria-pressed="true" >Log Out</a></h1>
        </div>
    </header>
    <section id="about" class="content-section bg-light">
        <div class="container text-center">
            <div class="row">
                <div class="col-lg-10 mx-auto">
                    <p class="lead mb-5"></p>
                    <div class="row login-form">
                        <div class="col-md-4 offset-md-4">
                            <h2 class="text-center form-heading">Add Students Teachers or Admin</h2>
                            <form method="POST">

            <h2 class="sr-only">Login Form</h2>
            
            <div class="form-group"><input class="form-control" type="number" name="id" placeholder="ID"></div>
            <div class="checkbox">
 <label>
    <label><input type="radio" name="optradio" value=3 checked> Admin</label>

</div>
            <div class="checkbox">
 <label>
    <label><input type="radio" name="optradio" value=1 checked> Teacher</label>

</div>
 <div class="checkbox">
 <label><input type="radio" name="optradio" value=2 checked> Student </label>
 
</div>

            
            <div class="form-group"><button class="btn btn-primary btn-block" type="submit" name="st" style="background-color: rgb(75,43,142);">Add</button>
            <button type="submit" name="str" class="btn btn-danger" style="background-color: red; ">Remove</button></div> </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <section id="about-1" class="content-section bg-light">
        <div class="container text-center">
            <div class="row">
                <div class="col-lg-10 mx-auto">
                    <p class="lead mb-5"></p>
                    <div class="row login-form">
                        <div class="col-md-4 offset-md-4">
                            <h2 class="text-center form-heading">Add Courses</h2>
                            <form method="POST" >

            <h2 class="sr-only">Login Form</h2>
            
            <div class="form-group"><input class="form-control" type="number" name="id" placeholder="ID"></div>
            <div class="form-group"><input class="form-control" type="text" name="course" placeholder="Name"></div>
            <div class="checkbox">

 
</div>

            
            <div class="form-group"><button class="btn btn-primary btn-block" type="submit" name="c" style="background-color: rgb(75,43,142);">Add</button>
            <button type="submit" name="cr" class="btn btn-danger" style="background-color: red; ">Remove</button> </div></form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <section id="about-2" class="content-section bg-light">
        <div class="container text-center">
            <div class="row">
                <div class="col-lg-10 mx-auto">
                    <p class="lead mb-5"></p>
                    <div class="row login-form">
                        <div class="col-md-4 offset-md-4">
                            <h2 class="text-center form-heading">Course Students Enrolment</h2>
                            <form method="post">
  <select  name="student">
    <option >Student Id</option>
    <?php while ($result=mysqli_fetch_assoc($execute)) {?>
    
        <option value=  <?php echo $result['student_id']; ?>   ><?php echo $result['name'];?></option>n <?php } ?>
    
  </select>
  <select  name="teacher">
    <option >Teacher Name</option>
    <?php while ($result1=mysqli_fetch_assoc($execute1)) {?>
    
        <option value=  <?php echo $result1['teacher_id']; ?>   ><?php echo $result1['name'];?></option>n <?php } ?>
    
  </select>
  <select  name="course">
    <option >Course Name</option>
    <?php while ($result2=mysqli_fetch_assoc($execute2)) {?>
    
        <option value=  <?php echo $result2['course_id']; ?>   ><?php echo $result2['course_name'];?></option>n <?php } ?>
    
  </select>
  <button class="btn btn-primary btn-block" type="submit" name="cse" style="background-color: rgb(75,43,142);">Add</button>
  <button type="submit" name="cser" class="btn btn-danger" style="background-color: red; ">Remove</button></div> </form>
</form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <section id="about-3" class="content-section bg-light">
        <div class="container text-center">
            <div class="row">
                <div class="col-lg-10 mx-auto">
                    <p class="lead mb-5"></p>
                    <div class="row login-form">
                        <div class="col-md-4 offset-md-4">
                            <h2 class="text-center form-heading">Course Teachers Enrolment</h2>
                            <form method="post">

  <select  name="teacher">
    <option >Teacher Name</option>
    <?php while ($result1=mysqli_fetch_assoc($execute4)) {?>
    
        <option value=  <?php echo $result1['teacher_id']; ?>   ><?php echo $result1['name'];?></option>n <?php } ?>
    
  </select>
  <select  name="course">
    <option >Course Name</option>
    <?php while ($result2=mysqli_fetch_assoc($execute3)) {?>
    
        <option value=  <?php echo $result2['course_id']; ?>   ><?php echo $result2['course_name'];?></option>n <?php } ?>
    
  </select>
  <button class="btn btn-primary btn-block" type="submit" name="cte" style="background-color: rgb(75,43,142);">Add</button>
  <button type="submit" name="cter" class="btn btn-danger" style="background-color: red; ">Remove</button></div> </form>
</form>
</form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <script src="assets2/js/jquery.min.js"></script>
    <script src="assets2/bootstrap/js/bootstrap.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-easing/1.4.1/jquery.easing.min.js"></script>
    <script src="assets2/js/stylish-portfolio.js"></script>
</body>

</html>