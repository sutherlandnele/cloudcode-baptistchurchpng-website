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

/* themes/openchurch_theme/templates/block/block--cards.html.twig */
class __TwigTemplate_ef966208adb8233abfa997b187e1dbee extends Template
{
    private $source;
    private $macros = [];

    public function __construct(Environment $env)
    {
        parent::__construct($env);

        $this->source = $this->getSourceContext();

        $this->parent = false;

        $this->blocks = [
            'content' => [$this, 'block_content'],
        ];
        $this->sandbox = $this->env->getExtension(SandboxExtension::class);
        $this->checkSecurity();
    }

    protected function doDisplay(array $context, array $blocks = [])
    {
        $macros = $this->macros;
        // line 30
        $context["classes"] = ["block", ("block-" . \Drupal\Component\Utility\Html::getClass($this->sandbox->ensureToStringAllowed(CoreExtension::getAttribute($this->env, $this->source,         // line 32
($context["configuration"] ?? null), "provider", [], "any", false, false, true, 32), 32, $this->source))), ("block-" . \Drupal\Component\Utility\Html::getClass($this->sandbox->ensureToStringAllowed(        // line 33
($context["plugin_id"] ?? null), 33, $this->source))), "container-fluid", "mt-5"];
        // line 38
        yield "<div";
        yield $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(CoreExtension::getAttribute($this->env, $this->source, ($context["attributes"] ?? null), "addClass", [($context["classes"] ?? null)], "method", false, false, true, 38), 38, $this->source), "html", null, true);
        yield ">
  ";
        // line 39
        yield $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(($context["title_prefix"] ?? null), 39, $this->source), "html", null, true);
        yield "
  ";
        // line 40
        if (($context["label"] ?? null)) {
            // line 41
            yield "    <h2 class=\"mb-5 text-center\">";
            yield $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(($context["label"] ?? null), 41, $this->source), "html", null, true);
            yield "</h2>
  ";
        }
        // line 43
        yield "  ";
        yield $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(($context["title_suffix"] ?? null), 43, $this->source), "html", null, true);
        yield "
  ";
        // line 44
        yield from $this->unwrap()->yieldBlock('content', $context, $blocks);
        // line 90
        yield "</div>
";
        $this->env->getExtension('\Drupal\Core\Template\TwigExtension')
            ->checkDeprecations($context, ["configuration", "plugin_id", "attributes", "title_prefix", "label", "title_suffix", "content", "title_attributes"]);        return; yield '';
    }

    // line 44
    public function block_content($context, array $blocks = [])
    {
        $macros = $this->macros;
        // line 45
        yield "    <div class=\"row\">
      ";
        // line 46
        if ($this->extensions['Drupal\Core\Template\TwigExtension']->renderVar(CoreExtension::getAttribute($this->env, $this->source, ($context["content"] ?? null), "field_image", [], "any", false, false, true, 46))) {
            // line 47
            yield "        <div class=\"col-md mb-4\">
          <div class=\"card rounded h-100\">
            ";
            // line 49
            yield $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(CoreExtension::getAttribute($this->env, $this->source, ($context["content"] ?? null), "field_image", [], "any", false, false, true, 49), 49, $this->source), "html", null, true);
            yield "
            <div class=\"card-body\">
              <h5";
            // line 51
            yield $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(CoreExtension::getAttribute($this->env, $this->source, ($context["title_attributes"] ?? null), "addClass", ["card-title text-uppercase"], "method", false, false, true, 51), 51, $this->source), "html", null, true);
            yield ">";
            yield $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(CoreExtension::getAttribute($this->env, $this->source, ($context["content"] ?? null), "field_title", [], "any", false, false, true, 51), 51, $this->source), "html", null, true);
            yield "</h5>
              <p class=\"card-text\">";
            // line 52
            yield $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(CoreExtension::getAttribute($this->env, $this->source, ($context["content"] ?? null), "field_summary", [], "any", false, false, true, 52), 52, $this->source), "html", null, true);
            yield "</p>
            </div>
            <div class=\"card-footer bg-white border-0 mb-2\">
              <a href=\"";
            // line 55
            yield $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(CoreExtension::getAttribute($this->env, $this->source, (($__internal_compile_0 = (($__internal_compile_1 = CoreExtension::getAttribute($this->env, $this->source, ($context["content"] ?? null), "field_link", [], "any", false, false, true, 55)) && is_array($__internal_compile_1) || $__internal_compile_1 instanceof ArrayAccess ? ($__internal_compile_1[0] ?? null) : null)) && is_array($__internal_compile_0) || $__internal_compile_0 instanceof ArrayAccess ? ($__internal_compile_0["#url"] ?? null) : null), "toString", [], "method", false, false, true, 55), 55, $this->source), "html", null, true);
            yield "\" class=\"btn btn-primary\" role=\"button\">";
            yield $this->extensions['Drupal\Core\Template\TwigExtension']->renderVar(t("View Details"));
            yield " <i class=\"bi bi-arrow-right\"></i></a>
            </div>
          </div>
        </div>
      ";
        }
        // line 60
        yield "      ";
        if ($this->extensions['Drupal\Core\Template\TwigExtension']->renderVar(CoreExtension::getAttribute($this->env, $this->source, ($context["content"] ?? null), "field_image2", [], "any", false, false, true, 60))) {
            // line 61
            yield "        <div class=\"col-md mb-4\">
          <div class=\"card rounded h-100\">
            ";
            // line 63
            yield $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(CoreExtension::getAttribute($this->env, $this->source, ($context["content"] ?? null), "field_image2", [], "any", false, false, true, 63), 63, $this->source), "html", null, true);
            yield "
            <div class=\"card-body\">
              <h5";
            // line 65
            yield $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(CoreExtension::getAttribute($this->env, $this->source, ($context["title_attributes"] ?? null), "addClass", ["card-title text-uppercase"], "method", false, false, true, 65), 65, $this->source), "html", null, true);
            yield ">";
            yield $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(CoreExtension::getAttribute($this->env, $this->source, ($context["content"] ?? null), "field_title2", [], "any", false, false, true, 65), 65, $this->source), "html", null, true);
            yield "</h5>
              <p class=\"card-text\">";
            // line 66
            yield $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(CoreExtension::getAttribute($this->env, $this->source, ($context["content"] ?? null), "field_summary2", [], "any", false, false, true, 66), 66, $this->source), "html", null, true);
            yield "</p>
            </div>
            <div class=\"card-footer bg-white border-0 mb-2\">
              <a href=\"";
            // line 69
            yield $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(CoreExtension::getAttribute($this->env, $this->source, (($__internal_compile_2 = (($__internal_compile_3 = CoreExtension::getAttribute($this->env, $this->source, ($context["content"] ?? null), "field_link2", [], "any", false, false, true, 69)) && is_array($__internal_compile_3) || $__internal_compile_3 instanceof ArrayAccess ? ($__internal_compile_3[0] ?? null) : null)) && is_array($__internal_compile_2) || $__internal_compile_2 instanceof ArrayAccess ? ($__internal_compile_2["#url"] ?? null) : null), "toString", [], "method", false, false, true, 69), 69, $this->source), "html", null, true);
            yield "\" class=\"btn btn-primary\" role=\"button\">";
            yield $this->extensions['Drupal\Core\Template\TwigExtension']->renderVar(t("View Details"));
            yield " <i class=\"bi bi-arrow-right\"></i></a>
            </div>
          </div>
        </div>
      ";
        }
        // line 74
        yield "      ";
        if ($this->extensions['Drupal\Core\Template\TwigExtension']->renderVar(CoreExtension::getAttribute($this->env, $this->source, ($context["content"] ?? null), "field_image3", [], "any", false, false, true, 74))) {
            // line 75
            yield "        <div class=\"col-md mb-4\">
          <div class=\"card rounded h-100\">
            ";
            // line 77
            yield $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(CoreExtension::getAttribute($this->env, $this->source, ($context["content"] ?? null), "field_image3", [], "any", false, false, true, 77), 77, $this->source), "html", null, true);
            yield "
            <div class=\"card-body\">
              <h5";
            // line 79
            yield $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(CoreExtension::getAttribute($this->env, $this->source, ($context["title_attributes"] ?? null), "addClass", ["card-title text-uppercase"], "method", false, false, true, 79), 79, $this->source), "html", null, true);
            yield ">";
            yield $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(CoreExtension::getAttribute($this->env, $this->source, ($context["content"] ?? null), "field_title3", [], "any", false, false, true, 79), 79, $this->source), "html", null, true);
            yield "</h5>
              <p class=\"card-text\">";
            // line 80
            yield $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(CoreExtension::getAttribute($this->env, $this->source, ($context["content"] ?? null), "field_summary3", [], "any", false, false, true, 80), 80, $this->source), "html", null, true);
            yield "</p>
            </div>
            <div class=\"card-footer bg-white border-0 mb-2\">
              <a href=\"";
            // line 83
            yield $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(CoreExtension::getAttribute($this->env, $this->source, (($__internal_compile_4 = (($__internal_compile_5 = CoreExtension::getAttribute($this->env, $this->source, ($context["content"] ?? null), "field_link3", [], "any", false, false, true, 83)) && is_array($__internal_compile_5) || $__internal_compile_5 instanceof ArrayAccess ? ($__internal_compile_5[0] ?? null) : null)) && is_array($__internal_compile_4) || $__internal_compile_4 instanceof ArrayAccess ? ($__internal_compile_4["#url"] ?? null) : null), "toString", [], "method", false, false, true, 83), 83, $this->source), "html", null, true);
            yield "\" class=\"btn btn-primary\" role=\"button\">";
            yield $this->extensions['Drupal\Core\Template\TwigExtension']->renderVar(t("View Details"));
            yield " <i class=\"bi bi-arrow-right\"></i></a>
            </div>
          </div>
        </div>
      ";
        }
        // line 88
        yield "    </div>
  ";
        return; yield '';
    }

    /**
     * @codeCoverageIgnore
     */
    public function getTemplateName()
    {
        return "themes/openchurch_theme/templates/block/block--cards.html.twig";
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
        return array (  184 => 88,  174 => 83,  168 => 80,  162 => 79,  157 => 77,  153 => 75,  150 => 74,  140 => 69,  134 => 66,  128 => 65,  123 => 63,  119 => 61,  116 => 60,  106 => 55,  100 => 52,  94 => 51,  89 => 49,  85 => 47,  83 => 46,  80 => 45,  76 => 44,  69 => 90,  67 => 44,  62 => 43,  56 => 41,  54 => 40,  50 => 39,  45 => 38,  43 => 33,  42 => 32,  41 => 30,);
    }

    public function getSourceContext()
    {
        return new Source("", "themes/openchurch_theme/templates/block/block--cards.html.twig", "/var/www/html/pngbaptist/themes/openchurch_theme/templates/block/block--cards.html.twig");
    }
    
    public function checkSecurity()
    {
        static $tags = array("set" => 30, "if" => 40, "block" => 44);
        static $filters = array("clean_class" => 32, "escape" => 38, "render" => 46, "t" => 55);
        static $functions = array();

        try {
            $this->sandbox->checkSecurity(
                ['set', 'if', 'block'],
                ['clean_class', 'escape', 'render', 't'],
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
