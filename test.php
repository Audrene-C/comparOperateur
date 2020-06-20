<?php
    $path = str_replace('views', '', __DIR__);
    include($path.'/config/autoload.php');
    include_once $path.'/partials/connection.php';
    $destinationsManager = new DestinationsManager($pdo);   

$destinations = $destinationsManager->getList();
var_dump($destinations);