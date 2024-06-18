<?php
    $post = $model; 
?>

<main class="post-page">

    <?php if ($post) { ?>

        <h2 class="post-page__h2"><?= $post->title ?></h2>

        <div class="post-page__container-category">

            <h3 class="post-page__h3">Category: </h3>
            <a href="index.php?categoryId=<?= $post->categoryId?>" class="post-page__link-category">
                <?= $post->categoryName ?>
            </a>

        </div>

        <p class="post-page__para-content"><?= $post->content ?></h2></p>

        <div class="post-page__container-bottom">

            <?php $author = " " . $post->userName . " " .  $post->userSurename ?>

            <p class="post-page__para-author">Author: <span class="bold"><?= $author ?></span></p>

            <div class="post-page__container-manage-post">

                <form action="" method="post">
                    <button type="submit" class="red-btn" >Delete Post</button>
                </form>

                <a href="edit_post.php?postId=<?= $post->id?>">
                    <button class="post-page__btn-edit">Edit Post</button>
                </a>

            </div>

        </div>


    <?php } else  { ?>
    
        <h2 class="post-page__h2 no-matching">No post with given id</h2>
        <a href="index.php" class="home-link" >Go back to home page</a>

    <?php } ?>

</main>