<?php

require_once('./db_connection.php');

/**
 * @param article - array with id, title, body, ...
 */
function addArticle($pdo, $article)
{
    $sql = 'INSERT INTO Article VALUES (:id, :title, :body, :createdAt, :updatedAt, :isPublished )';
    $prep = $pdo->prepare($sql);
    return $prep->execute([
        ":id" => $article['id'],
        ":title" => $article['title'],
        ":body" => $article['body'],
        ":createdAt" => $article['createdAt'],
        ":updatedAt" => $article['updatedAt'],
        ":isPublished" => $article['isPublished']
    ]);
}

function castToArticle($data)
{
    list(
        'id' =>  $id,
        'title' => $title,
        'body' => $body,
        'createdAt' => $createdAt,
        'updatedAt' => $updatedAt,
        'isPublished' => $isPublished
        ) = $data;

    $id = (int) $id;
    $title = (string) $title;
    $body = (string) $body;
    $createdAt = (string) $createdAt;
    $updatedAt = (string) $updatedAt;
    $isPublished = (int)(bool) $isPublished;

    return array(
        'id' =>  $id,
        'title' => $title,
        'body' => $body,
        'createdAt' => $createdAt,
        'updatedAt' => $updatedAt,
        'isPublished' => $isPublished
    );
}


function main()
{
    global $connection;
    $query = addArticle($connection, castToArticle($_POST));
    if ($query) {
        echo 'Done';
    } else {
        echo 'erf';
    }
}

main();
