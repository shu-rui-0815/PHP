<?php
//Import PHPMailer classes into the global namespace
//These must be at the top of your script, not inside a function
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

require '../../../PHPMailer-master/src/Exception.php';
require '../../../PHPMailer-master/src/PHPMailer.php';
require '../../../PHPMailer-master/src/SMTP.php';

$subject = $_POST["subject"];
$content = $_POST["content"];
$content = nl2br($content); //nl2br:斷行

//連接資料庫
$link = @mysqli_connect('localhost', 'root', '', 'mailer');  

if (!$link) {
    die("無法開啟資料庫<br>");
}  

//SQL語法
$SQL = "SELECT * FROM  mailer";

$result = mysqli_query($link, $SQL);

//Create an instance; passing `true` enables exceptions
$mail = new PHPMailer(true);

try {
    //Server settings
    $mail->SMTPDebug = false;              //Enable verbose debug output
    $mail->isSMTP();                                            //Send using SMTP
    $mail->Host       = 'smtp.gmail.com';                     //Set the SMTP server to send through
    $mail->SMTPAuth   = true;                                   //Enable SMTP authentication
    $mail->Username   = 'a1113327@mail.nuk.edu.tw';                     //SMTP username
    $mail->Password   = 'jbun gkez nlxn hgil';                               //SMTP password
    $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;            //Enable implicit TLS encryption
    $mail->Port       = 465;                                    //TCP port to connect to; use 587 if you have set `SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS`
    $mail->CharSet    = 'utf-8';   

    //Recipients
    $mail->setFrom('a1113353@mail.nuk.edu.tw', 'Mailer');
    //$mail->addAddress('a1113327@mail.nuk.edu.tw', 'Ding');     //Add a recipient
    $mail->addReplyTo('a1113353@mail.nuk.edu.tw', 'Information');
    //$mail->addCC('cc@example.com');
    //$mail->addBCC('bcc@example.com');

    //Attachments
    //$mail->addAttachment('/var/tmp/file.tar.gz');         //Add attachments
    //$mail->addAttachment('/tmp/image.jpg', 'new.jpg');    //Optional name


    //將每個收件人的電子郵件地址添加到郵件中，設置郵件的主題和內容，並發送郵件。每次發送郵件後，清除收件人地址以準備發送下一封郵件。
    while($row = mysqli_fetch_assoc($result)) {
        $email = $row["Email"];
        $mail->isHTML(true);                                  //Set email format to HTML
        $mail->addAddress($email, 'Recipient');     
        $mail->Subject = $subject;     
        $mail->Body    = $content;
        // $mail->AltBody = 'This is the body in plain text for non-HTML mail clients';
        $mail->send(); //清除收件人email
        $mail->clearAddresses();
    }
    
    echo 'Message has been sent';
} catch (Exception $e) {
    echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
}