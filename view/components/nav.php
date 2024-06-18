
<nav class="nav">

    <h1 class="nav__h1">Dietary Blog</h1>

    <ul class="nav__ul">

        <a href="index.php" class="nav__link"><li class="nav__li">Home</li></a>
        <a href="add_post.php" class="nav__link"><li class="nav__li">Add Post</li></a>

        <?php if (isUserAuthenticated()) {?>

            <a href="account.php" class="nav__link">
                <li class="nav__li">
                    <i class="fa-solid fa-user"></i>
                </li>
            </a>

        <?php } else { ?>

            <a href="login.php" class="nav__link">
                <li class="nav__li">Log in</li>
            </a>

        <?php } ?>

    </ul>

</nav>