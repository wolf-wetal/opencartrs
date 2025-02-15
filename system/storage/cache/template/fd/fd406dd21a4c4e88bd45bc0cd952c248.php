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

/* extension/eroticshop/catalog/view/template/product/thumb.twig */
class __TwigTemplate_fa89cd458f167fb69941a604d5a51571 extends Template
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
        echo "<div class=\"item\">
    <a href=\"";
        // line 2
        echo ($context["href"] ?? null);
        echo "\">
        <div class=\"image\">
            <img src=\"";
        // line 4
        echo ($context["thumb"] ?? null);
        echo "\" alt=\"";
        echo ($context["name"] ?? null);
        echo "\" title=\"";
        echo ($context["name"] ?? null);
        echo "\">
        </div>
        <div class=\"name truncate\">
            ";
        // line 7
        echo ($context["name"] ?? null);
        echo "
        </div>
    </a>
    ";
        // line 10
        if (($context["price"] ?? null)) {
            // line 11
            echo "        <div class=\"flex\">
            <div class=\"price\">
                ";
            // line 13
            echo ($context["price"] ?? null);
            echo "
            </div>
            <form method=\"post\" data-oc-toggle=\"ajax\" data-oc-load=\"";
            // line 15
            echo ($context["cart"] ?? null);
            echo "\" data-oc-target=\"#header-cart\">
                <button type=\"submit\" formaction=\"";
            // line 16
            echo ($context["add_to_cart"] ?? null);
            echo "\" data-bs-toggle=\"tooltip\">В корзину<i class=\"fa-solid fa-shopping-cart\"></i></button>
            </form>
        </div>
    ";
        }
        // line 20
        echo "</div>";
    }

    public function getTemplateName()
    {
        return "extension/eroticshop/catalog/view/template/product/thumb.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  83 => 20,  76 => 16,  72 => 15,  67 => 13,  63 => 11,  61 => 10,  55 => 7,  45 => 4,  40 => 2,  37 => 1,);
    }

    public function getSourceContext()
    {
        return new Source("", "extension/eroticshop/catalog/view/template/product/thumb.twig", "H:\\rabota\\OSPanel\\domains\\opencartrs\\extension\\eroticshop\\catalog\\view\\template\\product\\thumb.twig");
    }
}
