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
        $name = validateInput($_POST['name']);
        $surename = validateInput($_POST['surename']);

        if ($email && $password && $name && $surename) {

            if(!checkIfUserExists($email, $users)){

                $sqlDs->addUser($name, $surename, $email, $password);
                $users = $sqlDs->getUsers();
                $_SESSION['userId'] = $users[$email]['id'];
                redirect("account.php");

            } else {
                $viewBag['inputError'] = 'User with that email already exists';
            }

        } else {
            $viewBag['inputError'] = 'Provide valid input';
        }

    }

    view('register', '', $viewBag);