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

/* orderCart.twig */
class __TwigTemplate_38b0481cb9235ef4f989c75f49bd0a64f7086861e5ddd6fc2ecabb02f206db00 extends Template
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
        $this->parent = $this->loadTemplate("layouts/main.twig", "orderCart.twig", 1);
        $this->parent->display($context, array_merge($this->blocks, $blocks));
    }

    // line 3
    public function block_pageTitle($context, array $blocks = [])
    {
        $macros = $this->macros;
        echo "Корзина";
    }

    // line 5
    public function block_content($context, array $blocks = [])
    {
        $macros = $this->macros;
        // line 6
        echo "
<h2>Корзина ордера №";
        // line 7
        echo twig_escape_filter($this->env, ($context["orderNumber"] ?? null), "html", null, true);
        echo "</h2>

";
        // line 9
        if ((0 === twig_compare(($context["products"] ?? null), null))) {
            // line 10
            echo "
<p>Корзина пуста.</p>

";
        } else {
            // line 14
            echo "
<div>
    <table>
        <tr>
            <th>Название товара</th>
            <th>Цена</th>
            <th>Количество</th>
            <th>Итого</th>
        </tr>
       ";
            // line 23
            $context['_parent'] = $context;
            $context['_seq'] = twig_ensure_traversable(($context["products"] ?? null));
            foreach ($context['_seq'] as $context["_key"] => $context["product"]) {
                echo " 
        <tr data-prod-id=\"";
                // line 24
                echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["product"], "cartId", [], "any", false, false, false, 24), "html", null, true);
                echo "\">
            <td>
                <img src=\"/assets/images/products/small/";
                // line 26
                echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["product"], "img", [], "any", false, false, false, 26), "html", null, true);
                echo "\" alt=\"";
                echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["product"], "name", [], "any", false, false, false, 26), "html", null, true);
                echo "\" width=\"100\">
                <a href=\"/products/";
                // line 27
                echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["product"], "prodId", [], "any", false, false, false, 27), "html", null, true);
                echo "\">
                   ";
                // line 28
                echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["product"], "name", [], "any", false, false, false, 28), "html", null, true);
                echo " 
                </a>
            </td>
            <td data-price=\"";
                // line 31
                echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["product"], "cartId", [], "any", false, false, false, 31), "html", null, true);
                echo "\">
               ";
                // line 32
                echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["product"], "price", [], "any", false, false, false, 32), "html", null, true);
                echo " 
            </td>
            <td data-quantity=\"";
                // line 34
                echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["product"], "cartId", [], "any", false, false, false, 34), "html", null, true);
                echo "\">
               ";
                // line 35
                echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["product"], "quantity", [], "any", false, false, false, 35), "html", null, true);
                echo " 
            </td>
            <td data-total-for-prod=\"";
                // line 37
                echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["product"], "cartId", [], "any", false, false, false, 37), "html", null, true);
                echo "\">
            </td>
        </tr>
       ";
            }
            $_parent = $context['_parent'];
            unset($context['_seq'], $context['_iterated'], $context['_key'], $context['product'], $context['_parent'], $context['loop']);
            $context = array_intersect_key($context, $_parent) + $_parent;
            // line 40
            echo " 

        <tr>
            <td colspan=\"3\">
                Итого к оплате:
            </td>
            <td data-total-for-cart=\"true\">
            </td>
        </tr>
    </table>

</div>
";
        }
        // line 53
        echo "<script src=\"/assets/scripts/price.js\"></script>

";
    }

    public function getTemplateName()
    {
        return "orderCart.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  155 => 53,  140 => 40,  130 => 37,  125 => 35,  121 => 34,  116 => 32,  112 => 31,  106 => 28,  102 => 27,  96 => 26,  91 => 24,  85 => 23,  74 => 14,  68 => 10,  66 => 9,  61 => 7,  58 => 6,  54 => 5,  47 => 3,  36 => 1,);
    }

    public function getSourceContext()
    {
        return new Source("{% extends \"layouts/main.twig\" %}

{% block pageTitle %}Корзина{% endblock %}

{% block content %}

<h2>Корзина ордера №{{ orderNumber }}</h2>

{% if products == null %}

<p>Корзина пуста.</p>

{% else %}

<div>
    <table>
        <tr>
            <th>Название товара</th>
            <th>Цена</th>
            <th>Количество</th>
            <th>Итого</th>
        </tr>
       {% for product in products %} 
        <tr data-prod-id=\"{{ product.cartId }}\">
            <td>
                <img src=\"/assets/images/products/small/{{ product.img }}\" alt=\"{{ product.name }}\" width=\"100\">
                <a href=\"/products/{{ product.prodId }}\">
                   {{ product.name }} 
                </a>
            </td>
            <td data-price=\"{{ product.cartId }}\">
               {{ product.price }} 
            </td>
            <td data-quantity=\"{{ product.cartId }}\">
               {{ product.quantity }} 
            </td>
            <td data-total-for-prod=\"{{ product.cartId }}\">
            </td>
        </tr>
       {% endfor %} 

        <tr>
            <td colspan=\"3\">
                Итого к оплате:
            </td>
            <td data-total-for-cart=\"true\">
            </td>
        </tr>
    </table>

</div>
{% endif %}
<script src=\"/assets/scripts/price.js\"></script>

{% endblock%}

", "orderCart.twig", "/opt/lampp/htdocs/test/views/twig/templates/orderCart.twig");
    }
}
