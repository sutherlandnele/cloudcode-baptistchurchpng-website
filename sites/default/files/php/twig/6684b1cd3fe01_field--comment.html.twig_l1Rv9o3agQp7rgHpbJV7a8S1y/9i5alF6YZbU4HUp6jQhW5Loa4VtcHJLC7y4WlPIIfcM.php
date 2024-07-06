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

/* core/themes/olivero/templates/field/field--comment.html.twig */
class __TwigTemplate_8307600a8efa8ad1e9ebc92e4a0c2d51 extends Template
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
        // line 30
        yield "
";
        // line 31
        yield $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->extensions['Drupal\Core\Template\TwigExtension']->attachLibrary("olivero/comments"), "html", null, true);
        yield "
<section";
        // line 32
        yield $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, ($context["attributes"] ?? null), "setAttribute", ["data-drupal-selector", "comments"], "method", false, false, true, 32), "addClass", ["comments"], "method", false, false, true, 32), 32, $this->source), "html", null, true);
        yield ">

  ";
        // line 34
        if ( !($context["label_hidden"] ?? null)) {
            // line 35
            yield "    ";
            yield $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(($context["title_prefix"] ?? null), 35, $this->source), "html", null, true);
            yield "
    <h2";
            // line 36
            yield $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(CoreExtension::getAttribute($this->env, $this->source, ($context["title_attributes"] ?? null), "addClass", ["comments__title"], "method", false, false, true, 36), 36, $this->source), "html", null, true);
            yield ">";
            // line 37
            yield $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(($context["label"] ?? null), 37, $this->source), "html", null, true);
            // line 38
            if (($context["comments"] ?? null)) {
                // line 39
                yield "<span class=\"comments__count\">";
                yield $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(($context["comment_count"] ?? null), 39, $this->source), "html", null, true);
                yield "</span>";
            }
            // line 41
            yield "</h2>
    ";
            // line 42
            yield $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(($context["title_suffix"] ?? null), 42, $this->source), "html", null, true);
            yield "
  ";
        }
        // line 44
        yield "
  ";
        // line 45
        if (($context["comment_form"] ?? null)) {
            // line 46
            yield "    <div class=\"add-comment\">
      ";
            // line 47
            if (($context["user_picture"] ?? null)) {
                // line 48
                yield "      <div class=\"add-comment__picture-wrapper\">
        <div class=\"add-comment__picture\">
          ";
                // line 50
                yield $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(($context["user_picture"] ?? null), 50, $this->source), "html", null, true);
                yield "
        </div>
      </div>
      ";
            }
            // line 54
            yield "      <div class=\"add-comment__form\">
        ";
            // line 55
            yield $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(($context["comment_form"] ?? null), 55, $this->source), "html", null, true);
            yield "
      </div>
    </div>
  ";
        }
        // line 59
        yield "
  ";
        // line 60
        yield $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(($context["comments"] ?? null), 60, $this->source), "html", null, true);
        yield "

</section>
";
        $this->env->getExtension('\Drupal\Core\Template\TwigExtension')
            ->checkDeprecations($context, ["attributes", "label_hidden", "title_prefix", "title_attributes", "label", "comments", "comment_count", "title_suffix", "comment_form", "user_picture"]);        return; yield '';
    }

    /**
     * @codeCoverageIgnore
     */
    public function getTemplateName()
    {
        return "core/themes/olivero/templates/field/field--comment.html.twig";
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
        return array (  113 => 60,  110 => 59,  103 => 55,  100 => 54,  93 => 50,  89 => 48,  87 => 47,  84 => 46,  82 => 45,  79 => 44,  74 => 42,  71 => 41,  66 => 39,  64 => 38,  62 => 37,  59 => 36,  54 => 35,  52 => 34,  47 => 32,  43 => 31,  40 => 30,);
    }

    public function getSourceContext()
    {
        return new Source("", "core/themes/olivero/templates/field/field--comment.html.twig", "/var/www/html/pngbaptist/core/themes/olivero/templates/field/field--comment.html.twig");
    }
    
    public function checkSecurity()
    {
        static $tags = array("if" => 34);
        static $filters = array("escape" => 31);
        static $functions = array("attach_library" => 31);

        try {
            $this->sandbox->checkSecurity(
                ['if'],
                ['escape'],
                ['attach_library'],
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
