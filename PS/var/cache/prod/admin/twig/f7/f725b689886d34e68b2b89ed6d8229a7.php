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

/* @PrestaShop/Admin/Common/Grid/grid.html.twig */
class __TwigTemplate_be2654e3538c6ba468821de22d896383 extends Template
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
            'grid_header_row' => [$this, 'block_grid_header_row'],
            'grid_bulk_actions_block' => [$this, 'block_grid_bulk_actions_block'],
            'grid_table_row' => [$this, 'block_grid_table_row'],
            'grid_footer_row' => [$this, 'block_grid_footer_row'],
            'grid_extra_content' => [$this, 'block_grid_extra_content'],
        ];
    }

    protected function doDisplay(array $context, array $blocks = []): iterable
    {
        $macros = $this->macros;
        // line 25
        yield "
<div class=\"grid js-grid\" id=\"";
        // line 26
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, ($context["grid"] ?? null), "id", [], "any", false, false, false, 26), "html", null, true);
        yield "_grid\" data-grid-id=\"";
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, ($context["grid"] ?? null), "id", [], "any", false, false, false, 26), "html", null, true);
        yield "\">
  ";
        // line 27
        yield from $this->unwrap()->yieldBlock('grid_header_row', $context, $blocks);
        // line 32
        yield "
  ";
        // line 33
        yield from $this->unwrap()->yieldBlock('grid_table_row', $context, $blocks);
        // line 36
        yield "
  ";
        // line 37
        yield from $this->unwrap()->yieldBlock('grid_footer_row', $context, $blocks);
        // line 40
        yield "</div>

";
        // line 42
        yield from $this->unwrap()->yieldBlock('grid_extra_content', $context, $blocks);
        yield from [];
    }

    // line 27
    /**
     * @return iterable<null|scalar|\Stringable>
     */
    public function block_grid_header_row(array $context, array $blocks = []): iterable
    {
        $macros = $this->macros;
        // line 28
        yield "    ";
        yield from $this->unwrap()->yieldBlock('grid_bulk_actions_block', $context, $blocks);
        // line 31
        yield "  ";
        yield from [];
    }

    // line 28
    /**
     * @return iterable<null|scalar|\Stringable>
     */
    public function block_grid_bulk_actions_block(array $context, array $blocks = []): iterable
    {
        $macros = $this->macros;
        // line 29
        yield "      ";
        yield Twig\Extension\CoreExtension::include($this->env, $context, "@PrestaShop/Admin/Common/Grid/Blocks/bulk_actions.html.twig", ["grid" => ($context["grid"] ?? null)]);
        yield "
    ";
        yield from [];
    }

    // line 33
    /**
     * @return iterable<null|scalar|\Stringable>
     */
    public function block_grid_table_row(array $context, array $blocks = []): iterable
    {
        $macros = $this->macros;
        // line 34
        yield "    ";
        yield Twig\Extension\CoreExtension::include($this->env, $context, "@PrestaShop/Admin/Common/Grid/Blocks/table.html.twig", ["grid" => ($context["grid"] ?? null)]);
        yield "
  ";
        yield from [];
    }

    // line 37
    /**
     * @return iterable<null|scalar|\Stringable>
     */
    public function block_grid_footer_row(array $context, array $blocks = []): iterable
    {
        $macros = $this->macros;
        // line 38
        yield "    ";
        yield Twig\Extension\CoreExtension::include($this->env, $context, "@PrestaShop/Admin/Common/Grid/Blocks/pagination.html.twig", ["grid" => ($context["grid"] ?? null)]);
        yield "
  ";
        yield from [];
    }

    // line 42
    /**
     * @return iterable<null|scalar|\Stringable>
     */
    public function block_grid_extra_content(array $context, array $blocks = []): iterable
    {
        $macros = $this->macros;
        yield from [];
    }

    /**
     * @codeCoverageIgnore
     */
    public function getTemplateName(): string
    {
        return "@PrestaShop/Admin/Common/Grid/grid.html.twig";
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
        return array (  137 => 42,  129 => 38,  122 => 37,  114 => 34,  107 => 33,  99 => 29,  92 => 28,  87 => 31,  84 => 28,  77 => 27,  72 => 42,  68 => 40,  66 => 37,  63 => 36,  61 => 33,  58 => 32,  56 => 27,  50 => 26,  47 => 25,);
    }

    public function getSourceContext(): Source
    {
        return new Source("", "@PrestaShop/Admin/Common/Grid/grid.html.twig", "/home1/harmakko/public_html/PS/src/PrestaShopBundle/Resources/views/Admin/Common/Grid/grid.html.twig");
    }
}
