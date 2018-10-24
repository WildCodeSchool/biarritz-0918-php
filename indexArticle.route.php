<?php

require_once('./db_connection.php');
require_once('./Article.class.php');

function indexArticles($pdo)
{
    $sql = 'SELECT * FROM Article';
    $res = $pdo->query($sql);
    return $res->fetchAll(PDO::FETCH_CLASS, 'Article');
}


// function main()
// {
//     global $connection;
//     $articles = indexArticles($connection);
//     array_walk($articles, function ($article) {
//         echo $article;
//     });
// }

// main();
