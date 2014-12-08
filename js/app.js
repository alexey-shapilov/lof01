$(document).ready(function () {
    $('.active').prev().toggleClass('noactive');

    $('#submit_add_project').on('click', function () {
        var name_project = $('#name_project'),
            file_name = $('#file_name'),
            url_project = $('#url_project'),
            description_project = $('description_project'),
            form_project = $('#form_project'),
            tooltip =
                '<div class="b-tooltip">\
                    <div class="b-tooltip_text">\
                        #text#\
                    </div>\
                    <div class="b-tooltip_arrow">\
                        <div class="arrow1"></div>\
                        <div class="arrow2"></div>\
                    </div>\
                </div>',
            tooltip_t;

        function addToolTip(elem, width, text, top) {
            console.log(elem.position());
            if (elem.data('tooltip')) {
                elem.data('tooltip').prependTo(form_project);
                if (!elem.hasClass('error')) {
                    elem.toggleClass('error');
                }
            } else {
                tooltip_t = $(tooltip.replace('#text#', text));
                tooltip_t.width(width);
                if (top) {
                    tooltip_t.css('top', top);
                } else {
                    tooltip_t.css('top', elem.position().top + 8);
                }
                elem.toggleClass('error');
                elem.data('tooltip', tooltip_t);
                form_project.prepend(tooltip_t)
            }
        }

        if (name_project.val() == '') {
            addToolTip(name_project, 148, 'введите название');
        }
        if (file_name.text() == '') {
            addToolTip(file_name, 120, 'изображение', 171);
        }
        if (url_project.val() == '') {
            addToolTip(url_project, 145, 'ссылка на проект');
        }
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
    })
});
