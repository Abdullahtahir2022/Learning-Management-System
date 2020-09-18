<?php

$id= $_POST['id'];
$password=$_POST['password'];




if(!empty($id)){
    if($password==null){echo "<div class='alert alert-success'>
                                        Empty Password!!
                                         </div>";}
    else{

    $host='localhost';
    $dbUsername='root';
    $dbpassword='';
    $dbname='project';
    // creating connection
    $conn = new mysqli($host,$dbUsername,$dbpassword,$dbname) or die("Connect failed: %s\n". $conn -> error);

    $SELECT="SELECT id from account_details where id= ?";
        $stmt=$conn->prepare($SELECT);
        $stmt->bind_param("i",$id);
        $stmt->execute();
        $stmt->bind_result($id);
        $stmt->store_result();
        $rnum=$stmt->num_rows;

        if($rnum==0)
            {echo "<div class='alert alert-success'>
                                        Account not Found!!
                                         </div>";
            $stmt->close();}


    

        $SELECT="SELECT password from account_details where id= $id";
        $execute=mysqli_query($conn, $SELECT);
        $result=mysqli_fetch_assoc($execute);



        if($result['password']=='NULL')
            {echo "<div class='alert alert-success'>
                                       Get your Account Registered!!
                                         </div>";;
            }

        else
            {
        $SELECT="SELECT id from account_details where password= ? and id='$id'";
        $stmt=$conn->prepare($SELECT);
        $stmt->bind_param("i",$password);
        $stmt->execute();
        $stmt->bind_result($password);
        $stmt->store_result();
        $rnum=$stmt->num_rows;
        if($rnum==0)
            {echo "<div class='alert alert-success'>
                                        Incorrect Password!!
                                         </div>";


                                     }


            else

            {


        $SELECT="SELECT * from student where student_id= ?";
        $stmt=$conn->prepare($SELECT);
        $stmt->bind_param("i",$id);
        $stmt->execute();
        $stmt->bind_result($id);
        $stmt->store_result();
        $rnum=$stmt->num_rows;

        if($rnum>0)
            {$query="select role from student where student_id='$id'";
        $execute=mysqli_query($conn, $query);
        $result = mysqli_fetch_assoc($execute);
         session_start();
        $_SESSION['id'] = $id;
        $_SESSION['role']=$result['role'];
        header("Location: dashboard.php");


        }
        else{
            $query="select role from teacher where teacher_id='$id'";
        $execute=mysqli_query($conn, $query);
        $result = mysqli_fetch_assoc($execute);
         session_start();
        $_SESSION['id'] = $id;
        $_SESSION['role']=$result['role'];
        header("Location: dashboard.php");


        }




        

      



            }






    }
        
}
}

else
{

   echo "<div class='alert alert-success'>
                                        Fields Required!!
                                         </div>";
    die();
}

?>
