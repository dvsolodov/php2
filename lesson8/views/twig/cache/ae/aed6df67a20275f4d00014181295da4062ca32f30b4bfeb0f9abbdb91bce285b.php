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

/* orders.twig */
class __TwigTemplate_22873a571fdf61ed02f2644cdb602508c6ec2d949a5bcc4ce9ecd09af52bb1d7 extends Template
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
        $this->parent = $this->loadTemplate("layouts/main.twig", "orders.twig", 1);
        $this->parent->display($context, array_merge($this->blocks, $blocks));
    }

    // line 3
    public function block_pageTitle($context, array $blocks = [])
    {
        $macros = $this->macros;
        echo "Мои заказы";
    }

    // line 5
    public function block_content($context, array $blocks = [])
    {
        $macros = $this->macros;
        // line 6
        echo "
<h2>Мои заказы</h2>

";
        // line 9
        if ((0 !== twig_compare(($context["orderMsg"] ?? null), null))) {
            // line 10
            echo twig_escape_filter($this->env, ($context["orderMsg"] ?? null), "html", null, true);
            echo "
";
        }
        // line 12
        echo "
";
        // line 13
        if ((0 !== twig_compare(($context["orders"] ?? null), null))) {
            // line 14
            echo "
<table>
    <tr>
        <th>Номер заказа</th>
        <th>Номер телефона</th>
        <th>Статус</th>
    </tr>

";
            // line 22
            $context['_parent'] = $context;
            $context['_seq'] = twig_ensure_traversable(($context["orders"] ?? null));
            foreach ($context['_seq'] as $context["_key"] => $context["order"]) {
                // line 23
                echo "
    <tr>
        <td><a href=\"/order/";
                // line 25
                echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["order"], "id", [], "any", false, false, false, 25), "html", null, true);
                echo "/show\">";
                echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["order"], "id", [], "any", false, false, false, 25), "html", null, true);
                echo "</a></td>
        <td>";
                // line 26
                echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["order"], "phone", [], "any", false, false, false, 26), "html", null, true);
                echo "</td>
        <td>";
                // line 27
                echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["order"], "status", [], "any", false, false, false, 27), "html", null, true);
                echo "</td>
    </tr>

";
            }
            $_parent = $context['_parent'];
            unset($context['_seq'], $context['_iterated'], $context['_key'], $context['order'], $context['_parent'], $context['loop']);
            $context = array_intersect_key($context, $_parent) + $_parent;
            // line 31
            echo "
</table>

";
        } else {
            // line 35
            echo "
<p>У Вас нет заказов.</p>

";
        }
        // line 39
        echo "
";
    }

    public function getTemplateName()
    {
        return "orders.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  125 => 39,  119 => 35,  113 => 31,  103 => 27,  99 => 26,  93 => 25,  89 => 23,  85 => 22,  75 => 14,  73 => 13,  70 => 12,  65 => 10,  63 => 9,  58 => 6,  54 => 5,  47 => 3,  36 => 1,);
    }

    public function getSourceContext()
    {
        return new Source("{% extends \"layouts/main.twig\" %}

{% block pageTitle %}Мои заказы{% endblock %}

{% block content %}

<h2>Мои заказы</h2>

{% if orderMsg != null %}
{{ orderMsg }}
{% endif %}

{% if orders != null %}

<table>
    <tr>
        <th>Номер заказа</th>
        <th>Номер телефона</th>
        <th>Статус</th>
    </tr>

{% for order in orders %}

    <tr>
        <td><a href=\"/order/{{ order.id }}/show\">{{ order.id }}</a></td>
        <td>{{ order.phone }}</td>
        <td>{{ order.status }}</td>
    </tr>

{% endfor %}

</table>

{% else %}

<p>У Вас нет заказов.</p>

{% endif %}

{% endblock %}
", "orders.twig", "/opt/lampp/htdocs/test/views/twig/templates/orders.twig");
    }
}
