<?php
    $username = trim(filter_var($_POST['name'],FILTER_SANITIZE_SPECIAL_CHARS));
    $email = trim(filter_var($_POST['email'],FILTER_SANITIZE_EMAIL));
    $title = trim(filter_var($_POST['title'],FILTER_SANITIZE_SPECIAL_CHARS));
    $mess = trim(filter_var($_POST['mess'],FILTER_SANITIZE_SPECIAL_CHARS));

    $error = '';

    if(strlen($username) <= 2)
        $error = 'Insert name';
    else if(strlen($email) <= 5)
        $error = 'Insert email';
    else if(strlen($title) <= 3)
        $error = 'To less or no message in field Title';
    else if(strlen($mess) <= 15)
        $error = 'To less or no message in field';

    if($error != '') {
        echo $error;
        exit();
    }
    
    $to = "admin#test.ru";
    $subject = "=?utf-8?B?".base64_encode("New message")."?=";
    $message = "User: $username.<br>$mess";
    $headers = "From $email\r\nReply-to: $email\r\nContent-type: text/html; charset=utf-8\r\n";
    mail($to, $subject,$message,$headers);

    echo "Done";