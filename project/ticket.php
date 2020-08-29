<html>
    <head><title>ticket</title>
    <style type="text/css">
        body{
            background-color: black;
        }
        #head{
            text-align: center;
            font-size: 40px;
            font-family: cursive;
            background-color: #e6e6ff;
            margin-right: 100px;
            margin-left: 50px;
            border-radius: 40px;
             text-shadow: 2px 2px 5px #ff4dff;
        }
        #tic{
            color:#802b00;
            font-size: 30px;
            margin-left:100px;
            margin-right:50px;
            margin-top: 100px;
            text-transform:uppercase;
            background-color: mintcream;
            padding-left:40px;
            padding-bottom:40px;
            border-radius: 50px;
            border-style: dotted;
            border-color:#1a0900;
        }
        #p{
            color:white;
            float:right;
            font-size: 20px;
        }
        
        </style>
    
    </head>
    
    
    <body>
<?php

        
 $link= mysqli_connect("localhost", "root","","pvg");
    
    if (mysqli_connect_error()) {
        
       die ("there was an error connecting to database");
        
    } 
        session_start();
        $u_name=$_SESSION['u_name'];
        $query1= "SELECT * FROM `booking` ORDER BY `ticket_no` DESC LIMIT 1 "; 
        
        $result = mysqli_query($link, $query1);
        
         $row = mysqli_fetch_assoc($result);
        
        $pack_id=$row["pack_id"];
        
        $query2="SELECT * FROM `package`,`travel_agency` WHERE `p_id`='$pack_id' AND `agency_id`=`t_id`";
        
        $result2 = mysqli_query($link, $query2);
        
         $row2 = mysqli_fetch_assoc($result2);
        echo"<div id=tic>";
        echo "<h1 id=head>ONLINE tours and travels TICKET:</h1>";
        
        echo"<p>Name:<u>".$u_name.'</u> &emsp;&emsp;&emsp;';
            echo"agency name:<u>".$row2['name'].'</u></p>';
            echo"<p>mode of travel:<u>".$row2['mode'].'</u></p>';
            echo"<p>source:<u>".$row2['from'].'</u> &emsp;&emsp;&emsp;';
            echo"destination:<u>".$row2['to'].'</u></p>';
            echo"<p>date&time:<u>".$row2['date&time'].'</u>&emsp;&emsp;&emsp;';
            echo"No. of passengers:<u>".$row['no_pass'].'</u></p>';
            echo"<p>Total amount:<u>".$row['total'].'&nbsp;rupees only</u></p>';
            echo "<p><center>happy journey!!!</center></p>";
            echo "</div>";
            echo "<p id=p>Take a screenshot of ticket for your refrence</p>"
            
    
   ?>
        <h2><a href="user.php" >return to home page</a></h2>
        
    </body>
    
</html>