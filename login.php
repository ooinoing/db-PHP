<?php
// 로그인을 처리하는 기능을 담당
// 사용자가 제출한 이메일과 비밀번호를 데이터베이스와 비교하여 일치하는 사용자를 찾고,
// 세션을 시작하여 로그인 상태를 유지
// 로그인에 실패한 경우 적절한 오류 메시지를 출력

require_once 'config.php';
session_start();


if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // POST 데이터 받기
    $email = $_POST['email'];
    $password = $_POST['password'];

    // 사용자 인증
    $sql = "SELECT * FROM users WHERE email = '$email' AND password = '$password'";
    $result = $db->query($sql);


    if ($result->num_rows == 1) {
        // 로그인 성공
        session_start();
        $_SESSION['loggedin'] = true;
        $_SESSION['email'] = $email;

        header("Location: dashboard.php"); // 로그인 후 이동할 페이지
        exit();
    } else {
        // 로그인 실패
        echo "로그인 실패: 잘못된 이메일 또는 비밀번호";
    }
}

$db->close();
?>


<!DOCTYPE html>
<html>
<head>
    <title>로그인</title>
</head>
<body>
    <h1>로그인</h1>

    <?php if (isset($error_message)) { ?>
        <p><?= $error_message ?></p>
    <?php } ?>

    <form method="POST" action="">
        <label for="email">이메일:</label>
        <input type="email" name="email" id="email" required>

        <label for="password">비밀번호:</label>
        <input type="password" name="password" id="password" required>

        <input type="submit" value="로그인">
    </form>
</body>
</html>
