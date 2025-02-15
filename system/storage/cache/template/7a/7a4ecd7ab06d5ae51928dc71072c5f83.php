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

/* extension/eroticshop/catalog/view/template/account/login_popup.twig */
class __TwigTemplate_5a22bbc2c8a8b1852d13c7b91d456215 extends Template
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
        echo "<div class=\"popup\" id=\"popup_login\" style=\"display: none; width: 100%; max-width: 550px;\">
    <div class=\"login-page\">
        <h1>Вход в личный кабинет</h1>
        <form id=\"form-login-popup\" action=\"";
        // line 4
        echo ($context["login"] ?? null);
        echo "\" method=\"post\" data-oc-toggle=\"ajax\">
            <div class=\"field\">
                <input type=\"text\" id=\"input-email\" name=\"email\" value=\"";
        // line 6
        echo ($context["email"] ?? null);
        echo "\" placeholder=\"Введите почту\" required>
            </div>
            <div class=\"field\">
                <input type=\"password\" name=\"password\" value=\"";
        // line 9
        echo ($context["password"] ?? null);
        echo "\" id=\"input-password\" placeholder=\"Введите пароль\" required>
                <a class=\"eye password-control\"></a>
            </div>
            <a href=\"";
        // line 12
        echo ($context["forgotten"] ?? null);
        echo "\" class=\"forget-link\">Забыли пароль?</a>
            <div id=\"alert-popup\" class=\"\"></div>
            <button type=\"submit\">Войти</button>
            <div class=\"bottom-link\">
                <a href=\"";
        // line 16
        echo ($context["register"] ?? null);
        echo "\">Регистрация</a>
            </div>

        </form>
    </div>
</div>
";
    }

    public function getTemplateName()
    {
        return "extension/eroticshop/catalog/view/template/account/login_popup.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  66 => 16,  59 => 12,  53 => 9,  47 => 6,  42 => 4,  37 => 1,);
    }

    public function getSourceContext()
    {
        return new Source("", "extension/eroticshop/catalog/view/template/account/login_popup.twig", "H:\\rabota\\OSPanel\\domains\\opencartrs\\extension\\eroticshop\\catalog\\view\\template\\account\\login_popup.twig");
    }
}
