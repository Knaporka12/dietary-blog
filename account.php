<?php

    session_start();

    require('app/app.php');

    requireLogin();

    $user = $sqlDs->getUser($_SESSION['userId']);
    $posts = $sqlDs->getPostsByUser($user->id);

    view('account', ['user' => $user, 'posts' => $posts]);