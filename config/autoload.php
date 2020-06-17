<?php

function loadClass($class)
{
    $path = $_SERVER['DOCUMENT_ROOT'];
    //require_once('E:/laragon/www/comparOperateur/classes/'.$class.'.php');
    require_once($path.'/classes/'.$class.'.php');

}


spl_autoload_register('loadClass');