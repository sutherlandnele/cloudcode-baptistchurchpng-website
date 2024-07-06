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

/* modules/contrib/paragraphs/templates/paragraphs-summary.html.twig */
class __TwigTemplate_fc73c1b0c5ec8d490a145cbc938f53f2 extends Template
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
        // line 16
        $context["classes"] = ["paragraphs-description", ((        // line 18
($context["expanded"] ?? null)) ? ("paragraphs-expanded-description") : ("paragraphs-collapsed-description"))];
        // line 20
        $___internal_parse_0_ = ('' === $tmp = \Twig\Extension\CoreExtension::captureOutput((function () use (&$context, $macros, $blocks) {
            // line 21
            yield "  ";
            if (( !Twig\Extension\CoreExtension::testEmpty(($context["content"] ?? null)) ||  !Twig\Extension\CoreExtension::testEmpty(($context["behaviors"] ?? null)))) {
                // line 22
                yield "    <div";
                yield $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(CoreExtension::getAttribute($this->env, $this->source, ($context["attributes"] ?? null), "addClass", [($context["classes"] ?? null)], "method", false, false, true, 22), 22, $this->source), "html", null, true);
                yield ">
      ";
                // line 23
                if ( !Twig\Extension\CoreExtension::testEmpty(($context["content"] ?? null))) {
                    // line 24
                    yield "        <div class=\"paragraphs-content-wrapper\">";
                    // line 25
                    $context['_parent'] = $context;
                    $context['_seq'] = CoreExtension::ensureTraversable(($context["content"] ?? null));
                    $context['loop'] = [
                      'parent' => $context['_parent'],
                      'index0' => 0,
                      'index'  => 1,
                      'first'  => true,
                    ];
                    if (is_array($context['_seq']) || (is_object($context['_seq']) && $context['_seq'] instanceof \Countable)) {
                        $length = count($context['_seq']);
                        $context['loop']['revindex0'] = $length - 1;
                        $context['loop']['revindex'] = $length;
                        $context['loop']['length'] = $length;
                        $context['loop']['last'] = 1 === $length;
                    }
                    foreach ($context['_seq'] as $context["_key"] => $context["content_item"]) {
                        // line 26
                        yield "<span class=\"summary-content\">";
                        yield $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed($context["content_item"], 26, $this->source), "html", null, true);
                        yield "</span>";
                        // line 27
                        if ( !CoreExtension::getAttribute($this->env, $this->source, $context["loop"], "last", [], "any", false, false, true, 27)) {
                            yield ", ";
                        }
                        ++$context['loop']['index0'];
                        ++$context['loop']['index'];
                        $context['loop']['first'] = false;
                        if (isset($context['loop']['length'])) {
                            --$context['loop']['revindex0'];
                            --$context['loop']['revindex'];
                            $context['loop']['last'] = 0 === $context['loop']['revindex0'];
                        }
                    }
                    $_parent = $context['_parent'];
                    unset($context['_seq'], $context['_iterated'], $context['_key'], $context['content_item'], $context['_parent'], $context['loop']);
                    $context = array_intersect_key($context, $_parent) + $_parent;
                    // line 29
                    yield "</div>
      ";
                }
                // line 31
                yield "      ";
                if ( !Twig\Extension\CoreExtension::testEmpty(($context["behaviors"] ?? null))) {
                    // line 32
                    yield "        <div class=\"paragraphs-plugin-wrapper\">";
                    // line 33
                    $context['_parent'] = $context;
                    $context['_seq'] = CoreExtension::ensureTraversable(($context["behaviors"] ?? null));
                    foreach ($context['_seq'] as $context["_key"] => $context["behavior_item"]) {
                        // line 34
                        yield "<span class=\"summary-plugin\">";
                        // line 35
                        if ( !(null === CoreExtension::getAttribute($this->env, $this->source, $context["behavior_item"], "label", [], "any", false, false, true, 35))) {
                            // line 36
                            yield "<span class=\"summary-plugin-label\">";
                            yield $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(CoreExtension::getAttribute($this->env, $this->source, $context["behavior_item"], "label", [], "any", false, false, true, 36), 36, $this->source), "html", null, true);
                            yield "</span>";
                        }
                        // line 38
                        yield $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(CoreExtension::getAttribute($this->env, $this->source, $context["behavior_item"], "value", [], "any", false, false, true, 38), 38, $this->source), "html", null, true);
                        // line 39
                        yield "</span>";
                    }
                    $_parent = $context['_parent'];
                    unset($context['_seq'], $context['_iterated'], $context['_key'], $context['behavior_item'], $context['_parent'], $context['loop']);
                    $context = array_intersect_key($context, $_parent) + $_parent;
                    // line 41
                    yield "</div>
      ";
                }
                // line 43
                yield "    </div>
  ";
            }
            return; yield '';
        })())) ? '' : new Markup($tmp, $this->env->getCharset());
        // line 20
        yield $this->extensions['Drupal\Core\Template\TwigExtension']->renderVar(Twig\Extension\CoreExtension::spaceless($___internal_parse_0_));
        $this->env->getExtension('\Drupal\Core\Template\TwigExtension')
            ->checkDeprecations($context, ["expanded", "content", "behaviors", "attributes", "loop"]);        return; yield '';
    }

    /**
     * @codeCoverageIgnore
     */
    public function getTemplateName()
    {
        return "modules/contrib/paragraphs/templates/paragraphs-summary.html.twig";
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
        return array (  134 => 20,  128 => 43,  124 => 41,  118 => 39,  116 => 38,  111 => 36,  109 => 35,  107 => 34,  103 => 33,  101 => 32,  98 => 31,  94 => 29,  78 => 27,  74 => 26,  57 => 25,  55 => 24,  53 => 23,  48 => 22,  45 => 21,  43 => 20,  41 => 18,  40 => 16,);
    }

    public function getSourceContext()
    {
        return new Source("", "modules/contrib/paragraphs/templates/paragraphs-summary.html.twig", "/var/www/html/pngbaptist/modules/contrib/paragraphs/templates/paragraphs-summary.html.twig");
    }
    
    public function checkSecurity()
    {
        static $tags = array("set" => 16, "apply" => 20, "if" => 21, "for" => 25);
        static $filters = array("escape" => 22, "spaceless" => 20);
        static $functions = array();

        try {
            $this->sandbox->checkSecurity(
                ['set', 'apply', 'if', 'for'],
                ['escape', 'spaceless'],
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
