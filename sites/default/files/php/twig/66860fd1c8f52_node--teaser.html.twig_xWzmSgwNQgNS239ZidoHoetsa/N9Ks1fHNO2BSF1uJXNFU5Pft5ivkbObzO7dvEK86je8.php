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

/* themes/openchurch_theme/templates/content/node--teaser.html.twig */
class __TwigTemplate_cccfa948cdf490d8fd6b4c4b31337c95 extends Template
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
  <div class=\"col-12 pb-3\">
    ";
        // line 72
        yield $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(($context["title_prefix"] ?? null), 72, $this->source), "html", null, true);
        yield "
    <h3>";
        // line 73
        yield $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(($context["label"] ?? null), 73, $this->source), "html", null, true);
        yield "</a></h3>
    ";
        // line 74
        yield $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(($context["title_suffix"] ?? null), 74, $this->source), "html", null, true);
        yield "
    <div class=\"mt-3 mb-3\">
      ";
        // line 76
        if (CoreExtension::getAttribute($this->env, $this->source, ($context["content"] ?? null), "body", [], "any", false, false, true, 76)) {
            // line 77
            yield "        ";
            yield $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(CoreExtension::getAttribute($this->env, $this->source, ($context["content"] ?? null), "body", [], "any", false, false, true, 77), 77, $this->source), "html", null, true);
            yield "
      ";
        }
        // line 79
        yield "    </div>
    <div class=\"d-grid gap-2 d-md-flex justify-content-md-start\">
      ";
        // line 81
        if (($context["url"] ?? null)) {
            // line 82
            yield "        <a href=\"";
            yield $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(($context["url"] ?? null), 82, $this->source), "html", null, true);
            yield "\" class=\"btn btn-primary\">";
            yield $this->extensions['Drupal\Core\Template\TwigExtension']->renderVar(t("Read More"));
            yield " <i class=\"bi bi-arrow-right\"></i></a>
      ";
        }
        // line 84
        yield "    </div>
  </div>
</div>";
        $this->env->getExtension('\Drupal\Core\Template\TwigExtension')
            ->checkDeprecations($context, ["title_prefix", "label", "title_suffix", "content", "url"]);        return; yield '';
    }

    /**
     * @codeCoverageIgnore
     */
    public function getTemplateName()
    {
        return "themes/openchurch_theme/templates/content/node--teaser.html.twig";
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
        return array (  79 => 84,  71 => 82,  69 => 81,  65 => 79,  59 => 77,  57 => 76,  52 => 74,  48 => 73,  44 => 72,  40 => 70,);
    }

    public function getSourceContext()
    {
        return new Source("", "themes/openchurch_theme/templates/content/node--teaser.html.twig", "/var/www/html/pngbaptist/themes/openchurch_theme/templates/content/node--teaser.html.twig");
    }
    
    public function checkSecurity()
    {
        static $tags = array("if" => 76);
        static $filters = array("escape" => 72, "t" => 82);
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
