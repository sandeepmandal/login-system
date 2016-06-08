<?php
$con = mysql_connect("mysql2.000webhost.com", "a2554333_Gre", "msmsdp2109");
mysql_select_db("a2554333_Gre", $con) or die(mysql_error());
function resize($blob_binary, $desired_width, $desired_height) { // simple function for resizing images to specified dimensions from the request variable in the url
    $im = imagecreatefromstring($blob_binary);
    $new = imagecreatetruecolor($desired_width, $desired_height) or exit("bad url");
    $x = imagesx($im);
    $y = imagesy($im);
    imagecopyresampled($new, $im, 0, 0, 0, 0, $desired_width, $desired_height, $x, $y) or exit("bad url");
    imagedestroy($im);
    imagejpeg($new, null, 85) or exit("bad url");
    echo $new;
}
if(isset($_GET['id']))
{
    $id = mysql_real_escape_string($_GET['id']);
    $query = mysql_query("SELECT * FROM UserInfo WHERE ID = '" . $id . "'");
    while($row = mysql_fetch_assoc($query))
    {
        $imageData = $row["image"];
    }
    header("content-type: image/jpeg");
    //echo $imageData;
    if(isset($_GET['width']) && isset($_GET['height']))
    {
       echo resize($imageData, $_GET['width'], $_GET['height']);
    }
    else
    {
       echo resize($imageData, 200, 200);
    }
}
else 
{
    echo "Error!";
}
?>