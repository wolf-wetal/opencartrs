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

/* extension/eroticshop/catalog/view/template/product/advantages_block.twig */
class __TwigTemplate_b1216f786f95fa6045789ea9d27fb074 extends Template
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
        echo "<div class=\"item-advantages-block\">
    <div class=\"wrap\">
        <div class=\"list\">
            <div class=\"item\">
                <img src=\"/extension/eroticshop/catalog/view/img/advantages7.svg\">
                <div class=\"name\">
                    Доставка
                </div>
                <p>Заказ будет доставлен в течение 2 - х часов</p>
                <a href=\"#\">Подробнее</a>
            </div>
            <div class=\"item\">
                <img src=\"/extension/eroticshop/catalog/view/img/advantages8.svg\">
                <div class=\"name\">
                    Самовывоз
                </div>
                <p>Заказ будет доставлен в течение 2 - х часов</p>
                <a href=\"#\">Подробнее</a>
            </div>
            <div class=\"item\">
                <img src=\"/extension/eroticshop/catalog/view/img/advantages9.svg\">
                <div class=\"name\">
                    Оплата
                </div>
                <p>Заказ будет доставлен в течение 2 - х часов</p>
                <a href=\"#\">Подробнее</a>
            </div>
        </div>
    </div>
</div>";
    }

    public function getTemplateName()
    {
        return "extension/eroticshop/catalog/view/template/product/advantages_block.twig";
    }

    public function getDebugInfo()
    {
        return array (  37 => 1,);
    }

    public function getSourceContext()
    {
        return new Source("", "extension/eroticshop/catalog/view/template/product/advantages_block.twig", "H:\\rabota\\OSPanel\\domains\\opencartrs\\extension\\eroticshop\\catalog\\view\\template\\product\\advantages_block.twig");
    }
}
