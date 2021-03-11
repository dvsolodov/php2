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

/* register.twig */
class __TwigTemplate_5a364ab051e6ebd7de965b60bca7815ba1b45010d4432529f8014d5dc6523305 extends Template
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
        $this->parent = $this->loadTemplate("layouts/main.twig", "register.twig", 1);
        $this->parent->display($context, array_merge($this->blocks, $blocks));
    }

    // line 3
    public function block_pageTitle($context, array $blocks = [])
    {
        $macros = $this->macros;
        echo "Регистрация";
    }

    // line 5
    public function block_content($context, array $blocks = [])
    {
        $macros = $this->macros;
        // line 6
        echo "<h2>Регистрация учетной записи</h2>

";
        // line 8
        if ((0 !== twig_compare(($context["regMsg"] ?? null), null))) {
            // line 9
            echo "<p>";
            echo twig_escape_filter($this->env, ($context["regMsg"] ?? null), "html", null, true);
            echo "</p>
";
        }
        // line 11
        echo "
<form action=\"/register\" method=\"POST\">
    <p>
        <span>Логин</span>
        <input type=\"text\" name=\"login\" value=\"";
        // line 15
        ((($context["login"] ?? null)) ? (print (twig_escape_filter($this->env, ($context["login"] ?? null), "html", null, true))) : (print ("")));
        echo "\">
        <span>Буквы латинского алфавита и цифры &ndash; ";
        // line 16
        echo twig_escape_filter($this->env, twig_constant("MIN_LOGIN"), "html", null, true);
        echo "-";
        echo twig_escape_filter($this->env, twig_constant("MAX_LOGIN"), "html", null, true);
        echo " символов.</span>
    </p>
    <p>
        <span>Пароль</span>
        <input type=\"password\" name=\"password\">
        <span>Буквы латинского алфавита и цифры &ndash; ";
        // line 21
        echo twig_escape_filter($this->env, twig_constant("MIN_PASS"), "html", null, true);
        echo "-";
        echo twig_escape_filter($this->env, twig_constant("MAX_PASS"), "html", null, true);
        echo " символов.</span>
    </p>
    <p>
        <span>Запомнить</span>
        <input type=\"checkbox\" name=\"remember\" value=\"true\">
    </p>
    <input type=\"submit\" name=\"reg\" value=\"Зарегистрироваться\">
</form>
";
    }

    public function getTemplateName()
    {
        return "register.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  90 => 21,  80 => 16,  76 => 15,  70 => 11,  64 => 9,  62 => 8,  58 => 6,  54 => 5,  47 => 3,  36 => 1,);
    }

    public function getSourceContext()
    {
        return new Source("{% extends \"layouts/main.twig\" %}

{% block pageTitle %}Регистрация{% endblock %}

{% block content %}
<h2>Регистрация учетной записи</h2>

{% if regMsg != null %}
<p>{{ regMsg }}</p>
{% endif %}

<form action=\"/register\" method=\"POST\">
    <p>
        <span>Логин</span>
        <input type=\"text\" name=\"login\" value=\"{{ login ? login : '' }}\">
        <span>Буквы латинского алфавита и цифры &ndash; {{ constant('MIN_LOGIN') }}-{{ constant('MAX_LOGIN') }} символов.</span>
    </p>
    <p>
        <span>Пароль</span>
        <input type=\"password\" name=\"password\">
        <span>Буквы латинского алфавита и цифры &ndash; {{ constant('MIN_PASS') }}-{{ constant('MAX_PASS') }} символов.</span>
    </p>
    <p>
        <span>Запомнить</span>
        <input type=\"checkbox\" name=\"remember\" value=\"true\">
    </p>
    <input type=\"submit\" name=\"reg\" value=\"Зарегистрироваться\">
</form>
{% endblock %}
", "register.twig", "/opt/lampp/htdocs/test/views/twig/templates/register.twig");
    }
}
