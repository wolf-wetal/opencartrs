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

/* extension/eroticshop/catalog/view/template/common/menu.twig */
class __TwigTemplate_e6bd17719900ef517dbafc5a15264165 extends Template
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
        echo "
";
        // line 2
        if (($context["categories"] ?? null)) {
            // line 3
            echo "    <nav class=\"site-menu\">
        <ul>
            ";
            // line 5
            $context['_parent'] = $context;
            $context['_seq'] = twig_ensure_traversable(($context["categories"] ?? null));
            foreach ($context['_seq'] as $context["_key"] => $context["category"]) {
                // line 6
                echo "                ";
                if (twig_get_attribute($this->env, $this->source, $context["category"], "children", [], "any", false, false, false, 6)) {
                    // line 7
                    echo "
                ";
                } else {
                    // line 9
                    echo "                    <li><a href=\"";
                    echo twig_get_attribute($this->env, $this->source, $context["category"], "href", [], "any", false, false, false, 9);
                    echo "\">";
                    echo twig_get_attribute($this->env, $this->source, $context["category"], "name", [], "any", false, false, false, 9);
                    echo "</a></li>
                ";
                }
                // line 11
                echo "            ";
            }
            $_parent = $context['_parent'];
            unset($context['_seq'], $context['_iterated'], $context['_key'], $context['category'], $context['_parent'], $context['loop']);
            $context = array_intersect_key($context, $_parent) + $_parent;
            // line 12
            echo "        </ul>
    </nav>
    <nav class=\"mobile-menu\">
        <div class=\"login\">
            <div class=\"wrap\">
                <a data-fancybox=\"popup4_1\" data-src=\"#popup_login\" href=\"javascript:;\">Войти</a>
            </div>
        </div>
        <div class=\"menu1\">
            <div class=\"wrap\">
                <ul>
                    <li><a href=\"";
            // line 23
            echo ($context["url_novinki"] ?? null);
            echo "\">Новинки</a></li>
                    <li><a href=\"";
            // line 24
            echo ($context["url_skidki"] ?? null);
            echo "\">Скидки</a></li>
                    <li><a href=\"#\">Отзывы</a></li>
                </ul>
            </div>
        </div>
        <div class=\"menu2\">
            <div class=\"wrap\">
                <ul>
                    ";
            // line 32
            $context['_parent'] = $context;
            $context['_seq'] = twig_ensure_traversable(($context["categories"] ?? null));
            foreach ($context['_seq'] as $context["_key"] => $context["category"]) {
                // line 33
                echo "                        ";
                if (twig_get_attribute($this->env, $this->source, $context["category"], "children", [], "any", false, false, false, 33)) {
                    // line 34
                    echo "
                        ";
                } else {
                    // line 36
                    echo "                            <li><a href=\"";
                    echo twig_get_attribute($this->env, $this->source, $context["category"], "href", [], "any", false, false, false, 36);
                    echo "\">";
                    echo twig_get_attribute($this->env, $this->source, $context["category"], "name", [], "any", false, false, false, 36);
                    echo "</a></li>
                        ";
                }
                // line 38
                echo "                    ";
            }
            $_parent = $context['_parent'];
            unset($context['_seq'], $context['_iterated'], $context['_key'], $context['category'], $context['_parent'], $context['loop']);
            $context = array_intersect_key($context, $_parent) + $_parent;
            // line 39
            echo "                </ul>
            </div>
        </div>
        <div class=\"wrap\">
            <div class=\"links flex\">
                <a href=\"";
            // line 44
            echo ($context["adress"] ?? null);
            echo "\">
                    <svg width=\"24\" height=\"24\" viewBox=\"0 0 24 24\" fill=\"none\" xmlns=\"http://www.w3.org/2000/svg\">
                        <path fill-rule=\"evenodd\" clip-rule=\"evenodd\" d=\"M12 6C9.79086 6 8 7.79086 8 10C8 12.2091 9.79086 14 12 14C14.2091 14 16 12.2091 16 10C16 7.79086 14.2091 6 12 6ZM10 10C10 8.89543 10.8954 8 12 8C13.1046 8 14 8.89543 14 10C14 11.1046 13.1046 12 12 12C10.8954 12 10 11.1046 10 10Z\" />
                        <path fill-rule=\"evenodd\" clip-rule=\"evenodd\" d=\"M12 2C7.58172 2 4 5.58172 4 10C4 14.9758 7.14876 18.9616 10.4687 21.221C11.3936 21.8505 12.6064 21.8505 13.5313 21.221C16.8512 18.9616 20 14.9758 20 10C20 5.58172 16.4183 2 12 2ZM6 10C6 6.68629 8.68629 4 12 4C15.3137 4 18 6.68629 18 10C18 14.099 15.3842 17.5408 12.4061 19.5676C12.1602 19.735 11.8398 19.735 11.5939 19.5676C8.61583 17.5409 6 14.099 6 10Z\" />
                    </svg>
                    Адрес
                </a>
                <a href=\"tel:+996501060900\">
                    <svg width=\"24\" height=\"24\" viewBox=\"0 0 24 24\" fill=\"none\" xmlns=\"http://www.w3.org/2000/svg\">
                        <path d=\"M19.41 13C19.19 13 18.96 12.93 18.74 12.88C18.2948 12.7805 17.8571 12.6501 17.43 12.49C16.9661 12.3212 16.4561 12.33 15.9983 12.5146C15.5405 12.6992 15.1671 13.0466 14.95 13.49L14.73 13.95C13.7588 13.3992 12.8616 12.7271 12.06 11.95C11.2829 11.1484 10.6108 10.2512 10.06 9.28L10.52 9.07C10.9634 8.85292 11.3108 8.47953 11.4954 8.02169C11.68 7.56385 11.6888 7.05391 11.52 6.59C11.3612 6.15903 11.2309 5.71808 11.13 5.27C11.08 5.05 11.04 4.82 11.01 4.6C10.8886 3.89562 10.5196 3.25774 9.96962 2.80124C9.41962 2.34474 8.7247 2.09961 8.01 2.11H5C4.57725 2.10945 4.15915 2.19825 3.77312 2.37058C3.38709 2.54292 3.04184 2.7949 2.76 3.11C2.47232 3.43365 2.25812 3.81575 2.1321 4.23004C2.00609 4.64432 1.97126 5.08098 2.03 5.51C2.57359 9.67214 4.47521 13.5387 7.44 16.51C10.4113 19.4748 14.2779 21.3764 18.44 21.92C18.5698 21.9299 18.7002 21.9299 18.83 21.92C19.5674 21.9211 20.2794 21.6505 20.83 21.16C21.1451 20.8782 21.3971 20.5329 21.5694 20.1469C21.7418 19.7609 21.8306 19.3428 21.83 18.92V15.92C21.8246 15.229 21.5809 14.5611 21.1399 14.0291C20.699 13.4971 20.088 13.1336 19.41 13ZM19.9 19C19.8997 19.1395 19.8701 19.2775 19.8133 19.4049C19.7565 19.5324 19.6736 19.6465 19.57 19.74C19.4604 19.8399 19.33 19.9141 19.1881 19.9573C19.0463 20.0006 18.8967 20.0117 18.75 19.99C15.0183 19.5026 11.5502 17.802 8.88 15.15C6.20747 12.4775 4.49203 8.99737 4 5.25C3.97828 5.10333 3.98944 4.95367 4.03267 4.81185C4.07591 4.67003 4.15015 4.5396 4.25 4.43C4.34462 4.32515 4.46038 4.24154 4.58965 4.18466C4.71892 4.12778 4.85877 4.09892 5 4.1H8C8.23116 4.09435 8.45714 4.16898 8.63946 4.3112C8.82179 4.45341 8.9492 4.65442 9 4.88C9 5.15 9.09 5.43 9.15 5.7C9.26558 6.22386 9.41932 6.73857 9.61 7.24L8.21 7.9C7.96936 8.01046 7.78236 8.21185 7.69 8.46C7.58998 8.70346 7.58998 8.97654 7.69 9.22C9.1292 12.3028 11.6072 14.7808 14.69 16.22C14.9335 16.32 15.2065 16.32 15.45 16.22C15.6981 16.1276 15.8995 15.9406 16.01 15.7L16.64 14.3C17.1559 14.4881 17.6837 14.6418 18.22 14.76C18.48 14.82 18.76 14.87 19.03 14.91C19.2556 14.9608 19.4566 15.0882 19.5988 15.2705C19.741 15.4529 19.8156 15.6788 19.81 15.91L19.9 19ZM14 2C13.77 2 13.53 2 13.3 2C13.0348 2.02254 12.7894 2.14952 12.6178 2.353C12.4462 2.55647 12.3625 2.81978 12.385 3.085C12.4075 3.35022 12.5345 3.59562 12.738 3.76721C12.9415 3.93881 13.2048 4.02254 13.47 4H14C15.5913 4 17.1174 4.63214 18.2426 5.75736C19.3679 6.88258 20 8.4087 20 10C20 10.18 20 10.35 20 10.53C19.9778 10.7938 20.0612 11.0556 20.2318 11.2581C20.4023 11.4606 20.6463 11.5871 20.91 11.61H20.99C21.2403 11.611 21.4819 11.5181 21.6671 11.3496C21.8522 11.1811 21.9675 10.9493 21.99 10.7C21.99 10.47 21.99 10.23 21.99 10C21.99 7.88 21.1485 5.84668 19.6504 4.34668C18.1523 2.84667 16.12 2.00265 14 2ZM16 10C16 10.2652 16.1054 10.5196 16.2929 10.7071C16.4804 10.8946 16.7348 11 17 11C17.2652 11 17.5196 10.8946 17.7071 10.7071C17.8946 10.5196 18 10.2652 18 10C18 8.93913 17.5786 7.92172 16.8284 7.17157C16.0783 6.42143 15.0609 6 14 6C13.7348 6 13.4804 6.10536 13.2929 6.29289C13.1054 6.48043 13 6.73478 13 7C13 7.26522 13.1054 7.51957 13.2929 7.70711C13.4804 7.89464 13.7348 8 14 8C14.5304 8 15.0391 8.21071 15.4142 8.58579C15.7893 8.96086 16 9.46957 16 10Z\"/>
                    </svg>
                    Позвонить
                </a>
                <a href=\"";
            // line 57
            echo ($context["payment_delivery"] ?? null);
            echo "\">
                    <svg width=\"25\" height=\"24\" viewBox=\"0 0 25 24\" fill=\"none\" xmlns=\"http://www.w3.org/2000/svg\">
                        <path d=\"M1.5 12.5V17.5C1.5 17.7652 1.60536 18.0196 1.79289 18.2071C1.98043 18.3946 2.23478 18.5 2.5 18.5H3.5C3.5 19.2956 3.81607 20.0587 4.37868 20.6213C4.94129 21.1839 5.70435 21.5 6.5 21.5C7.29565 21.5 8.05871 21.1839 8.62132 20.6213C9.18393 20.0587 9.5 19.2956 9.5 18.5H15.5C15.5 19.2956 15.8161 20.0587 16.3787 20.6213C16.9413 21.1839 17.7044 21.5 18.5 21.5C19.2956 21.5 20.0587 21.1839 20.6213 20.6213C21.1839 20.0587 21.5 19.2956 21.5 18.5H22.5C22.7652 18.5 23.0196 18.3946 23.2071 18.2071C23.3946 18.0196 23.5 17.7652 23.5 17.5V5.5C23.5 4.70435 23.1839 3.94129 22.6213 3.37868C22.0587 2.81607 21.2956 2.5 20.5 2.5H11.5C10.7044 2.5 9.94129 2.81607 9.37868 3.37868C8.81607 3.94129 8.5 4.70435 8.5 5.5V7.5H6.5C6.03426 7.5 5.57493 7.60844 5.15836 7.81672C4.74179 8.025 4.37944 8.32741 4.1 8.7L1.7 11.9C1.67075 11.9435 1.64722 11.9905 1.63 12.04L1.57 12.15C1.52587 12.2615 1.50216 12.3801 1.5 12.5ZM17.5 18.5C17.5 18.3022 17.5586 18.1089 17.6685 17.9444C17.7784 17.78 17.9346 17.6518 18.1173 17.5761C18.3 17.5004 18.5011 17.4806 18.6951 17.5192C18.8891 17.5578 19.0673 17.653 19.2071 17.7929C19.347 17.9327 19.4422 18.1109 19.4808 18.3049C19.5194 18.4989 19.4996 18.7 19.4239 18.8827C19.3482 19.0654 19.22 19.2216 19.0556 19.3315C18.8911 19.4414 18.6978 19.5 18.5 19.5C18.2348 19.5 17.9804 19.3946 17.7929 19.2071C17.6054 19.0196 17.5 18.7652 17.5 18.5ZM10.5 5.5C10.5 5.23478 10.6054 4.98043 10.7929 4.79289C10.9804 4.60536 11.2348 4.5 11.5 4.5H20.5C20.7652 4.5 21.0196 4.60536 21.2071 4.79289C21.3946 4.98043 21.5 5.23478 21.5 5.5V16.5H20.72C20.4388 16.1906 20.0961 15.9435 19.7138 15.7743C19.3315 15.6052 18.918 15.5178 18.5 15.5178C18.082 15.5178 17.6685 15.6052 17.2862 15.7743C16.9039 15.9435 16.5612 16.1906 16.28 16.5H10.5V5.5ZM8.5 11.5H4.5L5.7 9.9C5.79315 9.7758 5.91393 9.675 6.05279 9.60557C6.19164 9.53615 6.34475 9.5 6.5 9.5H8.5V11.5ZM5.5 18.5C5.5 18.3022 5.55865 18.1089 5.66853 17.9444C5.77841 17.78 5.93459 17.6518 6.11732 17.5761C6.30004 17.5004 6.50111 17.4806 6.69509 17.5192C6.88907 17.5578 7.06725 17.653 7.20711 17.7929C7.34696 17.9327 7.4422 18.1109 7.48079 18.3049C7.51937 18.4989 7.49957 18.7 7.42388 18.8827C7.34819 19.0654 7.22002 19.2216 7.05557 19.3315C6.89112 19.4414 6.69778 19.5 6.5 19.5C6.23478 19.5 5.98043 19.3946 5.79289 19.2071C5.60536 19.0196 5.5 18.7652 5.5 18.5ZM3.5 13.5H8.5V16.28C7.90983 15.7526 7.13513 15.4797 6.34469 15.5209C5.55425 15.5621 4.81212 15.914 4.28 16.5H3.5V13.5Z\" />
                    </svg>
                    Доставка
                </a>
            </div>
            <div class=\"hours\">
                <span>Режим работы:</span>
                Ежедневно 10:00-21:00
            </div>
        </div>
    </nav>
";
        }
    }

    public function getTemplateName()
    {
        return "extension/eroticshop/catalog/view/template/common/menu.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  147 => 57,  131 => 44,  124 => 39,  118 => 38,  110 => 36,  106 => 34,  103 => 33,  99 => 32,  88 => 24,  84 => 23,  71 => 12,  65 => 11,  57 => 9,  53 => 7,  50 => 6,  46 => 5,  42 => 3,  40 => 2,  37 => 1,);
    }

    public function getSourceContext()
    {
        return new Source("", "extension/eroticshop/catalog/view/template/common/menu.twig", "H:\\rabota\\OSPanel\\domains\\opencartrs\\extension\\eroticshop\\catalog\\view\\template\\common\\menu.twig");
    }
}
