<?php
ob_start();
?>

    <div class="b-main-info">
        <h1>Основная информация</h1>

        <div class="b-main-info_portrait">
            <img src="" alt="Моё фото"/>
        </div>
        <div class="b-main-info_wrapper">
            <ul class="b-main-info_info">
                <li class="b-main-info_info-item">
                    <span>Меня зовут: </span><span>Шапилов Алексей Юрьевич</span>
                </li>
                <li class="b-main-info_info-item">
                    <span>Мой возраст: </span><span>33 года</span>
                </li>
                <li class="b-main-info_info-item">
                    <span>Мой город: </span><span>Санкт-Петербург, Россия</span>
                </li>
                <li class="b-main-info_info-item">
                    <span>Моя специализация: </span><span>FRONTEND разработчик</span>
                </li>
            </ul>
            <div class="b-main-info_tags">
                <span>Ключевые навыки:</span>

                <div>
                    <span>html</span><span>css</span><span>javascript</span><span>gulp</span><span>git</span>
                </div>
            </div>
        </div>

    </div>

    <div class="b-experience">
        <h1>Опыт работы</h1>
        <ul>
            <li>
                <div class="img"></div>
                <div>
                    <h5>"ИП Боровицкий" - Продавец дисков</h5>
                    <span>Сентябрь 2005 - Август 2008</span>
                </div>
            </li>
            <li>
                <div class="img"></div>
                <div>
                    <h5>ООО "Системы безопасности" - Системный администратор</h5>
                    <span>Июнь 2008 - Июль 2010</span>
                </div>
            </li>
        </ul>
    </div>

    <div class="b-education">
        <h1>Образование</h1>
        <ul>
            <li>
                <div class="img"></div>
                <div>
                    <h5>Высшее. ОГУ</h5>
                    <span>1998 - 2003</span>
                </div>
            </li>
            <li>
                <div class="img"></div>
                <div>
                    <h5>Курс основы JavaScript (Илья Кантор)</h5>
                    <span>январь - февраль 2013 года</span>
                </div>
            </li>
        </ul>
    </div>
<?php
$content = ob_get_contents();
ob_end_clean();