<?php
define('INIT', true);

require_once $_SERVER['DOCUMENT_ROOT'] . '/modules/includer.php';

$errors = array();

if (empty($_REQUEST['name_project'])) {
}
if (empty($_REQUEST['file_project'])) {
}
if (empty($_REQUEST['url_project'])) {
}
if (empty($_REQUEST['description_project'])) {
}

if (!count($errors)) {

    $db = getDatabase();

    $db->execute(
        'INSERT INTO projects (name, file, url, description) VALUES(:name, :file, :url, :description)',
        array(
            ':name' => $_REQUEST['name_project'],
            ':file' => $_REQUEST['token'],
            ':url' => $_REQUEST['url_project'],
            ':description' => $_REQUEST['description_project']
        )
    );

    $id = $db->insertId();

    if (!$id) {
        $error['project'] = 'Невозможно добавить проект';
    }
}

echo json_encode(array('errors' => $errors));