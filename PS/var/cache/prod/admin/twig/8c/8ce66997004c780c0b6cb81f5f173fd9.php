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

/* @PrestaShop/Admin/Common/Grid/Blocks/table.html.twig */
class __TwigTemplate_18e864274e1c4137b3e7d9b91399d3d0 extends Template
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
            'grid_table_head' => [$this, 'block_grid_table_head'],
            'grid_table_body' => [$this, 'block_grid_table_body'],
            'grid_table_footer' => [$this, 'block_grid_table_footer'],
        ];
    }

    protected function doDisplay(array $context, array $blocks = []): iterable
    {
        $macros = $this->macros;
        // line 25
        yield "
";
        // line 26
        yield $this->extensions['PrestaShopBundle\Twig\HookExtension']->renderHook("displayAdminGridTableBefore", ["grid" =>         // line 27
($context["grid"] ?? null), "legacy_controller" => CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source,         // line 28
($context["app"] ?? null), "request", [], "any", false, false, false, 28), "attributes", [], "any", false, false, false, 28), "get", ["_legacy_controller"], "method", false, false, false, 28), "controller" => CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source,         // line 29
($context["app"] ?? null), "request", [], "any", false, false, false, 29), "attributes", [], "any", false, false, false, 29), "get", ["_controller"], "method", false, false, false, 29)]);
        // line 31
        yield "

";
        // line 33
        yield         $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->renderBlock(CoreExtension::getAttribute($this->env, $this->source, ($context["grid"] ?? null), "filter_form", [], "any", false, false, false, 33), 'form_start', ["attr" => ["id" => (CoreExtension::getAttribute($this->env, $this->source, ($context["grid"] ?? null), "id", [], "any", false, false, false, 33) . "_filter_form"), "class" => "table-responsive"]]);
        yield "

<table class=\"grid-table js-grid-table table ";
        // line 35
        if ($this->extensions['PrestaShopBundle\Twig\Extension\GridExtension']->isOrderingColumn(($context["grid"] ?? null))) {
            yield "grid-ordering-column";
        }
        yield " ";
        if (CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, ($context["grid"] ?? null), "attributes", [], "any", false, false, false, 35), "is_empty_state", [], "any", false, false, false, 35)) {
            yield "border-0";
        }
        yield "\"
       id=\"";
        // line 36
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, ($context["grid"] ?? null), "id", [], "any", false, false, false, 36), "html", null, true);
        yield "_grid_table\"
       data-query=\"";
        // line 37
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, ($context["grid"] ?? null), "data", [], "any", false, false, false, 37), "query", [], "any", false, false, false, 37), "html", null, true);
        yield "\"
       data-limit=\"";
        // line 38
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, ($context["grid"] ?? null), "pagination", [], "any", false, false, false, 38), "limit", [], "any", false, false, false, 38), "html", null, true);
        yield "\"
       data-offset=\"";
        // line 39
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, ($context["grid"] ?? null), "pagination", [], "any", false, false, false, 39), "offset", [], "any", false, false, false, 39), "html", null, true);
        yield "\"
       data-total=\"";
        // line 40
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, ($context["grid"] ?? null), "data", [], "any", false, false, false, 40), "records_total", [], "any", false, false, false, 40), "html", null, true);
        yield "\"
>
  <thead class=\"thead-default\">
  ";
        // line 43
        yield from $this->unwrap()->yieldBlock('grid_table_head', $context, $blocks);
        // line 49
        yield "  </thead>
  <tbody>
  ";
        // line 51
        yield from $this->unwrap()->yieldBlock('grid_table_body', $context, $blocks);
        // line 69
        yield "  </tbody>
  ";
        // line 70
        yield from $this->unwrap()->yieldBlock('grid_table_footer', $context, $blocks);
        // line 71
        yield "</table>

";
        // line 73
        yield         $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->renderBlock(CoreExtension::getAttribute($this->env, $this->source, ($context["grid"] ?? null), "filter_form", [], "any", false, false, false, 73), 'form_end');
        yield "

";
        // line 75
        yield $this->extensions['PrestaShopBundle\Twig\HookExtension']->renderHook("displayAdminGridTableAfter", ["grid" =>         // line 76
($context["grid"] ?? null), "legacy_controller" => CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source,         // line 77
($context["app"] ?? null), "request", [], "any", false, false, false, 77), "attributes", [], "any", false, false, false, 77), "get", ["_legacy_controller"], "method", false, false, false, 77), "controller" => CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source,         // line 78
($context["app"] ?? null), "request", [], "any", false, false, false, 78), "attributes", [], "any", false, false, false, 78), "get", ["_controller"], "method", false, false, false, 78)]);
        // line 80
        yield "
";
        yield from [];
    }

    // line 43
    /**
     * @return iterable<null|scalar|\Stringable>
     */
    public function block_grid_table_head(array $context, array $blocks = []): iterable
    {
        $macros = $this->macros;
        // line 44
        yield "    ";
        yield Twig\Extension\CoreExtension::include($this->env, $context, "@PrestaShop/Admin/Common/Grid/Blocks/Table/headers_row.html.twig", ["grid" => ($context["grid"] ?? null)]);
        yield "
    ";
        // line 45
        if (((Twig\Extension\CoreExtension::length($this->env->getCharset(), CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, ($context["grid"] ?? null), "actions", [], "any", false, false, false, 45), "bulk", [], "any", false, false, false, 45)) > 0) || (Twig\Extension\CoreExtension::length($this->env->getCharset(), CoreExtension::getAttribute($this->env, $this->source, ($context["grid"] ?? null), "filter_form", [], "any", false, false, false, 45)) > 1))) {
            // line 46
            yield "      ";
            yield Twig\Extension\CoreExtension::include($this->env, $context, "@PrestaShop/Admin/Common/Grid/Blocks/Table/filters_row.html.twig", ["grid" => ($context["grid"] ?? null)]);
            yield "
    ";
        }
        // line 48
        yield "  ";
        yield from [];
    }

    // line 51
    /**
     * @return iterable<null|scalar|\Stringable>
     */
    public function block_grid_table_body(array $context, array $blocks = []): iterable
    {
        $macros = $this->macros;
        // line 52
        yield "    ";
        if ( !Twig\Extension\CoreExtension::testEmpty(CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, ($context["grid"] ?? null), "data", [], "any", false, false, false, 52), "records", [], "any", false, false, false, 52))) {
            // line 53
            yield "      ";
            $context['_parent'] = $context;
            $context['_seq'] = CoreExtension::ensureTraversable(CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, ($context["grid"] ?? null), "data", [], "any", false, false, false, 53), "records", [], "any", false, false, false, 53));
            foreach ($context['_seq'] as $context["_key"] => $context["record"]) {
                // line 54
                yield "        <tr>
          ";
                // line 55
                $context['_parent'] = $context;
                $context['_seq'] = CoreExtension::ensureTraversable(CoreExtension::getAttribute($this->env, $this->source, ($context["grid"] ?? null), "columns", [], "any", false, false, false, 55));
                foreach ($context['_seq'] as $context["_key"] => $context["column"]) {
                    // line 56
                    yield "            <td
              ";
                    // line 57
                    if ((CoreExtension::getAttribute($this->env, $this->source, $context["column"], "type", [], "any", false, false, false, 57) == "identifier")) {
                        yield "data-identifier=\"";
                        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape((($_v0 = $context["record"]) && is_array($_v0) || $_v0 instanceof ArrayAccess ? ($_v0[CoreExtension::getAttribute($this->env, $this->source, $context["column"], "id", [], "any", false, false, false, 57)] ?? null) : null), "html", null, true);
                        yield "\"";
                    }
                    // line 58
                    yield "              class=\"";
                    yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, $context["column"], "type", [], "any", false, false, false, 58), "html", null, true);
                    yield "-type column-";
                    yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, $context["column"], "id", [], "any", false, false, false, 58), "html", null, true);
                    if ((CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, $context["column"], "options", [], "any", false, true, false, 58), "clickable", [], "any", true, true, false, 58) && CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, $context["column"], "options", [], "any", false, false, false, 58), "clickable", [], "any", false, false, false, 58))) {
                        yield " clickable";
                    }
                    if ((CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, $context["column"], "options", [], "any", false, true, false, 58), "alignment", [], "any", true, true, false, 58) && CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, $context["column"], "options", [], "any", false, false, false, 58), "alignment", [], "any", false, false, false, 58))) {
                        yield " text-";
                        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, $context["column"], "options", [], "any", false, false, false, 58), "alignment", [], "any", false, false, false, 58), "html", null, true);
                    }
                    yield "\"
            >
              ";
                    // line 60
                    yield $this->extensions['PrestaShopBundle\Twig\Extension\GridExtension']->renderColumnContent($context["record"], $context["column"], ($context["grid"] ?? null));
                    yield "
            </td>
          ";
                }
                $_parent = $context['_parent'];
                unset($context['_seq'], $context['_key'], $context['column'], $context['_parent']);
                $context = array_intersect_key($context, $_parent) + $_parent;
                // line 63
                yield "        </tr>
      ";
            }
            $_parent = $context['_parent'];
            unset($context['_seq'], $context['_key'], $context['record'], $context['_parent']);
            $context = array_intersect_key($context, $_parent) + $_parent;
            // line 65
            yield "    ";
        } else {
            // line 66
            yield "      ";
            yield Twig\Extension\CoreExtension::include($this->env, $context, "@PrestaShop/Admin/Common/Grid/Blocks/Table/empty_row.html.twig", ["grid" => ($context["grid"] ?? null)]);
            yield "
    ";
        }
        // line 68
        yield "  ";
        yield from [];
    }

    // line 70
    /**
     * @return iterable<null|scalar|\Stringable>
     */
    public function block_grid_table_footer(array $context, array $blocks = []): iterable
    {
        $macros = $this->macros;
        yield from [];
    }

    /**
     * @codeCoverageIgnore
     */
    public function getTemplateName(): string
    {
        return "@PrestaShop/Admin/Common/Grid/Blocks/table.html.twig";
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
        return array (  228 => 70,  223 => 68,  217 => 66,  214 => 65,  207 => 63,  198 => 60,  183 => 58,  177 => 57,  174 => 56,  170 => 55,  167 => 54,  162 => 53,  159 => 52,  152 => 51,  147 => 48,  141 => 46,  139 => 45,  134 => 44,  127 => 43,  121 => 80,  119 => 78,  118 => 77,  117 => 76,  116 => 75,  111 => 73,  107 => 71,  105 => 70,  102 => 69,  100 => 51,  96 => 49,  94 => 43,  88 => 40,  84 => 39,  80 => 38,  76 => 37,  72 => 36,  62 => 35,  57 => 33,  53 => 31,  51 => 29,  50 => 28,  49 => 27,  48 => 26,  45 => 25,);
    }

    public function getSourceContext(): Source
    {
        return new Source("", "@PrestaShop/Admin/Common/Grid/Blocks/table.html.twig", "/home1/harmakko/public_html/PS/src/PrestaShopBundle/Resources/views/Admin/Common/Grid/Blocks/table.html.twig");
    }
}
