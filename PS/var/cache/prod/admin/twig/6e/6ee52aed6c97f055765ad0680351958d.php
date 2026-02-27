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

/* @PrestaShop/Admin/Common/Grid/Blocks/Table/filters_row.html.twig */
class __TwigTemplate_b38b93596f5603ea9fbf481b059fc2c6 extends Template
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
<tr class=\"column-filters";
        // line 26
        if (CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, ($context["grid"] ?? null), "attributes", [], "any", false, false, false, 26), "is_empty_state", [], "any", false, false, false, 26)) {
            yield " d-none";
        }
        yield "\">
  ";
        // line 27
        $context['_parent'] = $context;
        $context['_seq'] = CoreExtension::ensureTraversable(CoreExtension::getAttribute($this->env, $this->source, ($context["grid"] ?? null), "columns", [], "any", false, false, false, 27));
        $context['loop'] = [
          'parent' => $context['_parent'],
          'index0' => 0,
          'index'  => 1,
          'first'  => true,
        ];
        if (is_array($context['_seq']) || (is_object($context['_seq']) && $context['_seq'] instanceof \Countable)) {
            $length = count($context['_seq']);
            $context['loop']['revindex0'] = $length - 1;
            $context['loop']['revindex'] = $length;
            $context['loop']['length'] = $length;
            $context['loop']['last'] = 1 === $length;
        }
        foreach ($context['_seq'] as $context["_key"] => $context["column"]) {
            // line 28
            yield "    <td
      data-type=\"";
            // line 29
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, $context["column"], "type", [], "any", false, false, false, 29), "html", null, true);
            yield "\"
      data-column-id=\"";
            // line 30
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, $context["column"], "id", [], "any", false, false, false, 30), "html", null, true);
            yield "\"
    >
      ";
            // line 32
            if ((CoreExtension::getAttribute($this->env, $this->source, $context["loop"], "first", [], "any", false, false, false, 32) && (Twig\Extension\CoreExtension::length($this->env->getCharset(), CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, ($context["grid"] ?? null), "actions", [], "any", false, false, false, 32), "bulk", [], "any", false, false, false, 32)) > 0))) {
                // line 33
                yield "        ";
                yield Twig\Extension\CoreExtension::include($this->env, $context, "@PrestaShop/Admin/Common/Grid/Blocks/bulk_actions_select_all.html.twig", ["grid" => ($context["grid"] ?? null)]);
                yield "
      ";
            }
            // line 35
            yield "
      ";
            // line 36
            if ((Twig\Extension\CoreExtension::length($this->env->getCharset(), CoreExtension::getAttribute($this->env, $this->source, ($context["grid"] ?? null), "filter_form", [], "any", false, false, false, 36)) > 1)) {
                // line 37
                yield "        ";
                if (CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, ($context["grid"] ?? null), "column_filters", [], "any", false, true, false, 37), CoreExtension::getAttribute($this->env, $this->source, $context["column"], "id", [], "any", false, false, false, 37), [], "array", true, true, false, 37)) {
                    // line 38
                    yield "          ";
                    $context['_parent'] = $context;
                    $context['_seq'] = CoreExtension::ensureTraversable((($_v0 = CoreExtension::getAttribute($this->env, $this->source, ($context["grid"] ?? null), "column_filters", [], "any", false, false, false, 38)) && is_array($_v0) || $_v0 instanceof ArrayAccess ? ($_v0[CoreExtension::getAttribute($this->env, $this->source, $context["column"], "id", [], "any", false, false, false, 38)] ?? null) : null));
                    foreach ($context['_seq'] as $context["_key"] => $context["filter_name"]) {
                        // line 39
                        yield "            ";
                        yield $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock((($_v1 = CoreExtension::getAttribute($this->env, $this->source, ($context["grid"] ?? null), "filter_form", [], "any", false, false, false, 39)) && is_array($_v1) || $_v1 instanceof ArrayAccess ? ($_v1[$context["filter_name"]] ?? null) : null), 'widget');
                        yield "
          ";
                    }
                    $_parent = $context['_parent'];
                    unset($context['_seq'], $context['_key'], $context['filter_name'], $context['_parent']);
                    $context = array_intersect_key($context, $_parent) + $_parent;
                    // line 41
                    yield "        ";
                }
                // line 42
                yield "      ";
            }
            // line 43
            yield "    </td>
  ";
            ++$context['loop']['index0'];
            ++$context['loop']['index'];
            $context['loop']['first'] = false;
            if (isset($context['loop']['revindex0'], $context['loop']['revindex'])) {
                --$context['loop']['revindex0'];
                --$context['loop']['revindex'];
                $context['loop']['last'] = 0 === $context['loop']['revindex0'];
            }
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_key'], $context['column'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 45
        yield "</tr>
";
        yield from [];
    }

    /**
     * @codeCoverageIgnore
     */
    public function getTemplateName(): string
    {
        return "@PrestaShop/Admin/Common/Grid/Blocks/Table/filters_row.html.twig";
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
        return array (  131 => 45,  116 => 43,  113 => 42,  110 => 41,  101 => 39,  96 => 38,  93 => 37,  91 => 36,  88 => 35,  82 => 33,  80 => 32,  75 => 30,  71 => 29,  68 => 28,  51 => 27,  45 => 26,  42 => 25,);
    }

    public function getSourceContext(): Source
    {
        return new Source("", "@PrestaShop/Admin/Common/Grid/Blocks/Table/filters_row.html.twig", "/home1/harmakko/public_html/PS/src/PrestaShopBundle/Resources/views/Admin/Common/Grid/Blocks/Table/filters_row.html.twig");
    }
}
