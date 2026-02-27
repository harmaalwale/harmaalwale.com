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

/* @PrestaShop/Admin/Module/Includes/card_manage_installed.html.twig */
class __TwigTemplate_1dfdb312e1f97e132f6fc424ea19ef21 extends Template
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

        $this->blocks = [
            'addon_version' => [$this, 'block_addon_version'],
        ];
    }

    protected function doGetParent(array $context): bool|string|Template|TemplateWrapper
    {
        // line 25
        return "@PrestaShop/Admin/Module/Includes/card_list.html.twig";
    }

    protected function doDisplay(array $context, array $blocks = []): iterable
    {
        $macros = $this->macros;
        $this->parent = $this->loadTemplate("@PrestaShop/Admin/Module/Includes/card_list.html.twig", "@PrestaShop/Admin/Module/Includes/card_manage_installed.html.twig", 25);
        yield from $this->parent->unwrap()->yield($context, array_merge($this->blocks, $blocks));
    }

    // line 30
    /**
     * @return iterable<null|scalar|\Stringable>
     */
    public function block_addon_version(array $context, array $blocks = []): iterable
    {
        $macros = $this->macros;
        // line 31
        yield "  ";
        if ((CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, ($context["module"] ?? null), "attributes", [], "any", false, false, false, 31), "productType", [], "any", false, false, false, 31) == "service")) {
            // line 32
            yield "    ";
            yield $this->extensions['Symfony\Bridge\Twig\Extension\TranslationExtension']->trans("Service by %author%", ["%author%" => (("<b>" . CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, ($context["module"] ?? null), "attributes", [], "any", false, false, false, 32), "author", [], "any", false, false, false, 32)) . "</b>")], "Admin.Modules.Feature");
            yield "
  ";
        } else {
            // line 34
            yield "    ";
            yield $this->extensions['Symfony\Bridge\Twig\Extension\TranslationExtension']->trans("v%version% - by %author%", ["%version%" => CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, ($context["module"] ?? null), "attributes", [], "any", false, false, false, 34), "version", [], "any", false, false, false, 34), "%author%" => (("<b>" . CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, ($context["module"] ?? null), "attributes", [], "any", false, false, false, 34), "author", [], "any", false, false, false, 34)) . "</b>")], "Admin.Modules.Feature");
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
        return "@PrestaShop/Admin/Module/Includes/card_manage_installed.html.twig";
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
        return array (  67 => 34,  61 => 32,  58 => 31,  51 => 30,  40 => 25,);
    }

    public function getSourceContext(): Source
    {
        return new Source("", "@PrestaShop/Admin/Module/Includes/card_manage_installed.html.twig", "/home1/harmakko/public_html/PS/src/PrestaShopBundle/Resources/views/Admin/Module/Includes/card_manage_installed.html.twig");
    }
}
