<?php

define('INIT', true);
define('PATH_BASE', dirname(__FILE__));
define('PATH_CONTENT', PATH_BASE . '/content');
define('PATH_CONTENT_STATIC', PATH_CONTENT . '/static');

$query = explode('/', $_GET['q']);

//если корневой уровень сайта, будем загружать скрипт about
if (!$query[0]) {
    $query[0] = 'about';
}

// будем считать что может быть только один уровень сайта

require_once(PATH_CONTENT . '/' . $query[0] . '.php');


require_once(PATH_CONTENT . '/' . 'template.php');