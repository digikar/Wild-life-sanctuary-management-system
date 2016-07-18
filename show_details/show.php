<html>
<head>
    <title><?php echo "Employee Login";?></title>
    <link rel="stylesheet" type="text/css" href="./bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="./signin.css">
</head>
<body>
  <div class="container" style="color: blue;">
    <h3 align="center">
 	<?php $database="wildlife";
$name=$_POST['name'];
$con = @mysql_connect("localhost","root" ,"");//for wamp 3rd feild is balnk     
if (!$con)     {     die('Could not connect: ' . mysql_error());     }   
  @mysql_select_db("$database", $con);
  $query="SELECT A.Name,D.Name,D.Season,D.Symptoms,F.Quantity,F.Type,V.Name,V.Quantity,V.interval from 
  animals as A ,diseases as D,food as F ,vaccination as V where A.Anim_id=$name AND A.Dis_id=D.Dis_id AND F.Food_id=$name AND V.Vacc_id=$name";
  
  $result=mysql_query($query);
  echo "<h2>Fetched Animal data </h2><br> ";
  if(mysql_num_rows($result)>0) 
  { 
  	while($row= mysql_fetch_array($result))
  	{
  		echo "<br><br><b>Animal Name :</b>" . ($row[0]).  "<br><br><b>Type of food required :</b>" . $row[5] . "<br><br><b>Quantity of food in kg :</b>" . $row[4] ."<br><br><b>Commonly suffered disease :</b>" . $row[1] . "<br><br><b>Probable season animal suffers  :</b>" . $row[2] . "<br><br><b>Symptoms of disease :</b>" . $row[3] . "<br><br><b> Vaccination to be given :</b>" .$row[6] . "<br><br><b>Quantity in ml :</b>" . $row[7] . " <br><br><b> Last Vaccination date :</b>10/08/15<br><br><b>Interval of vaccination in months :</b>" . $row[8] ."<br><br>";
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