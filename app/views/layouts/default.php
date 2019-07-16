<!doctype html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <!--<title>Лейаут по умолчанию</title>-->
        <?=$metatags?>
        <!--<meta name="description" content="The HTML5 Herald">
        <meta name="author" content="SitePoint">-->
        <link rel="stylesheet" href="css/styles.css?v=1.0">
    </head>
    <body>
        <h3>Лейаут по умолчанию</h3>
        <?=$content?>
        <?php
        $logs = \RedBeanPHP\R::getDatabaseAdapter()
            ->getDatabase()
            ->getLogger();

            debug_arr( $logs);
        ?>
    </body>
</html>
