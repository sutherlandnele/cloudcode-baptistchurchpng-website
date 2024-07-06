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

/* themes/openchurch_theme/templates/content/node--event--card.html.twig */
class __TwigTemplate_f4a9053af9e84409844f98ca7378b530 extends Template
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
        yield "
<div class=\"card text-center h-100\">
  <div class=\"card-body pb-0\">
    ";
        // line 73
        if (($context["date_short"] ?? null)) {
            // line 74
            yield "      <h5 class=\"card-subtitle pb-2 text-uppercase\">";
            yield $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(($context["date_short"] ?? null), 74, $this->source), "html", null, true);
            yield "</h5>
    ";
        }
        // line 76
        yield "    ";
        yield $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(($context["title_prefix"] ?? null), 76, $this->source), "html", null, true);
        yield "
    <h4 class=\"card-title\">";
        // line 77
        yield $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(($context["label"] ?? null), 77, $this->source), "html", null, true);
        yield "</h4>
    ";
        // line 78
        yield $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(($context["title_suffix"] ?? null), 78, $this->source), "html", null, true);
        yield "
    ";
        // line 79
        if (($context["time"] ?? null)) {
            // line 80
            yield "      <p class=\"fs-4 mb-0\">";
            yield $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(($context["time"] ?? null), 80, $this->source), "html", null, true);
            yield "</p>
    ";
        }
        // line 82
        yield "  </div>
  <div class=\"card-footer border-0 bg-white mb-2\">
    ";
        // line 84
        if (($context["url"] ?? null)) {
            // line 85
            yield "      <a href=\"";
            yield $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(($context["url"] ?? null), 85, $this->source), "html", null, true);
            yield "\" class=\"btn btn-primary\">";
            yield $this->extensions['Drupal\Core\Template\TwigExtension']->renderVar(t("Details"));
            yield " <i class=\"bi bi-arrow-right\"></i></a>
    ";
        }
        // line 87
        yield "  </div>
</div>
";
        $this->env->getExtension('\Drupal\Core\Template\TwigExtension')
            ->checkDeprecations($context, ["date_short", "title_prefix", "label", "title_suffix", "time", "url"]);        return; yield '';
    }

    /**
     * @codeCoverageIgnore
     */
    public function getTemplateName()
    {
        return "themes/openchurch_theme/templates/content/node--event--card.html.twig";
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
        return array (  88 => 87,  80 => 85,  78 => 84,  74 => 82,  68 => 80,  66 => 79,  62 => 78,  58 => 77,  53 => 76,  47 => 74,  45 => 73,  40 => 70,);
    }

    public function getSourceContext()
    {
        return new Source("", "themes/openchurch_theme/templates/content/node--event--card.html.twig", "/var/www/html/pngbaptist/themes/openchurch_theme/templates/content/node--event--card.html.twig");
    }
    
    public function checkSecurity()
    {
        static $tags = array("if" => 73);
        static $filters = array("escape" => 74, "t" => 85);
        static $functions = array();

        try {
            $this->sandbox->checkSecurity(
                ['if'],
                ['escape', 't'],
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
