<?php
 session_start();
$id=$_SESSION['id'];
 $link= mysqli_connect("localhost", "root","","pvg");
    
    if (mysqli_connect_error()) {
        
       die ("there was an error connecting to database");
        
    }
if(array_key_exists("aname",$_POST) OR array_key_exists("mode",$_POST)  OR array_key_exists("src",$_POST) OR array_key_exists("dest",$_POST) ){

          $query2 = "INSERT INTO `package` (`mode`, `from`,`to`,`amount`,`date&time`,`agency_id`) VALUES ('".mysqli_real_escape_string($link, $_POST['mode'])."', '".mysqli_real_escape_string($link, $_POST['src'])."','".mysqli_real_escape_string($link, $_POST['dest'])."','".mysqli_real_escape_string($link, $_POST['amt'])."','".mysqli_real_escape_string($link, date($_POST['dt']))."','$id')";
    if (mysqli_query($link, $query2)) {
                   echo "<script>
                    alert('added successfully');
                        window.location.href='add_pack.php';
                            </script>";
                    
                } 
}
?>
<html>
<head>
    <title>add package</title>

       <style type="text/css">
           body{
               background-color: #2e004d;
           }
     #head{
               background-color:white;
				font-family:cursive;
				color:brown;
               text-align: center;  
                margin:0px 30px 0px 30px;
                border-radius: 30px;
           }   
           #user{
               background-color:#80ffff;
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
            #img{
              float:right;
               margin-top: 30px;
               margin-right: 100px;
           }
           #s{
               color:white;
           }
    </style>    
</head>

<body>
	<div id="head">
    <h1>ONLINE TOURS AND TRAVELS</h1>
    </div>
    <div id="user">
    <h1>ADD PACKAGE:</h1>
    </div>
    <div id="img">
            <img src="pack1.gif" width="950px" height="350px">
        </div>
    
     <div id="class">
    <form method="post" action="add_pack.php">
        <?php
        echo "<div id=s>";
        echo "<p>YOUR AGENCY ID IS:";
        echo $_SESSION['id'];
        echo "</p>";
        echo "</div>";
        
        ?>
            
      <p>  ENTER MODE OF TRAVEL:
           <br> <input type="text" name ="mode" class="box" placeholder="bus,train,aeroplane" required> </p>

          <p>ENTER SOURCE:
          <br> <input type="text" name ="src" class="box" placeholder="source" required>  </p>
        
          <p>ENTER DESTINATION:
            <br> <input type="text" name= "dest" class="box" placeholder="destination" required></p>
            
           <p>ENTER AMOUNT FOR JOURNEY:
             <br> <input type="text" name= "amt" class="box" placeholder="cost of travel" required></p>
        <p>ENTER DATE & TIME:
             <br> <input type="text" name= "dt" class="box" placeholder="yyyy-mm-dd hh:mm:ss" required></p>
            
         <p><input type="submit" value="add" ></p>     
       
 </form>
          
        </div>
    
   
</body>
</html>
