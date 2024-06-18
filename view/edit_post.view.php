<?php
    $post = $model['post']; 
    $categories = $model['categories']; 
    $inputError = $viewBag['inputError'];
?>

<main class="edit-post">

    <?php if ($post) { ?>

        <form action="" method="post" class="edit-post__form">

            <div>
                <label for="postTitle">New title: </label>
                <input value="<?= $post->title?>" type="text" name="postTitle" id="postTitle" required>
            </div>

            <div>

                <label for="categoryId">Update category: </label>
                <select name="categoryId" id="categoryId">

                    <?php foreach($categories as $category): ?>

                        <?php $selected = ($category->id === $post->categoryId) ? 'selected' : '' ?>

                        <option value="<?= $category->id ?>" <?= $selected ?> ><?= $category->name ?></option>

                    <?php endforeach ; ?>

                </select>

            </div>

            <div>
                <label for="postContent">New content: </label>
                <textarea name="postContent" id="postContent" required rows="30" cols="110"><?= $post->content?></textarea>
            </div>

            <?php if ($inputError) { ?>
                <p class="edit-post__para-komunikat-invalid-category invalid"><?= $inputError ?></p>
            <?php } ?>

            <button type="submit">Edit post</button>

        </form>

    <?php } else  { ?>
    
        <h2 class="edit-post__h2 no-matching">No post with given id</h2>
        <a href="index.php" class="home-link" >Go back to home page</a>

    <?php } ?>

</main>