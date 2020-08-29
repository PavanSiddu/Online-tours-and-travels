<?php

 $link= mysqli_connect("localhost", "root","","pvg");
    
    if (mysqli_connect_error()) {
        
       die ("there was an error connecting to database");
        
    }

    if(array_key_exists("name",$_POST) OR array_key_exists("id",$_POST) OR array_key_exists("pass",$_POST) ){
        
        if ($_POST['name'] == '') {
            
            echo "<p>name is required.</p>";
            
        } else if ($_POST['pass'] == '') {
            
            echo "<p>Password is required.</p>";
            
        }else if ($_POST['id'] == '') {
            
            echo "<p>id is required.</p>";
        }
        else {
            
            $query = "SELECT `a_id` FROM `admin` WHERE a_name = '".mysqli_real_escape_string($link, $_POST['name'])."' AND a_pass='".mysqli_real_escape_string($link, $_POST['pass'])."'";
            
            $result = mysqli_query($link, $query);
            
            if (mysqli_num_rows($result) > 0) {
                
                 header('location:query.php');
                
            } else {
                
                if (mysqli_query($link, $query)) {
                    
                    echo "<h1>either name  or password is incorrect </h1>";
                    
                } else {
                    
                    echo "<p>There was a problem signing you up - please try again later.</p>";
                    
                }
                
            }
        
    }
    }

?>

<!doctype html>
<html>
<head>
    <title>admin</title>
    <style type="text/css">
         body {
        background-image: url(admin.jpg);
		background-repeat: no-repeat;
		background-position: center;
		background-size: cover;
		width: 100%;
		height: 100%;
        margin: 0;
        padding: 0;
        font-family: "Open Sans", "Helvetica Neue", Helvetica, Arial, sans-serif; 
    }
        #login{
            float:left;
            width: 300px;
            height:auto;
        margin: 5em auto;
        padding: 50px;
        background-color:#ccffe6;
        border-radius: 1em;
    }
    
    </style>    
</head>

<body>
    <div id="login">
        <form method="post">
    <p > Admin Name : <input type="text" name="name" required ></p>
         <p > Admin id : <input type="number" name="id" required ></p>
	<p > Password :   <input type="password" name="pass" required></p>
	<p><button id="log">login</button></p>
            </form>
    </div>

        
        
	<script type="text/javascript">
	 document.getElementById("log").onclick= function() {
	
	window.location.href = "home.html";
        }
	
	</script>

</body>
</html>
