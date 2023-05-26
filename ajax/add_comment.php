<?php
    $username = trim(filter_var($_POST['username'],FILTER_SANITIZE_SPECIAL_CHARS));
    $mess = trim(filter_var($_POST['mess'],FILTER_SANITIZE_SPECIAL_CHARS));
    $id = trim(filter_var($_POST['id'],FILTER_SANITIZE_SPECIAL_CHARS));

    $error = '';

    if(strlen($username) <= 2)
        $error = 'Insert name';
    else if(strlen($mess) <= 5)
        $error = 'Insert message';

    if($error != '') {
        echo $error;
        exit();
    }
    
    require_once "../lib/mysql.php";

    $sql = 'INSERT INTO comments(name, mess, article_id) VALUES (:name, :mess, :article_id)';
    $query = $pdo->prepare($sql);
    $query->execute(['name' => $username, 'mess' => $mess, 'article_id' => $id]);

    echo "Done";