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

/* modules/openchurch_core/templates/openchurch-core-event-details.html.twig */
class __TwigTemplate_6a627f7b6ac38d40b30d655782a0a003 extends Template
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
        // line 1
        yield "<h4 class=\"pb-2\">";
        yield $this->extensions['Drupal\Core\Template\TwigExtension']->renderVar(t("Event Details"));
        yield "</h4>
";
        // line 2
        if (($context["date"] ?? null)) {
            // line 3
            yield "  <div class=\"mb-3\">
    <i class=\"bi bi-calendar-date\"></i> ";
            // line 4
            yield $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(($context["date"] ?? null), 4, $this->source), "html", null, true);
            yield "
  </div>
";
        }
        // line 7
        if (($context["time"] ?? null)) {
            // line 8
            yield "  <div class=\"mb-3\">
    <i class=\"bi bi-clock\"></i> ";
            // line 9
            yield $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(($context["time"] ?? null), 9, $this->source), "html", null, true);
            yield "
  </div>
";
        }
        // line 12
        if (($context["location"] ?? null)) {
            // line 13
            yield "  <div class=\"mb-3\">
    <i class=\"bi bi-geo-alt-fill\"></i> ";
            // line 14
            yield $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(($context["location"] ?? null), 14, $this->source), "html", null, true);
            yield "
  </div>
";
        }
        // line 17
        if (($context["link"] ?? null)) {
            // line 18
            yield "  <div class=\"pt-2\">
    <a href=\"";
            // line 19
            yield $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(($context["link"] ?? null), 19, $this->source), "html", null, true);
            yield "\" class=\"btn btn-primary\">";
            yield $this->extensions['Drupal\Core\Template\TwigExtension']->renderVar(t("Event Details"));
            yield " <i class=\"bi bi-arrow-right\"></i></a>
  </div>
";
        }
        $this->env->getExtension('\Drupal\Core\Template\TwigExtension')
            ->checkDeprecations($context, ["date", "time", "location", "link"]);        return; yield '';
    }

    /**
     * @codeCoverageIgnore
     */
    public function getTemplateName()
    {
        return "modules/openchurch_core/templates/openchurch-core-event-details.html.twig";
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
        return array (  83 => 19,  80 => 18,  78 => 17,  72 => 14,  69 => 13,  67 => 12,  61 => 9,  58 => 8,  56 => 7,  50 => 4,  47 => 3,  45 => 2,  40 => 1,);
    }

    public function getSourceContext()
    {
        return new Source("", "modules/openchurch_core/templates/openchurch-core-event-details.html.twig", "/var/www/html/pngbaptist/modules/openchurch_core/templates/openchurch-core-event-details.html.twig");
    }
    
    public function checkSecurity()
    {
        static $tags = array("if" => 2);
        static $filters = array("t" => 1, "escape" => 4);
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
