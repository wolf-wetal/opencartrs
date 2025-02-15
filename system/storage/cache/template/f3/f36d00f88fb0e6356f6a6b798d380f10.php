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

/* extension/eroticshop/catalog/view/template/product/product.twig */
class __TwigTemplate_de4cb749c2d42f27f8e171b025e5817d extends Template
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
        echo ($context["header"] ?? null);
        echo "


<div class=\"item-page\">
<div class=\"wrap\">
    <div class=\"navi\">
        ";
        // line 7
        $context['_parent'] = $context;
        $context['_seq'] = twig_ensure_traversable(($context["breadcrumbs"] ?? null));
        $context['loop'] = [
          'parent' => $context['_parent'],
          'index0' => 0,
          'index'  => 1,
          'first'  => true,
        ];
        if (is_array($context['_seq']) || (is_object($context['_seq']) && $context['_seq'] instanceof \Countable)) {
            $length = count($context['_seq']);
            $context['loop']['revindex0'] = $length - 1;
            $context['loop']['revindex'] = $length;
            $context['loop']['length'] = $length;
            $context['loop']['last'] = 1 === $length;
        }
        foreach ($context['_seq'] as $context["_key"] => $context["breadcrumb"]) {
            // line 8
            echo "            <a href=\"";
            echo twig_get_attribute($this->env, $this->source, $context["breadcrumb"], "href", [], "any", false, false, false, 8);
            echo "\">";
            echo twig_get_attribute($this->env, $this->source, $context["breadcrumb"], "text", [], "any", false, false, false, 8);
            echo "</a>
            ";
            // line 9
            if ( !twig_get_attribute($this->env, $this->source, $context["loop"], "last", [], "any", false, false, false, 9)) {
                echo "<span></span>";
            }
            // line 10
            echo "        ";
            ++$context['loop']['index0'];
            ++$context['loop']['index'];
            $context['loop']['first'] = false;
            if (isset($context['loop']['length'])) {
                --$context['loop']['revindex0'];
                --$context['loop']['revindex'];
                $context['loop']['last'] = 0 === $context['loop']['revindex0'];
            }
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['breadcrumb'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 11
        echo "    </div>


";
        // line 26
        echo "    <div class=\"flex\">
        ";
        // line 27
        if ((($context["thumb"] ?? null) || ($context["images"] ?? null))) {
            // line 28
            echo "            <div class=\"photos\">
                <div class=\"slider-for\">

                    ";
            // line 31
            if (($context["thumb"] ?? null)) {
                // line 32
                echo "                        <div class=\"item\"><img src=\"";
                echo ($context["popup"] ?? null);
                echo "\" title=\"";
                echo ($context["heading_title"] ?? null);
                echo "\" alt=\"";
                echo ($context["heading_title"] ?? null);
                echo "\"></div>
                    ";
            }
            // line 34
            echo "
                    ";
            // line 35
            if (($context["images"] ?? null)) {
                // line 36
                echo "                        ";
                $context['_parent'] = $context;
                $context['_seq'] = twig_ensure_traversable(($context["images"] ?? null));
                foreach ($context['_seq'] as $context["_key"] => $context["image"]) {
                    // line 37
                    echo "                            <div class=\"item\"><img src=\"";
                    echo twig_get_attribute($this->env, $this->source, $context["image"], "popup", [], "any", false, false, false, 37);
                    echo "\" title=\"";
                    echo ($context["heading_title"] ?? null);
                    echo "\" alt=\"";
                    echo ($context["heading_title"] ?? null);
                    echo "\"></div>
                       ";
                }
                $_parent = $context['_parent'];
                unset($context['_seq'], $context['_iterated'], $context['_key'], $context['image'], $context['_parent'], $context['loop']);
                $context = array_intersect_key($context, $_parent) + $_parent;
                // line 39
                echo "                    ";
            }
            // line 40
            echo "
                </div>

                <div class=\"slider-nav\">

                    ";
            // line 45
            if (($context["thumb"] ?? null)) {
                // line 46
                echo "                        <div class=\"item\"><img src=\"";
                echo ($context["thumb"] ?? null);
                echo "\" title=\"";
                echo ($context["heading_title"] ?? null);
                echo "\" alt=\"";
                echo ($context["heading_title"] ?? null);
                echo "\"></div>
                    ";
            }
            // line 48
            echo "
                    ";
            // line 49
            if (($context["images"] ?? null)) {
                // line 50
                echo "                        ";
                $context['_parent'] = $context;
                $context['_seq'] = twig_ensure_traversable(($context["images"] ?? null));
                foreach ($context['_seq'] as $context["_key"] => $context["image"]) {
                    // line 51
                    echo "                            <div class=\"item\"><img src=\"";
                    echo twig_get_attribute($this->env, $this->source, $context["image"], "thumb", [], "any", false, false, false, 51);
                    echo "\" title=\"";
                    echo ($context["heading_title"] ?? null);
                    echo "\" alt=\"";
                    echo ($context["heading_title"] ?? null);
                    echo "\"></div>
                        ";
                }
                $_parent = $context['_parent'];
                unset($context['_seq'], $context['_iterated'], $context['_key'], $context['image'], $context['_parent'], $context['loop']);
                $context = array_intersect_key($context, $_parent) + $_parent;
                // line 53
                echo "                    ";
            }
            // line 54
            echo "
                </div>
            </div>
        ";
        }
        // line 58
        echo "
            <div class=\"info\">
                <h1>";
        // line 60
        echo ($context["heading_title"] ?? null);
        echo "</h1>
                <div class=\"art\">
                    Артикул: ";
        // line 62
        echo ($context["model"] ?? null);
        echo "
    ";
        // line 64
        echo "                </div>
                <div class=\"text\">
                    <p>";
        // line 66
        echo ($context["description"] ?? null);
        echo "</p>
                </div>
                    <form id=\"form-product\" class=\"addsdadad\">
        ";
        // line 70
        echo "        ";
        // line 71
        echo "        ";
        // line 72
        echo "                        <div class=\"flex\">
                            <div class=\"price\">
                                ";
        // line 74
        echo ($context["price"] ?? null);
        echo "
                            </div>
                            <input type=\"hidden\" name=\"product_id\" value=\"";
        // line 76
        echo ($context["product_id"] ?? null);
        echo "\" id=\"input-product-id\"/>
                            <button type=\"submit\" id=\"button-cart\"><span>Добавить </span>в корзину</button>
                        </div>
                    </form>
            </div>

    </div>
    <div class=\"bottom-blocks\">
";
        // line 92
        echo "    </div>
</div>
</div>
";
        // line 95
        echo ($context["advantages_block"] ?? null);
        echo "


  ";
        // line 98
        if (($context["products"] ?? null)) {
            // line 99
            echo "<div class=\"catalog-page similar\">
    <div class=\"wrap\">
      <h2>";
            // line 101
            echo ($context["text_related"] ?? null);
            echo "</h2>
       <div class=\"list flex\">
          ";
            // line 103
            $context['_parent'] = $context;
            $context['_seq'] = twig_ensure_traversable(($context["products"] ?? null));
            foreach ($context['_seq'] as $context["_key"] => $context["product"]) {
                // line 104
                echo "              ";
                echo $context["product"];
                echo "
          ";
            }
            $_parent = $context['_parent'];
            unset($context['_seq'], $context['_iterated'], $context['_key'], $context['product'], $context['_parent'], $context['loop']);
            $context = array_intersect_key($context, $_parent) + $_parent;
            // line 106
            echo "      </div>
    </div>
</div>
  ";
        }
        // line 110
        echo "
<script type=\"text/javascript\"><!--
    \$('#form-product').on('submit', function(e) {
        e.preventDefault();

        \$.ajax({
            url: 'index.php?route=checkout/cart.add&language=";
        // line 116
        echo ($context["language"] ?? null);
        echo "',
            type: 'post',
            data: \$('#form-product').serialize(),
            dataType: 'json',
            contentType: 'application/x-www-form-urlencoded',
            cache: false,
            processData: false,
            beforeSend: function() {
                \$('#button-cart').button('loading');
            },
            complete: function() {
                \$('#button-cart').button('reset');
            },
            success: function(json) {
                console.log(json);

                \$('#form-product').find('.is-invalid').removeClass('is-invalid');
                \$('#form-product').find('.invalid-feedback').removeClass('d-block');

                if (json['error']) {
                    for (key in json['error']) {
                        \$('#input-' + key.replaceAll('_', '-')).addClass('is-invalid').find('.form-control, .form-select, .form-check-input, .form-check-label').addClass('is-invalid');
                        \$('#error-' + key.replaceAll('_', '-')).html(json['error'][key]).addClass('d-block');
                    }
                }

                if (json['success']) {
                    \$('#alert').prepend('<div class=\"alert alert-success alert-dismissible\"><i class=\"fa-solid fa-circle-check\"></i> ' + json['success'] + ' <button type=\"button\" class=\"btn-close\" data-bs-dismiss=\"alert\"></button></div>');

                    \$('#header-cart').load('index.php?route=common/cart.info');
                }
            },
            error: function(xhr, ajaxOptions, thrownError) {
                console.log(thrownError + \"\\r\\n\" + xhr.statusText + \"\\r\\n\" + xhr.responseText);
            }
        });
    });
//--></script>
";
        // line 154
        echo ($context["footer"] ?? null);
    }

    public function getTemplateName()
    {
        return "extension/eroticshop/catalog/view/template/product/product.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  329 => 154,  288 => 116,  280 => 110,  274 => 106,  265 => 104,  261 => 103,  256 => 101,  252 => 99,  250 => 98,  244 => 95,  239 => 92,  228 => 76,  223 => 74,  219 => 72,  217 => 71,  215 => 70,  209 => 66,  205 => 64,  201 => 62,  196 => 60,  192 => 58,  186 => 54,  183 => 53,  170 => 51,  165 => 50,  163 => 49,  160 => 48,  150 => 46,  148 => 45,  141 => 40,  138 => 39,  125 => 37,  120 => 36,  118 => 35,  115 => 34,  105 => 32,  103 => 31,  98 => 28,  96 => 27,  93 => 26,  88 => 11,  74 => 10,  70 => 9,  63 => 8,  46 => 7,  37 => 1,);
    }

    public function getSourceContext()
    {
        return new Source("", "extension/eroticshop/catalog/view/template/product/product.twig", "H:\\rabota\\OSPanel\\domains\\opencartrs\\extension\\eroticshop\\catalog\\view\\template\\product\\product.twig");
    }
}
