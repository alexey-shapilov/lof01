<?php
if (!defined('INIT')) exit('No direct script access allowed');

require_once PATH_MODULES . '/includer.php';

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

    $file = explode('::', $_REQUEST['token']);

    $res = '<div class="b-works_items-item items-grid col-1">
                 <div class="bl">
                    <div class="ch-item ch-img" style="background-image:url(img/' . $file[0] . '/800x800/' . $file[1] . '.jpg);
                    filter: progid:DXImageTransform.Microsoft.AlphaImageLoader(src=\'img/' . $file[0] . '/800x800/' . $file[1] . '.jpg\',sizingMethod=\'scale\')">
                        <div class="ch-info">
                            <a href="img/' . $file[0] . '/800x800/' . $file[1] . '.jpg"><span>' .$_REQUEST['name_project'] . '</span></a>
                        </div>
                    </div>
                </div>
                 <a class="b-works_items-item_url">' . $_REQUEST['url_project'] . '</a>
                 <div class="b-works_items-item_desc">' . $_REQUEST['description_project'] . '</div>
             </div>';

    $id = $db->insertId();

    if (!$id) {
        $error['project'] = 'Невозможно добавить проект';
    }
}

echo json_encode(array('errors' => $errors, 'res' => $res));