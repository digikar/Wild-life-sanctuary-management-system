<!Doctype html>
<html>
<head>
    <title><?php echo "Employee Login";?></title>
</head>
<body>
<?php $database="wildlife"; 
//database name 
$id=$_POST['id'];//this values comes from html file after submitting 
$name=$_POST['name']; 
$color=$_POST['color']; 
$height=$_POST['height']; 
$weight=$_POST['weight']; 
$s=2;

$d=4;

$con = @mysql_connect("localhost","root" ,"");//for wamp 3rd feild is balnk     
if (!$con)     {     die('Could not connect: ' . mysql_error());     }   
  @mysql_select_db("$database", $con);
   
 $query = "INSERT INTO animals (Anim_id,Name,Colour,Height,Weight,Staff_id,Dis_id) VALUES ($id,'$name','$color',$height,$weight,$s,$d)"; 
  mysql_query($query); 
  echo "<script type='text/javascript'>\n"; 
  echo "alert('Animal details entered successfully');\n"; 
  echo "location.href = 'http://localhost/index.php/select/';\n";
  echo "</script>";
  
   //mysql_query("select Name,Password from employee where Name='".$first."' and Password='".$last."'") or die(mysql_error());
  
  
 @mysql_close(); ?> 
</body>
</html>
