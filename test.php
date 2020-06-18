<?php

$path1 = __DIR__;
$path2 = $_SERVER['DOCUMENT_ROOT'];

var_dump($path1);
echo "<br>";
var_dump($path2);
echo "<br>";
?>
<a href="/views/destinations.php">path1</a>
<a href="<?=$path2.'/views/destinations.php'?>">path2</a>

<!-- http://comparoperateur.loc/shared/httpd/comparOperateur/htdocs/views/destinations.php -->