<?php

echo writeLetter('','loft.01@mail.ru','Новый проект','Test');

function writeLetter($from, $to, $subject, $message, $format = 'plain', $encoding = 'utf-8', $bcc = '')
{
    $subject = "=?$encoding?B?" . base64_encode($subject) . '?=';
    $header = "Content-type: text/$format; charset=\"$encoding\"\r\n";
    $header .= "From: <noreply@shapilov.zz.mu>\r\n";
    $header .= "Subject: $subject\r\n";
    $header .= $bcc ? "BCC: $bcc\r\n" : '';
    return mail($to, $subject, $message, $header);
}