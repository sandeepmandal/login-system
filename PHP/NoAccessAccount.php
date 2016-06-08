<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

$choice  = $_POST['not'];
echo $choice;

if($choice=="first")
{
    header("Location: forgotpass.php");
}
else if($choice=="second")
{
    header("Location: forgotID.php");
}

