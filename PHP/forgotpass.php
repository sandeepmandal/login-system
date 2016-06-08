<?php
session_start();
mysql_connect("mysql2.000webhost.com", "a2554333_Gre", "msmsdp2109");
mysql_select_db("a2554333_Gre");
function generateRandomString($length = 10) {
    $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
    $charactersLength = strlen($characters);
    $randomString = '';
    for ($i = 0; $i < $length; $i++) {
        $randomString .= $characters[rand(0, $charactersLength - 1)];
    }
    return $randomString;
}

if(isset($_POST['submit']))
{ 
 
 $mail=$_POST['mail'];
 $q=mysql_query("select * from UserInfo where Email='".$mail."' ") or die(mysql_error());
 $p=mysql_affected_rows();
 if($p!=0) 
 {
  $randompass = generateRandomString();
 $resetPass = mysql_query("UPDATE UserInfo SET Pass='" . $randompass . "' where Email='" . $mail . "'");
  $res=mysql_fetch_array($q);
  $to=$res['Email'];
  $subject='Remind password'; 
  $message = "Please use the generated password below for your login and use it to change your password\nYour temporary password is".$randompass;
  $headers='From:Eprep';
  $m=mail($to,$subject,$message,$headers);
  if($m)
  {
    echo'Check your inbox in mail';
  }
  else
  {
   echo'mail is not send';
  }
 }
 else
 {
  echo'You entered mail id is not present';
 }
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

