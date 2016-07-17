<!Doctype html>
<html>
<head>
    <title><?php echo "Customer Login";?></title>

    <link rel="stylesheet" type="text/css" href="./bootstrap.min.css">
    <!--<link rel="stylesheet" type="text/css" href="./signin.css">-->
    <style type="text/css">
      #main{
        background-color: #ffff66;
      }
    </style>
</head>
<body>
  <div class ="col-md-offset-4 col-md-4">
    <div class="container-fluid jumbotron" id="main">
<?php $database="wildlife"; 
//database name 
$username=$_POST['username'];//this values comes from html froile after submitting 
$adult=$_POST['adult'];
$children=$_POST['children']; 
$date1=$_POST['date'];



$dt = new DateTime();
$d = date_add($dt,date_interval_create_from_date_string("+1 days"));

$date = $d->format('Y-m-d');


$fare = $adult * 150  + $children * 100;
$VAT = .14 * $fare;
$T_fare = $fare + $VAT;
$no=$adult+$children;

$con = @mysql_connect("localhost","root","");//for wamp 3rd feild is balnk     
if (!$con)     {     die('Could not connect: ' . mysql_error());     }   
  @mysql_select_db("$database", $con);
   
 /* $query = "INSERT INTO info  VALUES ('$first','$last')"; 
  mysql_query($query); 
  echo "<script type='text/javascript'>\n"; 
  echo "alert('you are Succesflly registered');\n"; 
  echo "</script>";*/
   $query=mysql_query("select cust_id from customer where Username = '$username'")or die("Go to previous page and enter proper username");
   if(mysql_num_rows($query)>0) 
  { 
    while($row= mysql_fetch_array($query))
    {
      
      $cus = $row[0];
    }
    
  }

   mysql_query("insert into ticket_booking(Fare,No_of_tickets,Staff_id,Cust_id,date) values ($T_fare,$no,5,$cus,'$date')")or die(mysql_error());
   echo "<script type='text/javascript'>\n";
   echo "alert('.............................redirecting to bank payment page');\n";
 
  echo "</script>";
   //$res=mysql_fetch_row($query);ffd
echo "<h2>Ticket</h2>" ;  
echo "<br><br><b>Username :</b>" . ($username).  "<br><br><b>No of adults :</b>" . $adult . "<br><br><b>No of children :</b>" . $children ."<br><br><b>Date of booking :</b>" . $date1 . "<br><br><b>Base fare  :</b>" . $fare . "<br><br><b>VAT @ 14 % :</b>".$VAT. "<br><br><b> Total fare paid:</b>" .$T_fare . "<br><br>";
  
  
    

   
  
 
 /*else
 {
  echo'Enter both username and password';
 }

  */

 @mysql_close(); ?> 
 <a href="javascript:window.print();"><button class="btn btn-success">PRINT TICKET</button></a>
</div>
</div>
</body>
</html>
