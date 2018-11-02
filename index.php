<?php

require_once "vendor/autoload.php";

use App\Bag;
use App\DB;
use App\Item;

$db = new DB();

$modelItems = $db->select('SELECT * FROM Items', 'App\Model');

// var_dump($db->insert('INSERT INTO Items(name,value,volume) VALUES("gold",100,2)'));

$loader = new Twig_Loader_Filesystem('./templates');
$twig = new Twig_Environment($loader);

$items = array_map(function ($modelItem) {
    return new Item(get_object_vars($modelItem));
}, $modelItems);

$bags = array(
    new Bag(10),
);

echo $twig->render('index.html', array(
    'title' => 'Knapsack Problem',
    'items' => $items,
    'bags' => $bags,
    'problems' => array(),
));
