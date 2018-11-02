<?php

require_once "vendor/autoload.php";

use App\Bag;
use App\Item;

$loader = new Twig_Loader_Filesystem('./templates');
$twig = new Twig_Environment($loader);

$items = array(
    new Item([
        'name' => 'gold',
        'value' => 3,
        'volume' => 1,
    ]),
);

$bags = array(
    new Bag(10),
);

echo $twig->render('index.html', array(
    'title' => 'Knapsack Problem',
    'items' => $items,
    'bags' => $bags,
    'problems' => array(),
));
