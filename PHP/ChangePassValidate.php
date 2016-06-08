<?php
session_start();
mysql_connect("mysql2.000webhost.com", "a2554333_Gre", "msmsdp2109");
mysql_select_db("a2554333_Gre");
$thisUser = $_SESSION["CurrentUser"];
echo $thisUser;
$oldpass = $_POST["oldpass"];
$newpass = $_POST["newpass"];
$checkCurrentPass = mysql_query("SELECT Pass FROM UserInfo WHERE User_nm =  '" . $thisUser . "'");
while ($row = mysql_fetch_assoc($checkCurrentPass)) {
    $OPass = $row["Pass"];
}
if($OPass!=$oldpass)
{
    $msg = "Incorrect Password!";
    header("Location: ChangePassword.php?msg=$msg");
} 
else 
{
    $updatePass = mysql_query("UPDATE UserInfo SET Pass='" . $newpass . "' where User_nm='" . $thisUser . "'");
    if($updatePass)
    {
        echo "Password has been changed!";
        echo '<a href="welcome.php">Go back!</a>';
    }
}
?>

