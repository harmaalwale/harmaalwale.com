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

/* @PrestaShop/Admin/Common/Grid/Blocks/Table/empty_row.html.twig */
class __TwigTemplate_34e7832b60346952504b9f66f5058649 extends Template
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
<tr class=\"empty_row\">
  <td colspan=\"";
        // line 27
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(Twig\Extension\CoreExtension::length($this->env->getCharset(), CoreExtension::getAttribute($this->env, $this->source, ($context["grid"] ?? null), "columns", [], "any", false, false, false, 27)), "html", null, true);
        yield "\" ";
        if (CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, ($context["grid"] ?? null), "attributes", [], "any", false, false, false, 27), "is_empty_state", [], "any", false, false, false, 27)) {
            yield "class=\"border-0\"";
        }
        yield ">
    ";
        // line 28
        if (CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, ($context["grid"] ?? null), "attributes", [], "any", false, false, false, 28), "is_empty_state", [], "any", false, false, false, 28)) {
            // line 29
            yield "      ";
            yield Twig\Extension\CoreExtension::include($this->env, $context, [(("@PrestaShop/Admin/Common/Grid/Blocks/EmptyState/" . CoreExtension::getAttribute($this->env, $this->source,             // line 30
($context["grid"] ?? null), "id", [], "any", false, false, false, 30)) . ".html.twig"), "@PrestaShop/Admin/Common/Grid/Blocks/EmptyState/_default.html.twig"], ["grid" =>             // line 32
($context["grid"] ?? null)]);
            // line 33
            yield "
    ";
        } else {
            // line 35
            yield "      ";
            yield Twig\Extension\CoreExtension::include($this->env, $context, "@PrestaShop/Admin/Common/Grid/Blocks/EmptyState/_default.html.twig", ["grid" => ($context["grid"] ?? null)]);
            yield "
    ";
        }
        // line 37
        yield "  </td>
</tr>
";
        yield from [];
    }

    /**
     * @codeCoverageIgnore
     */
    public function getTemplateName(): string
    {
        return "@PrestaShop/Admin/Common/Grid/Blocks/Table/empty_row.html.twig";
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
        return array (  71 => 37,  65 => 35,  61 => 33,  59 => 32,  58 => 30,  56 => 29,  54 => 28,  46 => 27,  42 => 25,);
    }

    public function getSourceContext(): Source
    {
        return new Source("", "@PrestaShop/Admin/Common/Grid/Blocks/Table/empty_row.html.twig", "/home1/harmakko/public_html/PS/src/PrestaShopBundle/Resources/views/Admin/Common/Grid/Blocks/Table/empty_row.html.twig");
    }
}
