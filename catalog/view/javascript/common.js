$(document).on('submit', 'form', function (e) {
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

        // Form attributes
        var form = e.target;

        var action = $(form).attr('action');

        var method = $(form).attr('method');

        if (method === undefined) {
            method = 'post';
        }

        var enctype = $(form).attr('enctype');

        if (enctype === undefined) {
            enctype = 'application/x-www-form-urlencoded';
        }

        // Form button overrides
        var formaction = $(button).attr('formaction');

        if (formaction !== undefined) {
            action = formaction;
        }

        var formmethod = $(button).attr('formmethod');

        if (formmethod !== undefined) {
            method = formmethod;
        }

        var formenctype = $(button).attr('formenctype');

        if (formenctype !== undefined) {
            enctype = formenctype;
        }

        // Отправка AJAX-запроса
        $.ajax({
            url: action.replaceAll('&amp;', '&'),
            type: method,
            data: $(form).serialize(),
            dataType: 'json',
            contentType: enctype,
            beforeSend: function () {
                $(button).button('loading');
            },
            complete: function () {
                $(button).button('reset');
            },
            success: function (json, textStatus) {
                console.log(json);
                console.log(textStatus);

                $('.alert-dismissible').remove();
                $(element).find('.is-invalid').removeClass('is-invalid');
                $(element).find('.invalid-feedback').removeClass('d-block');

                if (json['redirect']) {
                    window.location.href = json['redirect'];
                }

                if (typeof json['error'] == 'string') {
                    if (form.id === 'form-login-popup') {
                        // Ошибка для формы входа
                        $('#alert-popup').html('<div class="alert alert-danger alert-dismissible">' + json['error'] + ' <button type="button" class="btn-close" data-bs-dismiss="alert"></button></div>');
                    } else {
                        // Ошибка для других форм
                        $('#alert').prepend('<div class="alert alert-danger alert-dismissible">' + json['error'] + ' <button type="button" class="btn-close" data-bs-dismiss="alert"></button></div>');
                    }
                }

                if (typeof json['error'] == 'object') {
                    if (json['error']['warning']) {
                        if (form.id === 'form-login-popup') {
                            // Ошибка для формы входа
                            $('#alert-popup').html('<div class="alert alert-danger alert-dismissible">' + json['error']['warning'] + ' <button type="button" class="btn-close" data-bs-dismiss="alert"></button></div>');
                        } else {
                            // Ошибка для других форм
                            $('#alert').prepend('<div class="alert alert-danger alert-dismissible">' + json['error']['warning'] + ' <button type="button" class="btn-close" data-bs-dismiss="alert"></button></div>');
                        }
                    }

                    for (key in json['error']) {
                        $('#input-' + key.replaceAll('_', '-')).addClass('is-invalid').find('.form-control, .form-select, .form-check-input, .form-check-label').addClass('is-invalid');
                        $('#error-' + key.replaceAll('_', '-')).html(json['error'][key]).addClass('d-block');
                    }
                }

                if (json['success']) {
                    if (form.id === 'form-login-popup') {
                        // Успешная авторизация
                        $('#alert-popup').html('<div class="alert alert-success alert-dismissible">' + json['success'] + ' <button type="button" class="btn-close" data-bs-dismiss="alert"></button></div>');
                        setTimeout(() => {
                            window.location.reload(); // Обновляем страницу
                        }, 1000);
                    } else {
                        // Успех для других форм
                        $('#alert').prepend('<div class="alert alert-success alert-dismissible"><i class="fa-solid fa-circle-check"></i> ' + json['success'] + ' <button type="button" class="btn-close" data-bs-dismiss="alert"></button></div>');
                    }
                }
            },
            error: function (xhr, ajaxOptions, thrownError) {
                console.log(thrownError + "\r\n" + xhr.statusText + "\r\n" + xhr.responseText);
            }
        });
    }
});