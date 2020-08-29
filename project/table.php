<html>
    <head> <title>table</title>
    
    <style type="text/css">
   body {
        background-color:#e6e6e6;
    }
table {
    border-collapse: collapse;
    width: 100%;
}

 td {
    text-align: left;
    padding: 8px;
    font-size: 20px;
}

tr:nth-child(even){background-color: #b3c6ff}
tr:nth-child(odd){background-color:  #668cff}

th {
    background-color:#0039e6;
    color: white;
     text-align: left;
    padding: 8px;
}
    h1{
        background-color: #99c2ff;
				font-family:georgia;
				color:darkblue;
               margin-right:40px;
				margin-left:40px;
				border-radius:15px;
               text-align: center;
                text-shadow: 3px 3px 7px #00ffff;
    }


</style>
    
    </head>
    
    <body>
        <div>
<?php

session_start();
            
        
        
 $link= mysqli_connect("localhost", "root","","pvg");
    
    if (mysqli_connect_error()) {
        
       die ("there was an error connecting to database");
        
    } if(array_key_exists("from",$_POST) OR array_key_exists("to",$_POST) ){
            
         if ($_POST['from'] == '') {
            
            
             header('location:package.html');
           
            
         } else if ($_POST['to'] == '') {
            
             header('location:package.html');
        
         } else if ($_POST['date'] == '') {
            
             header('location:package.html');
    
                    
        } else {
    
    $query = "SELECT  * FROM `package`,`travel_agency` WHERE `from` = '".mysqli_real_escape_string($link, $_POST['from'])."' AND `to` = '".mysqli_real_escape_string($link, $_POST['to'])."' AND `date&time` LIKE '%".mysqli_real_escape_string($link, $_POST['date'])."%' AND `t_id`=`agency_id`" ;
            
            $result = mysqli_query($link, $query);
    
            echo" <h1>AVAILABLE PACKAGES:</h1>";
            echo"<table border='1' >";
             echo "<tr>
    <th>PACKAGE ID</th>
    <th>AMOUNT(in RS.)</th>
    <th>TRAVELING MODE</th>
    <th>FROM</th>
    <th>TO</th>
    <th>DATE & TIME</th>
    <th>AGENCY</th>
    <th>SELECT YOUR OPTION: </th>
  </tr>";
            
    while($row = mysqli_fetch_assoc($result)) {
        echo"<tr>";
        // echo'<td><form action="book.php" ';
        echo"<td>{$row['p_id']}</td><td>{$row['amount']}</td><td>{$row['mode']}</td><td>{$row['from']}</td><td>{$row['to']}</td><td>{$row['date&time']}</td><td>{$row['name']}</td>";
        echo'<td><a href="book.php?bookid='.$row['p_id'].'  & amnt='.$row['amount'].'">submit</a></td>';
        echo"</tr>";
         
        $_SESSION['a']=$row['p_id'];
    }
            
             echo "</table>";
             
         }
    }
       
?>
        </div>
        
        
    </body>
    
</html>