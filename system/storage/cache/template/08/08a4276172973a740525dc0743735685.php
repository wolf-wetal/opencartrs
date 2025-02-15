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

/* extension/eroticshop/catalog/view/template/common/home.twig */
class __TwigTemplate_2e44db6fbea8ef94fc91ef322889dc00 extends Template
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
        <div class=\"indexbg\">
            <div class=\"wrap\">
                ";
        // line 4
        echo ($context["category_img_index"] ?? null);
        echo "
                ";
        // line 5
        echo ($context["latest_products"] ?? null);
        echo "
                ";
        // line 6
        echo ($context["products_discount"] ?? null);
        echo "
            </div>
        </div>

        ";
        // line 10
        echo ($context["info_block_1"] ?? null);
        echo "
        ";
        // line 11
        echo ($context["info_block_2"] ?? null);
        echo "
        ";
        // line 12
        echo ($context["popup_cart"] ?? null);
        echo "

";
        // line 14
        echo ($context["footer"] ?? null);
        echo "
";
    }

    public function getTemplateName()
    {
        return "extension/eroticshop/catalog/view/template/common/home.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  71 => 14,  66 => 12,  62 => 11,  58 => 10,  51 => 6,  47 => 5,  43 => 4,  37 => 1,);
    }

    public function getSourceContext()
    {
        return new Source("", "extension/eroticshop/catalog/view/template/common/home.twig", "H:\\rabota\\OSPanel\\domains\\opencartrs\\extension\\eroticshop\\catalog\\view\\template\\common\\home.twig");
    }
}
