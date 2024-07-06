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

/* modules/contrib/slick/templates/slick-slide.html.twig */
class __TwigTemplate_cb31f90c14797efdefb23db55214c026 extends Template
{
    private $source;
    private $macros = [];

    public function __construct(Environment $env)
    {
        parent::__construct($env);

        $this->source = $this->getSourceContext();

        $this->parent = false;

        $this->blocks = [
            'slick_slide' => [$this, 'block_slick_slide'],
            'slick_caption' => [$this, 'block_slick_caption'],
        ];
        $this->sandbox = $this->env->getExtension(SandboxExtension::class);
        $this->checkSecurity();
    }

    protected function doDisplay(array $context, array $blocks = [])
    {
        $macros = $this->macros;
        // line 21
        $context["classes"] = [("slide--" . $this->sandbox->ensureToStringAllowed(        // line 22
($context["delta"] ?? null), 22, $this->source)), ((Twig\Extension\CoreExtension::testEmpty(CoreExtension::getAttribute($this->env, $this->source,         // line 23
($context["item"] ?? null), "slide", [], "any", false, false, true, 23))) ? ("slide--text") : ("")), ((CoreExtension::getAttribute($this->env, $this->source,         // line 24
($context["settings"] ?? null), "layout", [], "any", false, false, true, 24)) ? (("slide--caption--" . \Drupal\Component\Utility\Html::getClass($this->sandbox->ensureToStringAllowed(CoreExtension::getAttribute($this->env, $this->source, ($context["settings"] ?? null), "layout", [], "any", false, false, true, 24), 24, $this->source)))) : ("")), ((CoreExtension::getAttribute($this->env, $this->source,         // line 25
($context["settings"] ?? null), "class", [], "any", false, false, true, 25)) ? (CoreExtension::getAttribute($this->env, $this->source, ($context["settings"] ?? null), "class", [], "any", false, false, true, 25)) : (""))];
        // line 29
        $context["content_classes"] = [((CoreExtension::getAttribute($this->env, $this->source,         // line 30
($context["settings"] ?? null), "detroy", [], "any", false, false, true, 30)) ? ("slide") : ("")), (( !CoreExtension::getAttribute($this->env, $this->source,         // line 31
($context["settings"] ?? null), "detroy", [], "any", false, false, true, 31)) ? ("slide__content") : (""))];
        // line 35
        $context["caption_classes"] = ["slide__caption"];
        // line 39
        $context["use_blazy"] = CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, ($context["blazies"] ?? null), "use", [], "any", false, false, true, 39), "theme_blazy", [], "any", false, false, true, 39);
        // line 40
        if (CoreExtension::getAttribute($this->env, $this->source, ($context["settings"] ?? null), "wrapper", [], "any", false, false, true, 40)) {
            // line 41
            yield "<div";
            yield $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(CoreExtension::getAttribute($this->env, $this->source, ($context["attributes"] ?? null), "addClass", [($context["classes"] ?? null)], "method", false, false, true, 41), 41, $this->source), "html", null, true);
            yield ">";
        }
        // line 44
        if (($context["use_blazy"] ?? null)) {
            // line 45
            yield $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(($context["item"] ?? null), 45, $this->source), "html", null, true);
        } else {
            // line 47
            yield "    ";
            // line 51
            if (CoreExtension::getAttribute($this->env, $this->source, ($context["settings"] ?? null), "use_ca", [], "any", false, false, true, 51)) {
                yield "<div";
                yield $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(CoreExtension::getAttribute($this->env, $this->source, ($context["content_attributes"] ?? null), "addClass", [($context["content_classes"] ?? null)], "method", false, false, true, 51), 51, $this->source), "html", null, true);
                yield ">";
            }
            // line 52
            $context["slide"] = ('' === $tmp = \Twig\Extension\CoreExtension::captureOutput((function () use (&$context, $macros, $blocks) {
                // line 53
                yield "        ";
                yield from $this->unwrap()->yieldBlock('slick_slide', $context, $blocks);
                // line 60
                yield "      ";
                return; yield '';
            })())) ? '' : new Markup($tmp, $this->env->getCharset());
            // line 62
            if (CoreExtension::getAttribute($this->env, $this->source, ($context["item"] ?? null), "slide", [], "any", false, false, true, 62)) {
                // line 63
                yield $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(($context["slide"] ?? null), 63, $this->source), "html", null, true);
            }
            // line 66
            if (CoreExtension::getAttribute($this->env, $this->source, ($context["item"] ?? null), "caption", [], "any", false, false, true, 66)) {
                // line 67
                yield from $this->unwrap()->yieldBlock('slick_caption', $context, $blocks);
            }
            // line 92
            if (CoreExtension::getAttribute($this->env, $this->source, ($context["settings"] ?? null), "use_ca", [], "any", false, false, true, 92)) {
                yield "</div>";
            }
        }
        // line 95
        if (CoreExtension::getAttribute($this->env, $this->source, ($context["settings"] ?? null), "wrapper", [], "any", false, false, true, 95)) {
            // line 96
            yield "</div>";
        }
        $this->env->getExtension('\Drupal\Core\Template\TwigExtension')
            ->checkDeprecations($context, ["delta", "item", "settings", "blazies", "attributes", "content_attributes", "caption_attributes"]);        return; yield '';
    }

    // line 53
    public function block_slick_slide($context, array $blocks = [])
    {
        $macros = $this->macros;
        // line 54
        if (CoreExtension::getAttribute($this->env, $this->source, ($context["settings"] ?? null), "split", [], "any", false, false, true, 54)) {
            // line 55
            yield "<div class=\"slide__media\">";
            yield $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(CoreExtension::getAttribute($this->env, $this->source, ($context["item"] ?? null), "slide", [], "any", false, false, true, 55), 55, $this->source), "html", null, true);
            yield "</div>
          ";
        } else {
            // line 57
            yield $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(CoreExtension::getAttribute($this->env, $this->source, ($context["item"] ?? null), "slide", [], "any", false, false, true, 57), 57, $this->source), "html", null, true);
        }
        return; yield '';
    }

    // line 67
    public function block_slick_caption($context, array $blocks = [])
    {
        $macros = $this->macros;
        // line 68
        if (CoreExtension::getAttribute($this->env, $this->source, ($context["settings"] ?? null), "fullwidth", [], "any", false, false, true, 68)) {
            yield "<div class=\"slide__constrained\">";
        }
        // line 69
        yield "<div";
        yield $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(CoreExtension::getAttribute($this->env, $this->source, ($context["caption_attributes"] ?? null), "addClass", [($context["caption_classes"] ?? null)], "method", false, false, true, 69), 69, $this->source), "html", null, true);
        yield ">";
        // line 70
        if (CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, ($context["item"] ?? null), "caption", [], "any", false, false, true, 70), "overlay", [], "any", false, false, true, 70)) {
            // line 71
            yield "<div class=\"slide__overlay\">";
            yield $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, ($context["item"] ?? null), "caption", [], "any", false, false, true, 71), "overlay", [], "any", false, false, true, 71), 71, $this->source), "html", null, true);
            yield "</div>";
            // line 72
            if (CoreExtension::getAttribute($this->env, $this->source, ($context["settings"] ?? null), "data", [], "any", false, false, true, 72)) {
                yield "<div class=\"slide__data\">";
            }
        }
        // line 74
        if (CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, ($context["item"] ?? null), "caption", [], "any", false, false, true, 74), "title", [], "any", false, false, true, 74)) {
            // line 75
            yield "<h2 class=\"slide__title\">";
            yield $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, ($context["item"] ?? null), "caption", [], "any", false, false, true, 75), "title", [], "any", false, false, true, 75), 75, $this->source), "html", null, true);
            yield "</h2>";
        }
        // line 77
        if (CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, ($context["item"] ?? null), "caption", [], "any", false, false, true, 77), "alt", [], "any", false, false, true, 77)) {
            // line 78
            yield "<p class=\"slide__description\">";
            yield $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, ($context["item"] ?? null), "caption", [], "any", false, false, true, 78), "alt", [], "any", false, false, true, 78), 78, $this->source), "html", null, true);
            yield "</p>";
        }
        // line 80
        if (CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, ($context["item"] ?? null), "caption", [], "any", false, false, true, 80), "data", [], "any", false, false, true, 80)) {
            // line 81
            yield "<div class=\"slide__description\">";
            yield $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, ($context["item"] ?? null), "caption", [], "any", false, false, true, 81), "data", [], "any", false, false, true, 81), 81, $this->source), "html", null, true);
            yield "</div>";
        }
        // line 83
        if (CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, ($context["item"] ?? null), "caption", [], "any", false, false, true, 83), "link", [], "any", false, false, true, 83)) {
            // line 84
            yield "<div class=\"slide__link\">";
            yield $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, ($context["item"] ?? null), "caption", [], "any", false, false, true, 84), "link", [], "any", false, false, true, 84), 84, $this->source), "html", null, true);
            yield "</div>";
        }
        // line 86
        if ((CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, ($context["item"] ?? null), "caption", [], "any", false, false, true, 86), "overlay", [], "any", false, false, true, 86) && CoreExtension::getAttribute($this->env, $this->source, ($context["settings"] ?? null), "data", [], "any", false, false, true, 86))) {
            yield "</div>";
        }
        // line 87
        yield "</div>";
        // line 88
        if (CoreExtension::getAttribute($this->env, $this->source, ($context["settings"] ?? null), "fullwidth", [], "any", false, false, true, 88)) {
            yield "</div>";
        }
        return; yield '';
    }

    /**
     * @codeCoverageIgnore
     */
    public function getTemplateName()
    {
        return "modules/contrib/slick/templates/slick-slide.html.twig";
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
        return array (  184 => 88,  182 => 87,  178 => 86,  173 => 84,  171 => 83,  166 => 81,  164 => 80,  159 => 78,  157 => 77,  152 => 75,  150 => 74,  145 => 72,  141 => 71,  139 => 70,  135 => 69,  131 => 68,  127 => 67,  121 => 57,  115 => 55,  113 => 54,  109 => 53,  102 => 96,  100 => 95,  95 => 92,  92 => 67,  90 => 66,  87 => 63,  85 => 62,  81 => 60,  78 => 53,  76 => 52,  70 => 51,  68 => 47,  65 => 45,  63 => 44,  58 => 41,  56 => 40,  54 => 39,  52 => 35,  50 => 31,  49 => 30,  48 => 29,  46 => 25,  45 => 24,  44 => 23,  43 => 22,  42 => 21,);
    }

    public function getSourceContext()
    {
        return new Source("", "modules/contrib/slick/templates/slick-slide.html.twig", "/var/www/html/pngbaptist/modules/contrib/slick/templates/slick-slide.html.twig");
    }
    
    public function checkSecurity()
    {
        static $tags = array("set" => 21, "if" => 40, "block" => 53);
        static $filters = array("clean_class" => 24, "escape" => 41);
        static $functions = array();

        try {
            $this->sandbox->checkSecurity(
                ['set', 'if', 'block'],
                ['clean_class', 'escape'],
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
