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

/* @PrestaShop/Admin/Common/Grid/Actions/Bulk/submit.html.twig */
class __TwigTemplate_b766749923695cd3495db1901f5ba016 extends Template
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
        // line 25
        yield "
<button id=\"";
        // line 26
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(Twig\Extension\CoreExtension::sprintf("%s_grid_bulk_action_%s", CoreExtension::getAttribute($this->env, $this->source, ($context["grid"] ?? null), "id", [], "any", false, false, false, 26), CoreExtension::getAttribute($this->env, $this->source, ($context["action"] ?? null), "id", [], "any", false, false, false, 26)), "html", null, true);
        yield "\"
        class=\"dropdown-item js-bulk-action-submit-btn\"
        type=\"button\"
        data-form-url=\"";
        // line 29
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath(CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, ($context["action"] ?? null), "options", [], "any", false, false, false, 29), "submit_route", [], "any", false, false, false, 29), CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, ($context["action"] ?? null), "options", [], "any", false, false, false, 29), "route_params", [], "any", false, false, false, 29)), "html", null, true);
        yield "\"
        data-form-method=\"";
        // line 30
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, ($context["action"] ?? null), "options", [], "any", false, false, false, 30), "submit_method", [], "any", false, false, false, 30), "html", null, true);
        yield "\"
        data-confirm-message=\"";
        // line 31
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, ($context["action"] ?? null), "options", [], "any", false, false, false, 31), "confirm_message", [], "any", false, false, false, 31), "html", null, true);
        yield "\"
        ";
        // line 32
        if (CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, ($context["action"] ?? null), "options", [], "any", false, false, false, 32), "modal_options", [], "any", false, false, false, 32)) {
            // line 33
            yield "        data-close-button-label=\"";
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(((CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, ($context["action"] ?? null), "options", [], "any", false, true, false, 33), "modal_options", [], "any", false, true, false, 33), "options", [], "any", false, true, false, 33), "close_button_label", [], "any", true, true, false, 33)) ? (Twig\Extension\CoreExtension::default(CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, ($context["action"] ?? null), "options", [], "any", false, false, false, 33), "modal_options", [], "any", false, false, false, 33), "options", [], "any", false, false, false, 33), "close_button_label", [], "any", false, false, false, 33), $this->extensions['Symfony\Bridge\Twig\Extension\TranslationExtension']->trans("Close", [], "Admin.Actions"))) : ($this->extensions['Symfony\Bridge\Twig\Extension\TranslationExtension']->trans("Close", [], "Admin.Actions"))), "html", null, true);
            yield "\"
        data-confirm-title=\"";
            // line 34
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, ($context["action"] ?? null), "options", [], "any", false, false, false, 34), "modal_options", [], "any", false, false, false, 34), "options", [], "any", false, false, false, 34), "title", [], "any", false, false, false, 34), "html", null, true);
            yield "\"
        data-confirm-button-class=\"";
            // line 35
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(((CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, ($context["action"] ?? null), "options", [], "any", false, true, false, 35), "modal_options", [], "any", false, true, false, 35), "options", [], "any", false, true, false, 35), "confirm_button_class", [], "any", true, true, false, 35)) ? (Twig\Extension\CoreExtension::default(CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, ($context["action"] ?? null), "options", [], "any", false, false, false, 35), "modal_options", [], "any", false, false, false, 35), "options", [], "any", false, false, false, 35), "confirm_button_class", [], "any", false, false, false, 35), "btn-primary")) : ("btn-primary")), "html", null, true);
            yield "\"
        data-confirm-button-label=\"";
            // line 36
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(((CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, ($context["action"] ?? null), "options", [], "any", false, true, false, 36), "modal_options", [], "any", false, true, false, 36), "options", [], "any", false, true, false, 36), "confirm_button_label", [], "any", true, true, false, 36)) ? (Twig\Extension\CoreExtension::default(CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, ($context["action"] ?? null), "options", [], "any", false, false, false, 36), "modal_options", [], "any", false, false, false, 36), "options", [], "any", false, false, false, 36), "confirm_button_label", [], "any", false, false, false, 36), $this->extensions['Symfony\Bridge\Twig\Extension\TranslationExtension']->trans("Confirm", [], "Admin.Actions"))) : ($this->extensions['Symfony\Bridge\Twig\Extension\TranslationExtension']->trans("Confirm", [], "Admin.Actions"))), "html", null, true);
            yield "\"
        ";
        }
        // line 38
        yield ">
  ";
        // line 39
        if ( !Twig\Extension\CoreExtension::testEmpty(CoreExtension::getAttribute($this->env, $this->source, ($context["action"] ?? null), "icon", [], "any", false, false, false, 39))) {
            // line 40
            yield "    <i class=\"material-icons\">";
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, ($context["action"] ?? null), "icon", [], "any", false, false, false, 40), "html", null, true);
            yield "</i>
  ";
        }
        // line 42
        yield "  ";
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, ($context["action"] ?? null), "name", [], "any", false, false, false, 42), "html", null, true);
        yield "
</button>
";
        yield from [];
    }

    /**
     * @codeCoverageIgnore
     */
    public function getTemplateName(): string
    {
        return "@PrestaShop/Admin/Common/Grid/Actions/Bulk/submit.html.twig";
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
        return array (  94 => 42,  88 => 40,  86 => 39,  83 => 38,  78 => 36,  74 => 35,  70 => 34,  65 => 33,  63 => 32,  59 => 31,  55 => 30,  51 => 29,  45 => 26,  42 => 25,);
    }

    public function getSourceContext(): Source
    {
        return new Source("", "@PrestaShop/Admin/Common/Grid/Actions/Bulk/submit.html.twig", "/home1/harmakko/public_html/PS/src/PrestaShopBundle/Resources/views/Admin/Common/Grid/Actions/Bulk/submit.html.twig");
    }
}
