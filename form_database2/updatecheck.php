<?php

$No=$_POST["uNo"];
$Name=$_POST["uName"];
$ID=$_POST["uID"];
$Department=$_POST["uDepartment"];
$Gender=$_POST["uGender"];
$Participants=$_POST["uParticipants"];

//連接資料庫
$link = @mysqli_connect('localhost', 'root', '', 'party_form');     

//SQL語法
$SQL = "UPDATE user SET Name='$Name', ID='$ID', Department='$Department',  Gender='$Gender', Participants='$Participants' WHERE No='$No'";
if($result = mysqli_query($link, $SQL)){
    echo "更新成功";
}

echo "<br/><a href='Manager.php'>查看資料庫資料</a>";
?>