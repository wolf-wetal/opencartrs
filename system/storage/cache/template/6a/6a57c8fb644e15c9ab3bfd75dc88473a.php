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

/* extension/eroticshop/catalog/view/template/product/category.twig */
class __TwigTemplate_0b9a36cc7031e89f88a2f91ed39ba074 extends Template
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
<div class=\"catalog-page\">

    ";
        // line 4
        if ((($context["image_category"] ?? null) || ($context["description"] ?? null))) {
            // line 5
            echo "        ";
            if (($context["image_category"] ?? null)) {
                // line 6
                echo "            <div class=\"top-block\" style=\"background: url('";
                echo ($context["image_category"] ?? null);
                echo "')  center/cover;\">
                <div class=\"wrap\">
                    <h1>";
                // line 8
                echo ($context["heading_title"] ?? null);
                echo "</h1>
                    ";
                // line 9
                if (($context["description"] ?? null)) {
                    // line 10
                    echo "                            <p>";
                    echo ($context["description"] ?? null);
                    echo "</p>
                    ";
                }
                // line 12
                echo "                </div>
                <div class=\"mob-image\">
                    <img src=\"";
                // line 14
                echo ($context["image_category"] ?? null);
                echo "\" alt=\"";
                echo ($context["heading_title"] ?? null);
                echo "\" title=\"";
                echo ($context["heading_title"] ?? null);
                echo "\">
                </div>
            </div>
        ";
            }
            // line 18
            echo "    ";
        }
        // line 19
        echo "

";
        // line 24
        echo "

    <div class=\"wrap\">
        <div class=\"navi\">
            ";
        // line 28
        $context['_parent'] = $context;
        $context['_seq'] = twig_ensure_traversable(($context["breadcrumbs"] ?? null));
        $context['loop'] = [
          'parent' => $context['_parent'],
          'index0' => 0,
          'index'  => 1,
          'first'  => true,
        ];
        if (is_array($context['_seq']) || (is_object($context['_seq']) && $context['_seq'] instanceof \Countable)) {
            $length = count($context['_seq']);
            $context['loop']['revindex0'] = $length - 1;
            $context['loop']['revindex'] = $length;
            $context['loop']['length'] = $length;
            $context['loop']['last'] = 1 === $length;
        }
        foreach ($context['_seq'] as $context["_key"] => $context["breadcrumb"]) {
            // line 29
            echo "                <a href=\"";
            echo twig_get_attribute($this->env, $this->source, $context["breadcrumb"], "href", [], "any", false, false, false, 29);
            echo "\">";
            echo twig_get_attribute($this->env, $this->source, $context["breadcrumb"], "text", [], "any", false, false, false, 29);
            echo "</a>
                ";
            // line 30
            if ( !twig_get_attribute($this->env, $this->source, $context["loop"], "last", [], "any", false, false, false, 30)) {
                echo "<span></span>";
            }
            // line 31
            echo "            ";
            ++$context['loop']['index0'];
            ++$context['loop']['index'];
            $context['loop']['first'] = false;
            if (isset($context['loop']['length'])) {
                --$context['loop']['revindex0'];
                --$context['loop']['revindex'];
                $context['loop']['last'] = 0 === $context['loop']['revindex0'];
            }
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['breadcrumb'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 32
        echo "        </div>
        <h2>";
        // line 33
        echo ($context["heading_title"] ?? null);
        echo "</h2>

        ";
        // line 35
        if (($context["products"] ?? null)) {
            // line 36
            echo "            <div class=\"list flex\">
                ";
            // line 37
            $context['_parent'] = $context;
            $context['_seq'] = twig_ensure_traversable(($context["products"] ?? null));
            foreach ($context['_seq'] as $context["_key"] => $context["product"]) {
                // line 38
                echo "                    ";
                echo $context["product"];
                echo "
                ";
            }
            $_parent = $context['_parent'];
            unset($context['_seq'], $context['_iterated'], $context['_key'], $context['product'], $context['_parent'], $context['loop']);
            $context = array_intersect_key($context, $_parent) + $_parent;
            // line 40
            echo "            </div>
        ";
        }
        // line 42
        echo "    </div>
</div>
";
        // line 44
        echo ($context["footer"] ?? null);
    }

    public function getTemplateName()
    {
        return "extension/eroticshop/catalog/view/template/product/category.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  170 => 44,  166 => 42,  162 => 40,  153 => 38,  149 => 37,  146 => 36,  144 => 35,  139 => 33,  136 => 32,  122 => 31,  118 => 30,  111 => 29,  94 => 28,  88 => 24,  84 => 19,  81 => 18,  70 => 14,  66 => 12,  60 => 10,  58 => 9,  54 => 8,  48 => 6,  45 => 5,  43 => 4,  37 => 1,);
    }

    public function getSourceContext()
    {
        return new Source("", "extension/eroticshop/catalog/view/template/product/category.twig", "H:\\rabota\\OSPanel\\domains\\opencartrs\\extension\\eroticshop\\catalog\\view\\template\\product\\category.twig");
    }
}
