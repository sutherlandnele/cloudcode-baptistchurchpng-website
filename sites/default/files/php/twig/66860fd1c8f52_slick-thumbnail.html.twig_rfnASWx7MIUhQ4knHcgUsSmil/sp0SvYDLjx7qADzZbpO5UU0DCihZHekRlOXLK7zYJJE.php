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

/* modules/contrib/slick/templates/slick-thumbnail.html.twig */
class __TwigTemplate_a581776d3efe63b8316b7e987baeff6a extends Template
{
    private $source;
    private $macros = [];

    public function __construct(Environment $env)
    {
        parent::__construct($env);

        $this->source = $this->getSourceContext();

        $this->parent = false;

        $this->blocks = [
            'slick_thumbnail' => [$this, 'block_slick_thumbnail'],
        ];
        $this->sandbox = $this->env->getExtension(SandboxExtension::class);
        $this->checkSecurity();
    }

    protected function doDisplay(array $context, array $blocks = [])
    {
        $macros = $this->macros;
        // line 16
        $context["classes"] = [("slide--" . $this->sandbox->ensureToStringAllowed(        // line 17
($context["delta"] ?? null), 17, $this->source))];
        // line 20
        $context["use_blazy"] = CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, ($context["blazies"] ?? null), "use", [], "any", false, false, true, 20), "theme_thumbnail", [], "any", false, false, true, 20);
        // line 21
        yield from $this->unwrap()->yieldBlock('slick_thumbnail', $context, $blocks);
        $this->env->getExtension('\Drupal\Core\Template\TwigExtension')
            ->checkDeprecations($context, ["delta", "blazies", "attributes", "item"]);        return; yield '';
    }

    public function block_slick_thumbnail($context, array $blocks = [])
    {
        $macros = $this->macros;
        // line 22
        yield "  <div";
        yield $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(CoreExtension::getAttribute($this->env, $this->source, ($context["attributes"] ?? null), "addClass", [($context["classes"] ?? null)], "method", false, false, true, 22), 22, $this->source), "html", null, true);
        yield ">";
        // line 23
        if (($context["use_blazy"] ?? null)) {
            // line 24
            yield $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(($context["item"] ?? null), 24, $this->source), "html", null, true);
        } else {
            // line 26
            yield "      ";
            // line 27
            if ( !Twig\Extension\CoreExtension::testEmpty(CoreExtension::getAttribute($this->env, $this->source, ($context["item"] ?? null), "slide", [], "any", false, false, true, 27))) {
                // line 28
                yield "<div class=\"slide__thumbnail\">";
                yield $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(CoreExtension::getAttribute($this->env, $this->source, ($context["item"] ?? null), "slide", [], "any", false, false, true, 28), 28, $this->source), "html", null, true);
                yield "</div>";
            }
            // line 30
            if ( !Twig\Extension\CoreExtension::testEmpty(CoreExtension::getAttribute($this->env, $this->source, ($context["item"] ?? null), "caption", [], "any", false, false, true, 30))) {
                // line 31
                yield "        <div class=\"slide__caption\">";
                yield $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(CoreExtension::getAttribute($this->env, $this->source, ($context["item"] ?? null), "caption", [], "any", false, false, true, 31), 31, $this->source), "html", null, true);
                yield "</div>";
            }
        }
        // line 34
        yield "</div>
";
        return; yield '';
    }

    /**
     * @codeCoverageIgnore
     */
    public function getTemplateName()
    {
        return "modules/contrib/slick/templates/slick-thumbnail.html.twig";
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
        return array (  81 => 34,  75 => 31,  73 => 30,  68 => 28,  66 => 27,  64 => 26,  61 => 24,  59 => 23,  55 => 22,  46 => 21,  44 => 20,  42 => 17,  41 => 16,);
    }

    public function getSourceContext()
    {
        return new Source("", "modules/contrib/slick/templates/slick-thumbnail.html.twig", "/var/www/html/pngbaptist/modules/contrib/slick/templates/slick-thumbnail.html.twig");
    }
    
    public function checkSecurity()
    {
        static $tags = array("set" => 16, "block" => 21, "if" => 23);
        static $filters = array("escape" => 22);
        static $functions = array();

        try {
            $this->sandbox->checkSecurity(
                ['set', 'block', 'if'],
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
