<?php

    session_start();

    require('app/app.php');

    requireLogin();

    $viewBag = [
        "inputError" => null,
    ];

    $categories = $sqlDs->getCategories();

    if ($_SERVER['REQUEST_METHOD'] === "POST") {

        $postTitle = validateInput($_POST['postTitle']);
        $postContent = validateInput($_POST['postContent']);
        $categoryId = filter_var($_POST['categoryId'], FILTER_VALIDATE_INT);

        if ($postTitle && $postContent && $categoryId) {
            $sqlDs->addPost(formatInput($postTitle), formatInput($postContent), $categoryId, $_SESSION["userId"]);
            $posts = $sqlDs->getPosts();
            $postId = $posts[count($posts) - 1]->id;
            redirect("post.php?postId=$postId");
        } else {
            $viewBag['inputError'] = 'Provide valid title and content';
        }

        
    }

   view('add_post', $categories, $viewBag);

 