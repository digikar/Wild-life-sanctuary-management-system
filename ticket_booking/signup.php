<!Doctype html>
<html>
<head>
    <title><?php echo "Customer Login";?></title>
</head>
<body>
<?php $database="wildlife"; 
//database name 
$username=$_POST['usernamesignup'];//this values comes from html file after submitting 
$email=$_POST['emailsignup']; 
$password=$_POST['password'];
if(CRYPT_SHA512==1)
{
  $hash=md5($password);
  echo $hash;

  
} 
  

$con = @mysql_connect("localhost","root" ,"");//for wamp 3rd feild is balnk     
if (!$con)     {     die('Could not connect: ' . mysql_error());     }   
  @mysql_select_db("$database", $con);
   
 /* $query = "INSERT INTO info  VALUES ('$first','$last')"; 
  mysql_query($query); 
  echo "<script type='text/javascript'>\n"; 
  echo "alert('you are Succesflly registered');\n"; 
  echo "</script>";*/
   if($username!=''&&$email!=''&&$hash!='')
 {
  $query=mysql_query("INSERT into customer (Username,Password,Email) values ('$username','$hash','$email')") or die(mysql_error()); 
   
   if($query)
  {
  echo "<script type='text/javascript'>\n";
  echo "location.href = 'http://localhost/ticket_booking/index.html';\n";
  echo "</script>";
  }
    

   
   else
   {
    echo "<script type='text/javascript'>\n";
     echo ' alert("Entered proper incorrect. Redirecting to previous page");'; 

     echo "location.href = 'http://localhost/ticket_booking/index.html';\n";
     echo "</script>";
   }
 }
 else
 {
  echo'Enter both username and password';
 }

  
 @mysql_close(); ?> 
</body>
</html>
