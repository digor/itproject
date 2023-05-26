<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Document</title>
</head>
<body>
    <?php
        $user = "root";
        $password = "";
        $db = "testing";
        $host = "localhost";

        $dsn = 'mysql:host='.$host.';dbname='.$db;
        $pdo = new PDO($dsn, $user, $password);

        // $query = $pdo->query('SELECT * FROM `users`');
        // while($row = $query->fetch(PDO::FETCH_OBJ)){
        //     echo '<h1>'. $row->login . '</h1>
        //     <p>Email: ' . $row->email .'</p>
        //     <p>Email: ' . $row->name .'</p>
        //     <p>Email: ' . $row->surname .'</p>';
        // }
        
        // echo '<hr>';
        // $name = 'Petru';
        // $id = 3;
        // $sql = 'SELECT `name`, `id`, `email` FROM `users` WHERE `name` = :name && `id` = :id';
        // $query = $pdo->prepare($sql);
        // $query->execute(['name' => $name, 'id' => $id]);

        // $users = $query->fetchAll(PDO::FETCH_OBJ);
        // foreach($users as $user) {
        //     echo '<h1>' . $user->name . '</h1>
        //     <p>Email: ' . $user->email .'</p>';
        // }

        // echo '<hr>';
        // $sql = 'SELECT * FROM `users` WHERE `id` = :id';
        // $query = $pdo->prepare($sql);
        // $query->execute(['id' => $id]);

        // $users = $query->fetchAll(PDO::FETCH_OBJ);
        // echo $user->email;

        // $login = 'codi888';
        // $email = 'test4@test.ru';
        // $name = 'Vlad2';
        // $surname = 'Dudari2';

        // $sql = 'INSERT INTO users(`login`, `email`, `name`, `surname`) VALUES(:login, :email, :name, :surname)';
        // $query = $pdo->prepare($sql);
        // $query->execute(['login' => $login, 'email' => $email, 'name' => $name, 'surname' => $surname]);

        // $id = 4;
        // $login = 'New Loghin';
        // $email = 'new_email@test.ru';

        // $sql = 'UPDATE `users` SET `login` = :login, `email` = :email WHERE `id` = :id';
        // $query = $pdo->prepare($sql);
        // $query->execute(['login' => $login, 'email' => $email, 'id' => $id]);

        // $id = 3;
        // $sql = 'DELETE FROM `users` WHERE `id` = ?';
        // $query = $pdo->prepare($sql);
        // $query->execute([$id]);
    ?>
</body>
</html>