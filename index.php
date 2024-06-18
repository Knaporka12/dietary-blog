<?php

    session_start();

    require('app/app.php');

    $viewBag = [
        'searchError' => null,
        'categoryNameError' => null,
    ];

    if ($_SERVER['REQUEST_METHOD'] === 'POST') {

        $categoryName = validateInput($_POST['categoryName']);

        if ($categoryName) {
            $sqlDs->addCategory(formatInput($categoryName));
        } else {
            $viewBag['categoryNameError'] = 'Provide valid input';
        }
    }

    $posts;
    $id  = isset($_GET['categoryId']) ? $_GET['categoryId'] : false;
    $searchedPhrase  = isset($_GET['search']) ? $_GET['search'] : false;

    if ($id !== false) {

        $id = filter_var($id, FILTER_VALIDATE_INT);
        if ($id !== false) $posts = $sqlDs->getPostsByCategory($id); //strict equal bo id moze byc 0 czyli falsy 

    }

    if ($searchedPhrase) {

        $searchedPhrase = validateInput($searchedPhrase);

        if ($searchedPhrase)  {
            $posts = $sqlDs->getPostsByTitle($searchedPhrase);
        } else {
            $viewBag['searchError'] = 'Provide valid input';
        }
        
        
    }   

    if ($id === false && !$searchedPhrase) $posts = $sqlDs->getPosts();

   $categories = $sqlDs->getCategories();

   view(
        'index', 
        ['categories' => $categories, 'posts' => $posts , 'id' => $id, 'searchedPhrase' => $searchedPhrase],
        $viewBag
    );

 