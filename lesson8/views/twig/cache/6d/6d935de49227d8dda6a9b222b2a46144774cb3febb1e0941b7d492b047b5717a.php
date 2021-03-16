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

/* admin/adminCartOfOrder.twig */
class __TwigTemplate_efe907764f8effaad841f0b73b1eecb95198c9f53d9465a1519a193648fde680 extends Template
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
        $this->parent = $this->loadTemplate("layouts/admin.twig", "admin/adminCartOfOrder.twig", 1);
        $this->parent->display($context, array_merge($this->blocks, $blocks));
    }

    // line 3
    public function block_content($context, array $blocks = [])
    {
        $macros = $this->macros;
        // line 4
        echo "
<h2>Корзина заказа №";
        // line 5
        echo twig_escape_filter($this->env, ($context["orderId"] ?? null), "html", null, true);
        echo "</h2>

<a href=\"/admin/panel\">Назад к заказам</a>

";
        // line 9
        if ( !twig_test_empty(($context["cart"] ?? null))) {
            // line 10
            echo "
<table>
    <tr>
        <th>Список товаров</th>
        <th>Цена</th>
        <th>Количество</th>
        <th>Итого</th>
    </tr>
    ";
            // line 18
            $context['_parent'] = $context;
            $context['_seq'] = twig_ensure_traversable(($context["cart"] ?? null));
            foreach ($context['_seq'] as $context["_key"] => $context["product"]) {
                echo " 
    <tr data-prod-id=\"";
                // line 19
                echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["product"], "goodsId", [], "any", false, false, false, 19), "html", null, true);
                echo "\">
        <td>
            <img src=\"/assets/images/products/small/";
                // line 21
                echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["product"], "img", [], "any", false, false, false, 21), "html", null, true);
                echo "\" alt=\"";
                echo twig_escape_filter($this->env, ($context["productname"] ?? null), "html", null, true);
                echo "\" width=\"100\">
            <span>";
                // line 22
                echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["product"], "name", [], "any", false, false, false, 22), "html", null, true);
                echo "</span>
        </td>
        <td data-price=\"";
                // line 24
                echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["product"], "goodsId", [], "any", false, false, false, 24), "html", null, true);
                echo "\">
            ";
                // line 25
                echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["product"], "price", [], "any", false, false, false, 25), "html", null, true);
                echo "
        </td>
        <td data-quantity=\"";
                // line 27
                echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["product"], "goodsId", [], "any", false, false, false, 27), "html", null, true);
                echo "\">
            ";
                // line 28
                echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["product"], "quantity", [], "any", false, false, false, 28), "html", null, true);
                echo "
        </td>
        <td data-total-for-prod=\"";
                // line 30
                echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["product"], "goodsId", [], "any", false, false, false, 30), "html", null, true);
                echo "\">
        </td>
    </tr>
    ";
            }
            $_parent = $context['_parent'];
            unset($context['_seq'], $context['_iterated'], $context['_key'], $context['product'], $context['_parent'], $context['loop']);
            $context = array_intersect_key($context, $_parent) + $_parent;
            // line 34
            echo "    <tr>
        <td colspan=\"3\">
            Итого к оплате:  
        </td>
        <td data-total-for-cart=\"true\">
        </td>
    </tr>
</table>

";
        }
        // line 44
        echo "
<script src=\"/assets/scripts/price.js\"></script>

";
    }

    public function getTemplateName()
    {
        return "admin/adminCartOfOrder.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  134 => 44,  122 => 34,  112 => 30,  107 => 28,  103 => 27,  98 => 25,  94 => 24,  89 => 22,  83 => 21,  78 => 19,  72 => 18,  62 => 10,  60 => 9,  53 => 5,  50 => 4,  46 => 3,  35 => 1,);
    }

    public function getSourceContext()
    {
        return new Source("{% extends \"layouts/admin.twig\" %}

{% block content %}

<h2>Корзина заказа №{{ orderId }}</h2>

<a href=\"/admin/panel\">Назад к заказам</a>

{% if cart is not empty %}

<table>
    <tr>
        <th>Список товаров</th>
        <th>Цена</th>
        <th>Количество</th>
        <th>Итого</th>
    </tr>
    {% for product in cart %} 
    <tr data-prod-id=\"{{ product.goodsId }}\">
        <td>
            <img src=\"/assets/images/products/small/{{ product.img }}\" alt=\"{{ productname }}\" width=\"100\">
            <span>{{ product.name }}</span>
        </td>
        <td data-price=\"{{ product.goodsId }}\">
            {{ product.price }}
        </td>
        <td data-quantity=\"{{ product.goodsId }}\">
            {{ product.quantity }}
        </td>
        <td data-total-for-prod=\"{{ product.goodsId }}\">
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

{% endif %}

<script src=\"/assets/scripts/price.js\"></script>

{% endblock %}
", "admin/adminCartOfOrder.twig", "/opt/lampp/htdocs/test/views/twig/templates/admin/adminCartOfOrder.twig");
    }
}
