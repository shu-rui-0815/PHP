<meta charset='utf8'>
<?php

$No = $_GET["No"];
echo "第".$No."筆資料";

//連接資料庫
$link = @mysqli_connect('localhost', 'root', '', 'mailer');      

//SQL語法
$SQL = "DELETE FROM mailer WHERE No='$No'";

//送出查詢
if($result = mysqli_query($link ,$SQL)){
    echo "<br/>刪除成功";
}
echo "<br/><a href = 'Manager.php'>查看資料庫資料</a>";
?>