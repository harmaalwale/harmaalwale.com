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

/* @PrestaShop/Admin/Improve/Design/Theme/Blocks/Partials/theme_card_container.html.twig */
class __TwigTemplate_6d55650ff34d6e1d8fc592dd8f51675a extends Template
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
            'content' => [$this, 'block_content'],
        ];
    }

    protected function doDisplay(array $context, array $blocks = []): iterable
    {
        $macros = $this->macros;
        // line 25
        yield "
<div class=\"col-lg-3 col-md-4 col-sm-6 theme-card-container\" data-role=\"";
        // line 26
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(($context["themeName"] ?? null), "html", null, true);
        yield "\" data-theme-framework=\"";
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(((array_key_exists("themeFramework", $context)) ? (Twig\Extension\CoreExtension::default(($context["themeFramework"] ?? null), "")) : ("")), "html", null, true);
        yield "\">
  ";
        // line 27
        yield from $this->unwrap()->yieldBlock('content', $context, $blocks);
        // line 29
        yield "</div>
";
        yield from [];
    }

    // line 27
    /**
     * @return iterable<null|scalar|\Stringable>
     */
    public function block_content(array $context, array $blocks = []): iterable
    {
        $macros = $this->macros;
        // line 28
        yield "  ";
        yield from [];
    }

    /**
     * @codeCoverageIgnore
     */
    public function getTemplateName(): string
    {
        return "@PrestaShop/Admin/Improve/Design/Theme/Blocks/Partials/theme_card_container.html.twig";
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
        return array (  67 => 28,  60 => 27,  54 => 29,  52 => 27,  46 => 26,  43 => 25,);
    }

    public function getSourceContext(): Source
    {
        return new Source("", "@PrestaShop/Admin/Improve/Design/Theme/Blocks/Partials/theme_card_container.html.twig", "/home1/harmakko/public_html/PS/src/PrestaShopBundle/Resources/views/Admin/Improve/Design/Theme/Blocks/Partials/theme_card_container.html.twig");
    }
}
