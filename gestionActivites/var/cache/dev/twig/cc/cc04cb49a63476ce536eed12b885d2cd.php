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

/* activity/index.html.twig */
class __TwigTemplate_0b700ea779e8e2ae8205df9dea9dfd81 extends Template
{
    private $source;
    private $macros = [];

    public function __construct(Environment $env)
    {
        parent::__construct($env);

        $this->source = $this->getSourceContext();

        $this->blocks = [
            'title' => [$this, 'block_title'],
            'body' => [$this, 'block_body'],
        ];
    }

    protected function doGetParent(array $context)
    {
        // line 1
        return "base.html.twig";
    }

    protected function doDisplay(array $context, array $blocks = [])
    {
        $macros = $this->macros;
        $__internal_5a27a8ba21ca79b61932376b2fa922d2 = $this->extensions["Symfony\\Bundle\\WebProfilerBundle\\Twig\\WebProfilerExtension"];
        $__internal_5a27a8ba21ca79b61932376b2fa922d2->enter($__internal_5a27a8ba21ca79b61932376b2fa922d2_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "template", "activity/index.html.twig"));

        $__internal_6f47bbe9983af81f1e7450e9a3e3768f = $this->extensions["Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension"];
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->enter($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "template", "activity/index.html.twig"));

        $this->parent = $this->loadTemplate("base.html.twig", "activity/index.html.twig", 1);
        $this->parent->display($context, array_merge($this->blocks, $blocks));
        
        $__internal_5a27a8ba21ca79b61932376b2fa922d2->leave($__internal_5a27a8ba21ca79b61932376b2fa922d2_prof);

        
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->leave($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof);

    }

    // line 3
    public function block_title($context, array $blocks = [])
    {
        $macros = $this->macros;
        $__internal_5a27a8ba21ca79b61932376b2fa922d2 = $this->extensions["Symfony\\Bundle\\WebProfilerBundle\\Twig\\WebProfilerExtension"];
        $__internal_5a27a8ba21ca79b61932376b2fa922d2->enter($__internal_5a27a8ba21ca79b61932376b2fa922d2_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "block", "title"));

        $__internal_6f47bbe9983af81f1e7450e9a3e3768f = $this->extensions["Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension"];
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->enter($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "block", "title"));

        echo "Activity index";
        
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->leave($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof);

        
        $__internal_5a27a8ba21ca79b61932376b2fa922d2->leave($__internal_5a27a8ba21ca79b61932376b2fa922d2_prof);

    }

    // line 5
    public function block_body($context, array $blocks = [])
    {
        $macros = $this->macros;
        $__internal_5a27a8ba21ca79b61932376b2fa922d2 = $this->extensions["Symfony\\Bundle\\WebProfilerBundle\\Twig\\WebProfilerExtension"];
        $__internal_5a27a8ba21ca79b61932376b2fa922d2->enter($__internal_5a27a8ba21ca79b61932376b2fa922d2_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "block", "body"));

        $__internal_6f47bbe9983af81f1e7450e9a3e3768f = $this->extensions["Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension"];
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->enter($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "block", "body"));

        // line 6
        echo "    <h1 class=\"mx-5 text-center text-white\">Animateur Dashboard</h1>

    <table class=\"table table-hover table-bordered table-primary\">
        <thead>
            <tr>
                <th>Id</th>
                <th>Name</th>
                <th>Description</th>
                <th>actions</th>
            </tr>
        </thead>
        <tbody>
        ";
        // line 18
        $context['_parent'] = $context;
        $context['_seq'] = twig_ensure_traversable((isset($context["activities"]) || array_key_exists("activities", $context) ? $context["activities"] : (function () { throw new RuntimeError('Variable "activities" does not exist.', 18, $this->source); })()));
        $context['_iterated'] = false;
        foreach ($context['_seq'] as $context["_key"] => $context["activity"]) {
            // line 19
            echo "            <tr>
                <td>";
            // line 20
            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["activity"], "id", [], "any", false, false, false, 20), "html", null, true);
            echo "</td>
                <td>";
            // line 21
            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["activity"], "name", [], "any", false, false, false, 21), "html", null, true);
            echo "</td>
                <td>";
            // line 22
            echo twig_get_attribute($this->env, $this->source, $this->extensions['Twig\Extra\String\StringExtension']->createUnicodeString(twig_get_attribute($this->env, $this->source, $context["activity"], "description", [], "any", false, false, false, 22)), "truncate", [0 => 50, 1 => "...", 2 => false], "method", false, false, false, 22);
            echo "</td>
                <td>
                    <a href=\"";
            // line 24
            echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("activity_show", ["id" => twig_get_attribute($this->env, $this->source, $context["activity"], "id", [], "any", false, false, false, 24)]), "html", null, true);
            echo "\">show</a>
                    <a href=\"";
            // line 25
            echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("activity_edit", ["id" => twig_get_attribute($this->env, $this->source, $context["activity"], "id", [], "any", false, false, false, 25)]), "html", null, true);
            echo "\">edit</a>
                </td>
            </tr>
        ";
            $context['_iterated'] = true;
        }
        if (!$context['_iterated']) {
            // line 29
            echo "            <tr>
                <td colspan=\"4\">no records found</td>
            </tr>
        ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['activity'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 33
        echo "        </tbody>

    </table>

    <div style=\"display: flex;\">
        <div class=\"card\" style=\"width: auto; flex-grow: 1;\"  >
            <div class=\"card-body\">
                <h5 class=\"card-title\">My Activities</h5>
                <p class=\"card-text\">Contient les differentes activites qui vous appartiennent</p>
                <a href=\"/activity/myActivity\" class=\"btn btn-warning stretched-link\">Click Here</a>
            </div>
        </div>


        <div class=\"card\" style=\"width: auto;flex-grow: 1;\">
            <div class=\"card-body\">
                <h5 class=\"card-title\">Create a new Activity</h5>
                <p class=\"card-text\">Cree une nouvelle activite avec les differents champs voulus</p>
                <a href=\"";
        // line 51
        echo $this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("activity_new");
        echo "\" class=\"btn btn-warning stretched-link\">Click Here</a>
            </div>
        </div>
    </div>



";
        
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->leave($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof);

        
        $__internal_5a27a8ba21ca79b61932376b2fa922d2->leave($__internal_5a27a8ba21ca79b61932376b2fa922d2_prof);

    }

    public function getTemplateName()
    {
        return "activity/index.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  165 => 51,  145 => 33,  136 => 29,  127 => 25,  123 => 24,  118 => 22,  114 => 21,  110 => 20,  107 => 19,  102 => 18,  88 => 6,  78 => 5,  59 => 3,  36 => 1,);
    }

    public function getSourceContext()
    {
        return new Source("{% extends 'base.html.twig' %}

{% block title %}Activity index{% endblock %}

{% block body %}
    <h1 class=\"mx-5 text-center text-white\">Animateur Dashboard</h1>

    <table class=\"table table-hover table-bordered table-primary\">
        <thead>
            <tr>
                <th>Id</th>
                <th>Name</th>
                <th>Description</th>
                <th>actions</th>
            </tr>
        </thead>
        <tbody>
        {% for activity in activities %}
            <tr>
                <td>{{ activity.id }}</td>
                <td>{{ activity.name }}</td>
                <td>{{ activity.description | u.truncate(50,'...',false) | raw }}</td>
                <td>
                    <a href=\"{{ path('activity_show', {'id': activity.id}) }}\">show</a>
                    <a href=\"{{ path('activity_edit', {'id': activity.id}) }}\">edit</a>
                </td>
            </tr>
        {% else %}
            <tr>
                <td colspan=\"4\">no records found</td>
            </tr>
        {% endfor %}
        </tbody>

    </table>

    <div style=\"display: flex;\">
        <div class=\"card\" style=\"width: auto; flex-grow: 1;\"  >
            <div class=\"card-body\">
                <h5 class=\"card-title\">My Activities</h5>
                <p class=\"card-text\">Contient les differentes activites qui vous appartiennent</p>
                <a href=\"/activity/myActivity\" class=\"btn btn-warning stretched-link\">Click Here</a>
            </div>
        </div>


        <div class=\"card\" style=\"width: auto;flex-grow: 1;\">
            <div class=\"card-body\">
                <h5 class=\"card-title\">Create a new Activity</h5>
                <p class=\"card-text\">Cree une nouvelle activite avec les differents champs voulus</p>
                <a href=\"{{ path('activity_new') }}\" class=\"btn btn-warning stretched-link\">Click Here</a>
            </div>
        </div>
    </div>



{% endblock %}




", "activity/index.html.twig", "/var/www/html/projet/templates/activity/index.html.twig");
    }
}
