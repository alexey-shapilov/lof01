<?php
if (!defined('INIT')) exit('No direct script access allowed');

ob_start();
?>
    <div class="b-content left">
        <form id="form_feedback" class="b-feedback">
            <h1 class="b-feedback_title">У вас интересный проект? Напишите мне</h1>

            <div class="b-feedback_title-underline"></div>
            <div id="error"></div>
            <div class="b-feedback_items">
                <div class="row">
                    <div class="b-feedback_items-item left">
                        <label for="">Имя</label>
                        <input id="name_feedback" name="name_feedback" class="b-feedback_items-item_input" type="text" placeholder="Как к Вам обращаться"/>
                    </div>
                    <div class="b-feedback_items-item left">
                        <label for="">Email</label>
                        <input id="email_feedback" name="email_feedback" class="b-feedback_items-item_input" type="text" placeholder="Куда мне писать"/>
                    </div>
                </div>
                <div class="row">
                    <div class="b-feedback_items-item-text">
                        <label for="">Сообщение</label>
                        <textarea id="msg_feedback" name="msg_feedback" class="b-feedback_items-item_input" placeholder="Кратко в чем суть"></textarea>
                    </div>
                </div>
                <div class="row">
                    <label>Введите код указанный на картинке</label>

                    <div class="b-captcha">
                        <div class="b-feedback_items-item captcha left">
                            <img src="/modules/captcha/captcha.php" alt=""/>
                        </div>
                        <div class="b-feedback_items-item confirm left">
                            <input id="captcha" name="captcha" class="b-feedback_items-item_input left" type="text" placeholder="Введите код"/>
                        </div>
                    </div>
                </div>
                <div class="row clearfix">
                    <div class="b-feedback_items-buttons">
                        <button type="submit" id="submit_feedback" class="b-feedback_items-buttons-submit left">Отправить</button>
                        <button id="clear_feedback" type="reset" class="b-feedback_items-buttons-clear right">Очистить</button>
                    </div>
                </div>
            </div>
        </form>
    </div>

<?php
$content = ob_get_contents();
ob_end_clean();