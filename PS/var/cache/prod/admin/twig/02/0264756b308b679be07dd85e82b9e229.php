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

/* @PrestaShop/Admin/Common/Grid/Blocks/pagination.html.twig */
class __TwigTemplate_8ec4935ccd3427cdfe7be75c05a8871b extends Template
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
            'grid_pagination' => [$this, 'block_grid_pagination'],
        ];
    }

    protected function doDisplay(array $context, array $blocks = []): iterable
    {
        $macros = $this->macros;
        // line 25
        yield "
";
        // line 26
        yield from $this->unwrap()->yieldBlock('grid_pagination', $context, $blocks);
        yield from [];
    }

    /**
     * @return iterable<null|scalar|\Stringable>
     */
    public function block_grid_pagination(array $context, array $blocks = []): iterable
    {
        $macros = $this->macros;
        // line 27
        yield "  ";
        if (((CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, ($context["grid"] ?? null), "data", [], "any", false, false, false, 27), "records_total", [], "any", false, false, false, 27) > 10) || CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, ($context["grid"] ?? null), "pagination", [], "any", false, false, false, 27), "offset", [], "any", false, false, false, 27))) {
            // line 28
            yield "    ";
            $context["route_params"] = [];
            // line 29
            yield "
    ";
            // line 30
            $context['_parent'] = $context;
            $context['_seq'] = CoreExtension::ensureTraversable(CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, ($context["app"] ?? null), "request", [], "any", false, false, false, 30), "attributes", [], "any", false, false, false, 30), "get", ["_route_params"], "method", false, false, false, 30));
            foreach ($context['_seq'] as $context["param_name"] => $context["param_value"]) {
                // line 31
                yield "      ";
                $context["route_params"] = Twig\Extension\CoreExtension::merge(($context["route_params"] ?? null), [ (string)$context["param_name"] => $context["param_value"]]);
                // line 32
                yield "    ";
            }
            $_parent = $context['_parent'];
            unset($context['_seq'], $context['param_name'], $context['param_value'], $context['_parent']);
            $context = array_intersect_key($context, $_parent) + $_parent;
            // line 33
            yield "
    ";
            // line 34
            yield $this->env->getRuntime('Symfony\Bridge\Twig\Extension\HttpKernelRuntime')->renderFragment(Symfony\Bridge\Twig\Extension\HttpKernelExtension::controller("PrestaShopBundle\\Controller\\Admin\\CommonController::paginationAction", ["limit" => CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source,             // line 35
($context["grid"] ?? null), "pagination", [], "any", false, false, false, 35), "limit", [], "any", false, false, false, 35), "offset" => CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source,             // line 36
($context["grid"] ?? null), "pagination", [], "any", false, false, false, 36), "offset", [], "any", false, false, false, 36), "total" => CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source,             // line 37
($context["grid"] ?? null), "data", [], "any", false, false, false, 37), "records_total", [], "any", false, false, false, 37), "prefix" => CoreExtension::getAttribute($this->env, $this->source,             // line 38
($context["grid"] ?? null), "form_prefix", [], "any", false, false, false, 38), "caller_route" => CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source,             // line 39
($context["app"] ?? null), "request", [], "any", false, false, false, 39), "attributes", [], "any", false, false, false, 39), "get", ["_route"], "method", false, false, false, 39), "caller_parameters" =>             // line 40
($context["route_params"] ?? null), "view" => ((CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source,             // line 41
($context["grid"] ?? null), "view_options", [], "any", false, true, false, 41), "pagination_view", [], "any", true, true, false, 41)) ? (Twig\Extension\CoreExtension::default(CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, ($context["grid"] ?? null), "view_options", [], "any", false, false, false, 41), "pagination_view", [], "any", false, false, false, 41), "full")) : ("full"))]));
            // line 42
            yield "
  ";
        }
        yield from [];
    }

    /**
     * @codeCoverageIgnore
     */
    public function getTemplateName(): string
    {
        return "@PrestaShop/Admin/Common/Grid/Blocks/pagination.html.twig";
    }

    /**
     * @codeCoverageIgnore
     */
    public function getDebugInfo(): array
    {
        return array (  91 => 42,  89 => 41,  88 => 40,  87 => 39,  86 => 38,  85 => 37,  84 => 36,  83 => 35,  82 => 34,  79 => 33,  73 => 32,  70 => 31,  66 => 30,  63 => 29,  60 => 28,  57 => 27,  46 => 26,  43 => 25,);
    }

    public function getSourceContext(): Source
    {
        return new Source("", "@PrestaShop/Admin/Common/Grid/Blocks/pagination.html.twig", "/home1/harmakko/public_html/PS/src/PrestaShopBundle/Resources/views/Admin/Common/Grid/Blocks/pagination.html.twig");
    }
}
