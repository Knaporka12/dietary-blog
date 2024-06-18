<?php
    $categories = $model['categories'];
    $posts = $model['posts'];
    $id = $model['id'];
    $searchedPhrase = $model['searchedPhrase'];
    $searchError = $viewBag['searchError'];
    $categoryNameError = $viewBag['categoryNameError'];
?>

<main class="home">

    <h2 class="home__h2">Welcome to our blog!</h2>

    <?php if ($searchError) { ?>
        <p class="home__para-komunikat-invalid-category invalid"><?= $searchError ?></p>
    <?php } ?>

    <form action="" method="GET" class="home__form-search">

        <input type="text" name="search" id="search" placeholder=" Search our blog by post title" class="home__input-search">
        <button type="submit"  class="home__btn-search"><i class="fa-solid fa-magnifying-glass fa-2x"></i></button>

    </form>


    <?php if ($categories) {?>

        <form action="" method="GET" class="home__form-categories">

            <?php foreach($categories as $category) : ?>

                <?php

                    $active = '';
                    if (isset($_GET['categoryId'])){
                        if ($category->id == $_GET['categoryId']) $active = 'active';
                    }
                    
                ?>

                <button type="submit" value="<?= $category->id ?>" name="categoryId" class="home__btn-category <?= $active ?>">
                    <?= $category->name ?>
                </button>
                

            <?php endforeach; ?>

        </form>

    <?php } else { ?>

        <h3 class="home__h3">No categories added yet</h3>

    <?php } ?>

    <form action="" method="post" class="home__form-add-category">

        <div>
            <input type="text" name="categoryName" id="categoryName" required>
            <button type="submit">
                <i class="fa-solid fa-plus"></i>Add category
            </button>
        </div>

        <?php if ($categoryNameError) { ?>
            <p class="home__para-komunikat-invalid-category invalid"><?= $categoryNameError ?></p>
        <?php } ?>

    </form>

    <?php if (!empty($posts)) { ?>


        <section class="home__post-list">

            <?php foreach($posts as $post) : ?>

                <?php $content = strlen($post->content) > 360 ? substr($post->content, 0, 360) . '...' : $post->content ?>
                <?php $title = strlen($post->title) > 38 ? substr($post->title, 0, 38) . '...' : $post->title ?>
                
                <article class="home__article-post">

                    <figure class="home__figure-post">
                        <img src="view/img/post1.jpg" alt="zdjecie-do-wpisu">
                    </figure>

                    <h3 class="home__h3-post bold"><?= $title?></h3>

                    <p class="home__para-post"><?=  $content ?></p>

                    <a href="post.php?postId=<?= $post->id?>" class="home__link-post">Go to post</a>

                </article>

            <?php endforeach; ?>

        </section>

    <?php } else if ($id || $searchedPhrase) { ?>

        <h2 class="home__h2 no-matching">No matching results for your search</h2>

    <?php } else { ?>

        <h2 class="home__h2 no-matching">No posts added yet</h2>

    <?php } ?>

</main>