<?php
    session_start();

 $link= mysqli_connect("localhost", "root","","pvg");
    
    if (mysqli_connect_error()) {
        
       die ("there was an error connecting to database");
        
    }
    if(array_key_exists("mail",$_POST) OR array_key_exists("password",$_POST) ){
        
        if ($_POST['mail'] == '') {
            
            echo "<script type='text/javascript'>alert('mail address is required.');</script>";
            
        } else if ($_POST['password'] == '') {
            
            echo "<script type='text/javascript'>alert('password is required.');</script>";
            
        } else {
            
            $query = "SELECT `u_id`,`name` FROM `user` WHERE mail = '".mysqli_real_escape_string($link, $_POST['mail'])."' AND password ='".mysqli_real_escape_string($link, $_POST['password'])."'";
            
            $result = mysqli_query($link, $query);
            $row=mysqli_fetch_assoc($result);
            $_SESSION['u_name']=$row['name'];
             $_SESSION['userid']=$row['u_id'];
            
            if (mysqli_num_rows($result) > 0) {
                
                 header('location:user.php');
                
            } else {
                
                if (mysqli_query($link, $query)) {
                    
                    echo "<p style='color:red;text-align:center;font-family:cursive;background-color:yellow;margin-left:450px;margin-right:450px;border-radius:20px;'>either mail address or password is incorrect </p>";
                    
                } else {
                    
                    echo "<pstyle='color:red;text-align:center;font-family:cursive;background-color:yellow;margin-left:450px;margin-right:450px;border-radius:20px;'>There was a problem signing you up - please try again later.</p>";
                    
                }
                
            }
        
    }
    }

?>


<html>
<head>
    <title>login</title>
    <style type="text/css">
    body {
        background-image: url(tours.jpg);
		background-repeat: no-repeat;
		background-position: center;
		background-size: cover;
		width: 100%;
		height: 100%;
        margin: 0;
        padding: 0;
        font-family: "Open Sans", "Helvetica Neue", Helvetica, Arial, sans-serif; 
    }
        .login{
            width: 400px;
            height:auto;
        margin: 5em auto;
        padding: 50px;
        background-color:black;
        border-radius: 1em;
        opacity: 0.8;
    }
        .login:hover{
            opacity:1;
        }
        .box{
               width: 300px;
               height: 30px;
               
            }
         #class{
            font-family: monospace;
            color:white;
            font-size: 20px;
            }
        .button{
            background-color: greenyellow;
            width:100px;
            height:30px;
            border-radius: 20px;
            font-size: 15px;
        }
        a{
            color:#e0e0eb;
            text-decoration: none;
        }
    </style>    
</head>


 <body>
<div>
    <h1 align ="center" style="font-size: 400%;font-family:georgia;text-shadow: 2px 2px 5px red;" >ONLINE TOURS AND TRAVELS</h1>
    <h1 align="center" style="font-family: inherit; font-size: 300%;font-family:platino;text-shadow: 0 0 3px #FF0000, 0 0 5px #0000FF;padding-left:70px;" >LET US MAKE YOUR WAY EASY</h1>
</div>
    
   
        <div class="login">
             <form method="post" action="login.php">
        <table>
        <div id="class">
            <p style="color:red;font-family:georgia;text-shadow: 2px 2px 5px ;">LOGIN FORM:</p>
           <p> MAIL ID:<br>
        <input type="text" name ="mail" class="box" placeholder="mail id" required> </p>  
           <p> PASSWORD:<br>
         <input type="password" name= "password" class="box" placeholder="password" required></p>
        
            <p> <input type="submit" value="LOGIN" name ="login" class="button"></p>   
        </div>
        </table>
       </form>
            <p></p>
            <p><a href="user-details.php" align="center"><b>SIGN UP......</b></a></p>
        </div>
    </body>

</html>
 