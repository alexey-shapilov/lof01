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
        <div id="header-block">
            <div class="b-head_logo">
                <div class="vert-center">
                    <div class="b-head_logo-element1">LOFTSCHOOL</div>
                    <div class="b-head_logo-element2">комплексное обучение web разработке</div>
                </div>
            </div>
        </div>
        <div class="b-head_socials-wrapper right">
            <ul class="b-head_socials clearfix">
                <li class="b-head_socials-item">
                    <a href="https://vk.com/alexey.shapilov" class="b-head_socials-vk">ВКонтакте</a>
                </li><li class="b-head_socials-item">
                    <a href="" class="b-head_socials-twitter">twitter</a>
                </li><li class="b-head_socials-item">
                    <a href="" class="b-head_socials-facebook">facebook</a>
                </li><li class="b-head_socials-item">
                    <a href="https://github.com/alexey-shapilov" class="b-head_socials-github">github</a>
                </li>
            </ul>
            <i id='i-menu' class="i-menu left"></i>
        </div>
        <div class="split-line clearfix"></div>
    </div>