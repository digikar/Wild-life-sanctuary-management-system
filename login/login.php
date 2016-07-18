<?php 
session_start();
$con=mysql_connect("localhost","root","");
if(!$con) 
  {
  die('Error connecting to server :'.mysql_error());
  }
mysql_select_db("user_login",$con);
$result=mysql_query("SELECT username,password FROM user_info WHERE username='$_POST[u_name]' && password='$_POST[pass1]'");
if(!mysql_fetch_array($result,MYSQL_ASSOC))
  {
  echo "Wrong Login. Go back and try again.";
  echo "<br /><a href='homepage.html'> Go back to login page </a>";
  }
else
  {
 $_SESSION['access']=1;
 $_SESSION['user']=$_POST[u_name];
 header('Location: website.php');
  
  
  }
 mysql_close($con);

/*
1) Currently, just a message is printed when u type a correct password and another one, when its a wrong password. What i want in the future is a message 
when its  wrong password and a NEW PAGE WHICH IS NOT ACCESSIBLE WITHOUT THE PASSWORD IN ANYWAYS if its a correct password. If the link to that page is 
written directly without logging in, you will be redirected to the login page. No one can no way access a profile without having an account in the website.(Y)
2) Give a password to the server. 
3) The new page into which the user goes when they type the correct password is the user profile.
4) There should be an option for deleting the profile in the profile page. Also u can upload a display picture, write about me and stuff.
*/

?>


