<?php

function loadClass($class)
{
    $path = str_replace('config', '', __DIR__);
    require_once('E:/laragon/www/comparOperateur/classes/'.$class.'.php');
    //require_once($path.'/classes/'.$class.'.php');
}


spl_autoload_register('loadClass');