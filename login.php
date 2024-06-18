<?php

    session_start();

    require('app/app.php');

    $viewBag = [
        'inputError' => null
    ];

    $users = $sqlDs->getUsers();

    if ($_SERVER['REQUEST_METHOD'] === "POST") {

        $email = validateInput($_POST['email']);
        $password = validateInput($_POST['password']);

        if ($email && $password) {

            $isAuthenticated = authenticateUser($users, $email, $password);
            
            if ($isAuthenticated === true){
                $_SESSION['userId'] = $users[$email]['id'];
                redirect("account.php");
            } else {
                $viewBag['inputError'] = $isAuthenticated;
            }

        } else {
            $viewBag['inputError'] = 'Provide valid user data';
        }

    }

    view('login', '', $viewBag);