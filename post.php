<!DOCTYPE html>
<html lang="en">
<head>
    <?php
        require_once "lib/mysql.php";
        $sql = 'SELECT * FROM articles WHERE id = :id';
        $query = $pdo->prepare($sql);
        $query->execute(['id' => $_GET['id']]);

        $article = $query->fetch(PDO::FETCH_OBJ);

        $website_title = $article->title;
        require "blocks/head.php" 
    ?>
</head>
<body>
    <?php require "blocks/header.php" ?>

    <main>
        <?php 
            echo "<div class='post'>
                    <h1>".$article->title."</h1>
                    <p>".$article->full_text."</p>
                    <p class='author'>Author: <span>".$article->author."</span></p>
                    <p><b>Published:</b> ". $article->date;
            if($article->date != $article->date_update)
            echo " | <b>Updated:</b> ". $article->date;
                    
            echo    "</p></div>";
        ?>
        <h1>Comment</h1>
        <form>
            <label for="username">Your name</label>
            <input type="text" name="username" id="username" value="<?=isset($_COOKIE['log'])?$_COOKIE['log']:''?>">
            
            <label for="mess">Message</label>
            <textarea name="mess" id="mess" cols="30" rows="3"></textarea>

            <div class="error-mess" id="error-block"></div>
            
            <button type="button" id="mess_send">Add Comment</button>
        </form>
        <div class="comments">
            <?php
            $sql = 'SELECT * FROM comments WHERE article_id = :article_id ORDER BY id DESC';
            $query = $pdo->prepare($sql);
            $query->execute(['article_id' => $_GET['id']]);

            $comments = $query->fetchAll(PDO::FETCH_OBJ);
            foreach($comments as $el) {
                echo "<div class='comment'>
                        <h2>". $el->name ."</h2>
                        <p>". $el->mess ."</p>
                    </div>";
            }
            ?>
        </div>
    </main>

    <?php require "blocks/aside.php" ?>
    <?php require "blocks/footer.php" ?>
    <script>
        $('#mess_send').click(function() {
            let name = $('#username').val();
            let mess = $('#mess').val();

            $.ajax({
                url: 'ajax/add_comment.php',
                type: 'POST',
                cache: false,
                data: {
                    'username'  : name, 
                    'mess'     : mess,
                    'id'  : '<?=$_GET['id']?>'
                },
                dataType: 'html',
                success: function(data) {
                    if(data === "Done"){
                        $(".comments").prepend(`<div class='comment'>
                                <h2>${name}</h2>
                                <p>${mess}</p>
                            </div>`);
                        $("#mess_send").text("Comment added!");
                        $("#error-block").hide();
                        $('#mess').val("");
                    }
                    else {
                        $("#error-block").show();
                        $("#error-block").text(data);
                    }
                }

            });
        });
    </script>
    
</body>
</html>