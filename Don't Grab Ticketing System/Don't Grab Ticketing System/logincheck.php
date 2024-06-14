<?php

ob_start();
session_start();

    session_start();
    $link=@mysqli_connect('localhost', 'root', '', 'backstage' );
    mysqli_set_charset($link, "utf8");

    $uEmail=$_POST["uEmail"];
    $uPassword=$_POST["uPassword"];

    $_SESSION['is_manager'] = false ;

    $_SESSION['email'] = 0;

    $_SESSION['ID'] = 0;

   

    if($uEmail && $uPassword){
        if($uEmail=="Management" && $uPassword=="QWERTYUIOP13579"){
            header("Location:Management.php");
        }
       
        $sql = "SELECT * FROM user WHERE EMAIL ='$uEmail' and PASSWORD = '$uPassword'";
        
        $result = mysqli_query($link, $sql);
    
        $rows=mysqli_fetch_assoc($result);  

        if($rows){

            if($rows['MANAGER'] == 1){
                
                $_SESSION['is_manager'] = 1 ;
            
            }else {
            
                $_SESSION['is_manager'] = 0 ;
            
            }

            $_SESSION['is_login'] = TRUE;

            $_SESSION['email'] = $uEmail;

            $_SESSION['ID'] = $rows['U_ID'];
            $_SESSION["check"] = "Yes"; 

            $alert = "登入成功，即將跳轉至首頁!";

            echo "<script type='text/javascript'>alert('$alert');</script>";


            header("Refresh:0.5; url=index.php");

        }else{

            $_SESSION['is_login'] = FALSE;
            $_SESSION["check"] = "No";

            $alert = "帳號密碼有誤，請重新輸入!";

            echo "<script type='text/javascript'>alert('$alert');</script>";

            header("Refresh:0.5; url=login.php");
        }
    }else{

        $alert = "ˋ帳號密碼不能空白！";

        echo "<script type='text/javascript'>alert('$alert');</script>";

        header("Refresh:0.5; url=login.php");
    }
?>