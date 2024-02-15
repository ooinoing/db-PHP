<?php
require_once 'config.php';

// 이미 로그인되어 있는지 체크
session_start();
if (isset($_SESSION['user_id'])) {
    // 이미 로그인되어 있을 경우, 로그인 페이지로 리다이렉트
    header("Location: login.php");
    exit;
}

if (isset($_POST['submit'])) {
    $firstName = $_POST['first_name'];
    $lastName = $_POST['last_name'];
    $gender = $_POST['gender'];
    $email = $_POST['email'];
    $username = $_POST['username'];
    $password = password_hash($_POST['password'], PASSWORD_DEFAULT);
    $isPremium = 0; // 정회원 여부 초기값: 0 (비정회원)

    // 회원 정보를 데이터베이스에 저장
    $query = "INSERT INTO members (first_name, last_name, gender, email, username, password, is_premium)
              VALUES (?, ?, ?, ?, ?, ?, ?)";
    $stmt = $db->prepare($query);
    $stmt->bind_param("ssssssi", $firstName, $lastName, $gender, $email, $username, $password, $isPremium);
    $stmt->execute();


    // 회원가입 완료 후 로그인 페이지로 리다이렉트
    header("Location: login.php");
    exit;

    // 회원가입 완료 메시지 또는 다음 단계로의 리다이렉션 등을 수행할 수 있습니다.

    $stmt->close();
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>회원가입</title>
</head>
<body>
    <h1>회원가입</h1>

    <form method="POST" action="">
        <label for="first_name">이름:</label>
        <input type="text" name="first_name" id="first_name" required>

        <label for="last_name">성:</label>
        <input type="text" name="last_name" id="last_name" required>

        <label for="gender">성별:</label>
        <select name="gender" id="gender" required>
            <option value="Male">남성</option>
            <option value="Female">여성</option>
        </select>

        <label for="email">이메일:</label>
        <input type="email" name="email" id="email" required>

        <label for="username">아이디:</label>
        <input type="text" name="username" id="username" required>

        <label for="password">비밀번호:</label>
        <input type="password" name="password" id="password" required>

        <button type="submit" name="submit">가입하기</button>
    </form>
</body>
</html>
