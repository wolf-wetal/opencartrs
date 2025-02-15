/*
var live_search = {
    selector: '#search input[name=\'search\']',
    text_no_matches: 'К сожалению ничего не нашлось',
    height: '50px'
};

$(document).ready(function() {
    var html = '';
    html += '<div class="live-search">';
    html += '    <ul>';
    html += '    </ul>';
    html += '<div class="result-text"></div>';
    html += '</div>';

    $(live_search.selector).after(html);

    $(live_search.selector).autocomplete({
        source: function(request, response) {
            var filter_name = $(live_search.selector).val();
            if (filter_name.length < 2) {
                $('.live-search').css('display', 'none');
                $('body').removeClass('search-open');
            } else {
                var html = '';
                html += '<li style="text-align: center;height:10px;">';
                html += '<img class="loading" src="image/catalog/loading.gif" />';
                html += '</li>';
                $('.live-search ul').html(html);
                $('.live-search').css('display', 'block');
                $('body').addClass('search-open');

                $.ajax({
                    url: 'index.php?route=extension/module/live_search&filter_name=' +  encodeURIComponent(filter_name),
                    dataType: 'json',
                    success: function(result) {
                        var products = result.products;
                        $('.live-search ul li').remove();
                        $('.result-text').html('');
                        if (!$.isEmptyObject(products)) {
                            $('.result-text').html('<a href="{{ module_live_search_href }}'+filter_name+'" class="view-all-results">Показать все результаты ('+result.total+')</a>');

                            $.each(products, function(index, product) {
                                var html = '';

                                html += '<li>';
                                html += '<a href="' + product.url + '" title="' + product.name + '">';
                                html += '<span style="clear:both"></span>';
                                html += '</a>';
                                html += '</li>';
                                $('.live-search ul').append(html);
                            });
                        } else {
                            var html = '';
                            html += '<li style="text-align: center;height:10px;">';
                            html +=    live_search.text_no_matches;
                            html +=    '</li>';

                            $('.live-search ul').html(html);
                        }
                        $('.live-search').css('display', 'block');
                        $('body').addClass('search-open');
                        return false;
                    }
                });
            }
        },
        select: function(product) {
            $(live_search.selector).val(product.name);
        }
    });

    $(document).on("mouseup touchend", function(e) {
        var container = $('.live-search');
        if (!container.is(e.target) && container.has(e.target).length === 0) {
            container.hide();
        }
    });
});
*/

$(document).ready(function() {
    var html = '';
    html += '<ul class="live-search-results">';
    html += '</ul>';

    $('#search').append(html);

    $('#search button').on('click', function() {
        var filter_name = $('#search input[name=\'search\']').val();
        if (filter_name.length < 2) {
            $('.live-search-results').empty();
            return;
        }

        $.ajax({
            url: 'index.php?route=extension/module/live_search&filter_name=' + encodeURIComponent(filter_name),
            dataType: 'json',
            beforeSend: function() {
                $('.live-search-results').html('<li style="text-align: center;height:10px;"><img class="loading" src="image/catalog/loading.gif" /></li>');
            },
            success: function(result) {
                var products = result.products;
                $('.live-search-results').empty();
                if (!$.isEmptyObject(products)) {
                    $('.live-search-results').append('<li><a href="{{ module_live_search_href }}'+filter_name+'" class="view-all-results">Показать все результаты ('+result.total+')</a></li>');

                    $.each(products, function(index, product) {
                        var html = '';

                        html += '<li>';
                        html += '<a href="' + product.url + '" title="' + product.name + '">' + product.name + '</a>';
                        html += '</li>';
                        $('.live-search-results').append(html);
                    });
                } else {
                    $('.live-search-results').html('<li style="text-align: center;height:10px;">К сожалению ничего не найдено</li>');
                }
            }
        });
    });

    $(document).on("mouseup touchend", function(e) {
        var container = $('#search');
        if (!container.is(e.target) && container.has(e.target).length === 0) {
            $('.live-search-results').empty();
        }
    });
});

