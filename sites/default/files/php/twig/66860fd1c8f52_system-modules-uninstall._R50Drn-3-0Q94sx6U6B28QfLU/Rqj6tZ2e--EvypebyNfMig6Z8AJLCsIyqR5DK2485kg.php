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

/* core/modules/system/templates/system-modules-uninstall.html.twig */
class __TwigTemplate_2aab82f18ba760a63607134287ceee12 extends Template
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
        // line 24
        yield $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(CoreExtension::getAttribute($this->env, $this->source, ($context["form"] ?? null), "filters", [], "any", false, false, true, 24), 24, $this->source), "html", null, true);
        yield "

<table class=\"responsive-enabled\">
  <thead>
    <tr>
      <th>";
        // line 29
        yield $this->extensions['Drupal\Core\Template\TwigExtension']->renderVar(t("Uninstall"));
        yield "</th>
      <th>";
        // line 30
        yield $this->extensions['Drupal\Core\Template\TwigExtension']->renderVar(t("Name"));
        yield "</th>
      <th>";
        // line 31
        yield $this->extensions['Drupal\Core\Template\TwigExtension']->renderVar(t("Description"));
        yield "</th>
    </tr>
  </thead>
  <tbody>
    ";
        // line 35
        $context['_parent'] = $context;
        $context['_seq'] = CoreExtension::ensureTraversable(($context["modules"] ?? null));
        $context['_iterated'] = false;
        $context['loop'] = [
          'parent' => $context['_parent'],
          'index0' => 0,
          'index'  => 1,
          'first'  => true,
        ];
        if (is_array($context['_seq']) || (is_object($context['_seq']) && $context['_seq'] instanceof \Countable)) {
            $length = count($context['_seq']);
            $context['loop']['revindex0'] = $length - 1;
            $context['loop']['revindex'] = $length;
            $context['loop']['length'] = $length;
            $context['loop']['last'] = 1 === $length;
        }
        foreach ($context['_seq'] as $context["_key"] => $context["module"]) {
            // line 36
            yield "      ";
            $context["zebra"] = Twig\Extension\CoreExtension::cycle(["odd", "even"], $this->sandbox->ensureToStringAllowed(CoreExtension::getAttribute($this->env, $this->source, $context["loop"], "index0", [], "any", false, false, true, 36), 36, $this->source));
            // line 37
            yield "<tr";
            yield $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, $context["module"], "attributes", [], "any", false, false, true, 37), "addClass", [($context["zebra"] ?? null)], "method", false, false, true, 37), 37, $this->source), "html", null, true);
            yield ">
        <td align=\"center\">";
            // line 39
            yield $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(CoreExtension::getAttribute($this->env, $this->source, $context["module"], "checkbox", [], "any", false, false, true, 39), 39, $this->source), "html", null, true);
            // line 40
            yield "</td>
        <td>
          <label for=\"";
            // line 42
            yield $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(CoreExtension::getAttribute($this->env, $this->source, $context["module"], "checkbox_id", [], "any", false, false, true, 42), 42, $this->source), "html", null, true);
            yield "\" class=\"module-name table-filter-text-source\">";
            yield $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(CoreExtension::getAttribute($this->env, $this->source, $context["module"], "name", [], "any", false, false, true, 42), 42, $this->source), "html", null, true);
            yield "</label>
        </td>
        <td class=\"description\">
          <span class=\"text module-description\">";
            // line 45
            yield $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(CoreExtension::getAttribute($this->env, $this->source, $context["module"], "description", [], "any", false, false, true, 45), 45, $this->source), "html", null, true);
            yield "</span>
          ";
            // line 46
            if ((CoreExtension::getAttribute($this->env, $this->source, $context["module"], "reasons_count", [], "any", false, false, true, 46) > 0)) {
                // line 47
                yield "            <div class=\"admin-requirements\">";
                // line 48
                yield \Drupal::translation()->formatPlural(abs(CoreExtension::getAttribute($this->env, $this->source,                 // line 50
$context["module"], "reasons_count", [], "any", false, false, true, 50)), "The following reason prevents @module.module_name from being uninstalled:", "The following reasons prevent @module.module_name from being uninstalled:", array("@module.module_name" => CoreExtension::getAttribute($this->env, $this->source,                 // line 49
$context["module"], "module_name", [], "any", false, false, true, 49), "@module.module_name" => CoreExtension::getAttribute($this->env, $this->source,                 // line 51
$context["module"], "module_name", [], "any", false, false, true, 51), ));
                // line 53
                yield "              <div class=\"item-list\">
                <ul>";
                // line 55
                $context['_parent'] = $context;
                $context['_seq'] = CoreExtension::ensureTraversable(CoreExtension::getAttribute($this->env, $this->source, $context["module"], "validation_reasons", [], "any", false, false, true, 55));
                foreach ($context['_seq'] as $context["_key"] => $context["reason"]) {
                    // line 56
                    yield "<li>";
                    yield $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed($context["reason"], 56, $this->source), "html", null, true);
                    yield "</li>";
                }
                $_parent = $context['_parent'];
                unset($context['_seq'], $context['_iterated'], $context['_key'], $context['reason'], $context['_parent'], $context['loop']);
                $context = array_intersect_key($context, $_parent) + $_parent;
                // line 58
                if (CoreExtension::getAttribute($this->env, $this->source, $context["module"], "required_by", [], "any", false, false, true, 58)) {
                    // line 59
                    yield "<li>";
                    yield $this->extensions['Drupal\Core\Template\TwigExtension']->renderVar(t("Required by: @module-list", ["@module-list" => $this->extensions['Drupal\Core\Template\TwigExtension']->safeJoin($this->env, $this->sandbox->ensureToStringAllowed(CoreExtension::getAttribute($this->env, $this->source, $context["module"], "required_by", [], "any", false, false, true, 59), 59, $this->source), ", ")]));
                    yield "</li>";
                }
                // line 61
                yield "</ul>
              </div>
            </div>
          ";
            }
            // line 65
            yield "        </td>
      </tr>
    ";
            $context['_iterated'] = true;
            ++$context['loop']['index0'];
            ++$context['loop']['index'];
            $context['loop']['first'] = false;
            if (isset($context['loop']['length'])) {
                --$context['loop']['revindex0'];
                --$context['loop']['revindex'];
                $context['loop']['last'] = 0 === $context['loop']['revindex0'];
            }
        }
        if (!$context['_iterated']) {
            // line 68
            yield "      <tr class=\"odd\">
        <td colspan=\"3\" class=\"empty message\">";
            // line 69
            yield $this->extensions['Drupal\Core\Template\TwigExtension']->renderVar(t("No modules are available to uninstall."));
            yield "</td>
      </tr>
    ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['module'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 72
        yield "  </tbody>
</table>

";
        // line 75
        yield $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->extensions['Drupal\Core\Template\TwigExtension']->withoutFilter($this->sandbox->ensureToStringAllowed(($context["form"] ?? null), 75, $this->source), "filters", "modules", "uninstall"), "html", null, true);
        yield "
";
        $this->env->getExtension('\Drupal\Core\Template\TwigExtension')
            ->checkDeprecations($context, ["form", "modules", "loop"]);        return; yield '';
    }

    /**
     * @codeCoverageIgnore
     */
    public function getTemplateName()
    {
        return "core/modules/system/templates/system-modules-uninstall.html.twig";
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
        return array (  176 => 75,  171 => 72,  162 => 69,  159 => 68,  144 => 65,  138 => 61,  133 => 59,  131 => 58,  123 => 56,  119 => 55,  116 => 53,  114 => 51,  113 => 49,  112 => 50,  111 => 48,  109 => 47,  107 => 46,  103 => 45,  95 => 42,  91 => 40,  89 => 39,  84 => 37,  81 => 36,  63 => 35,  56 => 31,  52 => 30,  48 => 29,  40 => 24,);
    }

    public function getSourceContext()
    {
        return new Source("", "core/modules/system/templates/system-modules-uninstall.html.twig", "/var/www/html/pngbaptist/core/modules/system/templates/system-modules-uninstall.html.twig");
    }
    
    public function checkSecurity()
    {
        static $tags = array("for" => 35, "set" => 36, "if" => 46, "trans" => 48);
        static $filters = array("escape" => 24, "t" => 29, "safe_join" => 59, "without" => 75);
        static $functions = array("cycle" => 36);

        try {
            $this->sandbox->checkSecurity(
                ['for', 'set', 'if', 'trans'],
                ['escape', 't', 'safe_join', 'without'],
                ['cycle'],
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
