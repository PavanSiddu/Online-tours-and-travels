
<?php

    session_start();
    $id=$_SESSION['id'];

 $link= mysqli_connect("localhost", "root","","pvg");
    
    if (mysqli_connect_error()) {
        
       die ("there was an error connecting to database");
        
    }
    $query = "SELECT * FROM `package` WHERE `agency_id` = '$id'";
            
            $result = mysqli_query($link, $query);
    
            echo" <h1>TRAVEL AGENCIES PACKAGE DETAILS</h1>";
            echo"AGENCY ID:".$id;
            echo"<table border='1'>";
             echo "<tr>
    <th>PACKAGE ID</th>
    <th>FROM</th>
    <th>TO</th>
    <th>MODE</th>
    <th>AMOUNT</th>
    <th>DATE & TIME</th>
  </tr>";
            
    while($row = mysqli_fetch_assoc($result)) {
        
        echo"<tr><td>{$row['p_id']}</td><td>{$row['from']}</td><td>{$row['to']}</td><td>{$row['mode']}</td><td>{$row['amount']}</td><td>{$row['date&time']}</td></tr>";
    }
        
?>
<style type="text/css">
   body {
        background-color:#fff2e6;
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

tr:nth-child(even){background-color: #ffd1b3}
tr:nth-child(odd){background-color: #ff8533}

th {
    background-color:orangered;
    color: white;
     text-align: left;
    padding: 8px;
}
    h1{
        background-color:greenyellow;
				font-family:georgia;
				color:darkblue;
               margin-right:40px;
				margin-left:40px;
				border-radius:15px;
               text-align: center;
                text-shadow: 3px 3px 7px #00ffff;
    }


</style>