<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title><?= $title?></title>
        <link href="css/main.css" rel="stylesheet" type="text/css"/>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
        <script src="js/main.js" type="text/javascript"></script>
    </head>
    <body>
        <div id="showtable">
        <?php
            include_once $layout_name;
        ?>
		</div>
       <div id="result"></div>
    </body>
</html>
