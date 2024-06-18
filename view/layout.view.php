<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="view/css/main.css" type="text/css">

    <title>Blog dietetyczny</title>

</head>
<body>

    <?php if ($isError){  ?>

        <?php  require("$pageName.view.php"); ?>

    <?php  } else  { ?>

        <?php  require('components/nav.php'); ?>

        <?php  require("$pageName.view.php"); ?>
        
        <?php  require('components/footer.php'); ?>

    <?php   } ?>
    

    <script src="https://kit.fontawesome.com/8a4cdf7df4.js" crossorigin="anonymous"></script>
</body>
</html>