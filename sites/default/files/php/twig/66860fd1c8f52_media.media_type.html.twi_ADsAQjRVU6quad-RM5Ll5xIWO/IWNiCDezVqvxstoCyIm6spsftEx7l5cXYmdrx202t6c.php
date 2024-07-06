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

/* @help_topics/media.media_type.html.twig */
class __TwigTemplate_c9bf941fcc8512c5be8f862550d28e47 extends Template
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
        // line 8
        $context["content_structure_topic"] = $this->extensions['Drupal\Core\Template\TwigExtension']->renderVar($this->extensions['Drupal\help\HelpTwigExtension']->getTopicLink("core.content_structure"));
        // line 9
        $context["media_topic"] = $this->extensions['Drupal\Core\Template\TwigExtension']->renderVar($this->extensions['Drupal\help\HelpTwigExtension']->getTopicLink("core.media"));
        // line 10
        $context["media_text"] = ('' === $tmp = \Twig\Extension\CoreExtension::captureOutput((function () use (&$context, $macros, $blocks) {
            yield t("Media types", array());
            return; yield '';
        })())) ? '' : new Markup($tmp, $this->env->getCharset());
        // line 11
        $context["media_link"] = $this->extensions['Drupal\Core\Template\TwigExtension']->renderVar($this->extensions['Drupal\help\HelpTwigExtension']->getRouteLink($this->sandbox->ensureToStringAllowed(($context["media_text"] ?? null), 11, $this->source), "entity.media_type.collection"));
        // line 12
        yield "<h2>";
        yield t("Goal", array());
        yield "</h2>
<p>";
        // line 13
        yield t("Add a new media type that can be referenced in Media reference fields; media types are a content entity type. See @media_topic for an overview of media items and media types, and @content_structure_topic for more information on content entities and fields.", array("@media_topic" => ($context["media_topic"] ?? null), "@content_structure_topic" => ($context["content_structure_topic"] ?? null), ));
        yield "</p>
<h2>";
        // line 14
        yield t("Steps", array());
        yield "</h2>
<ol>
  <li>";
        // line 16
        yield t("In the <em>Manage</em> administrative menu, navigate to <em>Structure</em> &gt; @media_link.", array("@media_link" => ($context["media_link"] ?? null), ));
        yield "</li>
  <li>";
        // line 17
        yield t("If there is not already a media type for the type of media you want to use on your site, click <em>Add media type</em>.", array());
        yield "</li>
  <li>";
        // line 18
        yield t("Enter a <em>Name</em> and <em>Description</em> for your media type, and select the <em>Media source</em>.", array());
        yield "</li>
  <li>";
        // line 19
        yield t("For most media sources, there is additional information that will need to be stored with your media item, in a field on your media type. Under <em>Media source configuration</em>, select an existing field to re-use to store this information, or select <em> - Create -</em> to create a new field.", array());
        yield "</li>
  <li>";
        // line 20
        yield t("Note the types of metadata in the <em>Field mapping</em> section that can be mapped to fields on your media type.", array());
        yield "</li>
  <li>";
        // line 21
        yield t("Click <em>Save</em>.", array());
        yield "</li>
  <li>";
        // line 22
        yield t("Optionally, add additional fields for the metadata noted above or for other information that you want to store to your media type by clicking on <em>Manage fields</em> (see related topic below).", array());
        yield "</li>
  <li>";
        // line 23
        yield t("If you have added metadata fields, click <em>Edit</em>. Under <em>Field mapping</em>, select the fields you added for each piece of metadata information.", array());
        yield "</li>
  <li>";
        // line 24
        yield t("Click <em>Save</em>.", array());
        yield "</li>
  <li>";
        // line 25
        yield t("You can now use this media type by adding a Media reference field to any content entity sub-type. See related topic below.", array());
        yield "</li>
</ol>";
        return; yield '';
    }

    /**
     * @codeCoverageIgnore
     */
    public function getTemplateName()
    {
        return "@help_topics/media.media_type.html.twig";
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
        return array (  101 => 25,  97 => 24,  93 => 23,  89 => 22,  85 => 21,  81 => 20,  77 => 19,  73 => 18,  69 => 17,  65 => 16,  60 => 14,  56 => 13,  51 => 12,  49 => 11,  44 => 10,  42 => 9,  40 => 8,);
    }

    public function getSourceContext()
    {
        return new Source("", "@help_topics/media.media_type.html.twig", "/var/www/html/pngbaptist/core/modules/media/help_topics/media.media_type.html.twig");
    }
    
    public function checkSecurity()
    {
        static $tags = array("set" => 8, "trans" => 10);
        static $filters = array("escape" => 13);
        static $functions = array("render_var" => 8, "help_topic_link" => 8, "help_route_link" => 11);

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
