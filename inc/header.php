<!DOCTYPE html>
<html>
<head>
    <title>drum school</title>
    <link rel="stylesheet" type="text/css" href="css/style.css">
</head>
<body>
    <header>
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
    </header>
    <div class="content">
    <!-- 나머지 페이지 컨텐츠를 이곳에 추가 -->
