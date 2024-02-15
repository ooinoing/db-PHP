<?php
session_start();
session_unset();
session_destroy();

header("Location: index.php"); // 로그아웃 후 이동할 페이지
exit();
?>
