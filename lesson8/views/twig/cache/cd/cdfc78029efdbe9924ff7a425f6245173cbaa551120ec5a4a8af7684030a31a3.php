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

/* layouts/admin.twig */
class __TwigTemplate_fc3e9ba44f265db395120ce4141dc968fee48ff10c3d099ac31a574e9785bca5 extends Template
{
    private $source;
    private $macros = [];

    public function __construct(Environment $env)
    {
        parent::__construct($env);

        $this->source = $this->getSourceContext();

        $this->parent = false;

        $this->blocks = [
            'content' => [$this, 'block_content'],
        ];
    }

    protected function doDisplay(array $context, array $blocks = [])
    {
        $macros = $this->macros;
        // line 1
        echo "<!DOCTYPE html>
<html lang=\"en\">
<head>
    <meta charset=\"UTF-8\">
    <title>Панель администратора</title>
    <link rel=\"stylesheet\" href=\"/assets/styles/admin.css\">
</head>
<body>

    <header>
        <nav>
            ";
        // line 12
        $this->loadTemplate("admin/menu.twig", "layouts/admin.twig", 12)->display($context);
        // line 13
        echo "        </nav>
    </header>

    <main>
        ";
        // line 17
        $this->displayBlock('content', $context, $blocks);
        echo " 
    </main>

    <footer>
        ";
        // line 21
        $this->loadTemplate("footer.twig", "layouts/admin.twig", 21)->display($context);
        // line 22
        echo "    </footer>

</body>
</html>

";
    }

    // line 17
    public function block_content($context, array $blocks = [])
    {
        $macros = $this->macros;
    }

    public function getTemplateName()
    {
        return "layouts/admin.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  77 => 17,  68 => 22,  66 => 21,  59 => 17,  53 => 13,  51 => 12,  38 => 1,);
    }

    public function getSourceContext()
    {
        return new Source("<!DOCTYPE html>
<html lang=\"en\">
<head>
    <meta charset=\"UTF-8\">
    <title>Панель администратора</title>
    <link rel=\"stylesheet\" href=\"/assets/styles/admin.css\">
</head>
<body>

    <header>
        <nav>
            {% include 'admin/menu.twig' %}
        </nav>
    </header>

    <main>
        {% block content %}{% endblock %} 
    </main>

    <footer>
        {% include 'footer.twig' %}
    </footer>

</body>
</html>

", "layouts/admin.twig", "/opt/lampp/htdocs/test/views/twig/templates/layouts/admin.twig");
    }
}
