<?php
if (!defined('INIT')) exit('No direct script access allowed');

session_start();
require_once $_SERVER['DOCUMENT_ROOT'] . '/modules/includer.php';

$db = getDatabase();
$projects = $db->all('SELECT * from projects');

$token = md5(session_id() . microtime(true));

ob_start();
?>
    <div class="b-content left">
        <div id="modal" class="modal er">
            <div class="vertical-align">
                <form id="form_project" class="b-form-modal">
                    <a class="b-form-modal_btn-close" href="#close"></a>

                    <div class="b-form-modal_title">Добавление проекта</div>
                    <div class="b-form-modal_title-underline"></div>
                    <div class="b-form-modal_inputs">
                        <div class="b-form-modal_inputs-input-group">
                            <label for="name_project">Название проекта</label>
                            <input id="name_project" name="name_project" class="b-form-modal_inputs-edit" type="text"/>
                        </div>
                        <div class="b-form-modal_inputs-input-group">
                            <label for="file_project">Картинка проекта</label>

                            <div class="upload">
                                <input id="file_project" name="file_project" class="b-form-modal_inputs-upload"
                                       type="file"/>
                                <span id="file_name" class="b-form-modal_fn-upload"></span>
                                <span class="btn-upload"></span>
                            </div>
                        </div>
                        <div class="b-form-modal_inputs-input-group">
                            <label for="url_project">URL проекта</label>
                            <input id="url_project" name="url_project" class="b-form-modal_inputs-edit" type="text"/>
                        </div>
                        <div class="b-form-modal_inputs-input-group">
                            <label for="description_project">Описание</label>
                            <textarea id="description_project" class="b-form-modal_inputs-ta" name="description_project"
                                      id="" cols="30"
                                      rows="10"></textarea>
                        </div>
                    </div>
                    <button id="submit_add_project" class="b-form-modal_btn-submit">Добавить</button>
                </form>
            </div>
        </div>

        <div id="success" class="modal sc">
            <div class="vertical-align">
                <div class="b-success">
                    <div class="b-success_content">
                        <img id="close_success" src="/css/img/closesuccessico.png" alt="close"/>

                        <h1 class="success_title">Ура!</h1>

                        <p>Проект успешно добавлен.</p>
                    </div>
                </div>
            </div>
        </div>

        <div class="b-works">
            <h1 class="b-works_title">Мои работы</h1>

            <div class="b-works_items">
                <?php
                $k = 1;
                $p = '';
                $row = '<div class="row">#content#</div>';
                $item = '';
                foreach ($projects as $project) {
                    if ($k + 1 % 3 == 0) {
                        $r = str_replace('#content#', $item, $row);
                        $p .= $r;
                        $item = '';
                    }
                    $img_path = explode('::', $project['file']);
                    $item .= '<div class="b-works_items-item items-grid col-1">
                                <img src="/img/' . $img_path[0] . '/800x800/' . $img_path[1] . '.jpg" alt="' . $project['name'] . '"/>
                                <a class="b-works_items-item_url">' . $project['url'] . '</a>

                                <div class="b-works_items-item_desc">' . $project['description'] . '</div>
                            </div>';
                }

                if (true) {
                    $add = '<div class="b-works_items-item_add items-grid col-1">
                                <a href="#modal">
                                    Добавить проект
                                </a>
                            </div>';
                    $item .= $add;
                    $r .= str_replace('#content#', $item, $row);
                } else if ($item != '') {
                    $r .= str_replace('#content#', $item, $row);
                }
                echo $r;
                ?>
            </div>
        </div>
    </div>

    <iframe id="uploadImageFrame" name="uploadImageFrame" style="display: none"></iframe>
    <form action="/scripts/imageUpload.php" target="uploadImageFrame" method="POST" id="uploadImageForm"
          style="display: none" enctype="multipart/form-data">
        <input type="hidden" name="token" value="<?php echo $token; ?>">
    </form>
<?php
$content = ob_get_contents();
ob_end_clean();