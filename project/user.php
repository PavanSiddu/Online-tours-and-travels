

<!doctype html>
<html>
<head>
    <title>home page</title>
    <style type="text/css">
        body{
            background-color:#33334d;
        }
			#scroll{
				 background-color:#e6e6ff;
				font-family:georgia;
				color:#000080;
               text-align: center;  
                 margin-right:200px;
				margin-left:200px;
				border-radius:15px;
                text-shadow: 2px 2px 5px #ff4dff;
			}
        a{
            color:#e0e0eb;
        }
        #para{
            font-family:sans-serif;
            font-size: 20px;
            margin: 10px;
            padding-right: 700px;
            color:aliceblue;
        }
        #link{
            float:right;
            color:#e0e0eb;
        }
        #img{
            position:relative;
            left:800px;
            bottom:630px;
        }
        select{
            background-color:#e6e6ff;
            border-radius: 20px;
        }
        .cus{
            font-family: cursive;
        }
            
    </style>    
</head>

<body>
		<div id="scroll">
		<h1>ONLINE TOURS & TRAVELS</h1>
		</div>
    <?php
session_start();
    echo "<h1 style='color:#e6e6ff;text-align:center;text-transform:uppercase;font-family:cursive;'>WELCOME"."&emsp;";
     echo $_SESSION['u_name']."&emsp;"."!!!";   
       echo "</h1>";
?>

        <div id="link">
      <a href="package.php" style="padding: 15px;"><b>SEARCH PACKAGE</b></a>
      <a href="details.php" style="padding: 15px;"><b>BOOKING DETAILS</b></a>
            <a href="tr-details.php" style="padding: 15px;"><b>TRAVEL AGENCY DETAILS</b></a>
        </div>
    
    
    <div id="para">
    <br><b><u>INTRODUCTION:</u></b><br><br>
        <div class="cus">
        The Tours and Travel Management System is a web based application. The main purpose of “Online Tours and travels ” is to provide a convenient way for a customer to book  flight, train and bus for tour purposes. The objective of this project is to develop a system that automates the processes and activities of a travel agency. In this project, we will make an easier task of searching places and for booking train, flight or bus. . In the present system a user has to approach various admin to find details of places and to book tickets. We provide approach skills to critically examine how a tourist visits and its ability to operate in an appropriate way when dealing with the consequences of tourism, locally, regionally, and nationally including visitor security and ecological influences. It is important for a customer to plan a particular journey and have it executed properly. The project ‘Tours and Travels Management System’ is developed to replace the currently existing system, which helps in keeping records of the customer details of destination as well as payment received.
            </div>
            <p></p><br><b><u>OBJECTIVES:</u></b><br><br>
        <div class="cus">
        objective of the Travel and Tourism Management System project is to develop a system that automates the processes and activities of a travel and the purpose is to design a system using which one can perform all operations related to traveling.
            </div>
    </div>
    
       <div id="img">
         <p></p>
           <p> <img src="home2.jpg" width="580px" height="530px" style="margin: 20px"></p>
    
    </div>
    
</body>
</html>
