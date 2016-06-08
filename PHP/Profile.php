<?php
session_start();
$CurrentUser = $_SESSION["CurrentUser"];
echo $CurrentUser;
mysql_connect("mysql2.000webhost.com", "a2554333_Gre", "msmsdp2109");
mysql_select_db("a2554333_Gre");

$query_ID  = mysql_query("SELECT ID FROM UserInfo WHERE User_nm =  '" . $CurrentUser . "'");
while ($row = mysql_fetch_assoc($query_ID)) {
    $UID = $row["ID"];
}
$query_user = mysql_query("SELECT * FROM UserInfo WHERE ID =  '" . $UID . "'");
while ($row = mysql_fetch_assoc($query_user)) {
    $Fetched_UID = $row["ID"];
    $Fetched_User = $row["Name"];
    $Fetched_Username = $row["User_nm"];
    $Fetched_Email = $row["Email"];
    $Fetched_Pass = $row["Pass"];
    $Fetched_Birth = $row["Birth"];
    $Fetched_Mobile = $row["Mobile"];
}
?>
<html>
    <head>
        <title>Profile</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/css/bootstrap.min.css">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/css/bootstrap-theme.min.css">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/js/bootstrap.min.js"></script>
        <script src="/plugins/bootstrap-pager.js"></script>
    </head>
    <body>

        <img title="profile image" class="img-circle img-responsive" src="http://eprep.net76.net/LoginFlow/imgView.php?id=<?php echo $Fetched_UID?>" width="150" height="150">



        <form name="viewprofileform" action="welcome.php">
            <table border="1">
                <tr>
                    <th colspan="2" align="center">
                        <b><font face="verdana"><center>Your profile</center></font></b>
                    </th>
                </tr>

                <tr>
                    <td width="250" align="center"><b>User id</b></td>
                    <td width="250"><?php echo $Fetched_Username?></td>
                </tr>
                <tr>
                    <td width="250" align="center"><b>Name</b></td>
                    <td width="250"><?php echo $Fetched_User?></td>
                </tr>
                
                <tr>
                    <td width="250" align="center"><b>Email ID</b></td>
                    <td width="250"><?php echo $Fetched_Email?></td>
                </tr>
                <tr>
                    <td width="250" align="center"><b>DOB</b></td>
                    <td width="250"><?php echo $Fetched_Birth?></td>
                </tr>
                <tr>
                    <td width="250" align="center"><b>Password</b></td>
                    <td width="250"><?php echo $Fetched_Pass?></td>
                </tr>
                
            </table>
            <input type="submit" name="submit" value="All good!"/>

        </form>
    </body>
</html>


