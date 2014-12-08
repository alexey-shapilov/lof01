<?php
if (!defined('INIT')) exit('No direct script access allowed');

ob_start();
?>
    <div class="b-content left">
        <div id="modal" class="modal">
            <div class="vertical-align">
                <form id="form_project" class="b-form-modal">
                    <a class="b-form-modal_btn-close" href="#close"></a>

                    <div class="b-form-modal_title">Добавление проекта</div>
                    <div class="b-form-modal_title-underline"></div>
                    <div class="b-form-modal_inputs">
                        <div class="b-form-modal_inputs-input-group">
                            <label for="">Название проекта</label>
                            <input id="name_project" class="b-form-modal_inputs-edit" type="text"/>
                        </div>
                        <div class="b-form-modal_inputs-input-group">
                            <label for="">Картинка проекта</label>
                            <div class="upload">
                                <input id="file_project" class="b-form-modal_inputs-upload" type="file"/>
                                <span id="file_name" class="b-form-modal_fn-upload"></span>
                                <span class="btn-upload"></span>
                            </div>
                        </div>
                        <div class="b-form-modal_inputs-input-group">
                            <label for="">URL проекта</label>
                            <input id="url_project" class="b-form-modal_inputs-edit" type="text"/>
                        </div>
                        <div class="b-form-modal_inputs-input-group">
                            <label for="">Описание</label>
                            <textarea id="description_project" class="b-form-modal_inputs-ta" name="" id="" cols="30" rows="10"></textarea>
                        </div>
                    </div>
                    <button id="submit_add_project" class="b-form-modal_btn-submit" type="submit">Добавить</button>
                </form>
            </div>
        </div>

        <div class="b-works">
            <h1 class="b-works_title">Мои работы</h1>

            <div class="b-works_items">
                <div class="row">
                    <div class="b-works_items-item items-grid col-1">
                        <img src="/img/IMG_6985.JPG" alt=""/>
                        <a class="b-works_items-item_url">site.ru</a>

                        <div class="b-works_items-item_desc">Описание работы Описание работы</div>
                    </div>
                    <div class="b-works_items-item items-grid col-1">
                        <img src="/img/IMG_6985.JPG" alt=""/>
                        <a class="b-works_items-item_url">site.ru</a>

                        <div class="b-works_items-item_desc">Описание работы Описание работы</div>
                    </div>
                    <div class="b-works_items-item items-grid col-1">
                        <img src="/img/IMG_6985.JPG" alt=""/>
                        <a class="b-works_items-item_url">site.ru</a>

                        <div class="b-works_items-item_desc">Описание работы Описание работы</div>
                    </div>
                </div>
                <div class="row">
                    <div class="b-works_items-item items-grid col-1">
                        <img src="/img/IMG_6985.JPG" alt=""/>
                        <a class="b-works_items-item_url">site.ru</a>

                        <div class="b-works_items-item_desc">Описание работы Описание работы</div>
                    </div>

                    <div class="b-works_items-item_add items-grid col-1">
                        <a href="#modal">
                            Добавить проект
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
<?php
$content = ob_get_contents();
ob_end_clean();