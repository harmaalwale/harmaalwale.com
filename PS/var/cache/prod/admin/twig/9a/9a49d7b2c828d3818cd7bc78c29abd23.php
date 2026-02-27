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

/* @PrestaShop/Admin/Improve/Design/Theme/Blocks/Partials/logo_card.html.twig */
class __TwigTemplate_002d6f247ae64a09e226bffcc1c891ff extends Template
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
            'logo_card' => [$this, 'block_logo_card'],
            'card_title' => [$this, 'block_card_title'],
            'card_content' => [$this, 'block_card_content'],
        ];
    }

    protected function doDisplay(array $context, array $blocks = []): iterable
    {
        $macros = $this->macros;
        // line 25
        yield "
";
        // line 26
        yield from $this->unwrap()->yieldBlock('logo_card', $context, $blocks);
        yield from [];
    }

    /**
     * @return iterable<null|scalar|\Stringable>
     */
    public function block_logo_card(array $context, array $blocks = []): iterable
    {
        $macros = $this->macros;
        // line 27
        yield "  <div class=\"card logo-card\">
    <div class=\"card-body\">
      <div class=\"logo-card-title text-left\">
        ";
        // line 30
        yield from $this->unwrap()->yieldBlock('card_title', $context, $blocks);
        // line 32
        yield "      </div>
      ";
        // line 33
        yield from $this->unwrap()->yieldBlock('card_content', $context, $blocks);
        // line 35
        yield "    </div>
  </div>
";
        yield from [];
    }

    // line 30
    /**
     * @return iterable<null|scalar|\Stringable>
     */
    public function block_card_title(array $context, array $blocks = []): iterable
    {
        $macros = $this->macros;
        // line 31
        yield "        ";
        yield from [];
    }

    // line 33
    /**
     * @return iterable<null|scalar|\Stringable>
     */
    public function block_card_content(array $context, array $blocks = []): iterable
    {
        $macros = $this->macros;
        // line 34
        yield "      ";
        yield from [];
    }

    /**
     * @codeCoverageIgnore
     */
    public function getTemplateName(): string
    {
        return "@PrestaShop/Admin/Improve/Design/Theme/Blocks/Partials/logo_card.html.twig";
    }

    /**
     * @codeCoverageIgnore
     */
    public function getDebugInfo(): array
    {
        return array (  97 => 34,  90 => 33,  85 => 31,  78 => 30,  71 => 35,  69 => 33,  66 => 32,  64 => 30,  59 => 27,  48 => 26,  45 => 25,);
    }

    public function getSourceContext(): Source
    {
        return new Source("", "@PrestaShop/Admin/Improve/Design/Theme/Blocks/Partials/logo_card.html.twig", "/home1/harmakko/public_html/PS/src/PrestaShopBundle/Resources/views/Admin/Improve/Design/Theme/Blocks/Partials/logo_card.html.twig");
    }
}
