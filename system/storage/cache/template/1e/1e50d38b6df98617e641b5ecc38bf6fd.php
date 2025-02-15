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

/* extension/eroticshop/catalog/view/template/common/latest_products.twig */
class __TwigTemplate_af8bd2af17ea50178afd5f6ccde26b75 extends Template
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
        if (($context["products"] ?? null)) {
            // line 2
            echo "    <div class=\"index-catalog-block\">
    <div class=\"flex\">
        <h2>Новинки</h2>
        <a href=\"";
            // line 5
            echo ($context["url_novinki"] ?? null);
            echo "\" class=\"top-link\">Смотреть все</a>
    </div>
    <div class=\"list\">
        ";
            // line 8
            $context['_parent'] = $context;
            $context['_seq'] = twig_ensure_traversable(($context["products"] ?? null));
            foreach ($context['_seq'] as $context["_key"] => $context["product"]) {
                // line 9
                echo "
                <div class=\"item\">
                    <a href=\"";
                // line 11
                echo twig_get_attribute($this->env, $this->source, $context["product"], "href", [], "any", false, false, false, 11);
                echo "\">
                    <div class=\"image\">

                        <img src=\"";
                // line 14
                echo twig_get_attribute($this->env, $this->source, $context["product"], "thumb", [], "any", false, false, false, 14);
                echo "\" ";
                echo ((twig_get_attribute($this->env, $this->source, $context["product"], "additional_image", [], "any", false, false, false, 14)) ? ((("data-additional=\"" . twig_get_attribute($this->env, $this->source, $context["product"], "additional_image", [], "any", false, false, false, 14)) . "\"")) : (""));
                echo " alt=\"";
                echo twig_get_attribute($this->env, $this->source, $context["product"], "name", [], "any", false, false, false, 14);
                echo "\" title=\"";
                echo twig_get_attribute($this->env, $this->source, $context["product"], "name", [], "any", false, false, false, 14);
                echo "\" class=\"img-responsive\" />
                    </div>
                    <div class=\"name\">
                        ";
                // line 17
                echo ($context["product_id"] ?? null);
                echo "
                        ";
                // line 18
                echo twig_get_attribute($this->env, $this->source, $context["product"], "name", [], "any", false, false, false, 18);
                echo "
                    </div>
                    </a>
                    ";
                // line 21
                if (twig_get_attribute($this->env, $this->source, $context["product"], "price", [], "any", false, false, false, 21)) {
                    // line 22
                    echo "                        ";
                    if (twig_get_attribute($this->env, $this->source, $context["product"], "special", [], "any", false, false, false, 22)) {
                        // line 23
                        echo "                            <div class=\"flex\">
                                <div class=\"price div-price\">
                                    <span class=\"price-old\">";
                        // line 25
                        echo twig_get_attribute($this->env, $this->source, $context["product"], "price", [], "any", false, false, false, 25);
                        echo "</span>
                                    <div class=\"price-new\">
                                        ";
                        // line 27
                        echo twig_get_attribute($this->env, $this->source, $context["product"], "special", [], "any", false, false, false, 27);
                        echo "
                                    </div>
                                </div>
                                <form method=\"post\" data-oc-toggle=\"ajax\" data-oc-load=\"";
                        // line 30
                        echo twig_get_attribute($this->env, $this->source, $context["product"], "cart", [], "any", false, false, false, 30);
                        echo "\" data-oc-target=\"#header-cart\">
                                    <button class=\"addToCartButton\" type=\"submit\" formaction=\"";
                        // line 31
                        echo ($context["add_to_cart"] ?? null);
                        echo "\" name=\"product_";
                        echo twig_get_attribute($this->env, $this->source, $context["product"], "product_id", [], "any", false, false, false, 31);
                        echo "\"  data-bs-toggle=\"tooltip\" data-name=\"";
                        echo twig_get_attribute($this->env, $this->source, $context["product"], "name", [], "any", false, false, false, 31);
                        echo "\" data-image=\"";
                        echo twig_get_attribute($this->env, $this->source, $context["product"], "thumb", [], "any", false, false, false, 31);
                        echo "\" data-sku=\"";
                        echo twig_get_attribute($this->env, $this->source, $context["product"], "sku", [], "any", false, false, false, 31);
                        echo "\">В корзину</button>
                                    <input type=\"hidden\" name=\"product_id\" value=\"";
                        // line 32
                        echo twig_get_attribute($this->env, $this->source, $context["product"], "product_id", [], "any", false, false, false, 32);
                        echo "\"/> <input type=\"hidden\" name=\"quantity\" value=\"1\"/>
                                </form>
                            </div>
                        ";
                    } else {
                        // line 36
                        echo "                            <div class=\"flex\">
                                <div class=\"price\">
                                    ";
                        // line 38
                        echo twig_get_attribute($this->env, $this->source, $context["product"], "price", [], "any", false, false, false, 38);
                        echo "
                                </div>
                                <form method=\"post\" data-oc-toggle=\"ajax\" data-oc-load=\"";
                        // line 40
                        echo ($context["cart"] ?? null);
                        echo "\" data-oc-target=\"#header-cart\">
                                    <button class=\"addToCartButton\" type=\"submit\" formaction=\"";
                        // line 41
                        echo ($context["add_to_cart"] ?? null);
                        echo "\" name=\"product_";
                        echo twig_get_attribute($this->env, $this->source, $context["product"], "product_id", [], "any", false, false, false, 41);
                        echo "\"  data-bs-toggle=\"tooltip\" data-name=\"";
                        echo twig_get_attribute($this->env, $this->source, $context["product"], "name", [], "any", false, false, false, 41);
                        echo "\" data-image=\"";
                        echo twig_get_attribute($this->env, $this->source, $context["product"], "thumb", [], "any", false, false, false, 41);
                        echo "\" data-sku=\"";
                        echo twig_get_attribute($this->env, $this->source, $context["product"], "sku", [], "any", false, false, false, 41);
                        echo "\">В корзину</button>
                                    <input type=\"hidden\" name=\"product_id\" value=\"";
                        // line 42
                        echo twig_get_attribute($this->env, $this->source, $context["product"], "product_id", [], "any", false, false, false, 42);
                        echo "\"/> <input type=\"hidden\" name=\"quantity\" value=\"1\"/>
                                </form>

                            </div>
                        ";
                    }
                    // line 47
                    echo "                    ";
                }
                // line 48
                echo "
";
                // line 56
                echo "                </div>

        ";
            }
            $_parent = $context['_parent'];
            unset($context['_seq'], $context['_iterated'], $context['_key'], $context['product'], $context['_parent'], $context['loop']);
            $context = array_intersect_key($context, $_parent) + $_parent;
            // line 59
            echo "
    </div>
 </div>
";
        }
    }

    public function getTemplateName()
    {
        return "extension/eroticshop/catalog/view/template/common/latest_products.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  176 => 59,  168 => 56,  165 => 48,  162 => 47,  154 => 42,  142 => 41,  138 => 40,  133 => 38,  129 => 36,  122 => 32,  110 => 31,  106 => 30,  100 => 27,  95 => 25,  91 => 23,  88 => 22,  86 => 21,  80 => 18,  76 => 17,  64 => 14,  58 => 11,  54 => 9,  50 => 8,  44 => 5,  39 => 2,  37 => 1,);
    }

    public function getSourceContext()
    {
        return new Source("", "extension/eroticshop/catalog/view/template/common/latest_products.twig", "H:\\rabota\\OSPanel\\domains\\opencartrs\\extension\\eroticshop\\catalog\\view\\template\\common\\latest_products.twig");
    }
}
