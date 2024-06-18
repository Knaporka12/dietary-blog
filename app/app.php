<?php

    require('functions.php');
    require('auth_functions.php');
    require('config.php');
    require('data/sql_data_provider_class.php');

    $sqlDs = new sqlDataProvider(CONFIG['db']);