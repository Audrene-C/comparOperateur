<?php

function loadClass($class)
{
    $path = $_SERVER['DOCUMENT_ROOT'];
    $path2 = "/simplon/Projets_groupe/comparOperateur";
    //require_once('E:/laragon/www/comparOperateur/classes/'.$class.'.php');
    require_once($path.$path2.'/classes/'.$class.'.php');

}


spl_autoload_register('loadClass');