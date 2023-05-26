<?php
    $username = trim(filter_var($_POST['username'],FILTER_SANITIZE_SPECIAL_CHARS));
    $email = trim(filter_var($_POST['email'],FILTER_SANITIZE_EMAIL));
    $login = trim(filter_var($_POST['login'],FILTER_SANITIZE_SPECIAL_CHARS));
    $pass = trim(filter_var($_POST['password'],FILTER_SANITIZE_SPECIAL_CHARS));

    $error = '';

    if(strlen($username) <= 2)
        $error = 'Insert name';
    else if(strlen($email) <= 5)
        $error = 'Insert email';
    else if(strlen($login) <= 3)
        $error = 'Insert login';
    else if(strlen($pass) <= 5)
        $error = 'Insert password';

    if($error != '') {
        echo $error;
        exit();
    }
    
    require_once "../lib/mysql.php";

    $salt = 'jdkajdf^j)2-3040dkfm';
    $pass = md5($salt.$pass);

    $sql = 'INSERT INTO users(name, email, login, password) VALUES (:name, :email, :login, :password)';
    $query = $pdo->prepare($sql);
    $query->execute(['name' => $username, 'email' => $email, 'login' => $login, 'password' => $pass]);

    echo "Done";