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

/* admin/adminAuth.twig */
class __TwigTemplate_633b0c5326ab856b3bb2924b861d079576ccc48c4d62d7cbe797ebec188f9909 extends Template
{
    private $source;
    private $macros = [];

    public function __construct(Environment $env)
    {
        parent::__construct($env);

        $this->source = $this->getSourceContext();

        $this->blocks = [
            'content' => [$this, 'block_content'],
        ];
    }

    protected function doGetParent(array $context)
    {
        // line 1
        return "layouts/admin.twig";
    }

    protected function doDisplay(array $context, array $blocks = [])
    {
        $macros = $this->macros;
        $this->parent = $this->loadTemplate("layouts/admin.twig", "admin/adminAuth.twig", 1);
        $this->parent->display($context, array_merge($this->blocks, $blocks));
    }

    // line 3
    public function block_content($context, array $blocks = [])
    {
        $macros = $this->macros;
        // line 4
        echo "
<h2>Вход в панель администратора</h2>

";
        // line 7
        if ((0 !== twig_compare(($context["authMsg"] ?? null), null))) {
            // line 8
            echo "<p>";
            echo twig_escape_filter($this->env, ($context["authMsg"] ?? null), "html", null, true);
            echo "</p>
";
        }
        // line 10
        echo "
<form action=\"/admin/auth\" method=\"POST\">
    <p>
        <span>Логин</span>
        <input type=\"text\" name=\"login\" value=\"";
        // line 14
        ((($context["login"] ?? null)) ? (print (twig_escape_filter($this->env, ($context["login"] ?? null), "html", null, true))) : (print ("")));
        echo "\">
    </p>
    <p>
        <span>Пароль</span>
        <input type=\"password\" name=\"password\">
    </p>
    <input type=\"submit\" name=\"auth\" value=\"Войти\">
</form>

";
    }

    public function getTemplateName()
    {
        return "admin/adminAuth.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  69 => 14,  63 => 10,  57 => 8,  55 => 7,  50 => 4,  46 => 3,  35 => 1,);
    }

    public function getSourceContext()
    {
        return new Source("{% extends \"layouts/admin.twig\" %}

{% block content %}

<h2>Вход в панель администратора</h2>

{% if authMsg != null %}
<p>{{ authMsg }}</p>
{% endif %}

<form action=\"/admin/auth\" method=\"POST\">
    <p>
        <span>Логин</span>
        <input type=\"text\" name=\"login\" value=\"{{ login ? login : '' }}\">
    </p>
    <p>
        <span>Пароль</span>
        <input type=\"password\" name=\"password\">
    </p>
    <input type=\"submit\" name=\"auth\" value=\"Войти\">
</form>

{% endblock %}
", "admin/adminAuth.twig", "/opt/lampp/htdocs/test/views/twig/templates/admin/adminAuth.twig");
    }
}
