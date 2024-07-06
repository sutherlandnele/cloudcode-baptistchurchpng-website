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

/* core/themes/claro/templates/media-library/fieldset--media-library-widget.html.twig */
class __TwigTemplate_060ae94f2b7caff55c7ea63f21446842 extends Template
{
    private $source;
    private $macros = [];

    public function __construct(Environment $env)
    {
        parent::__construct($env);

        $this->source = $this->getSourceContext();

        $this->blocks = [
        ];
        $this->sandbox = $this->env->getExtension(SandboxExtension::class);
        $this->checkSecurity();
        $macros["_self"] = $this->macros["_self"] = $this;
    }

    protected function doGetParent(array $context)
    {
        // line 1
        return "fieldset.html.twig";
    }

    protected function doDisplay(array $context, array $blocks = [])
    {
        $macros = $this->macros;
        // line 20
        $context["attributes"] = CoreExtension::getAttribute($this->env, $this->source, ($context["attributes"] ?? null), "addClass", ["media-library-widget"], "method", false, false, true, 20);
        // line 23
        $context["prefix"] = CoreExtension::callMacro($macros["_self"], "macro_media_library_prefix", [($context["prefix"] ?? null)], 23, $context, $this->getSourceContext());
        // line 1
        $this->parent = $this->loadTemplate("fieldset.html.twig", "core/themes/claro/templates/media-library/fieldset--media-library-widget.html.twig", 1);
        yield from $this->parent->unwrap()->yield($context, array_merge($this->blocks, $blocks));
        $this->env->getExtension('\Drupal\Core\Template\TwigExtension')
            ->checkDeprecations($context, ["_self"]);    }

    // line 12
    public function macro_media_library_prefix($__prefix__ = null, ...$__varargs__)
    {
        $macros = $this->macros;
        $context = $this->env->mergeGlobals([
            "prefix" => $__prefix__,
            "varargs" => $__varargs__,
        ]);

        $blocks = [];

        return ('' === $tmp = \Twig\Extension\CoreExtension::captureOutput((function () use (&$context, $macros, $blocks) {
            // line 13
            yield "  ";
            if (CoreExtension::getAttribute($this->env, $this->source, ($context["prefix"] ?? null), "empty_selection", [], "any", false, false, true, 13)) {
                // line 14
                yield "    <p class=\"media-library-widget-empty-text\">";
                yield $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(($context["prefix"] ?? null), 14, $this->source), "html", null, true);
                yield "</p>
  ";
            } else {
                // line 16
                yield "    ";
                yield $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(($context["prefix"] ?? null), 16, $this->source), "html", null, true);
                yield "
  ";
            }
            return; yield '';
        })())) ? '' : new Markup($tmp, $this->env->getCharset());
    }

    /**
     * @codeCoverageIgnore
     */
    public function getTemplateName()
    {
        return "core/themes/claro/templates/media-library/fieldset--media-library-widget.html.twig";
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
        return array (  76 => 16,  70 => 14,  67 => 13,  55 => 12,  49 => 1,  47 => 23,  45 => 20,  38 => 1,);
    }

    public function getSourceContext()
    {
        return new Source("", "core/themes/claro/templates/media-library/fieldset--media-library-widget.html.twig", "/var/www/html/pngbaptist/core/themes/claro/templates/media-library/fieldset--media-library-widget.html.twig");
    }
    
    public function checkSecurity()
    {
        static $tags = array("set" => 20, "macro" => 12, "if" => 13);
        static $filters = array("escape" => 14);
        static $functions = array();

        try {
            $this->sandbox->checkSecurity(
                ['set', 'macro', 'if', 'import'],
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
