<?php

use Twig\Environment;
use Twig\Error\LoaderError;
use Twig\Error\RuntimeError;
use Twig\Extension\CoreExtension;
use Twig\Extension\SandboxExtension;
use Twig\Markup;
use Twig\Sandbox\SecurityError;
use Twig\Sandbox\SecurityNotAllowedTagError;
use Twig\Sandbox\SecurityNotAllowedFilterError;
use Twig\Sandbox\SecurityNotAllowedFunctionError;
use Twig\Source;
use Twig\Template;

/* core/themes/claro/templates/views/views-ui-expose-filter-form.html.twig */
class __TwigTemplate_0f6d7343d392564531b907748fc96cfd extends Template
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
        $this->sandbox = $this->env->getExtension(SandboxExtension::class);
        $this->checkSecurity();
    }

    protected function doDisplay(array $context, array $blocks = [])
    {
        $macros = $this->macros;
        // line 22
        yield $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(CoreExtension::getAttribute($this->env, $this->source, ($context["form"] ?? null), "form_description", [], "any", false, false, true, 22), 22, $this->source), "html", null, true);
        yield "
";
        // line 23
        yield $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(CoreExtension::getAttribute($this->env, $this->source, ($context["form"] ?? null), "expose_button", [], "any", false, false, true, 23), 23, $this->source), "html", null, true);
        yield "
";
        // line 24
        yield $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(CoreExtension::getAttribute($this->env, $this->source, ($context["form"] ?? null), "required", [], "any", false, false, true, 24), 24, $this->source), "html", null, true);
        yield "
";
        // line 25
        yield $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(CoreExtension::getAttribute($this->env, $this->source, ($context["form"] ?? null), "group_button", [], "any", false, false, true, 25), 25, $this->source), "html", null, true);
        yield "
";
        // line 26
        yield $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(CoreExtension::getAttribute($this->env, $this->source, ($context["form"] ?? null), "label", [], "any", false, false, true, 26), 26, $this->source), "html", null, true);
        yield "
";
        // line 27
        yield $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(CoreExtension::getAttribute($this->env, $this->source, ($context["form"] ?? null), "description", [], "any", false, false, true, 27), 27, $this->source), "html", null, true);
        yield "

";
        // line 29
        yield $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(CoreExtension::getAttribute($this->env, $this->source, ($context["form"] ?? null), "operator", [], "any", false, false, true, 29), 29, $this->source), "html", null, true);
        yield "
";
        // line 30
        yield $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(CoreExtension::getAttribute($this->env, $this->source, ($context["form"] ?? null), "value", [], "any", false, false, true, 30), 30, $this->source), "html", null, true);
        yield "

";
        // line 32
        if (CoreExtension::getAttribute($this->env, $this->source, ($context["form"] ?? null), "use_operator", [], "any", false, false, true, 32)) {
            // line 33
            yield "  <div class=\"views-config-group-region\">
    <div class=\"views-group-box\">
      ";
            // line 35
            yield $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(CoreExtension::getAttribute($this->env, $this->source, ($context["form"] ?? null), "use_operator", [], "any", false, false, true, 35), 35, $this->source), "html", null, true);
            yield "
      ";
            // line 36
            yield $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(CoreExtension::getAttribute($this->env, $this->source, ($context["form"] ?? null), "operator_limit_selection", [], "any", false, false, true, 36), 36, $this->source), "html", null, true);
            yield "
      ";
            // line 37
            yield $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(CoreExtension::getAttribute($this->env, $this->source, ($context["form"] ?? null), "operator_list", [], "any", false, false, true, 37), 37, $this->source), "html", null, true);
            yield "
      ";
            // line 38
            yield $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(CoreExtension::getAttribute($this->env, $this->source, ($context["form"] ?? null), "operator_id", [], "any", false, false, true, 38), 38, $this->source), "html", null, true);
            yield "
    </div>
";
        }
        // line 41
        yield "
";
        // line 46
        $context["remaining_form"] = $this->extensions['Drupal\Core\Template\TwigExtension']->withoutFilter($this->sandbox->ensureToStringAllowed(($context["form"] ?? null), 46, $this->source), "form_description", "expose_button", "group_button", "required", "label", "description", "operator", "value", "use_operator", "more", "admin_label", "operator_limit_selection", "operator_list", "operator_id");
        // line 63
        yield "
";
        // line 67
        if ((($__internal_compile_0 = CoreExtension::getAttribute($this->env, $this->source, ($context["form"] ?? null), "operator", [], "any", false, false, true, 67)) && is_array($__internal_compile_0) || $__internal_compile_0 instanceof ArrayAccess ? ($__internal_compile_0["#type"] ?? null) : null)) {
            // line 68
            yield "    <div class=\"views-group-box\">
      ";
            // line 69
            yield $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(($context["remaining_form"] ?? null), 69, $this->source), "html", null, true);
            yield "
    </div>
";
        } else {
            // line 72
            yield "  ";
            yield $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(($context["remaining_form"] ?? null), 72, $this->source), "html", null, true);
            yield "
";
        }
        // line 74
        yield "
";
        // line 75
        if (CoreExtension::getAttribute($this->env, $this->source, ($context["form"] ?? null), "use_operator", [], "any", false, false, true, 75)) {
            // line 76
            yield "  </div>
";
        }
        // line 78
        yield "
";
        // line 79
        yield $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(CoreExtension::getAttribute($this->env, $this->source, ($context["form"] ?? null), "admin_label", [], "any", false, false, true, 79), 79, $this->source), "html", null, true);
        yield "

";
        // line 81
        yield $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(CoreExtension::getAttribute($this->env, $this->source, ($context["form"] ?? null), "more", [], "any", false, false, true, 81), 81, $this->source), "html", null, true);
        yield "
";
        $this->env->getExtension('\Drupal\Core\Template\TwigExtension')
            ->checkDeprecations($context, ["form"]);        return; yield '';
    }

    /**
     * @codeCoverageIgnore
     */
    public function getTemplateName()
    {
        return "core/themes/claro/templates/views/views-ui-expose-filter-form.html.twig";
    }

    /**
     * @codeCoverageIgnore
     */
    public function isTraitable()
    {
        return false;
    }

    /**
     * @codeCoverageIgnore
     */
    public function getDebugInfo()
    {
        return array (  140 => 81,  135 => 79,  132 => 78,  128 => 76,  126 => 75,  123 => 74,  117 => 72,  111 => 69,  108 => 68,  106 => 67,  103 => 63,  101 => 46,  98 => 41,  92 => 38,  88 => 37,  84 => 36,  80 => 35,  76 => 33,  74 => 32,  69 => 30,  65 => 29,  60 => 27,  56 => 26,  52 => 25,  48 => 24,  44 => 23,  40 => 22,);
    }

    public function getSourceContext()
    {
        return new Source("", "core/themes/claro/templates/views/views-ui-expose-filter-form.html.twig", "/var/www/html/pngbaptist/core/themes/claro/templates/views/views-ui-expose-filter-form.html.twig");
    }
    
    public function checkSecurity()
    {
        static $tags = array("if" => 32, "set" => 46);
        static $filters = array("escape" => 22, "without" => 46);
        static $functions = array();

        try {
            $this->sandbox->checkSecurity(
                ['if', 'set'],
                ['escape', 'without'],
                [],
                $this->source
            );
        } catch (SecurityError $e) {
            $e->setSourceContext($this->source);

            if ($e instanceof SecurityNotAllowedTagError && isset($tags[$e->getTagName()])) {
                $e->setTemplateLine($tags[$e->getTagName()]);
            } elseif ($e instanceof SecurityNotAllowedFilterError && isset($filters[$e->getFilterName()])) {
                $e->setTemplateLine($filters[$e->getFilterName()]);
            } elseif ($e instanceof SecurityNotAllowedFunctionError && isset($functions[$e->getFunctionName()])) {
                $e->setTemplateLine($functions[$e->getFunctionName()]);
            }

            throw $e;
        }

    }
}
