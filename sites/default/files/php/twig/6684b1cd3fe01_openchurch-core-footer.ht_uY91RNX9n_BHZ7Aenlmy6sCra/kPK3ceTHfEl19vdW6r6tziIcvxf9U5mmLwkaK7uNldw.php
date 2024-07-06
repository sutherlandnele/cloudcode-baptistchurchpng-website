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

/* modules/openchurch_core/templates/openchurch-core-footer.html.twig */
class __TwigTemplate_64358cdb9dd8d645aed695f12ff485de extends Template
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
        // line 1
        yield "<div class=\"container-fluid\">
  <div class=\"row\">
    ";
        // line 3
        if (($context["footer_col1"] ?? null)) {
            // line 4
            yield "      <div class=\"col-6 col-lg-3 mb-2\">
        ";
            // line 5
            yield $this->extensions['Drupal\Core\Template\TwigExtension']->renderVar($this->sandbox->ensureToStringAllowed(($context["footer_col1"] ?? null), 5, $this->source));
            yield "
      </div>
    ";
        }
        // line 8
        yield "    ";
        if (($context["footer_col2"] ?? null)) {
            // line 9
            yield "      <div class=\"col-6 col-lg-3 mb-2\">
        ";
            // line 10
            yield $this->extensions['Drupal\Core\Template\TwigExtension']->renderVar($this->sandbox->ensureToStringAllowed(($context["footer_col2"] ?? null), 10, $this->source));
            yield "
      </div>
    ";
        }
        // line 13
        yield "    ";
        if (($context["footer_col3"] ?? null)) {
            // line 14
            yield "      <div class=\"col-6 col-lg-3 mb-2\">
        ";
            // line 15
            yield $this->extensions['Drupal\Core\Template\TwigExtension']->renderVar($this->sandbox->ensureToStringAllowed(($context["footer_col3"] ?? null), 15, $this->source));
            yield "
      </div>
    ";
        }
        // line 18
        yield "    ";
        if (($context["footer_connect"] ?? null)) {
            // line 19
            yield "      <div class=\"col-6 col-lg-3 mb-2\">
        <h5>";
            // line 20
            yield $this->extensions['Drupal\Core\Template\TwigExtension']->renderVar(t("Connect"));
            yield "</h5>
        <ul class=\"list-inline\">
          ";
            // line 22
            if (($context["footer_facebook"] ?? null)) {
                // line 23
                yield "            <li class=\"list-inline-item\"><a href=\"";
                yield $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(($context["footer_facebook"] ?? null), 23, $this->source), "html", null, true);
                yield "\"><i class=\"bi bi-facebook\"></i></a></li>
          ";
            }
            // line 25
            yield "          ";
            if (($context["footer_twitter"] ?? null)) {
                // line 26
                yield "            <li class=\"list-inline-item\"><a href=\"";
                yield $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(($context["footer_twitter"] ?? null), 26, $this->source), "html", null, true);
                yield "\"><i class=\"bi bi-twitter\"></i></a></li>
          ";
            }
            // line 28
            yield "          ";
            if (($context["footer_instagram"] ?? null)) {
                // line 29
                yield "            <li class=\"list-inline-item\"><a href=\"";
                yield $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(($context["footer_instagram"] ?? null), 29, $this->source), "html", null, true);
                yield "\"><i class=\"bi bi-instagram\"></i></a></li>
          ";
            }
            // line 31
            yield "          ";
            if (($context["footer_youtube"] ?? null)) {
                // line 32
                yield "            <li class=\"list-inline-item\"><a href=\"";
                yield $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(($context["footer_youtube"] ?? null), 32, $this->source), "html", null, true);
                yield "\"><i class=\"bi bi-youtube\"></i></a></li>
          ";
            }
            // line 34
            yield "        </ul>
      </div>
    ";
        }
        // line 37
        yield "  </div>
</div>
";
        $this->env->getExtension('\Drupal\Core\Template\TwigExtension')
            ->checkDeprecations($context, ["footer_col1", "footer_col2", "footer_col3", "footer_connect", "footer_facebook", "footer_twitter", "footer_instagram", "footer_youtube"]);        return; yield '';
    }

    /**
     * @codeCoverageIgnore
     */
    public function getTemplateName()
    {
        return "modules/openchurch_core/templates/openchurch-core-footer.html.twig";
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
        return array (  130 => 37,  125 => 34,  119 => 32,  116 => 31,  110 => 29,  107 => 28,  101 => 26,  98 => 25,  92 => 23,  90 => 22,  85 => 20,  82 => 19,  79 => 18,  73 => 15,  70 => 14,  67 => 13,  61 => 10,  58 => 9,  55 => 8,  49 => 5,  46 => 4,  44 => 3,  40 => 1,);
    }

    public function getSourceContext()
    {
        return new Source("", "modules/openchurch_core/templates/openchurch-core-footer.html.twig", "/var/www/html/pngbaptist/modules/openchurch_core/templates/openchurch-core-footer.html.twig");
    }
    
    public function checkSecurity()
    {
        static $tags = array("if" => 3);
        static $filters = array("raw" => 5, "t" => 20, "escape" => 23);
        static $functions = array();

        try {
            $this->sandbox->checkSecurity(
                ['if'],
                ['raw', 't', 'escape'],
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
