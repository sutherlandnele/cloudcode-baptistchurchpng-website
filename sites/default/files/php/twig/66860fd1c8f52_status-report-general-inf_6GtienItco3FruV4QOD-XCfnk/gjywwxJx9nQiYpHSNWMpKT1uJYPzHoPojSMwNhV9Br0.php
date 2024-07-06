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

/* core/themes/claro/templates/status-report-general-info.html.twig */
class __TwigTemplate_03ed756c722f03152528aff172cc2f62 extends Template
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
        // line 32
        yield "<div class=\"system-status-general-info\">
  <h2 class=\"system-status-general-info__header\">";
        // line 33
        yield $this->extensions['Drupal\Core\Template\TwigExtension']->renderVar(t("General System Information"));
        yield "</h2>
  <div class=\"system-status-general-info__items\">
    <div class=\"system-status-general-info__item card\">
      <span class=\"system-status-general-info__item-icon system-status-general-info__item-icon--drupal\"></span>
      <div class=\"system-status-general-info__item-details\">
        <h3 class=\"system-status-general-info__item-title\">";
        // line 38
        yield $this->extensions['Drupal\Core\Template\TwigExtension']->renderVar(t("Drupal Version"));
        yield "</h3>
        ";
        // line 39
        yield $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(CoreExtension::getAttribute($this->env, $this->source, ($context["drupal"] ?? null), "value", [], "any", false, false, true, 39), 39, $this->source), "html", null, true);
        yield "
        ";
        // line 40
        if (CoreExtension::getAttribute($this->env, $this->source, ($context["drupal"] ?? null), "description", [], "any", false, false, true, 40)) {
            // line 41
            yield "          <div class=\"description\">";
            yield $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(CoreExtension::getAttribute($this->env, $this->source, ($context["drupal"] ?? null), "description", [], "any", false, false, true, 41), 41, $this->source), "html", null, true);
            yield "</div>
        ";
        }
        // line 43
        yield "      </div>
    </div>

    <div class=\"system-status-general-info__item card\">
      <span class=\"system-status-general-info__item-icon system-status-general-info__item-icon--server\"></span>
      <div class=\"system-status-general-info__item-details\">
        <h3 class=\"system-status-general-info__item-title\">";
        // line 49
        yield $this->extensions['Drupal\Core\Template\TwigExtension']->renderVar(t("Web Server"));
        yield "</h3>
        ";
        // line 50
        yield $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(CoreExtension::getAttribute($this->env, $this->source, ($context["webserver"] ?? null), "value", [], "any", false, false, true, 50), 50, $this->source), "html", null, true);
        yield "
        ";
        // line 51
        if (CoreExtension::getAttribute($this->env, $this->source, ($context["webserver"] ?? null), "description", [], "any", false, false, true, 51)) {
            // line 52
            yield "          <div class=\"description\">";
            yield $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(CoreExtension::getAttribute($this->env, $this->source, ($context["webserver"] ?? null), "description", [], "any", false, false, true, 52), 52, $this->source), "html", null, true);
            yield "</div>
        ";
        }
        // line 54
        yield "      </div>
    </div>
    <div class=\"system-status-general-info__item card\">
      <span class=\"system-status-general-info__item-icon system-status-general-info__item-icon--clock\"></span>
      <div class=\"system-status-general-info__item-details\">
        <h3 class=\"system-status-general-info__item-title\">";
        // line 59
        yield $this->extensions['Drupal\Core\Template\TwigExtension']->renderVar(t("Last Cron Run"));
        yield "</h3>
        ";
        // line 60
        yield $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(CoreExtension::getAttribute($this->env, $this->source, ($context["cron"] ?? null), "value", [], "any", false, false, true, 60), 60, $this->source), "html", null, true);
        yield "
        ";
        // line 61
        if (CoreExtension::getAttribute($this->env, $this->source, ($context["cron"] ?? null), "run_cron", [], "any", false, false, true, 61)) {
            // line 62
            yield "          <div class=\"system-status-general-info__run-cron\">";
            yield $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(CoreExtension::getAttribute($this->env, $this->source, ($context["cron"] ?? null), "run_cron", [], "any", false, false, true, 62), 62, $this->source), "html", null, true);
            yield "</div>
        ";
        }
        // line 64
        yield "        ";
        if (CoreExtension::getAttribute($this->env, $this->source, ($context["cron"] ?? null), "description", [], "any", false, false, true, 64)) {
            // line 65
            yield "          <div class=\"system-status-general-info__description\">";
            yield $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(CoreExtension::getAttribute($this->env, $this->source, ($context["cron"] ?? null), "description", [], "any", false, false, true, 65), 65, $this->source), "html", null, true);
            yield "</div>
        ";
        }
        // line 67
        yield "      </div>
    </div>
    <div class=\"system-status-general-info__item card\">
      <span class=\"system-status-general-info__item-icon system-status-general-info__item-icon--php\"></span>
      <div class=\"system-status-general-info__item-details\">
        <h3 class=\"system-status-general-info__item-title\">";
        // line 72
        yield $this->extensions['Drupal\Core\Template\TwigExtension']->renderVar(t("PHP"));
        yield "</h3>
        <h4 class=\"system-status-general-info__sub-item-title\">";
        // line 73
        yield $this->extensions['Drupal\Core\Template\TwigExtension']->renderVar(t("Version"));
        yield "</h4>";
        yield $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(CoreExtension::getAttribute($this->env, $this->source, ($context["php"] ?? null), "value", [], "any", false, false, true, 73), 73, $this->source), "html", null, true);
        yield "
        ";
        // line 74
        if (CoreExtension::getAttribute($this->env, $this->source, ($context["php"] ?? null), "description", [], "any", false, false, true, 74)) {
            // line 75
            yield "          <div class=\"description\">";
            yield $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(CoreExtension::getAttribute($this->env, $this->source, ($context["php"] ?? null), "description", [], "any", false, false, true, 75), 75, $this->source), "html", null, true);
            yield "</div>
        ";
        }
        // line 77
        yield "
        <h4 class=\"system-status-general-info__sub-item-title\">";
        // line 78
        yield $this->extensions['Drupal\Core\Template\TwigExtension']->renderVar(t("Memory limit"));
        yield "</h4>";
        yield $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(CoreExtension::getAttribute($this->env, $this->source, ($context["php_memory_limit"] ?? null), "value", [], "any", false, false, true, 78), 78, $this->source), "html", null, true);
        yield "
        ";
        // line 79
        if (CoreExtension::getAttribute($this->env, $this->source, ($context["php_memory_limit"] ?? null), "description", [], "any", false, false, true, 79)) {
            // line 80
            yield "          <div class=\"description\">";
            yield $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(CoreExtension::getAttribute($this->env, $this->source, ($context["php_memory_limit"] ?? null), "description", [], "any", false, false, true, 80), 80, $this->source), "html", null, true);
            yield "</div>
        ";
        }
        // line 82
        yield "      </div>
    </div>
    <div class=\"system-status-general-info__item card\">
      <span class=\"system-status-general-info__item-icon system-status-general-info__item-icon--database\"></span>
      <div class=\"system-status-general-info__item-details\">
        <h3 class=\"system-status-general-info__item-title\">";
        // line 87
        yield $this->extensions['Drupal\Core\Template\TwigExtension']->renderVar(t("Database"));
        yield "</h3>
        <h4 class=\"system-status-general-info__sub-item-title\">";
        // line 88
        yield $this->extensions['Drupal\Core\Template\TwigExtension']->renderVar(t("Version"));
        yield "</h4>";
        yield $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(CoreExtension::getAttribute($this->env, $this->source, ($context["database_system_version"] ?? null), "value", [], "any", false, false, true, 88), 88, $this->source), "html", null, true);
        yield "
        ";
        // line 89
        if (CoreExtension::getAttribute($this->env, $this->source, ($context["database_system_version"] ?? null), "description", [], "any", false, false, true, 89)) {
            // line 90
            yield "          <div class=\"description\">";
            yield $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(CoreExtension::getAttribute($this->env, $this->source, ($context["database_system_version"] ?? null), "description", [], "any", false, false, true, 90), 90, $this->source), "html", null, true);
            yield "</div>
        ";
        }
        // line 92
        yield "
        <h4 class=\"system-status-general-info__sub-item-title\">";
        // line 93
        yield $this->extensions['Drupal\Core\Template\TwigExtension']->renderVar(t("System"));
        yield "</h4>";
        yield $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(CoreExtension::getAttribute($this->env, $this->source, ($context["database_system"] ?? null), "value", [], "any", false, false, true, 93), 93, $this->source), "html", null, true);
        yield "
        ";
        // line 94
        if (CoreExtension::getAttribute($this->env, $this->source, ($context["database_system"] ?? null), "description", [], "any", false, false, true, 94)) {
            // line 95
            yield "          <div class=\"description\">";
            yield $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(CoreExtension::getAttribute($this->env, $this->source, ($context["database_system"] ?? null), "description", [], "any", false, false, true, 95), 95, $this->source), "html", null, true);
            yield "</div>
        ";
        }
        // line 97
        yield "      </div>
    </div>
  </div>
</div>
";
        $this->env->getExtension('\Drupal\Core\Template\TwigExtension')
            ->checkDeprecations($context, ["drupal", "webserver", "cron", "php", "php_memory_limit", "database_system_version", "database_system"]);        return; yield '';
    }

    /**
     * @codeCoverageIgnore
     */
    public function getTemplateName()
    {
        return "core/themes/claro/templates/status-report-general-info.html.twig";
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
        return array (  207 => 97,  201 => 95,  199 => 94,  193 => 93,  190 => 92,  184 => 90,  182 => 89,  176 => 88,  172 => 87,  165 => 82,  159 => 80,  157 => 79,  151 => 78,  148 => 77,  142 => 75,  140 => 74,  134 => 73,  130 => 72,  123 => 67,  117 => 65,  114 => 64,  108 => 62,  106 => 61,  102 => 60,  98 => 59,  91 => 54,  85 => 52,  83 => 51,  79 => 50,  75 => 49,  67 => 43,  61 => 41,  59 => 40,  55 => 39,  51 => 38,  43 => 33,  40 => 32,);
    }

    public function getSourceContext()
    {
        return new Source("", "core/themes/claro/templates/status-report-general-info.html.twig", "/var/www/html/pngbaptist/core/themes/claro/templates/status-report-general-info.html.twig");
    }
    
    public function checkSecurity()
    {
        static $tags = array("if" => 40);
        static $filters = array("t" => 33, "escape" => 39);
        static $functions = array();

        try {
            $this->sandbox->checkSecurity(
                ['if'],
                ['t', 'escape'],
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
