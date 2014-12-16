<?php
if (!defined('INIT')) exit('No direct script access allowed');
$title = 'Обо мне';
ob_start();
?>
    <div class="b-content left">
        <div class="b-main-info">
            <h1 class="b-main-info_title">Основная информация</h1>

            <div class="b-main-info_portrait left">
                <!--[if IE 8]><img src="/css/img/aie.png" alt="Моё фото"/><![endif]-->
                <![if !(IE 8)]> <img src="/css/img/a.jpg" alt="Моё фото"/> <![endif]>
            </div>
            <div class="b-main-info_wrapper left">
                <ul class="b-main-info_info">
                    <li class="b-main-info_info-item">
                        <span>Меня зовут: </span><span class="fs15 padding-left">Шапилов Алексей Юрьевич</span>
                    </li>
                    <li class="b-main-info_info-item">
                        <span>Мой возраст: </span><span class="fs15 padding-left">33 года</span>
                    </li>
                    <li class="b-main-info_info-item">
                        <span>Мой город: </span><span class="fs15 padding-left">Санкт-Петербург, Россия</span>
                    </li>
                    <li class="b-main-info_info-item">
                        <span>Моя специализация: </span><span class="fs15 padding-left">FRONTEND разработчик</span>
                    </li>
                </ul>
                <div class="b-main-info_tags">
                    <div class="f-bold left">Ключевые навыки:</div>

                    <div class="b-main-info_tags-list left">
                        <span class="b-main-info_tags-list_tag">html</span>
                        <span class="b-main-info_tags-list_tag">css</span>
                        <span class="b-main-info_tags-list_tag">javascript</span>
                        <span class="b-main-info_tags-list_tag">PHP</span>
                        <span class="b-main-info_tags-list_tag">Java</span>
                        <span class="b-main-info_tags-list_tag">git</span>
                    </div>
                </div>
            </div>
        </div>

        <div class="b-experience">
            <h1 class="b-experience_title">Опыт работы</h1>
            <ul class="b-experience-items">
                <li class="b-experience-items-item clearfix">
                    <div class="wrapico left">
                        <div class="ico"></div>
                    </div>
                    <div class="b-experience-items-item-desc left">
                        <h6>"ИП Боровицкий" - Продавец дисков</h6>
                        <span>Сентябрь 2005 - Август 2008</span>
                    </div>
                </li>
                <li class="b-experience-items-item clearfix">
                    <div class="wrapico left">
                        <div class="ico"></div>
                    </div>
                    <div class="b-experience-items-item-desc left">
                        <h6>ООО "Системы безопасности" - Системный администратор</h6>
                        <span>Июнь 2008 - Июль 2010</span>
                    </div>
                </li>
            </ul>
        </div>

        <div class="b-education">
            <h1 class="b-education_title">Образование</h1>
            <ul class="b-education_items">
                <li class="b-education_items-item clearfix">
                    <div class="wrapico left">
                        <div class="ico"></div>
                    </div>
                    <div class="b-education_items-item-desc left">
                        <h6>Высшее. ОГУ</h6>
                        <span>1998 - 2003</span>
                    </div>
                </li>
                <li class="b-education_items-item clearfix">
                    <div class="wrapico left">
                        <div class="ico2"></div>
                    </div>
                    <div class="b-education_items-item-desc left">
                        <h6>Курс основы JavaScript (Илья Кантор)</h6>
                        <span>январь - февраль 2013 года</span>
                    </div>
                </li>
            </ul>
        </div>
    </div>
<?php
$content = ob_get_contents();
ob_end_clean();