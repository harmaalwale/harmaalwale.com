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

/* @Modules/ps_mbo/views/templates/hook/twig/module_manager_message.html.twig */
class __TwigTemplate_5bd009a81a01ad62daca7696e9f7bd8c extends Template
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

        $this->parent = false;

        $this->blocks = [
        ];
    }

    protected function doDisplay(array $context, array $blocks = []): iterable
    {
        $macros = $this->macros;
        // line 19
        yield "<script>
  if (typeof window.mboCdc !== undefined && typeof window.mboCdc !== \"undefined\") {
    const renderModulesManagerMessage = window.mboCdc.renderModulesManagerMessage

    const context = ";
        // line 23
        yield json_encode(($context["shop_context"] ?? null));
        yield ";

    renderModulesManagerMessage(context, '#module-manager-message-cdc-container')
  }
</script>
<div class=\"module-manager-message-wrapper cdc-container\" id=\"module-manager-message-cdc-container\" data-error-path=\"";
        // line 28
        yield $this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("admin_mbo_module_cdc_error");
        yield "\"></div>
";
        yield from [];
    }

    /**
     * @codeCoverageIgnore
     */
    public function getTemplateName(): string
    {
        return "@Modules/ps_mbo/views/templates/hook/twig/module_manager_message.html.twig";
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
        return array (  56 => 28,  48 => 23,  42 => 19,);
    }

    public function getSourceContext(): Source
    {
        return new Source("", "@Modules/ps_mbo/views/templates/hook/twig/module_manager_message.html.twig", "/home1/harmakko/public_html/PS/modules/ps_mbo/views/templates/hook/twig/module_manager_message.html.twig");
    }
}
