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

/* core/themes/claro/templates/classy/content/comment.html.twig */
class __TwigTemplate_a3b177bf5aa2619d92e7781a4587517d extends Template
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
        // line 69
        if (($context["threaded"] ?? null)) {
            // line 70
            yield "  ";
            yield $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->extensions['Drupal\Core\Template\TwigExtension']->attachLibrary("claro/classy.indented"), "html", null, true);
            yield "
";
        }
        // line 73
        $context["classes"] = ["comment", "js-comment", (((        // line 76
($context["status"] ?? null) != "published")) ? (($context["status"] ?? null)) : ("")), ((CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source,         // line 77
($context["comment"] ?? null), "owner", [], "any", false, false, true, 77), "anonymous", [], "any", false, false, true, 77)) ? ("by-anonymous") : ("")), (((        // line 78
($context["author_id"] ?? null) && (($context["author_id"] ?? null) == CoreExtension::getAttribute($this->env, $this->source, ($context["commented_entity"] ?? null), "getOwnerId", [], "method", false, false, true, 78)))) ? ((("by-" . $this->sandbox->ensureToStringAllowed(CoreExtension::getAttribute($this->env, $this->source, ($context["commented_entity"] ?? null), "getEntityTypeId", [], "method", false, false, true, 78), 78, $this->source)) . "-author")) : (""))];
        // line 81
        yield "<article";
        yield $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(CoreExtension::getAttribute($this->env, $this->source, ($context["attributes"] ?? null), "addClass", [($context["classes"] ?? null)], "method", false, false, true, 81), 81, $this->source), "html", null, true);
        yield ">
  ";
        // line 87
        yield "  <mark class=\"hidden\" data-comment-timestamp=\"";
        yield $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(($context["new_indicator_timestamp"] ?? null), 87, $this->source), "html", null, true);
        yield "\"></mark>

  ";
        // line 89
        if (($context["submitted"] ?? null)) {
            // line 90
            yield "    <footer class=\"comment__meta\">
      ";
            // line 91
            yield $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(($context["user_picture"] ?? null), 91, $this->source), "html", null, true);
            yield "
      <p class=\"comment__submitted\">";
            // line 92
            yield $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(($context["submitted"] ?? null), 92, $this->source), "html", null, true);
            yield "</p>

      ";
            // line 99
            yield "      ";
            if (($context["parent"] ?? null)) {
                // line 100
                yield "        <p class=\"parent visually-hidden\">";
                yield $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(($context["parent"] ?? null), 100, $this->source), "html", null, true);
                yield "</p>
      ";
            }
            // line 102
            yield "
      ";
            // line 103
            yield $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(($context["permalink"] ?? null), 103, $this->source), "html", null, true);
            yield "
    </footer>
  ";
        }
        // line 106
        yield "
  <div";
        // line 107
        yield $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(CoreExtension::getAttribute($this->env, $this->source, ($context["content_attributes"] ?? null), "addClass", ["content"], "method", false, false, true, 107), 107, $this->source), "html", null, true);
        yield ">
    ";
        // line 108
        if (($context["title"] ?? null)) {
            // line 109
            yield "      ";
            yield $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(($context["title_prefix"] ?? null), 109, $this->source), "html", null, true);
            yield "
      <h3";
            // line 110
            yield $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(($context["title_attributes"] ?? null), 110, $this->source), "html", null, true);
            yield ">";
            yield $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(($context["title"] ?? null), 110, $this->source), "html", null, true);
            yield "</h3>
      ";
            // line 111
            yield $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(($context["title_suffix"] ?? null), 111, $this->source), "html", null, true);
            yield "
    ";
        }
        // line 113
        yield "    ";
        yield $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(($context["content"] ?? null), 113, $this->source), "html", null, true);
        yield "
  </div>
</article>
";
        $this->env->getExtension('\Drupal\Core\Template\TwigExtension')
            ->checkDeprecations($context, ["threaded", "status", "comment", "author_id", "commented_entity", "attributes", "new_indicator_timestamp", "submitted", "user_picture", "parent", "permalink", "content_attributes", "title", "title_prefix", "title_attributes", "title_suffix", "content"]);        return; yield '';
    }

    /**
     * @codeCoverageIgnore
     */
    public function getTemplateName()
    {
        return "core/themes/claro/templates/classy/content/comment.html.twig";
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
        return array (  121 => 113,  116 => 111,  110 => 110,  105 => 109,  103 => 108,  99 => 107,  96 => 106,  90 => 103,  87 => 102,  81 => 100,  78 => 99,  73 => 92,  69 => 91,  66 => 90,  64 => 89,  58 => 87,  53 => 81,  51 => 78,  50 => 77,  49 => 76,  48 => 73,  42 => 70,  40 => 69,);
    }

    public function getSourceContext()
    {
        return new Source("", "core/themes/claro/templates/classy/content/comment.html.twig", "/var/www/html/pngbaptist/core/themes/claro/templates/classy/content/comment.html.twig");
    }
    
    public function checkSecurity()
    {
        static $tags = array("if" => 69, "set" => 73);
        static $filters = array("escape" => 70);
        static $functions = array("attach_library" => 70);

        try {
            $this->sandbox->checkSecurity(
                ['if', 'set'],
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
