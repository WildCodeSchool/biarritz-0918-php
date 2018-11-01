<?php

require_once "vendor/autoload.php";

use App\Page;
use Monolog\Handler\StreamHandler;
use Monolog\Logger;

// create a log channel
$log = new Logger('WAT');
$log->pushHandler(new StreamHandler('warning.log'));

// add records to the log
$log->warning('Foo');
$log->error('Bar');

$p = new Page('Welcom');
$log->warning($p->getTitle());
