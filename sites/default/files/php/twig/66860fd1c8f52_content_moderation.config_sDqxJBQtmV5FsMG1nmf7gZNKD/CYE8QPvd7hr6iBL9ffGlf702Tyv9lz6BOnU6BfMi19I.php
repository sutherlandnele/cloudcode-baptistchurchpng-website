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

/* @help_topics/content_moderation.configuring_workflows.html.twig */
class __TwigTemplate_dce0a50794573bfc605975a9c8c34743 extends Template
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
        // line 9
        $context["content_structure_topic"] = $this->extensions['Drupal\Core\Template\TwigExtension']->renderVar($this->extensions['Drupal\help\HelpTwigExtension']->getTopicLink("core.content_structure"));
        // line 10
        $context["user_overview_topic"] = $this->extensions['Drupal\Core\Template\TwigExtension']->renderVar($this->extensions['Drupal\help\HelpTwigExtension']->getTopicLink("user.overview"));
        // line 11
        $context["user_permissions_topic"] = $this->extensions['Drupal\Core\Template\TwigExtension']->renderVar($this->extensions['Drupal\help\HelpTwigExtension']->getTopicLink("user.permissions"));
        // line 12
        $context["workflows_overview_topic"] = $this->extensions['Drupal\Core\Template\TwigExtension']->renderVar($this->extensions['Drupal\help\HelpTwigExtension']->getTopicLink("workflows.overview"));
        // line 13
        $context["content_moderation_permissions_link_text"] = ('' === $tmp = \Twig\Extension\CoreExtension::captureOutput((function () use (&$context, $macros, $blocks) {
            yield t("Content Moderation", array());
            return; yield '';
        })())) ? '' : new Markup($tmp, $this->env->getCharset());
        // line 14
        $context["content_moderation_permissions_link"] = $this->extensions['Drupal\Core\Template\TwigExtension']->renderVar($this->extensions['Drupal\help\HelpTwigExtension']->getRouteLink($this->sandbox->ensureToStringAllowed(($context["content_moderation_permissions_link_text"] ?? null), 14, $this->source), "user.admin_permissions", [], ["fragment" => "module-content_moderation"]));
        // line 15
        $context["workflows_permissions_link_text"] = ('' === $tmp = \Twig\Extension\CoreExtension::captureOutput((function () use (&$context, $macros, $blocks) {
            yield t("Administer workflows", array());
            return; yield '';
        })())) ? '' : new Markup($tmp, $this->env->getCharset());
        // line 16
        $context["workflows_permissions_link"] = $this->extensions['Drupal\Core\Template\TwigExtension']->renderVar($this->extensions['Drupal\help\HelpTwigExtension']->getRouteLink($this->sandbox->ensureToStringAllowed(($context["workflows_permissions_link_text"] ?? null), 16, $this->source), "user.admin_permissions", [], ["fragment" => "module-workflows"]));
        // line 17
        $context["workflows_link_text"] = ('' === $tmp = \Twig\Extension\CoreExtension::captureOutput((function () use (&$context, $macros, $blocks) {
            yield t("Workflows", array());
            return; yield '';
        })())) ? '' : new Markup($tmp, $this->env->getCharset());
        // line 18
        $context["workflows_link"] = $this->extensions['Drupal\Core\Template\TwigExtension']->renderVar($this->extensions['Drupal\help\HelpTwigExtension']->getRouteLink($this->sandbox->ensureToStringAllowed(($context["workflows_link_text"] ?? null), 18, $this->source), "entity.workflow.collection"));
        // line 19
        yield "<h2>";
        yield t("Goal", array());
        yield "</h2>
<p>";
        // line 20
        yield t("Create or edit a workflow with various workflow states (for example <em>Concept</em>, <em>Archived</em>, etc.) for moderating content. See @workflows_overview_topic for more information on workflows.", array("@workflows_overview_topic" => ($context["workflows_overview_topic"] ?? null), ));
        yield "</p>
<h2>";
        // line 21
        yield t("Who can configure a workflow?", array());
        yield "</h2>
<p>";
        // line 22
        yield t("Users with <em>workflows permissions</em> (typically administrators) can configure workflows. See Permissions &gt; <em>@workflows_permissions_link</em> to configure workflows permissions.", array("@workflows_permissions_link" => ($context["workflows_permissions_link"] ?? null), ));
        yield "</p>
<h2>";
        // line 23
        yield t("Steps", array());
        yield "</h2>
<ol>
  <li>";
        // line 25
        yield t("Make a plan for the new workflow:", array());
        // line 26
        yield "    <ul>
      <li>";
        // line 27
        yield t("Decide which workflow states you need; for example, <em>Concept</em>, <em>Review</em>, and <em>Final</em>.", array());
        yield "</li>
      <li>";
        // line 28
        yield t("Decide on the settings for each state:", array());
        // line 29
        yield "        <ul>
          <li>";
        // line 30
        yield t("<em>Label</em>: the state name", array());
        yield "</li>
          <li>";
        // line 31
        yield t("<em>Published</em>: if checked, when content reaches this state it will be made visible on the site (to users with permission).", array());
        yield "</li>
          <li>";
        // line 32
        yield t("<em>Default revision</em>: if checked, when content reaches this state it will become the default revision of the content; published content is automatically the default revision.", array());
        yield "</li>
        </ul>
      </li>
      <li>";
        // line 35
        yield t("Decide which state content should be created in.", array());
        yield "</li>
      <li>";
        // line 36
        yield t("Decide on the list of allowed transitions between states. For example, you might want a transition between <em>Concept</em> and <em>Review</em>. Each transition has a label; for example, the Concept to Review transition might be labeled \"Review concept\".", array());
        yield "</li>
      <li>";
        // line 37
        yield t("Decide which roles should have permissions to make each transition; see @user_overview_topic for an overview of roles and permissions.", array("@user_overview_topic" => ($context["user_overview_topic"] ?? null), ));
        yield "</li>
      <li>";
        // line 38
        yield t("Decide which <em>entity types</em> and subtypes the workflow should apply to. Only entity types that support revisions are possible to define workflows for. See @content_structure_topic for more information on content entities and fields.", array("@content_structure_topic" => ($context["content_structure_topic"] ?? null), ));
        yield "</li>
    </ul>
  </li>
  <li>";
        // line 41
        yield t("To implement your plan, in the <em>Manage</em> administrative menu, navigate to <em>Configuration</em> &gt; <em>Workflow</em> &gt; <em>@workflows_link</em>. A list of workflows is shown, including the default workflow <em>Editorial</em> that you can adapt.", array("@workflows_link" => ($context["workflows_link"] ?? null), ));
        yield "</li>
  <li>";
        // line 42
        yield t("Click <em>Add workflow</em>.", array());
        yield "</li>
  <li>";
        // line 43
        yield t("Enter a name in the <em>Label</em> field, select <em>Content moderation</em> from the <em>Workflow type</em> field, and click <em>Save</em>.", array());
        yield "</li>
  <li>";
        // line 44
        yield t("Verify that the <em>States</em> list matches your planned states. You can add missing states by clicking <em>Add a new state</em>. You can edit or delete states by clicking <em>Edit</em> or <em>Delete</em> under <em>Operations</em> (if the <em>Delete</em> option is not available, you will first need to delete any <em>Transitions</em> to or from this state).", array());
        yield "</li>
  <li>";
        // line 45
        yield t("Verify that the <em>Transitions</em> list matches your plan. You can add missing transitions by clicking <em>Add a new transition</em>. You can edit or delete transitions by clicking <em>Edit</em> or <em>Delete</em> under <em>Operations</em>.", array());
        yield "</li>
  <li>";
        // line 46
        yield t("Under <em>This workflow applies to:</em>, find the entity type that you want this workflow to apply to, such as Content revisions, Content block revisions, or Taxonomy term revisions. Click <em>Select</em>.", array());
        yield "</li>
  <li>";
        // line 47
        yield t("Check the entity subtypes that you want to apply the workflow to. For example, you might choose to apply your workflow to the <em>Page</em> content type, but not to <em>Article</em>.", array());
        yield "</li>
  <li>";
        // line 48
        yield t("Click <em>Save</em>.", array());
        yield "</li>
  <li>";
        // line 49
        yield t("Under <em>Workflow settings</em>, select the <em>Default moderation state</em> for new content.", array());
        yield "</li>
  <li>";
        // line 50
        yield t("Click <em>Save</em> to save your workflow.", array());
        yield "</li>
  <li>";
        // line 51
        yield t("Follow the steps in @user_permissions_topic to assign permissions for each transition to roles. The permissions are listed under the <em>@content_moderation_permissions_link</em> section; there is one permission for each transition in each workflow.", array("@user_permissions_topic" => ($context["user_permissions_topic"] ?? null), "@content_moderation_permissions_link" => ($context["content_moderation_permissions_link"] ?? null), ));
        yield "</li>
  <li>";
        // line 52
        yield t("Optionally (recommended), create a view for your custom workflow, to provide a page for content editors to see what content needs to be moderated. You can do this if the Views UI module is installed, by following the steps in the related <em>Creating a new view</em> topic listed below under <em>Related topics</em>. When creating the view, under <em>View settings</em> &gt; <em>Show</em>, select the revision data type you configured the workflow for, and be sure to display the <em>Workflow State</em> field in your view.", array());
        yield "</li>
</ol>";
        return; yield '';
    }

    /**
     * @codeCoverageIgnore
     */
    public function getTemplateName()
    {
        return "@help_topics/content_moderation.configuring_workflows.html.twig";
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
        return array (  181 => 52,  177 => 51,  173 => 50,  169 => 49,  165 => 48,  161 => 47,  157 => 46,  153 => 45,  149 => 44,  145 => 43,  141 => 42,  137 => 41,  131 => 38,  127 => 37,  123 => 36,  119 => 35,  113 => 32,  109 => 31,  105 => 30,  102 => 29,  100 => 28,  96 => 27,  93 => 26,  91 => 25,  86 => 23,  82 => 22,  78 => 21,  74 => 20,  69 => 19,  67 => 18,  62 => 17,  60 => 16,  55 => 15,  53 => 14,  48 => 13,  46 => 12,  44 => 11,  42 => 10,  40 => 9,);
    }

    public function getSourceContext()
    {
        return new Source("", "@help_topics/content_moderation.configuring_workflows.html.twig", "/var/www/html/pngbaptist/core/modules/content_moderation/help_topics/content_moderation.configuring_workflows.html.twig");
    }
    
    public function checkSecurity()
    {
        static $tags = array("set" => 9, "trans" => 13);
        static $filters = array("escape" => 20);
        static $functions = array("render_var" => 9, "help_topic_link" => 9, "help_route_link" => 14);

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
