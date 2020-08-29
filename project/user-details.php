<?php
    session_start();
 $link= mysqli_connect("localhost", "root","","pvg");
    
    if (mysqli_connect_error()) {
        
       die ("there was an error connecting to database");
        
    }

    if(array_key_exists("mail",$_POST) OR array_key_exists("password",$_POST)  OR array_key_exists("name",$_POST) OR array_key_exists("phno",$_POST) ){
            
         if ($_POST['name'] == '') {
            
            echo "<p>name is required.</p>";
            
         } else if ($_POST['phno'] == '') {
            
            echo "<p>phone number is required.</p>";
        
         } else if ($_POST['mail'] == '') {
            
            echo "<p>mail address is required.</p>";
            
        } else if ($_POST['password'] == '') {
            
            echo "<p>Password is required.</p>";
             
        } else if ($_POST['con-pwd'] == '') {
            
            echo "<p>confirm Password is required.</p>";
             
         } else if ($_POST['password'] != $_POST['con-pwd']) {
             
             echo "<p style='color:red;text-align:center;font-family:cursive;background-color:yellow;margin-left:500px;margin-right:500px;'>password do not match!! Try again</p>";
            
        } else {
            
            $query = "SELECT `id` FROM `user` WHERE mail = '".mysqli_real_escape_string($link, $_POST['mail'])."'";
            
            $result = mysqli_query($link, $query);
            
            if (mysqli_num_rows($result) > 0) {
                
                echo "<p style='color:red;text-align:center;font-family:cursive;background-color:yellow;margin-left:500px;margin-right:500px;'><b>That email address has already been taken.<b></p>";
                
            } else {
                
                $query2 = "INSERT INTO `user` (`mail`, `password`,`name`,`phone`) VALUES ('".mysqli_real_escape_string($link, $_POST['mail'])."', '".mysqli_real_escape_string($link, $_POST['password'])."','".mysqli_real_escape_string($link, $_POST['name'])."','".mysqli_real_escape_string($link, $_POST['phno'])."')";
                
                if (mysqli_query($link, $query2)) {
                    
                    header('location:login.php');
                    
                } else {
                    
                    echo "<p style='color:red;text-align:center;font-family:cursive;background-color:yellow;margin-left:500px;margin-right:500px;'>There was a problem signing you up - please try again later.</p>";
                    
                }
                
            }
        
    }
    }

?>
<html>
<head>
    <title>user deatails</title>

       <style type="text/css">
    body {
            
        background-color: black;
           
           }
           #head{
               background-color:white;
				font-family:cursive;
				color:brown;
               text-align: center;  
           }   
           #user{
               background-color:greenyellow;
				font-family:sans-serif;
				color:darkblue;
               margin-right:40px;
				margin-left:40px;
				border-radius:15px;
               text-align: center;  
               text-shadow: 2px 2px 5px #ff4dff;
           }   
           
        #class{
            font-family: monospace;
            color:white;
            margin-left: 100px;
            margin-top: 60px;
            font-size: 20px;
            }
           
           .box{
               width: 300px;
               height: 30px;
               
            }
           #img{
              float:right;
               margin-top: 30px;
               margin-right: 100px;
           }
           #bord{
               border-style: solid;
               border-color: azure;
               margin-left: 50px;
               margin-right: 50px;
               border-radius: 20px;
           }
    </style>    
</head>

<body>
	<div id="head">
    <h1>ONLINE TOURS AND TRAVELS</h1>
    </div>
    <div id="user">
    <h1>USER DETAILS:</h1>
    </div>
    <div id="bord">
    <div id="img">
            <img src="user.jpg" width="550px" height="410px">
        </div>
     <div id="class">
    <form method="post" action="user-details.php">
        
            <p>USER NAME:
            <br><input type="text" name ="name" class="box" placeholder="user name" required> </p> 
           <p>  USER PHONE-NO.:
           <br> <input type="int" name ="phno" class="box" placeholder="user ph no." required> </p>

          <p>USER'S MAIL ID:
          <br> <input type="text" name ="mail" class="box" placeholder="user mailID" required>  </p>
        
          <p>ENTER PASSWORD:
            <br> <input type="password" name= "password" class="box" placeholder="password" required></p>
            
           <p>CONFIRM PASSWORD:
             <br> <input type="password" name= "con-pwd" class="box" placeholder="confirm password" required></p>
            
         <p><input type="submit" value="signup" name ="signup"></p>     
       
 </form>
          </div>
        </div>
    
   
</body>
</html>
