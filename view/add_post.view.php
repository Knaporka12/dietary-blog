<?php
    $inputError = $viewBag['inputError'];
    $categories = $model;
?>

<main class="add-post">

    <form action="" method="post" class="add-post__form">

        <div>
            <label for="postTitle">Title: </label>
            <input type="text" name="postTitle" id="postTitle" required>
        </div>
        
        <div>

            <label for="categoryId">Choose post category: </label>
            <select name="categoryId" id="categoryId">

                <?php foreach($categories as $category): ?>

                    <option value="<?= $category->id ?>"><?= $category->name ?></option>

                <?php endforeach ; ?>

            </select>

        </div>

        <div>
            <label for="postContent">Content: </label>
            <textarea name="postContent" id="postContent" required rows="30" cols="120"></textarea>
        </div>

        <button type="submit">Add post</button>

        <?php if ($inputError) { ?>
            <p class="add-post__para-komunikat-invalid-category invalid"><?= $inputError ?></p>
        <?php } ?>

        <?= $inputError ?>


    </form>

</main>