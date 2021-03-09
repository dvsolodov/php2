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

/* layouts/main.twig */
class __TwigTemplate_56053c016fb76bb6020849c69a89f112e2c1a611ef48320bafe03ee36993b63c extends Template
{
    private $source;
    private $macros = [];

    public function __construct(Environment $env)
    {
        parent::__construct($env);

        $this->source = $this->getSourceContext();

        $this->parent = false;

        $this->blocks = [
            'pageTitle' => [$this, 'block_pageTitle'],
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
    <title>";
        // line 5
        $this->displayBlock('pageTitle', $context, $blocks);
        echo "</title>
    <link rel=\"stylesheet\" href=\"/assets/styles/main.css\">
</head>
<body>

    <header>
        <nav>
            ";
        // line 12
        $this->loadTemplate("menu.twig", "layouts/main.twig", 12)->display($context);
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
        $this->loadTemplate("footer.twig", "layouts/main.twig", 21)->display($context);
        // line 22
        echo "    </footer>

</body>
</html>
";
    }

    // line 5
    public function block_pageTitle($context, array $blocks = [])
    {
        $macros = $this->macros;
    }

    // line 17
    public function block_content($context, array $blocks = [])
    {
        $macros = $this->macros;
    }

    public function getTemplateName()
    {
        return "layouts/main.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  86 => 17,  80 => 5,  72 => 22,  70 => 21,  63 => 17,  57 => 13,  55 => 12,  45 => 5,  39 => 1,);
    }

    public function getSourceContext()
    {
        return new Source("<!DOCTYPE html>
<html lang=\"en\">
<head>
    <meta charset=\"UTF-8\">
    <title>{% block pageTitle %}{% endblock %}</title>
    <link rel=\"stylesheet\" href=\"/assets/styles/main.css\">
</head>
<body>

    <header>
        <nav>
            {% include 'menu.twig' %}
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
", "layouts/main.twig", "/opt/lampp/htdocs/test/views/twig/templates/layouts/main.twig");
    }
}
