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

/* core/themes/stable9/templates/admin/system-modules-details.html.twig */
class __TwigTemplate_6e2a9ac022b6306a367b123953b9f5e6 extends Template
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
        // line 25
        yield "<table class=\"responsive-enabled\">
  <thead>
    <tr>
      <th class=\"checkbox visually-hidden\">";
        // line 28
        yield $this->extensions['Drupal\Core\Template\TwigExtension']->renderVar(t("Installed"));
        yield "</th>
      <th class=\"name visually-hidden\">";
        // line 29
        yield $this->extensions['Drupal\Core\Template\TwigExtension']->renderVar(t("Name"));
        yield "</th>
      <th class=\"description visually-hidden priority-low\">";
        // line 30
        yield $this->extensions['Drupal\Core\Template\TwigExtension']->renderVar(t("Description"));
        yield "</th>
    </tr>
  </thead>
  <tbody>
    ";
        // line 34
        $context['_parent'] = $context;
        $context['_seq'] = CoreExtension::ensureTraversable(($context["modules"] ?? null));
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
            // line 35
            yield "      ";
            $context["zebra"] = Twig\Extension\CoreExtension::cycle(["odd", "even"], $this->sandbox->ensureToStringAllowed(CoreExtension::getAttribute($this->env, $this->source, $context["loop"], "index0", [], "any", false, false, true, 35), 35, $this->source));
            // line 36
            yield "      <tr";
            yield $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, $context["module"], "attributes", [], "any", false, false, true, 36), "addClass", [($context["zebra"] ?? null)], "method", false, false, true, 36), 36, $this->source), "html", null, true);
            yield ">
        <td class=\"checkbox\">
          ";
            // line 38
            yield $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(CoreExtension::getAttribute($this->env, $this->source, $context["module"], "checkbox", [], "any", false, false, true, 38), 38, $this->source), "html", null, true);
            yield "
        </td>
        <td class=\"module\">
          <label id=\"";
            // line 41
            yield $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(CoreExtension::getAttribute($this->env, $this->source, $context["module"], "id", [], "any", false, false, true, 41), 41, $this->source), "html", null, true);
            yield "\" for=\"";
            yield $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(CoreExtension::getAttribute($this->env, $this->source, $context["module"], "enable_id", [], "any", false, false, true, 41), 41, $this->source), "html", null, true);
            yield "\" class=\"module-name table-filter-text-source\">";
            yield $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(CoreExtension::getAttribute($this->env, $this->source, $context["module"], "name", [], "any", false, false, true, 41), 41, $this->source), "html", null, true);
            yield "</label>
        </td>
        <td class=\"description expand priority-low\">
          <details class=\"js-form-wrapper form-wrapper\" id=\"";
            // line 44
            yield $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(CoreExtension::getAttribute($this->env, $this->source, $context["module"], "enable_id", [], "any", false, false, true, 44), 44, $this->source), "html", null, true);
            yield "-description\">
            <summary aria-controls=\"";
            // line 45
            yield $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(CoreExtension::getAttribute($this->env, $this->source, $context["module"], "enable_id", [], "any", false, false, true, 45), 45, $this->source), "html", null, true);
            yield "-description\" role=\"button\" aria-expanded=\"false\"><span class=\"text module-description\">";
            yield $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(CoreExtension::getAttribute($this->env, $this->source, $context["module"], "description", [], "any", false, false, true, 45), 45, $this->source), "html", null, true);
            yield "</span></summary>
            <div class=\"details-wrapper\">
              <div class=\"details-description\">
                <div class=\"requirements\">
                  <div class=\"admin-requirements\">";
            // line 49
            yield $this->extensions['Drupal\Core\Template\TwigExtension']->renderVar(t("Machine name: <span dir=\"ltr\" class=\"table-filter-text-source\">@machine-name</span>", ["@machine-name" => CoreExtension::getAttribute($this->env, $this->source, $context["module"], "machine_name", [], "any", false, false, true, 49)]));
            yield "</div>
                  ";
            // line 50
            if (CoreExtension::getAttribute($this->env, $this->source, $context["module"], "version", [], "any", false, false, true, 50)) {
                // line 51
                yield "                    <div class=\"admin-requirements\">";
                yield $this->extensions['Drupal\Core\Template\TwigExtension']->renderVar(t("Version: @module-version", ["@module-version" => CoreExtension::getAttribute($this->env, $this->source, $context["module"], "version", [], "any", false, false, true, 51)]));
                yield "</div>
                  ";
            }
            // line 53
            yield "                  ";
            if (CoreExtension::getAttribute($this->env, $this->source, $context["module"], "requires", [], "any", false, false, true, 53)) {
                // line 54
                yield "                    <div class=\"admin-requirements\">";
                yield $this->extensions['Drupal\Core\Template\TwigExtension']->renderVar(t("Requires: @module-list", ["@module-list" => CoreExtension::getAttribute($this->env, $this->source, $context["module"], "requires", [], "any", false, false, true, 54)]));
                yield "</div>
                  ";
            }
            // line 56
            yield "                  ";
            if (CoreExtension::getAttribute($this->env, $this->source, $context["module"], "required_by", [], "any", false, false, true, 56)) {
                // line 57
                yield "                    <div class=\"admin-requirements\">";
                yield $this->extensions['Drupal\Core\Template\TwigExtension']->renderVar(t("Required by: @module-list", ["@module-list" => CoreExtension::getAttribute($this->env, $this->source, $context["module"], "required_by", [], "any", false, false, true, 57)]));
                yield "</div>
                  ";
            }
            // line 59
            yield "                </div>
                ";
            // line 60
            if (CoreExtension::getAttribute($this->env, $this->source, $context["module"], "links", [], "any", false, false, true, 60)) {
                // line 61
                yield "                  <div class=\"links\">
                    ";
                // line 62
                $context['_parent'] = $context;
                $context['_seq'] = CoreExtension::ensureTraversable(["help", "permissions", "configure"]);
                foreach ($context['_seq'] as $context["_key"] => $context["link_type"]) {
                    // line 63
                    yield "                      ";
                    yield $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed((($__internal_compile_0 = CoreExtension::getAttribute($this->env, $this->source, $context["module"], "links", [], "any", false, false, true, 63)) && is_array($__internal_compile_0) || $__internal_compile_0 instanceof ArrayAccess ? ($__internal_compile_0[$context["link_type"]] ?? null) : null), 63, $this->source), "html", null, true);
                    yield "
                    ";
                }
                $_parent = $context['_parent'];
                unset($context['_seq'], $context['_iterated'], $context['_key'], $context['link_type'], $context['_parent'], $context['loop']);
                $context = array_intersect_key($context, $_parent) + $_parent;
                // line 65
                yield "                  </div>
                ";
            }
            // line 67
            yield "              </div>
            </div>
          </details>
        </td>
      </tr>
    ";
            ++$context['loop']['index0'];
            ++$context['loop']['index'];
            $context['loop']['first'] = false;
            if (isset($context['loop']['length'])) {
                --$context['loop']['revindex0'];
                --$context['loop']['revindex'];
                $context['loop']['last'] = 0 === $context['loop']['revindex0'];
            }
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['module'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 73
        yield "  </tbody>
</table>
";
        $this->env->getExtension('\Drupal\Core\Template\TwigExtension')
            ->checkDeprecations($context, ["modules", "loop"]);        return; yield '';
    }

    /**
     * @codeCoverageIgnore
     */
    public function getTemplateName()
    {
        return "core/themes/stable9/templates/admin/system-modules-details.html.twig";
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
        return array (  189 => 73,  170 => 67,  166 => 65,  157 => 63,  153 => 62,  150 => 61,  148 => 60,  145 => 59,  139 => 57,  136 => 56,  130 => 54,  127 => 53,  121 => 51,  119 => 50,  115 => 49,  106 => 45,  102 => 44,  92 => 41,  86 => 38,  80 => 36,  77 => 35,  60 => 34,  53 => 30,  49 => 29,  45 => 28,  40 => 25,);
    }

    public function getSourceContext()
    {
        return new Source("", "core/themes/stable9/templates/admin/system-modules-details.html.twig", "/var/www/html/pngbaptist/core/themes/stable9/templates/admin/system-modules-details.html.twig");
    }
    
    public function checkSecurity()
    {
        static $tags = array("for" => 34, "set" => 35, "if" => 50);
        static $filters = array("t" => 28, "escape" => 36);
        static $functions = array("cycle" => 35);

        try {
            $this->sandbox->checkSecurity(
                ['for', 'set', 'if'],
                ['t', 'escape'],
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
