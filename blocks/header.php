<header>
    <span class="logo">Blog Master</span>
    <nav>
        <a href="index">Main</a>
        <a href="contacts">Contacts</a>
        <?php if(isset($_COOKIE['log'])) : ?>
            <a href="add-article">Add article</a>
            <a href="login" class="btn">User</a>
        <?php else : ?>
            <a href="login" class="btn">Login</a>
            <a href="register" class="btn">Register</a>
        <?php endif; ?>
    </nav>
</header>