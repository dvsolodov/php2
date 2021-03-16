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

/* cart.twig */
class __TwigTemplate_3adf53b0759dd74d4986fd55dda8fcb82a8eaaf9fb4586f27c438f57a3340d4f extends Template
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
        $this->parent = $this->loadTemplate("layouts/main.twig", "cart.twig", 1);
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
<h2>Корзина</h2>

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
            <th>Список товаров</th>
            <th>Цена</th>
            <th>Количество</th>
            <th>Итого</th>
            <th>Действие</th>
        </tr>
       ";
            // line 24
            $context['_parent'] = $context;
            $context['_seq'] = twig_ensure_traversable(($context["products"] ?? null));
            foreach ($context['_seq'] as $context["_key"] => $context["product"]) {
                echo " 
        <tr data-prod-id=\"";
                // line 25
                echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["product"], "cartId", [], "any", false, false, false, 25), "html", null, true);
                echo "\">
            <td>
                <img src=\"/assets/images/products/small/";
                // line 27
                echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["product"], "img", [], "any", false, false, false, 27), "html", null, true);
                echo "\" alt=\"";
                echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["product"], "name", [], "any", false, false, false, 27), "html", null, true);
                echo "\" width=\"100\">
                <a href=\"/products/";
                // line 28
                echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["product"], "prodId", [], "any", false, false, false, 28), "html", null, true);
                echo "\">
                   ";
                // line 29
                echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["product"], "name", [], "any", false, false, false, 29), "html", null, true);
                echo " 
                </a>
            </td>
            <td data-price=\"";
                // line 32
                echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["product"], "cartId", [], "any", false, false, false, 32), "html", null, true);
                echo "\">
               ";
                // line 33
                echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["product"], "price", [], "any", false, false, false, 33), "html", null, true);
                echo " 
            </td>
            <td data-quantity=\"";
                // line 35
                echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["product"], "cartId", [], "any", false, false, false, 35), "html", null, true);
                echo "\">
               ";
                // line 36
                echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["product"], "quantity", [], "any", false, false, false, 36), "html", null, true);
                echo " 
            </td>
            <td data-total-for-prod=\"";
                // line 38
                echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["product"], "cartId", [], "any", false, false, false, 38), "html", null, true);
                echo "\">
            </td>
            <td>
                <button data-prod-id=\"";
                // line 41
                echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["product"], "cartId", [], "any", false, false, false, 41), "html", null, true);
                echo "\" data-action-delete=\"true\">Удалить</button>
            </td>
        </tr>
       ";
            }
            $_parent = $context['_parent'];
            unset($context['_seq'], $context['_iterated'], $context['_key'], $context['product'], $context['_parent'], $context['loop']);
            $context = array_intersect_key($context, $_parent) + $_parent;
            // line 44
            echo " 

        <tr>
            <td colspan=\"3\">
                Итого к оплате:
            </td>
            <td data-total-for-cart=\"true\">
            </td>
            <td>
                <button data-prod-id=\"all\" data-action-delete=\"true\">Очистить корзину</button>
            </td>
        </tr>
    </table>

    <a href=\"/order\">Оформить заказ</a>
</div>
";
        }
        // line 61
        echo "<script src=\"/assets/scripts/addProductTo.js\"></script>
<script src=\"/assets/scripts/price.js\"></script>

";
    }

    public function getTemplateName()
    {
        return "cart.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  163 => 61,  144 => 44,  134 => 41,  128 => 38,  123 => 36,  119 => 35,  114 => 33,  110 => 32,  104 => 29,  100 => 28,  94 => 27,  89 => 25,  83 => 24,  71 => 14,  65 => 10,  63 => 9,  58 => 6,  54 => 5,  47 => 3,  36 => 1,);
    }

    public function getSourceContext()
    {
        return new Source("{% extends \"layouts/main.twig\" %}

{% block pageTitle %}Корзина{% endblock %}

{% block content %}

<h2>Корзина</h2>

{% if products == null %}

<p>Корзина пуста.</p>

{% else %}

<div>
    <table>
        <tr>
            <th>Список товаров</th>
            <th>Цена</th>
            <th>Количество</th>
            <th>Итого</th>
            <th>Действие</th>
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
            <td>
                <button data-prod-id=\"{{ product.cartId }}\" data-action-delete=\"true\">Удалить</button>
            </td>
        </tr>
       {% endfor %} 

        <tr>
            <td colspan=\"3\">
                Итого к оплате:
            </td>
            <td data-total-for-cart=\"true\">
            </td>
            <td>
                <button data-prod-id=\"all\" data-action-delete=\"true\">Очистить корзину</button>
            </td>
        </tr>
    </table>

    <a href=\"/order\">Оформить заказ</a>
</div>
{% endif %}
<script src=\"/assets/scripts/addProductTo.js\"></script>
<script src=\"/assets/scripts/price.js\"></script>

{% endblock%}
", "cart.twig", "/opt/lampp/htdocs/test/views/twig/templates/cart.twig");
    }
}
