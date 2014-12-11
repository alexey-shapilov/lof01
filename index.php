<?php

session_start();

error_reporting(0);

$_SESSION['INIT'] = true;

define('INIT', true);
define('PATH_BASE', dirname(__FILE__));
define('PATH_MODULES', PATH_BASE . '/modules');
define('PATH_SCRIPTS', PATH_BASE . '/scripts');
define('PATH_CONTENT', PATH_BASE . '/content');
define('PATH_CONTENT_STATIC', PATH_CONTENT . '/static');

$query = explode('/', $_GET['q']);

//если корневой уровень сайта, будем загружать скрипт about
if (!$query[0]) {
    $query[0] = 'about';
}

// будем считать что может быть только один уровень сайта

if (strpos($query[0], 'ajax') !== false) {
    require_once(PATH_SCRIPTS . '/' . substr($query[0], 0, -5) . '.php');
} else {
    require_once(PATH_CONTENT . '/' . $query[0] . '.php');
    if ($query[0] != 'admin') {
        require_once(PATH_CONTENT . '/' . 'template.php');
    }
}