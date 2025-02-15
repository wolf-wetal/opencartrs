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

/* extension/eroticshop/catalog/view/template/account/register.twig */
class __TwigTemplate_423b40ed6b025ed8d62108ea0edb5b5c extends Template
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
<div id=\"account-register\" class=\"login-page\">
    <div class=\"wrap\">
        <h1>Регистрация</h1>
        <div class=\"top-text\">
            Введите свои данные для регистрации
        </div>
        <form id=\"form-register\" action=\"";
        // line 8
        echo ($context["register"] ?? null);
        echo "\" method=\"post\" data-oc-toggle=\"ajax\">
            <div class=\"field\">
                <input type=\"text\" name=\"firstname\" id=\"input-firstname\" placeholder=\"Имя\">
                <br>
                <div id=\"error-firstname\" class=\"invalid-feedback\"></div>
            </div>
            <div class=\"field\">
                <input type=\"text\" name=\"lastname\" id=\"input-lastname\" placeholder=\"Фамилия\">
                <br>
                <div id=\"error-lastname\" class=\"invalid-feedback\"></div>
            </div>
            <div class=\"field\">
                <input type=\"text\" name=\"telephone\" id=\"input-telephone\" placeholder=\"Телефон\">
                <br>
                <div id=\"error-lastname\" class=\"invalid-feedback\"></div>
            </div>
            <div class=\"field\">
                <input type=\"text\" name=\"email\" id=\"input-email\" placeholder=\"Email\">
                <br>
                <div id=\"error-email\" class=\"invalid-feedback\"></div>
            </div>
            <div class=\"field\">
                <input type=\"text\" name=\"age\" id=\"input-age\" placeholder=\"Возраст\">
                <br>
                <div id=\"error-age\" class=\"invalid-feedback\"></div>
            </div>
            <div class=\"select\">
                <input type=\"radio\" class=\"radio\" id=\"s1\" name=\"s1\"><label for=\"s1\">Мужчина</label>
                <input type=\"radio\" class=\"radio\" id=\"s2\" name=\"s1\"><label for=\"s2\">Женщина</label>
                <br>
                <div id=\"error-gender\" class=\"invalid-feedback\"></div>
            </div>
            <div class=\"field\">
                <input type=\"password\" name=\"password\" id=\"input-password-nw\" placeholder=\"Введите пароль\">
                <a class=\"eye password-control-nw\"></a>
                <br>
                <div id=\"error-password\" class=\"invalid-feedback\"></div>
            </div>
            <div class=\"field\">
                <input type=\"password\" name=\"confirm\" id=\"input-confirm-wn\" placeholder=\"Подтвердите пароль\">
                <a class=\"eye password-control-wn\"></a>
                <br>
                <div id=\"error-confirm\" class=\"invalid-feedback\"></div>
            </div>
            <div class=\"select\">
                <input type=\"checkbox\" class=\"checkbox\" id=\"ch1\"><label for=\"ch1\">Подписка на новости</label>
            </div>
            <div class=\"select\">
                <label class=\"form-check-label\">";
        // line 56
        echo ($context["text_agree"] ?? null);
        echo "</label> <input type=\"checkbox\" name=\"agree\" value=\"1\" class=\"form-check-input\"/>
            </div>


            <button type=\"submit\">Далее</button>
        </form>
    </div>
</div>
";
        // line 64
        echo ($context["footer"] ?? null);
        echo "
";
    }

    public function getTemplateName()
    {
        return "extension/eroticshop/catalog/view/template/account/register.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  109 => 64,  98 => 56,  47 => 8,  37 => 1,);
    }

    public function getSourceContext()
    {
        return new Source("", "extension/eroticshop/catalog/view/template/account/register.twig", "H:\\rabota\\OSPanel\\domains\\opencartrs\\extension\\eroticshop\\catalog\\view\\template\\account\\register.twig");
    }
}
