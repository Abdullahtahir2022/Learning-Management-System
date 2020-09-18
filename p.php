<?php

$name=$_POST['name'];
$address=$_POST['address'];
$city=$_POST['city'];
$country=$_POST['country'];
$av= $_FILES['avatar-file']['name'];


$temp=$_FILES['avatar-file']['tmp_name'];
$folder='IMAGES/';
$des=$folder.$av;
move_uploaded_file($temp, $folder.$av);




if(!empty($av) || !empty($name) || !empty($address) || !empty($city) || !empty($country)){
session_start();
$id=$_SESSION['id'];
$role=$_SESSION['role'];




    $host='localhost';
    $dbUsername='root';
    $dbpassword='';
    $dbname='project';
    // creating connection
    $conn = new mysqli($host,$dbUsername,$dbpassword,$dbname) or die("Connect failed: %s\n". $conn -> error);

   
        //$city_no="select city_no from city where name=$city";
        $country_no="select country_no from country where name='$country'";
        $city_no="select city_no from city where name='$city'";
        $execute=mysqli_query($conn, $country_no);
        $execute1=mysqli_query($conn, $city_no);
        $result = mysqli_fetch_assoc($execute);
        $result1 = mysqli_fetch_assoc($execute1);

       
    
        $INSERT = "INSERT INTO image values(?,?)";
        $stmt=$conn->prepare($INSERT);
        $stmt->bind_param("is",$id,$des);
        $stmt->execute();
        echo"new record";
        $stmt->close();



$query="select name from role where role_id='$role'";
        $execute=mysqli_query($conn, $query);
        $result3 = mysqli_fetch_assoc($execute);








  if($result3['name']=='Teacher' || $result3['name']=='teacher')

  {
        $INSERT = "INSERT INTO teacher(teacher_id,name,email,city_no,country_no) values(?,?,?,?,?)";
        $stmt=$conn->prepare($INSERT);
        $stmt->bind_param("issii",$id,$name,$address,$result1['city_no'],$result['country_no']);
        $stmt->execute();
        echo"new record";
        $stmt->close();


    
        header("Location: dashboard.php");


  }
if($result3['name']=='student' || $result3['name']=='Student'){

        $INSERT = "INSERT INTO student(student_id,name,email,city_no,country_no) values(?,?,?,?,?)";
        $stmt=$conn->prepare($INSERT);
        $stmt->bind_param("issii",$id,$name,$address,$result1['city_no'],$result['country_no']);
        $stmt->execute();
        echo"new record";
        $stmt->close();


    
        header("Location: dashboard.php");}

}
else {
    echo "<div class='alert alert-success'>
                                        Fields Required!!
                                         </div>";
    die();

}

?>



