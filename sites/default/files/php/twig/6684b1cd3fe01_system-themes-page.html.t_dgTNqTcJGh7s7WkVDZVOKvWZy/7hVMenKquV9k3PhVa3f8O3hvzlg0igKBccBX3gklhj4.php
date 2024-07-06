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

/* core/themes/stable9/templates/admin/system-themes-page.html.twig */
class __TwigTemplate_f253fc41faccdfbe1767499b6100c8ff extends Template
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
        // line 31
        yield "<div";
        yield $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(($context["attributes"] ?? null), 31, $this->source), "html", null, true);
        yield ">
  ";
        // line 32
        $context['_parent'] = $context;
        $context['_seq'] = CoreExtension::ensureTraversable(($context["theme_groups"] ?? null));
        foreach ($context['_seq'] as $context["_key"] => $context["theme_group"]) {
            // line 33
            yield "    ";
            // line 34
            $context["theme_group_classes"] = ["system-themes-list", ("system-themes-list-" . $this->sandbox->ensureToStringAllowed(CoreExtension::getAttribute($this->env, $this->source,             // line 36
$context["theme_group"], "state", [], "any", false, false, true, 36), 36, $this->source)), "clearfix"];
            // line 40
            yield "    <div";
            yield $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, $context["theme_group"], "attributes", [], "any", false, false, true, 40), "addClass", [($context["theme_group_classes"] ?? null)], "method", false, false, true, 40), 40, $this->source), "html", null, true);
            yield ">
      <h2 class=\"system-themes-list__header\">";
            // line 41
            yield $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(CoreExtension::getAttribute($this->env, $this->source, $context["theme_group"], "title", [], "any", false, false, true, 41), 41, $this->source), "html", null, true);
            yield "</h2>
      ";
            // line 42
            $context['_parent'] = $context;
            $context['_seq'] = CoreExtension::ensureTraversable(CoreExtension::getAttribute($this->env, $this->source, $context["theme_group"], "themes", [], "any", false, false, true, 42));
            foreach ($context['_seq'] as $context["_key"] => $context["theme"]) {
                // line 43
                yield "        ";
                // line 44
                $context["theme_classes"] = [((CoreExtension::getAttribute($this->env, $this->source,                 // line 45
$context["theme"], "is_default", [], "any", false, false, true, 45)) ? ("theme-default") : ("")), ((CoreExtension::getAttribute($this->env, $this->source,                 // line 46
$context["theme"], "is_admin", [], "any", false, false, true, 46)) ? ("theme-admin") : ("")), "theme-selector", "clearfix"];
                // line 51
                yield "        <div";
                yield $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, $context["theme"], "attributes", [], "any", false, false, true, 51), "addClass", [($context["theme_classes"] ?? null)], "method", false, false, true, 51), 51, $this->source), "html", null, true);
                yield ">
          ";
                // line 52
                if (CoreExtension::getAttribute($this->env, $this->source, $context["theme"], "screenshot", [], "any", false, false, true, 52)) {
                    // line 53
                    yield "            ";
                    yield $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(CoreExtension::getAttribute($this->env, $this->source, $context["theme"], "screenshot", [], "any", false, false, true, 53), 53, $this->source), "html", null, true);
                    yield "
          ";
                }
                // line 55
                yield "          <div class=\"theme-info\">
            <h3 class=\"theme-info__header\">";
                // line 57
                yield $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(CoreExtension::getAttribute($this->env, $this->source, $context["theme"], "name", [], "any", false, false, true, 57), 57, $this->source), "html", null, true);
                yield " ";
                yield $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(CoreExtension::getAttribute($this->env, $this->source, $context["theme"], "version", [], "any", false, false, true, 57), 57, $this->source), "html", null, true);
                // line 58
                if (CoreExtension::getAttribute($this->env, $this->source, $context["theme"], "notes", [], "any", false, false, true, 58)) {
                    // line 59
                    yield "                (";
                    yield $this->extensions['Drupal\Core\Template\TwigExtension']->renderVar($this->extensions['Drupal\Core\Template\TwigExtension']->safeJoin($this->env, $this->sandbox->ensureToStringAllowed(CoreExtension::getAttribute($this->env, $this->source, $context["theme"], "notes", [], "any", false, false, true, 59), 59, $this->source), ", "));
                    yield ")";
                }
                // line 61
                yield "</h3>
            <div class=\"theme-info__description\">";
                // line 62
                yield $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(CoreExtension::getAttribute($this->env, $this->source, $context["theme"], "description", [], "any", false, false, true, 62), 62, $this->source), "html", null, true);
                yield "</div>
            ";
                // line 64
                yield "            ";
                if (CoreExtension::getAttribute($this->env, $this->source, $context["theme"], "incompatible", [], "any", false, false, true, 64)) {
                    // line 65
                    yield "              <div class=\"incompatible\">";
                    yield $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(CoreExtension::getAttribute($this->env, $this->source, $context["theme"], "incompatible", [], "any", false, false, true, 65), 65, $this->source), "html", null, true);
                    yield "</div>
            ";
                } else {
                    // line 67
                    yield "              ";
                    yield $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(CoreExtension::getAttribute($this->env, $this->source, $context["theme"], "operations", [], "any", false, false, true, 67), 67, $this->source), "html", null, true);
                    yield "
            ";
                }
                // line 69
                yield "          </div>
        </div>
      ";
            }
            $_parent = $context['_parent'];
            unset($context['_seq'], $context['_iterated'], $context['_key'], $context['theme'], $context['_parent'], $context['loop']);
            $context = array_intersect_key($context, $_parent) + $_parent;
            // line 72
            yield "    </div>
  ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['theme_group'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 74
        yield "</div>
";
        $this->env->getExtension('\Drupal\Core\Template\TwigExtension')
            ->checkDeprecations($context, ["attributes", "theme_groups"]);        return; yield '';
    }

    /**
     * @codeCoverageIgnore
     */
    public function getTemplateName()
    {
        return "core/themes/stable9/templates/admin/system-themes-page.html.twig";
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
        return array (  137 => 74,  130 => 72,  122 => 69,  116 => 67,  110 => 65,  107 => 64,  103 => 62,  100 => 61,  95 => 59,  93 => 58,  89 => 57,  86 => 55,  80 => 53,  78 => 52,  73 => 51,  71 => 46,  70 => 45,  69 => 44,  67 => 43,  63 => 42,  59 => 41,  54 => 40,  52 => 36,  51 => 34,  49 => 33,  45 => 32,  40 => 31,);
    }

    public function getSourceContext()
    {
        return new Source("", "core/themes/stable9/templates/admin/system-themes-page.html.twig", "/var/www/html/pngbaptist/core/themes/stable9/templates/admin/system-themes-page.html.twig");
    }
    
    public function checkSecurity()
    {
        static $tags = array("for" => 32, "set" => 34, "if" => 52);
        static $filters = array("escape" => 31, "safe_join" => 59);
        static $functions = array();

        try {
            $this->sandbox->checkSecurity(
                ['for', 'set', 'if'],
                ['escape', 'safe_join'],
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
