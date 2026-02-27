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

/* @PrestaShop/Admin/Common/Grid/grid_panel.html.twig */
class __TwigTemplate_b92512d1eb552670997a6703fd612541 extends Template
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
            'grid_panel_header' => [$this, 'block_grid_panel_header'],
            'grid_actions_block' => [$this, 'block_grid_actions_block'],
            'grid_panel_body' => [$this, 'block_grid_panel_body'],
            'grid_view_block' => [$this, 'block_grid_view_block'],
            'grid_panel_footer' => [$this, 'block_grid_panel_footer'],
            'grid_panel_extra_content' => [$this, 'block_grid_panel_extra_content'],
        ];
    }

    protected function doDisplay(array $context, array $blocks = []): iterable
    {
        $macros = $this->macros;
        // line 19
        $context["displayName"] = true;
        // line 20
        if (CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, ($context["grid"] ?? null), "view_options", [], "any", false, true, false, 20), "display_name", [], "any", true, true, false, 20)) {
            // line 21
            yield "    ";
            $context["displayName"] = CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, ($context["grid"] ?? null), "view_options", [], "any", false, false, false, 21), "display_name", [], "any", false, false, false, 21);
        }
        // line 23
        yield "
<div class=\"card js-grid-panel\" id=\"";
        // line 24
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, ($context["grid"] ?? null), "id", [], "any", false, false, false, 24), "html", null, true);
        yield "_grid_panel\" data-hook-name=\"";
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(Twig\Extension\CoreExtension::first($this->env->getCharset(), Twig\Extension\CoreExtension::split($this->env->getCharset(), CoreExtension::getAttribute($this->env, $this->source, ($context["grid"] ?? null), "name", [], "any", false, false, false, 24), " ")), "html", null, true);
        yield "\">
  ";
        // line 25
        yield from $this->unwrap()->yieldBlock('grid_panel_header', $context, $blocks);
        // line 39
        yield "
  ";
        // line 40
        yield from $this->unwrap()->yieldBlock('grid_panel_body', $context, $blocks);
        // line 47
        yield "
  ";
        // line 48
        yield from $this->unwrap()->yieldBlock('grid_panel_footer', $context, $blocks);
        // line 49
        yield "</div>

";
        // line 51
        yield from $this->unwrap()->yieldBlock('grid_panel_extra_content', $context, $blocks);
        yield from [];
    }

    // line 25
    /**
     * @return iterable<null|scalar|\Stringable>
     */
    public function block_grid_panel_header(array $context, array $blocks = []): iterable
    {
        $macros = $this->macros;
        // line 26
        yield "      ";
        if ( !(($context["displayName"] ?? null) === false)) {
            // line 27
            yield "          <div class=\"card-header js-grid-header\">
            <h3 class=\"d-inline-block card-header-title\">
              ";
            // line 29
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, ($context["grid"] ?? null), "name", [], "any", false, false, false, 29), "html", null, true);
            yield " (";
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, ($context["grid"] ?? null), "data", [], "any", false, false, false, 29), "records_total", [], "any", false, false, false, 29), "html", null, true);
            yield ")
            </h3>
            ";
            // line 31
            yield from $this->unwrap()->yieldBlock('grid_actions_block', $context, $blocks);
            // line 36
            yield "          </div>
      ";
        }
        // line 38
        yield "  ";
        yield from [];
    }

    // line 31
    /**
     * @return iterable<null|scalar|\Stringable>
     */
    public function block_grid_actions_block(array $context, array $blocks = []): iterable
    {
        $macros = $this->macros;
        // line 32
        yield "              <div class=\"d-inline-block float-right\">
                ";
        // line 33
        yield Twig\Extension\CoreExtension::include($this->env, $context, "@PrestaShop/Admin/Common/Grid/Blocks/grid_actions.html.twig", ["grid" => ($context["grid"] ?? null)]);
        yield "
              </div>
            ";
        yield from [];
    }

    // line 40
    /**
     * @return iterable<null|scalar|\Stringable>
     */
    public function block_grid_panel_body(array $context, array $blocks = []): iterable
    {
        $macros = $this->macros;
        // line 41
        yield "    <div class=\"card-body\">
      ";
        // line 42
        yield from $this->unwrap()->yieldBlock('grid_view_block', $context, $blocks);
        // line 45
        yield "    </div>
  ";
        yield from [];
    }

    // line 42
    /**
     * @return iterable<null|scalar|\Stringable>
     */
    public function block_grid_view_block(array $context, array $blocks = []): iterable
    {
        $macros = $this->macros;
        // line 43
        yield "        ";
        yield Twig\Extension\CoreExtension::include($this->env, $context, "@PrestaShop/Admin/Common/Grid/grid.html.twig", ["grid" => ($context["grid"] ?? null)]);
        yield "
      ";
        yield from [];
    }

    // line 48
    /**
     * @return iterable<null|scalar|\Stringable>
     */
    public function block_grid_panel_footer(array $context, array $blocks = []): iterable
    {
        $macros = $this->macros;
        yield from [];
    }

    // line 51
    /**
     * @return iterable<null|scalar|\Stringable>
     */
    public function block_grid_panel_extra_content(array $context, array $blocks = []): iterable
    {
        $macros = $this->macros;
        yield from [];
    }

    /**
     * @codeCoverageIgnore
     */
    public function getTemplateName(): string
    {
        return "@PrestaShop/Admin/Common/Grid/grid_panel.html.twig";
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
        return array (  179 => 51,  169 => 48,  161 => 43,  154 => 42,  148 => 45,  146 => 42,  143 => 41,  136 => 40,  128 => 33,  125 => 32,  118 => 31,  113 => 38,  109 => 36,  107 => 31,  100 => 29,  96 => 27,  93 => 26,  86 => 25,  81 => 51,  77 => 49,  75 => 48,  72 => 47,  70 => 40,  67 => 39,  65 => 25,  59 => 24,  56 => 23,  52 => 21,  50 => 20,  48 => 19,);
    }

    public function getSourceContext(): Source
    {
        return new Source("", "@PrestaShop/Admin/Common/Grid/grid_panel.html.twig", "/home1/harmakko/public_html/PS/modules/ps_linklist/views/PrestaShop/Admin/Common/Grid/grid_panel.html.twig");
    }
}
