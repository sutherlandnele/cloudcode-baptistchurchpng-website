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

/* @help_topics/responsive_image.style.html.twig */
class __TwigTemplate_ab25a6d8efe7d9226e33ba713b2f51cd extends Template
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
        // line 10
        $context["media_topic"] = $this->extensions['Drupal\Core\Template\TwigExtension']->renderVar($this->extensions['Drupal\help\HelpTwigExtension']->getTopicLink("core.media"));
        // line 11
        $context["image_style_topic"] = $this->extensions['Drupal\Core\Template\TwigExtension']->renderVar($this->extensions['Drupal\help\HelpTwigExtension']->getTopicLink("image.style"));
        // line 12
        $context["breakpoint_overview_topic"] = $this->extensions['Drupal\Core\Template\TwigExtension']->renderVar($this->extensions['Drupal\help\HelpTwigExtension']->getTopicLink("breakpoint.overview"));
        // line 13
        $context["styles_link_text"] = ('' === $tmp = \Twig\Extension\CoreExtension::captureOutput((function () use (&$context, $macros, $blocks) {
            yield t("Responsive image styles", array());
            return; yield '';
        })())) ? '' : new Markup($tmp, $this->env->getCharset());
        // line 14
        $context["styles_link"] = $this->extensions['Drupal\Core\Template\TwigExtension']->renderVar($this->extensions['Drupal\help\HelpTwigExtension']->getRouteLink($this->sandbox->ensureToStringAllowed(($context["styles_link_text"] ?? null), 14, $this->source), "entity.responsive_image_style.collection"));
        // line 15
        yield "<h2>";
        yield t("Goal", array());
        yield "</h2>
<p>";
        // line 16
        yield t("Configure a responsive image style, which can be used to display images at different sizes on different devices. See @media_topic for an overview of responsive image styles, and @breakpoint_overview_topic for an overview of breakpoints.", array("@media_topic" => ($context["media_topic"] ?? null), "@breakpoint_overview_topic" => ($context["breakpoint_overview_topic"] ?? null), ));
        yield "</p>
<h2>";
        // line 17
        yield t("Steps", array());
        yield "</h2>
<ol>
  <li>";
        // line 19
        yield t("In the <em>Manage</em> administrative menu, navigate to <em>Configuration</em> &gt; <em>Media</em> &gt; <em>@styles_link</em>.", array("@styles_link" => ($context["styles_link"] ?? null), ));
        yield "</li>
  <li>";
        // line 20
        yield t("Click <em>Add responsive image style</em>.", array());
        yield "</li>
  <li>";
        // line 21
        yield t("Enter a descriptive <em>Label</em> for your style.", array());
        yield "</li>
  <li>";
        // line 22
        yield t("Select a <em>Breakpoint group</em> from the groups defined by your installed themes and modules.", array());
        yield "</li>
  <li>";
        // line 23
        yield t("Select a <em>Fallback image style</em> to use when none of the other styles apply. See @image_style_topic if you need to add a new style.", array("@image_style_topic" => ($context["image_style_topic"] ?? null), ));
        yield "</li>
  <li>";
        // line 24
        yield t("Click <em>Save</em>.", array());
        yield "</li>
  <li>";
        // line 25
        yield t("On the next page, locate the fieldsets for the breakpoints provided by the selected <em>Breakpoint group</em>.", array());
        yield "</li>
  <li>";
        // line 26
        yield t("For each breakpoint that you want to use, expand the corresponding fieldset. Select the <em>Select a single image style.</em> radio button under <em>Type</em> for the breakpoint, and select the <em>Image style</em> to use for images when that breakpoint is in effect. Repeat this step for the rest of the breakpoints you want to use.", array());
        yield "</li>
  <li>";
        // line 27
        yield t("Click <em>Save</em>", array());
        yield "</li>
  <li>";
        // line 28
        yield t("You can now use this responsive image style to format a field containing an image, in your layouts or traditional field displays. See related topics below for more information.", array());
        yield "</li>
</ol>";
        return; yield '';
    }

    /**
     * @codeCoverageIgnore
     */
    public function getTemplateName()
    {
        return "@help_topics/responsive_image.style.html.twig";
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
        return array (  103 => 28,  99 => 27,  95 => 26,  91 => 25,  87 => 24,  83 => 23,  79 => 22,  75 => 21,  71 => 20,  67 => 19,  62 => 17,  58 => 16,  53 => 15,  51 => 14,  46 => 13,  44 => 12,  42 => 11,  40 => 10,);
    }

    public function getSourceContext()
    {
        return new Source("", "@help_topics/responsive_image.style.html.twig", "/var/www/html/pngbaptist/core/modules/responsive_image/help_topics/responsive_image.style.html.twig");
    }
    
    public function checkSecurity()
    {
        static $tags = array("set" => 10, "trans" => 13);
        static $filters = array("escape" => 16);
        static $functions = array("render_var" => 10, "help_topic_link" => 10, "help_route_link" => 14);

        try {
            $this->sandbox->checkSecurity(
                ['set', 'trans'],
                ['escape'],
                ['render_var', 'help_topic_link', 'help_route_link'],
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
