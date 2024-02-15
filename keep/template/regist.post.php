<?php
require_once("inc/db.php");

$login_id = isset($_POST['login_id']) ? $_POST['login_id'] : null;
$login_pw = isset($_POST['login_pw']) ? $_POST['login_pw'] : null;
$login_name = isset($_POST['login_name']) ? $_POST['login_name'] : null;


if($hiddenid == 1) {
    $sql = "select *from user where id = '$id'";
    $res = $conn->query($sql);
    if($res -> num_rows > 0) {
    echo "<script>alert('이미 존재하는 아이디입니다.'); location.href='/join.html';</script>";
    exit();
    }
    
    }
     else {
    echo "<script>alert('아이디 양식이 올바르지 않습니다.'); location.href='/join.html'</script>";
    exit();
    }
     
    if($hiddennickname == 1) {
    $sql2 = "select *from member where nickname = '$nickname'";
    $res2 = $conn->query($sql2);
    
    if($res2 -> num_rows > 0) {
    echo "<script>alert('이미 존재하는 닉네임입니다.'); location.href='/join.html'</script>";
    exit();
    }
    
    } else {
    echo "<script>alert('닉네임 양식이 올바르지 않습니다.'); location.href='/join.html'</script>";
    exit();
    }
    
    if($hiddenpassword != 1) {
    echo "<script>alert('비밀번호 제출 양식이 올바르지 않습니다.'); location.href='/join.html';</script>";
    exit();
    }
    
    $sql3 = "insert into member (id,nickname,password) values ('$id','$nickname','$password')";
    $res3 = $conn->query($sql3);
    $sql4 = "select *from member where id = '$id' and nickname='$nickname'";
    $res4 = $conn->query($sql4);
    
    if($res4 -> num_rows > 0) {
    echo "<script>alert('회원가입을 성공하였습니다.'); location.href='/join.html'</script>";
    exit();
    }  else {
    echo "<script>alert('회원가입을 성공하지 못하였습니다.'); location.href='/join.html'</script>";
    }
    ?>







// 파라미터 체크
if ($login_id == null || $login_pw == null || $login_name == null){
header("Location: /regist.php");
exit();
}

// 회원 가입이 되어 있는지 검사
$member_count = db_select("select count(member_id) cnt from tbl_member where login_id = ?" , array($login_id));
if ($member_count && $member_count[0]['cnt'] == 1){
header("Location: /regist.php");
exit();
}

// 비밀번호 암호화
$bcrypt_pw = password_hash($login_pw, PASSWORD_BCRYPT);

// 데이터 저장
db_insert("insert into tbl_member (login_id, login_name, login_pw) values (:login_id, :login_name, :login_pw )",
array(
'login_id' => $login_id,
'login_name' => $login_name,
'login_pw' => $bcrypt_pw
)
);


// 로그인 페이지로 이동
header("Location: /login.php");