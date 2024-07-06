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

/* themes/openchurch_theme/templates/content/node--article--50_50.html.twig */
class __TwigTemplate_d01abb8925d755664f3d7e5649dc47ad extends Template
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
  <div class=\"col-sm-4 pb-3\">
    <div class=\"shadow\">
      ";
        // line 73
        yield $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(CoreExtension::getAttribute($this->env, $this->source, ($context["content"] ?? null), "field_image", [], "any", false, false, true, 73), 73, $this->source), "html", null, true);
        yield "
    </div>
  </div>
  <div class=\"col-sm-8\">
    ";
        // line 77
        yield $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(($context["title_prefix"] ?? null), 77, $this->source), "html", null, true);
        yield "
    <h3>";
        // line 78
        yield $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(($context["label"] ?? null), 78, $this->source), "html", null, true);
        yield "</h3>
    ";
        // line 79
        yield $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(($context["title_suffix"] ?? null), 79, $this->source), "html", null, true);
        yield "
    <div class=\"mt-3 mb-3\">
      ";
        // line 81
        if (CoreExtension::getAttribute($this->env, $this->source, ($context["content"] ?? null), "body", [], "any", false, false, true, 81)) {
            // line 82
            yield "        ";
            if ((Twig\Extension\CoreExtension::length($this->env->getCharset(), Twig\Extension\CoreExtension::striptags($this->extensions['Drupal\Core\Template\TwigExtension']->renderVar(CoreExtension::getAttribute($this->env, $this->source, ($context["content"] ?? null), "body", [], "any", false, false, true, 82)))) > 200)) {
                // line 83
                yield "          ";
                yield $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, Twig\Extension\CoreExtension::slice($this->env->getCharset(), Twig\Extension\CoreExtension::striptags($this->extensions['Drupal\Core\Template\TwigExtension']->renderVar($this->sandbox->ensureToStringAllowed(CoreExtension::getAttribute($this->env, $this->source, ($context["content"] ?? null), "body", [], "any", false, false, true, 83), 83, $this->source))), 0, 200), "html", null, true);
                yield "...
        ";
            } else {
                // line 85
                yield "          ";
                yield $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(CoreExtension::getAttribute($this->env, $this->source, ($context["content"] ?? null), "body", [], "any", false, false, true, 85), 85, $this->source), "html", null, true);
                yield "
        ";
            }
            // line 87
            yield "      ";
        }
        // line 88
        yield "    </div>
    <div class=\"d-grid gap-2 d-md-flex justify-content-md-start\">
      ";
        // line 90
        if (($context["url"] ?? null)) {
            // line 91
            yield "        <a href=\"";
            yield $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(($context["url"] ?? null), 91, $this->source), "html", null, true);
            yield "\" class=\"btn btn-primary\">";
            yield $this->extensions['Drupal\Core\Template\TwigExtension']->renderVar(t("Read More"));
            yield " <i class=\"bi bi-arrow-right\"></i></a>
      ";
        }
        // line 93
        yield "    </div>
  </div>
</div>";
        $this->env->getExtension('\Drupal\Core\Template\TwigExtension')
            ->checkDeprecations($context, ["content", "title_prefix", "label", "title_suffix", "url"]);        return; yield '';
    }

    /**
     * @codeCoverageIgnore
     */
    public function getTemplateName()
    {
        return "themes/openchurch_theme/templates/content/node--article--50_50.html.twig";
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
        return array (  99 => 93,  91 => 91,  89 => 90,  85 => 88,  82 => 87,  76 => 85,  70 => 83,  67 => 82,  65 => 81,  60 => 79,  56 => 78,  52 => 77,  45 => 73,  40 => 70,);
    }

    public function getSourceContext()
    {
        return new Source("", "themes/openchurch_theme/templates/content/node--article--50_50.html.twig", "/var/www/html/pngbaptist/themes/openchurch_theme/templates/content/node--article--50_50.html.twig");
    }
    
    public function checkSecurity()
    {
        static $tags = array("if" => 81);
        static $filters = array("escape" => 73, "length" => 82, "striptags" => 82, "render" => 82, "slice" => 83, "t" => 91);
        static $functions = array();

        try {
            $this->sandbox->checkSecurity(
                ['if'],
                ['escape', 'length', 'striptags', 'render', 'slice', 't'],
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
