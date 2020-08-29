
<?php

        
 $link= mysqli_connect("localhost", "root","","pvg");
    
    if (mysqli_connect_error()) {
        
       die ("there was an error connecting to database");
        
    }
    
    $query = "CALL travel_det();";
            
            $result = mysqli_query($link, $query);
    
            echo" <h1>TRAVEL AGENCIES DETAILS</h1>";
            echo"<div class='container'><table class='table table-striped'>";
             echo "<thead class='thead-dark'><tr>
    <th>AGENCY ID</th>
    <th>NAME</th>
    <th>PHONE NUMBER</th>
    <th>ADDRESS</th>
  </tr></thead><tbody>";
            
    while($row = mysqli_fetch_assoc($result)) {
        
        echo"<tr><td>{$row['t_id']}</td><td>{$row['name']}</td><td>{$row['phone']}</td><td>{$row['address']}</td></tr>";
    }
echo "</tbody></div>"
        
?>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

<style type="text/css">
   body {
        background-color:#fff2e6;
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
/*table {
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
}*/

</style>