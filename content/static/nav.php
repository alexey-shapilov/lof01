<?php
if (!defined('INIT')) exit('No direct script access allowed');
$active_menu = $query[0];
?>
<div id="nav-block" class="b-nav left">
    <div class="nav-block_arrow_up">
        <div class="arrow"></div>
    </div>
    <div class="b-menu">
        <ul class="b-menu_items">
            <li class="b-menu_items-item<?= ($active_menu == 'about' ? ' active' : ' hover') ?>">
                <a href="/about">
                    <div class="iwrapper">
                        <div class="item">
                            <div class="caption">Обо мне</div>
                            <span class="information">
                                Подробная информация
                            </span>
                        </div>
                    </div>
                </a>
            </li>
            <li class="b-menu_items-item<?= ($active_menu == 'works' ? ' active' : ' hover') ?>">
                <a href="/works">
                    <div class="iwrapper">
                        <div class="item">
                            <div class="caption">Мои работы</div>
                            <span class="information">
                                Примеры работ
                            </span>
                        </div>
                    </div>
                </a>
            </li>
            <li class="b-menu_items-item<?= ($active_menu == 'feedback' ? ' active' : ' hover') ?>">
                <a href="/feedback">
                    <div class="iwrapper">
                        <div class="item">
                            <div class="caption">Связаться со мной</div>
                            <span class="information">
                                Форма обратной связи
                            </span>
                        </div>
                    </div>
                </a>
            </li>
        </ul>
    </div>
    <div class="b-contacts">
        <h2 class="b-contacts_items-item_caption">Контакты</h2>
        <ul class="b-contacts_items">
            <li class="b-contacts_items-item">
                <div class="ico"></div>
                <a href="mailto:shapilov@mail.com">shapilov@mail.com</a>
            </li>
            <li class="b-contacts_items-item">
                <div class="ico"></div>
                <a href="tel:+79312258624">+7 931 225 8624</a>
            </li>
            <li class="b-contacts_items-item">
                <div class="ico"></div>
                <a href="skype:alexey.shapilov?call">alexey.shapilov</a>
            </li>
        </ul>
    </div>
</div>
