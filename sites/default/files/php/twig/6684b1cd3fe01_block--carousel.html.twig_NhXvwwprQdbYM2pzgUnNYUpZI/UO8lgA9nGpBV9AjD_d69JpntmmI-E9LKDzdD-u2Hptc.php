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

/* themes/openchurch_theme/templates/block/block--carousel.html.twig */
class __TwigTemplate_62ae8033d831a9844b05ed8803b11daa extends Template
{
    private $source;
    private $macros = [];

    public function __construct(Environment $env)
    {
        parent::__construct($env);

        $this->source = $this->getSourceContext();

        $this->parent = false;

        $this->blocks = [
            'content' => [$this, 'block_content'],
        ];
        $this->sandbox = $this->env->getExtension(SandboxExtension::class);
        $this->checkSecurity();
        $macros["_self"] = $this->macros["_self"] = $this;
    }

    protected function doDisplay(array $context, array $blocks = [])
    {
        $macros = $this->macros;
        // line 29
        yield $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->extensions['Drupal\Core\Template\TwigExtension']->attachLibrary("openchurch_theme/carousel"), "html", null, true);
        yield "

";
        // line 32
        $context["classes"] = ["block", ("block-" . \Drupal\Component\Utility\Html::getClass($this->sandbox->ensureToStringAllowed(CoreExtension::getAttribute($this->env, $this->source,         // line 34
($context["configuration"] ?? null), "provider", [], "any", false, false, true, 34), 34, $this->source))), ("block-" . \Drupal\Component\Utility\Html::getClass($this->sandbox->ensureToStringAllowed(        // line 35
($context["id"] ?? null), 35, $this->source))), "mb-5"];
        // line 39
        yield "
";
        // line 41
        $context["items"] = [["title" => CoreExtension::getAttribute($this->env, $this->source,         // line 43
($context["content"] ?? null), "field_title", [], "any", false, false, true, 43), "summary" => CoreExtension::getAttribute($this->env, $this->source,         // line 44
($context["content"] ?? null), "field_summary", [], "any", false, false, true, 44), "link" => CoreExtension::getAttribute($this->env, $this->source,         // line 45
($context["content"] ?? null), "field_link", [], "any", false, false, true, 45), "image" => CoreExtension::getAttribute($this->env, $this->source,         // line 46
($context["content"] ?? null), "field_image", [], "any", false, false, true, 46), "active" => true], ["title" => CoreExtension::getAttribute($this->env, $this->source,         // line 50
($context["content"] ?? null), "field_title2", [], "any", false, false, true, 50), "summary" => CoreExtension::getAttribute($this->env, $this->source,         // line 51
($context["content"] ?? null), "field_summary2", [], "any", false, false, true, 51), "link" => CoreExtension::getAttribute($this->env, $this->source,         // line 52
($context["content"] ?? null), "field_link2", [], "any", false, false, true, 52), "image" => CoreExtension::getAttribute($this->env, $this->source,         // line 53
($context["content"] ?? null), "field_image2", [], "any", false, false, true, 53)], ["title" => CoreExtension::getAttribute($this->env, $this->source,         // line 56
($context["content"] ?? null), "field_title3", [], "any", false, false, true, 56), "summary" => CoreExtension::getAttribute($this->env, $this->source,         // line 57
($context["content"] ?? null), "field_summary3", [], "any", false, false, true, 57), "link" => CoreExtension::getAttribute($this->env, $this->source,         // line 58
($context["content"] ?? null), "field_link3", [], "any", false, false, true, 58), "image" => CoreExtension::getAttribute($this->env, $this->source,         // line 59
($context["content"] ?? null), "field_image3", [], "any", false, false, true, 59)]];
        // line 63
        yield "
<div";
        // line 64
        yield $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(CoreExtension::getAttribute($this->env, $this->source, ($context["attributes"] ?? null), "addClass", [($context["classes"] ?? null)], "method", false, false, true, 64), 64, $this->source), "html", null, true);
        yield ">
  ";
        // line 65
        yield $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(($context["title_prefix"] ?? null), 65, $this->source), "html", null, true);
        yield "
  ";
        // line 66
        if (($context["label"] ?? null)) {
            // line 67
            yield "    <h2";
            yield $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(CoreExtension::getAttribute($this->env, $this->source, ($context["title_attributes"] ?? null), "addClass", ["mb-5"], "method", false, false, true, 67), 67, $this->source), "html", null, true);
            yield ">";
            yield $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(($context["label"] ?? null), 67, $this->source), "html", null, true);
            yield "</h2>
  ";
        }
        // line 69
        yield "  ";
        yield $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(($context["title_suffix"] ?? null), 69, $this->source), "html", null, true);
        yield "
  ";
        // line 70
        yield from $this->unwrap()->yieldBlock('content', $context, $blocks);
        // line 91
        yield "</div>

";
        $this->env->getExtension('\Drupal\Core\Template\TwigExtension')
            ->checkDeprecations($context, ["configuration", "id", "content", "attributes", "title_prefix", "label", "title_attributes", "title_suffix", "_self"]);        return; yield '';
    }

    // line 70
    public function block_content($context, array $blocks = [])
    {
        $macros = $this->macros;
        // line 71
        yield "    ";
        // line 72
        yield "    <div id=\"carousel";
        yield $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(($context["id"] ?? null), 72, $this->source), "html", null, true);
        yield "\" class=\"carousel slide\" data-bs-ride=\"carousel\">
      <div class=\"carousel-inner\">
        <div class=\"carousel-indicators\">
          <button type=\"button\" data-bs-target=\"#carousel";
        // line 75
        yield $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(($context["id"] ?? null), 75, $this->source), "html", null, true);
        yield "\" data-bs-slide-to=\"0\" class=\"active\" aria-current=\"true\" aria-label=\"Slide 1\"></button>
          ";
        // line 76
        if (CoreExtension::getAttribute($this->env, $this->source, ($context["content"] ?? null), "field_image2", [], "any", false, false, true, 76)) {
            // line 77
            yield "            <button type=\"button\" data-bs-target=\"#carousel";
            yield $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(($context["id"] ?? null), 77, $this->source), "html", null, true);
            yield "\" data-bs-slide-to=\"1\" aria-label=\"Slide 2\"></button>
          ";
        }
        // line 79
        yield "          ";
        if (CoreExtension::getAttribute($this->env, $this->source, ($context["content"] ?? null), "field_image3", [], "any", false, false, true, 79)) {
            // line 80
            yield "            <button type=\"button\" data-bs-target=\"#carousel";
            yield $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(($context["id"] ?? null), 80, $this->source), "html", null, true);
            yield "\" data-bs-slide-to=\"2\" aria-label=\"Slide 3\"></button>
          ";
        }
        // line 82
        yield "        </div>
        ";
        // line 83
        $context['_parent'] = $context;
        $context['_seq'] = CoreExtension::ensureTraversable(($context["items"] ?? null));
        foreach ($context['_seq'] as $context["_key"] => $context["item"]) {
            // line 84
            yield "          ";
            if (CoreExtension::getAttribute($this->env, $this->source, $context["item"], "image", [], "any", false, false, true, 84)) {
                // line 85
                yield "            ";
                yield $this->extensions['Drupal\Core\Template\TwigExtension']->renderVar(CoreExtension::callMacro($macros["_self"], "macro_carousel_item", [$context["item"]], 85, $context, $this->getSourceContext()));
                yield "
          ";
            }
            // line 87
            yield "        ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['item'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 88
        yield "      </div>
    </div>
  ";
        return; yield '';
    }

    // line 94
    public function macro_carousel_item($__item__ = null, ...$__varargs__)
    {
        $macros = $this->macros;
        $context = $this->env->mergeGlobals([
            "item" => $__item__,
            "varargs" => $__varargs__,
        ]);

        $blocks = [];

        return ('' === $tmp = \Twig\Extension\CoreExtension::captureOutput((function () use (&$context, $macros, $blocks) {
            // line 95
            yield "  <div class=\"carousel-item ";
            yield $this->extensions['Drupal\Core\Template\TwigExtension']->renderVar(((CoreExtension::getAttribute($this->env, $this->source, ($context["item"] ?? null), "active", [], "any", false, false, true, 95)) ? ("active") : ("")));
            yield "\">
    ";
            // line 96
            if (CoreExtension::getAttribute($this->env, $this->source, ($context["item"] ?? null), "image", [], "any", false, false, true, 96)) {
                // line 97
                yield "      ";
                yield $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(CoreExtension::getAttribute($this->env, $this->source, ($context["item"] ?? null), "image", [], "any", false, false, true, 97), 97, $this->source), "html", null, true);
                yield "
    ";
            }
            // line 99
            yield "    <div class=\"carousel-caption\">
      ";
            // line 100
            if (CoreExtension::getAttribute($this->env, $this->source, ($context["item"] ?? null), "title", [], "any", false, false, true, 100)) {
                // line 101
                yield "        <h2 class=\"display-3\">";
                yield $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(CoreExtension::getAttribute($this->env, $this->source, ($context["item"] ?? null), "title", [], "any", false, false, true, 101), 101, $this->source), "html", null, true);
                yield "</h2>
      ";
            }
            // line 103
            yield "      ";
            if (CoreExtension::getAttribute($this->env, $this->source, ($context["item"] ?? null), "summary", [], "any", false, false, true, 103)) {
                // line 104
                yield "        <p class=\"lead\">";
                yield $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(CoreExtension::getAttribute($this->env, $this->source, ($context["item"] ?? null), "summary", [], "any", false, false, true, 104), 104, $this->source), "html", null, true);
                yield "</p>
      ";
            }
            // line 106
            yield "      ";
            if (CoreExtension::getAttribute($this->env, $this->source, ($context["item"] ?? null), "link", [], "any", false, false, true, 106)) {
                // line 107
                yield "        <div class=\"mt-3\">
          <a href=\"";
                // line 108
                yield $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(CoreExtension::getAttribute($this->env, $this->source, (($__internal_compile_0 = (($__internal_compile_1 = CoreExtension::getAttribute($this->env, $this->source, ($context["item"] ?? null), "link", [], "any", false, false, true, 108)) && is_array($__internal_compile_1) || $__internal_compile_1 instanceof ArrayAccess ? ($__internal_compile_1[0] ?? null) : null)) && is_array($__internal_compile_0) || $__internal_compile_0 instanceof ArrayAccess ? ($__internal_compile_0["#url"] ?? null) : null), "toString", [], "method", false, false, true, 108), 108, $this->source), "html", null, true);
                yield "\" class=\"btn btn-primary\" role=\"button\">";
                yield $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed((($__internal_compile_2 = (($__internal_compile_3 = CoreExtension::getAttribute($this->env, $this->source, ($context["item"] ?? null), "link", [], "any", false, false, true, 108)) && is_array($__internal_compile_3) || $__internal_compile_3 instanceof ArrayAccess ? ($__internal_compile_3[0] ?? null) : null)) && is_array($__internal_compile_2) || $__internal_compile_2 instanceof ArrayAccess ? ($__internal_compile_2["#title"] ?? null) : null), 108, $this->source), "html", null, true);
                yield " <i class=\"bi bi-arrow-right\"></i></a>
        </div>
      ";
            }
            // line 111
            yield "    </div>
    <button class=\"carousel-control-prev\" type=\"button\" data-bs-target=\"#carousel";
            // line 112
            yield $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(($context["id"] ?? null), 112, $this->source), "html", null, true);
            yield "\" data-bs-slide=\"prev\">
      <span class=\"carousel-control-prev-icon\" aria-hidden=\"true\"></span>
      <span class=\"visually-hidden\">Previous</span>
    </button>
    <button class=\"carousel-control-next\" type=\"button\" data-bs-target=\"#carousel";
            // line 116
            yield $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(($context["id"] ?? null), 116, $this->source), "html", null, true);
            yield "\" data-bs-slide=\"next\">
      <span class=\"carousel-control-next-icon\" aria-hidden=\"true\"></span>
      <span class=\"visually-hidden\">Next</span>
    </button>
  </div>
";
            return; yield '';
        })())) ? '' : new Markup($tmp, $this->env->getCharset());
    }

    /**
     * @codeCoverageIgnore
     */
    public function getTemplateName()
    {
        return "themes/openchurch_theme/templates/block/block--carousel.html.twig";
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
        return array (  236 => 116,  229 => 112,  226 => 111,  218 => 108,  215 => 107,  212 => 106,  206 => 104,  203 => 103,  197 => 101,  195 => 100,  192 => 99,  186 => 97,  184 => 96,  179 => 95,  167 => 94,  160 => 88,  154 => 87,  148 => 85,  145 => 84,  141 => 83,  138 => 82,  132 => 80,  129 => 79,  123 => 77,  121 => 76,  117 => 75,  110 => 72,  108 => 71,  104 => 70,  96 => 91,  94 => 70,  89 => 69,  81 => 67,  79 => 66,  75 => 65,  71 => 64,  68 => 63,  66 => 59,  65 => 58,  64 => 57,  63 => 56,  62 => 53,  61 => 52,  60 => 51,  59 => 50,  58 => 46,  57 => 45,  56 => 44,  55 => 43,  54 => 41,  51 => 39,  49 => 35,  48 => 34,  47 => 32,  42 => 29,);
    }

    public function getSourceContext()
    {
        return new Source("", "themes/openchurch_theme/templates/block/block--carousel.html.twig", "/var/www/html/pngbaptist/themes/openchurch_theme/templates/block/block--carousel.html.twig");
    }
    
    public function checkSecurity()
    {
        static $tags = array("set" => 32, "if" => 66, "block" => 70, "for" => 83, "macro" => 94);
        static $filters = array("escape" => 29, "clean_class" => 34);
        static $functions = array("attach_library" => 29);

        try {
            $this->sandbox->checkSecurity(
                ['set', 'if', 'block', 'for', 'macro', 'import'],
                ['escape', 'clean_class'],
                ['attach_library'],
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
