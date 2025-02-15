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

/* extension/eroticshop/catalog/view/template/common/search.twig */
class __TwigTemplate_dd8309ef046ad28788bc8e3973733e79 extends Template
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
        // line 9
        echo "

<form id=\"search\">
    <input type=\"text\" name=\"search\" placeholder=\"Найти товар...\" value=\"";
        // line 12
        echo ($context["search"] ?? null);
        echo "\">
    <button type=\"button\" data-lang=\"";
        // line 13
        echo ($context["language"] ?? null);
        echo "\">Поиск</button>
</form>


";
    }

    public function getTemplateName()
    {
        return "extension/eroticshop/catalog/view/template/common/search.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  46 => 13,  42 => 12,  37 => 9,);
    }

    public function getSourceContext()
    {
        return new Source("", "extension/eroticshop/catalog/view/template/common/search.twig", "H:\\rabota\\OSPanel\\domains\\opencartrs\\extension\\eroticshop\\catalog\\view\\template\\common\\search.twig");
    }
}
