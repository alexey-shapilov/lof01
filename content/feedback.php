<?php
if (!defined('INIT')) exit('No direct script access allowed');

ob_start();
?>

    <div class="b-content left">
        <div class="b-feedback">
            <h1 class="b-feedback_title">У вас интересный проект? Напишите мне</h1>

            <div class="b-feedback_title-underline"></div>
            <div class="b-feedback_items">
                <div class="row">
                    <div class="b-feedback_items-item left">
                        <label for="">Имя</label>
                        <input class="b-feedback_items-item_input" type="text"/>
                    </div>
                    <div class="b-feedback_items-item left">
                        <label for="">Email</label>
                        <input class="b-feedback_items-item_input" type="text"/>
                    </div>
                </div>
                <div class="row">
                    <div class="b-feedback_items-item-text">
                        <label for="">Сообщение</label>
                        <textarea class="b-feedback_items-item_input"></textarea>
                    </div>
                </div>
                <div class="row">
                    <label>Введите код указанный на картинке</label>

                    <div>
                        <div class="b-feedback_items-item captcha left">
                            <img src="" alt=""/>
                        </div>
                        <div class="b-feedback_items-item confirm left">
                            <input class="b-feedback_items-item_input left" type="text"/>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="b-feedback_items-buttons">
                        <button class="b-feedback_items-buttons-submit left">Отправить</button>
                        <button class="b-feedback_items-buttons-clear right">Очистить</button>
                    </div>
                </div>
            </div>
        </div>
    </div>

<?php
$content = ob_get_contents();
ob_end_clean();