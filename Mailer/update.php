<meta charset='utf8'>

<?php
$No = $_GET["No"];

//連接資料庫
$link = @mysqli_connect('localhost', 'root', '', 'mailer');     

//SQL語法
$SQL = "SELECT * FROM mailer WHERE No='$No'";

if($result = mysqli_query($link, $SQL)){
    $row=mysqli_fetch_assoc($result);
    $Name=$row["Name"];
    $Email=$row["Email"];
}
?>

<form action="updatecheck.php" method="post">

您目前修改的資料是：編號 <?php echo $No ?><input type="hidden" name="uNo" value='<?php echo $No ?>'><br/><br/>
姓名:<input type="text" name="uName" value="<?php echo $Name ?>"><br/>
Email:<input type="text" name="uEmail" value="<?php echo $Email ?>"><br/>
<input type="submit">
</form>