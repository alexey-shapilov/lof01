<?php

session_start();

$errors = array();

/** Validate captcha */
if (!empty($_REQUEST['captcha'])) {
    if (empty($_SESSION['captcha']) || trim(strtolower($_REQUEST['captcha'])) != $_SESSION['captcha']) {
        $errors['captcha'] = "CAPTCHA";
        $errors['captcha_ses'] = $_SESSION['captcha'];
    }
    unset($_SESSION['captcha']);
} else {
    $errors['captcha'] = 'CAPTCHA';
}

if (empty($_REQUEST['name_feedback'])) {
    $errors['name_feedback'] = 'Имя';
}

if (empty($_REQUEST['email_feedback'])) {
    $errors['email_feedback'] = 'Email';
}

if (empty($_REQUEST['msg_feedback'])) {
    $errors['msg_feedback'] = 'Сообщение';
}

if (!count($errors)) {
    $mail_res = writeLetter('<noreply@shapilov.zz.mu>', 'loft.01@mail.ru', 'Новый проект', 'Имя: ' . $_REQUEST['name_feedback'] . '<br> Email: ' . $_REQUEST['name_feedback'] . '<br> Сообщение: ' . $_REQUEST['msg_feedback']);
    if (!$mail_res) {
        $errors['mail'] = 'Сообещине не может быть отправлено';
    }
}

echo json_encode(array('errors' => $errors));

function writeLetter($from, $to, $subject, $message, $format = 'plain', $encoding = 'utf-8', $bcc = '')
{
    $subject = "=?$encoding?B?" . base64_encode($subject) . '?=';
    $header = "Content-type: text/$format; charset=\"$encoding\"\r\n";
    $header .= "From: " . $from . "\r\n";
    $header .= "Subject: $subject\r\n";
    $header .= $bcc ? "BCC: $bcc\r\n" : '';
    return mail($to, $subject, $message, $header);
}