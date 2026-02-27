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

/* @PrestaShop/Admin/Module/Includes/grid_manage_empty.html.twig */
class __TwigTemplate_57fdb32ba4bd9e80b26c75764841c528 extends Template
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
            'catalog_category_empty' => [$this, 'block_catalog_category_empty'],
        ];
    }

    protected function doDisplay(array $context, array $blocks = []): iterable
    {
        $macros = $this->macros;
        // line 25
        yield "
";
        // line 26
        yield from $this->unwrap()->yieldBlock('catalog_category_empty', $context, $blocks);
        yield from [];
    }

    /**
     * @return iterable<null|scalar|\Stringable>
     */
    public function block_catalog_category_empty(array $context, array $blocks = []): iterable
    {
        $macros = $this->macros;
        // line 27
        yield "  ";
        $context["hookData"] = $this->extensions['PrestaShopBundle\Twig\HookExtension']->renderHook("displayEmptyModuleCategoryExtraMessage", ["category_name" => CoreExtension::getAttribute($this->env, $this->source, ($context["category"] ?? null), "name", [], "any", false, false, false, 27)]);
        // line 28
        yield "  ";
        if ( !Twig\Extension\CoreExtension::testEmpty(($context["hookData"] ?? null))) {
            // line 29
            yield "    <div class=\"module-short-list\">
      <span id=\"";
            // line 30
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, ($context["category"] ?? null), "refMenu", [], "any", false, false, false, 30), "html", null, true);
            yield "_modules\" class=\"module-search-result-title\">";
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->extensions['Symfony\Bridge\Twig\Extension\TranslationExtension']->trans(CoreExtension::getAttribute($this->env, $this->source, ($context["category"] ?? null), "name", [], "any", false, false, false, 30), [], "Admin.Modules.Feature"), "html", null, true);
            yield "</span>
      <div class=\"modules-list module-list-empty\" data-name=\"";
            // line 31
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, ($context["category"] ?? null), "refMenu", [], "any", false, false, false, 31), "html", null, true);
            yield "\">
        ";
            // line 32
            yield ($context["hookData"] ?? null);
            yield "
      </div>
    </div>
  ";
        }
        yield from [];
    }

    /**
     * @codeCoverageIgnore
     */
    public function getTemplateName(): string
    {
        return "@PrestaShop/Admin/Module/Includes/grid_manage_empty.html.twig";
    }

    /**
     * @codeCoverageIgnore
     */
    public function getDebugInfo(): array
    {
        return array (  76 => 32,  72 => 31,  66 => 30,  63 => 29,  60 => 28,  57 => 27,  46 => 26,  43 => 25,);
    }

    public function getSourceContext(): Source
    {
        return new Source("", "@PrestaShop/Admin/Module/Includes/grid_manage_empty.html.twig", "/home1/harmakko/public_html/PS/src/PrestaShopBundle/Resources/views/Admin/Module/Includes/grid_manage_empty.html.twig");
    }
}
