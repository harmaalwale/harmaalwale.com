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
use Twig\TemplateWrapper;

/* @PrestaShop/Admin/Module/common.html.twig */
class __TwigTemplate_54ea97ef3783d75ea7ee7be1de858f5a extends Template
{
    private Source $source;
    /**
     * @var array<string, Template>
     */
    private array $macros = [];

    public function __construct(Environment $env)
    {
        parent::__construct($env);

        $this->source = $this->getSourceContext();

        $this->blocks = [
            'javascripts' => [$this, 'block_javascripts'],
        ];
    }

    protected function doGetParent(array $context): bool|string|Template|TemplateWrapper
    {
        // line 25
        return "@PrestaShop/Admin/layout.html.twig";
    }

    protected function doDisplay(array $context, array $blocks = []): iterable
    {
        $macros = $this->macros;
        // line 54
        $context["js_translatable"] = Twig\Extension\CoreExtension::merge(["Bulk Action - One module minimum" => $this->extensions['Symfony\Bridge\Twig\Extension\TranslationExtension']->trans("You need to select at least one module to use the bulk action.", [], "Admin.Modules.Notification"), "Bulk Action - Request not found" => $this->extensions['Symfony\Bridge\Twig\Extension\TranslationExtension']->trans("The action \"[1]\" is not available, impossible to perform your request.", [], "Admin.Modules.Notification"), "Bulk Action - Request not available for module" => $this->extensions['Symfony\Bridge\Twig\Extension\TranslationExtension']->trans("The action [1] is not available for module [2]. Skipped.", [], "Admin.Modules.Notification"), "An action is already in progress. Please wait for it to finish." => $this->extensions['Symfony\Bridge\Twig\Extension\TranslationExtension']->trans("An action is already in progress. Please wait for it to finish.", [], "Admin.Modules.Notification")],         // line 59
($context["js_translatable"] ?? null));
        // line 25
        $this->parent = $this->loadTemplate("@PrestaShop/Admin/layout.html.twig", "@PrestaShop/Admin/Module/common.html.twig", 25);
        yield from $this->parent->unwrap()->yield($context, array_merge($this->blocks, $blocks));
    }

    // line 27
    /**
     * @return iterable<null|scalar|\Stringable>
     */
    public function block_javascripts(array $context, array $blocks = []): iterable
    {
        $macros = $this->macros;
        // line 28
        yield "  ";
        yield from $this->yieldParentBlock("javascripts", $context, $blocks);
        yield "
  <script>
    var moduleURLs = {
      'configurationPage': '";
        // line 31
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("admin_module_configure_action", ["module_name" => ":number:"]), "js"), "html", null, true);
        yield "',
      'moduleImport': '";
        // line 32
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("admin_module_import"), "js"), "html", null, true);
        yield "',
      'notificationsCount': '";
        // line 33
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("admin_module_notification_count"), "js"), "html", null, true);
        yield "',
      'maintenancePage': '";
        // line 34
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("admin_maintenance"), "js"), "html", null, true);
        yield "',
    };

    var moduleTranslations = {
      'singleModuleModalUpdateTitle': '";
        // line 38
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->extensions['Symfony\Bridge\Twig\Extension\TranslationExtension']->trans("Are you sure you want to update this module?", [], "Admin.Modules.Notification"), "html", null, true);
        yield "',
      'multipleModuleModalUpdateTitle': '";
        // line 39
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->extensions['Symfony\Bridge\Twig\Extension\TranslationExtension']->trans("Are you sure you want to update these modules?", [], "Admin.Modules.Notification"), "html", null, true);
        yield "',
      'moduleModalUpdateCancel': '";
        // line 40
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->extensions['Symfony\Bridge\Twig\Extension\TranslationExtension']->trans("Cancel", [], "Admin.Actions"), "html", null, true);
        yield "',
      'moduleModalUpdateMaintenance': '";
        // line 41
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->extensions['Symfony\Bridge\Twig\Extension\TranslationExtension']->trans("Go to maintenance page", [], "Admin.Actions"), "html", null, true);
        yield "',
      'moduleModalUpdateUpgrade': '";
        // line 42
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->extensions['Symfony\Bridge\Twig\Extension\TranslationExtension']->trans("Upgrade", [], "Admin.Actions"), "html", null, true);
        yield "',
      'upgradeAnywayButtonText': '";
        // line 43
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->extensions['Symfony\Bridge\Twig\Extension\TranslationExtension']->trans("Update anyway", [], "Admin.Actions"), "html", null, true);
        yield "',
      'moduleModalUpdateConfirmMessage': '";
        // line 44
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->extensions['Symfony\Bridge\Twig\Extension\TranslationExtension']->trans("We strongly advise you to update the modules on maintenance mode to avoid any cache issues.", [], "Admin.Modules.Notification"), "html", null, true);
        yield "',
    };

    // Need to come from the backend
    var isShopMaintenance = !";
        // line 48
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->extensions['PrestaShopBundle\Twig\DataFormatterExtension']->intCast($this->extensions['PrestaShopBundle\Twig\LayoutExtension']->getConfiguration("PS_SHOP_ENABLE")), "html", null, true);
        yield ";
  </script>
  <script src=\"";
        // line 50
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->extensions['Symfony\Bridge\Twig\Extension\AssetExtension']->getAssetUrl("themes/default/js/bundle/plugins/jquery.pstagger.js"), "html", null, true);
        yield "\"></script>
  <script src=\"";
        // line 51
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->extensions['Symfony\Bridge\Twig\Extension\AssetExtension']->getAssetUrl("themes/new-theme/public/module.bundle.js"), "html", null, true);
        yield "\"></script>
";
        yield from [];
    }

    /**
     * @codeCoverageIgnore
     */
    public function getTemplateName(): string
    {
        return "@PrestaShop/Admin/Module/common.html.twig";
    }

    /**
     * @codeCoverageIgnore
     */
    public function isTraitable(): bool
    {
        return false;
    }

    /**
     * @codeCoverageIgnore
     */
    public function getDebugInfo(): array
    {
        return array (  128 => 51,  124 => 50,  119 => 48,  112 => 44,  108 => 43,  104 => 42,  100 => 41,  96 => 40,  92 => 39,  88 => 38,  81 => 34,  77 => 33,  73 => 32,  69 => 31,  62 => 28,  55 => 27,  50 => 25,  48 => 59,  47 => 54,  40 => 25,);
    }

    public function getSourceContext(): Source
    {
        return new Source("", "@PrestaShop/Admin/Module/common.html.twig", "/home1/harmakko/public_html/PS/src/PrestaShopBundle/Resources/views/Admin/Module/common.html.twig");
    }
}
