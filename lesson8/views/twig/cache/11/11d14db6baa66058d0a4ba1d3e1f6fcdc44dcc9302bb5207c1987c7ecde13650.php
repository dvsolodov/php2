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

/* admin/adminPanel.twig */
class __TwigTemplate_6d1f207283292defca848917dd51632438ee5c428e54ab546cbdbd0844982529 extends Template
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
        $this->parent = $this->loadTemplate("layouts/admin.twig", "admin/adminPanel.twig", 1);
        $this->parent->display($context, array_merge($this->blocks, $blocks));
    }

    // line 3
    public function block_content($context, array $blocks = [])
    {
        $macros = $this->macros;
        // line 4
        echo "
<h2>Панель администратора</h2>

";
        // line 7
        if ((0 !== twig_compare(($context["orderMsg"] ?? null), null))) {
            // line 8
            echo twig_escape_filter($this->env, ($context["orderMsg"] ?? null), "html", null, true);
            echo "
";
        }
        // line 10
        echo "
";
        // line 11
        if ((0 !== twig_compare(($context["orders"] ?? null), null))) {
            // line 12
            echo "
<table>
    <tr>
        <th>Номер заказа</th>
        <th>Номер телефона</th>
        <th>Имя покупателя</th>
        <th>Статус</th>
    </tr>

";
            // line 21
            $context['_parent'] = $context;
            $context['_seq'] = twig_ensure_traversable(($context["orders"] ?? null));
            foreach ($context['_seq'] as $context["_key"] => $context["order"]) {
                // line 22
                echo "
    <tr>
        <td><a href=\"/admin/order/";
                // line 24
                echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["order"], "id", [], "any", false, false, false, 24), "html", null, true);
                echo "/show\">";
                echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["order"], "id", [], "any", false, false, false, 24), "html", null, true);
                echo "</a></td>
        <td>";
                // line 25
                echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["order"], "phone", [], "any", false, false, false, 25), "html", null, true);
                echo "</td>
        <td>";
                // line 26
                echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["order"], "name", [], "any", false, false, false, 26), "html", null, true);
                echo "</td>
        <td>
            <select>

                ";
                // line 30
                $context['_parent'] = $context;
                $context['_seq'] = twig_ensure_traversable(($context["statuses"] ?? null));
                foreach ($context['_seq'] as $context["_key"] => $context["status"]) {
                    // line 31
                    echo "
                <option data-status-id=\"";
                    // line 32
                    echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["status"], "id", [], "any", false, false, false, 32), "html", null, true);
                    echo "\" 
                        data-order-id=\"";
                    // line 33
                    echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["order"], "id", [], "any", false, false, false, 33), "html", null, true);
                    echo "\" 
                        ";
                    // line 34
                    echo (((0 !== twig_compare(twig_get_attribute($this->env, $this->source, $context["status"], "id", [], "any", false, false, false, 34), twig_get_attribute($this->env, $this->source, $context["order"], "statusId", [], "any", false, false, false, 34)))) ? ("") : ("selected"));
                    echo ">

                    ";
                    // line 36
                    echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["status"], "name", [], "any", false, false, false, 36), "html", null, true);
                    echo "

                </option>

                ";
                }
                $_parent = $context['_parent'];
                unset($context['_seq'], $context['_iterated'], $context['_key'], $context['status'], $context['_parent'], $context['loop']);
                $context = array_intersect_key($context, $_parent) + $_parent;
                // line 41
                echo "
            </select> 
        </td>
    </tr>

";
            }
            $_parent = $context['_parent'];
            unset($context['_seq'], $context['_iterated'], $context['_key'], $context['order'], $context['_parent'], $context['loop']);
            $context = array_intersect_key($context, $_parent) + $_parent;
            // line 47
            echo "
</table>

";
        } else {
            // line 51
            echo "
<p>Заказов нет.</p>

";
        }
        // line 55
        echo "
<script src=\"/assets/scripts/changeStatus.js\"></script>

";
    }

    public function getTemplateName()
    {
        return "admin/adminPanel.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  157 => 55,  151 => 51,  145 => 47,  134 => 41,  123 => 36,  118 => 34,  114 => 33,  110 => 32,  107 => 31,  103 => 30,  96 => 26,  92 => 25,  86 => 24,  82 => 22,  78 => 21,  67 => 12,  65 => 11,  62 => 10,  57 => 8,  55 => 7,  50 => 4,  46 => 3,  35 => 1,);
    }

    public function getSourceContext()
    {
        return new Source("{% extends \"layouts/admin.twig\" %}

{% block content %}

<h2>Панель администратора</h2>

{% if orderMsg != null %}
{{ orderMsg }}
{% endif %}

{% if orders != null %}

<table>
    <tr>
        <th>Номер заказа</th>
        <th>Номер телефона</th>
        <th>Имя покупателя</th>
        <th>Статус</th>
    </tr>

{% for order in orders %}

    <tr>
        <td><a href=\"/admin/order/{{ order.id }}/show\">{{ order.id }}</a></td>
        <td>{{ order.phone }}</td>
        <td>{{ order.name }}</td>
        <td>
            <select>

                {% for status in statuses %}

                <option data-status-id=\"{{ status.id }}\" 
                        data-order-id=\"{{ order.id }}\" 
                        {{ status.id != order.statusId ? '' : 'selected' }}>

                    {{ status.name }}

                </option>

                {% endfor %}

            </select> 
        </td>
    </tr>

{% endfor %}

</table>

{% else %}

<p>Заказов нет.</p>

{% endif %}

<script src=\"/assets/scripts/changeStatus.js\"></script>

{% endblock %}
", "admin/adminPanel.twig", "/opt/lampp/htdocs/test/views/twig/templates/admin/adminPanel.twig");
    }
}
