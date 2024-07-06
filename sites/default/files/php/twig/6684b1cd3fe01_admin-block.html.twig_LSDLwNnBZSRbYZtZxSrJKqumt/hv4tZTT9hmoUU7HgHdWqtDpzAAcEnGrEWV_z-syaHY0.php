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

/* core/themes/stable9/templates/admin/admin-block.html.twig */
class __TwigTemplate_b90ec80f8dcec65b5ff8c51c307951aa extends Template
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
        // line 17
        $context["classes"] = ["panel"];
        // line 21
        yield "<div";
        yield $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(CoreExtension::getAttribute($this->env, $this->source, ($context["attributes"] ?? null), "addClass", [($context["classes"] ?? null)], "method", false, false, true, 21), 21, $this->source), "html", null, true);
        yield ">
  ";
        // line 22
        if (CoreExtension::getAttribute($this->env, $this->source, ($context["block"] ?? null), "title", [], "any", false, false, true, 22)) {
            // line 23
            yield "    <h3 class=\"panel__title\">";
            yield $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(CoreExtension::getAttribute($this->env, $this->source, ($context["block"] ?? null), "title", [], "any", false, false, true, 23), 23, $this->source), "html", null, true);
            yield "</h3>
  ";
        }
        // line 25
        yield "  ";
        if (CoreExtension::getAttribute($this->env, $this->source, ($context["block"] ?? null), "content", [], "any", false, false, true, 25)) {
            // line 26
            yield "    <div class=\"panel__content\">";
            yield $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(CoreExtension::getAttribute($this->env, $this->source, ($context["block"] ?? null), "content", [], "any", false, false, true, 26), 26, $this->source), "html", null, true);
            yield "</div>
  ";
        } elseif (CoreExtension::getAttribute($this->env, $this->source,         // line 27
($context["block"] ?? null), "description", [], "any", false, false, true, 27)) {
            // line 28
            yield "    <div class=\"panel__description\">";
            yield $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(CoreExtension::getAttribute($this->env, $this->source, ($context["block"] ?? null), "description", [], "any", false, false, true, 28), 28, $this->source), "html", null, true);
            yield "</div>
  ";
        }
        // line 30
        yield "</div>
";
        $this->env->getExtension('\Drupal\Core\Template\TwigExtension')
            ->checkDeprecations($context, ["attributes", "block"]);        return; yield '';
    }

    /**
     * @codeCoverageIgnore
     */
    public function getTemplateName()
    {
        return "core/themes/stable9/templates/admin/admin-block.html.twig";
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
        return array (  71 => 30,  65 => 28,  63 => 27,  58 => 26,  55 => 25,  49 => 23,  47 => 22,  42 => 21,  40 => 17,);
    }

    public function getSourceContext()
    {
        return new Source("", "core/themes/stable9/templates/admin/admin-block.html.twig", "/var/www/html/pngbaptist/core/themes/stable9/templates/admin/admin-block.html.twig");
    }
    
    public function checkSecurity()
    {
        static $tags = array("set" => 17, "if" => 22);
        static $filters = array("escape" => 21);
        static $functions = array();

        try {
            $this->sandbox->checkSecurity(
                ['set', 'if'],
                ['escape'],
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
