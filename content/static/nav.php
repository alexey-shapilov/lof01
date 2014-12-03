<?php
if (!defined('INIT')) exit('No direct script access allowed');
$active_menu = $query[0];
?>
<div class="b-nav clearfix">
    <div class="b-menu">
        <ul class="b-menu_items">
            <li class="b-menu_items-item<?=($active_menu=='about'?' active':'')?>"><a href="/about">Обо мне</a></li>
            <li class="b-menu_items-item<?=($active_menu=='works'?' active':'')?>"><a href="/works">Мои работы</a></li>
            <li class="b-menu_items-item<?=($active_menu=='contacts'?' active':'')?>"><a href="/contacts">Связаться со мной</a></li>
        </ul>
    </div>

    <div class="b-contacts">
        <ul class="b-contacts_items">
            <li class="b-contacts_items-item">Контакты</li>
            <li class="b-contacts_items-item"><div class="ico"></div><a href="mailto:shapilov@mail.com">shapilov@mail.com</a>
            </li>
            <li class="b-contacts_items-item"><div class="ico"></div><a href="tel:+79312258624">+7 931 225 8624</a></li>
            <li class="b-contacts_items-item"><div class="ico"></div><a href="skype:alexey.shapilov?call">alexey.shapilov</a></li>
        </ul>
    </div>
</div>