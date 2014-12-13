<?php
if (!defined('INIT')) exit('No direct script access allowed');
?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Портфолио</title>

    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link rel="icon" type="image/png" href="/favicon.png"/>

    <link rel="stylesheet" href="/css/style.css"/>
    <link rel="stylesheet" href="/css/fancybox/jquery.fancybox.css"/>
    <!--[if IE 8]><link rel="stylesheet" href="/css/ie8.css"/><![endif]-->

    <!--    <script src="/js/jquery.min.js"></script>-->
    <script src="/js/jquery.mini.1_11.js"></script>
    <script src="/css/fancybox/jquery.fancybox.pack.js"></script>
    <script src="/js/jquery.placeholder.js"></script>
    <script src="/js/app.js"></script>
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
            <div class="b-head_socials left">
                <a href="https://vk.com/alexey.shapilov" class="b-head_socials-vk"></a>
                <a href="" class="b-head_socials-twitter"> </a>
                <a href="" class="b-head_socials-facebook"> </a>
                <a href="" class="b-head_socials-github"> </a>
            </div>
            <i id='i-menu' class="i-menu left"></i>
        </div>
        <div class="split-line clearfix"></div>
    </div>