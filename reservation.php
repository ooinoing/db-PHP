<?php
require_once 'config.php';

// 예약 시간 저장 처리
if (isset($_POST['submit'])) {
    $selectedDate = $_POST['date'];
    $selectedTime = $_POST['time'];

    // 데이터베이스에 예약 시간 저장
    $query = "INSERT INTO reservations (date, time) VALUES (?, ?)";
    $stmt = $db->prepare($query);
    $stmt->bind_param("ss", $selectedDate, $selectedTime);
    $stmt->execute();

    // 예약 완료 메시지 또는 다음 단계로의 리다이렉션 등을 수행할 수 있습니다.

    $stmt->close();
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>예약 시스템</title>
</head>
<body>
    <h1>예약 시스템</h1>

    <!-- 예약 폼 -->
    <form method="POST" action="">
        <label for="date">날짜:</label>
        <input type="date" name="date" id="date" required>

        <label for="time">시간:</label>
        <select name="time" id="time" required>
            <option value="">시간 선택</option>
            <option value="09:00">09:00</option>
            <option value="10:00">10:00</option>
            <option value="11:00">11:00</option>
            <option value="14:00">14:00</option>
            <option value="15:00">15:00</option>
        </select>

        <button type="submit" name="submit">예약하기</button>
    </form>

</body>
</html>
