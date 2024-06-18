<?php

    function view($pageName, $model = null, $viewBag = null, $isError = false) {
        require("view/layout.view.php");
    }

    function redirect($url){
        header("Location: $url");
        die();
    }

    function validateInput($input) {
    
        $trimmedInput = trim($input);

        $result = filter_var($trimmedInput, FILTER_SANITIZE_FULL_SPECIAL_CHARS);

        if (empty($result)) {
            return false;
        }

        return $result;
        
    }

    function formatInput($input) {
    
        return strtoupper($input[0]) . substr($input, 1);
        
    }

