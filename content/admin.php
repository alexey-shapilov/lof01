<?php
if (!defined('INIT')) exit('No direct script access allowed');
?>

<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Портфолио</title>

    <link rel="icon" type="image/png" href="/favicon.png" />

    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link rel="stylesheet" href="/css/style.css"/>

    <script src="/js/jquery.min.js"></script>
    <script src="/js/app.js"></script>
</head>
<body>
<div class="wrapper">
    <form action="login.ajax" class="b-admin">
        <h1 class="b-admin_title">Авторизуйтесь</h1>
        <div class="b-admin_title-underline"></div>
        <div class="b-admin_items">
            <div class="b-admin_items-item">
                <label for="">Логин</label>
                <input id="login" name="login" class="b-admin_items-item_input" type="text"/>
            </div>
            <div class="b-admin_items-item">
                <label for="password">Пароль</label>
                <input type="password" name="password" id="password" class="b-admin_items-item_input" type="text"/>
            </div>
        </div>
        <button class="b-admin_submit">Войти</button>
    </form>
</div>
</body>
</html>