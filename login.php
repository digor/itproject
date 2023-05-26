<!DOCTYPE html>
<html lang="en">
<head>
    <?php
        $website_title = "Login";
        require "blocks/head.php" 
    ?>
</head>
<body>
    <?php require "blocks/header.php" ?>

    <main>
        <?php if(!isset($_COOKIE['log'])) : ?>
            <h1>Login</h1>
            <form>            
                <label for="login">Login</label>
                <input type="text" name="login" id="login">
                
                <label for="password">Password</label>
                <input type="password" name="password" id="password">

                <div class="error-mess" id="error-block"></div>
                
                <button type="button" id="login_user">Log IN</button>
            </form>
        <?php else: ?>
            <h2><?=$_COOKIE['log']?></h2>
            <form action="">
                <button type="button" id="exit_user">Log out</button>
            </form>
        <?php endif; ?>
    </main>

    <?php require "blocks/aside.php" ?>
    <?php require "blocks/footer.php" ?>
    <script>
        $('#login_user').click(function() {
            let login = $('#login').val();
            let pass = $('#password').val();

            $.ajax({
                url: 'ajax/login.php',
                type: 'POST',
                cache: false,
                data: {
                    'login'     : login, 
                    'password'  : pass
                },
                dataType: 'html',
                success: function(data) {
                    if(data === "Done"){
                        $("#login_user").text("All good");
                        $("#error-block").hide();
                        document.location.reload(true);
                    }
                    else {
                        $("#error-block").show();
                        $("#error-block").text(data);
                    }
                }

            });
        });

        $('#exit_user').click(function() {
            let login = $('#login').val();
            let pass = $('#password').val();

            $.ajax({
                url: 'ajax/exit.php',
                type: 'POST',
                cache: false,
                data: {},
                dataType: 'html',
                success: function(data) {
                    document.location.reload(true);
                }

            });
        });
    </script>
    
    
</body>
</html>