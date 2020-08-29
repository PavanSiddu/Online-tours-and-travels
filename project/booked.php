<?php

 session_start();
    $userid= $_SESSION['userid'];
    $u_name=$_SESSION['u_name'];

$link= mysqli_connect("localhost", "root","","pvg");
    
    if (mysqli_connect_error()) {
        
       die ("there was an error connecting to database");
        
    }
    
    if(isset($_POST)) {
        
        echo $_POST['pack_id'];
        echo $_POST['cust'];
        echo $_POST['tcost'];
        echo $_POST['card'];
        echo $u_name;
        echo $userid;
    }
        
 ?>