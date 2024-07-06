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

/* core/themes/claro/templates/classy/misc/help-section.html.twig */
class __TwigTemplate_9f030f7c57b9b11668264c299a0b0e7b extends Template
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
        // line 15
        yield "<div class=\"clearfix\">
  <h2>";
        // line 16
        yield $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(($context["title"] ?? null), 16, $this->source), "html", null, true);
        yield "</h2>
  <p>";
        // line 17
        yield $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(($context["description"] ?? null), 17, $this->source), "html", null, true);
        yield "</p>
  ";
        // line 18
        if (($context["links"] ?? null)) {
            // line 19
            yield "    ";
            // line 20
            yield "    ";
            $context["size"] = (int) floor((Twig\Extension\CoreExtension::length($this->env->getCharset(), $this->sandbox->ensureToStringAllowed(($context["links"] ?? null), 20, $this->source)) / 4));
            // line 21
            yield "    ";
            if (((($context["size"] ?? null) * 4) < Twig\Extension\CoreExtension::length($this->env->getCharset(), ($context["links"] ?? null)))) {
                // line 22
                yield "      ";
                $context["size"] = (($context["size"] ?? null) + 1);
                // line 23
                yield "    ";
            }
            // line 24
            yield "
    ";
            // line 26
            yield "    ";
            $context["count"] = 0;
            // line 27
            yield "    ";
            $context['_parent'] = $context;
            $context['_seq'] = CoreExtension::ensureTraversable(($context["links"] ?? null));
            foreach ($context['_seq'] as $context["_key"] => $context["link"]) {
                // line 28
                yield "      ";
                if ((($context["count"] ?? null) == 0)) {
                    // line 29
                    yield "                <div class=\"layout-column layout-column--quarter\"><ul>
      ";
                }
                // line 32
                yield "      <li>";
                yield $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed($context["link"], 32, $this->source), "html", null, true);
                yield "</li>
      ";
                // line 33
                $context["count"] = (($context["count"] ?? null) + 1);
                // line 34
                yield "      ";
                if ((($context["count"] ?? null) >= ($context["size"] ?? null))) {
                    // line 35
                    yield "        ";
                    // line 36
                    yield "        ";
                    $context["count"] = 0;
                    // line 37
                    yield "        </ul></div>
      ";
                }
                // line 39
                yield "    ";
            }
            $_parent = $context['_parent'];
            unset($context['_seq'], $context['_iterated'], $context['_key'], $context['link'], $context['_parent'], $context['loop']);
            $context = array_intersect_key($context, $_parent) + $_parent;
            // line 40
            yield "
    ";
            // line 42
            yield "    ";
            if ((($context["count"] ?? null) > 0)) {
                // line 43
                yield "      </ul></div>
    ";
            }
            // line 45
            yield "  ";
        } else {
            // line 46
            yield "    <p>";
            yield $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(($context["empty"] ?? null), 46, $this->source), "html", null, true);
            yield "</p>
  ";
        }
        // line 48
        yield "</div>
";
        $this->env->getExtension('\Drupal\Core\Template\TwigExtension')
            ->checkDeprecations($context, ["title", "description", "links", "empty"]);        return; yield '';
    }

    /**
     * @codeCoverageIgnore
     */
    public function getTemplateName()
    {
        return "core/themes/claro/templates/classy/misc/help-section.html.twig";
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
        return array (  129 => 48,  123 => 46,  120 => 45,  116 => 43,  113 => 42,  110 => 40,  104 => 39,  100 => 37,  97 => 36,  95 => 35,  92 => 34,  90 => 33,  85 => 32,  81 => 29,  78 => 28,  73 => 27,  70 => 26,  67 => 24,  64 => 23,  61 => 22,  58 => 21,  55 => 20,  53 => 19,  51 => 18,  47 => 17,  43 => 16,  40 => 15,);
    }

    public function getSourceContext()
    {
        return new Source("", "core/themes/claro/templates/classy/misc/help-section.html.twig", "/var/www/html/pngbaptist/core/themes/claro/templates/classy/misc/help-section.html.twig");
    }
    
    public function checkSecurity()
    {
        static $tags = array("if" => 18, "set" => 20, "for" => 27);
        static $filters = array("escape" => 16, "length" => 20);
        static $functions = array();

        try {
            $this->sandbox->checkSecurity(
                ['if', 'set', 'for'],
                ['escape', 'length'],
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
