<html>

    <body>
        <form action="RegForm.php" method="post" enctype="multipart/form-data">
            <br/>
            <legend> Registration Form</legend>
            <li><label>Name</label><input type="text" name="name"  placeholder="Your name" required autofocus/></li>
            <li><label>Username</label><input type="text" name="usernm"  placeholder="Preferred ID" required/></li>
            <li><label>Email</label><input type="email" name="email"  placeholder="Your email ID" autofocus required/></li>
            <li><label>Password</label><input type="password" name="pass"  placeholder="Atleast 8 characters" autofocus required /></li>
            <li><label>Birth date</label><input  type="date" name="bdate" /></li><br>                       
            <li><label>Mobile </label><br><input type="tel" name="mobile"  id="mobile-number"/></li>

            <input type="file" name="image"/>
            <input type="submit" name="submit" value="Upload"/>
        </form>
        <?php
        session_start();
        $Name = $_POST['name'];
        $Email = $_POST['email'];
        $User_id = $_POST['usernm'];
        $Pass = $_POST['pass'];
        $Birth = $_POST['bdate'];
        $Mobile = $_POST['mobile'];
        if (isset($_POST['submit'])) {
            mysql_connect("mysql2.000webhost.com", "a2554333_Gre", "msmsdp2109");
            mysql_select_db("a2554333_Gre");
            $imageName = mysql_real_escape_string($_FILES["image"]["name"]);
            $imageData = mysql_real_escape_string(file_get_contents($_FILES["image"]["tmp_name"]));
            $imageType = mysql_real_escape_string($_FILES["image"]["type"]);
            if (substr($imageType, 0, 5) == "image") {
                echo "Working code!";
                $sql = "INSERT into UserInfo(Name,User_nm,Email,Pass,Birth,Mobile,image) VALUES ('$Name','$User_id','$Email','$Pass','$Birth','$Mobile','$imageData')";
                $current_id = mysql_query($sql) or die("<b>Error:</b> Problem on Image Insert<br/>" . mysql_error());
                if (isset($current_id)) {
                    $_SESSION["CurrentUser"] = $User_id;
                    header("Location: Profile.php");
                }
            } else {
                echo "Only images are allowed!";
            }
        }
        ?>
    </body>
</html>
