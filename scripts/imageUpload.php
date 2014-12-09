<?php
require_once $_SERVER['DOCUMENT_ROOT'] . '/modules/upload/class.upload.php';

function jsOnResponse($obj)
{
    echo '<script> window.parent.onResponse(' . $obj . ')</script>';
}

function checkToken($token)
{
    if (preg_match("!^[a-zA-Z0-9]+$!", $token)) return true;
    else return false;
}

$errors = '';
$success = 0;
$thumbnail = '';
$token = '';
$filename = '';
$rel = '';


$config = new stdClass();
$config->tmpUploadsImageFolder = $_SERVER['DOCUMENT_ROOT'] . '/img/';

if (isset($_FILES['file_project']['tmp_name']) && isset($_POST['token']) && $_POST['token']) {
    if (checkToken($_POST['token'])) $token = $_POST['token'];
    else $errors .= "Ошибка загрузки изображения";

    if (!$errors) {
        $handle = new upload($_FILES['file_project']['tmp_name']);
        echo $handle->log;
        if (!$handle->uploaded)
            $errors .= ("Выберите фотографию для загрузки");
        if ($handle->file_src_size > (3 * 1024 * 1024))
            $errors .= ("Размер фотографии не должен превышать 3 Мб");
        if (!$handle->file_is_image)
            $errors .= ("Поддерживаемые форматы: PNG, JPG, GIF и BMP");

        if (!($errors)) {
            $filename = md5(session_id() . $handle->file_src_size . time());
            $handle->file_new_name_body = $filename;
            $handle->image_resize = true;
            $handle->image_ratio_no_zoom_in = true;
            $handle->image_y = 800;
            $handle->image_x = 800;
            $handle->file_new_name_ext = 'jpg';
            $handle->process($config->tmpUploadsImageFolder . $token . '/800x800/');
            if ($handle->processed) {
                $success = 1;
                $rel = $token . "::" . $filename;
            } else $errors .= $handle->error;

//            $handle = new upload($config->tmpUploadsImageFolder . $token . '/800x800/' . $filename . '.jpg');
//            $handle->file_new_name_body = $filename;
//            $handle->image_resize = true;
//            $handle->image_ratio_crop = true;
//            $handle->image_y = 120;
//            $handle->image_x = 120;
//            $handle->file_new_name_ext = 'jpg';
//            $handle->process($config->tmpUploadsImageFolder . $token . '/120x120/');
//            if ($handle->processed) {
//                $success = 1;
//                $thumbnail = $config->tmpHTTPUploadsImageFolder . $token . "/120x120/" . $filename . '.jpg';
//                $rel = $token . "::" . $filename;
//            } else $errors .= $handle->error;
        }
    }
}

// Зарузка файла по FTP

//if (isset($_FILES['file_project']['tmp_name']) && isset($_POST['object_id']) && $_POST['object_id']) {
//
//    $object_id = false;
//    $object_token = md5(session_id() . microtime(true));
//
//    if (is_numeric($_POST['object_id'])) {
//        $object = new Obj(false, $_POST['object_id']);
//        if (isset($object->info->user_id) && $object->info->user_id == $_SESSION['user_id']) {
//            $object_id = $object->info->object_id;
//        } else $errors .= "Ошибка загрузки изображения";
//    } else $errors .= "Ошибка загрузки изображения";
//
//    if ($object_id) {
////        $filesCount = Files::getFilesCount($config->objectsImagesFolder . $object_id . '/800x800/');
//        $filesCount = Files::getFtpFilesCount($config->objectsImagesFolder . $object_id . '/800x800/');
//        if ($filesCount >= $config->countImage) $errors .= 'Вы можете загружать максимум ' . $config->countImage . ' изображений';
//    }
//    //$imageinfo = getimagesize($_FILES['file_project']['tmp_name']);
//    //if($imageinfo['mime'] != 'image/gif' && $imageinfo['mime'] != 'image/jpeg' && $imageinfo['mime'] != 'image/jpg' && $imageinfo['mime'] != 'image/bmp') {
//    //	$errors.="Вы можете загружать изображения с расширениями jpg, jpeg, gif, bmp";
//    //}
//    if (!$errors) {
//        $handle = new upload($_FILES['file_project']['tmp_name']);
//        if (!$handle->uploaded)
//            $errors .= ("Выберите фотографию для загрузки");
//        if ($handle->file_src_size > (3 * 1024 * 1024))
//            $errors .= ("Размер фотографии не должен превышать 3 Мб");
//        if (!$handle->file_is_image)
//            $errors .= ("Поддерживаемые форматы: PNG, JPG, GIF и BMP");
//
//        if (!($errors)) {
//            $filename = md5(session_id() . $handle->file_src_size . time());
//            $handle->file_new_name_body = $filename;
//            $handle->image_resize = true;
//            $handle->image_ratio_no_zoom_in = true;
//            $handle->image_y = 800;
//            $handle->image_x = 800;
//            $handle->file_new_name_ext = 'jpg';
////            $handle->process($config->objectsImagesFolder . $object_id . '/800x800/');
//            $handle->process($config->tmpUploadsImageFolder . $object_token . '/800x800/');
//            if ($handle->processed) {
//                $handle->clean();
//            } else $errors .= $handle->error;
//
////            $handle = new upload($config->objectsImagesFolder . $object_id . '/800x800/' . $filename . '.jpg');
//            $handle = new upload($config->tmpUploadsImageFolder . $object_token . '/800x800/' . $filename . '.jpg');
//            $handle->file_new_name_body = $filename;
//            $handle->image_resize = true;
//            $handle->image_ratio_crop = true;
//            $handle->image_y = 120;
//            $handle->image_x = 120;
//            $handle->file_new_name_ext = 'jpg';
////            $handle->process($config->objectsImagesFolder . $object_id . '/120x120/');
//            $handle->process($config->tmpUploadsImageFolder . $object_token . '/120x120/');
//            if ($handle->processed) {
//                $success = 1;
//                $rel = $object_id . "::" . $filename;
//                Files::copyDirToFtp($config->tmpUploadsImageFolder . $object_token, $config->objectsImagesFolder . $object_id, $object_id);
//                $object->registerPhoto($filename . ".jpg");
//                Files::removeDir($config->tmpUploadsImageFolder . $object_token);
//                $thumbnail = $config->userHTTPImageFolder . $object_id . "/120x120/" . $filename . '.jpg';
//            } else $errors .= $handle->error;
//        }
//    }
//}

jsOnResponse("{'rel':'" . $rel . "', 'success':'" . $success . "', 'errors':'" . $errors . "'}");