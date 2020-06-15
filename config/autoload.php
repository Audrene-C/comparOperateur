<?php

function loadClass($class)
{
    require_once('E:/laragon/www/comparOperateur/classes/'.$class.'.php');
}


spl_autoload_register('loadClass');