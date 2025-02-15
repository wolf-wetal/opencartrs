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

/* extension/eroticshop/catalog/view/template/common/header.twig */
class __TwigTemplate_6a2930828cd33ac5da93ec82517870a2 extends Template
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
        echo "<!DOCTYPE html>
<html dir=\"";
        // line 2
        echo ($context["direction"] ?? null);
        echo "\" lang=\"";
        echo ($context["lang"] ?? null);
        echo "\">
<head>
  <meta charset=\"UTF-8\"/>
  <meta name=\"viewport\" content=\"width=device-width, initial-scale=1, user-scalable=no\">
  <meta http-equiv=\"X-UA-Compatible\" content=\"IE=edge\">
  <title>";
        // line 7
        echo ($context["title"] ?? null);
        echo "</title>
  <base href=\"";
        // line 8
        echo ($context["base"] ?? null);
        echo "\"/>
  ";
        // line 9
        if (($context["description"] ?? null)) {
            // line 10
            echo "    <meta name=\"description\" content=\"";
            echo ($context["description"] ?? null);
            echo "\"/>
  ";
        }
        // line 12
        echo "  ";
        if (($context["keywords"] ?? null)) {
            // line 13
            echo "    <meta name=\"keywords\" content=\"";
            echo ($context["keywords"] ?? null);
            echo "\"/>
  ";
        }
        // line 15
        echo "
  <link href=\"";
        // line 16
        echo ($context["style_ext"] ?? null);
        echo "\" type=\"text/css\" rel=\"stylesheet\"/>
  <link href=\"";
        // line 17
        echo ($context["style_1_ext"] ?? null);
        echo "\" type=\"text/css\" rel=\"stylesheet\"/>
  <link href=\"";
        // line 18
        echo ($context["slick_ext"] ?? null);
        echo "\" type=\"text/css\" rel=\"stylesheet\"/>
  <link href=\"";
        // line 19
        echo ($context["fancybox_min"] ?? null);
        echo "\" type=\"text/css\" rel=\"stylesheet\"/>
  <script src=\"";
        // line 20
        echo ($context["jquery_3_4_1_js"] ?? null);
        echo "\" type=\"text/javascript\"></script>
  <script src=\"";
        // line 21
        echo ($context["slick_min"] ?? null);
        echo "\" type=\"text/javascript\"></script>
  <script src=\"";
        // line 22
        echo ($context["common_ext"] ?? null);
        echo "\" type=\"text/javascript\"></script>
  <script src=\"";
        // line 23
        echo ($context["common_cat"] ?? null);
        echo "\" type=\"text/javascript\"></script>
  <script src=\"";
        // line 24
        echo ($context["jquery_fancybox_min_js"] ?? null);
        echo "\" type=\"text/javascript\"></script>
  <meta name=\"";
        // line 25
        echo ($context["check_category"] ?? null);
        echo "\"/>
  ";
        // line 26
        if (($context["category_id"] ?? null)) {
            // line 27
            echo "    ";
            // line 28
            echo "    <link href=\"";
            echo ($context["jquery_ui_css"] ?? null);
            echo "\" type=\"text/css\" rel=\"stylesheet\"/>
    <script src=\"";
            // line 29
            echo ($context["jquery_ui_js"] ?? null);
            echo "\" type=\"text/javascript\"></script>
    <script src=\"";
            // line 30
            echo ($context["jquery_ui_touch_punch_min_js"] ?? null);
            echo "\" type=\"text/javascript\"></script>
  ";
        }
        // line 32
        echo "  ";
        if (($context["scripts_cart"] ?? null)) {
            // line 33
            echo "    <script src=\"";
            echo ($context["scripts_cart"] ?? null);
            echo "\" type=\"text/javascript\"></script>
  ";
        }
        // line 35
        echo "  ";
        if (($context["scripts_checkout"] ?? null)) {
            // line 36
            echo "    <script src=\"";
            echo ($context["scripts_checkout"] ?? null);
            echo "\" type=\"text/javascript\"></script>
  ";
        }
        // line 38
        echo "  ";
        if (($context["adress_css"] ?? null)) {
            // line 39
            echo "    <link href=\"https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css\" rel=\"stylesheet\" integrity=\"sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC\" crossorigin=\"anonymous\">
    <link href=\"";
            // line 40
            echo ($context["adress_css"] ?? null);
            echo "\" type=\"text/css\" rel=\"stylesheet\"/>
  ";
        }
        // line 42
        echo "
  ";
        // line 43
        $context['_parent'] = $context;
        $context['_seq'] = twig_ensure_traversable(($context["analytics"] ?? null));
        foreach ($context['_seq'] as $context["_key"] => $context["analytic"]) {
            // line 44
            echo "    ";
            echo $context["analytic"];
            echo "
  ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['analytic'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 46
        echo "</head>
<body ";
        // line 47
        if (($context["classbody"] ?? null)) {
            echo " ";
            echo ($context["classbody"] ?? null);
            echo " ";
        }
        echo ">
  ";
        // line 48
        echo ($context["menu"] ?? null);
        echo "
  <header class=\"header\">
    <div class=\"wrap flex\">
      <a class=\"menu-button\"></a>
      <div class=\"logo\">
        <a href=\"";
        // line 53
        echo ($context["home"] ?? null);
        echo "\"><img src=\"/extension/eroticshop/catalog/view/img/logo.svg\"></a>
      </div>
      <button class=\"catalog-button\">Каталог</button>

      ";
        // line 57
        echo ($context["search"] ?? null);
        echo "
      <a class=\"search-link\"></a>
       <div class=\"header_cart_div\" id=\"header-cart\">";
        // line 59
        echo ($context["cart"] ?? null);
        echo "</div>
";
        // line 61
        echo "      ";
        echo ($context["login_popup"] ?? null);
        echo "
      <a data-fancybox=\"popup4\" data-src=\"#popup_login\" href=\"javascript:;\"><button class=\"login\">Войти</button></a>
    </div>
  </header>
  ";
        // line 65
        echo ($context["top_menu"] ?? null);
        echo "


";
    }

    public function getTemplateName()
    {
        return "extension/eroticshop/catalog/view/template/common/header.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  224 => 65,  216 => 61,  212 => 59,  207 => 57,  200 => 53,  192 => 48,  184 => 47,  181 => 46,  172 => 44,  168 => 43,  165 => 42,  160 => 40,  157 => 39,  154 => 38,  148 => 36,  145 => 35,  139 => 33,  136 => 32,  131 => 30,  127 => 29,  122 => 28,  120 => 27,  118 => 26,  114 => 25,  110 => 24,  106 => 23,  102 => 22,  98 => 21,  94 => 20,  90 => 19,  86 => 18,  82 => 17,  78 => 16,  75 => 15,  69 => 13,  66 => 12,  60 => 10,  58 => 9,  54 => 8,  50 => 7,  40 => 2,  37 => 1,);
    }

    public function getSourceContext()
    {
        return new Source("", "extension/eroticshop/catalog/view/template/common/header.twig", "H:\\rabota\\OSPanel\\domains\\opencartrs\\extension\\eroticshop\\catalog\\view\\template\\common\\header.twig");
    }
}
