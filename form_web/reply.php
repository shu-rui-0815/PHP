<?php
    include("setting.inc")
?>
<html>
    <?php

    $sName=$_POST["sName"];
    echo "姓名：".$sName."<br/>";
    $sID=$_POST["sID"];
    echo "學號：".$sID."<br/>";
    $sLevel=$_POST["sLevel"];
    echo "系級：".$sLevel."<br/>";
    $sDate=$_POST["sDate"];
    echo "生日：".$sDate."<br/>";
    $sGender=$_POST["sGender"];
    echo "性別：".$sGender."<br/>";

    $sParticipants=$_POST["sParticipants"];
    echo "是否團體報名：".$sParticipants."<br/>";
    if($sParticipants=="是"){
        $sNumber=$_POST["sNumber"];
        echo "一同參與人數：".$sNumber."<br/>";
        $sName1=$_POST["sName1"];
        echo "一同參與人的學號、姓名：".$sName1."<br/>";
    }

    $sGift=$_POST["sGift"];
    echo "精美獎品：".$sGift."<br/>";
    $sGame=$_POST["sGame"];
    echo "有興趣的遊戲：";
    foreach($sGame as $value){
        echo $value." ";
    }
    echo "<br/>";
    $sPercent=$_POST["sPercent"];
    echo "對本次活動的期待程度：".$sPercent."%<br/>";
    $sEmail=$_POST["sEmail"];
    echo "E-mail：".$sEmail."<br/>";
    $sComment=$_POST["sComment"];
    echo "你的寶貴意見：".$sComment."<br/>";
    ?>
    <br/>
    <a href="logout.php">登出</a>
</html>