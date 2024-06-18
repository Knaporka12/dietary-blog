<?php 

    session_start();

    require('app/app.php');

    $error = $_SESSION['error'];

    if ($error !== null) {
        view('error', $error, true);
    } else {
        redirect('index.php');
    }
    