<html>
    <head>
    <title>details</title>
        <style type="text/css">
            body{
                background-color: black;
            }
        #tic{
            color:#802b00;
            font-size: 15px;
            margin-left:50px;
            margin-right:550px;
            margin-top: 10px;
            text-transform:uppercase;
            background-color: mintcream;
            padding-left:40px;
            padding-bottom:40px;
            border-radius: 50px;
            border-style: dotted;
            border-color:#1a0900;
            }
            #top{
                 background-color:#e6e6ff;
				font-family:georgia;
				color:#000080;
               text-align: center;  
                 margin-right:200px;
				margin-left:200px;
				border-radius:15px;
                text-shadow: 2px 2px 5px #ff4dff;
            }
        
        </style>
    </head>
    
    
    <body>
<?php

    session_start();   
        
        $uid=$_SESSION['userid'];
        
         $u_name=$_SESSION['u_name'];
        
 $link= mysqli_connect("localhost", "root","","pvg");
    
    if (mysqli_connect_error()) {
        
       die ("there was an error connecting to database");
        
    } 
        echo "<div id=top>";
                echo "<h1>BOOKING DETAILS:</h1>";
            echo "</div>";
       
     
              
           $query= "SELECT * FROM `booking` WHERE `travelled`=1 AND `u_id`='$uid'"; 
        
        $result= mysqli_query($link, $query);
        
        while( $row = mysqli_fetch_assoc($result)  ) {
            
        $pack_id=$row["pack_id"];
        
            //echo $pack_id;
            
        $query2="SELECT * FROM `package`,`travel_agency` WHERE `p_id`='$pack_id' AND `agency_id`=`t_id`";
        
        $result2 = mysqli_query($link, $query2);
        
         $row2 = mysqli_fetch_assoc($result2); 
        echo"<div id=tic>";
        echo "<h1 id=head>ONLINE tours and travels TICKET:</h1>";
        
             echo"<p>Ticket no:<u>".$row['ticket_no'].'</u></p>';
        echo"<p>Name:<u>".$u_name.'</u> &emsp;&emsp;&emsp;';
            echo"agency name:<u>".$row2['name'].'</u></p>';
            echo"<p>mode of travel:<u>".$row2['mode'].'</u></p>';
            echo"<p>source:<u>".$row2['from'].'</u> &emsp;&emsp;&emsp;';
            echo"destination:<u>".$row2['to'].'</u></p>';
            echo"<p>date&time:<u>".$row2['date&time'].'</u>&emsp;&emsp;&emsp;';
            echo"No. of passengers:<u>".$row['no_pass'].'</u></p>';
            echo"<p>Total amount:<u>".$row['total'].'&nbsp;rupees only</u></p>';
            echo "<p><center>happy journey!!!</center></p>";
            //echo '<a href="cancel.php?ticket_no='.$row['ticket_no'].'">DELETE</a>';
            echo "</div>";
           
         }
       
       $query1= "SELECT * FROM `booking` WHERE `travelled`=0 AND `u_id`='$uid'"; 
        
        $result1 = mysqli_query($link, $query1);
        
        while( $row1 = mysqli_fetch_assoc($result1)  ) {
            
        $pack_id=$row1["pack_id"];
        
            //echo $pack_id;
            
        $query2="SELECT * FROM `package`,`travel_agency` WHERE `p_id`='$pack_id' AND `agency_id`=`t_id`";
        
        $result2 = mysqli_query($link, $query2);
        
         $row2 = mysqli_fetch_assoc($result2); 
        echo"<div id=tic>";
        echo "<h1 id=head>ONLINE tours and travels TICKET:</h1>";
        
             echo"<p>Ticket no:<u>".$row1['ticket_no'].'</u></p>';
        echo"<p>Name:<u>".$u_name.'</u> &emsp;&emsp;&emsp;';
            echo"agency name:<u>".$row2['name'].'</u></p>';
            echo"<p>mode of travel:<u>".$row2['mode'].'</u></p>';
            echo"<p>source:<u>".$row2['from'].'</u> &emsp;&emsp;&emsp;';
            echo"destination:<u>".$row2['to'].'</u></p>';
            echo"<p>date&time:<u>".$row2['date&time'].'</u>&emsp;&emsp;&emsp;';
            echo"No. of passengers:<u>".$row1['no_pass'].'</u></p>';
            echo"<p>Total amount:<u>".$row1['total'].'&nbsp;rupees only</u></p>';
            echo "<p><center>happy journey!!!</center></p>";
            echo '<a href="cancel.php?ticket_no='.$row1['ticket_no'].'">DELETE</a>';
            echo "</div>";
           
         }
           
            
         
    
    
   ?>
    </body>
    
</html>