<!DOCTYPE html>
<html lang="en">
<head>
    <?php
        $website_title = "Blog Master";
        require "blocks/head.php" 
    ?>
</head>
<body>
    <?php require "blocks/header.php" ?>

    <main>
        <h1>Main page</h1>
        <?php 
            require_once "lib/mysql.php";
            

            $sql = 'SELECT * FROM articles ORDER BY `date` DESC';
            $query = $pdo->query($sql);

            while($row = $query->fetch(PDO::FETCH_OBJ)){
                echo "<div class='post'>
                        <h1>".$row->title."</h1>
                        <p>".$row->anons."</p>
                        <p class='author'>Author: <span>".$row->author."</span></p>
                        <a href='post.php?id=".$row->id."' title='".$row->title."'>Read</a>
                    </div>";
            }
        ?>
        
    </main>

    <?php require "blocks/aside.php" ?>
    <?php require "blocks/footer.php" ?>
    
    
</body>
</html>