<!DOCTYPE html>
<html lang='ko'>

<head>
    <title>K-Mall</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="styles.css">
</head>

<body>
    <form action="product_list.php" method="post">
        <div class='navbar fixed'>
            <div class='container'>
                <a class='pull-left title' href="index.php">Drum school</a>
                <ul class='pull-right'>
                    
                    <input type="text" name="search_keyword" placeholder="drum school 통합검색">
                    
                    <?php
                        if (isset($_SESSION) === false){session_start();}

                        if (isset($_SESSION['member_id']) === false){
                        ?>

                    <a href="/regist.php">sign in</a>
                    <a href="/login.php">log in</a>
                    <?php
                        }else{
                        ?>
                    <a href="/logout.php">log out</a>
                    <?php
                        }
                        ?>

                </ul>
            </div>
        </div>
    </form>