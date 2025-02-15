let _processing = false;
let _nextPageUrl = null;

function hidePagination() {
    $('.row:last').hide();
}

function updateQueryStringParameter(uri, key, value) {
    let re = new RegExp("([?&])" + key + "=.*?(&|$)", "i");
    let separator = uri.indexOf('?') !== -1 ? "&" : "?";
    if (uri.match(re)) {
        return uri.replace(re, '$1' + key + "=" + value + '$2');
    } else {
        return uri + separator + key + "=" + value;
    }
}

function getPageNumberFromUrl(url) {
    let results = new RegExp('[\?&]page=([^&#]*)').exec(url);
    return results !== null ? parseInt(results[1] || 1) : 1;
}

function getNextPageContent(callback) {
    if (!_nextPageUrl || _processing) return;

    let pageNum = getPageNumberFromUrl(_nextPageUrl);
    let nextUrl = updateQueryStringParameter(window.location.href, 'page', pageNum);
    history.pushState(null, null, nextUrl);

    $('.product-layout').parent().addClass("infscrlintro");
    $('#loading-indicator').show();

    $.ajax({
        url: nextUrl,
        dataType: 'html',
        cache: false,
        beforeSend: function () {
            _processing = true;
        },
        success: function (html) {
            _processing = false;
            $('#loading-indicator').hide();

            let newItems = $(html).find('.product-layout .item');
            $('.product-layout').append(newItems);

            _nextPageUrl = getNextPageUrlFromPagination($(html).find('ul.pagination'));
            if (!_nextPageUrl) {
                $('#show-more-button').hide();
            }
            if (callback) callback();
        },
        error: function (xhr) {
            console.error(xhr.responseText);
            $('#loading-indicator').hide();
        }
    });
}

function getNextPageUrlFromPagination(paginationElem) {
    let url = null;
    if (paginationElem) {
        let activeElem = paginationElem.find('.active');
        if (activeElem.length > 0) {
            let nextElem = activeElem.next();
            if (nextElem.length > 0) {
                url = nextElem.find('a').attr('href');
            }
        }
    }
    return url;
}

$(document).ready(function () {
    _nextPageUrl = getNextPageUrlFromPagination($('ul.pagination'));
    hidePagination();

    if (_nextPageUrl) {
        $('#show-more-button').show().on('click', function() {
            if (!_processing) {
                getNextPageContent();
            }
        });
    } else {
        $('#show-more-button').hide();
    }

    // Проверяем наличие параметров в URL и выполняем AJAX запрос при возврате на категорию
    let initialPage = getPageNumberFromUrl(window.location.href);
    if (initialPage > 1) {
        let currentPage = 2;
        let loadContentSequentially = function() {
            if (currentPage <= initialPage) {
                getNextPageContent(() => {
                    currentPage++;
                    loadContentSequentially();
                });
            }
        };
        loadContentSequentially();
    }
});
