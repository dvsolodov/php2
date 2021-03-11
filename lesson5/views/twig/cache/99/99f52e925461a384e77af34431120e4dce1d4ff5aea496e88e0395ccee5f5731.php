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

/* product.twig */
class __TwigTemplate_94b2a5db26665758535544f020cc3ee8b8f2a7525e2c2395962817e653832a88 extends Template
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
        $this->parent = $this->loadTemplate("layouts/main.twig", "product.twig", 1);
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
<section>
    <img src=\"/assets/images/products/big/";
        // line 8
        echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, ($context["product"] ?? null), "img", [], "any", false, false, false, 8), "html", null, true);
        echo "\" width=\"400\">
    <h2>";
        // line 9
        echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, ($context["product"] ?? null), "name", [], "any", false, false, false, 9), "html", null, true);
        echo "</h2>
    <p>";
        // line 10
        echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, ($context["product"] ?? null), "description", [], "any", false, false, false, 10), "html", null, true);
        echo "</p>
    <p>Цена: ";
        // line 11
        echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, ($context["product"] ?? null), "price", [], "any", false, false, false, 11), "html", null, true);
        echo "</p>
    <button>В корзину</button>
</section>

<section>
    <h3>Оставить отзыв о товаре</h3>

    ";
        // line 18
        if ((0 !== twig_compare(($context["commentMsg"] ?? null), null))) {
            // line 19
            echo "    <p>";
            echo twig_escape_filter($this->env, ($context["commentMsg"] ?? null), "html", null, true);
            echo "</p>
    ";
        }
        // line 21
        echo "
    <form action=\"/comments/";
        // line 22
        echo twig_escape_filter($this->env, ($context["formAction"] ?? null), "html", null, true);
        echo "\" method=\"POST\">
        <p>
            <span>Ваше имя: </span>
            <input type=\"text\" name=\"name\">
            <span>Количество символов от ";
        // line 26
        echo twig_escape_filter($this->env, twig_constant("MIN_NAME"), "html", null, true);
        echo " до ";
        echo twig_escape_filter($this->env, twig_constant("MAX_NAME"), "html", null, true);
        echo "</span>
        </p>
        <p>
            <span>Ваш отзыв: </span>
            <textarea name=\"text\" cols=\"30\" rows=\"10\"></textarea>
            <span>Количество символов от ";
        // line 31
        echo twig_escape_filter($this->env, twig_constant("MIN_COMMENT"), "html", null, true);
        echo " до ";
        echo twig_escape_filter($this->env, twig_constant("MAX_COMMENT"), "html", null, true);
        echo "</span>
        </p>
        <input type=\"hidden\" name=\"productId\" value=\"";
        // line 33
        echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, ($context["product"] ?? null), "id", [], "any", false, false, false, 33), "html", null, true);
        echo " \">
        <input type=\"submit\" name=\"comment\" value=\"";
        // line 34
        echo twig_escape_filter($this->env, ($context["buttonName"] ?? null), "html", null, true);
        echo "\">
    </form>
</section>

<section>
    <h3>Отзывы</h3>
";
        // line 40
        $context['_parent'] = $context;
        $context['_seq'] = twig_ensure_traversable(($context["comments"] ?? null));
        foreach ($context['_seq'] as $context["_key"] => $context["comment"]) {
            // line 41
            echo "    <p>
        <span>";
            // line 42
            echo twig_escape_filter($this->env, twig_date_format_filter($this->env, twig_get_attribute($this->env, $this->source, $context["comment"], "comment_date", [], "any", false, false, false, 42), "Y-M-d H:i:s"), "html", null, true);
            echo "</span>
        <span>";
            // line 43
            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["comment"], "user_name", [], "any", false, false, false, 43), "html", null, true);
            echo "</span>
        <span>";
            // line 44
            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["comment"], "text", [], "any", false, false, false, 44), "html", null, true);
            echo "</span>
    </p>
";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['comment'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 47
        echo "</section>    
    
";
    }

    public function getTemplateName()
    {
        return "product.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  156 => 47,  147 => 44,  143 => 43,  139 => 42,  136 => 41,  132 => 40,  123 => 34,  119 => 33,  112 => 31,  102 => 26,  95 => 22,  92 => 21,  86 => 19,  84 => 18,  74 => 11,  70 => 10,  66 => 9,  62 => 8,  58 => 6,  54 => 5,  47 => 3,  36 => 1,);
    }

    public function getSourceContext()
    {
        return new Source("{% extends \"layouts/main.twig\" %}

{% block pageTitle %}Каталог{% endblock %}

{% block content %}

<section>
    <img src=\"/assets/images/products/big/{{ product.img }}\" width=\"400\">
    <h2>{{ product.name }}</h2>
    <p>{{ product.description }}</p>
    <p>Цена: {{ product.price }}</p>
    <button>В корзину</button>
</section>

<section>
    <h3>Оставить отзыв о товаре</h3>

    {% if commentMsg != null %}
    <p>{{ commentMsg }}</p>
    {% endif %}

    <form action=\"/comments/{{ formAction }}\" method=\"POST\">
        <p>
            <span>Ваше имя: </span>
            <input type=\"text\" name=\"name\">
            <span>Количество символов от {{ constant('MIN_NAME') }} до {{ constant('MAX_NAME') }}</span>
        </p>
        <p>
            <span>Ваш отзыв: </span>
            <textarea name=\"text\" cols=\"30\" rows=\"10\"></textarea>
            <span>Количество символов от {{ constant('MIN_COMMENT') }} до {{ constant('MAX_COMMENT') }}</span>
        </p>
        <input type=\"hidden\" name=\"productId\" value=\"{{ product.id }} \">
        <input type=\"submit\" name=\"comment\" value=\"{{ buttonName }}\">
    </form>
</section>

<section>
    <h3>Отзывы</h3>
{% for comment in comments %}
    <p>
        <span>{{ comment.comment_date|date(\"Y-M-d H:i:s\") }}</span>
        <span>{{ comment.user_name }}</span>
        <span>{{ comment.text }}</span>
    </p>
{% endfor %}
</section>    
    
{% endblock %}
", "product.twig", "/opt/lampp/htdocs/test/views/twig/templates/product.twig");
    }
}
