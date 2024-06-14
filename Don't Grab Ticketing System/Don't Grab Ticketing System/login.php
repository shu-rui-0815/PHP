<!DOCTYPE html>
<?php
ob_start();
session_start();
?>
<html>
  <head>
    
    <meta charset="UTF-8">
    <meta name="robots" content="follow,index">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>登入系統</title>

    <link rel="stylesheet" href="normalize.css">
    <link rel="stylesheet" href="additional.css">
    <link rel="stylesheet" href="stylelogin.css">
    <link
      href="https://fonts.googleapis.com/css2?family=Open+Sans:wght@300;400;600;700&display=swap"
      rel="stylesheet"
    />

  </head>

  <body>
    <div class="content-body">
      <div class="form-wrapper">
        <h1 class="heading text-center">不要搶售票登入系統</h1>
        <h3 class="sub-heading text-center">歡迎使用本網站</h3>

        <form method = "post" action = "logincheck.php">
          <div class="field">
            <input type="text" name="uEmail" class="input" placeholder="請輸入信箱" />
            <input type="password" name="uPassword" class="input" placeholder="請輸入密碼" />
          </div>

          <div class="description-text">
            <p><font color = #000>
              若是尚未建立帳戶，請點選下方"建立帳戶" 
                </font> 
            </p>    
          </div>

          <div class="form-action text-center">
            <a href="register.php" class=""><font size="1">&nbsp建立帳戶</font></a>
          </div>
          <div class="form-action text-center">
            <p><input type = "submit" class="btn secondary submit-btn"></p>
          </div>
        </form>
      </div>
    </div>

  </body>

  
</html>


