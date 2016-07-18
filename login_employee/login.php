<!Doctype html>
<html>
<head>
    <title><?php echo "Employee Login";?></title>
</head>
<body>
<?php $database="wildlife"; 
//database name 
$first=$_POST['email'];//this values comes from html file after submitting 
$last=$_POST['password']; 

$con = @mysql_connect("localhost","root" ,"");//for wamp 3rd feild is balnk     
if (!$con)     {     die('Could not connect: ' . mysql_error());     }   
  @mysql_select_db("$database", $con);
   
 /* $query = "INSERT INTO info  VALUES ('$first','$last')"; 
  mysql_query($query); 
  echo "<script type='text/javascript'>\n"; 
  echo "alert('you are Succesflly registered');\n"; 
  echo "</script>";*/
   if($first!=''&&$last!='')
 {
   $query=mysql_query("select Name,Password from employee where Name='".$first."' and Password='".$last."'") or die(mysql_error());
   $res=mysql_fetch_row($query);
   if($res)
   {
  echo "<script type='text/javascript'>\n";
  echo "location.href = 'http://localhost/index.php/select/';\n";
  echo "</script>";
  }
    

   
   else
   {
    echo' Entered username or password is incorrect. Go back to previous page.';
   }
 }
 else
 {
  echo'Enter both username and password';
 }

  
 @mysql_close(); ?> 
</body>
</html>
