<?php

use Twig\Environment;
use Twig\Error\LoaderError;
use Twig\Error\RuntimeError;
use Twig\Extension\SandboxExtension;
use Twig\Markup;
use Twig\Sandbox\SecurityError;
use Twig\Sandbox\SecurityNotAllowedTagError;
use Twig\Sandbox\SecurityNotAllowedFilterError;
use Twig\Sandbox\SecurityNotAllowedFunctionError;
use Twig\Source;
use Twig\Template;

/* extension/eroticshop/catalog/view/template/common/footer.twig */
class __TwigTemplate_4678934d7bf452e3353fa972088fd379 extends Template
{
    private $source;
    private $macros = [];

    public function __construct(Environment $env)
    {
        parent::__construct($env);

        $this->source = $this->getSourceContext();

        $this->parent = false;

        $this->blocks = [
        ];
    }

    protected function doDisplay(array $context, array $blocks = [])
    {
        $macros = $this->macros;
        // line 1
        echo "<footer class=\"footer\">
    <div class=\"wrap flex\">
        <div class=\"logo\">
            <a href=\"";
        // line 4
        echo ($context["home"] ?? null);
        echo "\"><img src=\"/extension/eroticshop/catalog/view/img/logo.svg\"></a>
        </div>
        <ul>
            <li><a href=\"";
        // line 7
        echo ($context["home"] ?? null);
        echo "\">Главная</a></li>
            <li><a href=\"";
        // line 8
        echo ($context["url_eroticheskoe_bele"] ?? null);
        echo "\">Эротическое белье</a></li>
            <li><a href=\"";
        // line 9
        echo ($context["url_seks_igrushki_bishkek"] ?? null);
        echo "\">Секс игрушки</a></li>
            <li><a href=\"";
        // line 10
        echo ($context["url_aksessuary"] ?? null);
        echo "\">Аксессуары</a></li>
            <li><a href=\"";
        // line 11
        echo ($context["url_cosmetics_accessories"] ?? null);
        echo "\">Косметика</a></li>
        </ul>
        <ul>
            <li><a href=\"";
        // line 14
        echo ($context["url_bdsm"] ?? null);
        echo "\">БДСМ</a></li>
            <li><a href=\"";
        // line 15
        echo ($context["url_wiagra_bady_preparaty"] ?? null);
        echo "\">Возбудители</a></li>
            <li><a href=\"#\">Скидки</a></li>
            <li><a href=\"#\">Отзывы</a></li>
        </ul>
        <div class=\"contacts\">
            <p>Позвонить по телефону:</p>
            <div class=\"phones\">
                <a href=\"tel:+996555060900\" target=\"_blank\">0 (555) 06 09 90</a>
                <a href=\"tel:+996501060900\" target=\"_blank\">0(501) 06 09 00</a>
            </div>
            <div class=\"inst\">
                <a href=\"https://www.instagram.com/eroticshopkg/\" target=\"_blank\">@eroticshopkg</a>
                <a href=\"https://www.instagram.com/eroticshop_kg/\" target=\"_blank\">@eroticshop_kg</a>
            </div>
        </div>
    </div>
</footer>
";
        // line 32
        echo ($context["cookie"] ?? null);
        echo "
<script type=\"text/javascript\">
    var live_search = {
        selector: '#search input[name=\\'search\\']',
        text_no_matches: 'Ничего не найдено',
        height: '50px',
        current_page: 1,
        total_pages: 1
    };

    \$(document).ready(function() {
        var html = '';
        html += '<div class=\"live-search\" style=\"display: none\">';
        html += '\t<ul>';
        html += '\t</ul>';
        html += '  <div class=\"result-text\" style=\"display: none\"></div>';
        html += '  <button class=\"show-more\" style=\"display: none\">Показать еще</button>';
        html += '</div>';

        \$(live_search.selector).after(html);

        function loadResults(page) {
            var filter_name = \$(live_search.selector).val();
            var cat_id = 0;

            if (filter_name.length < 2) {
                \$('.live-search').css('display', 'none');
                \$('body').removeClass('search-open');
            } else {
                var html = '';
                html += '<li style=\"text-align: center;height:10px;\">';
                html += '<div id=\"loading-indicator\" class=\"loading-indicator\" style=\"display: block;\">';
                html += '<div class=\"spinner\"></div>Загрузка...</div>';
                html += '</li>';
                \$('.live-search ul').html(html);
                \$('.live-search').css('display', 'block');
                \$('body').addClass('search-open');

                \$.ajax({
                    url: 'index.php?route=product/live_search&filter_search=' + encodeURIComponent(filter_name) + '&page=' + page,
                    dataType: 'json',
                    success: function(result) {
                        var products = result.products;
                        live_search.total_pages = result.total_pages;

                        if (!\$.isEmptyObject(products)) {
                            if (page === 1) {
                                \$('.live-search ul li').remove();
                                \$('.result-text').css('display', 'block');
                                \$('.result-text').html('<a href=\"";
        // line 81
        echo ($context["module_live_search_href"] ?? null);
        echo "' + filter_name + '\" class=\"view-all-results\">Показать все (' + result.total + ')</a>');
                            }

                            \$.each(products, function(index, product) {
                                var html = '';

                                html += '<li>';
                                html += '<a href=\"' + product.url + '.html\" title=\"' + product.name + '\">';
                                html += '\t<div class=\"product-image col-sm-3 col-xs-4\"><img alt=\"' + product.name + '\" src=\"' + product.image + '\"></div>';
                                html += '<div class=\"search-description col-sm-9 col-xs-8\">';
                                html += '\t<div class=\"product-name\">' + product.name;
                                html += '<p>' + product.extra_info + '</p>';
                                html += '</div>';

                                if (product.special) {
                                    html += '\t<div class=\"product-price\"><span class=\"price\">' + product.special + '</span><span class=\"special\">' + product.price + '</span></div>';
                                } else {
                                    html += '\t<div class=\"product-price\"><span class=\"price\">' + product.price + '</span></div>';
                                }

                                html += '</div>';
                                html += '<span style=\"clear:both\"></span>';
                                html += '</a>';
                                html += '</li>';
                                \$('.live-search ul').append(html);
                            });

                            if (live_search.current_page < live_search.total_pages) {
                                \$('.show-more').css('display', 'block');
                            } else {
                                \$('.show-more').css('display', 'none');
                            }
                        } else {
                            var html = '';
                            html += '<li style=\"text-align: center;height:40px; margin-top: 20px\" >';
                            html += live_search.text_no_matches;
                            html += '</li>';
                            \$('.live-search ul').html(html);
                            \$('.show-more').css('display', 'none');
                        }

                        \$('.live-search').css('display', 'block');
                        \$('body').addClass('search-open');
                        return false;
                    }
                });
            }
        }

        \$(live_search.selector).autocomplete({
            'source': function(request, response) {
                live_search.current_page = 1;
                loadResults(live_search.current_page);
            },
            'select': function(product) {
                \$(live_search.selector).val(product.name);
            }
        });

        \$(document).on('click', '.show-more', function() {
            live_search.current_page++;
            loadResults(live_search.current_page);
        });

        \$(document).bind(\"mouseup touchend\", function(e) {
            var container = \$('.live-search');
            if (!container.is(e.target) && container.has(e.target).length === 0) {
                container.hide();
            }
        });
    });
</script>


</body></html>
";
    }

    public function getTemplateName()
    {
        return "extension/eroticshop/catalog/view/template/common/footer.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  146 => 81,  94 => 32,  74 => 15,  70 => 14,  64 => 11,  60 => 10,  56 => 9,  52 => 8,  48 => 7,  42 => 4,  37 => 1,);
    }

    public function getSourceContext()
    {
        return new Source("", "extension/eroticshop/catalog/view/template/common/footer.twig", "H:\\rabota\\OSPanel\\domains\\opencartrs\\extension\\eroticshop\\catalog\\view\\template\\common\\footer.twig");
    }
}
