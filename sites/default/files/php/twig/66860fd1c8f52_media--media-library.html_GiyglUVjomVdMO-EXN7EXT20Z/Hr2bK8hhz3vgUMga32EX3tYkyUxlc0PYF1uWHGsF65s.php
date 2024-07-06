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

/* core/themes/claro/templates/media-library/media--media-library.html.twig */
class __TwigTemplate_07ba6e47041441c69ce98675c1125867 extends Template
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
        // line 41
        yield "<article";
        yield $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(CoreExtension::getAttribute($this->env, $this->source, ($context["attributes"] ?? null), "addClass", ["media-library-item__preview-wrapper"], "method", false, false, true, 41), 41, $this->source), "html", null, true);
        yield ">
  ";
        // line 42
        if (($context["content"] ?? null)) {
            // line 43
            yield "    <div";
            yield $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(CoreExtension::getAttribute($this->env, $this->source, ($context["preview_attributes"] ?? null), "addClass", ["media-library-item__preview js-media-library-item-preview"], "method", false, false, true, 43), 43, $this->source), "html", null, true);
            yield ">
      ";
            // line 44
            yield $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->extensions['Drupal\Core\Template\TwigExtension']->withoutFilter($this->sandbox->ensureToStringAllowed(($context["content"] ?? null), 44, $this->source), "name"), "html", null, true);
            yield "
    </div>
    ";
            // line 46
            if ( !($context["status"] ?? null)) {
                // line 47
                yield "      <div class=\"media-library-item__status\">";
                yield $this->extensions['Drupal\Core\Template\TwigExtension']->renderVar(t("unpublished"));
                yield "</div>
    ";
            }
            // line 49
            yield "    <div";
            yield $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(CoreExtension::getAttribute($this->env, $this->source, ($context["metadata_attributes"] ?? null), "addClass", ["media-library-item__attributes"], "method", false, false, true, 49), 49, $this->source), "html", null, true);
            yield ">
      <div class=\"media-library-item__name\">
        ";
            // line 51
            yield $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(($context["name"] ?? null), 51, $this->source), "html", null, true);
            yield "
      </div>
    </div>
  ";
        }
        // line 55
        yield "</article>
";
        $this->env->getExtension('\Drupal\Core\Template\TwigExtension')
            ->checkDeprecations($context, ["attributes", "content", "preview_attributes", "status", "metadata_attributes", "name"]);        return; yield '';
    }

    /**
     * @codeCoverageIgnore
     */
    public function getTemplateName()
    {
        return "core/themes/claro/templates/media-library/media--media-library.html.twig";
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
        return array (  78 => 55,  71 => 51,  65 => 49,  59 => 47,  57 => 46,  52 => 44,  47 => 43,  45 => 42,  40 => 41,);
    }

    public function getSourceContext()
    {
        return new Source("", "core/themes/claro/templates/media-library/media--media-library.html.twig", "/var/www/html/pngbaptist/core/themes/claro/templates/media-library/media--media-library.html.twig");
    }
    
    public function checkSecurity()
    {
        static $tags = array("if" => 42);
        static $filters = array("escape" => 41, "without" => 44, "t" => 47);
        static $functions = array();

        try {
            $this->sandbox->checkSecurity(
                ['if'],
                ['escape', 'without', 't'],
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
