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

/* enfant/_form.html.twig */
class __TwigTemplate_1b66154e61653bdf1362876f7a2bd8d8 extends Template
{
    private $source;
    private $macros = [];

    public function __construct(Environment $env)
    {
        parent::__construct($env);

        $this->source = $this->getSourceContext();

        $this->parent = false;

        $this->blocks = [
        ];
    }

    protected function doDisplay(array $context, array $blocks = [])
    {
        $macros = $this->macros;
        $__internal_5a27a8ba21ca79b61932376b2fa922d2 = $this->extensions["Symfony\\Bundle\\WebProfilerBundle\\Twig\\WebProfilerExtension"];
        $__internal_5a27a8ba21ca79b61932376b2fa922d2->enter($__internal_5a27a8ba21ca79b61932376b2fa922d2_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "template", "enfant/_form.html.twig"));

        $__internal_6f47bbe9983af81f1e7450e9a3e3768f = $this->extensions["Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension"];
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->enter($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "template", "enfant/_form.html.twig"));

        // line 1
        echo         $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->renderBlock((isset($context["form"]) || array_key_exists("form", $context) ? $context["form"] : (function () { throw new RuntimeError('Variable "form" does not exist.', 1, $this->source); })()), 'form_start');
        echo "
    ";
        // line 2
        echo $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock(twig_get_attribute($this->env, $this->source, (isset($context["form"]) || array_key_exists("form", $context) ? $context["form"] : (function () { throw new RuntimeError('Variable "form" does not exist.', 2, $this->source); })()), "activityInscrit", [], "any", false, false, false, 2), 'row', ["label" => "Activites auxquelles vous etes inscrit", "label_attr" => ["style" => "font-size: 25px; color:white"]]);
        // line 5
        echo "
<div class=\"card\" style=\"width: 18rem; flex-grow: 1;\">
    <div class=\"card-body\" >
        <h5 class=\"card-title\">Save the changes</h5>
        <p class=\"card-text\">Enregistrer  les changements</p>
        <button class=\"btn btn-success\">";
        // line 10
        echo twig_escape_filter($this->env, ((array_key_exists("button_label", $context)) ? (_twig_default_filter((isset($context["button_label"]) || array_key_exists("button_label", $context) ? $context["button_label"] : (function () { throw new RuntimeError('Variable "button_label" does not exist.', 10, $this->source); })()), "Save")) : ("Save")), "html", null, true);
        echo "</button>
    </div>
</div>

";
        // line 14
        echo         $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->renderBlock((isset($context["form"]) || array_key_exists("form", $context) ? $context["form"] : (function () { throw new RuntimeError('Variable "form" does not exist.', 14, $this->source); })()), 'form_end');
        echo "

<script>
    let children = document.getElementById('user_activityInscrit').childNodes;
    for (let i = 0; i < children.length; i++) {
        if (children[i].nodeName === 'INPUT'){
            children[i].className += \"btn-check\";
        }
        else if (children[i].nodeName === 'LABEL'){
            children[i].className += \"btn btn-outline-warning\";
        }
    }
</script>
";
        
        $__internal_5a27a8ba21ca79b61932376b2fa922d2->leave($__internal_5a27a8ba21ca79b61932376b2fa922d2_prof);

        
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->leave($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof);

    }

    public function getTemplateName()
    {
        return "enfant/_form.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  63 => 14,  56 => 10,  49 => 5,  47 => 2,  43 => 1,);
    }

    public function getSourceContext()
    {
        return new Source("{{ form_start(form) }}
    {{ form_row(form.activityInscrit, {
        'label' : 'Activites auxquelles vous etes inscrit',
        'label_attr' : { 'style' : 'font-size: 25px; color:white'}
    }) }}
<div class=\"card\" style=\"width: 18rem; flex-grow: 1;\">
    <div class=\"card-body\" >
        <h5 class=\"card-title\">Save the changes</h5>
        <p class=\"card-text\">Enregistrer  les changements</p>
        <button class=\"btn btn-success\">{{ button_label|default('Save') }}</button>
    </div>
</div>

{{ form_end(form) }}

<script>
    let children = document.getElementById('user_activityInscrit').childNodes;
    for (let i = 0; i < children.length; i++) {
        if (children[i].nodeName === 'INPUT'){
            children[i].className += \"btn-check\";
        }
        else if (children[i].nodeName === 'LABEL'){
            children[i].className += \"btn btn-outline-warning\";
        }
    }
</script>
", "enfant/_form.html.twig", "/var/www/html/projet/templates/enfant/_form.html.twig");
    }
}
