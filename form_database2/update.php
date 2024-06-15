<meta charset='utf8'>

<?php
$No = $_GET["No"];
//連接資料庫
$link = @mysqli_connect('localhost', 'root', '', 'party_form');     

//SQL語法
$SQL = "SELECT * FROM user";

if($result = mysqli_query($link, $SQL)){
    $row=mysqli_fetch_assoc($result);
    $Name=$row["Name"];
    $ID=$row["ID"];
    $Department=$row["Department"];
    $Gender=$row["Gender"];
    $Participants=$row["Participants"];
}
?>

<form action="updatecheck.php" method="post">

您目前修改的資料是：編號 <?php echo $No ?><input type="hidden" name="uNo" value='<?php echo $No ?>'><br/><br/>
姓名:<input type="text" name="uName" value="<?php echo $Name ?>"><br/>
學號:<input type="text" name="uID" value="<?php echo $ID ?>"><br/>
系級：<input type="text" name="uDepartment" value="<?php echo $Department ?>"><br/>
性別：<input type="text" name="uGender" value="<?php echo $Gender ?>"><br/>
參與人數：<input type="text" name="uParticipants" value="<?php echo $Participants ?>"><br/><br/>
<input type="submit">
</form>