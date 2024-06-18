<?php

    session_start();

    require('app/app.php');

    requireLogin();

    $viewBag = [
        "inputError" => null,
    ];

    $post = null;
    $categories = $sqlDs->getCategories();

    $id  = isset($_GET['postId']) ? $_GET['postId'] : false;

    if ($id !== false) {

        $id = filter_var($id, FILTER_VALIDATE_INT);
        if ($id !== false) $post = $sqlDs->getPost($id); //strict equal bo id moze byc 0 czyli falsy 

    }

    if ($_SERVER['REQUEST_METHOD'] === "POST") {

        $updatedTitle = validateInput($_POST['postTitle']);
        $updatedContent = validateInput($_POST['postContent']);
        $updatedCategoryId = filter_var($_POST['categoryId'], FILTER_VALIDATE_INT);

        if ($updatedTitle && $updatedContent && $updatedCategoryId) {

            $sqlDs->updatePost($id, formatInput($updatedTitle), formatInput($updatedContent), $updatedCategoryId);
            redirect("post.php?postId=$id");

        } else {
            $viewBag['inputError'] = 'Provide valid title and content';
        }

        
    }

   view('edit_post', ["post" => $post, 'categories' => $categories], $viewBag);

 