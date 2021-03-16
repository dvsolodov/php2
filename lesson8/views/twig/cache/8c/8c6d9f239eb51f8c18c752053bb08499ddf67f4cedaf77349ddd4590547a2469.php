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

/* orderForm.twig */
class __TwigTemplate_24c5803b0dd0bf5f6989e96fc4cc5a5ac93ca9041d30ace16eca58998a01ebbb extends Template
{
    private $source;
    private $macros = [];

    public function __construct(Environment $env)
    {
        parent::__construct($env);

        $this->source = $this->getSourceContext();

        $this->blocks = [
            'pageTitle' => [$this, 'block_pageTitle'],
            'content' => [$this, 'block_content'],
        ];
    }

    protected function doGetParent(array $context)
    {
        // line 1
        return "layouts/main.twig";
    }

    protected function doDisplay(array $context, array $blocks = [])
    {
        $macros = $this->macros;
        $this->parent = $this->loadTemplate("layouts/main.twig", "orderForm.twig", 1);
        $this->parent->display($context, array_merge($this->blocks, $blocks));
    }

    // line 3
    public function block_pageTitle($context, array $blocks = [])
    {
        $macros = $this->macros;
        echo "Оформление заказа";
    }

    // line 5
    public function block_content($context, array $blocks = [])
    {
        $macros = $this->macros;
        // line 6
        echo "
<h2>Оформление заказа</h2>

";
        // line 9
        if ((0 !== twig_compare(($context["orderMsg"] ?? null), null))) {
            // line 10
            echo "
";
            // line 11
            echo twig_escape_filter($this->env, ($context["orderMsg"] ?? null), "html", null, true);
            echo "

";
        }
        // line 14
        echo "
<form action=\"/order/add\" method=\"POST\">
    <p>
        <span>Ваш номер телефона</span>
        <input type=\"text\" name=\"phone\" value=\"";
        // line 18
        (((0 !== twig_compare(($context["phone"] ?? null), null))) ? (print (twig_escape_filter($this->env, ($context["phone"] ?? null), "html", null, true))) : (print ("")));
        echo "\">
    </p>
    <p>
        <span>Ваше имя</span>
        <input type=\"text\" name=\"name\" value=\"";
        // line 22
        (((0 !== twig_compare(($context["name"] ?? null), null))) ? (print (twig_escape_filter($this->env, ($context["name"] ?? null), "html", null, true))) : (print ("")));
        echo "\">
    </p>
    <input type=\"submit\" name=\"order\" value=\"Оформить\">
</form>

";
    }

    public function getTemplateName()
    {
        return "orderForm.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  87 => 22,  80 => 18,  74 => 14,  68 => 11,  65 => 10,  63 => 9,  58 => 6,  54 => 5,  47 => 3,  36 => 1,);
    }

    public function getSourceContext()
    {
        return new Source("{% extends \"layouts/main.twig\" %}

{% block pageTitle %}Оформление заказа{% endblock %}

{% block content %}

<h2>Оформление заказа</h2>

{% if orderMsg != null %}

{{ orderMsg }}

{% endif %}

<form action=\"/order/add\" method=\"POST\">
    <p>
        <span>Ваш номер телефона</span>
        <input type=\"text\" name=\"phone\" value=\"{{ phone != null ? phone : '' }}\">
    </p>
    <p>
        <span>Ваше имя</span>
        <input type=\"text\" name=\"name\" value=\"{{ name != null ? name : '' }}\">
    </p>
    <input type=\"submit\" name=\"order\" value=\"Оформить\">
</form>

{% endblock %}
", "orderForm.twig", "/opt/lampp/htdocs/test/views/twig/templates/orderForm.twig");
    }
}
