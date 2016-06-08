<?php
session_start();
mysql_connect("mysql2.000webhost.com", "a2554333_Gre", "msmsdp2109");
mysql_select_db("a2554333_Gre");
$em = $_POST['mail'];
$query_ID  = mysql_query("SELECT User_nm FROM UserInfo WHERE Email =  '" . $em . "'");
while ($row = mysql_fetch_assoc($query_ID)) {
    $UName = $row["User_nm"];
}
if(isset($_POST['submit']))
{
echo "Your username is ".$UName;
echo '<a href="#">Get back to Login!</a>';
}
?>
<html>
<head>
<style type="text/css">
 input{
 border:1px solid olive;
 border-radius:5px;
 }
 h1{
  color:darkgreen;
  font-size:22px;
  text-align:center;
 }

</style>
</head>
<body>
<h1>Forgot Password<h1>
<form action='<?php echo $_SERVER['SELF'];?>' method='post'>
<table cellspacing='5' align='center'>
<tr><td>Email id:</td><td><input type='text' name='mail'/></td></tr>
<tr><td></td><td><input type='submit' name='submit' value='Submit'/></td></tr>
</table>
</form>

</body>
</html>

