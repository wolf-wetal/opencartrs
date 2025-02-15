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

/* extension/eroticshop/catalog/view/template/common/info_block_1.twig */
class __TwigTemplate_5d22360e9ceb9ad3bd3be2feb00599db extends Template
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
        echo "<div class=\"index-steps-block\">
    <div class=\"wrap\">
        <h2>Как оформить заказ на нашем сайте?</h2>
        <div class=\"list\">
            <div class=\"item\">
                <div class=\"icon\">
                    <img src=\"/extension/eroticshop/catalog/view/img/step1.svg\">
                </div>
                Оформите заказ на сайте или отправьте SMS на номер <span>0555 060990</span> с сылками выбранных товаров
            </div>
            <div class=\"item\">
                <div class=\"icon\">
                    <img src=\"/extension/eroticshop/catalog/view/img/step2.svg\">
                </div>
                Ожидайте звонка для подтверждения заказа
            </div>
            <div class=\"item\">
                <div class=\"icon\">
                    <img src=\"/extension/eroticshop/catalog/view/img/step3.svg\">
                </div>
                Заказ будет доставлен в течение 2 - х часов
            </div>
        </div>
    </div>
</div>";
    }

    public function getTemplateName()
    {
        return "extension/eroticshop/catalog/view/template/common/info_block_1.twig";
    }

    public function getDebugInfo()
    {
        return array (  37 => 1,);
    }

    public function getSourceContext()
    {
        return new Source("", "extension/eroticshop/catalog/view/template/common/info_block_1.twig", "H:\\rabota\\OSPanel\\domains\\opencartrs\\extension\\eroticshop\\catalog\\view\\template\\common\\info_block_1.twig");
    }
}
