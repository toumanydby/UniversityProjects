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

/* admin/_form.html.twig */
class __TwigTemplate_320b2974b72a169fdf74af1d4dbd7858 extends Template
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
        $__internal_5a27a8ba21ca79b61932376b2fa922d2->enter($__internal_5a27a8ba21ca79b61932376b2fa922d2_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "template", "admin/_form.html.twig"));

        $__internal_6f47bbe9983af81f1e7450e9a3e3768f = $this->extensions["Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension"];
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->enter($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "template", "admin/_form.html.twig"));

        // line 1
        echo         $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->renderBlock((isset($context["form"]) || array_key_exists("form", $context) ? $context["form"] : (function () { throw new RuntimeError('Variable "form" does not exist.', 1, $this->source); })()), 'form_start');
        echo "
    ";
        // line 2
        echo $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock((isset($context["form"]) || array_key_exists("form", $context) ? $context["form"] : (function () { throw new RuntimeError('Variable "form" does not exist.', 2, $this->source); })()), 'rest');
        echo "
    <div class=\"card form-control\" style=\"width: 18rem; margin: auto\">
        <div class=\"card-body\" >
            <h5 class=\"card-title\">Save the changes</h5>
            <p class=\"card-text\">Enregistrer  les changements</p>
            <button class=\"btn btn-success\">";
        // line 7
        echo twig_escape_filter($this->env, ((array_key_exists("button_label", $context)) ? (_twig_default_filter((isset($context["button_label"]) || array_key_exists("button_label", $context) ? $context["button_label"] : (function () { throw new RuntimeError('Variable "button_label" does not exist.', 7, $this->source); })()), "Save")) : ("Save")), "html", null, true);
        echo "</button>
        </div>
    </div>
<br>

";
        // line 12
        echo         $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->renderBlock((isset($context["form"]) || array_key_exists("form", $context) ? $context["form"] : (function () { throw new RuntimeError('Variable "form" does not exist.', 12, $this->source); })()), 'form_end');
        echo "
<script>
    let children = document.getElementById('user1_roles').childNodes;
    for (let i = 0; i < children.length; i++) {
        if (children[i].nodeName === 'INPUT'){
            children[i].className += \"btn-check \";
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
        return "admin/_form.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  63 => 12,  55 => 7,  47 => 2,  43 => 1,);
    }

    public function getSourceContext()
    {
        return new Source("{{ form_start(form) }}
    {{ form_rest(form) }}
    <div class=\"card form-control\" style=\"width: 18rem; margin: auto\">
        <div class=\"card-body\" >
            <h5 class=\"card-title\">Save the changes</h5>
            <p class=\"card-text\">Enregistrer  les changements</p>
            <button class=\"btn btn-success\">{{ button_label|default('Save') }}</button>
        </div>
    </div>
<br>

{{ form_end(form) }}
<script>
    let children = document.getElementById('user1_roles').childNodes;
    for (let i = 0; i < children.length; i++) {
        if (children[i].nodeName === 'INPUT'){
            children[i].className += \"btn-check \";
        }
        else if (children[i].nodeName === 'LABEL'){
            children[i].className += \"btn btn-outline-warning\";
        }
    }
</script>

", "admin/_form.html.twig", "/var/www/html/projet/templates/admin/_form.html.twig");
    }
}
