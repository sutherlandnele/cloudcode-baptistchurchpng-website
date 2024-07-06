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

/* modules/openchurch_core/templates/openchurch-core-newsletter.html.twig */
class __TwigTemplate_fbad6443669ace483aee10383f9e4bd9 extends Template
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
        yield "<section class=\"subscribe-area bg-secondary p-5 text-white\">
    <div class=\"container-fluid\">
      <div class=\"row align-items-center\">

        <div class=\"col-12 col-lg-6\">
          <div class=\"subscribe-text\">
            <h3>";
        // line 7
        yield $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(($context["title"] ?? null), 7, $this->source), "html", null, true);
        yield "</h3>
            <h6>";
        // line 8
        yield $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(($context["description"] ?? null), 8, $this->source), "html", null, true);
        yield "</h6>
          </div>
        </div>

        <div class=\"col-12 col-lg-6\">
          <div class=\"subscribe-form text-right\">
            <form action=\"";
        // line 14
        yield $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(($context["action"] ?? null), 14, $this->source), "html", null, true);
        yield "\" method=\"POST\">
              <div class=\"input-group mb-3\">
                <input type=\"text\" id=\"email\" type=\"email\" name=\"email\" required class=\"form-control\" placeholder=\"";
        // line 16
        yield $this->extensions['Drupal\Core\Template\TwigExtension']->renderVar(t("Your Email"));
        yield "\" aria-label=\"";
        yield $this->extensions['Drupal\Core\Template\TwigExtension']->renderVar(t("Your Email"));
        yield "\" aria-describedby=\"button-subscribe\">
                <button class=\"btn btn-primary\" type=\"submit\" id=\"button-subscribe\">";
        // line 17
        yield $this->extensions['Drupal\Core\Template\TwigExtension']->renderVar(t("Subscribe"));
        yield " <i class=\"bi bi-arrow-right\"></i></button>
              </div>
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>
";
        $this->env->getExtension('\Drupal\Core\Template\TwigExtension')
            ->checkDeprecations($context, ["title", "description", "action"]);        return; yield '';
    }

    /**
     * @codeCoverageIgnore
     */
    public function getTemplateName()
    {
        return "modules/openchurch_core/templates/openchurch-core-newsletter.html.twig";
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
        return array (  72 => 17,  66 => 16,  61 => 14,  52 => 8,  48 => 7,  40 => 1,);
    }

    public function getSourceContext()
    {
        return new Source("", "modules/openchurch_core/templates/openchurch-core-newsletter.html.twig", "/var/www/html/pngbaptist/modules/openchurch_core/templates/openchurch-core-newsletter.html.twig");
    }
    
    public function checkSecurity()
    {
        static $tags = array();
        static $filters = array("escape" => 7, "t" => 16);
        static $functions = array();

        try {
            $this->sandbox->checkSecurity(
                [],
                ['escape', 't'],
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
