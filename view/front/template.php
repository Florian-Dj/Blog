<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title><?= $title ?></title>
        <link href="../../bootstrap/css/bootstrap.min.css" rel="stylesheet">
        <link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" rel="stylesheet">
        <link href="./public/css/style.css" rel="stylesheet">
    </head>

    <body>
    <?php include 'header.php';?>
        <div class="container">
            <?=$content;?>
        </div>
            <?php include 'footer.php'?>
    </body>
</html>