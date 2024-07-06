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

/* core/modules/update/templates/update-project-status.html.twig */
class __TwigTemplate_9e74921c7a90c753ee9d2da85fe8ed11 extends Template
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
        $context["status_classes"] = [(((CoreExtension::getAttribute($this->env, $this->source,         // line 32
($context["project"] ?? null), "status", [], "any", false, false, true, 32) == Twig\Extension\CoreExtension::constant("Drupal\\update\\UpdateManagerInterface::NOT_SECURE"))) ? ("project-update__status--security-error") : ("")), (((CoreExtension::getAttribute($this->env, $this->source,         // line 33
($context["project"] ?? null), "status", [], "any", false, false, true, 33) == Twig\Extension\CoreExtension::constant("Drupal\\update\\UpdateManagerInterface::REVOKED"))) ? ("project-update__status--revoked") : ("")), (((CoreExtension::getAttribute($this->env, $this->source,         // line 34
($context["project"] ?? null), "status", [], "any", false, false, true, 34) == Twig\Extension\CoreExtension::constant("Drupal\\update\\UpdateManagerInterface::NOT_SUPPORTED"))) ? ("project-update__status--not-supported") : ("")), (((CoreExtension::getAttribute($this->env, $this->source,         // line 35
($context["project"] ?? null), "status", [], "any", false, false, true, 35) == Twig\Extension\CoreExtension::constant("Drupal\\update\\UpdateManagerInterface::NOT_CURRENT"))) ? ("project-update__status--not-current") : ("")), (((CoreExtension::getAttribute($this->env, $this->source,         // line 36
($context["project"] ?? null), "status", [], "any", false, false, true, 36) == Twig\Extension\CoreExtension::constant("Drupal\\update\\UpdateManagerInterface::CURRENT"))) ? ("project-update__status--current") : (""))];
        // line 39
        yield "<div";
        yield $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, ($context["status"] ?? null), "attributes", [], "any", false, false, true, 39), "addClass", ["project-update__status", ($context["status_classes"] ?? null)], "method", false, false, true, 39), 39, $this->source), "html", null, true);
        yield ">";
        // line 40
        if (CoreExtension::getAttribute($this->env, $this->source, ($context["status"] ?? null), "label", [], "any", false, false, true, 40)) {
            // line 41
            yield "<span>";
            yield $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(CoreExtension::getAttribute($this->env, $this->source, ($context["status"] ?? null), "label", [], "any", false, false, true, 41), 41, $this->source), "html", null, true);
            yield "</span>";
        } else {
            // line 43
            yield $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(CoreExtension::getAttribute($this->env, $this->source, ($context["status"] ?? null), "reason", [], "any", false, false, true, 43), 43, $this->source), "html", null, true);
        }
        // line 45
        yield "  <span class=\"project-update__status-icon\">
    ";
        // line 46
        yield $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(CoreExtension::getAttribute($this->env, $this->source, ($context["status"] ?? null), "icon", [], "any", false, false, true, 46), 46, $this->source), "html", null, true);
        yield "
  </span>
</div>

<div class=\"project-update__title\">";
        // line 51
        if (($context["url"] ?? null)) {
            // line 52
            yield "<a href=\"";
            yield $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(($context["url"] ?? null), 52, $this->source), "html", null, true);
            yield "\">";
            yield $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(($context["title"] ?? null), 52, $this->source), "html", null, true);
            yield "</a>";
        } else {
            // line 54
            yield $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(($context["title"] ?? null), 54, $this->source), "html", null, true);
        }
        // line 56
        yield "  ";
        yield $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(($context["existing_version"] ?? null), 56, $this->source), "html", null, true);
        yield "
  ";
        // line 57
        if (((($context["install_type"] ?? null) == "dev") && ($context["datestamp"] ?? null))) {
            // line 58
            yield "    <span class=\"project-update__version-date\">(";
            yield $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(($context["datestamp"] ?? null), 58, $this->source), "html", null, true);
            yield ")</span>
  ";
        }
        // line 60
        yield "</div>

";
        // line 62
        if (($context["versions"] ?? null)) {
            // line 63
            yield "  ";
            $context['_parent'] = $context;
            $context['_seq'] = CoreExtension::ensureTraversable(($context["versions"] ?? null));
            foreach ($context['_seq'] as $context["_key"] => $context["version"]) {
                // line 64
                yield "    ";
                yield $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed($context["version"], 64, $this->source), "html", null, true);
                yield "
  ";
            }
            $_parent = $context['_parent'];
            unset($context['_seq'], $context['_iterated'], $context['_key'], $context['version'], $context['_parent'], $context['loop']);
            $context = array_intersect_key($context, $_parent) + $_parent;
        }
        // line 67
        yield "
";
        // line 69
        $context["extra_classes"] = [(((CoreExtension::getAttribute($this->env, $this->source,         // line 70
($context["project"] ?? null), "status", [], "any", false, false, true, 70) == Twig\Extension\CoreExtension::constant("Drupal\\update\\UpdateManagerInterface::NOT_SECURE"))) ? ("project-not-secure") : ("")), (((CoreExtension::getAttribute($this->env, $this->source,         // line 71
($context["project"] ?? null), "status", [], "any", false, false, true, 71) == Twig\Extension\CoreExtension::constant("Drupal\\update\\UpdateManagerInterface::REVOKED"))) ? ("project-revoked") : ("")), (((CoreExtension::getAttribute($this->env, $this->source,         // line 72
($context["project"] ?? null), "status", [], "any", false, false, true, 72) == Twig\Extension\CoreExtension::constant("Drupal\\update\\UpdateManagerInterface::NOT_SUPPORTED"))) ? ("project-not-supported") : (""))];
        // line 75
        yield "<div class=\"project-updates__details\">
  ";
        // line 76
        if (($context["extras"] ?? null)) {
            // line 77
            yield "    <div class=\"extra\">
      ";
            // line 78
            $context['_parent'] = $context;
            $context['_seq'] = CoreExtension::ensureTraversable(($context["extras"] ?? null));
            foreach ($context['_seq'] as $context["_key"] => $context["extra"]) {
                // line 79
                yield "        <div";
                yield $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, $context["extra"], "attributes", [], "any", false, false, true, 79), "addClass", [($context["extra_classes"] ?? null)], "method", false, false, true, 79), 79, $this->source), "html", null, true);
                yield ">
          ";
                // line 80
                yield $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(CoreExtension::getAttribute($this->env, $this->source, $context["extra"], "label", [], "any", false, false, true, 80), 80, $this->source), "html", null, true);
                yield ": ";
                yield $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(CoreExtension::getAttribute($this->env, $this->source, $context["extra"], "data", [], "any", false, false, true, 80), 80, $this->source), "html", null, true);
                yield "
        </div>
      ";
            }
            $_parent = $context['_parent'];
            unset($context['_seq'], $context['_iterated'], $context['_key'], $context['extra'], $context['_parent'], $context['loop']);
            $context = array_intersect_key($context, $_parent) + $_parent;
            // line 83
            yield "    </div>
  ";
        }
        // line 85
        yield "  ";
        $context["includes"] = Twig\Extension\CoreExtension::join($this->sandbox->ensureToStringAllowed(($context["includes"] ?? null), 85, $this->source), ", ");
        // line 86
        yield "  ";
        if (($context["disabled"] ?? null)) {
            // line 87
            yield "    ";
            yield $this->extensions['Drupal\Core\Template\TwigExtension']->renderVar(t("Includes:"));
            yield "
    <ul>
      <li>
        ";
            // line 90
            yield t("Enabled: %includes", array("%includes" =>             // line 91
($context["includes"] ?? null), ));
            // line 93
            yield "      </li>
      <li>
        ";
            // line 95
            $context["disabled"] = Twig\Extension\CoreExtension::join($this->sandbox->ensureToStringAllowed(($context["disabled"] ?? null), 95, $this->source), ", ");
            // line 96
            yield "        ";
            yield t("Disabled: %disabled", array("%disabled" =>             // line 97
($context["disabled"] ?? null), ));
            // line 99
            yield "      </li>
    </ul>
  ";
        } else {
            // line 102
            yield "    ";
            yield t("Includes: %includes", array("%includes" =>             // line 103
($context["includes"] ?? null), ));
            // line 105
            yield "  ";
        }
        // line 106
        yield "</div>
";
        $this->env->getExtension('\Drupal\Core\Template\TwigExtension')
            ->checkDeprecations($context, ["project", "status", "url", "title", "existing_version", "install_type", "datestamp", "versions", "extras", "disabled"]);        return; yield '';
    }

    /**
     * @codeCoverageIgnore
     */
    public function getTemplateName()
    {
        return "core/modules/update/templates/update-project-status.html.twig";
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
        return array (  195 => 106,  192 => 105,  190 => 103,  188 => 102,  183 => 99,  181 => 97,  179 => 96,  177 => 95,  173 => 93,  171 => 91,  170 => 90,  163 => 87,  160 => 86,  157 => 85,  153 => 83,  142 => 80,  137 => 79,  133 => 78,  130 => 77,  128 => 76,  125 => 75,  123 => 72,  122 => 71,  121 => 70,  120 => 69,  117 => 67,  107 => 64,  102 => 63,  100 => 62,  96 => 60,  90 => 58,  88 => 57,  83 => 56,  80 => 54,  73 => 52,  71 => 51,  64 => 46,  61 => 45,  58 => 43,  53 => 41,  51 => 40,  47 => 39,  45 => 36,  44 => 35,  43 => 34,  42 => 33,  41 => 32,  40 => 31,);
    }

    public function getSourceContext()
    {
        return new Source("", "core/modules/update/templates/update-project-status.html.twig", "/var/www/html/pngbaptist/core/modules/update/templates/update-project-status.html.twig");
    }
    
    public function checkSecurity()
    {
        static $tags = array("set" => 31, "if" => 40, "for" => 63, "trans" => 90);
        static $filters = array("escape" => 39, "join" => 85, "t" => 87, "placeholder" => 91);
        static $functions = array("constant" => 32);

        try {
            $this->sandbox->checkSecurity(
                ['set', 'if', 'for', 'trans'],
                ['escape', 'join', 't', 'placeholder'],
                ['constant'],
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
