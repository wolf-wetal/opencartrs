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

/* extension/eroticshop/catalog/view/template/common/products_discount.twig */
class __TwigTemplate_08caa673ecad8662e91ad17c07d3f9bb extends Template
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
        echo "<div class=\"index-catalog-block pb\">
    <div class=\"flex\">
        <h2>Скидки</h2>
        <a href=\"";
        // line 4
        echo ($context["url_skidki"] ?? null);
        echo "\" class=\"top-link other\">Смотреть все</a>
    </div>
    <div class=\"list other\">
        ";
        // line 7
        $context['_parent'] = $context;
        $context['_seq'] = twig_ensure_traversable(($context["products"] ?? null));
        foreach ($context['_seq'] as $context["_key"] => $context["product"]) {
            // line 8
            echo "        <div class=\"item2\">
            <a href=\"";
            // line 9
            echo twig_get_attribute($this->env, $this->source, $context["product"], "href", [], "any", false, false, false, 9);
            echo "\">
                <div class=\"image\">
                    <img src=\"";
            // line 11
            echo twig_get_attribute($this->env, $this->source, $context["product"], "thumb", [], "any", false, false, false, 11);
            echo "\">
                </div>
            </a>
            <div class=\"flex\">
                <div class=\"name\">
                    <span>";
            // line 16
            echo twig_get_attribute($this->env, $this->source, $context["product"], "name", [], "any", false, false, false, 16);
            echo "</span>
                </div>
                <div class=\"price\">
                    <span class=\"old\">";
            // line 19
            echo twig_get_attribute($this->env, $this->source, $context["product"], "price", [], "any", false, false, false, 19);
            echo "</span>
                    <div class=\"new\">
                        ";
            // line 21
            echo twig_get_attribute($this->env, $this->source, $context["product"], "special", [], "any", false, false, false, 21);
            echo "
                    </div>
                </div>


                <form method=\"post\" data-oc-toggle=\"ajax\" data-oc-load=\"";
            // line 26
            echo ($context["cart"] ?? null);
            echo "\" data-oc-target=\"#header-cart\">
                    <button class=\"addToCartButton\" type=\"submit\" formaction=\"";
            // line 27
            echo ($context["add_to_cart"] ?? null);
            echo "\" name=\"product_";
            echo twig_get_attribute($this->env, $this->source, $context["product"], "product_id", [], "any", false, false, false, 27);
            echo "\"  data-bs-toggle=\"tooltip\" data-name=\"";
            echo twig_get_attribute($this->env, $this->source, $context["product"], "name", [], "any", false, false, false, 27);
            echo "\" data-image=\"";
            echo twig_get_attribute($this->env, $this->source, $context["product"], "thumb", [], "any", false, false, false, 27);
            echo "\" data-sku=\"";
            echo twig_get_attribute($this->env, $this->source, $context["product"], "sku", [], "any", false, false, false, 27);
            echo "\">В корзину</button>
                    <input type=\"hidden\" name=\"product_id\" value=\"";
            // line 28
            echo twig_get_attribute($this->env, $this->source, $context["product"], "product_id", [], "any", false, false, false, 28);
            echo "\"/> <input type=\"hidden\" name=\"quantity\" value=\"1\"/>
                </form>
            </div>
        </div>
        ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['product'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 33
        echo "    </div>
</div>";
    }

    public function getTemplateName()
    {
        return "extension/eroticshop/catalog/view/template/common/products_discount.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  114 => 33,  103 => 28,  91 => 27,  87 => 26,  79 => 21,  74 => 19,  68 => 16,  60 => 11,  55 => 9,  52 => 8,  48 => 7,  42 => 4,  37 => 1,);
    }

    public function getSourceContext()
    {
        return new Source("", "extension/eroticshop/catalog/view/template/common/products_discount.twig", "H:\\rabota\\OSPanel\\domains\\opencartrs\\extension\\eroticshop\\catalog\\view\\template\\common\\products_discount.twig");
    }
}
