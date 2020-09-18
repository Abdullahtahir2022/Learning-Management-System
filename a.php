<?php

    $host='localhost';
    $dbUsername='root';
    $dbpassword='';
    $dbname='project';
    // creating connection
    $conn = new mysqli($host,$dbUsername,$dbpassword,$dbname) or die("Connect failed: %s\n". $conn -> error);

 if (isset($_POST['submit'])){ $id=$_POST['id'];
                                    $p=$_POST['password'];
                                    $role=3;

 $SELECT=$SELECT="SELECT id,password,role from account_details where id=? and password=? and role=?";        
        $stmt=$conn->prepare($SELECT);
        $stmt->bind_param("isi",$id,$p,$role);
        $stmt->execute();
        $stmt->bind_result($id,$p,$role);
        $stmt->store_result();
        $rnum=$stmt->num_rows;

        if($rnum==0)
            {echo "<div class='alert alert-success'>
                                        Invalid!!
                                         </div>";
                                                 
            $stmt->close();}

            else
            { header("Location: admin.php");}

}



    ?>








<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
    <title>Mywork</title>
    <link rel="stylesheet" href="assets/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="assets/css/Dropdown-Login-with-Social-Logins.css">
    <link rel="stylesheet" href="assets/css/dropdown-search-bs4.css">
    <link rel="stylesheet" href="assets/css/Footer-Dark.css">
    <link rel="stylesheet" href="assets/css/Login-Form-Clean.css">
    <link rel="stylesheet" href="assets/css/Navigation-with-Button.css">
    <link rel="stylesheet" href="assets/css/NZSearchFilterClearButton.css">
    <link rel="stylesheet" href="assets/css/Profile-Edit-Form-1.css">
    <link rel="stylesheet" href="assets/css/Profile-Edit-Form.css">
    <link rel="stylesheet" href="assets/css/Projects-Horizontal.css">
    <link rel="stylesheet" href="assets/css/Registration-Form-with-Photo.css">
    <link rel="stylesheet" href="assets/css/styles.css">
</head>

<body>
    <div class="login-clean" style="background-color: rgb(137,100,213);">
        <form method="POST">

            <h2 class="sr-only">Login Form</h2>
            <div class="illustration"><img src="assets/img/Capture.JPG"></div>
            <div class="form-group"><input class="form-control" type="number" name="id" placeholder="Admin ID"></div>
            <div class="checkbox">
 
 
</div>

            <div class="form-group"><input class="form-control" type="password" name="password" placeholder="Admin Password"></div>
            <div class="form-group"><button class="btn btn-primary btn-block" type="submit" name="submit" style="background-color: rgb(75,43,142);">Log In</button></div><a href="Index.html" style="color: rgb(75,43,142);">Home</a></form>
    </div>
    <script src="assets/js/jquery.min.js"></script>
    <script src="assets/bootstrap/js/bootstrap.min.js"></script>
    <script src="assets/js/dropdown-search-bs4.js"></script>
    <script src="assets/js/Profile-Edit-Form.js"></script>



</body>

</html>