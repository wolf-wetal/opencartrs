// Функция для получения переменных из URL
function getURLVar(key) {
    var value = [];

    var query = String(document.location).split('?');

    if (query[1]) {
        var part = query[1].split('&');

        for (i = 0; i < part.length; i++) {
            var data = part[i].split('=');

            if (data[0] && data[1]) {
                value[data[0]] = data[1];
            }
        }

        if (value[key]) {
            return value[key];
        } else {
            return '';
        }
    }
}

// Инициализация при загрузке документа
$(document).ready(function() {
    // Обработка tooltip
    var oc_tooltip = function() {
        var tooltip = bootstrap.Tooltip.getInstance(this);
        if (!tooltip) {
            tooltip = bootstrap.Tooltip.getOrCreateInstance(this);
            tooltip.show();
        }
    };

    $(document).on('mouseenter', '[data-bs-toggle=\'tooltip\']', oc_tooltip);

    $(document).on('click', 'button', function() {
        $('.tooltip').remove();
    });

    // Обработка datepicker
    var oc_datetimepicker = function() {
        $(this).daterangepicker({
            singleDatePicker: true,
            autoApply: true,
            autoUpdateInput: false,
            locale: {
                format: 'YYYY-MM-DD'
            }
        }, function(start, end) {
            $(this.element).val(start.format('YYYY-MM-DD'));
        });
    };

    $(document).on('focus', '.date', oc_datetimepicker);

    // Обработка timepicker
    var oc_timepicker = function() {
        $(this).daterangepicker({
            singleDatePicker: true,
            datePicker: false,
            autoApply: true,
            autoUpdateInput: false,
            timePicker: true,
            timePicker24Hour: true,
            locale: {
                format: 'HH:mm'
            }
        }, function(start, end) {
            $(this.element).val(start.format('HH:mm'));
        }).on('show.daterangepicker', function(ev, picker) {
            picker.container.find('.calendar-table').hide();
        });
    };

    $(document).on('focus', '.time', oc_timepicker);

    // Обработка datetimepicker
    var oc_datetimepicker = function() {
        $(this).daterangepicker({
            singleDatePicker: true,
            autoApply: true,
            autoUpdateInput: false,
            timePicker: true,
            timePicker24Hour: true,
            locale: {
                format: 'YYYY-MM-DD HH:mm'
            }
        }, function(start, end) {
            $(this.element).val(start.format('YYYY-MM-DD HH:mm'));
        });
    };

    $(document).on('focus', '.datetime', oc_datetimepicker);

    // Автоматическое закрытие уведомлений
    var oc_alert = function() {
        window.setTimeout(function() {
            $('.alert-dismissible').fadeTo(2000, 0, function() {
                $(this).remove();
            });
        }, 2000);
    };

    $(document).on('click', 'button', oc_alert);
    $(document).on('click', 'change', oc_alert);
});

// Обработка форм с data-oc-toggle="ajax"
$(document).on('submit', 'form', function(e) {
    var element = this;

    if (e.originalEvent !== undefined && e.originalEvent.submitter !== undefined) {
        var button = e.originalEvent.submitter;
    } else {
        var button = '';
    }

    var status = false;

    var ajax = $(element).attr('data-oc-toggle');

    if (ajax == 'ajax') {
        status = true;
    }

    var ajax = $(button).attr('data-oc-toggle');

    if (ajax == 'ajax') {
        status = true;
    }

    if (status) {
        e.preventDefault();

        // Сохраняем исходный HTML кнопки
        var buttonHtml = button ? button.innerHTML : '';

        // Блокируем кнопку и отображаем спиннер
        if (button) {
            $(button).prop('disabled', true).html('<i class="fa-solid fa-spinner fa-spin"></i>');
        }

        // Отправка AJAX-запроса
        $.ajax({
            url: $(element).attr('action').replaceAll('&amp;', '&'),
            type: $(element).attr('method') || 'post',
            data: $(element).serialize(),
            dataType: 'json',
            beforeSend: function() {
                if (button) {
                    $(button).prop('disabled', true).html('<i class="fa-solid fa-spinner fa-spin"></i>');
                }
            },
            complete: function() {
                if (button) {
                    $(button).prop('disabled', false).html(buttonHtml); // Восстанавливаем исходный HTML
                }
            },
            success: function(json) {
                console.log(json);

                // Очистка предыдущих уведомлений
                $('.alert-dismissible').remove();
                $(element).find('.is-invalid').removeClass('is-invalid');
                $(element).find('.invalid-feedback').removeClass('d-block');

                // Перенаправление
                if (json['redirect']) {
                    window.location.href = json['redirect'];
                }

                // Обработка ошибок
                if (typeof json['error'] == 'string') {
                    if (element.id === 'form-login-popup') {
                        $('#alert-popup').html('<div class="alert alert-danger alert-dismissible">' + json['error'] + ' <button type="button" class="btn-close" data-bs-dismiss="alert"></button></div>');
                    } else {
                        $('#alert').html('<div class="alert alert-danger alert-dismissible">' + json['error'] + ' <button type="button" class="btn-close" data-bs-dismiss="alert"></button></div>');
                    }
                }

                if (typeof json['error'] == 'object') {
                    if (json['error']['warning']) {
                        if (element.id === 'form-login-popup') {
                            $('#alert-popup').html('<div class="alert alert-danger alert-dismissible">' + json['error']['warning'] + ' <button type="button" class="btn-close" data-bs-dismiss="alert"></button></div>');
                        } else {
                            $('#alert').html('<div class="alert alert-danger alert-dismissible">' + json['error']['warning'] + ' <button type="button" class="btn-close" data-bs-dismiss="alert"></button></div>');
                        }
                    }

                    for (key in json['error']) {
                        $('#input-' + key.replaceAll('_', '-')).addClass('is-invalid').find('.form-control, .form-select, .form-check-input, .form-check-label').addClass('is-invalid');
                        $('#error-' + key.replaceAll('_', '-')).html(json['error'][key]).addClass('d-block');
                    }
                }

                // Обработка успешного ответа
                if (json['success']) {
                    if (element.id === 'form-login-popup') {
                        $('#alert-popup').html('<div class="alert alert-success alert-dismissible">' + json['success'] + ' <button type="button" class="btn-close" data-bs-dismiss="alert"></button></div>');
                        setTimeout(() => {
                            window.location.reload(); // Обновляем страницу после успешной авторизации
                        }, 1000);
                    } else {
                        $('#alert').html('<div class="alert alert-success alert-dismissible"><i class="fa-solid fa-circle-check"></i> ' + json['success'] + ' <button type="button" class="btn-close" data-bs-dismiss="alert"></button></div>');
                    }
                }
            },
            error: function(xhr, ajaxOptions, thrownError) {
                console.log(thrownError + "\r\n" + xhr.statusText + "\r\n" + xhr.responseText);

                // Восстанавливаем кнопку при ошибке
                if (button) {
                    $(button).prop('disabled', false).html(buttonHtml);
                }
            }
        });
    }
});

// Обработка загрузки файлов
$(document).on('click', 'button[data-oc-toggle=\'upload\']', function() {
    var element = this;

    if (!$(element).prop('disabled')) {
        $('#form-upload').remove();

        $('body').prepend('<form enctype="multipart/form-data" id="form-upload" style="display: none;"><input type="file" name="file" value=""/></form>');

        $('#form-upload input[name=\'file\']').trigger('click');

        $('#form-upload input[name=\'file\']').on('change', function(e) {
            if ((this.files[0].size / 1024) > $(element).attr('data-oc-size-max')) {
                alert($(element).attr('data-oc-size-error'));

                $(this).val('');
            }
        });

        if (typeof timer !== 'undefined') {
            clearInterval(timer);
        }

        var timer = setInterval(function() {
            if ($('#form-upload input[name=\'file\']').val() != '') {
                clearInterval(timer);

                $.ajax({
                    url: $(element).attr('data-oc-url'),
                    type: 'post',
                    data: new FormData($('#form-upload')[0]),
                    dataType: 'json',
                    cache: false,
                    contentType: false,
                    processData: false,
                    beforeSend: function() {
                        $(element).button('loading');
                    },
                    complete: function() {
                        $(element).button('reset');
                    },
                    success: function(json) {
                        console.log(json);

                        if (json['error']) {
                            alert(json['error']);
                        }

                        if (json['success']) {
                            alert(json['success']);
                        }

                        if (json['code']) {
                            $($(element).attr('data-oc-target')).attr('value', json['code']);
                        }
                    },
                    error: function(xhr, ajaxOptions, thrownError) {
                        console.log(thrownError + "\r\n" + xhr.statusText + "\r\n" + xhr.responseText);
                    }
                });
            }
        }, 500);
    }
});