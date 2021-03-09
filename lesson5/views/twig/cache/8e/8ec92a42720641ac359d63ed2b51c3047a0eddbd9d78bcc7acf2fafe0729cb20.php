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

/* catalog.twig */
class __TwigTemplate_529ee983123cc39e0ebf5645888ce76b48ff96957c5a976ba2735d9bcacce78b extends Template
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
        $this->parent = $this->loadTemplate("layouts/main.twig", "catalog.twig", 1);
        $this->parent->display($context, array_merge($this->blocks, $blocks));
    }

    // line 3
    public function block_pageTitle($context, array $blocks = [])
    {
        $macros = $this->macros;
        echo "Каталог";
    }

    // line 5
    public function block_content($context, array $blocks = [])
    {
        $macros = $this->macros;
        // line 6
        echo "
<h2>Каталог</h2>
";
        // line 8
        if ((0 !== twig_compare(($context["products"] ?? null), []))) {
            // line 9
            echo "    ";
            $context['_parent'] = $context;
            $context['_seq'] = twig_ensure_traversable(($context["products"] ?? null));
            foreach ($context['_seq'] as $context["_key"] => $context["product"]) {
                // line 10
                echo "    <section>
        <img src=\"/assets/images/products/small/";
                // line 11
                echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["product"], "img", [], "any", false, false, false, 11), "html", null, true);
                echo "\">
        <h3><a href=\"/products/";
                // line 12
                echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["product"], "id", [], "any", false, false, false, 12), "html", null, true);
                echo "\">";
                echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["product"], "name", [], "any", false, false, false, 12), "html", null, true);
                echo "</a></h3>
        <p>Цена: ";
                // line 13
                echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["product"], "price", [], "any", false, false, false, 13), "html", null, true);
                echo "</p>
        <button>В корзину</button>
    </section>
    ";
            }
            $_parent = $context['_parent'];
            unset($context['_seq'], $context['_iterated'], $context['_key'], $context['product'], $context['_parent'], $context['loop']);
            $context = array_intersect_key($context, $_parent) + $_parent;
            // line 16
            echo " 
    <button data-start=\"";
            // line 17
            echo twig_escape_filter($this->env, ($context["startId"] ?? null), "html", null, true);
            echo "\">Еще</button>
";
        } else {
            // line 19
            echo "<p>Каталог пуст.</p>
";
        }
        // line 21
        echo "
<script src=\"/assets/scripts/addProductToPage.js\"></script>

";
    }

    public function getTemplateName()
    {
        return "catalog.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  104 => 21,  100 => 19,  95 => 17,  92 => 16,  82 => 13,  76 => 12,  72 => 11,  69 => 10,  64 => 9,  62 => 8,  58 => 6,  54 => 5,  47 => 3,  36 => 1,);
    }

    public function getSourceContext()
    {
        return new Source("{% extends \"layouts/main.twig\" %}

{% block pageTitle %}Каталог{% endblock %}

{% block content %}

<h2>Каталог</h2>
{% if products != [] %}
    {% for product in products %}
    <section>
        <img src=\"/assets/images/products/small/{{ product.img }}\">
        <h3><a href=\"/products/{{ product.id }}\">{{ product.name }}</a></h3>
        <p>Цена: {{ product.price }}</p>
        <button>В корзину</button>
    </section>
    {% endfor %} 
    <button data-start=\"{{ startId }}\">Еще</button>
{% else %}
<p>Каталог пуст.</p>
{% endif %}

<script src=\"/assets/scripts/addProductToPage.js\"></script>

{% endblock %}
", "catalog.twig", "/opt/lampp/htdocs/test/views/twig/templates/catalog.twig");
    }
}
