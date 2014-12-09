<?php
if ( ! defined('INIT')) exit('No direct script access allowed');

require_once $_SERVER['DOCUMENT_ROOT'] . '/modules/EpiException.php';
require_once $_SERVER['DOCUMENT_ROOT'] . '/modules/EpiDatabase.php';

//EpiDatabase::employ('mysql', 'u462831781_loft1', 'localhost', 'u462831781_loft1', 'q1w2Q!W@');
EpiDatabase::employ('mysql', 'u462831781_loft1');