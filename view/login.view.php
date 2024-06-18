<?php
    $inputError = $viewBag['inputError']
?>

<main class="login">

    <h2 class="login__h2"> <span>Log in to our blog</span> to be able to add, edit, and delete posts</h2>

    <form action="" class="login__form" method="POST">

        <div>
            <label for="email">Email:</label>
            <input type="email" name="email" id="email" required>
        </div>
        
        <div>
            <label for="password">Password:</label>
            <input type="text" name="password" id="password" required>
        </div>

        <button type="submit">Log in</button>

        <?php if ($inputError) { ?>
            <p class="login__para-komunikat-invalid-input invalid"><?= $inputError ?></p>
        <?php } ?>

    </form>

    <p class="login__para-register">Don't have account yet? <a class="home-link" href="register.php">Register</a></p>

</main>