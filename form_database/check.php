<?php
    include("setting.inc")
?>

<?php
    $uId="nuk";
    $uPwd="1234567890";
    $MId="Management";
    $MPwd="111222333";

    $role = $_GET["role"];
    $uName=$_GET["uName"];   
    $uPSW=$_GET["uPSW"];

    if($uId==$uName && $uPwd==$uPSW && $role=="student"){
        $_SESSION["check"] = "Yes";
        setcookie("userName",$uId,time()+36000);
        header("Location:party_form.php");
        exit();
    }elseif($MId==$uName && $MPwd==$uPSW && $role=="manager"){
        $_SESSION["check"] = "Yes";
        setcookie("userName",$MId,time()+36000);
        header("Location:Manager.php");
        exit();
    }else{
        $_SESSION["check"] = "No";
        header("Location:fail.php");
        exit();
    }
    
   ob_flush();
?>