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

/* themes/openchurch_theme/templates/navigation/menu--main.html.twig */
class __TwigTemplate_8ee90b4c4188bbdff517ff40da772fb8 extends Template
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
        // line 21
        yield "
<nav class=\"navbar navbar-expand-lg navbar-dark\">
  <div class=\"container-fluid\">
    <a class=\"navbar-brand\" href=\"/\">
      <img src=\"";
        // line 25
        yield $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(($context["site_logo"] ?? null), 25, $this->source), "html", null, true);
        yield "\" alt=\"";
        yield $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(($context["site_name"] ?? null), 25, $this->source), "html", null, true);
        yield "\" class=\"d-inline-block\" style=\"margin-right: 4px;\">
      ";
        // line 26
        yield $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(($context["site_name"] ?? null), 26, $this->source), "html", null, true);
        yield "
    </a>

    <button class=\"navbar-toggler\" type=\"button\" data-bs-toggle=\"collapse\" data-bs-target=\"#navbarSupportedContent\" aria-controls=\"navbarSupportedContent\" aria-expanded=\"false\" aria-label=\"Toggle navigation\">
      <span class=\"navbar-toggler-icon\"></span>
    </button>

    <div class=\"collapse navbar-collapse justify-content-end\" id=\"navbarSupportedContent\">
      ";
        // line 34
        $macros["menus"] = $this->macros["menus"] = $this;
        // line 35
        yield "
      ";
        // line 40
        yield "      ";
        yield $this->extensions['Drupal\Core\Template\TwigExtension']->renderVar(CoreExtension::callMacro($macros["menus"], "macro_build_menu", [($context["items"] ?? null), ($context["attributes"] ?? null), 0], 40, $context, $this->getSourceContext()));
        yield "

      ";
        // line 56
        yield "
      ";
        // line 87
        yield "    </div>
  </div>
</nav>
";
        $this->env->getExtension('\Drupal\Core\Template\TwigExtension')
            ->checkDeprecations($context, ["site_logo", "site_name", "_self", "items", "attributes", "menu_level"]);        return; yield '';
    }

    // line 42
    public function macro_build_menu($__items__ = null, $__attributes__ = null, $__menu_level__ = null, ...$__varargs__)
    {
        $macros = $this->macros;
        $context = $this->env->mergeGlobals([
            "items" => $__items__,
            "attributes" => $__attributes__,
            "menu_level" => $__menu_level__,
            "varargs" => $__varargs__,
        ]);

        $blocks = [];

        return ('' === $tmp = \Twig\Extension\CoreExtension::captureOutput((function () use (&$context, $macros, $blocks) {
            // line 43
            yield "        ";
            $macros["menus"] = $this;
            // line 44
            yield "        ";
            if (($context["items"] ?? null)) {
                // line 45
                yield "          ";
                if ((($context["menu_level"] ?? null) == 0)) {
                    // line 46
                    yield "          <ul";
                    yield $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(CoreExtension::getAttribute($this->env, $this->source, ($context["attributes"] ?? null), "addClass", ["navbar-nav mr-auto gap-3"], "method", false, false, true, 46), 46, $this->source), "html", null, true);
                    yield ">
          ";
                } else {
                    // line 48
                    yield "          <ul class=\"dropdown-menu\">
          ";
                }
                // line 50
                yield "          ";
                $context['_parent'] = $context;
                $context['_seq'] = CoreExtension::ensureTraversable(($context["items"] ?? null));
                foreach ($context['_seq'] as $context["_key"] => $context["item"]) {
                    // line 51
                    yield "            ";
                    yield $this->extensions['Drupal\Core\Template\TwigExtension']->renderVar(CoreExtension::callMacro($macros["menus"], "macro_add_link", [$context["item"], ($context["attributes"] ?? null), ($context["menu_level"] ?? null)], 51, $context, $this->getSourceContext()));
                    yield "
          ";
                }
                $_parent = $context['_parent'];
                unset($context['_seq'], $context['_iterated'], $context['_key'], $context['item'], $context['_parent'], $context['loop']);
                $context = array_intersect_key($context, $_parent) + $_parent;
                // line 53
                yield "          </ul>
        ";
            }
            // line 55
            yield "      ";
            return; yield '';
        })())) ? '' : new Markup($tmp, $this->env->getCharset());
    }

    // line 57
    public function macro_add_link($__item__ = null, $__attributes__ = null, $__menu_level__ = null, ...$__varargs__)
    {
        $macros = $this->macros;
        $context = $this->env->mergeGlobals([
            "item" => $__item__,
            "attributes" => $__attributes__,
            "menu_level" => $__menu_level__,
            "varargs" => $__varargs__,
        ]);

        $blocks = [];

        return ('' === $tmp = \Twig\Extension\CoreExtension::captureOutput((function () use (&$context, $macros, $blocks) {
            // line 58
            yield "        ";
            $macros["menus"] = $this;
            // line 59
            yield "        ";
            // line 60
            $context["list_item_classes"] = ["nav-item", ((CoreExtension::getAttribute($this->env, $this->source,             // line 62
($context["item"] ?? null), "is_expanded", [], "any", false, false, true, 62)) ? ("dropdown") : (""))];
            // line 65
            yield "        ";
            // line 66
            $context["link_class"] = [(((            // line 67
($context["menu_level"] ?? null) == 0)) ? ("nav-item") : ("")), (((            // line 68
($context["menu_level"] ?? null) == 0)) ? ("nav-link text-white") : ("")), ((CoreExtension::getAttribute($this->env, $this->source,             // line 69
($context["item"] ?? null), "in_active_trail", [], "any", false, false, true, 69)) ? ("active") : ("")), ((((            // line 70
($context["menu_level"] ?? null) == 0) && (CoreExtension::getAttribute($this->env, $this->source, ($context["item"] ?? null), "is_expanded", [], "any", false, false, true, 70) || CoreExtension::getAttribute($this->env, $this->source, ($context["item"] ?? null), "is_collapsed", [], "any", false, false, true, 70)))) ? ("dropdown-toggle") : ("")), (((            // line 71
($context["menu_level"] ?? null) > 0)) ? ("dropdown-item") : (""))];
            // line 74
            yield "        ";
            // line 75
            $context["toggle_class"] = [];
            // line 78
            yield "        <li";
            yield $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, ($context["item"] ?? null), "attributes", [], "any", false, false, true, 78), "addClass", [($context["list_item_classes"] ?? null)], "method", false, false, true, 78), 78, $this->source), "html", null, true);
            yield ">
          ";
            // line 79
            if (((($context["menu_level"] ?? null) == 0) && CoreExtension::getAttribute($this->env, $this->source, ($context["item"] ?? null), "below", [], "any", false, false, true, 79))) {
                // line 80
                yield "            ";
                yield $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->extensions['Drupal\Core\Template\TwigExtension']->getLink($this->sandbox->ensureToStringAllowed(CoreExtension::getAttribute($this->env, $this->source, ($context["item"] ?? null), "title", [], "any", false, false, true, 80), 80, $this->source), $this->sandbox->ensureToStringAllowed(CoreExtension::getAttribute($this->env, $this->source, ($context["item"] ?? null), "url", [], "any", false, false, true, 80), 80, $this->source), ["class" => ($context["link_class"] ?? null), "role" => "button", "data-bs-toggle" => "dropdown", "aria-expanded" => "false", "title" => ((t("Expand menu") . " ") . $this->sandbox->ensureToStringAllowed(CoreExtension::getAttribute($this->env, $this->source, ($context["item"] ?? null), "title", [], "any", false, false, true, 80), 80, $this->source))]), "html", null, true);
                yield "
            ";
                // line 81
                yield $this->extensions['Drupal\Core\Template\TwigExtension']->renderVar(CoreExtension::callMacro($macros["menus"], "macro_build_menu", [CoreExtension::getAttribute($this->env, $this->source, ($context["item"] ?? null), "below", [], "any", false, false, true, 81), ($context["attributes"] ?? null), (($context["menu_level"] ?? null) + 1)], 81, $context, $this->getSourceContext()));
                yield "
          ";
            } else {
                // line 83
                yield "            ";
                yield $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->extensions['Drupal\Core\Template\TwigExtension']->getLink($this->sandbox->ensureToStringAllowed(CoreExtension::getAttribute($this->env, $this->source, ($context["item"] ?? null), "title", [], "any", false, false, true, 83), 83, $this->source), $this->sandbox->ensureToStringAllowed(CoreExtension::getAttribute($this->env, $this->source, ($context["item"] ?? null), "url", [], "any", false, false, true, 83), 83, $this->source), ["class" => ($context["link_class"] ?? null)]), "html", null, true);
                yield "
          ";
            }
            // line 85
            yield "        </li>
      ";
            return; yield '';
        })())) ? '' : new Markup($tmp, $this->env->getCharset());
    }

    /**
     * @codeCoverageIgnore
     */
    public function getTemplateName()
    {
        return "themes/openchurch_theme/templates/navigation/menu--main.html.twig";
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
        return array (  201 => 85,  195 => 83,  190 => 81,  185 => 80,  183 => 79,  178 => 78,  176 => 75,  174 => 74,  172 => 71,  171 => 70,  170 => 69,  169 => 68,  168 => 67,  167 => 66,  165 => 65,  163 => 62,  162 => 60,  160 => 59,  157 => 58,  143 => 57,  137 => 55,  133 => 53,  124 => 51,  119 => 50,  115 => 48,  109 => 46,  106 => 45,  103 => 44,  100 => 43,  86 => 42,  77 => 87,  74 => 56,  68 => 40,  65 => 35,  63 => 34,  52 => 26,  46 => 25,  40 => 21,);
    }

    public function getSourceContext()
    {
        return new Source("", "themes/openchurch_theme/templates/navigation/menu--main.html.twig", "/var/www/html/pngbaptist/themes/openchurch_theme/templates/navigation/menu--main.html.twig");
    }
    
    public function checkSecurity()
    {
        static $tags = array("import" => 34, "macro" => 42, "if" => 44, "for" => 50, "set" => 60);
        static $filters = array("escape" => 25, "t" => 80);
        static $functions = array("link" => 80);

        try {
            $this->sandbox->checkSecurity(
                ['import', 'macro', 'if', 'for', 'set'],
                ['escape', 't'],
                ['link'],
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
