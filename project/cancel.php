<html>
    
    <body>
        
<?php
        
         session_start();
        
         $ticket_no = $_GET['ticket_no'];
        
        $link= mysqli_connect("localhost", "root","","pvg");
    
    if (mysqli_connect_error()) {
        
       die ("there was an error connecting to database");
        
    }

        $query="delete from `booking` where `ticket_no`=$ticket_no";
           $result = mysqli_query($link, $query);
           if($result)
           {
               echo "ticket has been successfully cancelled";
           }

?>
         </body>
    
</html>