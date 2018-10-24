<?php
    require_once('./db_connection.php');
    require_once('./indexArticle.route.php');
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <style>
        body {
            display: flex;
            flex-direction: column;
        }
        article {
            border: 1px solid red;
            margin: 5px;
            padding: 5px;
            border-radius: 25px;
        }
    </style>
</head>
<body>
    <?php
    array_walk(indexArticles($connection), function ($article) {
        echo "<article> {$article->title} <p>{$article->body} </p> </article>";
    });
    ?>
</body>
</html>