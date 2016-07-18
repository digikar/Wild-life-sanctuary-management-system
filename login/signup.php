<?php 
if($_POST["pass1"]==$_POST["pass2"] && $_POST["pass1"]!="" && $_POST["u_name"]!="")
{
$con=mysql_connect("localhost","root","");
if(!$con) 
  {
  die('Error connecting to server :'.mysql_error());
  }
mysql_select_db("user_login",$con);

$result=mysql_query("SELECT username FROM user_info WHERE username='$_POST[u_name]'");
if(!mysql_fetch_array($result,MYSQL_ASSOC))
  {
  
$sql="INSERT INTO user_info(username, password) VALUES('$_POST[u_name]','$_POST[pass1]')";
if(!mysql_query($sql,$con))
  {
  die('Error :'.mysql_error());
  }
 echo "You are registered. Congrats !!!";
 echo "<a href='homepage.html'> Go back to login page </a>";
 }
else
 {
 echo "Username Already exists ! ";
 echo "<a href='homepage.html'> Go back to login page </a>";
 }
 mysql_close($con);
}
else
{
if($_POST["pass1"]!=$_POST["pass2"])
  echo "Password mismatch <br />";
else
  echo "Invalid Username  <br />";
echo "<a href='homepage.html'> Go back to login page </a>";
}
/*
1) We shouldnt allow similar usernames. (Y)
2) make the go back to login page work. (Y)
3) We shouldnt allow null usernames and passwords.(Y)
*/
?>

