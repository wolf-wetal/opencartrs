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

/* extension/eroticshop/catalog/view/template/common/info_block_2.twig */
class __TwigTemplate_5200f88836af4da30115153b0ad649e5 extends Template
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
        echo "<div class=\"index-advantages-block\">
    <div class=\"wrap\">
        <h2>Наши преимущества</h2>
        <div class=\"flex\">
            <div class=\"item\">
                <div><img src=\"/extension/eroticshop/catalog/view/img/advantages1.svg\"></div>
                <div>
                    <span>Доставка</span>
                    по всему Кыргызстану
                </div>
            </div>
            <div class=\"item\">
                <div><img src=\"/extension/eroticshop/catalog/view/img/advantages2.svg\"></div>
                <div>
                    <span>Скидки</span>
                    Лучшие цены у нас!
                </div>
            </div>
            <div class=\"item\">
                <div><img src=\"/extension/eroticshop/catalog/view/img/advantages3.svg\"></div>
                <div>
                    <span>Оплата</span>
                    Наличный, безналичный расчет
                </div>
            </div>
            <div class=\"item\">
                <div><img src=\"/extension/eroticshop/catalog/view/img/advantages4.svg\"></div>
                <div>
                    <span>Анонимность!</span>
                    Гарантия анонимности!
                </div>
            </div>
            <div class=\"item\">
                <div><img src=\"/extension/eroticshop/catalog/view/img/advantages5.svg\"></div>
                <div>
                    <span>Возврат товара</span>
                    Обмен и возврат брака
                </div>
            </div>
            <div class=\"item\">
                <div><img src=\"/extension/eroticshop/catalog/view/img/advantages6.svg\"></div>
                <div>
                    <span>Большой выбор</span>
                    Широкий ассортимент товара!
                </div>
            </div>
        </div>
    </div>
</div>";
    }

    public function getTemplateName()
    {
        return "extension/eroticshop/catalog/view/template/common/info_block_2.twig";
    }

    public function getDebugInfo()
    {
        return array (  37 => 1,);
    }

    public function getSourceContext()
    {
        return new Source("", "extension/eroticshop/catalog/view/template/common/info_block_2.twig", "H:\\rabota\\OSPanel\\domains\\opencartrs\\extension\\eroticshop\\catalog\\view\\template\\common\\info_block_2.twig");
    }
}
