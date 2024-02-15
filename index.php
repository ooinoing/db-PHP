<?php
require_once 'config.php';
include 'header.php';
?>
<!DOCTYPE html>
<html>
<head>
    <title>홈페이지</title>
</head>
<body>
    <h1>홈페이지 메인 화면</h1>

    <nav>
        <ul>
            <li><a href="index.php">홈</a></li>
            <li><a href="reservation.php">예약</a></li>
            <?php if (isset($_SESSION['loggedin']) && $_SESSION['loggedin'] === true) { ?>
                <li><a href="dashboard.php">대시보드</a></li>
                <li><a href="logout.php">로그아웃</a></li>
            <?php } else { ?>
                <li><a href="login.php">로그인</a></li>
                <li><a href="register.php">회원가입</a></li>
            <?php } ?>
        </ul>
    </nav>

    <!-- 나머지 페이지 컨텐츠를 이곳에 추가 -->
</body>
</html>
