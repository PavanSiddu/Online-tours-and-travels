<?php
    session_start();
   
?>
<!doctype html>
<html>
<head>
    <title>Package</title>

       <style type="text/css">
           body {
        background-image: url(pac.jpg);
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
           
            width: 400px;
            height:auto;
        margin: 5.6em auto;
        padding: 50px;
        background-color:aliceblue;
        border-radius: 1em;
        font-family: arial;
        font-size: 15px    
    }
            .box{
               width: 300px;
               height: 30px;
               
            }
           a{
            color:darkgreen;
               text-decoration: none;
               font-size: 15px;
               font-style:oblique;
        }
    </style>    
</head>

<body>
    
    <h1 align="center" style="font-family: cursive;color: darkblue ;background-color: floralwhite;margin-left: 50px;margin-right: 50px;border-radius: 20px;text-shadow: 2px 2px 5px #66ff66;">PACKAGE SECTION</h1>
        <form action="table.php" method="post">
    <div id="detail">  
        
            <h1 style="text-shadow: 2px 2px 5px #ff4dff;" ><b>Enter The Package You Need:</b></h1>
            
            
       <p> FROM:
          <br><input type="text" name= "from" placeholder="enter source" class="box" required></p>
            
            
          <p>  TO:
            <br><input type="text" name= "to" class="box" placeholder="enter destination" required></p>
            
          <p>  DATE:
           <br> <input type="text" name= "date" class="box" placeholder="yyyy-mm-dd" required>  </p>
            
	        <div id="search">
     <input type="submit" value="search" name ="search">
                        
        </div>
 
    </div>
    </form>

</body>
</html>
