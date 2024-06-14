<?php
session_start();
if ($_SESSION["check"] == "Yes") {
    header("Location: BookTicket.php");
} else {
    header("Location: login.php");
}
exit();
?>
