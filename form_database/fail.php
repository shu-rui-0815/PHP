<?php
    include("setting.inc")
?>

<?php
    if($_SESSION["check"]=="No"){
        echo "非法進入網頁<br/>";
        echo "三秒後請重新登入";
        header("Refresh:3;url=login.php");
    }
   
?>