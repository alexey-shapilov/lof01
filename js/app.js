(function ($) {
    $(document).ready(function () {

        // media query
        var
            media_query_lt320 = {
                matches: false
            },
            mob = false;
        if (window.matchMedia) {
            media_query_lt320 = window.matchMedia("screen and (max-width: 750px)");
            if (media_query_lt320.matches) {
                mob = true;
            }

            media_query_lt320.addListener(function (m) {
                if (m.matches) {
                    mob = true;
                } else {
                    mob = false;
                }
            });
        }

        $('.active').next().toggleClass('noactive'); // применяет класс к следующему элементу после активного в меню

        if ($.fancybox) $(".ch-info a").fancybox(); // fancybox для примеров работ

        // обработка нажатия на иконку меню в мобильных вариантах сайта
        $('#i-menu').on('click', function () {
            var nav = $('#nav-block');
            if (nav.is(":hidden")) {
                nav.show();
            } else {
                nav.hide();
            }
        });

        // обработка нажатия на кнопку добавления проекта
        $('#submit_add_project').on('click', function (event) {
            var name_project = $('#name_project'),
                file_name = $('#file_name'),
                url_project = $('#url_project'),
                description_project = $('description_project'),
                form_project = $('#form_project'),
                file_project = $("#file_project"),
                parent = $('body');
            err = false;
            event.preventDefault();

            // валидация, и вывод тултипов при ошибках
            if (name_project.val() == '' || name_project.val() == name_project.attr('placeholder')) {
                if (mob) {
                    addToolTip(name_project, 'down', parent, 'введите название', {width: 85});  // поквзывает подсказку над элементом
                } else {
                    // показывает подсказку слева от элемента, второй параметр функции указывает на направление стрелки
                    addToolTip(name_project, 'right', parent, 'введите название', {dy: 8}); // показывает подсказку слева от элемента
                }
                err = true;
            }
            if (file_name.text() == '' || file_name.text() == $('#file_project').attr('placeholder')) {
                if (mob) {
                    addToolTip(file_name, 'down', parent, 'изображение', {
                        width: 65,
                        offsetX: -51
                    });
                } else {
                    addToolTip(file_name, 'right', parent, 'укажите изображение', {offsetY: 8});
                }
                err = true;
            }
            if (url_project.val() == '' || url_project.val() == url_project.attr('placeholder')) {
                if (mob) {
                    addToolTip(url_project, 'down', parent, 'ссылку на проект', {width: 85});
                } else {
                    addToolTip(url_project, 'right', parent, 'ссылку на проект', {offsetY: 8});
                }
                err = true;
            }

            if (!err) {
                $.ajax({
                    type: "POST",
                    dataType: "json",
                    url: "/addWork.ajax",
                    data: form_project.serialize() + '&token=' + (file_project.data('token') ? file_project.data('token') : false),
                    success: function (response) {
                        if (response != null) {
                            if (response.errors.length !== 0) {
                            } else {
                                $('#modal').hide();
                                $('.success_text').text('Проект успешно добавлен.');
                                $('#success').show();
                                $('#works').append(response.res);
                            }
                        } else alert("Произошла ошибка")
                    }
                });
            }
        });

        $('#close_success').on('click', function () {
            $('#success').hide();
        });

        $('.b-form-modal_inputs').on('focus', '.b-form-modal_inputs-edit', function () {
            var $this = $(this);
            if ($this.hasClass('error')) {
                $this.toggleClass('error');
                $this.data('tooltip').detach();
            }
        });

        $('#file_project').on('change', function () {
            var $this = $(this),
                file_name = $('#file_name');
            file_name.text($this.val());
            if (file_name.hasClass('error') && $this.val() != '') {
                file_name.toggleClass('error');
                file_name.data('tooltip').detach();
            }
            if ($this.val() != '') {
                $this.appendTo("#uploadImageForm");
                $("#uploadImageForm").submit();
            }
        });

        $('#submit_feedback').on('click', function (event) {
                event.preventDefault();
                $('.b-feedback_items-item_input').each(function () {
                    var
                        $this = $(this);
                    if ($this.val() == $this.attr('placeholder')) {
                        $this.val('');
                    }
                });
                $.ajax({
                    type: "POST",
                    dataType: "json",
                    url: "/feedback.ajax",
                    data: $("#form_feedback").serialize(),
                    success: function (response) {
                        var elem;
                        if (response != null) {
                            if (response.errors.length !== 0) {
                                var parent;
                                if (response.errors['mail']) {
                                    parent = $('#error');
                                    addErrBlock(parent, response.errors['mail']);
                                }

                                parent = $('body');
                                if (response.errors['name_feedback']) {
                                    elem = $('#name_feedback');
                                    if (mob) {
                                        addToolTip(elem, 'down', parent, response.errors['name_feedback']);
                                    } else {
                                        addToolTip(elem, 'right', parent, response.errors['name_feedback'], {
                                            offsetY: 8
                                        });
                                    }
                                    !supports_input_placeholder() ? elem.val(elem.attr('placeholder')) : null;
                                }
                                if (response.errors['email_feedback']) {
                                    elem = $('#email_feedback');
                                    if (mob) {
                                        addToolTip(elem, 'down', parent, response.errors['email_feedback']);
                                    } else {
                                        addToolTip(elem, 'left', parent, response.errors['email_feedback'], {
                                            offsetY: 8
                                        });
                                    }
                                    !supports_input_placeholder() ? elem.val(elem.attr('placeholder')) : null;
                                }
                                if (response.errors['msg_feedback']) {
                                    elem = $('#msg_feedback');
                                    if (mob) {
                                        addToolTip(elem, 'down', parent, response.errors['msg_feedback']);
                                    } else {
                                        addToolTip(elem, 'right', parent, response.errors['msg_feedback'], {
                                            offsetY: 8
                                        });
                                    }
                                    !supports_input_placeholder() ? elem.val(elem.attr('placeholder')) : null;
                                }

                                if (response.errors['captcha']) {
                                    elem = $('#captcha');
                                    if (mob) {
                                        addToolTip(elem, 'down', parent, response.errors['captcha']);
                                    } else {
                                        addToolTip(elem, 'left', parent, response.errors['captcha'], {
                                            offsetY: 4
                                        });
                                    }
                                    !supports_input_placeholder() ? elem.val(elem.attr('placeholder')) : null;
                                }

                                // Обработчик на фокус элемента ввода, при фокусе выключает сообщение об ошибке
                                $('.b-feedback_items').on('focus', '.b-feedback_items-item_input', function () {
                                    var $this = $(this);
                                    if ($this.hasClass('error')) {
                                        $this.toggleClass('error');
                                        $this.data('tooltip').detach();
                                    }
                                });
                            } else {
                                $('#success').show();
                            }
                        } else alert("Произошла ошибка");
                    }
                });
            }
        );

        $('#show_add_project').on('click', function (e) {
            e.preventDefault();
            $('.modal.add_project').show();
        });

        $('#close_add_project').on('click', function (e) {
            $('.modal.add_project').hide();
            e.preventDefault();
        });

        $('#clear_feedback, #close_add_project').on('click', function () {
            $('.error').each(function () {
                var $this = $(this);
                var tooltip = $this.data('tooltip');
                if (tooltip) {
                    tooltip.detach();
                    $this.toggleClass('error');
                }
            });
        });

        $('.no-ie .information').css('height',$('.hover').outerHeight()-20);
        $('.no-ie .item').css('height',$('.hover').outerHeight());
        $('.no-ie .information').css('transform','rotateX(-90deg) translateZ('+$('.hover').outerHeight()/2+'px)');
        $('.no-ie .caption').css('transform','translateZ('+$('.hover').outerHeight()/2+'px)');
        $('.no-ie .hover .item').on({
            mouseenter: function () {
                $('.no-ie .information').show();
                $(this).css('transform', 'translateZ(' + $('.hover').outerHeight() / 2 + 'px) rotateX(90deg)');
            },
            mouseleave: function () {
                $(this).css('transform', 'none');
            }
        });

        // Обработчик нажатия кнопки "очистить" на странице обратной связи. Восстанавливает placeholder для ie8
        $('#clear_feedback').on('click', function (e) {
            if (!supports_input_placeholder()) {
                e.preventDefault();
                $('.b-feedback_items-item_input').each(function () {
                    var
                        $this = $(this);
                    $this.val($this.attr('placeholder'));
                });
            }
        });

        // Обработчик нажатия кнопки входа на странице авторизации
        $('.b-admin_submit').on('click', function (e) {
            var
                $login = $('#login'),
                $password = $('#password'),
                parent = $('body'),
                err = false;
            if ($password.val() == '') {
                if (mob) {
                    addToolTip($password, 'down', parent, 'введите пароль', {float: 'left', offsetX: 7});
                } else {
                    addToolTip($password, 'right', parent, 'введите пароль', {offsetY: 20});
                }

                err = true;
            }
            if ($login.val() == '' || $login.val() == $login.attr('placeholder')) {
                if (mob) {
                    addToolTip($login, 'down', parent, 'введите логин', {float: 'left', offsetX: 7});
                } else {
                    addToolTip($login, 'right', parent, 'введите логин', {offsetY: 20});
                }
                err = true;
            }
            if (err) {
                $('.b-admin_items').on('focus', '.b-admin_items-item_input', function () {
                    var $this = $(this);
                    if ($this.hasClass('error')) {
                        $this.toggleClass('error');
                        $this.data('tooltip').detach();
                    }
                });
                e.preventDefault();
            }
        });

        $("#password").on({
            focus: function () {
                $("#password-placeholder").hide();
            },
            blur: function () {
                if ($(this).val().length == 0) {
                    $("#password-placeholder").show();
                }
            }
        });

        $('.lock-open').on('click', function (e) {
            var $this = $(this);
            e.preventDefault();
            $.ajax({
                type: "POST",
                dataType: "json",
                url: "/logout.ajax",
                success: function (response) {
                    $('.success_text').text('Сессия завершена.');
                    $this .addClass('lock-close');
                    $this .removeClass('lock-open');
                    $this.attr('href','admin');
                    $('#success').show();
                }
            });
        });
        // активация плагина для имитации placeholder в ie8
        $('input[type="text"], textarea').placeholder();
    });
})(jQuery);

// функция вызывается при возвращении из ajax запроса на загрузку картинки
// запоминаем token загруженного файла

/**
 * Функция вызывается при возвращении из ajax запроса на загрузку картинки, запоминаем token загруженного файла
 * @param d {object} Объект возвращенный скриптом загрузки картинки
 */
function onResponse(d) {
    $("#file_project").data('token', d.rel);
}

/**
 * Проверяет поддержку атрибута placeholder
 * @returns {boolean}
 */
function supports_input_placeholder() {
    var i = document.createElement('input');
    return 'placeholder' in i;
}

/**
 * Добавляет сообщение об ошибке
 * @param parent {object} Элемент в который добавляется сообщение, должен быть обернут в jQuery
 * @param text {string} Текст сообщения
 */
function addErrBlock(parent, text) {
    var err_block =
        '<div class="error error_msg">\
            <h1>ОШИБКА!</h1>\
            <p>' + text + '</p>\
        </div>';
    if (!parent.data('err_block')) {
        parent.prepend(err_block);
        parent.data('err_block', 1);
    }
}

/**
 * Добавляет подсказу и класс error к элементу
 * @param elem {object} Элемент к которому добавляется подсказка об ошибке, должен быть завернут в jQuery
 * @param type {string} Направление стрелки
 * @param parent {object} Родительский элемент в дереве DOM для подсказок, должен быть завернут в jQuery
 * @param text {string} Текст подсказки
 * @param position {{top:number, left:number, right:number, offsetX:number, offsetY:number, float:string}=} Объект для позиционирования, может содержать свойства top, left, right, offsetX, offsetY, float
 */
function addToolTip(elem, type, parent, text, position) {
    var tooltip_right =
            '<div class="b-tooltip">\
                <div class="b-tooltip_text">\
                    ' + text + '\
                </div>\
                <div class="b-tooltip_arrow_r">\
                    <div class="arrow"></div>\
                </div>\
            </div>',
        tooltip_left =
            '<div class="b-tooltip">\
                <div class="b-tooltip_arrow_l">\
                    <div class="arrow"></div>\
                </div>\
                <div class="b-tooltip_text">\
                     ' + text + '\
                </div>\
            </div>',
        tooltip_down =
            '<div class="b-tooltip">\
                <div class="b-tooltip_text">\
                     ' + text + '\
                </div>\
                <div class="b-tooltip_arrow_d">\
                    <div class="arrow"></div>\
                </div>\
            </div>',
        $tooltip;

    if (!position) {
        position = {};
    }

    //if (elem.data('tooltip')) {
    //    elem.data('tooltip').prependTo(parent);
    //    if (!elem.hasClass('error')) {
    //        elem.toggleClass('error');
    //    }
    //} else {
    if (type == 'left') {
        $tooltip = $(tooltip_left);
    } else if (type == 'right') {
        $tooltip = $(tooltip_right);
    } else if (type == 'down') {
        $tooltip = $(tooltip_down);
    }

    elem.toggleClass('error');
    elem.data('tooltip', $tooltip);
    parent.prepend($tooltip);

    var offsetX = position.offsetX ? position.offsetX : 0,
        width = position.width ? position.width :
        $tooltip.find('.b-tooltip_text').outerWidth() + $tooltip.find('[class^="b-tooltip_arrow"]').outerHeight();
    if (type == 'right') {
        offsetX = -width + offsetX;
    } else if (type == 'left') {
        offsetX = elem.outerWidth() + offsetX;
    }

    $tooltip.width(width + 1);

    var
        pos = $tooltip.css('position') == 'fixed' ? elem[0].getBoundingClientRect() : getCoords(elem[0]),
        top = position.top ? position.top : pos.top + (position.offsetY ? position.offsetY : 0),
        left = position.left ? position.left + offsetX : pos.left + offsetX,
        right = position.right ? position.right + offsetX : document.body.clientWidth - pos.left - (position.float != 'left' ? elem.outerWidth() : $tooltip.width()) + offsetX;

    if (type == 'down') {
        $tooltip.css('right', right);
        $tooltip.css('top', top - $tooltip.outerHeight());
    } else {
        $tooltip.css('left', left);
        $tooltip.css('top', top);
    }
    //}
}

/**
 * Возвращает координаты относительно документа
 * @param elem {object} DOM элемент, для которого возвращаются координаты
 * @returns {{top: number, left: number}}
 */
function getCoords(elem) {
    var box = elem.getBoundingClientRect(); // координаты элемента относительно окна браузера

    var body = document.body;
    var docEl = document.documentElement;

    var scrollTop = window.pageYOffset || docEl.scrollTop || body.scrollTop;
    var scrollLeft = window.pageXOffset || docEl.scrollLeft || body.scrollLeft;

    var clientTop = docEl.clientTop || body.clientTop || 0;
    var clientLeft = docEl.clientLeft || body.clientLeft || 0;

    var top = box.top + scrollTop - clientTop;
    var left = box.left + scrollLeft - clientLeft;

    return {top: Math.round(top), left: Math.round(left)};
}