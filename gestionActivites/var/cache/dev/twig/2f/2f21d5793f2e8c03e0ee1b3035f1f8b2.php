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

/* activity/home.html.twig */
class __TwigTemplate_94d2580402425a535e1b96503ab6e698 extends Template
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
        $__internal_5a27a8ba21ca79b61932376b2fa922d2->enter($__internal_5a27a8ba21ca79b61932376b2fa922d2_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "template", "activity/home.html.twig"));

        $__internal_6f47bbe9983af81f1e7450e9a3e3768f = $this->extensions["Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension"];
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->enter($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "template", "activity/home.html.twig"));

        $this->parent = $this->loadTemplate("base.html.twig", "activity/home.html.twig", 1);
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
        echo "    <h1>Activity index</h1>

    <table class=\"table table-hover table-bordered bg-dark\">
        <thead>
            <tr>
                <th class=\"text-white bg-dark\">Id</th>
                <th class=\"text-white bg-dark\">Name</th>
                <th class=\"text-white bg-dark\">Description</th>
                <th class=\"text-white bg-dark\">actions</th>
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
                <td class=\"text-white bg-dark\">";
            // line 20
            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["activity"], "id", [], "any", false, false, false, 20), "html", null, true);
            echo "</td>
                <td class=\"text-white bg-dark\" >";
            // line 21
            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["activity"], "name", [], "any", false, false, false, 21), "html", null, true);
            echo "</td>
                <td class=\"text-white bg-dark\">";
            // line 22
            echo twig_get_attribute($this->env, $this->source, $context["activity"], "description", [], "any", false, false, false, 22);
            echo "</td>
                <td class=\"text-white bg-dark\">
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
                <td class=\"text-white bg-dark\" colspan=\"4\">no records found</td>
            </tr>
        ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['activity'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 33
        echo "        </tbody>
    </table>

    <a href=\"";
        // line 36
        echo $this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("activity_new");
        echo "\" class=\"link-info\" >Create new</a>
    <p>
        <a href=\"/activity/myActivity\" class=\"link-info\"> Cliquer ici pour afficher toutes vos activites</a>
    </p>
";
        
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->leave($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof);

        
        $__internal_5a27a8ba21ca79b61932376b2fa922d2->leave($__internal_5a27a8ba21ca79b61932376b2fa922d2_prof);

    }

    public function getTemplateName()
    {
        return "activity/home.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  150 => 36,  145 => 33,  136 => 29,  127 => 25,  123 => 24,  118 => 22,  114 => 21,  110 => 20,  107 => 19,  102 => 18,  88 => 6,  78 => 5,  59 => 3,  36 => 1,);
    }

    public function getSourceContext()
    {
        return new Source("{% extends 'base.html.twig' %}

{% block title %}Activity index{% endblock %}

{% block body %}
    <h1>Activity index</h1>

    <table class=\"table table-hover table-bordered bg-dark\">
        <thead>
            <tr>
                <th class=\"text-white bg-dark\">Id</th>
                <th class=\"text-white bg-dark\">Name</th>
                <th class=\"text-white bg-dark\">Description</th>
                <th class=\"text-white bg-dark\">actions</th>
            </tr>
        </thead>
        <tbody>
        {% for activity in activities %}
            <tr>
                <td class=\"text-white bg-dark\">{{ activity.id }}</td>
                <td class=\"text-white bg-dark\" >{{ activity.name }}</td>
                <td class=\"text-white bg-dark\">{{ activity.description | raw }}</td>
                <td class=\"text-white bg-dark\">
                    <a href=\"{{ path('activity_show', {'id': activity.id}) }}\">show</a>
                    <a href=\"{{ path('activity_edit', {'id': activity.id}) }}\">edit</a>
                </td>
            </tr>
        {% else %}
            <tr>
                <td class=\"text-white bg-dark\" colspan=\"4\">no records found</td>
            </tr>
        {% endfor %}
        </tbody>
    </table>

    <a href=\"{{ path('activity_new') }}\" class=\"link-info\" >Create new</a>
    <p>
        <a href=\"/activity/myActivity\" class=\"link-info\"> Cliquer ici pour afficher toutes vos activites</a>
    </p>
{% endblock %}
", "activity/home.html.twig", "/var/www/html/projectFwCc/templates/activity/home.html.twig");
    }
}
