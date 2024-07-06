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

/* core/themes/claro/templates/admin/indentation.html.twig */
class __TwigTemplate_50090b7157ba7daf23388f65d21134ed extends Template
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
        // line 12
        if ((($context["size"] ?? null) > 0)) {
            $context['_parent'] = $context;
            $context['_seq'] = CoreExtension::ensureTraversable(range(1, ($context["size"] ?? null)));
            foreach ($context['_seq'] as $context["_key"] => $context["i"]) {
                yield "<div class=\"js-indentation indentation\">
  <svg
    xmlns=\"http://www.w3.org/2000/svg\"
    class=\"tree\"
    width=\"25\"
    height=\"25\"
    viewBox=\"0 0 25 25\">
    <path
      class=\"tree__item tree__item-child-ltr tree__item-child-last-ltr tree__item-horizontal tree__item-horizontal-right\"
      d=\"M12,12.5 H25\"
      stroke=\"#888\"/>
    <path
      class=\"tree__item tree__item-child-rtl tree__item-child-last-rtl tree__item-horizontal tree__horizontal-left\"
      d=\"M0,12.5 H13\"
      stroke=\"#888\"/>
    <path
      class=\"tree__item tree__item-child-ltr tree__item-child-rtl tree__item-child-last-ltr tree__item-child-last-rtl tree__vertical tree__vertical-top\"
      d=\"M12.5,12 v-99\"
      stroke=\"#888\"/>
    <path
      class=\"tree__item tree__item-child-ltr tree__item-child-rtl tree__vertical tree__vertical-bottom\"
      d=\"M12.5,12 v99\"
      stroke=\"#888\"/>
  </svg>
</div>";
            }
            $_parent = $context['_parent'];
            unset($context['_seq'], $context['_iterated'], $context['_key'], $context['i'], $context['_parent'], $context['loop']);
            $context = array_intersect_key($context, $_parent) + $_parent;
        }
        $this->env->getExtension('\Drupal\Core\Template\TwigExtension')
            ->checkDeprecations($context, ["size"]);        return; yield '';
    }

    /**
     * @codeCoverageIgnore
     */
    public function getTemplateName()
    {
        return "core/themes/claro/templates/admin/indentation.html.twig";
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
        return array (  40 => 12,);
    }

    public function getSourceContext()
    {
        return new Source("", "core/themes/claro/templates/admin/indentation.html.twig", "/var/www/html/pngbaptist/core/themes/claro/templates/admin/indentation.html.twig");
    }
    
    public function checkSecurity()
    {
        static $tags = array("if" => 12, "for" => 12);
        static $filters = array();
        static $functions = array("range" => 12);

        try {
            $this->sandbox->checkSecurity(
                ['if', 'for'],
                [],
                ['range'],
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
