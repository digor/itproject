<!DOCTYPE html>
<html lang="en">
<head>
    <?php
        $website_title = "Add article";
        require "blocks/head.php" 
    ?>
</head>
<body>
    <?php require "blocks/header.php" ?>

    <main>
        <h1>New article</h1>
        <form >
            <label for="title">Title</label>
            <input type="text" name="title" id="title">
            
            <label for="anons">Anons</label>
            <textarea name="anons" id="anons" cols="30" rows="4"></textarea>
            
            <label for="fulltext">Text</label>
            <textarea name="fulltext" id="fulltext" cols="30" rows="10"></textarea>
            
            <input type="text" name="author" hidden id="author" value="<?=$_COOKIE['log']?>">

            <div class="error-mess" hi id="error-block"></div>
            
            <button type="button" id="add_article">Add article</button>
        </form>
    </main>

    <?php require "blocks/aside.php" ?>
    <?php require "blocks/footer.php" ?>
    <script>
        $('#add_article').click(function() {
            let title = $('#title').val();
            let anons = $('#anons').val();
            let fulltext = $('#fulltext').val();
            let author = $('#author').val();

            $.ajax({
                url: 'ajax/add-art.php',
                type: 'POST',
                cache: false,
                data: {
                    'title'     : title, 
                    'anons'     : anons, 
                    'fulltext'  : fulltext, 
                    'author'    : author
                },
                dataType: 'html',
                success: function(data) {
                    if(data === "Done"){
                        $("#add_article").text("All good");
                        $("#error-block").hide();
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