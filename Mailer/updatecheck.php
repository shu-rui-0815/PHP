<?php

$No=$_POST["uNo"];
$Name=$_POST["uName"];
$Email=$_POST["uEmail"];

//連接資料庫
$link = @mysqli_connect('localhost', 'root', '', 'mailer');     

//SQL語法
$SQL = "UPDATE mailer SET Name='$Name', Email='$Email' WHERE No='$No'";
if($result = mysqli_query($link, $SQL)){
    echo "更新成功";
}

echo "<br/><a href='Manager.php'>查看資料庫資料</a>";
?>