<meta charset='utf8'>
<?php

$Name=$_POST["Name"];
$ID=$_POST["ID"];
$Department=$_POST["Department"];
$Gender=$_POST["Gender"];
$Participants=$_POST["Participants"];

//連接資料庫
$link = @mysqli_connect('localhost', 'root', '', 'party_form');     

//SQL語法
$SQL = "INSERT INTO user(Name, ID, Department, Gender, Participants) VALUES('$Name','$ID', '$Department', '$Gender', '$Participants')";  

//送出查詢
if($result = mysqli_query($link, $SQL)){
    echo "新增成功<br/>";
}
echo "<br/><a href='Manager.php'>查看資料庫資料</a>";

?>