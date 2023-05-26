<!DOCTYPE html>
<html lang="en">
<head>
    <?php
        $website_title = "Contacts";
        require "blocks/head.php" 
    ?>
</head>
<body>
    <?php require "blocks/header.php" ?>

    <main>
        <h1>Contacts</h1>
        <form >
            <label for="username">Your name</label>
            <input type="text" name="username" id="username" value="<?=isset($_COOKIE['log'])?$_COOKIE['log']:''?>">

            <label for="email">Email</label>
            <input type="email" name="email" id="email">

            <label for="title">Title</label>
            <input type="text" name="title" id="title">
            
            <label for="mess">Message</label>
            <textarea name="mess" id="mess" cols="30" rows="3"></textarea>

            <div class="error-mess" hi id="error-block"></div>
            
            <button type="button" id="mess_send">Add article</button>
        </form>
    </main>

    <?php require "blocks/aside.php" ?>
    <?php require "blocks/footer.php" ?>
    <script>
        $('#mess_send').click(function() {
            let name = $('#username').val();
            let email = $('#email').val();
            let title = $('#title').val();
            let mess = $('#mess').val();

            $.ajax({
                url: 'ajax/mail.php',
                type: 'POST',
                cache: false,
                data: {
                    'title' : title, 
                    'email' : email, 
                    'mess'  : mess, 
                    'name'  : name
                },
                dataType: 'html',
                success: function(data) {
                    if(data === "Done"){
                        $("#mess_send").text("Messege sent");
                        $("#error-block").hide();
                        $('#username').val("");
                        $('#email').val("");
                        $('#title').val("");
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