<?php

    session_start();

    require('app/app.php');

    $viewBag = [];

    $post = null;

    $id  = isset($_GET['postId']) ? $_GET['postId'] : false;

    if ($id !== false) {

        $id = filter_var($id, FILTER_VALIDATE_INT);
        if ($id !== false) $post = $sqlDs->getPost($id); //strict equal bo id moze byc 0 czyli falsy 

    }

    if ($_SERVER['REQUEST_METHOD'] === "POST") {
        requireLogin();
        $sqlDs->deletePost($id);
        redirect('index.php');
    }

   view('post', $post, $viewBag);

 