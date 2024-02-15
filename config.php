
<?php
// 데이터베이스 연결 설정
$dbHost = 'localhost';  // 데이터베이스 호스트
$dbUsername = 'db2021320306';  // 데이터베이스 사용자명
$dbPassword = 'ooinoing@korea.ac.kr';  // 데이터베이스 비밀번호
$dbName = 'db2021320306';  // 데이터베이스 이름

// 데이터베이스 연결
$db = new mysqli($dbHost, $dbUsername, $dbPassword, $dbName);

// 연결 오류 확인
if ($db->connect_error) {
    die("데이터베이스 연결 실패: " . $db->connect_error);
}


?>
