<?php


    function authenticateUser($users, $email, $password) {

        if (isset($users[$email])) {

            if ($users[$email]['password'] === $password) {
                return true;
            } else {
                return 'Valid password';
            }

        } else {
            return 'A user with this email does not exist';
        }
    }

    function isUserAuthenticated() {
        return isset($_SESSION['userId']);
    }

    function requireLogin() {
        if (!isUserAuthenticated()) redirect('login.php');
    }

    function checkIfUserExists($email, $users) {
        return isset($users[$email]);
    }