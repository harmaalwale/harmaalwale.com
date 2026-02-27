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

/* @PrestaShop/Admin/Improve/Design/Cms/Blocks/showcase_card.html.twig */
class __TwigTemplate_789d0589c02f944e779a1573a516639d extends Template
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
            'cms_pages_showcase_card' => [$this, 'block_cms_pages_showcase_card'],
        ];
    }

    protected function doDisplay(array $context, array $blocks = []): iterable
    {
        $macros = $this->macros;
        // line 25
        yield "
";
        // line 26
        yield from $this->unwrap()->yieldBlock('cms_pages_showcase_card', $context, $blocks);
        yield from [];
    }

    /**
     * @return iterable<null|scalar|\Stringable>
     */
    public function block_cms_pages_showcase_card(array $context, array $blocks = []): iterable
    {
        $macros = $this->macros;
        // line 27
        yield "  ";
        if ( !($context["showcaseCardIsClosed"] ?? null)) {
            // line 28
            yield "    <div id=\"cms-pages-showcase-card\" class=\"showcase-card card\">
      <div class=\"showcase-card__left shape-one helper-card__cms-pages-background\">
        <img src=\"";
            // line 30
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->extensions['Symfony\Bridge\Twig\Extension\AssetExtension']->getAssetUrl("themes/new-theme/public/helper-card/content@3x.svg"), "html", null, true);
            yield "\" class=\"img-fluid\">
      </div>
      <div class=\"showcase-card__right\">
        <h2>";
            // line 33
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->extensions['Symfony\Bridge\Twig\Extension\TranslationExtension']->trans("Create meaningful content", [], "Admin.Design.Help"), "html", null, true);
            yield "</h2>
        <p>";
            // line 34
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->extensions['Symfony\Bridge\Twig\Extension\TranslationExtension']->trans("Because it is not just selling products but also creating a universe, build pages to tell stories and catch your visitors’ interest, to turn them into loyal customers.", [], "Admin.Design.Help"), "html", null, true);
            yield "</p>
        <a class=\"btn btn-outline-secondary\" href=\"";
            // line 35
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(($context["helperDocLink"] ?? null), "html", null, true);
            yield "\" target=\"_blank\">";
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->extensions['Symfony\Bridge\Twig\Extension\TranslationExtension']->trans("Learn more", [], "Admin.Actions"), "html", null, true);
            yield "</a>
      </div>
      <i class=\"showcase-card__close material-icons js-remove-helper-block\" data-card-name=\"";
            // line 37
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(($context["cmsPageShowcaseCardName"] ?? null), "html", null, true);
            yield "\" data-close-url=\"";
            yield $this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("admin_close_showcase_card");
            yield "\">close</i>
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
        return "@PrestaShop/Admin/Improve/Design/Cms/Blocks/showcase_card.html.twig";
    }

    /**
     * @codeCoverageIgnore
     */
    public function getDebugInfo(): array
    {
        return array (  85 => 37,  78 => 35,  74 => 34,  70 => 33,  64 => 30,  60 => 28,  57 => 27,  46 => 26,  43 => 25,);
    }

    public function getSourceContext(): Source
    {
        return new Source("", "@PrestaShop/Admin/Improve/Design/Cms/Blocks/showcase_card.html.twig", "/home1/harmakko/public_html/PS/src/PrestaShopBundle/Resources/views/Admin/Improve/Design/Cms/Blocks/showcase_card.html.twig");
    }
}
