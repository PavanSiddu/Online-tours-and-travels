<?php
session_start();
$uid=$_SESSION['userid'];
echo $uid;

    if($_GET['bookid']!='') {
        $bookid = $_GET['bookid'];
        $amnt = $_GET['amnt'];
 }
   
     $link= mysqli_connect("localhost", "root","","pvg");
    
    if (mysqli_connect_error()) {
        
       die ("there was an error connecting to database");
        
    }
    
   
    if(array_key_exists("cust",$_POST) OR array_key_exists("tcost",$_POST)){
           
            
                $query= "INSERT INTO `booking` (`u_id`,`pack_id`,`no_pass`,`total`,`card_no`) VALUES ('$uid','".mysqli_real_escape_string($link, $_POST['pack_id'])."','".mysqli_real_escape_string($link, $_POST['cust'])."' ,'".mysqli_real_escape_string($link, $_POST['tcost'])."','".mysqli_real_escape_string($link, $_POST['card'])."')";
                
                if (mysqli_query($link, $query) ) {
                
                    header('location:ticket.php');
                    
                    
                } 
                else {
                    
                    echo "<p>There was a problem signing you up - please try again later.</p>";
                    
                }
                
            }
        
 
    ?>

<!doctype html>
<html>
<head>
    <title>book</title>

       <style type="text/css">
           body{
               background-color:#00004d;
           }
            #user{
				 background-color:#e6e6ff;
                font-size:150%;
				font-family:georgia;
				color:#000080;
               text-align: center;  
                 margin-right:200px;
				margin-left:200px;
				border-radius:15px;
                text-shadow: 2px 2px 5px #ff4dff;
           }   
    .box{
               width: 300px;
               height: 30px;
               
            }
            #class{
            font-family: monospace;
            color:white;
            margin-left: 200px;
            margin-top: 60px;
            font-size: 20px;
            font-family:"platino";
            }
            #img{
              float:right;
               margin-top: 30px;
               margin-right: 200px;
           }
           #card{
               background-color: #ccccff;
               margin-right:1000px;
               padding-left: 20px;
               padding-bottom: 10px;
               border-radius: 20px;
           }
           #h1{
               color:#1a1aff;
               font-style: oblique;
           }
           #button{
            background-color: #9999ff;
            width:100px;
            height:30px;
            border-radius: 20px;
            font-size: 15px;
        }
           
    </style>    
</head>

<body>
    <div id=user>
    <h1>BOOKING DETAILS AND PAYMENTS:</h1>
        </div>
    <div id="img">
            <img src="book1.gif" width="550px" height="410px">
        </div>
    <div id=class>
    <form method="post" action="book.php" >
    <p>PACKAGE ID:<br>
    <input name="pack_id"  value="<?=$bookid?>"></p>
        <p>PRICE PER TICKET<br>
        <input id="price"  value="<?=$amnt?>"> </p>
    <p>ENTER NO. OF CUSTOMER<br>
    <input type="number" name="cust"  placeholder="1" id="cust" value="" onkeyup="calc()" required></p>
    <p>TOTAL AMOUNT <span id="total" name="total">0</span><br> 
        <input type="number" name="tcost" placeholder="enter total amount " required></p>
        <div id="card">
    <p id="h1"><b>ENTER CARD DETAILS:</b></p>    
    <p><input type="number" name="card"  placeholder="Enter card number" ></p>
        <p><input type="text" name="exp"  placeholder="mm/yy" ></p>
           <p> <input type="number" name="cvv" placeholder="CVV" >  
    </p>   
        </div>
         <p><input type="submit" id="button" value="SUBMIT"></p>
        </form>
    </div>
  <script type="text/javascript">
    function calc()
        {
            var cust=document.getElementById("cust").value;
            var price=document.getElementById("price").value;
            var total=cust*price;
            document.getElementById("total").innerHTML=total;
        }
    </script>
        
</body>
</html>
