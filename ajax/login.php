<?php
    $login = trim(filter_var($_POST['login'],FILTER_SANITIZE_SPECIAL_CHARS));
    $pass = trim(filter_var($_POST['password'],FILTER_SANITIZE_SPECIAL_CHARS));

    $error = '';



    if(strlen($login) <= 3)
        $error = 'Insert login';
    else if(strlen($pass) <= 5)
        $error = 'Insert password';

    if($error != '') {
        echo $error;
        exit();
    }

    $salt = 'jdkajdf^j)2-3040dkfm';
    $pass = md5($salt.$pass);

    require_once "../lib/mysql.php";

    $sql = 'SELECT id FROM users WHERE `login` = :login AND `password` = :password';
    $query = $pdo->prepare($sql);
    $query->execute(['login' => $login, 'password' => $pass]);

    if($query->rowCount() == 0)
        echo "no user";
    else{ 
        setcookie('log', $login, time() + 3600 * 24 * 30, "/");
        echo "Done";
    }