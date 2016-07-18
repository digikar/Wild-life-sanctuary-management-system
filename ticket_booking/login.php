<!Doctype html>
<html>
<head>
    <title><?php echo "Customer Login";?></title>
</head>
<body>
  <h2>
<?php $database="wildlife"; 
//database name 
$first=$_POST['username'];//this values comes from html file after submitting 
$last=$_POST['password']; 
if(CRYPT_SHA512==1)
{
  $hash=md5($last);
  
  
  
}

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
   $query=mysql_query("select Username,Password from customer where Username='".$first."' and Password='".$hash."'") or die(mysql_error());
   $res=mysql_fetch_row($query);
   if($res)
   {
  echo "<script type='text/javascript'>\n";
  echo "location.href = 'http://localhost/book_now/';\n";
  echo "</script>";
  }
    

   
   else
   {
     
     
     echo "<script type='text/javascript'>\n";
     echo ' alert("Entered username or password is incorrect. Redirecting to previous page");'; 

     echo "location.href = 'http://localhost/ticket_booking/';\n";
     echo "</script>";

   }
 }
 else
 {
  echo'Enter both username and password';
 }

  
 @mysql_close(); ?> 
</h2>
</body>
</html>
