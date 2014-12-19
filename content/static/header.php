<?php
if (!defined('INIT')) exit('No direct script access allowed');
?>
<!doctype html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <title>Портфолио - <?= $title ?></title>

    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link rel="icon" type="image/png" href="/favicon.png"/>

    <link rel="stylesheet" href="/css/fancybox/jquery.fancybox.css"/>
    <link rel="stylesheet" href="/css/style.css"/>
    <!--[if IE 8]>
    <link rel="stylesheet" href="/css/ie8.css"/><![endif]-->

</head>
<body class="page-<?= $query[0] ?>">
<div class="wrapper">
    <div class="b-head">
        <div class="b-head-wrapper clearfix">
            <img class="b-head_logo" src="css/img/logo.png" alt=""/>
            <div class="b-head_socials-wrapper">
                <ul class="b-head_socials clearfix">
                    <li class="b-head_socials-item">
                        <a href="https://vk.com/alexey.shapilov" class="b-head_socials-vk"><span class="href_text">ВКонтакте</span></a>
                    </li><li class="b-head_socials-item">
                        <a href="" class="b-head_socials-twitter"><span class="href_text">twitter</span></a>
                    </li><li class="b-head_socials-item">
                        <a href="" class="b-head_socials-facebook"><span class="href_text">facebook</span></a>
                    </li><li class="b-head_socials-item">
                        <a href="https://github.com/alexey-shapilov" class="b-head_socials-github"><span class="href_text">github</span></a>
                    </li>
                </ul>
            </div>
            <i id='i-menu' class="i-menu"></i>
        </div>
        <div class="split-line clearfix"></div>
    </div>
