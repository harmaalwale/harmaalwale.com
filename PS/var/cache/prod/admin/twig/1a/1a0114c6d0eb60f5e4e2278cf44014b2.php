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

/* @PrestaShop/Admin/Common/Grid/Columns/Content/bulk_action.html.twig */
class __TwigTemplate_5d43fb8baa2f82ddb1c47bed1d646aef extends Template
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
";
        // line 26
        if (((Twig\Extension\CoreExtension::testEmpty(CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, ($context["column"] ?? null), "options", [], "any", false, false, false, 26), "disabled_field", [], "any", false, false, false, 26)) ||  !(($_v0 = ($context["record"] ?? null)) && is_array($_v0) || $_v0 instanceof ArrayAccess ? ($_v0[CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, ($context["column"] ?? null), "options", [], "any", false, false, false, 26), "disabled_field", [], "any", false, false, false, 26)] ?? null) : null)) && ( !CoreExtension::getAttribute($this->env, $this->source, ($context["record"] ?? null), "disableBulkCheckbox", [], "any", true, true, false, 26) ||  !CoreExtension::getAttribute($this->env, $this->source, ($context["record"] ?? null), "disableBulkCheckbox", [], "any", false, false, false, 26)))) {
            // line 27
            yield "<div class=\"md-checkbox\">
  <label>
    <input type=\"checkbox\"
           title=\"";
            // line 30
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, ($context["column"] ?? null), "name", [], "any", false, false, false, 30), "html", null, true);
            yield "\"
           class=\"js-bulk-action-checkbox\"
           name=\"";
            // line 32
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(((CoreExtension::getAttribute($this->env, $this->source, ($context["grid"] ?? null), "id", [], "any", false, false, false, 32) . "_") . CoreExtension::getAttribute($this->env, $this->source, ($context["column"] ?? null), "id", [], "any", false, false, false, 32)), "html", null, true);
            yield "[]\"
           value=\"";
            // line 33
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape((($_v1 = ($context["record"] ?? null)) && is_array($_v1) || $_v1 instanceof ArrayAccess ? ($_v1[CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, ($context["column"] ?? null), "options", [], "any", false, false, false, 33), "bulk_field", [], "any", false, false, false, 33)] ?? null) : null), "html", null, true);
            yield "\"
    >
    <i class=\"md-checkbox-control\"></i>
  </label>
</div>
";
        }
        yield from [];
    }

    /**
     * @codeCoverageIgnore
     */
    public function getTemplateName(): string
    {
        return "@PrestaShop/Admin/Common/Grid/Columns/Content/bulk_action.html.twig";
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
        return array (  61 => 33,  57 => 32,  52 => 30,  47 => 27,  45 => 26,  42 => 25,);
    }

    public function getSourceContext(): Source
    {
        return new Source("", "@PrestaShop/Admin/Common/Grid/Columns/Content/bulk_action.html.twig", "/home1/harmakko/public_html/PS/src/PrestaShopBundle/Resources/views/Admin/Common/Grid/Columns/Content/bulk_action.html.twig");
    }
}
