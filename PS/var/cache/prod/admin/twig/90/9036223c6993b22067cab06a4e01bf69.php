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

/* @PrestaShop/Admin/Common/Grid/Actions/Row/submit.html.twig */
class __TwigTemplate_91000b781ec6c4bdd7a40abc0f271bdb extends Template
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
        $context["class"] = "btn tooltip-link js-submit-row-action";
        // line 27
        yield "
";
        // line 28
        if (CoreExtension::getAttribute($this->env, $this->source, ($context["attributes"] ?? null), "class", [], "any", true, true, false, 28)) {
            // line 29
            yield "  ";
            $context["class"] = ((($context["class"] ?? null) . " ") . CoreExtension::getAttribute($this->env, $this->source, ($context["attributes"] ?? null), "class", [], "any", false, false, false, 29));
        }
        // line 31
        yield "
";
        // line 32
        $context["confirmation_message"] = CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, ($context["action"] ?? null), "options", [], "any", false, false, false, 32), "confirm_message", [], "any", false, false, false, 32);
        // line 33
        if (((CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, ($context["action"] ?? null), "options", [], "any", false, false, false, 33), "confirm_message_type", [], "any", false, false, false, 33) == "dynamic") && CoreExtension::getAttribute($this->env, $this->source, ($context["record"] ?? null), CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, ($context["action"] ?? null), "options", [], "any", false, false, false, 33), "dynamic_message_field", [], "any", false, false, false, 33), [], "array", true, true, false, 33))) {
            // line 34
            yield "  ";
            $context["dynamic_field"] = (($_v0 = ($context["record"] ?? null)) && is_array($_v0) || $_v0 instanceof ArrayAccess ? ($_v0[CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, ($context["action"] ?? null), "options", [], "any", false, false, false, 34), "dynamic_message_field", [], "any", false, false, false, 34)] ?? null) : null);
            // line 35
            yield "  ";
            $context["confirmation_message"] = ((array_key_exists("dynamic_field", $context)) ? (Twig\Extension\CoreExtension::default(($context["dynamic_field"] ?? null), CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, ($context["action"] ?? null), "options", [], "any", false, false, false, 35), "confirm_message", [], "any", false, false, false, 35))) : (CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, ($context["action"] ?? null), "options", [], "any", false, false, false, 35), "confirm_message", [], "any", false, false, false, 35)));
        }
        // line 37
        yield "
";
        // line 38
        $context["route_params"] = [CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, ($context["action"] ?? null), "options", [], "any", false, false, false, 38), "route_param_name", [], "any", false, false, false, 38) => (($_v1 = ($context["record"] ?? null)) && is_array($_v1) || $_v1 instanceof ArrayAccess ? ($_v1[CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, ($context["action"] ?? null), "options", [], "any", false, false, false, 38), "route_param_field", [], "any", false, false, false, 38)] ?? null) : null)];
        // line 39
        $context["extra_route_params"] = CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, ($context["action"] ?? null), "options", [], "any", false, false, false, 39), "extra_route_params", [], "any", false, false, false, 39);
        // line 40
        yield "
";
        // line 41
        $context['_parent'] = $context;
        $context['_seq'] = CoreExtension::ensureTraversable(($context["extra_route_params"] ?? null));
        foreach ($context['_seq'] as $context["name"] => $context["field"]) {
            // line 42
            yield "  ";
            $context["route_params"] = Twig\Extension\CoreExtension::merge(($context["route_params"] ?? null), [ (string)$context["name"] => (((CoreExtension::getAttribute($this->env, $this->source, ($context["record"] ?? null), $context["field"], [], "array", true, true, false, 42) &&  !(null === (($_v2 = ($context["record"] ?? null)) && is_array($_v2) || $_v2 instanceof ArrayAccess ? ($_v2[$context["field"]] ?? null) : null)))) ? ((($_v3 = ($context["record"] ?? null)) && is_array($_v3) || $_v3 instanceof ArrayAccess ? ($_v3[$context["field"]] ?? null) : null)) : ($context["field"]))]);
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['name'], $context['field'], $context['_parent']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 44
        yield "
<a class=\"";
        // line 45
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(($context["class"] ?? null), "html", null, true);
        yield " grid-";
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(Twig\Extension\CoreExtension::lower($this->env->getCharset(), CoreExtension::getAttribute($this->env, $this->source, ($context["action"] ?? null), "name", [], "any", false, false, false, 45)), "html", null, true);
        yield "-row-link\"
   href=\"#\"
   data-confirm-message=\"";
        // line 47
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(($context["confirmation_message"] ?? null), "html", null, true);
        yield "\"
   data-url=\"";
        // line 48
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath(CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, ($context["action"] ?? null), "options", [], "any", false, false, false, 48), "route", [], "any", false, false, false, 48), ($context["route_params"] ?? null)), "html", null, true);
        yield "\"
   data-method=\"";
        // line 49
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, ($context["action"] ?? null), "options", [], "any", false, false, false, 49), "method", [], "any", false, false, false, 49), "html", null, true);
        yield "\"
  ";
        // line 50
        if (CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, ($context["action"] ?? null), "options", [], "any", false, true, false, 50), "modal_options", [], "any", false, true, false, 50), "options", [], "any", true, true, false, 50)) {
            // line 51
            yield "    ";
            $context['_parent'] = $context;
            $context['_seq'] = CoreExtension::ensureTraversable(CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, ($context["action"] ?? null), "options", [], "any", false, false, false, 51), "modal_options", [], "any", false, false, false, 51), "options", [], "any", false, false, false, 51));
            foreach ($context['_seq'] as $context["attribute"] => $context["value"]) {
                // line 52
                yield "      data-";
                yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(Twig\Extension\CoreExtension::replace($context["attribute"], ["_" => "-"]), "html", null, true);
                yield "=\"";
                yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($context["value"], "html", null, true);
                yield "\"
    ";
            }
            $_parent = $context['_parent'];
            unset($context['_seq'], $context['attribute'], $context['value'], $context['_parent']);
            $context = array_intersect_key($context, $_parent) + $_parent;
            // line 54
            yield "  ";
        }
        // line 55
        yield "  ";
        if (CoreExtension::getAttribute($this->env, $this->source, ($context["attributes"] ?? null), "tooltip_name", [], "any", false, false, false, 55)) {
            // line 56
            yield "    data-toggle=\"pstooltip\"
    data-placement=\"top\"
    data-original-title=\"";
            // line 58
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, ($context["action"] ?? null), "name", [], "any", false, false, false, 58), "html", null, true);
            yield "\"
  ";
        }
        // line 60
        yield ">
  ";
        // line 61
        if ( !Twig\Extension\CoreExtension::testEmpty(CoreExtension::getAttribute($this->env, $this->source, ($context["action"] ?? null), "icon", [], "any", false, false, false, 61))) {
            // line 62
            yield "    <i class=\"material-icons\">";
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, ($context["action"] ?? null), "icon", [], "any", false, false, false, 62), "html", null, true);
            yield "</i>
  ";
        }
        // line 64
        yield "  ";
        if ( !CoreExtension::getAttribute($this->env, $this->source, ($context["attributes"] ?? null), "tooltip_name", [], "any", false, false, false, 64)) {
            // line 65
            yield "    ";
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, ($context["action"] ?? null), "name", [], "any", false, false, false, 65), "html", null, true);
            yield "
  ";
        }
        // line 67
        yield "</a>
";
        yield from [];
    }

    /**
     * @codeCoverageIgnore
     */
    public function getTemplateName(): string
    {
        return "@PrestaShop/Admin/Common/Grid/Actions/Row/submit.html.twig";
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
        return array (  166 => 67,  160 => 65,  157 => 64,  151 => 62,  149 => 61,  146 => 60,  141 => 58,  137 => 56,  134 => 55,  131 => 54,  120 => 52,  115 => 51,  113 => 50,  109 => 49,  105 => 48,  101 => 47,  94 => 45,  91 => 44,  84 => 42,  80 => 41,  77 => 40,  75 => 39,  73 => 38,  70 => 37,  66 => 35,  63 => 34,  61 => 33,  59 => 32,  56 => 31,  52 => 29,  50 => 28,  47 => 27,  45 => 26,  42 => 25,);
    }

    public function getSourceContext(): Source
    {
        return new Source("", "@PrestaShop/Admin/Common/Grid/Actions/Row/submit.html.twig", "/home1/harmakko/public_html/PS/src/PrestaShopBundle/Resources/views/Admin/Common/Grid/Actions/Row/submit.html.twig");
    }
}
