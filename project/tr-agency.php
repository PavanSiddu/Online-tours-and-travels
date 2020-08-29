<?php

 $link= mysqli_connect("localhost", "root","","pvg");
    
    if (mysqli_connect_error()) {
        
       die ("there was an error connecting to database");
        
    }

    if(array_key_exists("name",$_POST) OR array_key_exists("phone",$_POST)  OR array_key_exists("address",$_POST)  ){
            
         if ($_POST['name'] == '') {
            
            echo "<p>name is required.</p>";
            
         } else if ($_POST['phone'] == '') {
            
            echo "<p>phone number is required.</p>";
        
         } else if ($_POST['address'] == '') {
            
            echo "<p>mail address is required.</p>";
            
        } else {
                
                $query = "INSERT INTO `travel_agency` (`name`, `phone`,`address`,`t_mail`,`t_password`) VALUES ('".mysqli_real_escape_string($link, $_POST['name'])."', '".mysqli_real_escape_string($link, $_POST['phone'])."','".mysqli_real_escape_string($link, $_POST['address'])."','".mysqli_real_escape_string($link, $_POST['mailid'])."','".mysqli_real_escape_string($link, $_POST['t_pass'])."')";
                
                if (mysqli_query($link, $query)) {
                    echo '<script>alert("successfully added.");</script>';
                     
                    header('location:home.php');
                    
                } else {
                    
                    echo "<p>There was a problem adding you up - please try again later.</p>";
                    
                }
                
            }
        
    }

?>
<!doctype html>
<html>
<head>
    <title>Travel agency</title>

       <style type="text/css">
           body {
        background-image: url(tr.jpg);
		background-repeat: no-repeat;
		background-position: center;
		background-size: cover;
		width: 100%;
		height: 100%;
        margin: 0;
        padding: 0;
        font-family: "Open Sans", "Helvetica Neue", Helvetica, Arial, sans-serif; 
    }
   
        #detail{
            width: 500px;
            height:auto;
        margin: 5.6em auto;
        padding: 50px;
        background-color:#ffffb3;
        border-radius: 1em;
    }
            .box{
               width: 300px;
               height: 30px;
               
            }
    </style>    
</head>

<body>
    <h1 align="center" style="font-family:platino;color:darkbrown;text-shadow: 2px 2px 5px #800080;"><b>WELCOME TO ONLINE TOURS AND TRAVELS</b></h1>
    <form method="post">
    <div id="detail">   
    <h1 ><b>TRAVEL AGENCY DETAILS:</b></h1>
    <p>Travel agency Name: <br><input type="text"  placeholder="travel-agency name" name="name" class="box" required></p>
	<p>Phone Number   :<br> <input type="text" placeholder="enter 10 digit number" name="phone"  class="box" required></p>
    <p>Mail id:<br><input type="text" placeholder="mail id" name="mailid"  class="box" required></p>  
      <p>Password:<br><input type="password" placeholder="password" name="t_pass"  class="box" required></p>   
    <p> Address : <br> <input type="text" placeholder="enter your permanent address"  class="box" name="address" required> </p>
	<p><input type="submit" value="login" name="add"></p><br>
    </div>
    </form>
    
    
    
	<script type="text/javascript">
         document.getElementById("add").onclick= function() {
	
	window.location.href = "home.html";
             alert("Successfully added");
        }
	
	
	</script>

</body>
</html>
