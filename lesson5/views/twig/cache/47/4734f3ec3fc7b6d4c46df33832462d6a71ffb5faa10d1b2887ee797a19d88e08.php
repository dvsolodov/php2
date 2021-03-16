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

/* login.twig */
class __TwigTemplate_1578a0b0fa965ac31b7e601cbcb0f0f0aa5c35efa8e9eb6a71b5f3c607b8a7f4 extends Template
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
        $this->parent = $this->loadTemplate("layouts/main.twig", "login.twig", 1);
        $this->parent->display($context, array_merge($this->blocks, $blocks));
    }

    // line 3
    public function block_pageTitle($context, array $blocks = [])
    {
        $macros = $this->macros;
        echo "Авторизация";
    }

    // line 5
    public function block_content($context, array $blocks = [])
    {
        $macros = $this->macros;
        // line 6
        echo "<h2>Вход в учетную запись</h2>

";
        // line 8
        if ((0 !== twig_compare(($context["authMsg"] ?? null), null))) {
            // line 9
            echo "<p>";
            echo twig_escape_filter($this->env, ($context["authMsg"] ?? null), "html", null, true);
            echo "</p>
";
        }
        // line 11
        echo "
<form action=\"/login\" method=\"POST\">
    <p>
        <span>Логин</span>
        <input type=\"text\" name=\"login\" value=\"";
        // line 15
        ((($context["login"] ?? null)) ? (print (twig_escape_filter($this->env, ($context["login"] ?? null), "html", null, true))) : (print ("")));
        echo "\">
    </p>
    <p>
        <span>Пароль</span>
        <input type=\"password\" name=\"password\">
    </p>
    <p>
        <span>Запомнить</span>
        <input type=\"checkbox\" name=\"remember\" value=\"true\">
    </p>
    <input type=\"submit\" name=\"auth\" value=\"Войти\">
</form>
";
    }

    public function getTemplateName()
    {
        return "login.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  76 => 15,  70 => 11,  64 => 9,  62 => 8,  58 => 6,  54 => 5,  47 => 3,  36 => 1,);
    }

    public function getSourceContext()
    {
        return new Source("{% extends \"layouts/main.twig\" %}

{% block pageTitle %}Авторизация{% endblock %}

{% block content %}
<h2>Вход в учетную запись</h2>

{% if authMsg != null %}
<p>{{ authMsg }}</p>
{% endif %}

<form action=\"/login\" method=\"POST\">
    <p>
        <span>Логин</span>
        <input type=\"text\" name=\"login\" value=\"{{ login ? login : '' }}\">
    </p>
    <p>
        <span>Пароль</span>
        <input type=\"password\" name=\"password\">
    </p>
    <p>
        <span>Запомнить</span>
        <input type=\"checkbox\" name=\"remember\" value=\"true\">
    </p>
    <input type=\"submit\" name=\"auth\" value=\"Войти\">
</form>
{% endblock %}
", "login.twig", "/opt/lampp/htdocs/test/views/twig/templates/login.twig");
    }
}
