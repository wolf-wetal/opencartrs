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

/* extension/eroticshop/catalog/view/template/common/popup_cart.twig */
class __TwigTemplate_69323c5a88785a1075194ecea0defe34 extends Template
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
        echo "<div class=\"custom-popup fancybox-content-override\" id=\"popup2\" style=\"display: none; width: 100%; max-width: 370px;\">
    <div class=\"custom-cart\">
        <div class=\"custom-name\">
            <div class=\"custom-image\"><img id=\"popupImage\" src=\"\" style=\"width: 70px; height: 70px\"></div>
            <div class=\"custom-details\"><p>Товар <a id=\"popupName\" href=\"\"></a> Артикул: <span id=\"popupSku\"></span> добавлен в <a href=\"";
        // line 5
        echo ($context["cart"] ?? null);
        echo "\">корзину</a></p></div>
        </div>
        <div class=\"custom-buttons\">
            <a href=\"javascript:;\" data-fancybox-close>Продолжить покупки</a>
            <a href=\"";
        // line 9
        echo ($context["cart"] ?? null);
        echo "\">Оформить заказ</a>
        </div>
    </div>
</div>





";
    }

    public function getTemplateName()
    {
        return "extension/eroticshop/catalog/view/template/common/popup_cart.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  50 => 9,  43 => 5,  37 => 1,);
    }

    public function getSourceContext()
    {
        return new Source("", "extension/eroticshop/catalog/view/template/common/popup_cart.twig", "H:\\rabota\\OSPanel\\domains\\opencartrs\\extension\\eroticshop\\catalog\\view\\template\\common\\popup_cart.twig");
    }
}
