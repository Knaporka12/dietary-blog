<?php
    $user = $model['user'];
    $posts = $model['posts'];
?>

<main class="account">

    <h2 class="account__h2">Your account:</h2>

    <div>
        <p class="account__para-dane">Name: <span><?= $user->name ?></span></p>
        <p class="account__para-dane">Surename: <span><?= $user->surename ?></span></p>
        <p class="account__para-dane">Email: <span><?= $user->email ?></span></p>
        <p class="account__para-dane last">Password: <span><?= $user->password ?></span></p>
    </div>

    <a href="logout.php"><button class="red-btn" >Log out</button></a>

    <h2 class="account__h2">Your posts:</h2>

    <?php if (!empty($posts)) { ?>


        <section class="account__post-list">

            <?php foreach($posts as $post) : ?>

                <?php $content = strlen($post->content) > 360 ? substr($post->content, 0, 360) . '...' : $post->content ?>
                <?php $title = strlen($post->title) > 38 ? substr($post->title, 0, 38) . '...' : $post->title ?>
                
                <article class="account__article-post">

                    <figure class="account__figure-post">
                        <img src="view/img/post1.jpg" alt="zdjecie-do-wpisu">
                    </figure>

                    <h3 class="account__h3-post bold"><?= $title?></h3>

                    <p class="account__para-post"><?=  $content ?></p>

                    <a href="post.php?postId=<?= $post->id?>" class="account__link-post">Go to post</a>

                </article>

            <?php endforeach; ?>

        </section>

    <?php } else  { ?>

        <h2 class="account__h2 no-matching">You've got no posts added yet</h2>

    <?php } ?>

</main>