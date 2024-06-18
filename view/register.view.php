<?php
    $inputError = $viewBag['inputError']
?>

<main class="register">

    <h2 class="register__h2"> Create an account</h2>

    <form action="" class="register__form" method="POST">

        <div>
            <label for="name">Name:</label>
            <input type="name" name="name" id="name" required>
        </div>
        
        <div>
            <label for="surename">Surename:</label>
            <input type="text" name="surename" id="surename" required>
        </div>

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
            <p class="register__para-komunikat-invalid-input invalid"><?= $inputError ?></p>
        <?php } ?>

    </form>

</main>