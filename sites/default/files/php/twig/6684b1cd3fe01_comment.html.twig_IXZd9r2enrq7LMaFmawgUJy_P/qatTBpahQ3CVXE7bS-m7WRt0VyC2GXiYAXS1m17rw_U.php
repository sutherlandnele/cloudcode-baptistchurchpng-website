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

/* core/themes/olivero/templates/content/comment.html.twig */
class __TwigTemplate_311ecdc4d9c76adc0894642de429ac5a extends Template
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
        $context["classes"] = ["comment", "js-comment", (( !        // line 73
($context["parent_comment"] ?? null)) ? ("comment--level-1") : ("")), (((        // line 74
($context["status"] ?? null) != "published")) ? (("comment--" . $this->sandbox->ensureToStringAllowed(($context["status"] ?? null), 74, $this->source))) : ("")), ((CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source,         // line 75
($context["comment"] ?? null), "owner", [], "any", false, false, true, 75), "anonymous", [], "any", false, false, true, 75)) ? ("by-anonymous") : ("")), (((        // line 76
($context["author_id"] ?? null) && (($context["author_id"] ?? null) == CoreExtension::getAttribute($this->env, $this->source, ($context["commented_entity"] ?? null), "getOwnerId", [], "method", false, false, true, 76)))) ? ((("by-" . $this->sandbox->ensureToStringAllowed(CoreExtension::getAttribute($this->env, $this->source, ($context["commented_entity"] ?? null), "getEntityTypeId", [], "method", false, false, true, 76), 76, $this->source)) . "-author")) : (""))];
        // line 79
        yield $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->extensions['Drupal\Core\Template\TwigExtension']->attachLibrary("olivero/comments"), "html", null, true);
        yield "
<article ";
        // line 80
        yield $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, ($context["attributes"] ?? null), "addClass", [($context["classes"] ?? null)], "method", false, false, true, 80), "setAttribute", ["role", "article"], "method", false, false, true, 80), "setAttribute", ["data-drupal-selector", "comment"], "method", false, false, true, 80), 80, $this->source), "html", null, true);
        yield ">
  ";
        // line 86
        yield "  <span class=\"hidden\" data-comment-timestamp=\"";
        yield $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(($context["new_indicator_timestamp"] ?? null), 86, $this->source), "html", null, true);
        yield "\"></span>

  ";
        // line 88
        if (($context["submitted"] ?? null)) {
            // line 89
            yield "    <div class=\"comment__picture-wrapper\">
      <div class=\"comment__picture\">
        ";
            // line 91
            yield $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(($context["user_picture"] ?? null), 91, $this->source), "html", null, true);
            yield "
      </div>
    </div>
  ";
        }
        // line 95
        yield "  <div class=\"comment__text-wrapper\">
    ";
        // line 96
        if (($context["submitted"] ?? null)) {
            // line 97
            yield "      <footer class=\"comment__meta\">
        <p class=\"comment__author\">";
            // line 98
            yield $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(($context["author"] ?? null), 98, $this->source), "html", null, true);
            yield "</p>
        <p class=\"comment__time\">";
            // line 99
            yield $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(($context["created"] ?? null), 99, $this->source), "html", null, true);
            yield "</p>
        ";
            // line 105
            yield "        ";
            if (($context["parent"] ?? null)) {
                // line 106
                yield "          <p class=\"visually-hidden\">";
                yield $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(($context["parent"] ?? null), 106, $this->source), "html", null, true);
                yield "</p>
        ";
            }
            // line 108
            yield "      </footer>
    ";
        }
        // line 110
        yield "    <div";
        yield $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(CoreExtension::getAttribute($this->env, $this->source, ($context["content_attributes"] ?? null), "addClass", ["comment__content"], "method", false, false, true, 110), 110, $this->source), "html", null, true);
        yield ">
      ";
        // line 111
        if (($context["title"] ?? null)) {
            // line 112
            yield "        ";
            yield $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(($context["title_prefix"] ?? null), 112, $this->source), "html", null, true);
            yield "
        <h3";
            // line 113
            yield $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(($context["title_attributes"] ?? null), 113, $this->source), "html", null, true);
            yield ">";
            yield $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(($context["title"] ?? null), 113, $this->source), "html", null, true);
            yield "</h3>
        ";
            // line 114
            yield $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(($context["title_suffix"] ?? null), 114, $this->source), "html", null, true);
            yield "
      ";
        }
        // line 116
        yield "      ";
        yield $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(($context["content"] ?? null), 116, $this->source), "html", null, true);
        yield "
    </div>
  </div>
</article>
";
        $this->env->getExtension('\Drupal\Core\Template\TwigExtension')
            ->checkDeprecations($context, ["parent_comment", "status", "comment", "author_id", "commented_entity", "attributes", "new_indicator_timestamp", "submitted", "user_picture", "author", "created", "parent", "content_attributes", "title", "title_prefix", "title_attributes", "title_suffix", "content"]);        return; yield '';
    }

    /**
     * @codeCoverageIgnore
     */
    public function getTemplateName()
    {
        return "core/themes/olivero/templates/content/comment.html.twig";
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
        return array (  125 => 116,  120 => 114,  114 => 113,  109 => 112,  107 => 111,  102 => 110,  98 => 108,  92 => 106,  89 => 105,  85 => 99,  81 => 98,  78 => 97,  76 => 96,  73 => 95,  66 => 91,  62 => 89,  60 => 88,  54 => 86,  50 => 80,  46 => 79,  44 => 76,  43 => 75,  42 => 74,  41 => 73,  40 => 70,);
    }

    public function getSourceContext()
    {
        return new Source("", "core/themes/olivero/templates/content/comment.html.twig", "/var/www/html/pngbaptist/core/themes/olivero/templates/content/comment.html.twig");
    }
    
    public function checkSecurity()
    {
        static $tags = array("set" => 70, "if" => 88);
        static $filters = array("escape" => 79);
        static $functions = array("attach_library" => 79);

        try {
            $this->sandbox->checkSecurity(
                ['set', 'if'],
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
