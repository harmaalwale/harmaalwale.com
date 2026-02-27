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

/* @PrestaShop/Admin/Improve/Design/Theme/Blocks/use_theme_modal.html.twig */
class __TwigTemplate_e9e111872fca2d3ee19d7dd93edfcb80 extends Template
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
        yield from $this->loadTemplate("@PrestaShop/Admin/Improve/Design/Theme/Blocks/use_theme_modal.html.twig", "@PrestaShop/Admin/Improve/Design/Theme/Blocks/use_theme_modal.html.twig", 26, "499255269")->unwrap()->yield(CoreExtension::merge($context, ["id" => "use_theme_modal"]));
        yield from [];
    }

    /**
     * @codeCoverageIgnore
     */
    public function getTemplateName(): string
    {
        return "@PrestaShop/Admin/Improve/Design/Theme/Blocks/use_theme_modal.html.twig";
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
        return array (  45 => 26,  42 => 25,);
    }

    public function getSourceContext(): Source
    {
        return new Source("", "@PrestaShop/Admin/Improve/Design/Theme/Blocks/use_theme_modal.html.twig", "/home1/harmakko/public_html/PS/src/PrestaShopBundle/Resources/views/Admin/Improve/Design/Theme/Blocks/use_theme_modal.html.twig");
    }
}


/* @PrestaShop/Admin/Improve/Design/Theme/Blocks/use_theme_modal.html.twig */
class __TwigTemplate_e9e111872fca2d3ee19d7dd93edfcb80___499255269 extends Template
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
            'header' => [$this, 'block_header'],
            'content' => [$this, 'block_content'],
            'footer' => [$this, 'block_footer'],
        ];
    }

    protected function doGetParent(array $context): bool|string|Template|TemplateWrapper
    {
        return "@PrestaShop/Admin/Helpers/bootstrap_popup.html.twig";
    }

    protected function doDisplay(array $context, array $blocks = []): iterable
    {
        $macros = $this->macros;
        $this->parent = $this->loadTemplate("@PrestaShop/Admin/Helpers/bootstrap_popup.html.twig", "@PrestaShop/Admin/Improve/Design/Theme/Blocks/use_theme_modal.html.twig", 26);
        yield from $this->parent->unwrap()->yield($context, array_merge($this->blocks, $blocks));
    }

    // line 29
    /**
     * @return iterable<null|scalar|\Stringable>
     */
    public function block_header(array $context, array $blocks = []): iterable
    {
        $macros = $this->macros;
        // line 30
        yield "      <div class=\"modal-header\">
        <h4 class=\"modal-title\">";
        // line 31
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->extensions['Symfony\Bridge\Twig\Extension\TranslationExtension']->trans("Use this theme?", [], "Admin.Design.Feature"), "html", null, true);
        yield "</h4>
      </div>
  ";
        yield from [];
    }

    // line 35
    /**
     * @return iterable<null|scalar|\Stringable>
     */
    public function block_content(array $context, array $blocks = []): iterable
    {
        $macros = $this->macros;
        // line 36
        yield "    <div class=\"alert alert-info m-2\">
      ";
        // line 37
        yield $this->extensions['Symfony\Bridge\Twig\Extension\TranslationExtension']->trans("When applying a new theme to your store, make sure that the modules you are using are still compatible.", [], "Admin.Design.Feature");
        yield "
    </div>
  ";
        yield from [];
    }

    // line 41
    /**
     * @return iterable<null|scalar|\Stringable>
     */
    public function block_footer(array $context, array $blocks = []): iterable
    {
        $macros = $this->macros;
        // line 42
        yield "    <div class=\"modal-footer\">
      <button
        type=\"button\"
        class=\"btn btn-outline-secondary btn-lg\"
        data-dismiss=\"modal\">
        ";
        // line 47
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->extensions['Symfony\Bridge\Twig\Extension\TranslationExtension']->trans("Cancel", [], "Admin.Actions"), "html", null, true);
        yield "
      </button>

      <button type=\"button\" class=\"btn btn-primary js-submit-use-theme btn-lg\">
        ";
        // line 51
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->extensions['Symfony\Bridge\Twig\Extension\TranslationExtension']->trans("Yes", [], "Admin.Global"), "html", null, true);
        yield "
      </button>
    </div>
  ";
        yield from [];
    }

    /**
     * @codeCoverageIgnore
     */
    public function getTemplateName(): string
    {
        return "@PrestaShop/Admin/Improve/Design/Theme/Blocks/use_theme_modal.html.twig";
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
        return array (  172 => 51,  165 => 47,  158 => 42,  151 => 41,  143 => 37,  140 => 36,  133 => 35,  125 => 31,  122 => 30,  115 => 29,  45 => 26,  42 => 25,);
    }

    public function getSourceContext(): Source
    {
        return new Source("", "@PrestaShop/Admin/Improve/Design/Theme/Blocks/use_theme_modal.html.twig", "/home1/harmakko/public_html/PS/src/PrestaShopBundle/Resources/views/Admin/Improve/Design/Theme/Blocks/use_theme_modal.html.twig");
    }
}
