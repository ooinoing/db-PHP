<?php
session_start();
// 로그인된 사용자만 접근할 수 있는 대시보드 페이지
// 로그인 상태 확인
if (!isset($_SESSION['loggedin']) || $_SESSION['loggedin'] !== true) {
    header("Location: login.php"); // 로그인되지 않은 경우 로그인 페이지로 이동
    exit();
}

// 로그인된 사용자 정보 출력
echo "로그인된 이메일: " . $_SESSION['email'];

// 여기에 대시보드 페이지의 내용을 추가해주세요.



?>
