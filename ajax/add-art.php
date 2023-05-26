<?php
    $title = trim(filter_var($_POST['title'],FILTER_SANITIZE_SPECIAL_CHARS));
    $anons = trim(filter_var($_POST['anons'],FILTER_SANITIZE_SPECIAL_CHARS));
    $full_text = trim(filter_var($_POST['fulltext'],FILTER_SANITIZE_SPECIAL_CHARS));
    $author = trim(filter_var($_POST['author'],FILTER_SANITIZE_SPECIAL_CHARS));

    $error = '';

    if(strlen($title) <= 10)
        $error = 'Insert title';
    else if(strlen($anons) <= 100)
        $error = 'Insert anons';
    else if(strlen($full_text) <= 200)
        $error = 'Insert full text';
    // else if(strlen($author) <= 5)
    //     $error = 'no author';

    if($error != '') {
        echo $error;
        exit();
    }
    
    require_once "../lib/mysql.php";

    $sql = 'INSERT INTO articles(title, anons, full_text, author) VALUES (:title, :anons, :full_text, :author)';
    $query = $pdo->prepare($sql);
    $query->execute(['title' => $title, 'anons' => $anons, 'full_text' => $full_text, 'author' => $author]);

    echo "Done";