<?php

ob_start();
session_start();

// 檢查是否是POST請求
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $uEmail = $_POST['uEmail'];
    $uPassword = $_POST['uPassword'];
    $uName = $_POST['uName'];
    $uPhone = $_POST['uPhone'];

    // 連接資料庫
    $link = @mysqli_connect(  
        'localhost', 
        'root',       
        '',           
        'backstage'     
    ); 
    mysqli_set_charset($link, "utf8");

    // 檢查連接是否成功
    if (!$link) {
        die("資料庫連接失敗: " . mysqli_connect_error());
    }

    // 檢查電子郵件是否已經被註冊
    $account = "SELECT * FROM user WHERE EMAIL = '$uEmail'";
    $result = $link->query($account);

    // 檢查查詢是否成功
    if (!$result) {
        die("查詢失敗: " . mysqli_error($link));
    }

    if ($uEmail && $uPassword) {
        if ($result->num_rows > 0) {
            // 提示用戶該電子郵件已被使用
            $alert = "已使用此信箱註冊帳號，請換一個信箱註冊!";
            echo "<script type='text/javascript'>alert('$alert');</script>";
            echo "<script type='text/javascript'>window.location.href='register.php';</script>";
            //header("Refresh:0.5; url=register.php");
            exit();
        } else {
            if (preg_match('/^(?=.*[a-zA-Z])(?=.*\d).+$/', $uPassword) && strlen($uPassword) >= 8 && strlen($uPhone) == 10) {
                // 將新用戶插入資料庫
                $sql = "INSERT INTO user(Email, Password, Name, Phone) VALUES('$uEmail', '$uPassword', '$uName','$uPhone')";
                if (mysqli_query($link, $sql)) {
                    $alert = "註冊成功!";
                    echo "<script type='text/javascript'>alert('$alert');</script>";
                    session_start(); // 確保會話已啟動
                    $_SESSION['email'] = $uEmail;
                    echo "<script type='text/javascript'>window.location.href='login.php';</script>";
                    exit();
                    //header("Refresh:0.5; url=login.php");
                } else {
                    // 如果插入失敗，提示用戶
                    $alert = "註冊失敗，請重試!";
                    echo "<script type='text/javascript'>alert('$alert');</script>";
                    echo "<script type='text/javascript'>window.location.href='register.php';</script>";
                    exit();
                }
            } else {
                $alert = "密碼或電話格式有誤，請重新輸入!";
                echo "<script type='text/javascript'>alert('$alert');</script>";
                echo "<script type='text/javascript'>window.location.href='register.php';</script>";
                //header("Refresh:0.5; url=register.php");
            }
        }
    } else {
        $alert = "所有都不得為空白!";
        echo "<script type='text/javascript'>alert('$alert');</script>";
        echo "<script type='text/javascript'>window.location.href='register.php';</script>";
        exit();
        //header("Refresh:0.5; url=register.php");
    }
    // 關閉資料庫連接
    mysqli_close($link);
}
?>