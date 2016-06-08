<?php
session_start();
?>
<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <script type="text/javascript">
            <!--
               function passValidate()
            {
                if (document.changepasswordform.newpass.value !== document.changepasswordform.cfmpass.value)
                {
                    alert("Passowords do not match!");
                    return false;
                }
            }
            //-->
        </script>
        <title>Change Password Page</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">

    </head>
    <body>
        <?php echo $_SESSION["CurrentUser"];?>
        <h2><?php if(isset($_GET['msg'])) {echo $_GET['msg'];} else {echo "Change your password";}?></h2>
        <form name="changepasswordform" action="ChangePassValidate.php" method="post" onsubmit="return passValidate()">
            Enter current password:<input type="password" name="oldpass"/>
            Enter new password:<input type="password" name = "newpass"/>
            Confirm new password:<input type="password" name="cfmpass"/>
            <input type="submit"/>
        </form>
    </body>
</html>


