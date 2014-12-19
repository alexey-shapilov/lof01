<?php
session_start();

$_SESSION['user_login'] = '';
unset($_SESSION['user_login']);

echo json_encode(array('success' => 'ok'));