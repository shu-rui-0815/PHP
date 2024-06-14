<?php
    include("setting.inc")
?>

<html>
<head>
    <meta charset="utf-8"> 
</head>

<?php
/*
    header("Refresh:1");
    date_default_timezone_set("Asia/Taipei");
    echo date("Y/m/d h:i:s");
*/
if($_SESSION["check"]=="Yes"){
    if(isset($_COOKIE["userName"])){
        echo $_COOKIE["userName"]."歡迎回來!!<br/>";
}}else{
    echo "初次見面!你好哇!!<br/>";
}

echo "登入後即可填答資管晚夜報名表歐~";
?>
<br/><br/>
<form action="check.php" method="GET">
    帳號：<input type="text" name="uName"><br/>
    密碼：<input type="password" name="uPSW"><br/>
    <br/>
    <input type="submit" value="送出">
</form>

<?php
    include("footer.inc")
?>

</html>