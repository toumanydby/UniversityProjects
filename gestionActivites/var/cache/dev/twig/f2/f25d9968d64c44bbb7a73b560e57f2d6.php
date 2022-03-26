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

/* activity/showMyActivity.html.twig */
class __TwigTemplate_7da05be8fc6603c9b9bbf95a1e4fb2ef extends Template
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
        $__internal_5a27a8ba21ca79b61932376b2fa922d2->enter($__internal_5a27a8ba21ca79b61932376b2fa922d2_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "template", "activity/showMyActivity.html.twig"));

        $__internal_6f47bbe9983af81f1e7450e9a3e3768f = $this->extensions["Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension"];
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->enter($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "template", "activity/showMyActivity.html.twig"));

        $this->parent = $this->loadTemplate("base.html.twig", "activity/showMyActivity.html.twig", 1);
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

        echo "Activity";
        
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
        echo "    <h1 style=\"color: white ; text-align: center\">Activity</h1>

    <table class=\"table table-hover table-bordered table-primary\">
        <tbody>
            <tr>
                <th>Id</th>
                <td>";
        // line 12
        echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, (isset($context["activity"]) || array_key_exists("activity", $context) ? $context["activity"] : (function () { throw new RuntimeError('Variable "activity" does not exist.', 12, $this->source); })()), "id", [], "any", false, false, false, 12), "html", null, true);
        echo "</td>
            </tr>
            <tr>
                <th>Name</th>
                <td>";
        // line 16
        echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, (isset($context["activity"]) || array_key_exists("activity", $context) ? $context["activity"] : (function () { throw new RuntimeError('Variable "activity" does not exist.', 16, $this->source); })()), "name", [], "any", false, false, false, 16), "html", null, true);
        echo "</td>
            </tr>
            <tr>
                <th>Description</th>
                <td>";
        // line 20
        echo twig_get_attribute($this->env, $this->source, (isset($context["activity"]) || array_key_exists("activity", $context) ? $context["activity"] : (function () { throw new RuntimeError('Variable "activity" does not exist.', 20, $this->source); })()), "description", [], "any", false, false, false, 20);
        echo "</td>
            </tr>
            <tr>
                <th>Enfants Inscrits</th>
                <td>
                    ";
        // line 25
        $context['_parent'] = $context;
        $context['_seq'] = twig_ensure_traversable(twig_get_attribute($this->env, $this->source, (isset($context["activity"]) || array_key_exists("activity", $context) ? $context["activity"] : (function () { throw new RuntimeError('Variable "activity" does not exist.', 25, $this->source); })()), "usersInscrit", [], "any", false, false, false, 25));
        foreach ($context['_seq'] as $context["_key"] => $context["user"]) {
            // line 26
            echo "                        <p>
                            ";
            // line 27
            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["user"], "prenom", [], "any", false, false, false, 27), "html", null, true);
            echo " ";
            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["user"], "nom", [], "any", false, false, false, 27), "html", null, true);
            echo "
                        </p>
                    ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['user'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 30
        echo "                </td>
            </tr>
        </tbody>
    </table>

    <div style=\"display: flex;\">
        <div class=\"card\" style=\"width: auto; flex-grow: 1;\"  >
            <div class=\"card-body\">
                <h5 class=\"card-title\">Activities</h5>
                <p class=\"card-text\">Retourne sur la liste des activites</p>
                <a href=\"";
        // line 40
        echo $this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("myActivity_index");
        echo "\" class=\"btn btn-warning stretched-link\">Click Here</a>
            </div>
        </div>

        <div class=\"card\" style=\"width: auto; flex-grow: 1;\"  >
            <div class=\"card-body\">
                <h5 class=\"card-title\">Edit</h5>
                <p class=\"card-text\">Edite l'activite en cours</p>
                <a href=\"";
        // line 48
        echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("activity_edit", ["id" => twig_get_attribute($this->env, $this->source, (isset($context["activity"]) || array_key_exists("activity", $context) ? $context["activity"] : (function () { throw new RuntimeError('Variable "activity" does not exist.', 48, $this->source); })()), "id", [], "any", false, false, false, 48)]), "html", null, true);
        echo "\" class=\"btn btn-warning stretched-link\">Click Here</a>
            </div>
        </div>

        ";
        // line 52
        echo twig_include($this->env, $context, "activity/_delete_form.html.twig");
        echo "
    </div>


";
        
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->leave($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof);

        
        $__internal_5a27a8ba21ca79b61932376b2fa922d2->leave($__internal_5a27a8ba21ca79b61932376b2fa922d2_prof);

    }

    public function getTemplateName()
    {
        return "activity/showMyActivity.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  166 => 52,  159 => 48,  148 => 40,  136 => 30,  125 => 27,  122 => 26,  118 => 25,  110 => 20,  103 => 16,  96 => 12,  88 => 6,  78 => 5,  59 => 3,  36 => 1,);
    }

    public function getSourceContext()
    {
        return new Source("{% extends 'base.html.twig' %}

{% block title %}Activity{% endblock %}

{% block body %}
    <h1 style=\"color: white ; text-align: center\">Activity</h1>

    <table class=\"table table-hover table-bordered table-primary\">
        <tbody>
            <tr>
                <th>Id</th>
                <td>{{ activity.id }}</td>
            </tr>
            <tr>
                <th>Name</th>
                <td>{{ activity.name }}</td>
            </tr>
            <tr>
                <th>Description</th>
                <td>{{ activity.description | raw }}</td>
            </tr>
            <tr>
                <th>Enfants Inscrits</th>
                <td>
                    {% for user in activity.usersInscrit %}
                        <p>
                            {{ user.prenom }} {{ user.nom }}
                        </p>
                    {% endfor %}
                </td>
            </tr>
        </tbody>
    </table>

    <div style=\"display: flex;\">
        <div class=\"card\" style=\"width: auto; flex-grow: 1;\"  >
            <div class=\"card-body\">
                <h5 class=\"card-title\">Activities</h5>
                <p class=\"card-text\">Retourne sur la liste des activites</p>
                <a href=\"{{ path('myActivity_index') }}\" class=\"btn btn-warning stretched-link\">Click Here</a>
            </div>
        </div>

        <div class=\"card\" style=\"width: auto; flex-grow: 1;\"  >
            <div class=\"card-body\">
                <h5 class=\"card-title\">Edit</h5>
                <p class=\"card-text\">Edite l'activite en cours</p>
                <a href=\"{{ path('activity_edit', {'id': activity.id}) }}\" class=\"btn btn-warning stretched-link\">Click Here</a>
            </div>
        </div>

        {{ include('activity/_delete_form.html.twig') }}
    </div>


{% endblock %}
", "activity/showMyActivity.html.twig", "/var/www/html/projet/templates/activity/showMyActivity.html.twig");
    }
}
