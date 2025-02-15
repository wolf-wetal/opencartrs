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

/* extension/eroticshop/catalog/view/template/common/category_img_index.twig */
class __TwigTemplate_5723532a21eb2d8f4ff854cd5b8b997a extends Template
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
        echo "        <div class=\"index-categories-block flex\">
            <div class=\"item\">
                <div class=\"content\">
                    <img src=\"/extension/eroticshop/catalog/view/img/cat1.svg\">
                    <a href=\"";
        // line 5
        echo ($context["url_seks_igrushki"] ?? null);
        echo "\"><span><span>Секс игрушки</span></span></a>
                </div>
            </div>
            <div class=\"item\">
                <div class=\"content\">
                    <img src=\"/extension/eroticshop/catalog/view/img/cat2.svg\">
                    <a href=\"";
        // line 11
        echo ($context["url_vozbuditeli"] ?? null);
        echo "\"><span><span>Возбудители</span></span></a>
                </div>
            </div>
            <div class=\"item\">
                <div class=\"content\">
                    <img src=\"/extension/eroticshop/catalog/view/img/cat3.svg\">
                    <a href=\"";
        // line 17
        echo ($context["url_poppers"] ?? null);
        echo "\"><span><span>Попперсы</span></span></a>
                </div>
            </div>
            <div class=\"item\">
                <div class=\"content\">
                    <img src=\"/extension/eroticshop/catalog/view/img/cat4.svg\">
                    <a href=\"#\"><span><span>Интим уход</span></span></a>
                </div>
            </div>
            <div class=\"item\">
                <div class=\"content\">
                    <img src=\"/extension/eroticshop/catalog/view/img/cat5.svg\">
                    <a href=\"";
        // line 29
        echo ($context["url_bdsm"] ?? null);
        echo "\"><span><span>БДСМ</span></span></a>
                </div>
            </div>
            <div class=\"item\">
                <div class=\"content\">
                    <img src=\"/extension/eroticshop/catalog/view/img/cat6.svg\">
                    <a href=\"";
        // line 35
        echo ($context["url_eroticheskoe_bele"] ?? null);
        echo "\"><span><span>Эротическое белье</span></span></a>
                </div>
            </div>
            <div class=\"item\">
                <div class=\"content\">
                    <img src=\"/extension/eroticshop/catalog/view/img/cat7.svg\">
                    <a href=\"#\"><span><span>Сувениры</span></span></a>
                </div>
            </div>
        </div>
";
    }

    public function getTemplateName()
    {
        return "extension/eroticshop/catalog/view/template/common/category_img_index.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  85 => 35,  76 => 29,  61 => 17,  52 => 11,  43 => 5,  37 => 1,);
    }

    public function getSourceContext()
    {
        return new Source("", "extension/eroticshop/catalog/view/template/common/category_img_index.twig", "H:\\rabota\\OSPanel\\domains\\opencartrs\\extension\\eroticshop\\catalog\\view\\template\\common\\category_img_index.twig");
    }
}
