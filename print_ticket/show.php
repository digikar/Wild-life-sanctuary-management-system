<html>
<head>
    <title><?php echo "Ticket";?></title>
    <link rel="stylesheet" type="text/css" href="./bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="./signin.css">
</head>
<body>
  <div class="container" style="color: blue;">
    <h3 align="center">
 	<?php $database="wildlife";
$name=$_POST[''];
$con = @mysql_connect("localhost","root" ,"");//for wamp 3rd feild is balnk     
if (!$con)     {     die('Could not connect: ' . mysql_error());     }   
  @mysql_select_db("$database", $con);
  $query="SELECT Ticket_id,Fare,No_of_tickets from ticket_booking where ";
  
  $result=mysql_query($query);
  echo "<h2>Fetched Animal data </h2><br> ";
  if(mysql_num_rows($result)>0) 
  { 
  	while($row= mysql_fetch_array($result))
  	{
  		echo "<br><br><b>Animal Name :</b>" . ($row[0]).  "<br><br><b>Type of food required :</b>" . $row[5] . "<br><br><b>Quantity of food in kg :</b>" . $row[4] ."<br><br><b>Commonly suffered disease :</b>" . $row[1] . "<br><br><b>Probable season animal suffers  :</b>" . $row[2] . "<br><br><b>Symptoms of disease :</b>" . $row[3] . "<br><br><b> Vaccination to be given :</b>" .$row[6] . "<br><br><b>Quantity in ml :</b>" . $row[7] . " <br><br><b>Interval of vaccination in months :</b>" . $row[8] ."<br><br>";
  	}
  	
  }
  else
  {
  	echo " No results <br>";
  }
   
  @mysql_close(); ?> 
  </h3>
  <a href="javascript:window.print();"><button class="btn btn-success">PRINT</button></a>
</div>
</body>
</html>































</html>