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

/* themes/openchurch_theme/templates/content/node--event--50_50.html.twig */
class __TwigTemplate_e49302ecb475a21113d9dafbb48c8587 extends Template
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
        // line 70
        yield "<div class=\"row mb-5\">
  <div class=\"col-sm-4\">
    <div class=\"bg-light mb-4 p-3\">
      <h5 class=\"pb-2\">";
        // line 73
        yield $this->extensions['Drupal\Core\Template\TwigExtension']->renderVar(t("Event Details"));
        yield "</h5>
      ";
        // line 74
        if (($context["date"] ?? null)) {
            // line 75
            yield "        <div class=\"mb-3\">
          <i class=\"bi bi-calendar-date\"></i> ";
            // line 76
            yield $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(($context["date"] ?? null), 76, $this->source), "html", null, true);
            yield "
        </div>
      ";
        }
        // line 79
        yield "      ";
        if (($context["time"] ?? null)) {
            // line 80
            yield "        <div class=\"mb-3\">
          <i class=\"bi bi-clock\"></i> ";
            // line 81
            yield $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(($context["time"] ?? null), 81, $this->source), "html", null, true);
            yield "
        </div>
      ";
        }
        // line 84
        yield "      ";
        if (($context["location"] ?? null)) {
            // line 85
            yield "        <div class=\"mb-3\">
          <i class=\"bi bi-geo-alt-fill\"></i> ";
            // line 86
            yield $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(($context["location"] ?? null), 86, $this->source), "html", null, true);
            yield "
        </div>
      ";
        }
        // line 89
        yield "    </div>
  </div>
  <div class=\"col-sm-8\">
    ";
        // line 92
        yield $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(($context["title_prefix"] ?? null), 92, $this->source), "html", null, true);
        yield "
    <h3>";
        // line 93
        yield $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(($context["label"] ?? null), 93, $this->source), "html", null, true);
        yield "</h3>
    ";
        // line 94
        yield $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(($context["title_suffix"] ?? null), 94, $this->source), "html", null, true);
        yield "
    <div class=\"mt-3 mb-3\">
      ";
        // line 96
        if (CoreExtension::getAttribute($this->env, $this->source, ($context["content"] ?? null), "body", [], "any", false, false, true, 96)) {
            // line 97
            yield "        ";
            yield $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(CoreExtension::getAttribute($this->env, $this->source, ($context["content"] ?? null), "body", [], "any", false, false, true, 97), 97, $this->source), "html", null, true);
            yield "
      ";
        }
        // line 99
        yield "    </div>
    <div class=\"d-grid gap-2 d-md-flex justify-content-md-start\">
      ";
        // line 101
        if (($context["url"] ?? null)) {
            // line 102
            yield "        <a href=\"";
            yield $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(($context["url"] ?? null), 102, $this->source), "html", null, true);
            yield "\" class=\"btn btn-primary\">";
            yield $this->extensions['Drupal\Core\Template\TwigExtension']->renderVar(t("Event Details"));
            yield " <i class=\"bi bi-arrow-right\"></i></a>
      ";
        }
        // line 104
        yield "    </div>
  </div>
</div>";
        $this->env->getExtension('\Drupal\Core\Template\TwigExtension')
            ->checkDeprecations($context, ["date", "time", "location", "title_prefix", "label", "title_suffix", "content", "url"]);        return; yield '';
    }

    /**
     * @codeCoverageIgnore
     */
    public function getTemplateName()
    {
        return "themes/openchurch_theme/templates/content/node--event--50_50.html.twig";
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
        return array (  124 => 104,  116 => 102,  114 => 101,  110 => 99,  104 => 97,  102 => 96,  97 => 94,  93 => 93,  89 => 92,  84 => 89,  78 => 86,  75 => 85,  72 => 84,  66 => 81,  63 => 80,  60 => 79,  54 => 76,  51 => 75,  49 => 74,  45 => 73,  40 => 70,);
    }

    public function getSourceContext()
    {
        return new Source("", "themes/openchurch_theme/templates/content/node--event--50_50.html.twig", "/var/www/html/pngbaptist/themes/openchurch_theme/templates/content/node--event--50_50.html.twig");
    }
    
    public function checkSecurity()
    {
        static $tags = array("if" => 74);
        static $filters = array("t" => 73, "escape" => 76);
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
