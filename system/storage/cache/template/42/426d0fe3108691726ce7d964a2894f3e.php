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

/* extension/eroticshop/catalog/view/template/common/cart.twig */
class __TwigTemplate_da875944612ac9551a9f7f9aa2607b48 extends Template
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
        echo "<div class=\"dropdown d-grid\">
<button id=\"header_cart_btn\" type=\"button\" data-bs-toggle=\"dropdown\" class=\"header-cart__btn dropdown-toggle cart\" data-count=\"2\">
";
        // line 4
        echo "  <span id=\"cart-total\" class=\"header-cart__total-items\">";
        echo ($context["items"] ?? null);
        echo "</span>
</button>
<ul id=\"cart_dropdown\" class=\"header-cart__dropdown dropdown-menu dropdown-menu-end p-2\">
";
        // line 7
        if ((($context["products"] ?? null) || ($context["vouchers"] ?? null))) {
            // line 8
            echo "  <li>
    <table class=\"table table-striped mb-2\">
      ";
            // line 10
            $context['_parent'] = $context;
            $context['_seq'] = twig_ensure_traversable(($context["products"] ?? null));
            foreach ($context['_seq'] as $context["_key"] => $context["product"]) {
                // line 11
                echo "        <tr class=\"header-cart__item\">
          <td class=\"header-cart__image  text-center\">";
                // line 12
                if (twig_get_attribute($this->env, $this->source, $context["product"], "thumb", [], "any", false, false, false, 12)) {
                    echo "<a href=\"";
                    echo twig_get_attribute($this->env, $this->source, $context["product"], "href", [], "any", false, false, false, 12);
                    echo "\"><img src=\"";
                    echo twig_get_attribute($this->env, $this->source, $context["product"], "thumb", [], "any", false, false, false, 12);
                    echo "\" alt=\"";
                    echo twig_get_attribute($this->env, $this->source, $context["product"], "name", [], "any", false, false, false, 12);
                    echo "\" title=\"";
                    echo twig_get_attribute($this->env, $this->source, $context["product"], "name", [], "any", false, false, false, 12);
                    echo "\" class=\"img-thumbnail\"/></a>";
                }
                echo "</td>
          <td class=\"header-cart__name text-start\"><a href=\"";
                // line 13
                echo twig_get_attribute($this->env, $this->source, $context["product"], "href", [], "any", false, false, false, 13);
                echo "\">";
                echo twig_get_attribute($this->env, $this->source, $context["product"], "name", [], "any", false, false, false, 13);
                echo "</a>
            ";
                // line 14
                if (twig_get_attribute($this->env, $this->source, $context["product"], "option", [], "any", false, false, false, 14)) {
                    // line 15
                    echo "              ";
                    $context['_parent'] = $context;
                    $context['_seq'] = twig_ensure_traversable(twig_get_attribute($this->env, $this->source, $context["product"], "option", [], "any", false, false, false, 15));
                    foreach ($context['_seq'] as $context["_key"] => $context["option"]) {
                        // line 16
                        echo "                <br/>
                <small> - ";
                        // line 17
                        echo twig_get_attribute($this->env, $this->source, $context["option"], "name", [], "any", false, false, false, 17);
                        echo ": ";
                        echo twig_get_attribute($this->env, $this->source, $context["option"], "value", [], "any", false, false, false, 17);
                        echo "</small>
              ";
                    }
                    $_parent = $context['_parent'];
                    unset($context['_seq'], $context['_iterated'], $context['_key'], $context['option'], $context['_parent'], $context['loop']);
                    $context = array_intersect_key($context, $_parent) + $_parent;
                    // line 19
                    echo "            ";
                }
                // line 20
                echo "            ";
                if (twig_get_attribute($this->env, $this->source, $context["product"], "reward", [], "any", false, false, false, 20)) {
                    // line 21
                    echo "              <br/>
              <small> - ";
                    // line 22
                    echo ($context["text_points"] ?? null);
                    echo ": ";
                    echo twig_get_attribute($this->env, $this->source, $context["product"], "reward", [], "any", false, false, false, 22);
                    echo "</small>
            ";
                }
                // line 24
                echo "            ";
                if (twig_get_attribute($this->env, $this->source, $context["product"], "subscription", [], "any", false, false, false, 24)) {
                    // line 25
                    echo "              <br/>
              <small> - ";
                    // line 26
                    echo ($context["text_subscription"] ?? null);
                    echo ": ";
                    echo twig_get_attribute($this->env, $this->source, $context["product"], "subscription", [], "any", false, false, false, 26);
                    echo "</small>
            ";
                }
                // line 28
                echo "          </td>
          <td class=\"header-cart__quantity text-end\">x ";
                // line 29
                echo twig_get_attribute($this->env, $this->source, $context["product"], "quantity", [], "any", false, false, false, 29);
                echo "</td>
            ";
                // line 30
                if (twig_get_attribute($this->env, $this->source, $context["product"], "total_discounts", [], "any", false, false, false, 30)) {
                    // line 31
                    echo "                <td class=\"header-cart__total text-end \">";
                    echo twig_get_attribute($this->env, $this->source, $context["product"], "total_discounts", [], "any", false, false, false, 31);
                    echo "</td>
            ";
                } else {
                    // line 33
                    echo "                <td class=\"header-cart__total text-end \">";
                    echo twig_get_attribute($this->env, $this->source, $context["product"], "total", [], "any", false, false, false, 33);
                    echo "</td>
            ";
                }
                // line 35
                echo "
          <td class=\"header-cart__remove text-end \">

            <form class=\"header-cart__remove-form\" action=\"";
                // line 38
                echo ($context["product_remove"] ?? null);
                echo "\" method=\"post\" data-oc-toggle=\"ajax\" data-oc-load=\"";
                echo ($context["list"] ?? null);
                echo "\" data-oc-target=\"#header-cart\">
              <input type=\"hidden\" name=\"key\" value=\"";
                // line 39
                echo twig_get_attribute($this->env, $this->source, $context["product"], "cart_id", [], "any", false, false, false, 39);
                echo "\">
              <button type=\"submit\" data-bs-toggle=\"tooltip\" title=\"";
                // line 40
                echo ($context["button_remove"] ?? null);
                echo "\" class=\"header-cart__remove-btn btn btn-danger\"><i class=\"x-symbol\"></i></button>
            </form>
          </td>
        </tr>
      ";
            }
            $_parent = $context['_parent'];
            unset($context['_seq'], $context['_iterated'], $context['_key'], $context['product'], $context['_parent'], $context['loop']);
            $context = array_intersect_key($context, $_parent) + $_parent;
            // line 45
            echo "
      ";
            // line 46
            $context['_parent'] = $context;
            $context['_seq'] = twig_ensure_traversable(($context["vouchers"] ?? null));
            foreach ($context['_seq'] as $context["_key"] => $context["voucher"]) {
                // line 47
                echo "        <tr>
          <td class=\"text-center\"></td>
          <td class=\"text-start\">";
                // line 49
                echo twig_get_attribute($this->env, $this->source, $context["voucher"], "description", [], "any", false, false, false, 49);
                echo "</td>
          <td class=\"text-end\">x&nbsp;1</td>
          <td class=\"text-end\">";
                // line 51
                echo twig_get_attribute($this->env, $this->source, $context["voucher"], "amount", [], "any", false, false, false, 51);
                echo "</td>
          <td class=\"text-end\">
            <form action=\"";
                // line 53
                echo ($context["voucher_remove"] ?? null);
                echo "\" method=\"post\" data-oc-toggle=\"ajax\" data-oc-load=\"";
                echo ($context["list"] ?? null);
                echo "\" data-oc-target=\"#header-cart\">
              <input type=\"hidden\" name=\"key\" value=\"";
                // line 54
                echo twig_get_attribute($this->env, $this->source, $context["voucher"], "key", [], "any", false, false, false, 54);
                echo "\"/>
              <button type=\"submit\" data-bs-toggle=\"tooltip\" title=\"";
                // line 55
                echo ($context["button_remove"] ?? null);
                echo "\" class=\"btn btn-danger\"><i class=\"fa-solid fa-circle-xmark\"></i></button>
            </form>
          </td>
        </tr>
      ";
            }
            $_parent = $context['_parent'];
            unset($context['_seq'], $context['_iterated'], $context['_key'], $context['voucher'], $context['_parent'], $context['loop']);
            $context = array_intersect_key($context, $_parent) + $_parent;
            // line 60
            echo "
    </table>

    <div>
      <table class=\"table table-sm table-bordered mb-2\">
        ";
            // line 65
            $context['_parent'] = $context;
            $context['_seq'] = twig_ensure_traversable(($context["totals"] ?? null));
            foreach ($context['_seq'] as $context["_key"] => $context["total"]) {
                // line 66
                echo "          <tr class=\"header-cart__totals-item\">
            <td class=\"text-end\"><strong>";
                // line 67
                echo twig_get_attribute($this->env, $this->source, $context["total"], "title", [], "any", false, false, false, 67);
                echo "</strong>:&nbsp</td>
            <td class=\"text-end\">";
                // line 68
                echo twig_get_attribute($this->env, $this->source, $context["total"], "text", [], "any", false, false, false, 68);
                echo "</td>
          </tr>
        ";
            }
            $_parent = $context['_parent'];
            unset($context['_seq'], $context['_iterated'], $context['_key'], $context['total'], $context['_parent'], $context['loop']);
            $context = array_intersect_key($context, $_parent) + $_parent;
            // line 71
            echo "      </table>
      <p class=\"text-end\"><a href=\"";
            // line 72
            echo ($context["cart"] ?? null);
            echo "\"><strong><i class=\"fa-solid fa-cart-shopping\"></i> ";
            echo ($context["text_cart"] ?? null);
            echo "</strong></a>&nbsp;&nbsp;&nbsp;<a href=\"";
            echo ($context["checkout"] ?? null);
            echo "\"><strong><i class=\"fa-solid fa-share\"></i> ";
            echo ($context["text_checkout"] ?? null);
            echo "</strong></a></p>
    </div>
  </li>
";
        } else {
            // line 76
            echo "  <li class=\"text-center p-4\">";
            echo ($context["text_no_results"] ?? null);
            echo "</li>
";
        }
        // line 78
        echo "</ul>
</div>
<script type=\"text/javascript\">
//Show Cart
\$('#header_cart_btn').on('click', function() {
    \$('.header form').removeClass('opened');
    const dropdownMenu = \$('#cart_dropdown');
    // Проверяем, открыто ли dropdown меню
    const isOpen = dropdownMenu.css('display') === 'block';

    // Если меню открыто, закрываем его, иначе открываем
    if (isOpen) {
        dropdownMenu.css('display', 'none');
    } else {
        dropdownMenu.css('display', 'block');
    }
});
</script>";
    }

    public function getTemplateName()
    {
        return "extension/eroticshop/catalog/view/template/common/cart.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  268 => 78,  262 => 76,  249 => 72,  246 => 71,  237 => 68,  233 => 67,  230 => 66,  226 => 65,  219 => 60,  208 => 55,  204 => 54,  198 => 53,  193 => 51,  188 => 49,  184 => 47,  180 => 46,  177 => 45,  166 => 40,  162 => 39,  156 => 38,  151 => 35,  145 => 33,  139 => 31,  137 => 30,  133 => 29,  130 => 28,  123 => 26,  120 => 25,  117 => 24,  110 => 22,  107 => 21,  104 => 20,  101 => 19,  91 => 17,  88 => 16,  83 => 15,  81 => 14,  75 => 13,  61 => 12,  58 => 11,  54 => 10,  50 => 8,  48 => 7,  41 => 4,  37 => 1,);
    }

    public function getSourceContext()
    {
        return new Source("", "extension/eroticshop/catalog/view/template/common/cart.twig", "H:\\rabota\\OSPanel\\domains\\opencartrs\\extension\\eroticshop\\catalog\\view\\template\\common\\cart.twig");
    }
}
