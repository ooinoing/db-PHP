<!DOCTYPE html>
<html>
    <head>
        <title>회원가입</title>
    </head>
    <body>
        <?php require_once("/header.php"); ?>
        <h1>회원가입</h1>
        <form method="POST" action="register.post.php">
        <p>
            아이디 : 
            <input type="text" name="login_id" />
        <p>
        <p>
            비밀번호 : 
            <input type="password" name="login_pw" />
        <p>            
        <p>
            이름 : 
            <input type="text" name="login_name" />
        <p>
        <p><input type="submit" value="회원가입"></p>
        </form>
    </body>
</html>