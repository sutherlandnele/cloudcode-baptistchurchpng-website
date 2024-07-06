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

/* @help_topics/content_moderation.changing_states.html.twig */
class __TwigTemplate_cd620224cb2d5327f97b8e87aae29f86 extends Template
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
        $context["workflows_overview_topic"] = $this->extensions['Drupal\Core\Template\TwigExtension']->renderVar($this->extensions['Drupal\help\HelpTwigExtension']->getTopicLink("workflows.overview"));
        // line 9
        $context["content_structure_topic"] = $this->extensions['Drupal\Core\Template\TwigExtension']->renderVar($this->extensions['Drupal\help\HelpTwigExtension']->getTopicLink("core.content_structure"));
        // line 10
        $context["content_moderation_permissions_link_text"] = ('' === $tmp = \Twig\Extension\CoreExtension::captureOutput((function () use (&$context, $macros, $blocks) {
            yield t("Content Moderation", array());
            return; yield '';
        })())) ? '' : new Markup($tmp, $this->env->getCharset());
        // line 11
        $context["content_moderation_permissions_link"] = $this->extensions['Drupal\Core\Template\TwigExtension']->renderVar($this->extensions['Drupal\help\HelpTwigExtension']->getRouteLink($this->sandbox->ensureToStringAllowed(($context["content_moderation_permissions_link_text"] ?? null), 11, $this->source), "user.admin_permissions", [], ["fragment" => "module-content_moderation"]));
        // line 12
        $context["content_link_text"] = ('' === $tmp = \Twig\Extension\CoreExtension::captureOutput((function () use (&$context, $macros, $blocks) {
            yield t("Content", array());
            return; yield '';
        })())) ? '' : new Markup($tmp, $this->env->getCharset());
        // line 13
        $context["content_link"] = $this->extensions['Drupal\Core\Template\TwigExtension']->renderVar($this->extensions['Drupal\help\HelpTwigExtension']->getRouteLink($this->sandbox->ensureToStringAllowed(($context["content_link_text"] ?? null), 13, $this->source), "system.admin_content"));
        // line 14
        yield "<h2>";
        yield t("Goal", array());
        yield "</h2>
<p>";
        // line 15
        yield t("Change the workflow state of a particular entity. See @workflows_overview_topic for an overview of workflows, and @content_structure_topic for an overview of content entities.", array("@workflows_overview_topic" => ($context["workflows_overview_topic"] ?? null), "@content_structure_topic" => ($context["content_structure_topic"] ?? null), ));
        yield "</p>
<h2>";
        // line 16
        yield t("Who can change workflow states?", array());
        yield "</h2>
<p>";
        // line 17
        yield t("Users with <em>content moderation permissions</em> can change workflow states. There are separate permissions for each transition. See Permissions &gt; <em>@content_moderation_permissions_link</em> to configure content moderation permissions.", array("@content_moderation_permissions_link" => ($context["content_moderation_permissions_link"] ?? null), ));
        yield "</p>
<h2>";
        // line 18
        yield t("Steps", array());
        yield "</h2>
<ol>
  <li>";
        // line 20
        yield t("Find the entity that you want to moderate in either the content moderation view page, if you created one, or the appropriate administrative page for managing that type of entity (such as the administration page for content items; see @content_link).", array("@content_link" => ($context["content_link"] ?? null), ));
        yield "</li>
  <li>";
        // line 21
        yield t("Click <em>Edit</em> to edit the entity.", array());
        yield "</li>
  <li>";
        // line 22
        yield t("At the bottom of the page, select the new workflow state under <em>Change to:</em> and click <em>Save</em>.", array());
        yield "</li>
</ol>";
        return; yield '';
    }

    /**
     * @codeCoverageIgnore
     */
    public function getTemplateName()
    {
        return "@help_topics/content_moderation.changing_states.html.twig";
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
        return array (  88 => 22,  84 => 21,  80 => 20,  75 => 18,  71 => 17,  67 => 16,  63 => 15,  58 => 14,  56 => 13,  51 => 12,  49 => 11,  44 => 10,  42 => 9,  40 => 8,);
    }

    public function getSourceContext()
    {
        return new Source("", "@help_topics/content_moderation.changing_states.html.twig", "/var/www/html/pngbaptist/core/modules/content_moderation/help_topics/content_moderation.changing_states.html.twig");
    }
    
    public function checkSecurity()
    {
        static $tags = array("set" => 8, "trans" => 10);
        static $filters = array("escape" => 15);
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
