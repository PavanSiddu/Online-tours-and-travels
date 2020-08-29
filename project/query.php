<?php
$link= mysqli_connect("localhost", "root","","pvg");
    
    if (mysqli_connect_error()) {
        
       die ("there was an error connecting to database");
        
    }

    $query = "SELECT  * FROM `travel_agency` WHERE `approval`=0";
            
            $result = mysqli_query($link, $query);

    
           echo"<h1 style=' background-color:#e6e6ff;
				font-family:georgia;
				color:#000080;
               text-align: center;  
                 margin-right:200px;
				margin-left:200px;
				border-radius:15px;
                text-shadow: 2px 2px 5px #ff4dff;'> ONLINE TOURS AND TRAVELS</h1>";
        echo "<h1 style='  background-color:#e6e6ff;
				font-family:sans-serif;
				color:darkblue;
               margin-right:40px;
				margin-left:40px;
				border-radius:15px;
               text-align: center;  
               text-shadow: 2px 2px 5px #ff4dff; '>ADMIN PAGE:</h1>";
            echo" <h1 style='font-family:platino;color:#c2c2f0;'>REQUESTED AGENCIES:</h1>";
            echo"<table border='2' >";
             echo "<tr>
    <th>ID</th>         
    <th>NAME</th>
    <th>PHONE</th>
    <th>ADDRESS</th>
    <th>MAIL</th>
  </tr>";
            
    while($row = mysqli_fetch_assoc($result)) {
        echo"<tr>";
        echo"<td>{$row['t_id']}</td><td>{$row['name']}</td><td>{$row['phone']}</td><td>{$row['address']}</td><td>{$row['t_mail']}</td>";
        echo"</tr>";
    }
           
     if(array_key_exists("taid",$_POST)){
       if ($_POST['taid'] == '') {
            
            echo "travel-agency id is required or";
       }
       
      else{
                $id=$_POST['taid'];
            $query="update `travel_agency` set `approval`=1 where `t_id`=$id";
           $result = mysqli_query($link, $query);
           header('location:query.php');
      }
   }

   if(array_key_exists("uid",$_POST)){
       if ($_POST['uid'] == '') {
            
            echo "user-id is required or";
       }
       
      else{
                $id=$_POST['uid'];
            $query="delete from `user` where `u_id`=$id";
           $result = mysqli_query($link, $query);
           header('location:query.php');
      }
   }
    if(array_key_exists("tid",$_POST)){
       if ($_POST['tid'] == '') {
            
            echo "travel-id is required or";
       }
       
      else{
                $id2=$_POST['tid'];
            $query="delete from `travel_agency` where `t_id`=$id2";
           $result = mysqli_query($link, $query);
           header('location:query.php');
      }
   }
    if(array_key_exists("pid",$_POST)){
       if ($_POST['pid'] == '') {
            
            echo "package-id is required.";
       }
       
      else{
                $id3=$_POST['pid'];
            $query="delete from `package` where `p_id`=$id3";
           $result = mysqli_query($link, $query);
          
           header('location:query.php');
      }
   }
?>







<html>
<head>
    <title>query</title>
     <style type="text/css">
    body{
             background-color: #141452;
         }
        #log{
            background-color: #d6d6f5;
            color:#0a0a29;
            padding: 20px;
            border-radius: 30px;
         float:right;
         margin-right: 100px;
         font-family: georgia;
         text-transform: uppercase;
            
    }
         table {
    border-collapse:separate;
    border-spacing: 2px;
    width:900px;           
}

 td {
    text-align: left;
    padding: 8px;
    font-size: 20px;
}

tr:nth-child(even){background-color: #adadeb}
tr:nth-child(odd){background-color:  #7070db}

th {
    background-color: #4747d1;
    color: white;
     text-align: left;
    padding: 8px;
}
        
    </style>    
</head>
    

 <body>

     <div id="log">
     <form method="post" action="query.php">
          <p >enter the id of tavel agency to approve:</p>
        <p> <input type="text" name="taid"> 
            <button class="log1" name="but">submit</button></p>
         <p>enter the id of user to delete:</p>
        <p> <input type="text" name="uid"> 
            <button class="log1" name="but">submit</button></p>
         <p>enter the id of travel agency to delete:</p>
        <p> <input type="text" name="tid" > 
            <button class="log2" name="but">submit</button></p>
         <p>enter the id of package to delete:</p>
        <p> <input type="text" name="pid" > 
            <button id="log3" name="but">submit</button></p>
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