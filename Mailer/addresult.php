<meta charset='utf8'>
<?php

$Name=$_POST["Name"];
$Email=$_POST["Email"];

//連接資料庫
$link = @mysqli_connect('localhost', 'root', '', 'mailer');  
if (!$link) {
    die("無法開啟資料庫<br>");
}      

//SQL語法
$SQL = "INSERT INTO mailer(Name, Email) VALUES('$Name','$Email')";  

//送出查詢
if($result = mysqli_query($link, $SQL)){
    echo "新增成功<br/>";
}
echo "<br/><a href='index.php'>回到首頁</a>";
echo "<br/><a href='Manager.php'>查看資料庫</a>";

?>