
<?php

    session_start();

 $link= mysqli_connect("localhost", "root","","pvg");
    
    if (mysqli_connect_error()) {
        
       die ("there was an error connecting to database");
        
    }

    if(array_key_exists("pid",$_POST)) {
    
    $query = "SELECT * FROM `booking`,`user` WHERE booking.`u_id`=user.`u_id` AND `pack_id`='".mysqli_real_escape_string($link, $_POST['pid'])."'";

    $result =  mysqli_query($link, $query);
        
        echo" <h1>PASSENGERS DETAILS:</h1>";
            echo"<table border='1' >";
             echo "<tr>
    <th>NAME</th>
    <th>MAIL ID</th>
    <th>PHONE NO.</th>
    <th>NO. OF PASSENGERS</th>
  </tr>";
        
           while($row = mysqli_fetch_assoc($result)) {
        echo"<tr>";
        echo"<td>{$row['name']}</td><td>{$row['mail']}</td><td>{$row['phone']}</td><td>{$row['no_pass']}</td>";
        echo"</tr>";
    }
            
             echo "</table>";
 
        
    }
        
?>
<html>
<head>
    <title>query</title>
     <style type="text/css">
    body {
        
		background-repeat: no-repeat;
		background-position: center;
		background-size: cover;
		width: 100%;
		height: 100%;
        margin: 0;
        padding: 0;
        font-family: "Open Sans", "Helvetica Neue", Helvetica, Arial, sans-serif; 
    }
        .log{
            width: 300px;
            height:200px;
         margin:100px 80px 0px 0px;
        padding: 10px 10px 10px 20px;
        background-color:black;
        border-radius: 1em;
        opacity: 0.7;
            float:right;
    }
        
          table {
    border-collapse: collapse;
    width: 60%;
            margin-left: 30px;
}

 td {
    text-align: left;
    padding: 8px;
    font-size: 20px;
}

tr:nth-child(even){background-color: #ffd1b3}
tr:nth-child(odd){background-color: #ff8533}

th {
    background-color:orangered;
    color: white;
     text-align: left;
    padding: 8px;
}
        
    </style>    
</head>
    

 <body>

     <div class="log">
         <h1  style="color:red; font-family:cursive;">AGENCY PAGE:</h1>
     <form method="post" action="passenger.php">
          <p  style="color:white;">enter the id of package:</p>
        <p> <input type="text" name="pid"> 
            <button class="log1" name="but">submit</button></p>
         <p><input type="button" value="GO TO HOME" id="hom"></p>
         </form>
     
     </div>
     
     <script type="text/javascript">
        
        document.getElementById("hom").onclick= function() {
	
	window.location.href = "home.php";
        }
	
	
	</script>

    </body>

</html>