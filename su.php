<?php
$id= $_POST['id'];
$password=$_POST['password'];
$role=$_POST['optradio'];




if(!empty($password) || !empty($id)){

    $host='localhost';
    $dbUsername='root';
    $dbpassword='';
    $dbname='project';
    // creating connection
    $conn = new mysqli($host,$dbUsername,$dbpassword,$dbname) or die("Connect failed: %s\n". $conn -> error);

        $SELECT="SELECT password from account_details where id= $id";
        $execute=mysqli_query($conn, $SELECT);
        $result=mysqli_fetch_assoc($execute);



        if($result['password']!='NULL')
            {echo "You Already have an account";
            }


    
            else {


    $SELECT="SELECT id from account_details where id= ?";
        $stmt=$conn->prepare($SELECT);
        $stmt->bind_param("i",$id);
        $stmt->execute();
        $stmt->bind_result($id);
        $stmt->store_result();
        $rnum=$stmt->num_rows;

        if($rnum==0)
            {echo "<div class='alert alert-success'>
                                        Invalid Identity!
                                         </div>";
            $stmt->close();}



        

        $SELECT="SELECT role from account_details where id= $id";
        $execute=mysqli_query($conn, $SELECT);
        $result=mysqli_fetch_assoc($execute);      

        
        if($result['role']!=$role)
            {echo "Invalid Identity";
            }

        
    


        else {





        if($password==null){echo "Empty Password";}

        else{


        $SELECT="UPDATE account_details SET password = $password WHERE id=$id";
        $insertResult=$conn->query($SELECT);


       

        session_start();
		$_SESSION['id'] = $id;
        $_SESSION['role']=$role;
        header("Location: personal.php"); }

        }
    


}}
else {
    echo "<div class='alert alert-success'>
                                        Fields Required!!
                                         </div>";
    die();

}

?>



