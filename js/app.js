$(document).ready(function () {
    $('.active').prev().toggleClass('noactive');

    $('#submit_add_project').on('click', function (event) {
        var name_project = $('#name_project'),
            file_name = $('#file_name'),
            url_project = $('#url_project'),
            description_project = $('description_project'),
            form_project = $('#form_project'),
            file_project = $("#file_project"),
            err = false;

        if (name_project.val() == '') {
            addToolTip(name_project, 'right', form_project, 148, 'введите название');
            err = true;
        }
        if (file_name.text() == '') {
            addToolTip(file_name, 'right', form_project, 120, 'изображение', {top: 171});
            err = true;
        }
        if (url_project.val() == '') {
            addToolTip(url_project, 'right', form_project, 145, 'ссылка на проект');
            err = true;
        }

        if (!err) {
            $.ajax({
                type: "POST",
                dataType: "json",
                url: "/scripts/addWork.php",
                data: form_project.serialize() + '&token=' + (file_project.data('token') ? file_project.data('token') : false),
                success: function (response) {
                    console.log(response);
                    if (response != null) {
                        if (response.errors.length !== 0) {

                        } else {
                            $('#modal').hide();
                            $('#success').show();
                        }
                    } else alert("Произошла ошибка")
                }
            });
        }
        event.preventDefault();
    });

    $('#close_success').on('click',function(){
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
            $.ajax({
                type: "POST",
                dataType: "json",
                url: "/scripts/feedback.php",
                data: $("#form_feedback").serialize(),
                success: function (response) {
                    var elem;
                    if (response != null) {
                        if (response.errors.length !== 0) {

                            if (response.errors['mail']) {
                                var parent = $('#error');
                                addErrBlock(parent, response.errors['mail']);
                            }

                            var parent = $('#form_feedback');
                            //var parent = $('body');
                            if (response.errors['name_feedback']) {
                                elem = $('#name_feedback');
                                addToolTip(elem, 'right', parent, 62, response.errors['name_feedback'], {left: 63});
                            }
                            if (response.errors['email_feedback']) {
                                elem = $('#email_feedback');
                                addToolTip(elem, 'left', parent, 70, response.errors['email_feedback'], {left: 527});
                            }
                            if (response.errors['msg_feedback']) {
                                elem = $('#msg_feedback');
                                addToolTip(elem, 'right', parent, 107, response.errors['msg_feedback'], {left: 18});
                            }

                            if (response.errors['captcha']) {
                                elem = $('#captcha');
                                addToolTip(elem, 'left', parent, 89, response.errors['captcha'],
                                    {
                                        left: 527,
                                        top: elem.parent().position().top + 26
                                        //top: 580
                                    }
                                );
                            }
                            $('.b-feedback_items').on('focus', '.b-feedback_items-item_input', function () {
                                var $this = $(this);
                                if ($this.hasClass('error')) {
                                    $this.toggleClass('error');
                                    $this.data('tooltip').detach();
                                }
                            });
                        } else {

                        }
                    } else alert("Произошла ошибка");
                }
            });
            event.preventDefault();
        }
    );
});

function onResponse(d) {
    $("#file_project").data('token', d.rel).val("").prependTo(".modal .upload");
}

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

function addToolTip(elem, type, parent, width, text, position) {
    var tooltip_right =
            '<div class="b-tooltip">\
                <div class="b-tooltip_text">\
                    ' + text + '\
                </div>\
                <div class="b-tooltip_arrow_r">\
                    <div class="arrow1"></div>\
                    <div class="arrow2"></div>\
                </div>\
            </div>',
        tooltip_left =
            '<div class="b-tooltip">\
                <div class="b-tooltip_arrow_l">\
                    <div class="arrow1"></div>\
                    <div class="arrow2"></div>\
                </div>\
                <div class="b-tooltip_text">\
                     ' + text + '\
                </div>\
            </div>',
        tooltip,
        tooltip_t;

    if (!position) {
        position = {};
    }

    if (elem.data('tooltip')) {
        elem.data('tooltip').prependTo(parent);
        if (!elem.hasClass('error')) {
            elem.toggleClass('error');
        }
    } else {
        if (type == 'left') {
            tooltip = tooltip_left;
        } else {
            tooltip = tooltip_right;
        }

        tooltip_t = $(tooltip);
        tooltip_t.width(width);
        if (position.top) {
            tooltip_t.css('top', position.top);
        } else {
            tooltip_t.css('top', elem.position().top + 8);
        }
        if (position.left) {
            tooltip_t.css('left', position.left);
        }
        elem.toggleClass('error');
        elem.data('tooltip', tooltip_t);
        parent.prepend(tooltip_t)
    }
}