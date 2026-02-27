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

/* @PrestaShop/Admin/Common/Grid/Columns/Content/toggle.html.twig */
class __TwigTemplate_37cdc7bc99f9e3b17e62fc4ae10df1d2 extends Template
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
        // line 27
        $context["route_params"] = [CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, ($context["column"] ?? null), "options", [], "any", false, false, false, 27), "route_param_name", [], "any", false, false, false, 27) => (($_v0 = ($context["record"] ?? null)) && is_array($_v0) || $_v0 instanceof ArrayAccess ? ($_v0[CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, ($context["column"] ?? null), "options", [], "any", false, false, false, 27), "primary_field", [], "any", false, false, false, 27)] ?? null) : null)];
        // line 28
        $context["extra_route_params"] = CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, ($context["column"] ?? null), "options", [], "any", false, false, false, 28), "extra_route_params", [], "any", false, false, false, 28);
        // line 29
        $context['_parent'] = $context;
        $context['_seq'] = CoreExtension::ensureTraversable(($context["extra_route_params"] ?? null));
        foreach ($context['_seq'] as $context["name"] => $context["field"]) {
            // line 30
            yield "  ";
            $context["route_params"] = Twig\Extension\CoreExtension::merge(($context["route_params"] ?? null), [ (string)$context["name"] => (((CoreExtension::getAttribute($this->env, $this->source, ($context["record"] ?? null), $context["field"], [], "array", true, true, false, 30) &&  !(null === (($_v1 = ($context["record"] ?? null)) && is_array($_v1) || $_v1 instanceof ArrayAccess ? ($_v1[$context["field"]] ?? null) : null)))) ? ((($_v2 = ($context["record"] ?? null)) && is_array($_v2) || $_v2 instanceof ArrayAccess ? ($_v2[$context["field"]] ?? null) : null)) : ($context["field"]))]);
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['name'], $context['field'], $context['_parent']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 32
        yield "
";
        // line 34
        $context["id_primary_key"] = Twig\Extension\CoreExtension::join(($context["route_params"] ?? null), "-");
        // line 35
        yield "
";
        // line 36
        $context["isValid"] = ((($_v3 = ($context["record"] ?? null)) && is_array($_v3) || $_v3 instanceof ArrayAccess ? ($_v3[CoreExtension::getAttribute($this->env, $this->source, ($context["column"] ?? null), "id", [], "any", false, false, false, 36)] ?? null) : null) == 1);
        // line 37
        yield "
<div class=\"text-center\">
  <div
    class=\"ps-switch ps-switch-sm ps-switch-nolabel ps-switch-center ps-togglable-row\"
    data-toggle-url=\"";
        // line 41
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath(CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, ($context["column"] ?? null), "options", [], "any", false, false, false, 41), "route", [], "any", false, false, false, 41), ($context["route_params"] ?? null)), "html", null, true);
        yield "\"
  >
  <input type=\"radio\" name=\"input-";
        // line 43
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, ($context["column"] ?? null), "options", [], "any", false, false, false, 43), "route", [], "any", false, false, false, 43), "html", null, true);
        yield "-";
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(($context["id_primary_key"] ?? null), "html", null, true);
        yield "\"
         id=\"input-false-";
        // line 44
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, ($context["column"] ?? null), "options", [], "any", false, false, false, 44), "route", [], "any", false, false, false, 44), "html", null, true);
        yield "-";
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(($context["id_primary_key"] ?? null), "html", null, true);
        yield "\"
         value=\"0\" ";
        // line 45
        if ( !($context["isValid"] ?? null)) {
            yield "checked";
        }
        yield ">
      <label for=\"input-false-";
        // line 46
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, ($context["column"] ?? null), "options", [], "any", false, false, false, 46), "route", [], "any", false, false, false, 46), "html", null, true);
        yield "-";
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(($context["id_primary_key"] ?? null), "html", null, true);
        yield "\">Off</label>
      <input type=\"radio\" name=\"input-";
        // line 47
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, ($context["column"] ?? null), "options", [], "any", false, false, false, 47), "route", [], "any", false, false, false, 47), "html", null, true);
        yield "-";
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(($context["id_primary_key"] ?? null), "html", null, true);
        yield "\"
             id=\"input-true-";
        // line 48
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, ($context["column"] ?? null), "options", [], "any", false, false, false, 48), "route", [], "any", false, false, false, 48), "html", null, true);
        yield "-";
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(($context["id_primary_key"] ?? null), "html", null, true);
        yield "\"
             value=\"1\" ";
        // line 49
        if (($context["isValid"] ?? null)) {
            yield "checked";
        }
        yield ">
      <label for=\"input-true-";
        // line 50
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, ($context["column"] ?? null), "options", [], "any", false, false, false, 50), "route", [], "any", false, false, false, 50), "html", null, true);
        yield "-";
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(($context["id_primary_key"] ?? null), "html", null, true);
        yield "\">On</label>
      <span class=\"slide-button\"></span>
  </div>
</div>
";
        yield from [];
    }

    /**
     * @codeCoverageIgnore
     */
    public function getTemplateName(): string
    {
        return "@PrestaShop/Admin/Common/Grid/Columns/Content/toggle.html.twig";
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
        return array (  123 => 50,  117 => 49,  111 => 48,  105 => 47,  99 => 46,  93 => 45,  87 => 44,  81 => 43,  76 => 41,  70 => 37,  68 => 36,  65 => 35,  63 => 34,  60 => 32,  53 => 30,  49 => 29,  47 => 28,  45 => 27,  42 => 25,);
    }

    public function getSourceContext(): Source
    {
        return new Source("", "@PrestaShop/Admin/Common/Grid/Columns/Content/toggle.html.twig", "/home1/harmakko/public_html/PS/src/PrestaShopBundle/Resources/views/Admin/Common/Grid/Columns/Content/toggle.html.twig");
    }
}
